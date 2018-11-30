
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

<?php
       
	if($event_details['active']==1)
	{
        $is_purchase=1;    
    }else{
        $is_purchase=2;
    }
        
	$free_tickets = $this->event_model->getTickets($event_id,1);
	$paid_tickets = $this->event_model->getTickets($event_id,2);
	$donation_tickets = $this->event_model->getTickets($event_id,3);

	$paid_ticket_fee = $site_setting['paid_ticket_fee'];
	
	$headertext='';
	$footertext='';
	
	if($eventTheme){
		$headertext = $eventTheme['header_text_display'];
		$footertext = $eventTheme['footer_text_display'];
	}	
	
	
	$data = array();
	
	$back = $oneTheme['background'];
	$title = $oneTheme['event_title'];
	$head_text = $oneTheme['header_text'];
	$box_back = $oneTheme['box_background'];
	$body_text = $oneTheme['body_text'];
	$box_border = $oneTheme['box_border'];
	$link = $oneTheme['links'];
	$box_head = $oneTheme['box_header'];
	
	$updates = getEventUpdate($event_details['id']);
	
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/layout_style.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/flexslider.css');?>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="<?php echo base_url();?>css/popup.css" rel="stylesheet" />
<style type="text/css">
	.flexslider .slides img {
    height: auto;
    min-height: 610px !important; 
	}
</style>
<script src="<?php echo base_url();?>js/jquery.magnific-popup.js"></script>
 <script type="text/javascript">
      $(document).ready(function() {
      
    $('.mfPopup').magnificPopup({
          type: 'ajax',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });
        $('.mfPopup_add').magnificPopup({
          type: 'ajax',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });
    $('.mfPopupIn').magnificPopup({
          type: 'inline',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });



      });
  $(window).load(function() {
  $('.flexslider').flexslider({
    animation: "fade",
    controlNav: false, 
    directionNav: false,
  });
});
</script>

<style>

.mainBGColor {
	background: <?php echo $back; ?>;
}
.tra-main-wrap .tra-wrap {
	border: 15px solid <?php echo $back; ?>;
	background: <?php echo $box_back; ?>;
}
.tra-right {
	background: <?php echo $box_back; ?>;	
}
.tra-tab .nav-tabs>li>a {
	color: #fff;
    padding: 11px 24px 12px;
    font-size: 15px;
    background: <?php echo $link; ?>;
}
.thead-inverse th {
	background: <?php echo $back; ?>;
    color: #FFFFFF;
}
#eventDesign .eventTitleColor {
	color: <?php echo $title; ?>;
}
#eventDesign .eventTitleColor a, #eventDesign .eventTitleColor a:hover {
	color: <?php echo $title; ?>;
}
#eventDesign .red-event {
	color: <?php echo $head_text; ?>;
}
#eventDesign .event-detail {
	background: <?php echo $box_back; ?>;
}
#eventDesign .event-detail, #eventDesign .icon-protection {
	color: <?php echo $body_text; ?>;
}
#eventDesign .brdrColor, #eventDesign .event-detail, #eventDesign .red-event, #eventDesign .eventBrdr, #eventDesign .org_Name, #eventDesign .table>thead>tr>th, #eventDesign .table>tbody>tr>td {
	border-color: <?php echo $box_border; ?>;
}
#eventDesign .linkColor, #eventDesign .org_Link, #eventDesign a, #eventDesign a:hover {
 	color: <?php echo $link; ?>;
}
#eventDesign .linkColor:hover, #eventDesign .org_Link:hover, #eventDesign .eventTitleColor a:hover {
	text-decoration: underline;
}
#eventDesign .event-webpage .red-event {
	background-color: <?php echo $box_head; ?>;
}
#eventDesign .btn-event, #eventDesign .btn-saveevent {
	background:<?php echo $body_text; ?>;
	color:<?php echo $box_back; ?>;
}
#eventDesign .btn-event:hover, #eventDesign .btn-saveevent:hover {
	background:<?php echo $body_text; ?>;
	color:<?php echo $box_back; ?>;
	box-shadow: none !important;
}
#eventDesign .passBox input[type="password"] {
	border-color: <?php echo $body_text;?>;
	box-shadow: none;
}
#eventDesign .red-event {
	border-bottom: 1px solid transparent !important;
}  
</style>
 
<script type="text/javascript" src="<?php echo base_url('js/jquery.flexslider.js');?>"></script>

<div class="endedEvent">
<i class="glyphicon glyphicon-time"></i> Layout 3
</div>
<section class="mainBGColor" id="">
<div class="container padTB50">
<div id="event_view_page_theme">
<div id="event_theme_page_change">
<div id="header_text_html">
</div>
<div class="row">
<div class="container">
<div class="tra-main-wrap clearfix">
  <div class="tra-wrap col-md-12">
    
    <div class="col-md-5 tra-left">
    <a href="<?php echo site_url('event/slider/'.$event_id);?>" class='mfPopup'>     
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
    <div class="col-md-7 tra-right">
    <div class="tra-wrp">
      <h1><?php echo SecureShowData(ucfirst($event_details['event_title']));?></h1>  
      <div class="tra-sub-title">
      <span>By <?php echo SecureShowData($org_name);?>  |</span>
      <span><a href="<?php echo site_url('event/contact_organizer/'.$event_details['user_id'].'/'.$event_details['id']); ?>" class="mfPopup"><?php echo Contact_the_organizer ?></a></span>
      </div>
      <div class="tra-details">
        <div class="tra-loc">
          <div class="tra-loc-img">
           <i class="fa fa-compass"></i>

          </div>
          <div class="tra-loc-det"> 
			<span class="title">Location</span>
     		<p class="detail">  <?php echo ucfirst($address);?></p></div>  
        </div>
        <div class="tra-loc">
          <div class="tra-loc-img"><i class="fa fa-calendar"></i>
        </div>
          <div class="tra-loc-det">
          <span class="title">Date</span>

         <p class="detail"> <?php 

            	$display_start_time = $event_details['display_start_time'];
		        $display_end_time = $event_details['display_end_time'];
		        $display_timezone = $event_details['display_time_zone'];

	            $input_tz = date_default_timezone_get();
	            $output_tz = $timezone;
	            $zoneList = timezone_identifiers_list();
            
	            echo changeDateTime($event_details['event_start_date_time'], $input_tz, $output_tz, $display_start_time).' to '.changeDateTime($event_details['event_end_date_time'], $input_tz, $output_tz, $display_end_time); 

	            if($display_timezone){
	            	echo ' ('.$timezone.')';
	            } 
	            ?>

         <span class="time"> 
         <?php 
            	echo date('g:i A',strtotime($event_details['event_start_date_time'])); 
            	echo date('g:i A',strtotime($event_details['event_end_date_time']));
            ?> 
         </span> </p>
          </div>  
        </div>
      </div>
      </div>  
      <div class="tra-tab">
              <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#EvnDtl"><i class="fa fa-asterisk"></i> Event Details</a></li>
    <li><a data-toggle="tab" href="#TicInfo"><i class="fa fa-info-circle"></i> Ticket Information</a></li>
 

  </ul>

  <div class="tab-content">
    <div id="EvnDtl" class="tab-pane fade in active">
      <h3>Event Detail</h3>
      <p><?php echo SecureShowData($event_details['event_detail']);?></p>
    </div>
    <div id="TicInfo" class="tab-pane fade TicDitTable">
    <table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>Ticket name   </th>
      <th> Price</th>
      <th>Fee</th>
      <th>Quantity</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Paid</th>
      <td>USD10.00</td>
      <td>USD09.00</td>
      <td> <select class="selectpicker">
         <option>1</option>
        <option>2</option>
         <option>3</option>
        <option>4</option>
         <option>5</option>
        <option>6</option>
      </select></td>
    </tr>
    <tr>
      <th scope="row">Another Event</th>
      <td>USD10.00</td>
      <td>USD09.00</td>
      <td><select class="selectpicker">
         <option>1</option>
        <option>2</option>
         <option>3</option>
        <option>4</option>
         <option>5</option>
        <option>6</option>
      </select></td>
    </tr>
    <tr>
       <th scope="row">This is loresum</th>
      <td>USD10.00</td>
      <td>USD09.00</td>
      <td><select class="selectpicker">
         <option>1</option>
        <option>2</option>
         <option>3</option>
        <option>4</option>
         <option>5</option>
        <option>6</option>
      </select></td>
    </tr>
  </tbody>
</table>

<a href="" class="btnCreateEvent1">Register</a>
    </div>
  
      </div>

    </div>  
    
  </div
</div>
</div>

</div>

</div>

</div>
</div>
<div id="footer_text_html">
</div>
</div>
</div>
</div>
<!-- End container --> 
</section>