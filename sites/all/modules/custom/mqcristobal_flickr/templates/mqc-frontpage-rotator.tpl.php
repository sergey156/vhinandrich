<?php
	$mod_path = drupal_get_path('module', 'mqcristobal_flickr');
	drupal_add_js(array('mqcristobal_flickr' => array('data' => $args['photos'], 'type' => 'random-photos' )), 'setting');
	drupal_add_js(drupal_get_path('module', 'mqcristobal_flickr') . '/templates/js/mqc-frontpage-rotator.js');
	drupal_add_css($mod_path . '/templates/css/mqc-frontpage-rotator.css');
?>
<div class="mqc-flickr-main-page-rotator">
    <div class="mqc-flickr-main-page-rotator-container">
        <div class="mqc-flickr-main-page-rotator-holder" style="width:10240px;margin-left:0"> <!-- 10240 = 10 (images) x 1024 (width)-->
            <ul>
                <?php foreach($args['photos'] as $photo): ?>
                    <li id="mqc-flickr-photo-<?php print $photo['id']; ?>">
                        <div id="mqc-flickr-photo-container-<?php print $photo['id']; ?>" class="mqc-flickr-photo-container">
                            <!--<span><img src="<?php print $mod_path; ?>/templates/images/loader-blue-black.gif" alt="<?php print $photo['title']; ?>" /></span>-->
                            <div class="mqc-flickr-photo-loader">
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="mqc-flickr-main-page-rotator-pager">
    	<ul>
        	<?php $i = 1; ?>
        	<?php foreach($args['photos'] as $photo): ?>
            	<li id="mqc-flickr-photo-pager-<?php print $photo['id']; ?>">
                	<span class="mqc-flickr-photo-pager-btn <?php if($i==1){ print 'selected'; } ?>" id="mqc-flickr-photo-pager-btn-<?php print $i; ?>" href="#">&nbsp;</span>
                </li>
                <?php $i++; ?>
			<?php endforeach; ?>
        </ul>
    </div>
</div>