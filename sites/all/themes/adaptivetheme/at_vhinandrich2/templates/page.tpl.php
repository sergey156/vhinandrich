<script type="text/javascript" language="javascript">
	var hpr_timer = null;
	var hpr_interval = 8000;
	clearInterval(hpr_timer);
	hpr_timer = setInterval('hpr_slide()', hpr_interval);
	
	var max_width = 1080;
	
	jQuery(document).ready(function(e) {
		
		
		var max_logo_mar_bot = jQuery('#logo a img').css('margin-bottom');
		
		if(jQuery(window).width() < max_width){
			jQuery('.vhinrich-mp-rotator-active').css('display','none');
			jQuery('.vhinrich-mp-rotator').css('display','block');
		}else{
			jQuery('.vhinrich-mp-rotator-active').css('display','block');
			jQuery('.vhinrich-mp-rotator').css('display','none');
		}
		
		jQuery(window).scroll(function(e) {
			//alert(jQuery(this).scrollTop());
			if(jQuery(window).width() >= max_width){
				var mar_bot = parseInt(max_logo_mar_bot) - jQuery(this).scrollTop();
				if(mar_bot >= jQuery('#logo a img').height() * -1){
					jQuery('#logo a img').css('margin-bottom', mar_bot);
				}
			}else{
				jQuery('#logo a img').css('margin-bottom', max_logo_mar_bot);	
			}
        });
		
		jQuery(window).resize(function(){
			if(jQuery(window).width() < max_width){
				jQuery('.vhinrich-mp-rotator-active').css('display','none');
				jQuery('.vhinrich-mp-rotator').css('display','block');
			}else{
				jQuery('.vhinrich-mp-rotator-active').css('display','block');
				jQuery('.vhinrich-mp-rotator').css('display','none');
			}
		});
		
		if(jQuery('.pager-load-more').length == 0){
			jQuery('#back-to-top-wrapper').css('display','none');		
		}else{
			jQuery('#back-to-top-wrapper').css('display','block');
		}
		
		jQuery('#back-to-top').click(function(e){
			jQuery('html,body').animate(
				{scrollTop:0},1000,function(){}
			);
		});
		
		jQuery('.hpr-show-info').click(function(e) {
            if(jQuery('.hpr-content-container').css('opacity') != 0){
				jQuery('.hpr-content-container').animate(
					{
						opacity:0
					},500,function(){
						jQuery(this).css('display', 'none');
					}
				);
			}else{
				jQuery('.hpr-content-container').css('display', 'block');
				jQuery('.hpr-content-container').animate(
					{
						opacity:1
					},500,function(){
						
					}
				);
			}
        });
		
		jQuery('#primary-menu-bar ul li.expanded').each(function(index, element) {
            jQuery(this).append('<div class="primary-menu-bar-submenu"></div>');
			jQuery(this).children('.primary-menu-bar-submenu').html(jQuery(element).children('ul'));
        });
		
		var timer = null;
		var curr_menu = null;
		jQuery('#primary-menu-bar ul li.expanded').hover(
			function(e){
				if(timer){
					clearTimeout(timer);
					timer = null;
				}
				curr_menu = jQuery(this);
				timer = setTimeout(function(){
						
					//jQuery(this).children('ul.menu').css('display','inline');
					jQuery('.primary-menu-bar-submenu ul li').css('opacity','0');
					jQuery('.primary-menu-bar-submenu ul li').css('display','inline');
					jQuery('.primary-menu-bar-submenu ul li').css('visibility','visible');
					jQuery('.primary-menu-bar-submenu ul').animate(
						{
							height:40
						},200,function(){
							jQuery('.primary-menu-bar-submenu ul li').animate(
								{
									opacity:1
								},200,function(){
									jQuery('.primary-menu-bar-submenu ul li').css('display','inline-block');
									jQuery('.primary-menu-bar-submenu ul li').css('visibility','visible');
									jQuery('.primary-menu-bar-submenu ul li').css('opacity','1');
								}
							);
						}
					)
				},100);
			},
			function(e){
				//jQuery(this).children('ul.menu').css('display','none');
				if(timer){
					clearTimeout(timer);
					timer = null;
				}
				jQuery('.primary-menu-bar-submenu ul li').css('display','none');
				jQuery('.primary-menu-bar-submenu ul li').css('visibility','hidden');
				jQuery('.primary-menu-bar-submenu ul li').css('opacity','0');
				jQuery('.primary-menu-bar-submenu ul').animate(
					{height:0},100,function(){
						jQuery('.primary-menu-bar-submenu ul li').animate(
							{
								opacity:0
							},100,function(){
								jQuery('.primary-menu-bar-submenu ul li').css('display','none');
								jQuery('.primary-menu-bar-submenu ul li').css('visibility','hiddedn');
								jQuery('.primary-menu-bar-submenu ul li').css('opacity','0');
							}
						);
					}
				);
			}
		);
    });
	
	hpr_slide = function(){
		if(jQuery(window).width() >= max_width){
			clearInterval(hpr_timer);
			jQuery('.vhinrich-mp-rotator-active .hpr-item.active').animate(
				{
					opacity:0
				},1000,function(){
					var hpr_active_id = (jQuery('.vhinrich-mp-rotator .hpr-item.active').attr('id'));
					if(hpr_active_id){
						hpr_active_id = hpr_active_id.replace('hpr-item-','');
					}
					var hpr_item_count = jQuery('.vhinrich-mp-rotator .hpr-item').length;
					if(hpr_item_count == hpr_active_id){
						hpr_active_id = 1;
					}else{
						hpr_active_id = parseInt(hpr_active_id) + parseInt(1);
					}
					jQuery('.vhinrich-mp-rotator .hpr-item').removeClass('active');
					jQuery('.vhinrich-mp-rotator #hpr-item-' + hpr_active_id).addClass('active');
					
					jQuery('.vhinrich-mp-rotator-active').html('');
					
					var hpr_next_active_id = hpr_active_id;
					if(hpr_active_id == hpr_item_count){
						hpr_next_active_id = 1;
					}else{
						hpr_next_active_id = parseInt(hpr_active_id) + parseInt(1);
					}
					
					var active_li = jQuery('.vhinrich-mp-rotator #hpr-item-' + hpr_active_id).html();
					active_li = '<li class="hpr-item active" id="hpr-item-1">' + active_li + '</li>';
					var next_li = jQuery('.vhinrich-mp-rotator #hpr-item-' + hpr_next_active_id).html();
					next_li = '<li class="hpr-item" id="hpr-item-2">' + next_li + '</li>';
					
					jQuery('.vhinrich-mp-rotator-active').append(active_li);
					jQuery('.vhinrich-mp-rotator-active').append(next_li);
					
					jQuery('.vhinrich-mp-rotator-active .hpr-item').css('z-index',0);
					jQuery('.vhinrich-mp-rotator-active .hpr-item.active').css('z-index',1);
					
					
					hpr_timer = setInterval('hpr_slide()', hpr_interval);
				}
			);
			/*var hpr_active_id = (jQuery('.hpr-item.active').attr('id'));
			if(hpr_active_id){
				hpr_active_id = hpr_active_id.replace('hpr-item-','');
			}
			
			jQuery('#hpr-item-' + hpr_active_id).animate(
				{
					opacity:0
				},500,function(){
					var hpr_item_count = jQuery('.hpr-item').length;
					if(hpr_item_count == hpr_active_id){
						hpr_active_id = 1;
					}else{
						hpr_active_id = parseInt(hpr_active_id) + parseInt(1);
					}
					jQuery('.hpr-item').removeClass('active');
					jQuery('#hpr-item-' + hpr_active_id).addClass('active');
					jQuery('#hpr-item-' + hpr_active_id).css('opacity',0);
					jQuery('#hpr-item-' + hpr_active_id).animate(
						{
							opacity:1
						},500,function(){
							hpr_timer = setInterval('hpr_slide()', hpr_interval);
						}
					);
				}
			);*/
		}
	}
	
	jQuery(document).ready(function(e) {
		(function ($) {
			Drupal.behaviors.slider = {
				attach:function(context) {
					var script = 'http://s7.addthis.com/js/250/addthis_widget.js#domready=1';
					if (window.addthis) {
						window.addthis = null;
					}
					$.getScript(script);
		
				}
		
			};
		}(jQuery));
    });
	
</script>

<div id="page-top">
  <header class="clearfix vhinrich-header" role="banner">

	<div id="top-menu-bar">
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
        	<div id="content"><?php print render($page['content']); ?></div>
		<?php else: ?>
              <?php 
			$homepage_rotator_view = views_get_view_result('home_page_rotator', 'default');
		?>
		<div id="vhinrich-mp-rotator">
        	<ul class="vhinrich-mp-rotator-active">
            	<?php $i = 0; ?>
				<?php foreach($homepage_rotator_view as $homepage_rotator): ?>
                	<?php 
						$hpr_node = node_load($homepage_rotator->nid);
						$main_image_node = node_load($hpr_node->field_main_image['und'][0]['nid']); 
						$img_arr = array(
							'item' => $main_image_node->field_image['und'][0],
							'image_style' => 'home-page-rotator-2'
						);
						$image_rotator = theme_image_formatter($img_arr);
						$i++;
					?>
                    <?php if($i<=2): ?>
                        <li id="hpr-item-<?php print $i; ?>" class="hpr-item <?php if($i == 1){ print 'active';} ?>" style="z-index:<?php print 2-$i; ?>">
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
						$img_arr = array(
							'item' => $main_image_node->field_image['und'][0],
							'image_style' => 'home-page-rotator-2'
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
		</div>
        
		<?php endif; ?>
        

      </<?php print $tag; ?>>

      <?php print render($page['content_aside']); ?>

    </div></div>
    
	<?php print render($page['sidebar_first']); ?>
    <?php print render($page['sidebar_second']); ?>

  </div></div>

  <?php print render($page['tertiary_content']); ?>

  
    <div id="back-to-top-wrapper" style="text-align:center;background:#636;opacity:.5;padding:10px 0;margin:10px 0 0">
    	<a href="#" style="color:white;text-decoration:none;font-weight:bold" id="back-to-top">Scroll to top</a>
    </div>
    
  <?php if ($page['footer']): ?>
    <footer role="contentinfo"><?php print render($page['footer']); ?></footer>
  <?php endif; ?>


</div>