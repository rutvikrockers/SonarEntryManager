<link rel="stylesheet" href="<?php echo base_url();?>css/flipcountdownclock.css">
<script src="<?php echo base_url();?>js/countdown/flipcountdownclock.js"></script>
<?php $result = getRecordById('captcha_settings','id','1');?>
<script type="text/javascript">
	stopTimerRedirect = 0;
</script>
<?php 

$address='';

if($event_id!=''){
	
		if($event_venue['venue_add1']!='')
		{	

			$address=$event_venue['venue_add1'];
		}
		if($event_venue['venue_city']!='')
		{
			if($address!=''){
			$address=$address.', '.$event_venue['venue_city'];
				}else
				{
					$address=$event_venue['venue_city'];
				}
		}
		if($event_venue['venue_state']!='')
		{
			if($address!=''){
			$address=$address.', '.$event_venue['venue_state'];
				}else
				{
					$address=$event_venue['venue_state'];
				}
		}
	}
?>

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

	<!-- Floatin jQuery -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-filestyle.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.sticky.js"></script>
	<script>
	    // $(window).load(function () {

	    //     var winWidht = $(window).width(),
	    //         maxWidth = 1000;
	    //     if (winWidht > maxWidth) {
	    //         var stickyWidth = $("#campainSidenav").width();
	    //         $("#campainSidenav").css("width", stickyWidth);
	    //         $("#campainSidenav").sticky({topSpacing: 90});
	    //     }
	    // });

	</script>



   <script src="<?php echo base_url();?>js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap-datetimepicker.css" />
    <script>
    $(document).ready(function() { var Payment="1"; });            
    </script>
  <link href="<?php echo base_url();?>css/popup.css" rel="stylesheet" />
 <script src="<?php echo base_url();?>js/jquery.magnific-popup.js"></script>
 <script type="text/javascript">
      $(document).ready(function() {
      
		$('.mfPopup').magnificPopup({
          type: 'ajax',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });
        
      });
    </script>
     <script src='https://www.google.com/recaptcha/api.js'></script>
    <style type="text/css">
    .g-recaptcha {
      margin-top: 10px;
    }
    #sticky {
	    /*padding: 0.5ex;
	    width: 600px;
	    background-color: #333;
	    coor: #fff;
	    font-size: 2em;*/
	    border-radius: 0.5ex;
	}

	#sticky.stick {
	    margin-top: 0 !important;
	    position: fixed;
	    top: 10px;
	    z-index: 10000;
	    border-radius: 0 0 0.5em 0.5em;
	}
    
    </style>
<?php

$sy = date('Y',strtotime('-100 years'));
$ey = date('Y'); 

$back = $oneTheme['background'];
$title = $oneTheme['event_title'];
$header_text = $head_text = $oneTheme['header_text'];
$box_back = $oneTheme['box_background'];
$body_text = $oneTheme['body_text'];
$box_border = $oneTheme['box_border'];
$link = $oneTheme['links'];
$box_head = $oneTheme['box_header'];
?>

<style>
	.mainBGColor{
		background: <?php echo $back;?>;
	}
    .event-content
    {
    	color: <?php echo $header_text; ?> !important;
    }
    .timer-text
    {
    	color: <?php echo $body_text; ?>;
    }
    .sidebar-content
    {
    	padding: 15px;
    }
    .map{
    	height: 200px !important;
    }
    #event_theme_page_change .ticket-table .table
    {
    	background: <?php echo $box_back; ?>;
    	border: 0px;
    }
    #event_theme_page_change .ticket-table .table tbody th{
    	background: <?php echo $box_back; ?>;
    	color: <?php echo $body_text; ?>;
    }
    #event_theme_page_change .ticket-table .table thead th{
    	background: <?php echo $head_text; ?>;
		color: <?php echo $body_text; ?>;
		border-bottom: 2px solid <?php echo $box_border; ?>;
		padding: 15px;
    }
    #event_theme_page_change .who-go{
    	background: <?php echo $box_back; ?>;
    }
    #event_theme_page_change .ticket-table .table tbody tr td
    {
    	border-top: 1px solid <?php echo $box_border; ?>;
    	color: #333;
    	text-align: left;
    }
    #event_theme_page_change .ticket-table .table>tbody+tbody
    {
    	border-top: 2px solid <?php echo $box_border; ?>;
    }
    .panel-default{
    	border-radius: 5px;
    }
   

    #loginExpand .red{
    	color: #FF0000;
    }


	#event_theme_page_change,
	#event_theme_page_change .panel .panel-body
	{
		color: <?php echo $body_text;?>;
		
	}

	#event_theme_page_change .panel .panel-default p a
	{
		color: <?php echo $link;?>;
		
	}
	
	#event_theme_page_change .open-air{
		background: <?php echo $back;?>;
	}
	
	#event_theme_page_change .organizer .profile a, 
	#event_theme_page_change .organizer .profile a:hover,
	#event_theme_page_change .table a
	{
		color:<?php echo $link;?> !important;
	}
	
	#event_theme_page_change .pt .date h1{
		color: <?php echo $title;?>;
		
	}
	
	#event_theme_page_change .open-air .panel-title{
		color: <?php echo $head_text;?>;
	}
	#event_theme_page_change .panel-title,
	#event_theme_page_change .main_event_title,
	#event_theme_page_change .event-content address{
		color: <?php echo $head_text;?>;
	}
	#event_theme_page_change .ptbox li, 
	#event_theme_page_change .open-air .share-event,
	#event_theme_page_change .open-air .organizer,
	#event_theme_page_change .open-air .red-line h4,
	#event_theme_page_change .open-air .org-line h4,
	{
		background: <?php echo $box_back;?>;
		color: <?php echo $head_text;?>;
	}
	
	
	#event_theme_page_change .ptbox li{
	border: 1px solid <?php echo $box_border;?>;
	}
	
	#event_theme_page_change .panel,
	#event_theme_page_change .table
	{
		border: 2px solid <?php echo $box_border;?>;
		color: <?php echo $body_text; ?>;
	}

	#event_theme_page_change .panel-default .ticket-table{
		background: <?php echo $box_back; ?>;
	}
	#event_theme_page_change .panel-default .padL0{
		padding-left: 15px !important;
		text-align: left !important;
	}
	
	#event_theme_page_change .panel-heading
	{ 
		background: <?php echo $box_head;?>;
		padding: 15px;
		border-bottom: 0px !important;
	}
	#event_theme_page_change .contact_icon,
	#event_theme_page_change .btn-event,
	#event_theme_page_change .ical_icon
	{ 
		 background: linear-gradient(to bottom, <?php echo $box_head;?> 0%, <?php echo $box_head;?> 5%, <?php echo $box_head;?> 5%, <?php echo $back;?> 5%, <?php echo $back;?> 9%, <?php echo $back;?> 9%, <?php echo $box_border;?> 10%, <?php echo $box_head;?> 100%, <?php echo $box_border;?> 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
		 /* background: linear-gradient(to bottom, <?php echo $box_border;?> 0%, <?php echo $box_border;?> 5%, <?php echo $box_border;?> 5%, <?php echo $box_border;?> 5%, <?php echo $box_border;?> 9%, <?php echo $box_border;?> 9%, <?php echo $box_border;?> 10%, <?php echo $box_border;?> 100%, <?php echo $box_border;?> 100%) repeat scroll 0 0 rgba(0, 0, 0, 0); */
		 width: 50%
	}
	
	#event_view_page_theme  .festival  {
		border-top: 2px solid <?php echo $box_border;?>;
	}

	#event_theme_page_change address strong{
		color: <?php echo $box_head;?>;
	}

	#event_theme_page_change .open-air .content .event_detail {
		border: 2px solid <?php echo $box_border;?>;
		background: <?php echo $box_back;?>;
		padding:10px;
		margin-bottom: 20px;
	}
	#event_theme_page_change .red-line:before,
	#event_theme_page_change .org-line:before{
		border-top: 1px solid <?php echo $box_border;?>;
		border-bottom: 1px solid <?php echo $box_border;?>;
	}
	
	#event_theme_page_change .table th{
		background: <?php echo $box_head;?>;
		color: <?php echo $head_text;?>;
	}
	
	#event_theme_page_change #update h6{
		color: <?php echo $head_text;?>;
		font-weight:bold;
	}
	
	#event_theme_page_change  #update p{
		color: <?php echo $body_text;?>;
	}
</style>

<script>
function set_state(val, type){
	
	if(val=='') return false;
	
	var n = type.split("_"); 
	type = n[0];
    var state_path = site_url+'/ticket/state_selection/';
    var country_id = val;
    $.ajax({
        type: "GET",
        data: {country_id: country_id, add_type: type}, 
        url: state_path+country_id,
        success: function(data) {
       // alert(type+'//'+n.length+'//'+type+'//'+n[1]);
            
            if(n.length==2){
                
            	$("#"+type+'_'+n[1]+"_state_list").html(data);
            }else{
            	$("#"+type+"_state_list").html(data);
            }
        }
    });

}


function set_payment_gateway(){
	
	var result_value = "";	
	check_attendee = 0;
    if($("#paypal").is(':checked')){ 
    	// $("#paypal_div").show();
    	$("#stripe_div").hide();
    	$("#authorize_net_div").hide();
    	result_value = $("#paypal").val();
    	result_value = "1";    	
    	$("#gateway").val("paypal");
    	Payment = "1";
    	$("#stop_dclick").show();
    	is_attendee = 0;
		check_attendee = 1;
    }

	if($("#stripe").is(':checked')){ 
		$("#stripe_div").show();
    	$("#authorize_net_div").hide();
		// $("#paypal_div").hide();
    	result_value =  $("#stripe").val();
    	$("#gateway").val("stripe");
    	result_value = "2";
    	Payment = "2";
    	$("#stop_dclick").show();
    	is_attendee = 0;
		check_attendee = 1;
    }
	if($("#authorize_net").is(':checked')){ 
		$("#stripe_div").show();
    	$("#authorize_net_div").show();
		// $("#paypal_div").hide();
    	result_value =  $("#authorize_net").val();
    	$("#gateway").val("authorize_net");
    	result_value = "3";
    	Payment = "3";
    	$("#stop_dclick").show();
    	is_attendee = 0;
		check_attendee = 1;
    }
	if($("#pay_at_event").is(':checked')){ 
    	$("#stripe_div").hide();
    	$("#authorize_net_div").hide();
    	$("#gateway").val("pay_at_event");
    	result_value = "4";
    	Payment = "4";
    	$("#stop_dclick").show();
    	is_attendee = 1;
    	pay_by = "pay_at_event";
		check_attendee = 1;
	}
	<?php if($site_setting['on_event_payment'] == 1) { ?>
		if(check_attendee == 1) {

			if(is_attendee == 1) {
				$('form#place_orderform').attr("action", "<?php echo base_url('ticket/place_order_attendee?offline_payment=1&payment_by'); ?>="+pay_by);
			} else {
				$('form#place_orderform').attr("action", "<?php echo base_url('ticket/place_order'); ?>");
			}
			show_loader();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('ticket/purchase_attendee?session='.$this->input->get('session').'&attendee='); ?>"+is_attendee,
				data: '[]',
				success: function(data) {
					$('#price_list').html(data.view);
					hide_loader();
				}
			});
		}
	<?php } ?>
}

function checkusername(email){	
	var url = site_url+'user/username_check';		    	

	$.ajax({
        type: "POST",
        data: {email: email}, 
        url: url,
        success: function(data) {  	                
        	if(data=="success"){
        		var error = email+" is an existing account associated with this email.";        		
        		alert(error);
        		$("#p_email").val("");
        		$("#p_email").focus();
        		flag = "1";
        		return false;
        	}                      
        }   	             
    });
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var valid = re.test(email);
    return valid;    
} 



</script>
<style type="text/css">
		.disable-link
	{
	    text-decoration: none !important;
	    color: black !important;
	    cursor: default;
	}
	.enable-link
	{
	    text-decoration: underline !important;
	    color: #075798 !important;
	    cursor: pointer !important;
	}
</style>
<script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);            
            return ret;
        }
    </script>

 <style type="text/css">
   	.timer {
    background-color: #48484e;
    color: #ffffff;
    padding: 1em 0em;
    text-align: center;
}
   </style>
    <div id ="sticky" class="timer">
    	Please complete registration within <strong id="timer">05:00</strong> minutes.
    </div>
<section class="mainBGColor">  
    <div class="container">
     	
		
		<div id="event_view_page_theme"> 
			<div id="event_theme_page_change">

				<div class="pt row">
				 <div class="col-lg-9 col-md-8 col-sm-9 eventTitleColor">
            <?php 
				 $organizer_id = $event_details['organizer_id'];
				$organizers = getRecordById('organizers','id',$organizer_id);
			?>
            <h1 class="main_event_title"><?php echo SecureShowData(ucfirst($event_details['event_title']));?></h1>
            <p>
            <?php 

            	$display_start_time = $event_details['display_start_time'];
		        $display_end_time = $event_details['display_end_time'];
		        $display_timezone = $event_details['display_time_zone'];
		     //  $start=$event_details['event_start_date_time']
		        $end_date_display=1;
		       	$start_date =strtotime($event_details['event_start_date_time']."	24 hours");
		       	$end_date =strtotime($event_details['event_end_date_time']);
		       if($end_date<$start_date){
		       	 $end_date_display=0;
		       }
	            $input_tz = date_default_timezone_get();
	            $output_tz = $timezone;
	            $zoneList = timezone_identifiers_list();
            
	            echo changeDateTime($event_details['event_start_date_time'], $input_tz, $output_tz, $display_start_time);
				if($end_date_display){

	            echo ' '.TO.' '.changeDateTime($event_details['event_end_date_time'], $input_tz, $output_tz, $display_end_time); 
				}

	            if($display_timezone){
	            	echo ' ('.$timezone.')';
	            } ?>
            
            </p>
            <?php 
            if(!$event_details['online_event_option']){ ?>
            	<p><b><?php echo SecureShowData(ucfirst($event_venue['name']));?></b> | <?php echo SecureShowData($address);?></p>           
            <?php }else{ echo online_event; }?>
            <?php if($event_audio){ ?>
				<audio loop controls <?php if($event_audio['is_autoplay']) { ?>autoplay<?php } ?>><source src="<?php echo  base_url('upload/event/audio');?>/<?php echo $event_audio['audio_name'];?>" type="audio/mpeg"></audio>
            <?php } ?>
            <ul class="event-type ">
            	<li><?php echo getCategoryName($event_details['category']);?></li>
            	<li><?php echo getCategoryName($event_details['subcategory']);?></li>
            <?php 
            if(!$event_details['online_event_option']){ ?>
            	<li><?php echo ucfirst($event_venue['venue_country']);?></li>
            	<?php } ?>
            </ul>
          </div>
			    	
			        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 text-right add-finca pt15">
			        	 <a href="<?php echo site_url('event/slider/'.$event_id);?>" class='mfPopup event-page'>     
					        <div class="flexslider">
									  <ul class="slides">
									    <?php  
									    	$event_images=getAllRecordById('event_images','event_id',$event_id);

									    	if($event_images){
									    		foreach ($event_images as  $image_data) {
									    		
									    ?>
									    <li>
									     <?php 
								                $image = base_url().'upload/event_default/no_img.jpg';
								                $image_slide =  $image_data['image_name'];
								                if($image_slide != '' && file_exists(base_path().'upload/event/orig/'.$image_slide)){ 
								                    $image = base_url().'upload/event/orig/'.$image_slide;
								                }
								                elseif($image_slide != '' && file_exists(base_path().'upload/event/thumb/'.$image_slide)){ 
								                    $image = base_url().'upload/event/thumb/'.$image_slide;
								                }
								            ?>
											<img src="<?php echo $image; ?>" alt=" " height="180px" class="img-responsive smallimg" > 
									    </li>
									    <?php 
									    	
									    		}
									    	} ?>
									    
									  </ul>
									</div>
						</a>
                        
			        	
					</div>
				</div><!-- End pt -->
			    <div class="clearfix"></div>
			    <div class="eventBrdr"></div>

			    <div id="orderInfo"></div>
			    <div class="col-lg-12 col-md-12 place-order">
			    		<?php
                                                if($attendee=='attendee'){
                                                    $attributes = array('name'=>'place_orderform','id'=>'place_orderform','class'=>'event-title');
                                                    echo form_open('ticket/place_order_attendee',$attributes); 
                                                }else{
                                                    $attributes = array('name'=>'place_orderform','id'=>'place_orderform','class'=>'event-title');
                                                    echo form_open('ticket/place_order',$attributes);
                                                }
								
						?>	

		              				
                  <div class="row">
                   <div class="col-lg-3 col-md-3 col-sm-12 col-lg-push-9  col-md-push-9 col-md-3  clearfix" id="cart-block">

						<div id="">		
						<input type="hidden" name="payment_type" id="payment_type" value="<?php echo $payment_type?>" />
                                                <input type="hidden" name="note" id="note" value="<?php echo $note?>" />
						
						<div  class=" panel panel-default who-go br" >
						
							<div class="panel-heading ">
			                	<h3 class="panel-title"><?php echo CART_INFORMATION;?></h3>
			                </div>
			                
			                <div class="Pad1 ticket-table" id="price_list">
			                	<?php include("price_list.php"); ?>
			                </div>
			                

		                       <?php    
		                
			               if($order['time_limit']!='' && $order['time_limit']!=0){
								$randomId = $_GET['session'];
								if($order['time_limit'] < 10){
									$new_timer = "0".$order['time_limit'].':'.'00';
								} else {
									$new_timer = $order['time_limit'].':'.'00';
								}
								$now= date('Y-m-d H:i:s');
								
								if(isset($_SESSION['timer'.$randomId]))
								{
									if(isset($_SESSION['timer'.$randomId]->date))
									{
										$endDate = date_create($now);
										$arr=(array) $endDate;
										$currentDate=$arr["date"];
										if(strtotime($_SESSION['timer'.$randomId]->date)<strtotime($currentDate))
										{ 
											unset($_SESSION['timer'.$randomId]);
										}
									}else{
										unset($_SESSION['timer'.$randomId]);
									}
								}
								
								if(isset($_SESSION['timer'.$randomId])){
									$end = date_create($now);
									$diff=date_diff($_SESSION['timer'.$randomId],$end);
									$hours  = $diff->h ;
									$min    = $diff->i;
									$second = $diff->s;
									$new_timer= sprintf("%02d", $min).':'.sprintf("%02d", $second);	
								} else {
									$now= date('Y-m-d H:i:s');
									$currentDate = strtotime($now);
									$futureDate = $currentDate+(60*$order['time_limit']);
									$now= date('Y-m-d H:i:s',$futureDate);
									$_SESSION['timer'.$randomId] =date_create($now);
								}
			               		
			               		$order_error = base64_encode(base64_encode('orderError').'*'.$session_var);
			               		
			               		$return_view = $return_url.'/timeout/'.$order_error; 
	               		?>

		                    	<div class="event_detail timer-block">
						 	       <div id="countdown" style="padding-bottom:20px;"></div>
						 	       <div class="clear"></div><br/>
							       <strong class="timer-text"> <?php echo Please_complete_registration_within.' '.$order['time_limit'].' '.MINUTES.', '.After.' '.$order['time_limit'].' '.minutes_the_reservation_we_are_holding_will_be_released_to_others; ?></strong>
							</div>
		                    
							
							<script>
  						$(function(){ 
  							$('#timer').html('<?php echo $new_timer;?>');
								var interval = setInterval(function() {
								var timer = $('#timer').html();
								timer = timer.split(':');
								var minutes = parseInt(timer[0], 10);
								var seconds = parseInt(timer[1], 10);
								seconds -= 1;
								if (minutes < 0) return clearInterval(interval);
								if (minutes < 10 && minutes.length != 2) minutes = '0' + minutes;
								if (seconds < 0 && minutes != 0) {
									minutes -= 1;
									seconds = 59;
								}
								else if ( seconds < 10 && length.seconds != 2) seconds = '0' + seconds;
								$('#timer').html(minutes + ':' + seconds);
								
								if (minutes == 0 && seconds == 0){ 
									// $ ("#timeout").show();
									clearInterval(interval);
									window.location.href = "<?php echo $return_view; ?>";  
									
								}
									
							}, 1000);		

  					});
							  		var minites = '<?php echo $new_timer; ?>';
									var hms = '00:<?php echo $new_timer; ?>';
									
            						var a = hms.split(':'); 
           							var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]);
									clock = $('#countdown').FlipClock(seconds, {
										clockFace: 'MinuteCounter',
										countdown: true,
										autoStart: true,
										callbacks: {
											stop: function() {
												window.location.href = "<?php echo $return_view; ?>";  
											}
										}
									});
							</script>

							
               			<?php  } ?>
			           </div>
		                </div><!--panal-end-->
		              
			        </div>

			    	<div class="col-lg-9 col-md-9 col-lg-pull-3 col-md-pull-3 col-md-9  col-sm-12 lucha">
			    		<div class="panel panel-default who-go br">
	                		<div class="panel-heading brtl">
								<?php if($order['title_of_page']!='' ){?>
									<h3 class="panel-title"><?php echo $order['title_of_page']; ?></h3>
								<?php } else {?>
									<h3 class="panel-title"><?php echo Registration_Information; ?></h3>
								<?php } ?>
	                		</div>
	                		<?php if($order['instructions']!='' ){?>
	                		<div class="panel-body">
							    <?php echo $order['instructions']; ?>
	                		</div>
	                		<?php  } ?>
							<div class="panel-body">	                			

	                			<?php if($user_id==''){ ?>
	                				<div class="form-group clearfix" id="divLoginInfo" style="display: none;">
	                			<?php }else{ ?> 
                					<div class="form-group clearfix" id="divLoginInfo">
	                			<?php } ?>		
	                				<div class="col-sm-3 col-xs-12 ">
	                					
	                				</div>
	                				<div class="col-sm-8 col-xs-12 lable-rite">
	                				<label><?php echo HI; ?>, <i><span id="info_login_email"><?php echo $user['email']; ?></span></i></label>
	                					&nbsp;&nbsp;<?php echo NOTE_YOU; ?>? <strong>  <a href="javascript:void(0);" onclick="ajaxLogout();"><?php echo LOGOUT; ?></a></strong>	                					
	                				</div>
	                			</div>

	                				<div class="form-group clearfix" id="divLogin" style="display: none;">
	                				<div class="col-sm-3 col-xs-12 ">
	                					
	                				</div>
	                				<div class="col-sm-8 col-xs-12 lable-rite">
	                					<label><?php echo HAVE_AN_ACCOUNT; ?></label>
	                					<a href="javascript:void(0);" onclick="toggleLogin(1);"><?php echo LOGIN; ?></a>
	                					<label><?php echo "Create new account"; ?></label>
	                					<a href="javascript:void(0);" onclick="toggleLogin(0);"><?php echo SIGNUP; ?></a>
	                				</div>
	                			</div>
	                			<div id="loginExpand" style="<?php if($user_id){ ?>display: none;<?php } ?>">
	                				<div style="margin-left:28%;">
	                					<span class="red" id="ajax_login_err"></span>
	                				</div>
									<div class="form-group clearfix">
										<div class="col-sm-3 col-xs-12 lable-rite">
											<label><?php echo Email_Address; ?></label>	
										</div>
										<div class="col-sm-5 col-xs-12">
											<input type="text" name="login_email" id="login_email">
										</div>
									</div>
									<div class="form-group clearfix c_login_email" style="display: none;">
										<div class="col-sm-3 col-xs-12 lable-rite">
											<label><?php echo Confirm_Email_Address; ?></label>	
										</div>
										<div class="col-sm-5 col-xs-12">
											<input type="text" name="c_login_email" id="c_login_email">
										</div>
									</div>
	                				<div class="form-group clearfix">
		                				<div class="col-sm-3 col-xs-12 lable-rite">
		                					<label><?php echo PASSWORD; ?></label>	
		                				</div>	                				
		                				<div class="col-sm-5 col-xs-12">
		                					<input type="password" name="login_password" id="login_password">
		                				</div>
	                				</div>
                       				<?php if($result['status'] != 1) { ?>
										<div class="form-group clearfix">
											<style type="text/css">
												.captcha iframe {
													margin-left: 0 !important;
												}
											</style>
											<div class="col-sm-3 col-xs-12 lable-rite">
												<label><?php echo 'Captcha'; ?></label>	
											</div>	                				
											<div class="col-sm-5 col-xs-12 captcha">
												   <div class="g-recaptcha" data-sitekey="<?php echo $result['captcha_site_key']; ?>"></div> 
											</div>
										</div>
                					<?php } ?>
	                				<div class="form-group clearfix">
		                				<div class="col-sm-3 col-xs-12 lable-rite">
		                				
		                				</div>	                				
		                				<div class="col-sm-8 col-xs-12">
	                						<a id="loginBtn" class="btn-event" href="javascript:void(0);" onclick="ajaxLogin();"><?php echo LOGIN; ?></a>
		                					<label class="setLoginSignUp"> <?php echo NEW_TO;?> <?php echo SecureShowData($site_setting['site_name']); ?> <strong><u><a class="" href="javascript:void(0);" onclick="toggleLogin(0);"><?php echo SIGNUP; ?></a></u></strong></label>
		                				</div>
	                				</div>
	                			</div>
	                			<span id="userDetailExpand" style="<?php if(!$user_id){ ?>display: none;<?php } ?>">
									<div class="form-group clearfix">
										<div class="col-sm-3 col-xs-12 lable-rite">
											<label><?php echo First_Name; ?><span>*</span></label>
										</div>
										<div class="col-sm-8 col-xs-12">
											<input type="text" name="p_first_name" disabled id="p_first_name" value="<?php echo SecureShowData($user['first_name']);?>">
										</div>
									</div>
									<div class="form-group clearfix">
										<div class="col-sm-3 col-xs-12 lable-rite">
											<label><?php echo Last_Name; ?><span>*</span></label>
										</div>
										<div class="col-sm-8 col-xs-12">
											<input type="text" name="p_last_name" disabled id="p_last_name" value="<?php echo SecureShowData($user['last_name']);?>">
										</div>
									</div>
									<div class="form-group clearfix">
										<div class="col-sm-3 col-xs-12 lable-rite">
											<label><?php echo Email_Address; ?><span>*</span></label>
										</div>
										<div class="col-sm-8 col-xs-12">
											<input type="text" disabled name="p_email" onblur="checkusername(this.value)" id="p_email" value="<?php echo SecureShowData($user['email']);?>">
										</div>
									</div>
										<div class="form-group clearfix" id="confirm_email_div" style="display: none;">

										<div class="col-sm-3 col-xs-12 lable-rite">
											<label><?php echo Confirm_Email_Address; ?><span>*</span></label>
										</div>
										<div class="col-sm-8 col-xs-12">
											<input type="text" name="p_confirm_email" id="p_confirm_email">
										</div>
									</div>	
	                			</span>
	                		</div>
	                	</div>
			    		
	                	<div class="panel panel-default who-go br">
	                		<div class="panel-heading brtl">
	                			<h3 class="panel-title"><?php echo Ticket_Buyer; ?></h3>
	                		</div>
							<br/>
							<div class="alert_attendee_message"><?php echo ALTER_EACH_ATTENDEE_MESSAGE; ?></div>
							<br/>
	                		<?php echo $this->load->view('default/ticket/order_form_1'); ?>

	                	</div>
			                
	                	<?php $this->load->view('default/ticket/payment_form', array('total' => $total, 'dc' => $dc, 'pc' => $pc)); ?>
                		</div>
                		<input id="temp_random" name="temp_random" type="hidden" value="<?php echo $session_var; ?>">
                		<input id="gateway" name="gateway" type="hidden" value="<?php if($site_setting['payment_gateway']=="1"){ echo "paypal"; }else{ echo "stripe"; } ?>" />
                	
			    	<!-- End lucha -->
                   
                      </div> 
                      	</form>
               
			    </div><!-- End open-air -->

			    <?php /*</div><!-- End container -->*/?>
			    <div class="pb"></div>
			    
			    
			</div>
			</div>


    </div><!-- End container -->
    <div class="pb"></div>
    
    <script type="text/javascript" src="<?php echo base_url();?>css/timepicker/bootstrap-datepicker.js"></script>
    <script>
    $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        endDate : new Date()
    });
    </script>
     <script type="text/javascript">
    $(document).ready(function() {
	 	loginUrl = site_url+'user/login';
		$('#authorize_bill_country').change(function(){
			
			country1 = $('#authorize_bill_country').val();
			var getStatusUrl= '<?php echo site_url('user/ajax_state')?>/'+country1;
			$.ajax({
				url: getStatusUrl,
				dataType: 'json',
				type: 'POST',
				timeout: 99999,
				global: false,
				data: '[]',
				success: function(resp)
				{
					states = resp.result;
					str = '<select class="select-pad" name="authorize_bill_state" id="authorize_bill_state">';
						str	+= '<option value="">-- <?php echo SELECT_STATE;?> --</option>';
						if(states) {
							$.each(states, function( index, value ){
								str	+= '<option value="'+value.state_name+'">'+value.state_name+'</option>';
							});
						}
					str	+= '</select>';
					$('#authorize_billdiv').html(str);
				},		
				error: function(XMLHttpRequest, textStatus, errorThrown)
				{
				
				}
			});
		});
    });
    function toggleLogin(isLogin){
    	$("#loginExpand").show();
    	$("#divLogin").hide();
    	if(isLogin) {
    		$('.c_login_email').css('display', 'none');
    		set_loginUrl();
    		$('.setLoginSignUp').html('<?php echo NEW_TO; ?> '+"<?php echo SecureShowData($site_setting['site_name']); ?>"+'  <strong><u><a class="" href="javascript:void(0);" onclick="toggleLogin(0);"><?php echo SIGNUP; ?></a></u></strong>');
    		$('#loginBtn').text('<?php echo LOGIN; ?>');
    	} else {
    		$('.c_login_email').css('display', 'block');
    		set_signupUrl();
    		$('.setLoginSignUp').html('<?php echo HAVE_AN_ACCOUNT;?>  <strong><u><a class="" href="javascript:void(1);" onclick="toggleLogin(1);"><?php echo LOGIN; ?></a></u></strong>');
    		$('#loginBtn').text('<?php echo SIGNUP; ?>');
    	}
		$("#login_email").val("");
		$("#login_password").val("");
    }

    function set_loginUrl() {
		loginUrl = site_url+'user/login';
    }

    function set_signupUrl() {
		loginUrl = site_url+'user/signup';
    }

    function ajaxLogin(){
	 	show_loader();
        console.log('ajaxLogin');
    	var email = $("#login_email").val();
    	var c_email = $("#c_login_email").val();
    	var password = $("#login_password").val();
    	var remember = '0';
    	var ajax_login = ajaxSignup = 'ajax';
    	var recaptcha =$("#g-recaptcha-response").val();
    	var userLogin = 1;
        // console.log(recaptcha);
    	if(email==""){
    		$("#ajax_login_err").text("<?php echo EMAIL_REQUIRED;?>");
            hide_loader();
    	}else if($('.c_login_email').css('display') == 'block' && !c_email) {
			$("#ajax_login_err").text("<?php echo EMAIL_AND_CONFIRM_EMAIL;?>");
            hide_loader();
    	}else if($('.c_login_email').css('display') == 'block' && c_email != email) {
			$("#ajax_login_err").text("<?php echo EMAIL_AND_CONFIRM_EMAIL;?>");
            hide_loader();
    	}else if(password==""){
    		$("#ajax_login_err").text("<?php echo Password_is_required;?>");
            hide_loader();
    	}else{    		
	        
	        $.ajax({
	            type: "POST",
	            data: {remember: 0, remail: email, rpassword: password, email: email, password: password, remember: remember, ajax_login: ajax_login,'g-recaptcha-response':recaptcha, ajaxSignup: ajaxSignup, userLogin: userLogin}, 
	            url: loginUrl,
	            success: function(data) {  

	            	data = data.split("|");
	            	
	                if(data.length==5){ 
	                	$("#user_id").val(data[1]);
	                	$("#p_first_name").val(data[2]);
	                	$("#p_last_name").val(data[3]);
	                	$("#p_email").val(data[4]);

	                	// $("#confirm_email_div").hide();

	                	$("#info_login_email").text(data[4]);
	                	$("#userDetailExpand").show();
	                	$("#loginExpand").hide();
	                	$("#divLoginInfo").show();


	                }else{ 
		                data = data[1].replace("<p>","");
		            	data = data.replace("</p>","")
		            	$("#ajax_login_err").html(data);
	                }
					<?php if($result['status'] != 1) { ?>
						grecaptcha.reset();
					<?php } ?>
	                hide_loader();
	            }
            });
    	}
    }

    function ajaxLogout(){
	 	show_loader();
    	var url = site_url+'user/ajax_logout';
    	var ajax_login = 'ajax';

    	$.ajax({
	            type: "POST",
	            data: {ajax_login: ajax_login}, 
	            url: url,
	            success: function(data) {  	      

	            	data = data.split("|");

	                if(data.length==2){
	                	$("#user_id").val("");
	                	$("#p_first_name").val("");
	                	$("#p_last_name").val("");
	                	$("#p_email").val("");
	                	$("#p_confirm_email").val("");

	                	$("#ajax_login_err").text("");
	                	$("#login_email").val("");
	                	$("#c_login_email").val("");
	                	$("#login_password").val("");

	                	// $("#confirm_email_div").show();
	                	$("#loginExpand").show();

	                	$("#info_login_email").text("");
	                	$("#divLoginInfo").hide();

	                	// $("#divLogin").show();
	                	$("#userDetailExpand").hide();
	                	$('#buyer_first_name').val('');
	                	$('#buyer_last_name').val('');
	                	$('#buyer_email').val('');
	                	$('#authorize_bill_add1').val('');
	                	$('#authorize_bill_add2').val('');
	                	$('#authorize_bill_city').val('');
	                	$('#authorize_bill_zip').val('');
	                	$('#credit_card_number').val('');
	                	$('#cvc_number').val('');
	                	$('#authorize_bill_country').val('').change();
	                	$('#card_expiry_month').val('');
	                	$('#card_expiry_year').val('');
	                	toggleLogin(1);
	                }
	            	hide_loader();
	            }
            });
    }
    </script>
    
</section>

<!-- CSS/JS FOR FIXSLIDER-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/flexslider.css');?>">
<script type="text/javascript" src="<?php echo base_url('js/jquery.flexslider.js');?>"></script>
<script type="text/javascript">
$(window).load(function() {
  $('.flexslider1').flexslider({
    animation: "fade",
    controlNav: false, 
    directionNav: false,
  });
});
// $(window).scroll(function(){
// 			console.log($(this).scrollTop());			  
//   if ($(this).scrollTop() > 400) {
// 	  $('#cart-block').addClass('cart_b_fixed');
//   	} else {
// 	  $('#cart-block').removeClass('cart_b_fixed');
	  
//   }
// });
</script>
<script type="text/javascript">
$(document).ready(function() {
			   
	$(window).scroll(sticky_relocate);
	sticky_relocate();
	
});
function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var div_top = $('.place-order').offset().top;
    var div_width = $('#sticky').width();
    if (window_top > div_top) {
        $('#sticky').addClass('stick');
        $('#sticky').css("width", div_width);
        //$('.place-order').height($('#sticky').outerHeight());
    } else {
        $('#sticky').removeClass('stick');
        //$('.place-order').height(0);
    }
}
    /*var sticky = $( "#sticky" );
    var offset = sticky.offset();
    var leftpos = Math.round(offset.left)+"px";
    sticky.css("left", leftpos);*/
    $( window ).resize(function() {
        var sticky = $( "#sticky" );
        sticky.css("left", "");
        var offset = sticky.offset();
        var leftpos = Math.round(offset.left)+"px";
        sticky.css("left", leftpos);
    });
	history.pushState(null, null, location.href);
	window.onpopstate = function () {
		history.go(1);
	};

function submit_check_form(){
	$('#place_orderform').bind('submit',function(e){e.preventDefault();});
	var chk = false;
	var errorClass = "alert alert-danger mar10"; 
	set_payment_gateway();// Call function to set default paypal in site_settings if radio button is not selected.

	

	var Payment = "1";
	if($("#paypal").is(':checked')){
    	// $("#paypal_div").show();
    	$("#stripe_div").hide();
    	$("#authorize_net_div").hide();
    	result_value = $("#paypal").val();
    	result_value = "1";    	
    	$("#gateway").val("paypal");
    	Payment = "1";
    }

	if($("#stripe").is(':checked')){ 
		$("#stripe_div").show();
    	$("#authorize_net_div").hide();
		// $("#paypal_div").hide();
    	result_value =  $("#stripe").val();
    	$("#gateway").val("stripe");
    	result_value = "2";
    	Payment = "2";
    }
	if($("#authorize_net").is(':checked')){ 
		$("#stripe_div").show();
    	$("#authorize_net_div").show();
		// $("#paypal_div").hide();
    	result_value =  $("#authorize_net").val();
    	$("#gateway").val("authorize_net");
    	result_value = "3";
    	Payment = "3";
    }

	$('#orderInfo').text("");
	var rr = '<?php $order['prefix'];?>';

	/*Ticket Buy without registration*/
	var user_id = $("#user_id").val();
	if(user_id==""){
		$('#orderInfo').text("<?php echo PELASE_LOGIN_SIGNUP_TO_CONTINUE;?>");
		$('#orderInfo').addClass(errorClass);
		$('html, body').animate({ scrollTop: 0 }, 'slow');
		flag = "1";
		return false;	
	}
	if(user_id!="") {
		if( $.trim($("#p_first_name").val())==''){	
	    	 	$('#orderInfo').text("<?php echo FIRST_NAME_REQUIRED;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				flag = "1";
				return false;	
	   	}

	   	if( $.trim($("#p_last_name").val())==''){	
	    	 	$('#orderInfo').text("<?php echo LAST_NAME_REQUIRED;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				flag = "1";
				return false;	
	   	}

		if( $.trim($("#p_email").val())==''){	
		 		$('#orderInfo').text("<?php echo EMAIL_REQUIRED;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				flag = "1";
				return false;	
		}else{
			var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
			var email = $("#p_email").val();
			if(reg.test(email)){}
			else{
	   			$('#orderInfo').text("<?php echo ENTER_VALID_EMAIL_ADDRESS_PLEASE_CHECK;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				flag = "1";
				return false;		
	   		}
	   	}

	}
	// if(user_id==""){
	// 	if( $.trim($("#p_first_name").val())==''){	
	//     	 	$('#orderInfo').text("First Name is requiered of Ticket Buyer");
	// 			$('#orderInfo').addClass(errorClass);
	// 			$('html, body').animate({ scrollTop: 0 }, 'slow');
	// 			flag = "1";
	// 			return false;	
	//    	}

	//    	if( $.trim($("#p_last_name").val())==''){	
	//     	 	$('#orderInfo').text("Last Name is requiered of Ticket Buyer");
	// 			$('#orderInfo').addClass(errorClass);
	// 			$('html, body').animate({ scrollTop: 0 }, 'slow');
	// 			flag = "1";
	// 			return false;	
	//    	}

	//    	if( $.trim($("#p_email").val())==''){	
	//     	 	$('#orderInfo').text("Email Address is requiered of Ticket Buyer");
	// 			$('#orderInfo').addClass(errorClass);
	// 			$('html, body').animate({ scrollTop: 0 }, 'slow');
	// 			flag = "1";
	// 			return false;	
	//    	}else{
	//    		var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	//    		var email = $("#p_email").val();
	//    		if(reg.test(email)){}
	//    		else{
	//    			$('#orderInfo').text("Please enter valid Email Address");
	// 			$('#orderInfo').addClass(errorClass);
	// 			$('html, body').animate({ scrollTop: 0 }, 'slow');
	// 			flag = "1";
	// 			return false;		
	//    		}
	//    	}

	//    	if( $.trim($("#p_confirm_email").val())==''){	
	//     	 	$('#orderInfo').text("Confirm Email Address is requiered of Ticket Buyer");
	// 			$('#orderInfo').addClass(errorClass);
	// 			$('html, body').animate({ scrollTop: 0 }, 'slow');
	// 			flag = "1";
	// 			return false;	
	//    	}else{
	//    		var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	//    		if(reg.test($("#p_confirm_email").val())){}
	//    		else{
	//    			$('#orderInfo').text("Please enter valid Confirm Email Address");
	// 			$('#orderInfo').addClass(errorClass);
	// 			$('html, body').animate({ scrollTop: 0 }, 'slow');
	// 			flag = "1";
	// 			return false;		
	//    		}
	//    	}

	//    	if($.trim($("#p_email").val())!='' && $.trim($("#p_confirm_email").val())!=''){
	//    		if($("#p_confirm_email").val()!=$("#p_email").val()){
	//    			$('#orderInfo').text("Confirm Email Address should match with Email Address");
	// 			$('#orderInfo').addClass(errorClass);
	// 			$('html, body').animate({ scrollTop: 0 }, 'slow');
	// 			flag = "1";
	// 			return false;			
	//    		}
	//    	}

	// }
	/*End of ticket buy code*/

	if(Payment=="2" || Payment == '3'){ var flag = "0";
         if(Payment == 3) {
			var authorize_bill_add1 = $("[name='authorize_bill_add1']");

			if($.trim(authorize_bill_add1.val())==''){
				$('#orderInfo').text("<?php echo bill_add_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
			}

			var authorize_bill_cntry = $("[name='authorize_bill_country']");

			if($.trim(authorize_bill_cntry.val())==''){
				$('#orderInfo').text("<?php echo bill_country_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
			}

			var authorize_bill_city = $("[name='authorize_bill_city']"); 

			if($.trim(authorize_bill_city.val())==''){
				$('#orderInfo').text("<?php echo bill_city_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
			}

			var authorize_bill_state = $("[name='authorize_bill_state']"); 

			if($.trim(authorize_bill_state.val())==''){
				$('#orderInfo').text("<?php echo bill_state_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
			}

			var authorize_bill_zip = $("[name='authorize_bill_zip']"); 

			if($.trim(authorize_bill_zip.val())==''){
				$('#orderInfo').text("<?php echo bill_zip_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
			}

			var filter=/^[0-9]+$/;
			if(!filter.test(authorize_bill_zip.val())){
				$('#orderInfo').text("<?php echo bill_zip_valid;?>");
				$('#orderInfo').addClass("errors");
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
			}
		 }
		if( $.trim($("#credit_card_number").val())==''){	
        	 	$('#orderInfo').text("<?php echo CREDIT_CARD_REQUIRED;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				flag = "1";
				return false;	
       	}
       	if( $.trim($("#cvc_number").val())==''){	
        	 	$('#orderInfo').text("<?php echo CCV_NUMBER_REQUIRED;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				flag = "1";
				return false;	
       	}
       	if( $.trim($("#card_expiry_month").val())==''){	
        	 	$('#orderInfo').text("<?php echo CCMONTH_REQUIRED;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				flag = "1";
				return false;	
       	}
       	if( $.trim($("#card_expiry_year").val())==''){	
        	 	$('#orderInfo').text("<?php echo CCYEAR_REQUIRED;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				flag = "1";
				return false;	
       	}
       	if( $.trim($("#buyer_email").val())==''){	
        	 	$('#orderInfo').text("<?php echo email_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				flag = "1";
				return false;	
       	}

       	if($.trim($("#buyer_email").val())!=''){
       			var valid = validateEmail($("#buyer_email").val());       			

       			if (!valid) {
			        $('#orderInfo').text("<?php echo email_valid;?>");
					$('#orderInfo').addClass(errorClass);
					$('html, body').animate({ scrollTop: 0 }, 'slow');
					flag = "1";
					return false;
			    }    
       	}

       	/*if(flag=="0"){
       		if(chk){
			 	$('#orderInfo').text("<?php echo starall_req?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
			}else{	
				$('#stop_dclick').attr('disabled','disabled');
				$('#stop_dclick').text("<?php echo Please_wait;?>");
			 	$('#place_orderform').submit();
			}
       	}*/
	}
	
	if('<?php echo $order['prefix'];?>' == '11'){

		var prefix = $("[name='prefix[]']"); 
		var chk = 0;
		 
		for (var i = 0; i < prefix.length; i++)
        {
        	
        	 if( $.trim(prefix[i].value)==''){	
        	 	$('#orderInfo').text("<?php echo prefix_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;	
        	 }
        }

		var b_prefix = $("[name='b_prefix[]']");
		if( $.trim(b_prefix[i].value)==''){	
        	 	$('#orderInfo').text("<?php echo prefix_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;	
        	 } 
	}
	
	if('<?php echo $order['first_name'];?>' =='11'){
		
		var first_name = $("[name='first_name[]']"); 
		var chk = 0;

	 
	 	for (var i = 0; i < first_name.length; i++){
          	if($.trim(first_name[i].value)==''){
	          	$('#orderInfo').text("<?php echo firstname_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
          	}
        }
		var b_first_name = $("[name='b_first_name']"); 
		if($.trim(b_first_name[i].value)==''){
			$('#orderInfo').text("<?php echo firstname_req;?>");
			$('#orderInfo').addClass(errorClass);
			$('html, body').animate({ scrollTop: 0 }, 'slow');
			return false;
		}
	}
	
	if('<?php echo $order['last_name'];?>' =='11'){
		
		 var last_name =  $("[name='last_name[]']"); 
		 var chk = 0;
		 
		for (var i = 0; i < last_name.length; i++)
        {
         	if($.trim(last_name[i].value)==''){
         	 	$('#orderInfo').text("<?php echo lastname_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         	}
        }
		var b_last_name = $("[name='b_last_name']"); 
		if($.trim(b_last_name[i].value)==''){
			$('#orderInfo').text("<?php echo lastname_req;?>");
			$('#orderInfo').addClass(errorClass);
			$('html, body').animate({ scrollTop: 0 }, 'slow');
			return false;
		}
	}

	if('<?php echo $order['suffix'];?>' =='11'){
		
		 var suffix =  $("[name='suffix[]']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < suffix.length; i++)
        {
        	 if($.trim(suffix[i].value)==''){
        	 	$('#orderInfo').text("<?php echo suffix_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }

		var b_suffix =  $("[name='b_suffix']"); 
		if($.trim(b_suffix[i].value)==''){
			$('#orderInfo').text("<?php echo suffix_req;?>");
			$('#orderInfo').addClass(errorClass);
			$('html, body').animate({ scrollTop: 0 }, 'slow');
			return false;
        }
	}


	if('<?php echo $order['email'];?>' =='11'){
		 
		 var email = $("[name='email[]']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < email.length; i++)
         {
        	 if($.trim(email[i].value)==''){
        	 	$('#orderInfo').text("<?php echo email_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }

		var b_email = $("[name='b_email']"); 
		if($.trim(b_email[i].value)==''){
			$('#orderInfo').text("<?php echo email_req;?>");
			$('#orderInfo').addClass(errorClass);
			$('html, body').animate({ scrollTop: 0 }, 'slow');
			return false;
		}

        var filter=/^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		for (var i = 0; i < email.length; i++)
        {
		  if(!filter.test(email[i].value)){
         	 $('#orderInfo').text("<?php echo email_valid;?>");
			 $('#orderInfo').addClass(errorClass);
		     $('html, body').animate({ scrollTop: 0 }, 'slow');
			 return false;
          }
        }

		if(!filter.test(b_email[i].value)){
         	$('#orderInfo').text("<?php echo email_valid;?>");
			$('#orderInfo').addClass(errorClass);
		    $('html, body').animate({ scrollTop: 0 }, 'slow');
			return false;
        }
	}    


	if('<?php echo $order['home_phone'];?>' =='11'){
		
		 var home_phone =  $("[name='home_phone[]']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < home_phone.length; i++)
       	 {
	       	 if($.trim(home_phone[i].value)==''){
	       	 	$('#orderInfo').text("<?php echo home_phone_req;?>");
					$('#orderInfo').addClass(errorClass);
					$('html, body').animate({ scrollTop: 0 }, 'slow');
					return false;
	       	 }
        }
		
		var b_home_phone =  $("[name='b_home_phone']"); 
		if($.trim(b_home_phone[i].value)==''){
			$('#orderInfo').text("<?php echo home_phone_req;?>");
			$('#orderInfo').addClass(errorClass);
			$('html, body').animate({ scrollTop: 0 }, 'slow');
			return false;
		}

		var filter=/^[0-9]+$/;
		for (var i = 0; i < home_phone.length; i++){	
			if(!filter.test(home_phone[i].value)){
				$('#orderInfo').text("<?php echo home_phone_valid;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;	
			}
        }	

	    if(!filter.test(b_home_phone[i].value)){
			$('#orderInfo').text("<?php echo home_phone_valid;?>");
			$('#orderInfo').addClass(errorClass);
			$('html, body').animate({ scrollTop: 0 }, 'slow');
			return false;	
		}	
	}

	if('<?php echo $order['cell_phone'];?>' =='11'){
		
		 var cell_phone =  $("[name='cell_phone[]']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < cell_phone.length; i++)
      	 {
	       	 if($.trim(cell_phone[i].value)==''){
	       	 	$('#orderInfo').text("<?php echo cell_phone_req;?>");
					$('#orderInfo').addClass(errorClass);
					$('html, body').animate({ scrollTop: 0 }, 'slow');
					return false;
	       	 }
       }

	    var b_cell_phone =  $("[name='b_cell_phone']"); 
	    if($.trim(b_cell_phone[i].value)==''){
			$('#orderInfo').text("<?php echo cell_phone_req;?>");
			$('#orderInfo').addClass(errorClass);
			$('html, body').animate({ scrollTop: 0 }, 'slow');
			return false;
		}

		var filter=/^[0-9]+$/;
		for (var i = 0; i < cell_phone.length; i++)
		{	
		  	if(!filter.test(cell_phone[i].value)){
        		$('#orderInfo').text("<?php echo cell_phone_valid;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
         		return false;	
         	}
         
      	}	
	  	if(!filter.test(b_cell_phone[i].value)){
			$('#orderInfo').text("<?php echo cell_phone_valid;?>");
			$('#orderInfo').addClass(errorClass);
			$('html, body').animate({ scrollTop: 0 }, 'slow');
			return false;	
        }	
	}

	/// billing address //////////// 
	if('<?php echo $order['billing_address'];?>' =='11'){
	
		 var bill_cntry = $("[name='bill_country[]']");
		 var chk = 0;
		 
		 for (var i = 0; i < bill_cntry.length; i++)
         {
         	 if($.trim(bill_cntry[i].value)==''){
         	 	$('#orderInfo').text("<?php echo bill_country_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         	 }
         }
         
		var b_bill_cntry = $("[name='b_bill_country']");
		if($.trim(b_bill_cntry[i].value)==''){
			$('#orderInfo').text("<?php echo bill_country_req;?>");
			$('#orderInfo').addClass(errorClass);
			$('html, body').animate({ scrollTop: 0 }, 'slow');
			return false;
		}
         
         var bill_add1 = $("[name='bill_add1[]']");
		 var b_bill_add1 = $("[name='b_bill_add1']");
		 var chk = 0;
		 
		 for (var i = 0; i < bill_add1.length; i++)
         {
         	 if($.trim(bill_add1[i].value)==''){
         	 	$('#orderInfo').text("<?php echo bill_add_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         	 }
         }

		 if($.trim(b_bill_add1[i].value)==''){
         	 	$('#orderInfo').text("<?php echo bill_add_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         	 }
         
         
         var bill_add2 = $("[name='bill_add2[]']");
		 var b_bill_add2 = $("[name='b_bill_add2']");
		 var chk = 0;
		 
		 for (var i = 0; i < bill_add2.length; i++)
         {
         	 if($.trim(bill_add2[i].value)==''){
         	 	//chk=true;
         	 	$('#orderInfo').text("<?php echo bill_add2_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         	 }
         }

		 if($.trim(b_bill_add2[i].value)==''){
         	 	//chk=true;
         	 	$('#orderInfo').text("<?php echo bill_add2_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         	 }
         
         var bill_city = $("[name='bill_city[]']"); 
		 var b_bill_city = $("[name='b_bill_city']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < bill_city.length; i++)
         {
         	 if($.trim(bill_city[i].value)==''){
         	 	$('#orderInfo').text("<?php echo bill_city_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         	 }
         }

		 if($.trim(b_bill_city[i].value)==''){
         	 	$('#orderInfo').text("<?php echo bill_city_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         	 }
         
         var bill_state = $("[name='bill_state[]']"); 

		 var b_bill_state = $("[name='b_bill_state']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < bill_state.length; i++)
         {
         	 if($.trim(bill_state[i].value)==''){
         	 	$('#orderInfo').text("<?php echo bill_state_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         	 }
         }

		 if($.trim(b_bill_state[i].value)==''){
         	 	$('#orderInfo').text("<?php echo bill_state_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         	 }
         
         var bill_zip = $("[name='bill_zip[]']"); 
		 var b_bill_zip = $("[name='b_bill_zip']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < bill_zip.length; i++)
         {
         	 if($.trim(bill_zip[i].value)==''){
         	 	$('#orderInfo').text("<?php echo bill_zip_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         	 }
         }

		 if($.trim(b_bill_zip[i].value)==''){
         	 	$('#orderInfo').text("<?php echo bill_zip_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         	 }
         
         var filter=/^[0-9]+$/;
		 for (var i = 0; i < bill_zip.length; i++)
		 {
		  if(!filter.test(bill_zip[i].value)){
         	 	$('#orderInfo').text("<?php echo bill_zip_valid;?> ");
				$('#orderInfo').addClass("errors");
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
          }
         }

		 if(!filter.test(b_bill_zip[i].value)){
         	 	$('#orderInfo').text("<?php echo bill_zip_valid;?> ");
				$('#orderInfo').addClass("errors");
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
          }
	}  

	
	///////////  home_adrress //////////
	if('<?php echo $order['home_address'];?>' =='11'){
		
		 var home_country = $("[name='home_country[]']");
		 var b_home_country = $("[name='b_home_country']");
		 var chk = 0;
		 
		 for (var i = 0; i < home_country.length; i++)
        {
        	 if($.trim(home_country[i].value)==''){
        	 	$('#orderInfo').text("<?php echo home_country_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }

		if($.trim(b_home_country[i].value)==''){
        	 	$('#orderInfo').text("<?php echo home_country_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        
        var home_add1 = $("[name='home_add1[]']");
		var b_home_add1 = $("[name='b_home_add1']");
		 var chk = 0;
		 
		 for (var i = 0; i < home_add1.length; i++)
        {
        	 if($.trim(home_add1[i].value)==''){
        	 	$('#orderInfo').text("<?php echo home_add_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }

		if($.trim(b_home_add1[i].value)==''){
        	 	$('#orderInfo').text("<?php echo home_add_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        
        var home_add2 = $("[name='home_add2[]']");
		var b_home_add2 = $("[name='b_home_add2']");
		 var chk = 0;
		 
		 for (var i = 0; i < home_add2.length; i++)
        {
        	 if($.trim(home_add2[i].value)==''){
        	 	//chk=true;
        	 	$('#orderInfo').text("<?php echo home_add2_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }

		if($.trim(b_home_add2[i].value)==''){
        	 	//chk=true;
        	 	$('#orderInfo').text("<?php echo home_add2_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        var home_city = $("[name='home_city[]']");
		var b_home_city = $("[name='b_home_city']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < home_city.length; i++)
        {
        	 if($.trim(home_city[i].value)==''){
        	 	$('#orderInfo').text("<?php echo home_city_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }

		if($.trim(b_home_city[i].value)==''){
        	 	$('#orderInfo').text("<?php echo home_city_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        var home_state = $("[name='home_state[]']"); 
		var b_home_state = $("[name='b_home_state']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < home_state.length; i++)
        {
        	 if($.trim(home_state[i].value)==''){
        	 	$('#orderInfo').text("<?php echo home_state_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }

		if($.trim(b_home_state[i].value)==''){
        	 	$('#orderInfo').text("<?php echo home_state_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        var home_zip = $("[name='home_zip[]']"); 
		var b_home_zip = $("[name='b_home_zip']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < home_zip.length; i++)
        {
        	 if($.trim(home_zip[i].value)==''){
        	 	$('#orderInfo').text("<?php echo home_zip_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }

		if($.trim(b_home_zip[i].value)==''){
        	 	$('#orderInfo').text("<?php echo home_zip_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        var filter=/^[0-9]+$/;
		 for (var i = 0; i < home_zip.length; i++)
		 {
		  if(!filter.test(home_zip[i].value)){
        	 	$('#orderInfo').text("<?php echo bill_zip_valid;?> ");
				$('#orderInfo').addClass("errors");
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         }
        }
		if(!filter.test(b_home_zip[i].value)){
        	 	$('#orderInfo').text("<?php echo bill_zip_valid;?> ");
				$('#orderInfo').addClass("errors");
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         }
	}

	//// shipping address //////////////
	if('<?php echo $order['shipping_address'];?>' =='11'){
		
		 var ship_country = $("[name='ship_country[]']");
		 var b_ship_country = $("[name='b_ship_country']");
		 var chk = 0;
		 
		 for (var i = 0; i < ship_country.length; i++)
        {
        	 if($.trim(ship_country[i].value)==''){
        	 	$('#orderInfo').text("<?php echo ship_country_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }
		if($.trim(b_ship_country[i].value)==''){
        	 	$('#orderInfo').text("<?php echo ship_country_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        
        var ship_add1 = $("[name='ship_add1[]']");
		var b_ship_add1 = $("[name='b_ship_add1']");
		 var chk = 0;
		 
		 for (var i = 0; i < ship_add1.length; i++)
        {
        	 if($.trim(ship_add1[i].value)==''){
        	 	$('#orderInfo').text("<?php echo ship_add_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }

		if($.trim(b_ship_add1[i].value)==''){
        	 	$('#orderInfo').text("<?php echo ship_add_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        
        var ship_add2 = $("[name='ship_add2[]']");
		var b_ship_add2 = $("[name='b_ship_add2']");
		 var chk = 0;
		 
		 for (var i = 0; i < ship_add2.length; i++)
        {
        	 if($.trim(ship_add2[i].value)==''){
        	 	//chk=true;
        	 	$('#orderInfo').text("<?php echo ship_add2_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }
		if($.trim(b_ship_add2[i].value)==''){
        	 	//chk=true;
        	 	$('#orderInfo').text("<?php echo ship_add2_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        var ship_city = $("[name='ship_city[]']"); 
		var b_ship_city = $("[name='b_ship_city']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < ship_city.length; i++)
        {
        	 if($.trim(ship_city[i].value)==''){
        	 	$('#orderInfo').text("<?php echo ship_city_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }
		if($.trim(b_ship_city[i].value)==''){
        	 	$('#orderInfo').text("<?php echo ship_city_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        var ship_state = $("[name='ship_state[]']"); 
		var b_ship_state = $("[name='b_ship_state']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < ship_state.length; i++)
        {
        	 if($.trim(ship_state[i].value)==''){
        	 	$('#orderInfo').text("<?php echo ship_state_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }
		if($.trim(b_ship_state[i].value)==''){
        	 	$('#orderInfo').text("<?php echo ship_state_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        var ship_zip = $("[name='ship_zip[]']"); 

		 var b_ship_zip = $("[name='b_ship_zip']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < ship_zip.length; i++)
        {
        	 if($.trim(ship_zip[i].value)==''){
        	 	$('#orderInfo').text("<?php echo ship_zip_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }

		if($.trim(b_ship_zip[i].value)==''){
			$('#orderInfo').text("<?php echo ship_zip_req;?>");
			$('#orderInfo').addClass(errorClass);
			$('html, body').animate({ scrollTop: 0 }, 'slow');
			return false;
		}
        
        var filter=/^[0-9]+$/;
		 for (var i = 0; i < ship_zip.length; i++)
		 {
		  if(!filter.test(ship_zip[i].value)){
        	 	$('#orderInfo').text("<?php echo bill_zip_valid;?> ");
				$('#orderInfo').addClass("errors");
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         }
        }
		if(!filter.test(b_ship_zip[i].value)){
        	 	$('#orderInfo').text("<?php echo bill_zip_valid;?> ");
				$('#orderInfo').addClass("errors");
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         }
	}
	///// work address /////////
	if('<?php echo $order['work_address'];?>' =='11'){
		
		 var work_country = $("[name='work_country[]']");
		 var b_work_country = $("[name='b_work_country']");
		 var chk = 0;
		 
		 for (var i = 0; i < work_country.length; i++)
        {
        	 if($.trim(work_country[i].value)==''){
        	 	$('#orderInfo').text("<?php echo work_country_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }

		 if($.trim(b_work_country[i].value)==''){
        	 	$('#orderInfo').text("<?php echo work_country_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        
        var work_add1 = $("[name='work_add1[]']");
		var b_work_add1 = $("[name='b_work_add1']");
		 var chk = 0;
		 
		 for (var i = 0; i < work_add1.length; i++)
        {
        	 if($.trim(work_add1[i].value)==''){
        	 	$('#orderInfo').text("<?php echo work_add_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }

		 if($.trim(b_work_add1[i].value)==''){
        	 	$('#orderInfo').text("<?php echo work_add_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        
        var work_add2 = $("[name='work_add2[]']");
		var b_work_add2 = $("[name='b_work_add2']");
		 var chk = 0;
		 
		 for (var i = 0; i < work_add2.length; i++)
        {
        	 if($.trim(work_add2[i].value)==''){
        	 	$('#orderInfo').text("<?php echo work_add2_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }
		if($.trim(b_work_add2[i].value)==''){
        	 	$('#orderInfo').text("<?php echo work_add2_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        var work_city = $("[name='work_city[]']"); 
		var b_work_city = $("[name='b_work_city']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < work_city.length; i++)
        {
        	 if($.trim(work_city[i].value)==''){
        	 	$('#orderInfo').text("<?php echo work_city_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }

		if($.trim(b_work_city[i].value)==''){
        	 	$('#orderInfo').text("<?php echo work_city_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        var work_state = $("[name='work_state[]']"); 
		var b_work_state = $("[name='b_work_state']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < work_state.length; i++)
        {
        	 if($.trim(work_state[i].value)==''){
        	 	$('#orderInfo').text("<?php echo work_state_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }

		if($.trim(b_work_state[i].value)==''){
        	 	$('#orderInfo').text("<?php echo work_state_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        var work_zip = $("[name='work_zip[]']"); 
		var b_work_zip = $("[name='b_work_zip']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < work_zip.length; i++)
        {
        	 if($.trim(work_zip[i].value)==''){
        	 	$('#orderInfo').text("<?php echo work_zip_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        }
		if($.trim(b_work_zip[i].value)==''){
        	 	$('#orderInfo').text("<?php echo work_zip_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
        	 }
        
        var filter=/^[0-9]+$/;
		 for (var i = 0; i < work_zip.length; i++)
		 {
		  if(!filter.test(work_zip[i].value)){
        	 	$('#orderInfo').text("<?php echo bill_zip_valid;?> ");
				$('#orderInfo').addClass("errors");
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         }
        }
		if(!filter.test(b_work_zip[i].value)){
        	 	$('#orderInfo').text("<?php echo bill_zip_valid;?> ");
				$('#orderInfo').addClass("errors");
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         }
	}
	

	if('<?php echo $order['job_title'];?>' =='11'){
		
		 var job_title = $("[name='work_job_title[]']");
		 var b_job_title = $("[name='b_work_job_title']");
		 var chk = 0;
		 
		 for (var i = 0; i < job_title.length; i++)
       {
       	 if($.trim(job_title[i].value)==''){
       	 	$('#orderInfo').text("<?php echo job_title_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
       	 }
       }

	   if($.trim(b_job_title[i].value)==''){
       	 	$('#orderInfo').text("<?php echo job_title_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
       	 }
	}

	if('<?php echo $order['company'];?>' =='11'){
		
		 var work_company = $("[name='work_company[]']");
		 var b_work_company = $("[name='b_work_company']");
		 var chk = 0;
		 
		 for (var i = 0; i < work_company.length; i++)
      {
      	 if($.trim(work_company[i].value)==''){
      	 	$('#orderInfo').text("<?php echo work_company_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
      	 }
      }
	  if($.trim(b_work_company[i].value)==''){
      	 	$('#orderInfo').text("<?php echo work_company_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
      	 }
	}

	if('<?php echo $order['work_phone'];?>' =='11'){
		
		 var work_phone = $("[name='work_phone[]']");
		 var b_work_phone = $("[name='b_work_phone']");
		 var chk = 0;
		 
		 for (var i = 0; i < work_phone.length; i++)
     	 {
	     	 if($.trim(work_phone[i].value)==''){
	     	 	$('#orderInfo').text("<?php echo work_phone_req;?>");
					$('#orderInfo').addClass(errorClass);
					$('html, body').animate({ scrollTop: 0 }, 'slow');
					return false;
	     	 }
     	 }
		  if($.trim(b_work_phone[i].value)==''){
	     	 	$('#orderInfo').text("<?php echo work_phone_req;?>");
					$('#orderInfo').addClass(errorClass);
					$('html, body').animate({ scrollTop: 0 }, 'slow');
					return false;
	     	 }

		 var filter=/^[0-9]+$/;
		 for (var i = 0; i < work_phone.length; i++)
		 {
			  if(!filter.test(work_phone[i].value)){
	         	 	$('#orderInfo').text("<?php echo work_phone_valid;?>");
					$('#orderInfo').addClass(errorClass);
					$('html, body').animate({ scrollTop: 0 }, 'slow');
					return false;
	          }
         }
		 if(!filter.test(b_work_phone[i].value)){
	         	 	$('#orderInfo').text("<?php echo work_phone_valid;?>");
					$('#orderInfo').addClass(errorClass);
					$('html, body').animate({ scrollTop: 0 }, 'slow');
					return false;
	          }
	}
   	 
	if('<?php echo $order['blog'];?>' =='11'){
   
		 var bolg = $("[name='work_blog[]']"); 
		 var b_bolg = $("[name='b_work_blog']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < bolg.length; i++)
         {
         	 if($.trim(bolg[i].value)==''){
         	 	$('#orderInfo').text("<?php echo work_blog_req?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         	 }
         }
		 if($.trim(b_bolg[i].value)==''){
         	 	$('#orderInfo').text("<?php echo work_blog_req?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         	 }
         
         var filter=/(https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/;
         
		  for (var i = 0; i < bolg.length; i++)
         	{
		  		if(!filter.test(bolg[i].value)){
         	 	$('#orderInfo').text("<?php echo work_blog_valid;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
          }
        } 
		if(!filter.test(b_bolg[i].value)){
         	 	$('#orderInfo').text("<?php echo work_blog_valid;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
          }
	}
	
	if('<?php echo $order['website'];?>' =='11'){
		
		 var website = $("[name='work_website[]']"); 
		 var b_website = $("[name='b_work_website']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < website.length; i++)
	    {
	    	 if($.trim(website[i].value)==''){
	    	 	//chk=true;
	    	 	$('#orderInfo').text("<?php echo work_website_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
	    	 }
	    }
		if($.trim(b_website[i].value)==''){
	    	 	//chk=true;
	    	 	$('#orderInfo').text("<?php echo work_website_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
	    	 }
	    
		var filter=/(https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/;
	    
		  for (var i = 0; i < website.length; i++)
	    	{
		  		if(!filter.test(website[i].value)){

	    	 	$('#orderInfo').text("<?php echo work_website_valid;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
	     	 }
	   }
	   if(!filter.test(b_website[i].value)){

			$('#orderInfo').text("<?php echo work_website_valid;?>");
			$('#orderInfo').addClass(errorClass);
			$('html, body').animate({ scrollTop: 0 }, 'slow');
			return false;
		}
	}

	if('<?php echo $order['gender'];?>' =='11'){
		
		 var gender =  $("[name='gender[]']"); 
		 var b_gender =  $("[name='b_gender']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < gender.length; i++)
	    {
	    	 if($.trim(gender[i].value)==''){
	    	 	$('#orderInfo').text("<?php echo gender_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
	    	 }
	    }
		if($.trim(b_gender[i].value)==''){
	    	 	$('#orderInfo').text("<?php echo gender_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
	    	 }
	}
	
	if('<?php echo $order['birth_date'];?>' =='11'){
		
		 var birth_date = $("[name='birth_date[]']");
		 var b_birth_date = $("[name='b_birth_date']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < birth_date.length; i++)
	    {
	    	 if($.trim(birth_date[i].value)==''){
	    	 	$('#orderInfo').text("<?php echo bdate_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
	    	 }
	    }

		 if($.trim(b_birth_date[i].value)==''){
	    	 	$('#orderInfo').text("<?php echo bdate_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
	    	 }
	}
	
	if('<?php echo $order['age'];?>' =='11'){
		 var age = $("[name='age[]']");
		 var b_age = $("[name='b_age']"); 
		 var chk = 0;
		 
		 for (var i = 0; i < age.length; i++)
         {
         	 if($.trim(age[i].value)==''){
         	 	$('#orderInfo').text("<?php echo age_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         	 }
         }

		 if($.trim(b_age[i].value)==''){
         	 	$('#orderInfo').text("<?php echo age_req;?>");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
         	 }
         
         var filter=/^[0-9]+$/;
		 for (var i = 0; i < age.length; i++)
		 {
		  if(!filter.test(age[i].value)){
         	 	$('#orderInfo').text("<?php echo age_req_valid;?> ");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
          }
         }

		 if(!filter.test(b_age[i].value)){
         	 	$('#orderInfo').text("<?php echo age_req_valid;?> ");
				$('#orderInfo').addClass(errorClass);
				$('html, body').animate({ scrollTop: 0 }, 'slow');
				return false;
          }
	}


	<?php 
	$dc = 0;
	$pc = 0;
	$fc = 0; 
		$i=0;

		if($order['ctype'] == 1 ){
			if($questions){
				$ticks = $ticket_qty;
				foreach($questions as $q){
					$ask =1;
					if($q['rules']=='11') {
						
						if($q['spec_ticket']==1){
			  						$ask = 0;
			  						$que_ticks = export(',',$q['tickets']);
			  						
			  						foreach($que_ticks as $qticks){
			  							if(array_key_exits($qticks,$ticks)){
			  								$ask = 1;
			  							}
			  							
			  						}
						}
						
						if($ask == 1){
						?>	
							
							var qid = <?php echo $q['id'];?>;
							var qtype = '<?php echo $q['que_type'];?>';
							if(qtype == 'text' || qtype == 'para' || qtype == 'select' ){
             	 	
              				 	 var ques = $("[name='que["+qid+"][]']");
								 var chk = 0;
								 
								 for (var i = 0; i < ques.length; i++)
						         {
						         	 if($.trim(ques[i].value)==''){
						         	 	$('#orderInfo').text("<?php echo starf_req;?>");
										$('#orderInfo').addClass(errorClass);
										$('html, body').animate({ scrollTop: 0 }, 'slow');
										return false;
						         	 }
						         }
              			 	
							} else {
              				 	 var ques = $("[name='que["+qid+"][]']"); 
								 var chk = 1;
								 
								 for (var i = 0; i < ques.length; i++)
						         {
						         	 if(ques[i].checked==true){
						         	 	chk = 0;
						         	 }
						         }
						         
						         if(chk==1){
						         	$('#orderInfo').text("<?php echo starf_req;?>");
									$('#orderInfo').addClass(errorClass);
									$('html, body').animate({ scrollTop: 0 }, 'slow');
									return false;
						         }
							}
							<?php
						}
					}
				}
			}
			
			if($waivers){ 
				$ticks = $ticket_qty;
				foreach($waivers as $q){ 
					$ask =1;
					if($q['rules']=='11') { 
						
						if($q['spec_ticket']==1){
	  						$ask = 0;
	  						$que_ticks = export(',',$q['tickets']);
	  						
	  						foreach($que_ticks as $qticks){
	  							if(array_key_exits($qticks,$ticks)){
	  								$ask = 1;
	  							}
	  							
	  						}
						}
						if($ask == 1){	
						?>
						
						 var qid = <?php echo $q['id'];?>;
						 var ques = $("[name='que["+qid+"][]']");
						 var chk = 0;
						 
						 for (var i = 0; i < ques.length; i++)
				         {
				         	 if(ques[i].checked==false){
				         	 	chk=1
				         	 } 	
				         }
				         
				         if(chk==1){
				         	$('#orderInfo').text("<?php echo waivers_req;?>");
							$('#orderInfo').addClass(errorClass);
							$('html, body').animate({ scrollTop: 0 }, 'slow');
							return false;
				         }
						
						<?php 
						}
					}
				}
			}       			         			 
		}
		
		if($order['ctype'] == 2){ $k = 1;    
			
			//=== Free ticket stat===//
			if($free_tickets){
				foreach($free_tickets as $free){              			
					if($ticket_qty[$free['id']] && $ticket_qty[$free['id']]!='0'){
						
						if($questions){
							foreach($questions as $q){
								$ask =1;
								if($q['rules']=='11') {
									
									if($q['spec_ticket']==1){
										
						  				$ask = 0;
						  				$que_ticks = export(',',$q['tickets']);
						  				
						  				if(array_key_exits($free['id'],$que_ticks)){
						  					$ask = 1;
						  				}
								
									}
									
									if($ask == 1){
									?>	
									
									var qid = <?php echo $q['id']; ?>;
									var qtype = '<?php echo $q['que_type'];?>';
									if(qtype == 'text' || qtype == 'para' || qtype == 'select' ){

										
		             	 	
		              				 	 var ques = $("[name='que["+qid+"][]']");
										 var chk = 0;
										 
										 for (var i = 0; i < ques.length; i++)
								         {
								         	 if($.trim(ques[i].value)==''){
								         	 	$('#orderInfo').text("<?php echo starf_req;?>");
												$('#orderInfo').addClass(errorClass);
												$('html, body').animate({ scrollTop: 0 }, 'slow');
												return false;
								         	 }
								         }
		              			 	
									} else { 
		              				 	 var ques = $("[name='que["+qid+"][<?php echo $k;?>][]']"); 
										 var chk = 1;

										 for (var i = 0; i < ques.length; i++)
								         { 
								         	 if(ques[i].checked==true){
								         	 	chk = 0;
								         	 }
								         }

								        
								         if(chk==1){
								         	$('#orderInfo').text("<?php echo starf_req;?>");
											$('#orderInfo').addClass(errorClass);
											$('html, body').animate({ scrollTop: 0 }, 'slow');
											return false;
								         }
									}
									<?php	
									}
								}
							}
						}
						
						if($waivers){
							foreach($waivers as $q){
								$ask =1;
								if($q['rules']=='11') {
									
									if($q['spec_ticket']==1){
				  						$ask = 0;
				  						$que_ticks = export(',',$q['tickets']);
				  						
										if(array_key_exits($free['id'],$que_ticks)){
						  					$ask = 1;
						  				}
									}
									if($ask == 1){	
									?>
									
									 var qid = <?php echo $q['id'];?>;
									 var ques = $("[name='que["+qid+"][]']");
									 var chk = 0;
									 
									 for (var i = 0; i < ques.length; i++)
							         {
							         	 if(ques[i].checked==false){
							         	 	chk=1
							         	 } 	
							         }
							         
							         if(chk==1){
							         	$('#orderInfo').text("<?php echo waivers_req;?>");
										$('#orderInfo').addClass(errorClass);
										$('html, body').animate({ scrollTop: 0 }, 'slow');
										return false;
							         }
									
									<?php 
									}
								}
							}
						}
						
						$k++;
			
					}
				}
			}
			//=== Free ticket end===//
			
			//=== paid ticket stat===//
			if($paid_tickets){                               	
				foreach($paid_tickets as $paid){      
					if($ticket_qty[$paid['id']] && $ticket_qty[$paid['id']]!='0'){
						
						if($questions){
							foreach($questions as $q){
								$ask =1;
								if($q['rules']=='11') {
									
									if($q['spec_ticket']==1){
										
						  				$ask = 0;
						  				$que_ticks = export(',',$q['tickets']);
						  				
						  				if(array_key_exits($paid['id'],$que_ticks)){
						  					$ask = 1;
						  				}
								
									}
									
									if($ask == 1){
									?>	
							
									var qid = <?php echo $q['id']; ?>;
									var qtype = '<?php echo $q['que_type'];?>';
									if(qtype == 'text' || qtype == 'para' || qtype == 'select' ){
		             	 	
		              				 	 var ques = $("[name='que["+qid+"][]']");
										 var chk = 0;
										 
										 for (var i = 0; i < ques.length; i++)
								         {
								         	 if($.trim(ques[i].value)==''){
								         	 	$('#orderInfo').text("<?php echo starf_req;?>");
												$('#orderInfo').addClass(errorClass);
												$('html, body').animate({ scrollTop: 0 }, 'slow');
												return false;
								         	 }
								         }
		              			 	
									} else {
		              				 	 var ques = $("[name='que["+qid+"][<?php echo $k;?>][]']"); 
										 var chk = 1;
										 
										 for (var i = 0; i < ques.length; i++)
								         {
								         	 if(ques[i].checked==true){
								         	 	chk = 0;
								         	 }
								         }
								         
								         if(chk==1){
								         	$('#orderInfo').text("<?php echo starf_req;?>");
											$('#orderInfo').addClass(errorClass);
											$('html, body').animate({ scrollTop: 0 }, 'slow');
											return false;
								         }
									}
									<?php	
									}
								}
							}
						}
						
						if($waivers){
							foreach($waivers as $q){
								$ask =1;
								if($q['rules']=='11') {
									
									if($q['spec_ticket']==1){
				  						$ask = 0;
				  						$que_ticks = export(',',$q['tickets']);
				  						
										if(array_key_exits($paid['id'],$que_ticks)){
						  					$ask = 1;
						  				}
									}
									if($ask == 1){	
									?>
									
									 var qid = <?php echo $q['id'];?>;
									 var ques = $("[name='que["+qid+"][]']");
									 var chk = 0;
									 
									 for (var i = 0; i < ques.length; i++)
							         {
							         	 if(ques[i].checked==false){
							         	 	chk=1
							         	 } 	
							         }
							         
							         if(chk==1){
							         	$('#orderInfo').text("<?php echo waivers_req;?>");
										$('#orderInfo').addClass(errorClass);
										$('html, body').animate({ scrollTop: 0 }, 'slow');
										return false;
							         }
									
									<?php 
									}
								}
							}
						}
						$k++;
					}
				}
			}
			//=== paid ticket end===//
			
			//=== donation ticket stat===//
			if($donation_tickets){		                      	
				foreach($donation_tickets as $donation){
					if($ticket_qty[$donation['id']] && $ticket_qty[$donation['id']]!='0' && $ticket_qty[$donation['id']]!=''){
						
						if($questions){
							foreach($questions as $q){
								$ask =1;
								if($q['rules']=='11') {
									
									if($q['spec_ticket']==1){
										
						  				$ask = 0;
						  				$que_ticks = export(',',$q['tickets']);
						  				
						  				if(array_key_exits($donation['id'],$que_ticks)){
						  					$ask = 1;
						  				}
								
									}
									
									if($ask == 1){
									?>	
							
									var qid = <?php echo $q['id']; ?>;
									var qtype = '<?php echo $q['que_type'];?>';
									if(qtype == 'text' || qtype == 'para' || qtype == 'select' ){
		             	 	
		              				 	 var ques = $("[name='que["+qid+"][]']");
										 var chk = 0;
										 
										 for (var i = 0; i < ques.length; i++)
								         {
								         	 if($.trim(ques[i].value)==''){
								         	 	$('#orderInfo').text("<?php echo starf_req;?>");
												$('#orderInfo').addClass(errorClass);
												$('html, body').animate({ scrollTop: 0 }, 'slow');
												return false;
								         	 }
								         }
		              			 	
									} else {
		              				 	 var ques = $("[name='que["+qid+"][<?php echo $k;?>][]']"); 
										 var chk = 1;
										 
										 for (var i = 0; i < ques.length; i++)
								         {
								         	 if(ques[i].checked==true){
								         	 	chk = 0;
								         	 }
								         }
								         
								         if(chk==1){
								         	$('#orderInfo').text("<?php echo starf_req;?>");
											$('#orderInfo').addClass(errorClass);
											$('html, body').animate({ scrollTop: 0 }, 'slow');
											return false;
								         }
									}
									<?php	
									}
								}
							}
						}
						
						if($waivers){
							foreach($waivers as $q){
								$ask =1;
								if($q['rules']=='11') {
									
									if($q['spec_ticket']==1){
				  						$ask = 0;
				  						$que_ticks = export(',',$q['tickets']);
				  						
										if(array_key_exits($donation['id'],$que_ticks)){
						  					$ask = 1;
						  				}
									}
									if($ask == 1){	
									?>
									
									 var qid = <?php echo $q['id'];?>;
									 var ques = $("[name='que["+qid+"][]']");
									 var chk = 0;
									 
									 for (var i = 0; i < ques.length; i++)
							         {
							         	 if(ques[i].checked==false){
							         	 	chk=1
							         	 } 	
							         }
							         
							         if(chk==1){
							         	$('#orderInfo').text("<?php echo waivers_req;?>");
										$('#orderInfo').addClass(errorClass);
										$('html, body').animate({ scrollTop: 0 }, 'slow');
										return false;
							         }
									
									<?php 
									}
								}
							}
						}
						$k++;
					}
				}
			}                      				
			//=== donation ticket end===//
		}
	?>
	
	if(chk){
	 	$('#orderInfo').text("<?php echo starall_req?>");
		$('#orderInfo').addClass(errorClass);
		$('html, body').animate({ scrollTop: 0 }, 'slow');
		return false;
	 }else{	
		clock.stop();
		$('.timer').find('strong').attr('id','');

	 	$('#place_orderform').unbind('submit');
		$('#stop_dclick').attr('disabled','disabled');
		$('#stop_dclick').text("<?php echo Please_wait;?>");
		$('#stop_dclick').removeAttr("onclick");

	 	$('#place_orderform').submit();
	 }
}
</script>