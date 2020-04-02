let player;
function onYouTubeIframeAPIReady(id,after) {
    player = new YT.Player('mediaView', {
        width: 600,
        height: 400,
        videoId: id,
        playerVars: {
            color: 'white'
        },
        events: {
            onReady: initialize
        }
    });
    if(after)after()
}
let time_update_interval;
function initialize(){

    // Update the controls on load
    updateTimerDisplay();
    updateProgressBar();

    // Clear any old interval.
    clearInterval(time_update_interval);

    // Start interval to update elapsed time display and
    // the elapsed part of the progress bar every second.
   time_update_interval = setInterval(function () {
        updateTimerDisplay();
        updateProgressBar();
    }, 1000)

}
function updateTimerDisplay(){

        $('#current-time').text(formatTime( player.getCurrentTime() ));
        $('#duration').text(formatTime( player.getDuration() ));

    // Update current time text display.
   
}

function formatTime(time){
    time = Math.round(time);

    var minutes = Math.floor(time / 60),
    seconds = time - minutes * 60;

    seconds = seconds < 10 ? '0' + seconds : seconds;

    return minutes + ":" + seconds;
}
$('#progress-bar').on('mouseup touchend', function (e) {

    // Calculate the new time for the video.
    // new time in seconds = total duration in seconds * ( value of range input / 100 )
    var newTime = player.getDuration() * (e.target.value / 100);

    // Skip video to new time.
    player.seekTo(newTime);

});

// This function is called by initialize()
function updateProgressBar(){
    // Update the value of our progress bar accordingly.
    $('#progress-bar').val((player.getCurrentTime() / player.getDuration()) * 100);
}
function stopVideo() {
    try{
        player.stopVideo();
    }catch(e){
        $('#mediaView').attr('src','')
    }
    
  }
  function onPlayerReady(event) {
    event.target.playVideo();
  }
  let done = false;
    function onPlayerStateChange(event) {
      if (event.data == YT.PlayerState.PLAYING && !done) {
        //setTimeout(stopVideo, 6000);
        //done = true;
        console.log(event)
      }
    }
   