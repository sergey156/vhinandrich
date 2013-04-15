<?php
	drupal_add_js(path_to_theme() . '/js/jquery.touchSwipe.min.js');
	drupal_add_js(path_to_theme() . '/js/page.js');
?>

<div id="page-top">
  <header class="clearfix vhinrich-header" role="banner">

	<div id="top-menu-bar">
    	<div class="menu-up">▲</div>
    	<div class="menu-down">▼</div>
        <div class="nav" id="primary-menu-bar"><nav class="clearfix">
        <?php 
            $main_menu = variable_get('menu_main_links_source', 'main-menu');
            $tree = menu_tree($main_menu);
            print drupal_render($tree);
        ?>
        </nav></div>
        <!--<div id="primary-menu-bar-submenu">
            <nav class="clearfix">
                <ul>
                    <li><a href="#">ABC</a></li>
                    <li><a href="#">DEF</a></li>
                </ul>
            </nav>
        </div>-->
    </div>
    
    <?php if ($linked_site_logo): ?>
      <!--<div id="logo"><?php print $linked_site_logo; ?></div>-->
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <hgroup<?php if (!$site_slogan && $hide_site_name): ?> class="<?php print $visibility; ?>"<?php endif; ?> style="display:none">
        <?php if ($site_name): ?>
          <h1 id="site-name"<?php if ($hide_site_name): ?> class="<?php print $visibility; ?>"<?php endif; ?>><?php print $site_name; ?></h1>
        <?php endif; ?>
        <?php if ($site_slogan): ?>
          <h2 id="site-slogan"><?php print $site_slogan; ?></h2>
        <?php endif; ?>
      </hgroup>
    <?php endif; ?>

    <?php print render($page['header']); ?>
    
    <!--<?php if ($primary_navigation): print $primary_navigation; endif; ?>-->

	<?php if ($linked_site_logo): ?>
      <div id="logo"><?php print $linked_site_logo; ?></div>
    <?php endif; ?>

  </header>
</div>

<div id="page" class="container">
	
  <?php print render($page['leaderboard']); ?>

  <?php print render($page['menu_bar']); ?>
  <!--<?php if ($secondary_navigation): print $secondary_navigation; endif; ?>-->

  <?php print $messages; ?>
  <?php print render($page['help']); ?>

  <?php print render($page['secondary_content']); ?>

  <div id="columns"><div class="columns-inner clearfix">
    <div id="content-column"><div class="content-inner">

      <?php print render($page['highlighted']); ?>

      <?php $tag = $title ? 'section' : 'div'; ?>
      <<?php print $tag; ?> id="main-content" role="main">

        <?php print render($title_prefix); ?>
        <?php if ($title || $primary_local_tasks || $secondary_local_tasks || $action_links = render($action_links)): ?>
          <header>
            <?php if ($title && !drupal_is_front_page()): ?>
              <h1 id="page-title"><?php print $title; ?></h1>
              <?php if ($breadcrumb): ?>
                <nav id="breadcrumb"><?php print $breadcrumb; ?></nav>
              <?php endif; ?>
            <?php endif; ?>

            <?php if ($primary_local_tasks || $secondary_local_tasks || $action_links): ?>
              <div id="tasks">
                <?php if ($primary_local_tasks): ?>
                  <ul class="tabs primary clearfix"><?php print render($primary_local_tasks); ?></ul>
                <?php endif; ?>
                <?php if ($secondary_local_tasks): ?>
                  <ul class="tabs secondary clearfix"><?php print render($secondary_local_tasks); ?></ul>
                <?php endif; ?>
                <?php if ($action_links = render($action_links)): ?>
                  <ul class="action-links clearfix"><?php print $action_links; ?></ul>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </header>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
       
        <?php if(!drupal_is_front_page()): ?>
        	<div id="content">
				<?php print render($page['content']); ?>
            	<div id="back-to-top-wrapper" style="text-align:center;opacity:.5;padding:10px 0;">
                    <a href="#" style="color:#06F;text-decoration:none;font-weight:bold;font-size:16px;text-transform:capitalize" id="back-to-top">Scroll to top</a>
                </div>
            </div>
		<?php else: ?>
              <?php 
			$homepage_rotator_view = views_get_view_result('home_page_rotator', 'default');
			$homepage_banner_view = views_get_view_result('home_page_banner', 'default');
		?>
            <div id="vhinrich-mp-rotator">
                <ul class="vhinrich-mp-rotator-active">
                    <?php $i = 0; ?>
                    <?php foreach($homepage_rotator_view as $homepage_rotator): ?>
                        <?php 
                            $hpr_node = node_load($homepage_rotator->nid);
                            $main_image_node = node_load($hpr_node->field_main_image['und'][0]['nid']); 
                            $main_image_node->field_image['und'][0]['alt'] = $hpr_node->title;
                            $img_arr = array(
                                'item' => $main_image_node->field_image['und'][0],
                                'image_style' => 'home-page-rotator-3',
                            );
                            $image_rotator = theme_image_formatter($img_arr);
                            $i++;
                        ?>
                        <?php if($i<=2): ?>
                            <li id="hpr-active-item-<?php print $i; ?>" class="hpr-item <?php if($i == 1){ print 'active';} ?>" style="z-index:<?php print 2-$i; ?>">
                                <?php print $image_rotator; ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <ul class="vhinrich-mp-rotator"  style="display:none">
                    <?php $i = 0; ?>
                    <?php foreach($homepage_rotator_view as $homepage_rotator): ?>
                        <?php 
                            $hpr_node = node_load($homepage_rotator->nid);
                            $main_image_node = node_load($hpr_node->field_main_image['und'][0]['nid']); 
                            $main_image_node->field_image['und'][0]['alt'] = $hpr_node->title;
                            $img_arr = array(
                                'item' => $main_image_node->field_image['und'][0],
                                'image_style' => 'home-page-rotator-3',
                            );
                            $image_rotator = theme_image_formatter($img_arr);
                            $i++;
                        ?>
                        <li id="hpr-item-<?php print $i; ?>" class="hpr-item <?php if($i == 1){ print 'active';} ?>">
                            <?php print $image_rotator; ?>
                            <!--
                            <div class="hpr-content-button"><a class="hpr-show-info" href="#" title="click here to display/hide info."></a></div>
                            <div class="hpr-content-container">
                                <div>
                                    <section>
                                        <header>
                                            <h1><?php print $hpr_node->title; ?></h1>
                                        </header>                                    
                                        <div style="float:right;">
                                        <?php					
                                            // First get all of the options for the sharethis widget from the database:
    //										$data_options = sharethis_get_options_array();
    //										$mPath =  url(drupal_get_path_alias('node/' . $hpr_node->nid), array('absolute' => TRUE));
    //										$mTitle = drupal_get_title();
    //										print sharethis_get_button_HTML($data_options, $mPath, $mTitle);
                                        ?></div>
                                        <?php if($hpr_node->body): ?>
                                            <div>
                                                <?php print $hpr_node->body['und'][0]['value']; ?>
                                            </div>
                                        <?php endif; ?>
                                    </section>
                                </div>
                            </div>
                            -->
                        </li>
                    <?php endforeach; ?>
                </ul>
                
                <ul class="vhinrich-mp-rotator-nav">
                    <?php $i = 0; ?>
                    <?php foreach($homepage_rotator_view as $homepage_rotator): ?>
                        <?php 
                            $hpr_node = node_load($homepage_rotator->nid);
                            $main_image_node = node_load($hpr_node->field_main_image['und'][0]['nid']); 
                            $main_image_node->field_image['und'][0]['alt'] = $hpr_node->title;
                            $img_arr = array(
                                'item' => $main_image_node->field_image['und'][0],
                                'image_style' => 'home-page-rotator-3',
                            );
                            $image_rotator = theme_image_formatter($img_arr);
                            $i++;
                        ?>
                        <li id="hpr-item-nav-<?php print $i; ?>" class="hpr-item <?php if($i == 1){ print 'active';} ?>">
                            <div class="nav-item <?php if($i == 1){ print 'active';} ?>"></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                
                <ul class="vhinrich-mp-rotator-mobile"  style="display:none">
                    <?php $i = 0; ?>
                    <?php foreach($homepage_rotator_view as $homepage_rotator): ?>
                        <?php 
                            $hpr_node = node_load($homepage_rotator->nid);
                            $main_image_node = node_load($hpr_node->field_main_image['und'][0]['nid']); 
                            $main_image_node->field_image['und'][0]['alt'] = $hpr_node->title;
                            $img_arr = array(
                                'item' => $main_image_node->field_image['und'][0],
                                'image_style' => 'home-page-rotator-mobile',
                            );
                            $image_rotator = theme_image_formatter($img_arr);
                            $i++;
                        ?>
                        <li id="hpr-mobile-item-<?php print $i; ?>" class="hpr-item <?php if($i == 1){ print 'active';} ?>">
                            <?php print $image_rotator; ?>
                            <!--
                            <div class="hpr-content-button"><a class="hpr-show-info" href="#" title="click here to display/hide info."></a></div>
                            <div class="hpr-content-container">
                                <div>
                                    <section>
                                        <header>
                                            <h1><?php print $hpr_node->title; ?></h1>
                                        </header>                                    
                                        <div style="float:right;">
                                        <?php					
                                            // First get all of the options for the sharethis widget from the database:
    //										$data_options = sharethis_get_options_array();
    //										$mPath =  url(drupal_get_path_alias('node/' . $hpr_node->nid), array('absolute' => TRUE));
    //										$mTitle = drupal_get_title();
    //										print sharethis_get_button_HTML($data_options, $mPath, $mTitle);
                                        ?></div>
                                        <?php if($hpr_node->body): ?>
                                            <div>
                                                <?php print $hpr_node->body['und'][0]['value']; ?>
                                            </div>
                                        <?php endif; ?>
                                    </section>
                                </div>
                            </div>
                            -->
                        </li>
                    <?php endforeach; ?>
                </ul>
                
                <ul class="vhinrich-mp-rotator-mobile-nav">
                    <?php $i = 0; ?>
                    <?php foreach($homepage_rotator_view as $homepage_rotator): ?>
                        <?php 
                            $hpr_node = node_load($homepage_rotator->nid);
                            $main_image_node = node_load($hpr_node->field_main_image['und'][0]['nid']); 
                            $main_image_node->field_image['und'][0]['alt'] = $hpr_node->title;
                            $img_arr = array(
                                'item' => $main_image_node->field_image['und'][0],
                                'image_style' => 'home-page-rotator-3',
                            );
                            $image_rotator = theme_image_formatter($img_arr);
                            $i++;
                        ?>
                        <li id="hpr-item-nav-<?php print $i; ?>" class="hpr-item <?php if($i == 1){ print 'active';} ?>">
                            <div class="nav-item <?php if($i == 1){ print 'active';} ?>"></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <?php
				$timer_nid = variable_get('mqc_featured_node',0);
				$node_timer = node_load($timer_nid);
			?>
            <style>
				.timer-grayed{
					color:#fff !important;
					font-size:smaller !important;
				}
				.timer-focused{
					color:#00CCFF !important;
					font-size:x-large !important;
				}
				.front-page-timer{
					text-align:center;
					margin:0;
					padding:0;
					background:#eee;
					color:#bbb;
				}
				.front-page-timer:before{
					content: '';
					border-top: 1px solid lightGrey;
					width: 100%;
					border-bottom: 1px solid white;
					box-shadow: 0px 3px 30px #888;
					display: block;
				}
				.wedding_ct_timer.mqc-timer{
					margin:10px 0 0 !important;
				}
				.wedding-timer{
					background:#4A4B53;
					padding:5px 0 25px;
					margin-top:20px;
					box-shadow: 0px 3px 20px #eee;
					text-shadow:1px 1px 1px #111;
				}
				.wedding-will-start-in{
					text-shadow:0px 1px #fff;
					color:#bbb;
				}
				.wedding-will-start-in:before{
					border-color: transparent transparent #4A4B53;
					border-style: solid;
					border-width: 20px;
					content: " ";
					position:absolute;
					left:50%;
					margin:5px 0 0 -20px;
					padding:0;
					width:auto;
				}
				#vhinrich-mp-banner:before{
					border-color: transparent transparent #E3E3E3;
					border-style: solid;
					border-width: 20px;
					content: " ";
					position:absolute;
					left:50%;
					margin:-59px 0 0 -20px;
					padding:0;
					width:auto;
					box-shadow:none;
				}
			</style>
            <?php if($node_timer && $node_timer->type=='wedding_ct'): ?>
                <div class="front-page-timer">
                    <?php $datetime = $node_timer->field_date['und'][0]['value']; ?>
                    <script>
                        jQuery(document).ready(function(e) {
                            var _timer = null;
                            
                            clearTimeout(_timer);
                            _timer = setTimeout('mqc_timer()',1000);
                            mqc_timer = function(){
                                jQuery.ajax({
                                    type: 'GET',
                                    url: '/mqcristobal-timer/<?php print $datetime; ?>?front_page=true',
                                    dataType:'json',
                                    cache:false,
                                    beforeSend:function(){},
                                    success:function(data){
                                        jQuery('.mqc-timer').html(data['return']);
                                        clearTimeout(_timer);
                                        _timer = setTimeout('mqc_timer()',1000);
                                    }
                                });
                            }
                        });
                    </script>
        			<div class="wedding_ct_timer mqc-timer" style="font-size:larger"><span style="position:relative;z-index:99">Loading timer...</span></div>
                </div>
            <?php elseif($node_timer): ?>
                <div class="front-page-timer">
                	<div class="wedding-will-start-in" style="margin-top:10px"><?php print $node_timer->title; ?></div>
                    <div class="wedding-timer">
            			<div style="max-width:800px;margin:0 auto">
							<div style="width:97%;margin:0 auto"><?php print drupal_render(node_view($node_timer,'front_page_featured')); ?></div>
                        </div>
            		</div>
                </div>
			<?php endif; ?>
            
            <div id="vhinrich-mp-banner">
                <ul>
                    <?php $i=0; ?>
                    <?php foreach($homepage_banner_view as $homepage_banner): ?>
                        <?php 
                            $hpb_node = node_load($homepage_banner->nid);
                            //$main_image_node = node_load($hpb_node->field_main_image['und'][0]['nid']); 
                            //$main_image_node->field_image['und'][0]['alt'] = $hpb_node->title;
                            //$img_arr = array(
                            //	'item' => $main_image_node->field_image['und'][0],
                            //	'image_style' => 'home-page-rotator-mobile',
                            //);
                            //$image_rotator = theme_image_formatter($img_arr);
                            $i++;
                        ?>
                        <li id="hpb-mobile-item-<?php print $i; ?>" class="hpb-mobile-item">
                            <a href="<?php print $hpb_node->field_url['und'][0]['value']; ?>">
                                <h2><?php print $hpb_node->title; ?></h2>
                                <p><?php print $hpb_node->body['und'][0]['value']; ?></p>
                                <?php //print $image_rotator; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
		<?php endif; ?>
        

      </<?php print $tag; ?>>

      <?php print render($page['content_aside']); ?>

    </div></div>
    
	<?php print render($page['sidebar_first']); ?>
    <?php print render($page['sidebar_second']); ?>

  </div></div>

  <?php print render($page['tertiary_content']); ?>

  <?php if ($page['footer']): ?>
    <footer role="contentinfo"><?php print render($page['footer']); ?></footer>
  <?php endif; ?>


</div>