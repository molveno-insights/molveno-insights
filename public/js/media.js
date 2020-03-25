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
            mediaCardsColl();
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
    const mediaCard = $('div.card'),
          mediaDefaultContainer = $('#mediaDefaultContainer'),
          mediaSortContainer = $('#mediaSortContainer .row');
    
          mediaCardsColl();
       
    $('#mediaSortOptions .option').on('click',(e)=>{
        console.log(mediaSortArr)
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
        }
        mediaSortContainer.parent().show();
        $('#mediaSortContainer h2').html(`${mediaSortArr.length} videos sorted by ${$(e.target).html().replace(' | ','')}`)
        mediaSortArr.map((item)=>mediaSortContainer.append(item.el));
        mediaDefaultContainer.hide(); 
        
        
    });
    $('.close').click(()=>{
        console.log(mediaSortArr)
        mediaSortContainer.parent().hide();
        mediaDefaultContainer.show();
        
        mediaSortArr.map((item)=>item.category.append(item.el));
        
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
            $('#viewRating').append($(`#media-rating-${mediaId}`))
            $('#viewClose').show().off().on('click',(e)=>{
                $(`#media-rating-container-${mediaId}`).append($(`#media-rating-${mediaId}`));
                $('#mediaView,#viewClose').hide();
                $('#mediaView').attr('src','');
                $("body").css("overflow", "auto");
            });
            const mediaViewCountElement = $(`#media-view-count-${mediaId}`);
            $('#mediaView').attr('src',`${mediaEl.href}`).show();
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
    $('.modal input#suggestVideoInput').off().on('input',(e)=>{
        const ytId = $(e.target).val();
        if(ytId.length === 11 ){
            $(e.target).removeClass('is-invalid');
            $('.modal #yt_preview').show().attr('src','https://www.youtube.com/embed/'+ytId);
        }else if(ytId === '' || ytId.length < 11 ){
            $(e.target).addClass('is-invalid');
            $('.modal #yt_preview').hide();
        }else{
            if(ytId.split('watch?v=')[1]){
                $(e.target).val(ytId.split('watch?v=')[1]);
                $('.modal #yt_preview').show().attr('src','https://www.youtube.com/embed/'+ytId.split('watch?v=')[1]);
                $(e.target).removeClass('is-invalid');
            }
        }
    });
}