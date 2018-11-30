<?php 
	$event_url = site_url('/event/view/'.$event_url_link);
?>
<script src="<?php echo base_url(); ?>js/jquery-1.7.1.js"></script>
<style>
 	.btn_bgcolor {
 		
 		background: <?php echo $back_color; ?>;
 		color: <?php echo $text_color; ?>;
 	}
 	
 	.btn_img { 		 		
 		background-repeat: no-repeat;
 		font-family: "Droid Serif", Arial, Helvetica, sans-serif;
 		border: none;
		cursor: pointer;
 	}
</style>
<div id="widgets">
	<?php 

		$style='font-size: 13px; padding: 10px 25px'; 
		if($widget_size=="2"){$style='font-size: 15px; padding: 10px 38px';}
		else if($widget_size=="3"){$style='font-size: 18px; padding: 10px 50px'; }

	?>
	<a target="_blank" href="<?php echo $event_url; ?>">
		<input id="btn_widget" class="btn_bgcolor btn_img" style="<?php echo $style; ?>" type="button" value="<?php echo SecureShowData($widget_text); ?>">
	</a>
</div>