<?php 
	$size = 2;
	$photo = $args['photo'][$size];
	
	$margin_top = 0;
	$margin_left = 0;
	if($photo['height'] <= 160){
	}else{
		$margin_top = -1 * ($photo['height'] / 6.5);
	}
	if($photo['width'] <= 162){
	}else{
		$margin_left = -1 * ($photo['width'] / 6.5);	
	}
?>
<div class="mqc-flickr-album-thumb">
	<img src="<?php print $photo['source']; ?>" style="max-width:none" />
</div>