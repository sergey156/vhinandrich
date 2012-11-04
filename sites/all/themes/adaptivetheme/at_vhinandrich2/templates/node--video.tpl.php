<?php
//	$data_options = sharethis_get_options_array();
//    $path = isset($_GET['q']) ? $_GET['q'] : '<front>';
//    $mPath = url($_GET['q'], array('absolute' => TRUE));
//    $mTitle = drupal_get_title();
//    print sharethis_get_button_HTML($data_options, $mPath, $mTitle);
?>
<?php if( 0 > 1): ?>
<?php if($node->field_video && $node->field_video['und'][0]['file']->filemime == 'video/youtube'): ?>
<?php print theme('media_youtube_video',array(
			'uri' => $node->field_video['und'][0]['file']->uri,
			)); ?>
<?php elseif($node->field_video && $node->field_video['und'][0]['file']->filemime == 'video/vimeo'): ?>
<?php print theme('media_vimeo_video',array(
			'uri' => $node->field_video['und'][0]['file']->uri,
			)); ?>
<?php else: ?>
	<div>Ooooopppsss! Invalid media source XP</div>
<?php endif; ?>
<?php if($node->body && $node->body['und'] && $node->body['und'][0] && $node->body['und'][0]['value']): ?>
	<div style="margin-top:20px">
		<?php print $node->body['und'][0]['value']; ?>
    </div>
<?php endif; ?>
<?php endif; ?>