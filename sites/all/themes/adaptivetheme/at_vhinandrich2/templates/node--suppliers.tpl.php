<style>
	.suppliers{
		list-style:none;
		text-align:center;
		margin:0 auto;
	}
	.suppliers li{
		display:inline;
		margin:0 10px;
	}
	.supplier-item{
		display:inline-block;
		vertical-align:top;
	}
	.supplier-type{
		font-size:small;
		color:#9AC2C5;
		text-transform:uppercase;
		margin:-8px 0 10px;
		padding:0;
	}
	.supplier-name{
		font-size:xx-large;
		color:#5BA2AF;
		font-family:Georgia, "Times New Roman", Times, serif;
	}
	.suppliers-title{
		text-align:center;
		border-bottom:1px dashed #ddd;
		color:#333;
		font-size:80px;
	}
	.suppliers-list{
		margin-top:20px;
	}
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
                </div>
                <div class="supplier-website"><a href="http://<?php print $node->field_supplier_website['und'][$i]['value']; ?>" target="new"><?php print $node->field_supplier_website['und'][$i]['value']; ?></a></div>
            </div>
        </li>
    <?php endfor; ?>
    </ul>
</div>