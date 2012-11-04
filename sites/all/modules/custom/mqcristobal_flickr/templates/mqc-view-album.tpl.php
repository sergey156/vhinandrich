<?php
	$mod_path = drupal_get_path('module', 'mqcristobal_flickr');
	$args['photos']['photoset']['setid'] = $args['photos']['photoset']['id'];
	drupal_add_js(array('mqcristobal_flickr' => array('data' => $args['photos']['photoset'], 'type' => 'photoset-album' )), 'setting');
	drupal_add_js(drupal_get_path('module', 'mqcristobal_flickr') . '/templates/js/mqc-view-album.js');
	drupal_add_css($mod_path . '/templates/css/mqc-view-album.css');
	
	$photo_count = sizeof($args['photos']['photoset']['photo']);
?>
<div class="mqc-flickr-view-album">
    <div class="mqc-flickr-view-album-main-container">
        <div class="mqc-flickr-view-album-main-holder" style="width:<?php print ($photo_count * 1024); ?>px;margin-left:0">
            <ul class="mqc-flickr-view-album-main-list">
                <?php $i = 0; ?>
                <?php foreach($args['photos']['photoset']['photo'] as $photo): ?>
                    <li>
                        <div class="mqc-flickr-view-album-main-photo">
                            <span class="mqc-flickr-photoset-photo visible" id="mqc-flickr-photoset-photo-<?php print $photo['id']; ?>">
                                <?php print $photo['title']; ?>
                            </span>
                        </div>
                    </li>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="mqc-flickr-view-album-thumbs">
        <ul class="mqc-flickr-view-album-thumbs-list" style="width:<?php print ($i * 60); ?>px">
            <?php $i = 0; ?>
            <?php foreach($args['photos']['photoset']['photo'] as $photo): ?>
                <li>
                    <div class="mqc-flickr-view-album-thumbs-photo">
                        <span class="mqc-flickr-photoset-thumb" id="mqc-flickr-photoset-thumb-<?php print $photo['id']; ?>">
                            <?php print $photo['title']; ?>
                        </span>
                    </div>
                </li>
                <?php $i++; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>