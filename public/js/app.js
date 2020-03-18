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

        $('#yt_preview').show().attr('src','https://www.youtube.com/embed/'+ytId)
    }else if(ytId === '' || ytId.length < 11 ){
        $(e.target).addClass('is-invalid');
        $('#yt_preview').hide();
    }else{
        if(ytId.split('watch?v=')[1]){
            $(e.target).val(ytId.split('watch?v=')[1]);
            $('#yt_preview').show().attr('src','https://www.youtube.com/embed/'+ytId.split('watch?v=')[1])
            $(e.target).removeClass('is-invalid');
        }
    }
});



$('#login-form').disableAutoFill();