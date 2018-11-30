<?php $event_images=getAllRecordById('event_images','event_id',$event_details['id']);
	 $event_logo =  $event_details['event_logo'];
	  	if(isset( $event_images[0])){$image_slide =  $event_images[0]['image_name'];}else{ $image_slide ='';}
	  
	  	if($image_slide!=''){
	  		$image = base_url().'upload/event/orig/'.$image_slide;
	  	}else {
	  		$image = base_url().'upload/event/orig/'.$event_logo;
	  	}

 ?>
 <?php 
$address='';

if($event_id!=''){
	
		if($event_venue['venue_add1']!='')
		{	

			$address=$event_venue['venue_add1'];
		}
		if($event_venue['venue_add2']!='')
		{
			if($address!=''){
			$address=$address.','.$event_venue['venue_add2'];
				}else
				{
					$address=$event_venue['venue_add2'];
				}
		}
		if($event_venue['venue_city']!='')
		{
			if($address!=''){
			$address=$address.','.$event_venue['venue_city'];
				}else
				{
					$address=$event_venue['venue_city'];
				}
		}
		if($event_venue['venue_state']!='')
		{
			if($address!=''){
			$address=$address.','.$event_venue['venue_state'];
				}else
				{
					$address=$event_venue['venue_state'];
				}
		}
		if($event_venue['venue_country']!='')
		{
			if($address!='')
			{
				$address=$address.','.$event_venue['venue_country'];
				}else
				{
					$address=$event_venue['venue_country'];
				}
		}
	}
	
?>


<!-- for Google -->
<meta name="keywords" content="<?php echo SecureShowData(strip_tags($event_details['event_detail']));?>" />
<meta name="author" content="" />
<meta name="copyright" content="" />
<meta name="application-name" content="" />

<!-- for Facebook -->          
<meta property="og:title" content="<?php echo SecureShowData($event_details['event_title']).' At '.ucfirst(SecureShowData($event_venue['name'])).' | '.SecureShowData($address)." By ".SecureShowData($org_name) ;?>" />
<meta property="og:type" content="Event" />
<meta property="og:image" content="<?php echo $image; ?>" />
<meta property="og:url" content="<?php echo current_url(); ?> " />
<meta property="og:description" content=" <?php echo SecureShowData(strip_tags($event_details['event_detail']));?>" />
<meta property="event:start_time" content="<?php echo $event_details['event_start_date_time'];?>" /> 

<!-- for Twitter -->          
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="<?php echo SecureShowData($event_details['event_title']).' At '.ucfirst(SecureShowData($event_venue['name'])).' | '.SecureShowData($address)." By ".SecureShowData($org_name) ;?>" />
<meta name="twitter:description" content="<?php echo SecureShowData(strip_tags($event_details['event_detail']));?>" />
<meta name="twitter:image" content="<?php echo $image; ?>" />