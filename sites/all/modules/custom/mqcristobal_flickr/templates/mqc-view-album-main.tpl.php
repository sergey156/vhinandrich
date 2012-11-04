<?php
	//dsm($args);
	$size = 7;
	$photo = $args['photo'][$size];
	
	$margin_top = 0;
	if($photo['height'] < 500){
		$margin_top = $photo['height'] / 4;
	}else{
		$margin_top = -1 * ($photo['height'] / 4);
	}
?>
<div style="margin:<?php print $margin_top.'px'; ?> auto 0;width:<?php print $photo['width']; ?>px">
<img src="<?php print $photo['source']; ?>" style="max-width:none" />
</div>