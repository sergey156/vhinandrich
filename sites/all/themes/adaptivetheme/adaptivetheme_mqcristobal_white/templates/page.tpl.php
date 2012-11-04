<?php // Corolla ?>
<div id="page-wrapper"><div id="page">

  <?php if ($menubar = render($page['menu_bar'])): ?>
    <div id="menu-bar-wrapper"><div class="container clearfix">
      <?php print $menubar; ?>
    </div></div>
  <?php endif; ?>

  <div id="header-wrapper"><div class="container clearfix">
    <header class="clearfix<?php print $linked_site_logo ? ' with-logo' : ''; ?>" role="banner">
      <div id="branding">
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
      </div>

      <?php print render($page['header']); ?>
      	<div id="main-menu">
      		<?php print render(menu_tree('main-menu')); ?>
    	</div>
    </header>
  </div></div>

  <?php if ($page['secondary_content']): ?>
    <div id="secondary-content-wrapper"><div class="container clearfix">
      <?php print render($page['secondary_content']); ?>
    </div></div>
   <?php endif; ?>

  <?php if ($messages || $page['help']): ?>
    <div id="messages-help-wrapper"><div class="container clearfix">
      <?php print $messages; ?>
      <?php print render($page['help']); ?>
    </div></div>
  <?php endif; ?>

  <div id="content-wrapper"><div class="container">

    <div id="columns"><div class="columns-inner clearfix">
      <div id="content-column"><div class="content-inner">

        <?php print render($page['highlighted']); ?>

        <?php $tag = $title ? 'section' : 'div'; ?>
        <<?php print $tag; ?> id="main-content" role="main">

          <?php if ($primary_local_tasks): ?>
            <div id="tasks" class="clearfix">
              <?php if ($primary_local_tasks): ?>
                <ul class="tabs primary"><?php print render($primary_local_tasks); ?></ul>
              <?php endif; ?>
            </div>
          <?php endif; ?>

          <div class="content-margin"><div class="content-style">

            <?php if ($secondary_local_tasks): ?>
              <ul class="tabs secondary"><?php print render($secondary_local_tasks); ?></ul>
            <?php endif; ?>

            <?php if ($breadcrumb): ?>
              <div id="breadcrumb-wrapper">
                <section class="breadcrumb clearfix">
                  <?php print $breadcrumb; ?>
                </section>
              </div>
            <?php endif; ?>

            <?php print render($title_prefix); ?>
            <?php if ($title && !isset($node)): ?>
              <header class="clearfix">
                <h1 id="page-title"><?php print $title; ?></h1>
              </header>
            <?php endif; ?>
            <?php print render($title_suffix); ?>

            <?php if ($action_links = render($action_links)): ?>
              <ul class="action-links"><?php print $action_links; ?></ul>
            <?php endif; ?>

          <div id="content"><?php print render($page['content']); ?></div>

          <!--<?php print $feed_icons; ?>-->

          </div></div>
        </<?php print $tag; ?>>

        <?php print render($page['content_aside']); ?>

      </div></div>

      <!--<?php print render($page['sidebar_first']); ?>
      <?php print render($page['sidebar_second']); ?>-->

    </div></div>
  </div></div>

  <?php if ($page['tertiary_content']): ?>
    <div id="tertiary-content-wrapper"><div class="container clearfix">
      <?php print render($page['tertiary_content']); ?>
    </div></div>
  <?php endif; ?>


  <?php if ($page['footer']): ?>
    <div id="footer-wrapper"><div class="container clearfix">
      <footer class="clearfix" role="contentinfo">
        <div id="footer-message-wrapper"><?php print render($page['footer']); ?></div>
      	<div id="footer-icons-wrapper">
    		<img src="<?php print path_to_theme(); ?>/css/images/social-icons.png" usemap="#footer-icons-map" />
            <map id="footer-icons-map" name="footer-icons-map">
                <area title="twitter" shape="rect" coords="0,0,32,32" target="_new" href="https://twitter.com/vhin0210">
                <area title="RSS" shape="rect" coords="48,0,80,32" target="_new" href="?q=rss.xml">
                <area title="instagram" shape="rect" coords="94,0,126,32" target="_new" href="http://instagram.com/vhin0210/">
                <area title="facebook" shape="rect" coords="142,0,174,32" target="_new" href="https://facebook.com/markquirviencristobal">
                <area title="flickr" shape="rect" coords="190,0,222,32" target="_new" href="http://flickr.com/photos/vhintobats/">
                <area title="linkedin" shape="rect" coords="238,0,270,32" target="_new" href="http://sg.linkedin.com/pub/mark-quirvien-cristobal/44/194/4a5">
                <area title="google+" shape="rect" coords="286,0,318,32" target="_new" href="https://plus.google.com/109233919816288722525/posts">
            </map>
    	</div>
      </footer>
    </div></div>
  <?php endif; ?>

</div></div>
