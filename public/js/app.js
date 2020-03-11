
$('td.deleteCategory a').each(function(i,e){
    const href = $(this).attr('href');
    $(this).on('click',()=>{

        $('.categoryDeleteBtn').attr('href',href);
        $('#categoryDeleteConfirm').modal();
    }).attr('href','#');
});
