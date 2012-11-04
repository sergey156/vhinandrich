<?php
	//dsm($args);
	$mod_path = drupal_get_path('module', 'mqcristobal_flickr');
	drupal_add_js(array('mqcristobal_flickr' => array('data' => $args['photosets'], 'type' => 'photoset-primary' )), 'setting');
	drupal_add_js(drupal_get_path('module', 'mqcristobal_flickr') . '/templates/js/mqc-album-list.js');
	drupal_add_css($mod_path . '/templates/css/mqc-album-list.css');
?>
<div class="mqc-flickr-album-list-container">
	<ul>
    	<?php foreach($args['photosets'] as $photoset): ?>
        	<li class="mqc-flickr-photoset-container">
                <a href="./mqcristobal-flickr-view-album/<?php print $photoset['id']; ?>">
                <div class="mqc-flickr-set-cover-container" id="mqc-flickr-set-cover-container-<?php print $photoset['id']; ?>">
                	<div>
                    	
                    	<div class="mqc-flickr-photoset-detail">
                            <div class="mqc-flickr-photoset-title"><h2><?php print $photoset['title']['_content']; ?></h2></div>
                            <div class="mqc-flickr-photoset-count"><p><?php print $photoset['photos']; ?> photos</p></div>
                        </div>
						<span class="mqc-flickr-photoset-image" id="mqc-flickr-photoset-image-<?php print $photoset['id']; ?>"><?php print $photoset['title']['_content']; ?></span>
                    </div>
                </div>
                <!--<span><?php print $photoset['title']['_content']; ?></span>
                <span><?php print $photoset['photos']; ?> photos</span>--></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>