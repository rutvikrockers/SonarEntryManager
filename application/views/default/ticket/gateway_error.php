<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="<?php echo base_url();?>js/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo base_url();?>js/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="<?php echo base_url();?>js/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="<?php echo base_url();?>js/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="<?php echo base_url();?>js/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

   <script src="<?php echo base_url();?>js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap-datetimepicker.css" />
    
<?php 
$sy = date('Y',strtotime('-100 years'));
$ey = date('Y'); 


?>

<style>
	.error-dis p{
		font-size: 16px;
		margin-bottom: 20px;
		text-align: center;
	}
	.error-dis .notfound-dis {
		text-align: center;
		display: table;
		margin:0 auto;
	}
</style>


<section>  
    <div class="container">
     	
		
		<div id="event_view_page_theme"> 
			<div id="event_theme_page_change">  
			    <?php /*<div class="container">*/?>

				<div class="pt">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct">
	                   <h1><?php echo OOPS_SOMETHING_GOES_WRONG;?></h1>
	            	</div>
				</div><!-- End pt -->
				
			    <div class="clearfix"></div>
			    <div class="festival pb"></div>

			    
			    
			    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pt15 open-air">
			    
					<div class="col-lg-12 lucha error-dis pb" >
						<p><?php echo $error_msg; ?></p>
						<div class="notfound-dis">
							<a href="<?php echo site_url('event/view').'/'.$event_details['event_url_link']; ?>"  class="btn-event2"><?php echo BACK_TO_EVENT;?></a>
						</div>
			    	</div><!-- End lucha -->

              		</div>
               
			    </div><!-- End open-air -->

			    <?php /*</div><!-- End container -->*/?>
			    <div class="pb"></div>
			    
			    
			</div>
			</div>


    </div><!-- End container -->
    <div class="pb"></div>
</section>