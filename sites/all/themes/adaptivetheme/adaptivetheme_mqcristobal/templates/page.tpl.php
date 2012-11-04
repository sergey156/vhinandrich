<div class="header">
	<div class="header-container">
    	<div class="header-image-container"><a href="./"><img src="<?php print path_to_theme(); ?>/css/images/header-logo.png" /></a></div>
        <div class="header-main-menu-container">
        	<?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')))); ?>
        </div>
    </div>
</div>
<div class="main-content" style="color:white">
	<?php print $messages; ?>
	<!--<?php if ($breadcrumb): ?>
	    <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>-->
    <!--<div class="main-page-rotator-container">
    	<img src="<?php print path_to_theme(); ?>/css/images/sampleimage.png" />
    </div>-->
    <div class="main-content-container">
    	<?php if($title): ?>
    		<h1 class="content-title"><?php print $title; ?></h1>
		<?php endif; ?>
		<?php print render($page['content']); ?>
    </div>
</div>
<div class="footer">
	<div class="footer-container">
		<?php print render($page['footer']); ?>
    </div>
</div>