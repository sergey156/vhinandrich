<?php

/**
 * @file template.php
 */

function bootstrap_mqcristobal_preprocess_node(&$vars) {
	$vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type . '__' . strtolower($vars['view_mode']);   
	$vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->nid . '__' . strtolower($vars['view_mode']);
}




function _bsmqc_get_image_path($node, $image_style){
	$url = array();
	$img = $node->field_image;
	if(isset($img[LANGUAGE_NONE])){
		foreach($img[LANGUAGE_NONE] as $image){
			$url[] = image_style_url($image_style, $image['uri']);
		}
	}
	return $url;
}