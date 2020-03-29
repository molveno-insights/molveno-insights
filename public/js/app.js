"use strict";


$('td.deleteCategory a').each(function(i,e){
    const href = $(this).attr('href');
    $(this).on('click',()=>{

        $('.categoryDeleteBtn').attr('href',href);
        $('#categoryDeleteConfirm').modal();
    }).attr('href','#');
});
function searchYTresult(item){
    const searchYTresultEl = $('<div></div>')
            .attr('class','searchYTresult row')
            .attr('data-ytId',item.id.videoId),
          searchYTresultThumbnail = $('<div></div>')
            .attr('class','col-md-2')
            .html(`<img src="${item.snippet.thumbnails.default.url}" width="${item.snippet.thumbnails.default.width}" class="img-thumbnail" />`),
          searchYTresultContent =  $('<div></div>')
            .attr('class','col-md-10'),
          searchYTresultTitle =  $('<h3></h3>')
            .html(item.snippet.title),
          searchYTresultDescription =  $('<p></p>')
            .html(item.snippet.description)


    searchYTresultEl.append(searchYTresultThumbnail);
    searchYTresultContent.append(searchYTresultTitle);
    searchYTresultContent.append(searchYTresultDescription);
    searchYTresultEl.append(searchYTresultContent);
    return searchYTresultEl

}
$('#searchYT').on('submit',(e)=>{
    e.preventDefault()
    const ytSearchResults = $('#yt_search .results').html(''),
          ytSearchQuery = $('#search_yt_input').val()
    //$('#yt_search .input-group').hide()
    $.getJSON(`https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=25&q=${ytSearchQuery}&key=AIzaSyCP6BRLQ_yLKYBL1vBT-kUERA0i6XZpsNM`, function(data) {
        data.items.map((item)=>{
            const ytSearchResult = searchYTresult(item).on('click',(e)=>{
                ytPreview(item.id.videoId)
                //$('#youtube_url').val(item.id.videoId);
            })
            ytSearchResults.append(ytSearchResult)
        });
    });
})

$('input#youtube_url').on('input',(e)=>{

    const ytId = $('#youtube_url').val();

    if(ytId === '' || ytId.length < 11 ){
        $('#youtube_url').addClass('is-invalid');
        $('#yt_preview').hide();
    }else{
        if(ytId.split('watch?v=')[1]){
            ytPreview(ytId.split('watch?v=')[1])
        }else{
            ytPreview(ytId)
        }
    }
});

function ytPreview(ytId){
    $.getJSON(`https://www.googleapis.com/youtube/v3/videos?id=${ytId}&part=snippet,contentDetails,statistics,status&key=AIzaSyCP6BRLQ_yLKYBL1vBT-kUERA0i6XZpsNM`, function(data) {
                if(data.items.length===0){
                    $('#youtube_url').addClass('is-invalid');
                }else{
                    $('#youtube_url').hide();
                    $('#select_yt_video').hide()
                    $('#addvideo').show()
                    $('#toggle_ytvideo_select').off().on('click',(e)=>{
                        $('#select_yt_video').show();
                        $('#addvideo').hide();
                        $('#youtube_url').val('').show();
                        $('#yt_preview').hide()
                    })
                    $('#url').val(ytId)
                    $('#youtube_url').removeClass('is-invalid');
                    $('#youtube_url').val(ytId);
                    $('#name').val(data.items[0].snippet.title);
                    $('#description').val(data.items[0].snippet.description);
                    if(data.items[0].status.madeForKids) $('#forchildren').prop('checked',true)
                    $('#yt_preview').show().attr('src','https://www.youtube.com/embed/'+ytId);
                    $('#youtube_url').removeClass('is-invalid');
                }    
                    
            });
}

$('#login-form').disableAutoFill();