<?php
	drupal_add_css(path_to_theme() . '/../at_vhinandrich2/css/suppliers.css');
	drupal_add_css(path_to_theme() . '/../at_vhinandrich2/css/suppliers.responsive.css');
?>

<style>
	</style>
<h1 class="suppliers-title"><?php print $node->title; ?></h1>
<div class="suppliers-list">
    <ul class="suppliers">
    <?php for($i=0;$i<sizeof($node->field_type['und']);$i++): ?>
        <li>
        	<div class="supplier-item">
                <div class="supplier-name"><?php print $node->field_supplier_name['und'][$i]['value']; ?></div>
                <div class="supplier-type"><?php print $node->field_type['und'][$i]['value']; ?></div>
                <div class="supplier-logo">
                <?php if(isset($node->field_supplier_logo['und'][$i])): ?>
                <?php
                    $tmp_node_img = node_load($node->field_supplier_logo['und'][$i]['nid']);
                    //dsm($tmp_node_img);
                    $tmp_node_img->field_image['und'][0]['alt'] = $node->title;
                    $img_arr = array(
                        'item' => $tmp_node_img->field_image['und'][0],
                        'image_style' => 'supplier-logo',
                    );
                    $img = theme_image_formatter($img_arr);
                    print $img;
                ?>
                <?php endif; ?>
                </div>
                <div class="supplier-website"><a href="http://<?php print $node->field_supplier_website['und'][$i]['value']; ?>" target="new"><?php print $node->field_supplier_website['und'][$i]['value']; ?></a></div>
            </div>
        </li>
    <?php endfor; ?>
    </ul>
</div>