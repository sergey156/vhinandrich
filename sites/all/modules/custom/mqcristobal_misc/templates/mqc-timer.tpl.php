<?php
	$days = floor($time_remaining / (60 * 60 * 24));
	$remainder = $time_remaining % (60 * 60 * 24);
	$hours = floor($remainder / (60 * 60));
	$remainder = $remainder % (60 * 60);
	$minutes = floor($remainder / 60);
	$seconds = $remainder % 60;  
?>
<style>
	.timer-grayed{
		color:#999;
	}
	.timer-focused{
		color:#222;
		font-size:large;
	}
</style>
<div>
	<span><span class="timer-focused"><?php print $days; ?></span> <span class="timer-grayed">Days</span></span>
	<span><span class="timer-focused"><?php print $hours; ?></span> <span class="timer-grayed">Hours</span></span>
	<span><span class="timer-focused"><?php print $minutes; ?></span> <span class="timer-grayed">Minutes</span></span>
	<span><span class="timer-focused"><?php print $seconds; ?></span> <span class="timer-grayed">Seconds</span></span>
</div>