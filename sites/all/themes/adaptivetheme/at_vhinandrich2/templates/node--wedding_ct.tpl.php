<?php
	drupal_add_js(path_to_theme() . '/../at_vhinandrich2/js/wedding_ct.js');
	drupal_add_css(path_to_theme() . '/../at_vhinandrich2/css/wedding_ct.css');
	drupal_add_css(path_to_theme() . '/../at_vhinandrich2/css/wedding_ct.responsive.css');
	
	$datetime = $node->field_date['und'][0]['value'];
	$month = date('F',$datetime);
	$day = date('d',$datetime);
	$day = "twenty-six";
	$year = date('Y',$datetime);
	
	function calculate_time_remaining(){
		$tmptime = $datetime - strtotime('now');
		return $tmptime;
	}
	
?>
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
                <h3 class="wedding_ct_location_church"><a href="<?php print drupal_get_path_alias('node/' . $node_loc['node']->vid); ?>"><?php print $node_loc['node']->title; ?></a></h3>
                <h3><?php print $node_loc['node']->field_location['und'][0]['street'];?>, <?php print $node_loc['node']->field_location['und'][0]['city']; ?>, <?php print $node_loc['node']->field_location['und'][0]['country_name']; ?></h3>
			<?php endforeach; ?>
        </div>
        <div style="clear:both">
        </div>
        <div class="wedding_ct_top_2_line">
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
    <!--<div class="wedding_ct_top_4">
    	<div class="wedding_ct_entourage_title">
        	<h1>ENTOURAGE</h1>
        </div>
        <div class="wedding_ct_maid_of_honor">
        	<h2>Maid of Honor</h2>
            <div>
            	<p><?php print $node->field_maid_of_honor['und'][0]['value']; ?></p>
            </div>
        </div>
        <div class="wedding_ct_best_man">
        	<h2>Best Man</h2>
            <div>
            	<p><?php print $node->field_best_man['und'][0]['value']; ?></p>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>-->
</div>