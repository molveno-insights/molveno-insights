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


            console.log(ratingPerc)
            $(`#media-rating-perc-${mediaId}`).html(ratingPerc);
            ratingPercIcon(ratingPerc,mediaId)
        },
        'error': function() {
            alert("There was an error. Try again please!");
        }
    });
}
(function mediaSort(){
    $('#mediaSortOptions .option').on('click',(e)=>{

        const mediaSortOptionAction = e.target.id;
        switch(mediaSortOptionAction){
            case 'most_viewed' : 
                break;
            case 'highest_rating' : 
                break;
            case 'date_added' :
                break;
        }        
    });
})()



function mediaView(e){
    const mediaId = $(e.target.parentNode).attr('data-media-id') ? $(e.target.parentNode).attr('data-media-id') : $(e.target).attr('data-media-id')

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `/media/${mediaId}/view`,
        success: function() {
            const mediaViewCountElement = $(`#media-view-count-${mediaId}`);
            
            let mediaViewCount = mediaViewCountElement.text()/1;
            mediaViewCount++
            mediaViewCountElement.html(mediaViewCount);
        }
    });
}
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
            feedbackForm = $('#feedback-form').hide(),
            feedbackAction = e.target.id.replace('feedback_','');
    $('.btn-feedback-q').click((e)=>{
        feedbackQuestion.hide();
        const feedbackAction = e.target.id.replace('feedback_',''),
                feedbackFormHtml = $(`#feedback_templ #${feedbackAction}`).html();
        // console.log(`#feedback_templ #${e.target.id}`);
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
    $('.modal input#suggestVideoInput').off().on('input',(e)=>{

        const ytId = $(e.target).val();
        // console.log(ytId)
        if(ytId.length === 11 ){
            $(e.target).removeClass('is-invalid');

            $('.modal #yt_preview').show().attr('src','https://www.youtube.com/embed/'+ytId)
        }else if(ytId === '' || ytId.length < 11 ){
            $(e.target).addClass('is-invalid');
            $('.modal #yt_preview').hide();
        }else{
            if(ytId.split('watch?v=')[1]){
                $(e.target).val(ytId.split('watch?v=')[1]);
                $('.modal #yt_preview').show().attr('src','https://www.youtube.com/embed/'+ytId.split('watch?v=')[1])
                $(e.target).removeClass('is-invalid');
            }
        }
    });
}