<?php
?>
<?php if($node->field_main_image): ?>
	<?php
		$main_image_node = node_load($node->field_main_image['und'][0]['nid']); 
		$img_arr = array(
			'item' => $main_image_node->field_image['und'][0],
			'image_style' => 'home-page-rotator'
		);
		$image_rotator = theme_image_formatter($img_arr);
		print $image_rotator;
	?>
<?php endif; ?>
<?php if($node->body): ?>
	<?php print $node->body['und'][0]['value']; ?>
<?php endif; ?>