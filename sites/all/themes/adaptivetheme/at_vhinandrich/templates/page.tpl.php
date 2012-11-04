<script type="text/javascript" language="javascript">
	var hpr_timer = null;
	var hpr_interval = 10000;
	clearInterval(hpr_timer);
	hpr_timer = setInterval('hpr_slide()', hpr_interval);
	
	jQuery(document).ready(function(e) {
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
		
		jQuery('#primary-menu-bar ul li.expanded').hover(
			function(e){
				jQuery(this).children('ul.menu').css('display','block');
			},
			function(e){
				jQuery(this).children('ul.menu').css('display','none');
			}
		);
    });
	
	hpr_slide = function(){
		clearInterval(hpr_timer);
		var hpr_active_id = (jQuery('.hpr-item.active').attr('id'));
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
		);
	}
</script>

<div id="page" class="container vhinrich-container">

  <?php print render($page['leaderboard']); ?>

  <header class="clearfix vhinrich-header" role="banner">

    <?php if ($linked_site_logo): ?>
      <div id="logo"><?php print $linked_site_logo; ?></div>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <hgroup<?php if (!$site_slogan && $hide_site_name): ?> class="<?php print $visibility; ?>"<?php endif; ?>>
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
    
    <div class="nav" id="primary-menu-bar"><nav class="clearfix">
    <?php 
		$main_menu = variable_get('menu_main_links_source', 'main-menu');
		$tree = menu_tree($main_menu);
		print drupal_render($tree);
	?>
    </nav></div>

  </header>

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
              <!--<?php if ($breadcrumb): ?>
                <nav id="breadcrumb"><?php print $breadcrumb; ?></nav>
              <?php endif; ?>-->
              <h1 id="page-title"><?php print $title; ?></h1>
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
			<ul class="vhinrich-mp-rotator">
				<?php $i = 0; ?>
				<?php foreach($homepage_rotator_view as $homepage_rotator): ?>
					<?php 
						$hpr_node = node_load($homepage_rotator->nid);
						$main_image_node = node_load($hpr_node->field_main_image['und'][0]['nid']); 
						$img_arr = array(
							'item' => $main_image_node->field_image['und'][0],
							'image_style' => 'home-page-rotator'
						);
						$image_rotator = theme_image_formatter($img_arr);
						$i++;
					?>
					<li id="hpr-item-<?php print $i; ?>" class="hpr-item <?php if($i == 1){ print 'active';} ?>">
						<div class="hpr-img-wrapper">&nbsp;</div>
						<?php print $image_rotator; ?>
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
										$data_options = sharethis_get_options_array();
										$mPath =  url(drupal_get_path_alias('node/' . $hpr_node->nid), array('absolute' => TRUE));
										$mTitle = drupal_get_title();
										print sharethis_get_button_HTML($data_options, $mPath, $mTitle);;
                                    ?></div>
									<?php if($hpr_node->body): ?>
                                        <div>
                                            <?php print $hpr_node->body['und'][0]['value']; ?>
                                        </div>
                                    <?php endif; ?>
                                </section>
                        	</div>
                        </div>
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
