<link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/plyr/plyr.css">
<script src="<?php echo base_url(); ?>assets/global/plyr/plyr.js"></script>
<script>
    var player = new Plyr('#player', {
        youtube: {
            // Options for YouTube player
            controls: 1, // Show YouTube controls
            modestBranding: false, // Show YouTube logo
            showinfo: 1, // Show video title and uploader on play
            rel: 0, // Show related videos at the end
            iv_load_policy: 3, // Do not show video annotations
            cc_load_policy: 1, // Show captions by default
            autoplay: false, // Do not autoplay
            loop: false, // Do not loop the video
            mute: false, // Do not mute the video
            start: 0, // Start at this time (in seconds)
            end: null // End at this time (in seconds)
        }
    });
</script>

<style type="text/css">
    .plyr__progress video {
        width: 180px !important;
        height: auto !important;
        position: absolute !important;
        bottom: 30px !important;
        z-index: 1 !important;
        border-radius: 10px !important;
        border: 2px solid #fff !important;
        display: none;
        background-color: #000;
    }

    .plyr__progress video:hover {
        display: none !important;
    }

    video:not(.plyr:fullscreen video) {
        width: 100%;
        max-height: auto !important;
        max-height: 567px !important;
        border-radius: 5px;
    }

    /* Overlay and progress bar styling */
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        visibility: hidden;
    }

    /* Circular progress bar container */
    .circular-progress-container {
        position: relative;
        width: 100px;
        height:100px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Outer circle border (for border effect) */
    .outer-circle {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        stroke: #ddd; /* Border color */
        stroke-width: 7;
        fill: none;
    }

    /* Inner circle for progress animation */
    .circular-progress {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        stroke-dasharray: 440; /* Circumference of the circle */
        stroke-dashoffset: 440;
        stroke: #6610f2; /* Progress color */
        stroke-width: 7;
        fill: none;
        transition: stroke-dashoffset 5s linear;
    }

    .progress-ring {
        transform: rotate(-90deg); /* To start progress from the top */
    }

    .cancel-icon {
        position: absolute;
        top: 6px;
        right: 6px;
        cursor: pointer;
        background: #ff0000;
        color: #fff;
        font-size: 18px;
        height: 30px;
        width: 30px;
        line-height: 32px;
        border-radius: 50%;
        text-align: center;
    }
    .overlay-text {
        position: absolute;
        font-size: 16px;
        color: #ffffff;
        text-align: center;
        top: 70%;
        transform: translateY(-50%);
    }
</style>

<div class="overlay" id="nextVideoOverlay">
    <div class="circular-progress-container">
        <svg class="progress-ring" width="100" height="100">
            <!-- Outer Circle (border) -->
            <circle class="outer-circle" cx="50" cy="50" r="45" />
            <!-- Inner Circle (progress) -->
            <circle class="circular-progress" cx="50" cy="50" r="45" />
        </svg>
    </div>
    <div class="overlay-text">Playing next video in <span id="countdown">5</span> sec</div>
    <div class="cancel-icon" id="cancelNextVideo">✖</div>
</div>

<script type="text/javascript">
    // Define elements for overlay and countdown
    const overlay = document.getElementById('nextVideoOverlay');
    const countdownElement = document.getElementById('countdown');
    const cancelNextVideoButton = document.getElementById('cancelNextVideo');
    let countdownInterval;

    // Function to start countdown
    function startCountdown() {
        let countdown = 5; // Countdown set to 5 seconds
        countdownElement.textContent = countdown;
        overlay.style.visibility = 'visible';

        // Restart the circular progress animation
        const circleProgress = document.querySelector('.circular-progress');
        circleProgress.style.transition = 'none'; // Remove previous transition
        circleProgress.style.strokeDashoffset = 440; // Reset stroke offset
        setTimeout(() => {
            circleProgress.style.transition = 'stroke-dashoffset 5s linear';
            circleProgress.style.strokeDashoffset = 0; // Animate the circle fill to complete
        }, 10);

        countdownInterval = setInterval(() => {
            countdown -= 1;
            countdownElement.textContent = countdown;

            if (countdown <= 0) {
                clearInterval(countdownInterval);
                overlay.style.visibility = 'hidden';

                let lesson_id = '<?php echo $lesson_details['id']; ?>';
                let course_id = '<?php echo $course_details['id']; ?>';
                var next_lesson_id = '<?php echo next_lesson($course_details['id'], $lesson_details['id']); ?>';

                if (next_lesson_id) {
                    const url = '<?php echo site_url("home/lesson/"); ?>' + '/' + '<?php echo slugify($course_details['title']); ?>' + '/' + course_id + '/' + next_lesson_id;
                    window.location.href = url; // Redirect to the next lesson
                }
            }

        }, 1000);
    }

    // Event listener for video end
    if (typeof player === 'object' && player !== null) {
        player.on('ended', () => {
            console.log('Video has ended');
            var next_lesson_id = '<?php echo next_lesson($course_details['id'], $lesson_details['id']); ?>';
            if (next_lesson_id) {
                startCountdown(); // Start showing countdown when video ends
            }
        });
    }

    // Cancel next video if user clicks cancel icon
    cancelNextVideoButton.addEventListener('click', () => {
        clearInterval(countdownInterval);
        overlay.style.visibility = 'hidden';
        console.log('Next video playback canceled');
    });
</script>

<!-- Update Watch history and set current duration-->
<script type="text/javascript">
    let lesson_id = '<?php echo $lesson_details['id']; ?>';
    let course_id = '<?php echo $course_details['id']; ?>';
    var currentProgress = '<?php echo lesson_progress($lesson_details['id']); ?>';
    let previousSavedDuration = 0;
    let currentDuration = 0;

    if (typeof player === 'object' && player !== null) {
        setInterval(function() {
            currentDuration = parseInt(player.currentTime);
            if (lesson_id && course_id && (currentDuration % 5) == 0 && previousSavedDuration != currentDuration) {
                previousSavedDuration = currentDuration;

                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('home/update_watch_history_with_duration'); ?>',
                    data: {
                        lesson_id: lesson_id,
                        course_id: course_id,
                        current_duration: currentDuration
                    },
                    success: function(response) {
                        var responseVal = JSON.parse(response);
                        console.log(responseVal);
                        console.log(responseVal.course_progress);
                    }
                });
            }
        }, 900);
    }

    // Play from previous duration
    <?php $student_id = $this->session->userdata('user_id'); ?>
    <?php $watched_duration = $this->db->get_where('watched_duration', ['watched_lesson_id' => $lesson_details['id'], 'watched_student_id' => $student_id])->row_array(); ?>
    var previous_duration = <?php echo isset($watched_duration['current_duration']) && $watched_duration['current_duration'] > 0 ? $watched_duration['current_duration'] : 0; ?>;
    var previousTimeSetter = setInterval(function() {
        if (player.playing == false && player.currentTime != previous_duration) {
            player.currentTime = previous_duration;
            console.log(previous_duration);
            console.log(player.currentTime);
        } else {
            clearInterval(previousTimeSetter);
        }
    }, 200);

    $(document).ready(function() {
        setTimeout(function(){
            $('.remove_video_src').remove();
        }, 2000);
    });
</script>
