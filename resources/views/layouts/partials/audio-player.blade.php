<!-- Include Plyr CSS -->
<link href="https://cdn.plyr.io/3.6.8/plyr.css" rel="stylesheet" />

<div class="fixed bottom-0 left-0 w-full bg-white shadow-lg z-50">
    <div class="flex items-center justify-between p-4">
        <!-- Left Section: Podcast Title and Logo -->
        <div class="flex items-center space-x-4">
            <!-- Logo -->
            <img src="{{ asset('static/logo.png') }}" alt="Logo" class="h-8 w-8">
            <!-- Podcast Title -->
            <div class="text-lg font-semibold text-gray-800">
                {{ $podcast->title }}
            </div>
        </div>

        <!-- Center Section: Audio Player -->
        <div class="flex items-center w-1/2">
            <audio id="audioPlayer" controls preload="auto" class="w-full">
                <source src="{{ route('getAudio', $podcast->audio_file) }}" type="audio/mp3">
            </audio>
        </div>

        <!-- Right Section: Empty or Additional Controls -->
        <div></div>
    </div>
</div>

<!-- Include Plyr JS -->
<script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>

<script>
    // Initialize Plyr for the audio player
    const player = new Plyr('#audioPlayer', {
        hideControls: true, // Hide the default controls to make it custom
        controls: ['play', 'progress', 'current-time', 'mute', 'volume'], // Keep the necessary controls visible
        download: false,    // Hide the download button
    });

    // Get the audio element
    const audio = document.getElementById('audioPlayer');

    // Handle keyboard shortcuts
    document.addEventListener('keydown', function(event) {
        // Cho phép Ctrl+Shift+Số (Windows) hoặc Cmd+Shift+Số (Mac)
        const isMac = navigator.platform.toUpperCase().indexOf('MAC') >= 0;
        const ctrlOrCmd = isMac ? event.metaKey : event.ctrlKey;

        if (ctrlOrCmd && event.shiftKey) {
            switch (event.key) {
                case '1':
                    event.preventDefault();
                    if (audio.paused) {
                        audio.play();
                    } else {
                        audio.pause();
                    }
                    break;
                case '2':
                    event.preventDefault();
                    audio.currentTime -= 5;
                    break;
                case '3':
                    event.preventDefault();
                    audio.currentTime += 5;
                    break;
            }
        }
    });
</script>
