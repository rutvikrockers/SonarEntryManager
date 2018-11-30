
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
<script type="text/javascript" src="<?php echo base_url('js/jquery.flexslider.js');?>"></script>

<div class="endedEvent">
<i class="glyphicon glyphicon-time"></i> Layout 2
</div>
<section class="mainBGImage" id="eventDesign">
<div class="container padTB50">
<div id="event_view_page_theme">
<div id="event_theme_page_change">
<div id="header_text_html">
</div>
<div class="row">
<div class="col-md-4 ex-ticket">
<div class="ex-ticket-box">

<article>              
<div class="media-head">

<h2>Paid</h2>                            
</div>
<div class="media-content">
<ul>
<li>
<strong>Price</strong>
<span>USD10.00</span>
</li>
<li>
<strong>Fee</strong>
<span>USD1.49</span>
</li>
<li>
<input type="button" field="quantity1" class="qtyminus" value="-">
<input type="text" max="20" class="qty" value="0" name="quantity1">
<input type="button" field="quantity1" class="qtyplus" value="+">
<label id="quantity1"></label>
</li>
</ul>
</div>
</article>
</div>

<div class="ex-ticket-box">
<article>
<div class="media-head">
<h2>This is title</h2>

</div>
<div class="media-content">
<ul>
<li>
<strong>Price</strong>
<span>USD10.00</span>
</li>
<li>
<strong>Fee</strong>
<span>USD1.49</span>
</li>
<li>
<input type="button" field="" class="qtyminus" value="-">
<input type="text" max="20" class="qty" value="0" name="">
<input type="button" field="" class="qtyplus" value="+">
<label id=""></label>
</li>
</ul>
</div>
</article>
</div>
<a class="btn btnCreateEvent" href="">Register</a>

</div>
<div class="col-md-8  ex-ticket-details">

<article class="">
<section class="">
<h1><?php echo ucfirst($event_details['event_title']);?></h1>
<p><?php echo $org_name;?> | <?php echo ucfirst($address);?>  </p>
<span><i class="fa fa-calendar"></i>
<?php 

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
</span><br>
<span><i class="fa fa-clock-o"></i>
 <?php 
    echo date('g:i A',strtotime($event_details['event_start_date_time'])); 
    echo date('g:i A',strtotime($event_details['event_end_date_time']));
 ?> 
</span>
<a href="<?php echo site_url('event/contact_organizer/'.$event_details['user_id'].'/'.$event_details['id']); ?>" class="btnCreateEvent1 mfPopup" ><i class="fa fa-envelope"></i>  Contact the organizer</a>
<hr>
<p>
<?php echo SecureShowData($event_details['event_detail']);?>
</p>
</section>
</article>
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
<section class="slice location" id="location">
    <div class="media-head">
        <i class="glyphicon glyphicon-map-marker"></i> Location
    </div>
    	<div class="media-content">
     	<iframe width="100%" height="545" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $address;?>&output=embed"></iframe>
    </div>
</section>
<script type="text/javascript">
$('.qtyplus').click(function(e){
// Stop acting like a button
//alert($(this).prev().attr('max'));
//var ValLimit = 10;
var ValLimit = $(this).prev().attr('max');
e.preventDefault();
// Get the field name
fieldName = $(this).attr('field');
// Get its current value

var x = "fsfsfsf";
var currentVal = parseInt($('input[name='+fieldName+']').val());
// If is not undefined

if (!isNaN(currentVal)&& currentVal < ValLimit) {
// Increment
$('input[name='+fieldName+']').val(currentVal + 1);
} else {
// Otherwise put a 0 there
$('input[name='+fieldName+']').val(ValLimit);
document.getElementById(fieldName).innerHTML=ValLimit + " Tickets maximum";
$('#' + fieldName).animate({opacity: 1}, 50); 
}


});

$(".qty").focusout(function() { 


var maxx = $(this).attr('max');
var value = $(this).val();
var message = $(this).attr('name');


if(parseInt(value) > parseInt(maxx))
{
$(this).val(maxx);  
$('#'+message).text(maxx+" Tickets maximum");
$('#'+message).animate({opacity: 1}, 50);


}
else 
{
//$('#'+message).text('');
$('#' + message).animate({opacity: 0}, 50);
}
});



// This button will decrement the value till 0
$(".qtyminus").click(function(e) {
// Stop acting like a button
var ValLimit = $(this).prev().attr('max');
e.preventDefault();
// Get the field name
fieldName = $(this).attr('field');
// Get its current value
var currentVal = parseInt($('input[name='+fieldName+']').val());
// If it isn't undefined or its greater than 0
if (!isNaN(currentVal) && currentVal > 0) {
// Decrement one
$('input[name='+fieldName+']').val(currentVal - 1);
} else {
// Otherwise put a 0 there
$('input[name='+fieldName+']').val(0);

}
if (currentVal > 0) {
$('#' + fieldName).animate({opacity: 0}, 50);
} 



});

</script>