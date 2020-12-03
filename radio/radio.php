<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>WOCA Radio</title>
	<style>body {margin: 0; background: #000;}</style>
	<link href="woca/radio.css" type="text/css" rel="stylesheet">
	<script src="woca/jquery.js"></script>
</head>
<body>
	<div id="WOCARadio">
		<div id="WOCARadioPlayer">
			<video preload="auto" autoplay id="RadioPlayer" data-playlist="https://api.radioking.io/radio/379069/listen.m3u"></video>
			<div id="MediaControlBar">
				<img src="woca/pause.png" class="MediaControlBtn" id="PlayPauseBtn" onclick="PlayerControl('playpause'); return false;">
				<img src="woca/stop.png" class="MediaControlBtn" id="StopBtn" onclick="PlayerControl('stop'); return false;">
				<img src="woca/wave.gif" class="MediaControlIndicator" id="WaveBtn" onclick="PlayerControl('mute'); return false;">
			</div>
		</div>
		<img src="woca/radio-close.png" id="MediaControlToggle" onclick="TogglePlayer(); return false;">
		<input name="MediaPlayerStatus" id="MediaPlayerStatus" value="playing" type="hidden">
		<input name="MediaPlayerStatusPrev" id="MediaPlayerStatusPrev" value="" type="hidden">
	</div>

	<script src="woca/stream.js"></script>
	<script>m3uStreamPlayer.init({selector: '#RadioPlayer', debug: true});</script>
	<script src="woca/radio.js"></script>
</body>
</html>