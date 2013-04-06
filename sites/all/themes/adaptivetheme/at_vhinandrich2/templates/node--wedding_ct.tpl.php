<?php
	drupal_add_js(path_to_theme() . '/../at_vhinandrich2/js/wedding_ct.js');
	drupal_add_css(path_to_theme() . '/../at_vhinandrich2/css/wedding_ct.css');
	drupal_add_css(path_to_theme() . '/../at_vhinandrich2/css/wedding_ct.responsive.css');
	
	$datetime = $node->field_date['und'][0]['value'];
	$month = strtoupper(date('F',$datetime));
	$day = date('d',$datetime);
	$day = "twenty-six";
	$year = date('Y',$datetime);
	
	function calculate_time_remaining(){
		$tmptime = $datetime - strtotime('now');
		return $tmptime;
	}
	
?>
<script src="http://malsup.github.com/jquery.blockUI.js"></script>
<script>
	jQuery(document).ready(function(e) {
		var _timer = null;
		
		clearTimeout(_timer);
		_timer = setTimeout('mqc_timer()',1000);
		mqc_timer = function(){
			jQuery.ajax({
				type: 'GET',
				url: '/mqcristobal-timer/<?php print $datetime; ?>',
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
		
		jQuery('.map-link-x').click(function(){
			var nid = jQuery(this).attr('id');
			nid = nid.replace('map-link-','');
			//alert(jQuery('#map-viewer-' + nid).html());
			jQuery.blockUI({
				message:jQuery('#map-viewer-' + nid).html(),
				css: {width:'100%', left: '0', top: '10%', border: 'none'}
			});
			
		
			jQuery('.blockUI').click(function(){
				jQuery.unblockUI();
			});
		});
    });
</script>
<div class="wedding_ct_container">
	<div class="wedding_ct_top_1">
        <div class="wedding_ct_title_container">
            <h1 class="wedding_ct_title">WEDDING</h1>
            <ul class="wedding_ct_titles">
            	<li class="first">kasal</li>
                <li>perkahwinan</li>
                <li>pernikahan</li>
                <li>hochzeit</li>
                <li class="last">mariage</li>
            </ul>
        </div>
        <div class="wedding_ct_top_1_line"></div>
        <div class="wedding_ct_title2_container">
            <h2 class="wedding_ct_title2">vhin <span class="wedding_ct_title2_middle">♥</span> rich</h2>
        </div>
    </div>
    <div class="wedding_ct_top_2">
        <div class="wedding_ct_date_container">
            <h3 class="wedding_ct_date_month"><?php print $month; ?></h3>
            <h3 class="wedding_ct_date_day"><?php print $day; ?></h3>
            <h3 class="wedding_ct_date_year"><?php print $year; ?></h3>
        </div>
        <div class="wedding_ct_location_container">
        	<?php foreach($node->field_location_ref['und'] as $node_loc): ?>
            	<div class="wedding_ct_view_map_box">
                	<div class="wedding_ct_view_map_content">
                		View map
                    </div>
                </div>
                <h3 class="wedding_ct_location_church"><a id="map-link-<?php print $node_loc['node']->vid; ?>" class="map-link" href="<?php print drupal_get_path_alias('node/' . $node_loc['node']->vid); ?>#"><?php print $node_loc['node']->title; ?></a></h3>
                <h3><?php print $node_loc['node']->field_location['und'][0]['street'];?>, <?php print $node_loc['node']->field_location['und'][0]['city']; ?>, <?php print $node_loc['node']->field_location['und'][0]['country_name']; ?></h3>
				<div class="map-viewer" id="map-viewer-<?php print $node_loc['node']->vid; ?>" style="position:absolute;top:0;left:0;width:100%;visibility:hidden">
                	<div class="map-viewer-wrapper">
                        <div>
                            <?php print  drupal_render(node_view($node_loc['node'])); ?>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>
        </div>
        <div style="clear:both"></div>
        <!--<div class="wedding_ct_top_2_line" style="border-bottom:1px dashed #eee"></div>
        <div class="wedding_ct_timer mqc-timer">Loading timer...</div>
        <div style="clear:both"></div>-->
        <div class="wedding_ct_top_2_line"></div>
    </div>
    
    <div class="wedding_ct_top_3">
    	<div class="wedding_ct_godparents_title">
        	<h1>PARENTS</h1>
        </div>
        <div class="wedding_ct_godmothers">
        	<div>
                <ul>
					<?php foreach($node->field_father['und'] as $godmother): ?>
                        <li><?php print $godmother['value']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="wedding_ct_godfathers">
        	<div>
                <ul>
					<?php foreach($node->field_mother['und'] as $godfather): ?>
                        <li><?php print $godfather['value']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div style="clear:both">
        </div>
    </div>
    
    <div class="wedding_ct_top_3">
    	<div class="wedding_ct_godparents_title">
        	<h1>GODPARENTS</h1>
        </div>
        <div class="wedding_ct_godmothers">
        	<div>
                <h3 class="wedding_ct_godparent_h3">GODMOTHERS</h3>
                <ul>
					<?php foreach($node->field_godmother_name['und'] as $godmother): ?>
                        <li><?php print $godmother['value']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="wedding_ct_godfathers">
        	<div>
                <h3 class="wedding_ct_godparent_h3">GODFATHERS</h3>
                <ul>
					<?php foreach($node->field_godfather_name['und'] as $godfather): ?>
                        <li><?php print $godfather['value']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div style="clear:both">
        </div>
    </div>
    <div class="wedding_ct_top_4">
    	<div class="wedding_ct_entourage_title">
        	<h1>ENTOURAGE</h1>
        </div>
        <div class="">
        	<h3>Maid of Honor</h3>
            <div>
            	<ul>
					<li><?php print $node->field_maid_of_honor['und'][0]['value']; ?></li>
            	</ul>
            </div>
        </div>
        <div class="">
        	<h3>Best Man</h3>
            <div>
            	<ul>
            	<li><?php print $node->field_best_man['und'][0]['value']; ?></li>
            	</ul>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="wedding_ct_brides_maid">
        	<h3>Bride's Maid</h3>
            <div>
            	<ul>
            	<?php foreach($node->field_bridesmaid['und'] as $item): ?>
            		<li><?php print $item['value']; ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="wedding_ct_grooms_men">
        	<h3>Groom's Men</h3>
            <div>
            	<ul>
            	<?php foreach($node->field_groomsmen['und'] as $item): ?>
            		<li><?php print $item['value']; ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div>
        	<h3>Candle</h3>
            <div>
            	<ul style="display:inline">
                	<?php foreach($node->field_candle['und'] as $item): ?>
                    	<li class="entourage-basic-list-item"><?php print $item['value']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div>
        	<h3>Cord</h3>
            <div>
            	<ul style="display:inline">
                	<?php foreach($node->field_cord['und'] as $item): ?>
                    	<li class="entourage-basic-list-item"><?php print $item['value']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div>
        	<h3>Veil</h3>
            <div>
            	<ul style="display:inline">
                	<?php foreach($node->field_veil['und'] as $item): ?>
                    	<li class="entourage-basic-list-item"><?php print $item['value']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div>
            <div style="margin:10px 0">
            	<ul style="display:inline">
                    	<li class="entourage-basic-list-item" style="display:inline-block"><h3>Bible Bearer</h3><?php print $node->field_bible_bearer['und'][0]['value']; ?></li>
                    	<li class="entourage-basic-list-item" style="display:inline-block"><h3>Coin Bearer</h3><?php print $node->field_coin_bearer['und'][0]['value']; ?></li>
                    	<li class="entourage-basic-list-item" style="display:inline-block"><h3>Ring Bearer</h3><?php print $node->field_ring_bearer['und'][0]['value']; ?></li>
                </ul>
            </div>
        </div>
        <div>
        	<h3>Flower Girls</h3>
            <div>
            	<ul style="display:inline">
                	<?php foreach($node->field_flower_girls['und'] as $item): ?>
                    	<li class="entourage-basic-list-item"><?php print $item['value']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
</div>
<?php //print  drupal_render(node_view(node_load(605))); ?>