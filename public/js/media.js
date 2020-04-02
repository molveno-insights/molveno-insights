'use strict';
function mediaRating(){
    const mediaId = $(this).attr('data-media-id'),
        ratingType = $(this).attr('data-type');
        $.ajax({
            'type': "POST",
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            'url': `/media/${mediaId}/${ratingType}`,
            'success': function() {

            const countSelector = $(`#media-${ratingType}-count-${mediaId}`);
            let currentCount = countSelector.html();
            countSelector.html(++currentCount);
            const likes =  $(`#media-like-count-${mediaId}`).html()/1,
                    dislikes = $(`#media-dislike-count-${mediaId}`).html()/1,
                    total = likes+dislikes,
                    ratingPerc = Math.floor(likes*100/total);


            
            $(`#media-rating-perc-${mediaId}`).html(ratingPerc);
            ratingPercIcon(ratingPerc,mediaId);
            //mediaCardsColl();
        },
        'error': function() {
            alert("There was an error. Try again please!");
        }
    });
}
let mediaSortArr = [];
const mediaCardsColl = ()=>{
    mediaSortArr = []
    $('div.card').each(function(i){
        const thisElId = $(this).attr('id');
        mediaSortArr.push({ 
            el : $(this),
            category : $(this).parent(),
            views : $(`#${thisElId} .media-view-count`).text(),
            rating : $(`#${thisElId} .media-rating-perc-val`).text(),
            added : $(this).attr('data-media-added')
        });
    });
};

(function mediaSort(){
    const mediaDefaultContainer = $('#mediaDefaultContainer'),
          mediaSortContainer = $('#mediaSortContainer .row');
    
          mediaCardsColl();
       
    $('#mediaSortOptions .option').on('click',(e)=>{
        $('#searchMediaInput').hide().val('');
        $('#mediaSortOptions .option').removeClass('selected');
        $(e.target).addClass('selected');
        window.scrollTo(0, 0);
        const mediaSortOptionAction = e.target.id;    
        switch(mediaSortOptionAction){
            case 'most_viewed' : 
                mediaSortArr.sort((a,b)=>b.views - a.views);
                break;
            case 'highest_rating' : 
                mediaSortArr.sort((a,b)=>b.rating - a.rating);
                break;
            case 'date_added' :
                mediaSortArr.sort((a,b)=>b.added - a.added);
                break;
            case 'category' :
                $('#mediaSortContainer').hide();
                mediaDefaultContainer.show()
                mediaSortArr.map((item)=>item.category.append(item.el));
                break;
        }
        if(mediaSortOptionAction!='category'){
            mediaSortContainer.parent().show();
            $('#mediaSortContainer h2').html(`${mediaSortArr.length} videos sorted by ${$(e.target).html().replace(' | ','')}`)
            mediaSortArr.map((item)=>mediaSortContainer.append(item.el));
            mediaDefaultContainer.hide(); 
        }else{
            mediaDefaultContainer.show();
        }
        
      
        $('#mediaSearchContainer').hide();

        
        
    });
    
})()


function mediaView(e){
    e.preventDefault();
    const mediaEl = $(e.target.parentNode).attr('data-media-id') 
    ? e.target.parentNode
    : e.target,
    mediaId = $(mediaEl).attr('data-media-id');
    
    
    
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `/media/${mediaId}/view`,
        success: function() {
            window.scrollTo(0, 0);
            $("body").css("overflow", "hidden");
            $('#viewRating').append($(`#media-rating-${mediaId}`));

            $('#viewClose').show().off().on('click',(e)=>{
                $(`#media-rating-container-${mediaId}`).append($(`#media-rating-${mediaId}`));
                $('#mediaView,#viewClose,#mediaOverlay').hide();
                //$('#mediaView').attr('src','');
                stopVideo()
                $("body").css("overflow", "auto");
            });
            const mediaViewCountElement = $(`#media-view-count-${mediaId}`);
            SpatialNav();
            $.getJSON(`https://www.googleapis.com/youtube/v3/videos?id=${mediaEl.href.split('/embed/')[1].split('?')[0]}&part=snippet,contentDetails&key=AIzaSyCP6BRLQ_yLKYBL1vBT-kUERA0i6XZpsNM`, function(data) {
                console.log(moment.duration(data.items[0].contentDetails.duration)._milliseconds)

                onYouTubeIframeAPIReady(mediaEl.href.split('/embed/')[1].split('?')[0])
            
            });
            
            $('#mediaView').attr('src',`${mediaEl.href}`).show()
            $('#mediaOverlay').show()
            
            let mediaViewCount = mediaViewCountElement.text()/1;
            mediaViewCount++
            mediaViewCountElement.html(mediaViewCount);

        }
    });
}
function mouseMove(e){
    let x
    if(e){
        x = e.screenX
    } 
    
    $(`#viewRating,#viewClose`).show();
    setTimeout(()=>{
        $(`#viewRating,#viewClose`).hide();
        
    },4000);
}
document.getElementById("mediaOverlay").onmousemove = mouseMove;

function ratingPercIcon(perc,id){
    let color;
    if(perc<50){
        color = 'red'
    }else{
        color = 'green'
    }
    const svgEl = $('<svg></svg>')
            .attr('viewBox','0 0 36 36')
            .attr('class','circular-chart'),
          svgPath = $('<path/>')
            .attr('class','circle')
            .attr('stroke-dasharray',`${perc},100`)
            .attr('style',`stroke: ${color}`)
            .attr('d','M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831');
    svgEl.html(svgPath);
    $(`#media-rating-perc-icon-${id} path`).attr('stroke-dasharray',`${perc}, 100`).attr('style',`stroke: ${color}`);
    $(`#media-${id} .media-rating-perc`).attr('style',`color:${color}`);
    return svgEl;

}
function feedbackModal(e){

    const feedbackQuestion = $('#feedback-question').show(),
          feedbackForm = $('#feedback-form').hide();
    $('.btn-feedback-q').click((e)=>{
        feedbackQuestion.hide();
        const feedbackAction = e.target.id.replace('feedback_',''),
                feedbackFormHtml = $(`#feedback_templ #${feedbackAction}`).html();
        feedbackForm.show().html(feedbackFormHtml);
        switch(feedbackAction){
            case 'suggestvideo':
                ytPreview()
                break;
            default:
        }
    });
}

$('.media-like, .media-dislike').click(mediaRating);
$('.media-view').click(mediaView);
$('#videopage_feedback').on('shown.bs.modal',feedbackModal);
function ytPreview(){
    $('.modal input#url').off().on('input',(e)=>{
        const ytId = $(e.target).val();
        if(ytId.length === 11 ){
            $(e.target).removeClass('is-invalid');
            $('.modal #yt_preview').show().attr('src','https://www.youtube.com/embed/'+ytId);
        }else if(ytId === '' || ytId.length < 11 ){
            $(e.target).addClass('is-invalid');
            $('.modal #yt_preview').hide();
        }else{
            if(ytId.split('watch?v=')[1]){
                $.getJSON(`https://www.googleapis.com/youtube/v3/videos?id=${ytId.split('watch?v=')[1]}&part=snippet,contentDetails&key=AIzaSyCP6BRLQ_yLKYBL1vBT-kUERA0i6XZpsNM`, function(data) {
                    console.log(moment.duration(data.items[0].contentDetails.duration)._milliseconds)
                    if(data.items.length===0){
                        $(e.target).addClass('is-invalid');
                        $('#yt_title').html('');
                    }else{
                        console.log(data.items[0].snippet)
                        $('#yt_title').html(data.items[0].snippet.title)
                        $(e.target).val(ytId.split('watch?v=')[1]);
                        $('.modal #yt_preview').show().attr('src','https://www.youtube.com/embed/'+ytId.split('watch?v=')[1]);
                        $(e.target).removeClass('is-invalid');
                    }
                });
                
            }
        }
    });
}
function mediaCardEl(item){
    const mediaCard = $('<div></div>')
            .addClass('col-md-3 card shadow')
            .attr('id',`media-${item.id}`),
          mediaYTurl = `https://www.youtube.com/embed/${item.url}?rel=0&amp;autoplay=1;fs=0;autohide=0;hd=1;controls=1;hl=en;fs=0;color=white;modestbranding=1;showinfo=0`,
          mediaYTthumbnail = $('<img />')
            .addClass('card-img-top')
            .attr('src',`https://i3.ytimg.com/vi/${item.url}/hqdefault.jpg`),
          mediaViewLink = $('<a></a>')
            .addClass('media-view')
            .attr('href',mediaYTurl)
            .attr('data-media-id',item.id)
            .append(mediaYTthumbnail),
          mediaCardTitle = $('<h5></h5>')
            .addClass('card-title')
            .html(`<a href="${mediaYTurl}" class="media-view" data-media-id="${item.id}">${item.name}</a>`),
          mediaCardBody = $('<div></div>')
            .addClass('card-body'),
          mediaRatingContainer = $('<div></div>')
            .attr('id',`media-rating-container-${item.id}`),
          mediaRatingEl = $('<div></div>')
            .attr('id',`media-rating-${item.id}`)
            .append(`<i class="far fa-eye fa-2x"></i><span id="media-view-count-${item.id}" class="media-view-count">${item.views} </span>`)
            .append(`<i class="media-like fas fa-thumbs-up fa-2x" data-type="like" data-media-id="${item.id}"></i><span id="media-like-count-${item.id}">${item.likes}</span>`)
            .append(`<i class="media-dislike fas fa-thumbs-down fa-2x" data-type="dislike" data-media-id="${item.id}"></i><span id="media-dislike-count-${item.id}">${item.dislikes}</span>`);
    const mediaRatingPerc = Math.floor( item.likes / ( item.likes + item.dislikes ) * 100 ),
          mediaRatingPercColor = mediaRatingPerc < 50 ? 'red' : 'green',
          mediaRatingPercIcon = $(`<div class="float-right" style="margin-top:-50px;"><div style="width:50px;"><div class="circ_perc" id="media-rating-perc-icon-${item.id}"><svg viewBox="0 0 36 36" class="circular-chart"><path class="circle" stroke-dasharray="${mediaRatingPerc}, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" style="stroke:${mediaRatingPercColor};" /></svg></div><div style="color:${mediaRatingPercColor};" class="media-rating-perc"><span id="media-rating-perc-${item.id}"  class="media-rating-perc-val">${mediaRatingPerc}</span>%</div></div></div>`);
    mediaRatingContainer.append(mediaRatingEl)
    mediaCardBody.append(mediaCardTitle);
    mediaCardBody.append(mediaRatingContainer)
    mediaCardBody.append(mediaRatingPercIcon)
    mediaCard.append(mediaViewLink);
    mediaCard.append(mediaCardBody);
    return mediaCard;
}

(function mediaSearch(){
    const mediaSearchInput = $('#searchMedia input')
    $('#searchMedia i').on('click',(e)=>{
       
        
        mediaSearchInput.toggle().focus().on('input',(e)=>{
            if(e.target.value===''){
                $('#mediaDefaultContainer').show();
                $('#mediaSearchContainer').hide();
                $('#mediaSortOptions #category').addClass('selected');
            }else{
                $('#mediaSortOptions .option').removeClass('selected');
                $.post('api/search',{
                    q : e.target.value
                },(res)=>{
                    console.log(JSON.parse(res));
                    $('#mediaSearchContainer').show();
                    $('#mediaSortContainer,#mediaDefaultContainer').hide();
                    $('#mediaSearchContainer .row').html('');
                    JSON.parse(res).map((item)=>{
                        $('#mediaSearchContainer .row').append(mediaCardEl(item));
                    });
                    $('.media-like, .media-dislike').click(mediaRating);
                    $('.media-view').click(mediaView);
                    $('#mediaSearchContainer h2').html(`${JSON.parse(res).length} results for '${e.target.value}'`)
                });
            }
               
            
        });
    });
})();

$.getScript('https://luke-chang.github.io/js-spatial-navigation/spatial_navigation.js', function() {
    SpatialNav()
  });
  function SpatialNav(){
    $('a, .focusable')
    .SpatialNavigation()
    .focus(function() { $(this).css('outline', '2px solid #28558E'); })
    .blur(function() { $(this).css('outline', ''); })
    .first()
    .focus();
  }