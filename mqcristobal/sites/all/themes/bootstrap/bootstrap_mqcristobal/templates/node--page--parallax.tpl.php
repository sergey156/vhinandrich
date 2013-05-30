<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <header>
    <?php print render($title_prefix); ?>
    <?php if (!$page && $title): ?>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <?php if (false && $display_submitted): ?>
      <span class="submitted">
        <?php print $user_picture; ?>
        <?php print $submitted; ?>
      </span>
    <?php endif; ?>
  </header>
  
  <?php
    $bg_color = '';
    if($tmp_bg_color = reset($field_bg_color)){
      if(isset($tmp_bg_color['rgb']))
        $bg_color = $tmp_bg_color['rgb'];
    }
    
    $bg_image = '';
    if($tmp_bg_image_node = reset($field_node_bg_image)){
      if(isset($tmp_bg_image_node['node'])){
        $tmp_bg_image = _bsmqc_get_image_path($tmp_bg_image_node['node'], 'page_parallax_bg_image');
        foreach($tmp_bg_image as $img){
          $bg_image = $img;
        }
      }
    }
    if($bg_image)
      $bg_image = "url('" . $bg_image . "')";
  ?>
  <div style="background: <?php print $bg_image; ?> <?php print $bg_color; ?>">
    <?php
      // Hide comments, tags, and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      print render($content);
    ?>
  </div>
  
  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
    <footer>
      <?php print render($content['field_tags']); ?>
      <?php print render($content['links']); ?>
    </footer>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

</article> <!-- /.node -->
