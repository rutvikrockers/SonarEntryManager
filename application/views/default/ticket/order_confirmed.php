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
<script src="<?php echo base_url();?>js/jquery.magnific-popup.js"></script>
<script>
$(document).ready(function(){

  
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
</script>
<?php 
$sy = date('Y',strtotime('-100 years'));
$ey = date('Y'); 

$back = $oneTheme['background'];
$title = $oneTheme['event_title'];
$head_text = $oneTheme['header_text'];
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
.organizer{
	margin:0px;
	padding: 0px;
	margin-bottom: 20px;
}
.organizer h4
{
	margin:0px;
}
.sidebar-content
{
	padding: 15px;
}
.sidebar-content table tr td
{
	color: <?php echo $body_text; ?>;
}
#event_theme_page_change,
#event_theme_page_change .panel .panel-body
{
	color: <?php echo $body_text;?>;		
}
#event_theme_page_change .panel-heading {
	background: <?php echo $box_head; ?>;
	padding: 15px;
	border-bottom: 0px !important;
	color: <?php echo $head_text; ?>;
}
#event_theme_page_change .event-title{
	color: <?php echo $title; ?>;
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

#event_theme_page_change .ptbox li, 
#event_theme_page_change .open-air .share-event,
#event_theme_page_change .open-air .organizer,
#event_theme_page_change .open-air .red-line h4,
#event_theme_page_change .open-air .org-line h4,
#event_theme_page_change .panel
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
}

#event_theme_page_change .panel-heading
{ 
	background: <?php echo $box_head;?>;
}
#event_theme_page_change .contact_icon,
#event_theme_page_change .btn-event,
#event_theme_page_change .ical_icon
{ 
	 background: linear-gradient(to bottom, <?php echo $box_head;?> 0%, <?php echo $box_head;?> 5%, <?php echo $box_head;?> 5%, <?php echo $back;?> 5%, <?php echo $back;?> 9%, <?php echo $back;?> 9%, <?php echo $box_border;?> 10%, <?php echo $box_head;?> 100%, <?php echo $box_border;?> 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
}

#event_view_page_theme  .festival  {
	border-top: 1px dotted <?php echo $box_border;?>;
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

#box_shadow {
	box-shadow: 0 0 4px 2px <?php echo $box_border;?>;
	padding: 10px; 
	width:95%;
}

</style>


<section class="mainBGColor">  
<div class="container">
	 
	
	<div id="event_view_page_theme"> 
		<div id="event_theme_page_change">  
			<?php /*<div class="container">*/?>

			<div class="pt">
				<div class="event-title">
				   <h1><?php echo you_are_going.' '.SecureShowData($event_details['event_title']);?></h1>
				</div>
			</div><!-- End pt -->
			
			<div class="clearfix"></div>
			<div class="festival pb"></div>

				<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 lucha" id="event_theme_page_change" >
				
					<div class="panel panel-default">
					<div class="panel-heading brtl">
					<h3 class="panel-title"><strong><?php echo sprintf(order_saved,$purchase_id);?></strong></h3>
					</div>
					<div class="panel-body">
					<?php 
						$tk = 0;
						if($all_pur){
							foreach($all_pur as $ti){

								if(!(float)$ti['total']>0){ $ticket_type = 'Free'; }else{ $ticket_type = 'Paid'; }		
								if($ti['ticket_type'] == 0) {
									$ticket_type = 'Free';
								} else if($ti['ticket_type'] == 2) {
									$ticket_type = 'Paid';
								} else {
									$ticket_type = 'Donation';
								}					
								echo '<p><b><img style="height:17px; width:17px;" src="'.base_url().'images/select_img.png" alt="" />&nbsp;&nbsp;'.anchor('ticket/ticket_detail/'.$ti['id'],'Ticket #'.$ti['id']).' : '.$ti['ticket_qty'].' '.$ticket_type.' '.Ticket_s.'</b></p>';
								$tk++;
							}
						}
					?>
					   
					   <p><b><img style="height:17px; width:17px;" src="<?php echo base_url().'images/select_img.png';?>" alt="" />&nbsp;&nbsp;<?php echo mail_sent_to.' '.$pur['email']; ?></b></p>	 
				   <br />
				   
				   <?php echo anchor('ticket/my_tickets',go_to,'class="btn-event"'); ?> <br />
				   
					<div class="event_detail">
						<table >
							<tr>
								<td valign="center"><img src="<?php echo base_url().'images/bl3.png';?>" alt="" style="height:33px; width:35px;"  /></td>
								<td width="90%">
									<h3><?php echo you_can_use. SecureShowData($site_setting['site_name']).all_kind;?></h3>
									<p style="font-size: 13px;"><?php echo from_local.SecureShowData($site_setting['site_name']).make_easy;?></p>
									
								</td>
							</tr>
						</table>
					</div> 
					</div>
					</div>
				</div><!-- End lucha -->
		  
				  <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 clearfix">  
				  <?php 
						  if($order['confirm_msg']!=''){ ?>
				  <div class="organizer panel panel-default mb">
				  
						<h4 class="panel-heading brtl text-center"><?php echo Hi.' <span>'.SecureShowData($pur['first_name']).'</span>';?></h4>
					<div class="sidebar-content">
					  <?php 
						  if($order['confirm_msg']!=''){
							echo '<span>'.SecureShowData($order['confirm_msg']).'</span>'; 
						  }
					  ?>
				  
					  <br /><br />
					  <table>
						<tr>
							<td valign="top">
							<?php
								$image = base_url().'images/no-preview.png';
								if($org['featured_id']!='' && $org['featured_id']!=0) {
									 $orgevent = getRecordById('events','id',$org['featured_id']);	
									$event_logo =  $orgevent['event_logo'];
									if($event_logo != '' && file_exists(base_path().'upload/event/orig/'.$event_logo)){ 
										$image = base_url().'upload/event/orig/'.$event_logo;
									}
									elseif($event_logo != '' && file_exists(base_path().'upload/event/thumb/'.$event_logo)){ 
										$image = base_url().'upload/event/thumb/'.$event_logo;
									}     	 	
								} 			
							?>
							</td>
							<td>&nbsp;</td>
							<td><?php echo Thanks;?><br />
							<?php 
								if($org['name']!=''){ echo SecureShowData($org['name']);} 
								else { echo unnamed_orga;}
							?>
							</td>	
						</tr>
					</table>
					</div>
					</div>
					<?php } ?>
					<div class="organizer panel panel-default">
					
						
							<h4 class="panel-heading brtl text-center"><?php echo Question_about_this_organizer;?></h4>
						<div class="sidebar-content">
						<div class="con-org pb pt">
							
							<?php //echo anchor('event/contact_organizer/'.$event_details['user_id'].'/'.$event_details['id'],Contact_the_organizer,'class="contact_icon fancybox fancybox.iframe"')?>
							<a href="<?php echo site_url('event/contact_organizer/'.$event_details['user_id'].'/'.$event_details['id']); ?>" class="btn-saveevent mfPopup"><i class="glyphicon glyphicon-envelope"></i> <?php echo Contact_the_organizer ?></a>
						</div>
						
						<div class="profile">
							<?php echo anchor('profile/user_profile/'.$org['page_url'],view_organizer_profile)?>
						</div>
						
						<div class="pb"> 
							<?php if($org['add_twitter']==1 && $org['add_username']==1 && $org['twitter_link']!=''){ ?>
								
							   <br /><a href="https://twitter.com/<?php echo $org['twitter_link'];?>">
									<img src="<?php echo base_url();?>images/twitterconnect.jpg" alt=""  /> <?php echo $org['twitter_link'];?>
								</a>
						   <?php }  if($org['add_twitter']==1 && $org['add_search']==1 && $org['search_link']!=''){?> 
							   <br /> <a href="https://twitter.com/<?php echo $org['search_link'];?>">
									<img src="<?php echo base_url();?>images/twitterconnect.jpg" alt="" /> <?php echo $org['search_link'];?>
								</a>
							<?php  } if($org['add_facebook']==1 && $org['facebook_link']!=''){?>  
							  <br />  <a href="https://www.facebook.com/<?php echo $org['facebook_link'];?>">
									<img src="<?php echo base_url();?>images/facebook.jpg" alt="" /> <?php echo $org['facebook_link'];?>
								</a>
							<?php  } ?>
					   </div>                          
					</div>
				  </div>
			  </div>       
			</div><!-- End open-air -->

			<?php /*</div><!-- End container -->*/?>
			<div class="pb"></div>    
		</div>
		</div>
</div><!-- End container -->
<div class="pb"></div>
</section>
<script>
history.pushState(null, null, location.href);
window.onpopstate = function () {
	history.go(1);
};
</script>