function TogglePlayer() {
	$("#WOCARadioPlayer").toggle(500);
	var Img = document.getElementById("MediaControlToggle");
	var Icon = Img.getAttribute("src");
	if(Icon == 'woca/radio-close.png'){Img.setAttribute("src", "woca/radio-open.png");}
	if(Icon == 'woca/radio-open.png'){Img.setAttribute("src", "woca/radio-close.png");}
	return false;
}

function RadioStatusUpdate(info){
	var RadioStatus = document.getElementById("RadioStatus");
	RadioStatus.innerHTML = info;
	return false;
}

function PlayerControl(action){
	var MediaPlayer = document.getElementById("RadioPlayer");
	var PlayPauseBtn = document.getElementById("PlayPauseBtn");
	var StopBtn = document.getElementById("StopBtn");
	var WaveBtn = document.getElementById("WaveBtn");
	var MediaPlayerStatus = document.getElementById("MediaPlayerStatus");
	var MediaPlayerControlPlayPauseStop = document.getElementById("MediaPlayerControlPlayPauseStop");
	var MediaPlayerControlMute = document.getElementById("MediaPlayerControlMute");

	var PlayPauseImg = PlayPauseBtn.getAttribute("src");
	var WaveImg = WaveBtn.getAttribute("src");


	//STOP MEDIA
	if(action == 'stop'){
		PlayPauseBtn.setAttribute("src", "woca/play.png");
		WaveBtn.setAttribute("src", "woca/wave.png");
		MediaPlayer.pause();
		MediaPlayer.currentTime = 0;
		MediaPlayer.volume = 1;
		MediaPlayerStatus.value = "stop";
		MediaPlayerControlPlayPauseStop.value = "stop";
		RadioStatusUpdate('Stopped');
		MediaPlayerControlPlayPauseStop.value = MediaPlayerStatus.value;
	}

	//PLAY/PAUSE MEDIA
	if(action == 'playpause'){
		if(MediaPlayerControlPlayPauseStop.value == 'stop' && MediaPlayerStatus.value == 'stop'){
			PlayPauseBtn.setAttribute("src", "woca/pause.png");
			WaveBtn.setAttribute("src", "woca/wave.gif");
			MediaPlayer.volume = 1;
			MediaPlayer.play();
			MediaPlayerStatus.value = "play";
			MediaPlayerControlPlayPauseStop.value = "play";
			RadioStatusUpdate('Playing');
			return;
		}

		else if(MediaPlayerControlPlayPauseStop.value == 'play' && MediaPlayerStatus.value == 'play'){
			PlayPauseBtn.setAttribute("src", "woca/play.png");
			WaveBtn.setAttribute("src", "woca/wave.png");
			MediaPlayer.pause();
			MediaPlayerStatus.value = "pause";
			MediaPlayerControlPlayPauseStop.value = "pause";
			RadioStatusUpdate('Paused');
			return;
		}

		else if(MediaPlayerControlPlayPauseStop.value == 'pause' && MediaPlayerStatus.value == 'pause'){
			PlayPauseBtn.setAttribute("src", "woca/pause.png");
			WaveBtn.setAttribute("src", "woca/wave.gif");
			MediaPlayer.play();
			MediaPlayerStatus.value = "play";
			MediaPlayerControlPlayPauseStop.value = "play";
			RadioStatusUpdate('Playing');
			return;
		}
		else if(MediaPlayerControlMute.value == 'on' && MediaPlayerStatus.value == 'mute'){
			if(MediaPlayerControlPlayPauseStop.value == 'play'){
				//pause while mute
				PlayPauseBtn.setAttribute("src", "woca/play.png");
				WaveBtn.setAttribute("src", "woca/wave-mute.png");
				MediaPlayer.pause();
				MediaPlayerStatus.value = "mute";
				MediaPlayerControlPlayPauseStop.value = "pause";
				RadioStatusUpdate('Paused');
				return;
			}

			else if(MediaPlayerControlPlayPauseStop.value == 'pause'){
				PlayPauseBtn.setAttribute("src", "woca/pause.png");
				WaveBtn.setAttribute("src", "woca/wave.gif");
				MediaPlayer.play();
				MediaPlayer.volume = 1;
				MediaPlayerStatus.value = "play";
				MediaPlayerControlPlayPauseStop.value = "play";
				MediaPlayerControlMute.value == 'off';
				RadioStatusUpdate('Playing');
				return;
			}
		}
	}



	//MUTE MEDIA
	if(action == 'mute'){
		if(MediaPlayerStatus.value != 'stop'){
			if(MediaPlayerControlMute.value == 'off'){
				WaveBtn.setAttribute("src", "woca/wave-mute.png");
				MediaPlayer.volume = 0;
				MediaPlayerStatus.value = 'mute';
				MediaPlayerControlMute.value = 'on';
				RadioStatusUpdate('Muted');
				return;
			}
			else {
				if(MediaPlayerControlPlayPauseStop.value == "play"){
					WaveBtn.setAttribute("src", "woca/wave.gif");
					MediaPlayer.play();
					MediaPlayer.volume = 1;
					MediaPlayerStatus.value = 'play';
					MediaPlayerControlMute.value = 'off';
					RadioStatusUpdate('Playing');
				}

				else if(MediaPlayerControlPlayPauseStop.value == "pause"){
					WaveBtn.setAttribute("src", "woca/wave.png");
					PlayPauseBtn.setAttribute("src", "woca/pause.png");
					MediaPlayer.pause();
					MediaPlayer.volume = 1;
					MediaPlayerStatus.value = 'pause';
					MediaPlayerControlMute.value = 'off';
					RadioStatusUpdate('Paused');
				}
			}
		}
	}

	return false;
}