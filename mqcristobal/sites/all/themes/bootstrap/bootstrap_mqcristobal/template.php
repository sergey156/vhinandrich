<?php

/**
 * @file template.php
 */

function bootstrap_mqcristobal_preprocess_node(&$vars) {
	$vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type . '__' . strtolower($vars['view_mode']);   
	$vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->nid . '__' . strtolower($vars['view_mode']);
}