"use strict";


$('td.deleteCategory a').each(function(i,e){
    const href = $(this).attr('href');
    $(this).on('click',()=>{

        $('.categoryDeleteBtn').attr('href',href);
        $('#categoryDeleteConfirm').modal();
    }).attr('href','#');
});



$('input#url').on('input',(e)=>{

    const ytId = $(e.target).val();

    if(ytId.length === 11 ){
        $(e.target).removeClass('is-invalid');

        $('#yt_preview').show().attr('src','https://www.youtube.com/embed/'+ytId);
    }else if(ytId === '' || ytId.length < 11 ){
        $(e.target).addClass('is-invalid');
        $('#yt_preview').hide();
    }else{
        if(ytId.split('watch?v=')[1]){
            $.getJSON(`https://www.googleapis.com/youtube/v3/videos?id=${ytId.split('watch?v=')[1]}&part=snippet,contentDetails&key=AIzaSyCP6BRLQ_yLKYBL1vBT-kUERA0i6XZpsNM`, function(data) {
                if(data.items.length===0){
                    $(e.target).addClass('is-invalid');
                }else{
                    $(e.target).removeClass('is-invalid');
                    $(e.target).val(ytId.split('watch?v=')[1]);
                    $('#name').val(data.items[0].snippet.title);
                    $('#yt_preview').show().attr('src','https://www.youtube.com/embed/'+ytId.split('watch?v=')[1]);
                    $(e.target).removeClass('is-invalid');
                }    
                    
            });
        }
    }
});



$('#login-form').disableAutoFill();