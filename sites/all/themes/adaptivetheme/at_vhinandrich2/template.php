<?php

/**
 * Preprocess and Process Functions SEE: http://drupal.org/node/254940#variables-processor
 * 1. Rename each function and instance of "adaptivetheme_subtheme" to match
 *    your subthemes name, e.g. if your theme name is "footheme" then the function
 *    name will be "footheme_preprocess_hook". Tip - you can search/replace
 *    on "adaptivetheme_subtheme".
 * 2. Uncomment the required function to use.
 * 3. Read carefully, especially within at_vhinandrich2_preprocess_html(), there
 *    are extra goodies you might want to leverage such as a very simple way of adding
 *    stylesheets for Internet Explorer and a browser detection script to add body classes.
 */

/**
 * Override or insert variables into the html templates.
 */
function at_vhinandrich2_preprocess_html(&$vars) {
  global $theme_key;
  
  // Load the media queries styles
  // Remember to rename these files to match the names used here - they are
  // in the CSS directory of your subtheme.
  $media_queries_css = array(
    'adaptivetheme_subtheme.responsive.style.css',
    'adaptivetheme_subtheme.responsive.gpanels.css'
  );
  load_subtheme_media_queries($media_queries_css, $theme_key);

 /**
  * Load IE Stylesheets
  *
  * AT automates adding IE stylesheets, simply add to the array using
  * the conditional comment as the key and the stylesheet name as the value.
  *
  * See our online help: http://adaptivethemes.com/documentation/working-with-internet-explorer
  *
  * For example to add a stylesheet for IE8 only use:
  *
  *  'IE 8' => 'ie-8.css',
  *
  * Your IE CSS file must be in the /css/ directory in your subtheme.
  */
  /* -- Delete this line to add a conditional stylesheet for IE 7 or less.
  $ie_files = array(
    'lte IE 7' => 'ie-lte-7.css',
  );
  load_subtheme_ie_styles($ie_files, $theme_key);
  // */
  
  // Add class for the active theme name
  /* -- Delete this line to add a class for the active theme name.
  $vars['classes_array'][] = drupal_html_class($theme_key);
  // */

  // Browser/platform sniff - adds body classes such as ipad, webkit, chrome etc.
  /* -- Delete this line to add a classes for the browser and platform.
  $vars['classes_array'][] = css_browser_selector();
  // */

}

function at_vhinandrich2_preprocess_page(&$vars) {
	//dsm($vars);
	
	$breadcrumb = null;
	
	$nodes = null;
	if(array_key_exists('nodes', $vars['page']['content']['system_main'])){
		$nodes = $vars['page']['content']['system_main']['nodes'];
	}
	if($nodes){
		foreach($nodes as $nid => $content){
			$node = node_load( $nid );
			if($node->type == 'video'){
				$breadcrumb[] = l('Home', '<front>');
				$breadcrumb[] = l('Gallery', 'gallery');
				$breadcrumb[] = l('Videos', 'gallery/videos');
				//$breadcrumb[] = l(drupal_get_title(), base_path() . request_uri()); // Link to current URL
			}
			if($node->type == 'flickr_set_page'){
				$breadcrumb[] = l('Home', '<front>');
				$breadcrumb[] = l('Gallery', 'gallery');
				$breadcrumb[] = l('Photos', 'gallery/photos');
			}
			if($node->type == 'image'){
				$breadcrumb[] = l('Home', '<front>');
				$breadcrumb[] = l('Gallery', 'gallery');
				$breadcrumb[] = l('Photos', 'gallery/photos');
				
				$res = array();
				$res = db_select('field_data_field_image_reference', 'r')
						->fields('r')
						->condition('field_image_reference_nid', $node->nid, '=')
						->execute()
						->fetchAssoc();
				if(is_array($res) && array_key_exists('entity_id', $res)){
					$tmp_node = node_load($res['entity_id']);
					//dsm($tmp_node);
					$breadcrumb[] = l($tmp_node->title, 'node/'.$tmp_node->nid);
				}
			}
			break;
		}
	}
	
	if($breadcrumb){
		// Set Breadcrumbs
		drupal_set_breadcrumb($breadcrumb);
	}
}


/* -- Delete this line if you want to use this function
function at_vhinandrich2_process_html(&$vars) {
}
// */

/**
 * Override or insert variables into the page templates.
 */
/* -- Delete this line if you want to use these functions
function at_vhinandrich2_preprocess_page(&$vars) {
}

function at_vhinandrich2_process_page(&$vars) {
}
// */

/**
 * Override or insert variables into the node templates.
 */
/* -- Delete this line if you want to use these functions
function at_vhinandrich2_preprocess_node(&$vars) {
}

function at_vhinandrich2_process_node(&$vars) {
}
// */

/**
 * Override or insert variables into the comment templates.
 */
/* -- Delete this line if you want to use these functions
function at_vhinandrich2_preprocess_comment(&$vars) {
}

function at_vhinandrich2_process_comment(&$vars) {
}
// */

/**
 * Override or insert variables into the block templates.
 */
/* -- Delete this line if you want to use these functions
function at_vhinandrich2_preprocess_block(&$vars) {
}

function at_vhinandrich2_process_block(&$vars) {
}
// */

/**
 * Add the Style Schemes if enabled.
 * NOTE: You MUST make changes in your subthemes theme-settings.php file
 * also to enable Style Schemes.
 */
/* -- Delete this line if you want to enable style schemes.
// DONT TOUCH THIS STUFF...
function get_at_styles() {
  $scheme = theme_get_setting('style_schemes');
  if (!$scheme) {
    $scheme = 'style-default.css';
  }
  if (isset($_COOKIE["atstyles"])) {
    $scheme = $_COOKIE["atstyles"];
  }
  return $scheme;
}
if (theme_get_setting('style_enable_schemes') == 'on') {
  $style = get_at_styles();
  if ($style != 'none') {
    drupal_add_css(path_to_theme() . '/css/schemes/' . $style, array(
      'group' => CSS_THEME,
      'preprocess' => TRUE,
      )
    );
  }
}
// */
