<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "cc88a7ad-ebe1-43e6-9204-228887f672a9", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<!-- Start of Darshan Code -->
<?php 
$address='';

if($event_detail['id']!=''){
        $venue_add1 = $event_venue['venue_add1'];
        $venue_add2 = $event_venue['venue_add2'];
        $venue_city = $event_venue['venue_city'];
        $venue_state = $event_venue['venue_state'];
        $venue_country = $event_venue['venue_country'];
		if($venue_add1!='')
		{	

			$address=$venue_add1;
		}
		if($venue_add2!='')
		{
			if($address!=''){
			$address=$address.', '.$venue_add2;
				}else
				{
					$address=$venue_add2;
				}
		}
		if($venue_city!='')
		{
			if($address!=''){
			$address=$address.', '.$venue_city;
				}else
				{
					$address=$venue_city;
				}
		}
		if($venue_state!='')
		{
			if($address!=''){
			$address=$address.', '.$venue_state;
				}else
				{
					$address=$venue_state;
				}
		}
		if($venue_country!='')
		{
			if($address!='')
			{
				$address=$address.', '.$venue_country;
				}else
				{
					$address=$venue_country;
				}
		}
	}
?>

<!-- End of Darshan Code -->
<!-- Add jQuery library -->

<!-- Add jQuery library -->
	<script type="text/javascript" src="<?php echo base_url();?>js/lib/jquery-1.10.1.min.js"></script>

	<link href="<?php echo base_url();?>css/popup.css" rel="stylesheet" />
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
    </script>
<script type="text/javascript">

			function myfunction(){
				
        $('.mfPopup').magnificPopup({
          type: 'ajax',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });
		

          $('.check_all').change(function (e) {
    	
    	if($(".check_all").is(':checked') ){
    	
				 	$('.check').prop('checked', this.checked)
				 	//$('#guest_id').attr( 'checked="checked"');
				 }
				 else
				 {
				 	$('.check').prop('checked', '')
				 	//$('#guest_id').attr( 'checked=""');
				 }
    	
    });

			}
				</script>
	
   <script src="<?php echo base_url();?>js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap-datetimepicker.css" />

<?php 
$event_id = $event_detail['id'];
$event_title = $event_detail['event_title'];
$event_start_date_time = $event_detail['event_start_date_time'];
$event_end_date_time = $event_detail['event_end_date_time'];

$event_images=getAllRecordById('event_images','event_id',$event_id);

if(isset($event_images[0])) {
    $event_logo_image = $event_images[0]['image_name'];
} else {
    $event_logo_image ="";
}
$event_url_link = $event_detail['event_url_link'];
$online_event_option = $event_detail['online_event_option'];
$vanue_name = $event_venue['name'];
$street_address = $address;
$password_protect = $event_detail['password_protect'];
$password_value=$event_detail['password_value'];
$add_facebook = $event_detail['add_facebook'];
$add_twitter = $event_detail['add_twitter'];
$facebook_link1 = $event_detail['facebook_link'];
$twitter_link1 = $event_detail['twitter_link'];


    $inv_facebook = $facebook;
	$inv_twitter = $twitter;
	$inv_message = $message;		
	$inv_from_name = $from_name;
	$inv_reply_to = $reply_to;
	$inv_subject = $subject;
	$inv_message = $message;
	$inv_salutation = $salutation;
	$inv_image= $image;
	$inv_text_color = $text_color;
	$inv_back_color = $back_color;
 	$inv_link_color = $link_color; 
	$invite_text_color = $text_color;
	$invite_back_color = $back_color;
	$invite_link_color = $link_color;
	$invite_immediately = $immediately;
	$invite_select_date = $select_date;
	$invite_days = $days;
	$invite_hours = $hours;
	$invite_minutes = $minutes;
	$random=$random_no;

if ($event_logo_image && file_exists('upload/invite_default/'. $event_logo_image)) {
	$event_image = base_url().'upload/invite_default/'.$event_logo_image;
}	
elseif(is_file("upload/event/orig/".$event_logo_image))
{
	$event_image = base_url().'upload/event/orig/'.$event_logo_image;
}
else
{
	$event_image = base_url().'upload/event/orig/no_img.jpg';
}


$all_inv = getAllRecordById('invites','event_id',$event_id);

 $all_inv_sub[]= "";
  foreach($all_inv as $sub_row){
if($sub_row['id']!= $invite_id ) 
{
   $all_inv_sub[]= strtolower($sub_row['subject']);
	  }
  }

?>
<?php if($success_msg){
			        ?>
			        <div class="alert alert-success message"><?php echo SecureShowData($success_msg); ?></div>
			    <?php }?>
			    <?php if($error_msg){
			        ?>
			        <div class="alert alert-danger message"><?php echo SecureShowData($error_msg); ?></div>
			    <?php }
?>
<script type="text/javascript">
	$(document).ready(function() {
		
		//added by nirali....
		 <?php if($invite_id=='') {?>
			 $('#invites_select_date').prop( "disabled", true );
			 $('#minutes').prop( "disabled", true );
			 $('#hours').prop( "disabled", true );
			 $('#days').prop( "disabled", true );
		 <?php }else { ?>
			$('#invites_select_date').prop( "disabled", true );		 	
	 		$('#minutes').prop( "disabled", true );
		  	$('#hours').prop( "disabled", true );
		  	$('#days').prop( "disabled", true );
			
		 <?php } ?>
		 
		 if($("#RadioGroup1_1").is(':checked') ){
		 	$('#invites_select_date').prop( "disabled", false );
		 }
		 
		 if($("#RadioGroup1_2").is(':checked') ){
		 	$('#minutes').prop( "disabled", false );
		  	$('#hours').prop( "disabled", false );
		  	$('#days').prop( "disabled", false );
		 }
		//end............
		
		$("#show_name1").focus(function() {
    		
		}).blur(function() {
    		
    		var vals = $('#show_name1').val();
			var trimedval = $.trim(vals);
			
			$('#show_name1').val(trimedval);
		});
		
		$("#show_sub1").focus(function() {
    		
		}).blur(function() {
    		
    		var vals = $('#show_sub1').val();
			var trimedval = $.trim(vals);
			
			$('#show_sub1').val(trimedval);
		});
		
		//$(".fancybox").fancybox();
		var endDate = new Date('<?php echo $event_detail['event_end_date_time']; ?>');
		$(".datepicker").datetimepicker({
			  format: "yyyy-mm-dd hh:ii:ss",
			  autoclose: true,
			  todayBtn: true,
			  startDate: "<?php echo date('Y-m-d H:i:s');?>",
			  // startDate: new Date(),
			  endDate: endDate,
			  minuteStep: 10
	    });

 			$('.icon-arrow-right').html(">>");
 			$('.icon-arrow-left').html('<<');
 			
		$('[name="optionsRadios"]').click(function(){
			
			$val = $(this).val();
			if($val == '1') 
			{
			  $('#invites_select_date').prop( "disabled",false);
			  $('#minutes').prop( "disabled", true );
			  $('#hours').prop( "disabled", true );
			  $('#days').prop( "disabled", true );
			}else if($val == '2'){
				$('#minutes').prop( "disabled", false );
			  	$('#hours').prop( "disabled", false );
			  	$('#days').prop( "disabled", false );
				$('#invites_select_date').prop( "disabled", true );
			}else{
				$('#invites_select_date').prop( "disabled", true );
				  $('#minutes').prop( "disabled", true );
				  $('#hours').prop( "disabled", true );
				  $('#days').prop( "disabled", true );
				}
			
			
			});
			
			$('#invite_image').prop('checked', true);
			$('#event_image').show();
			
	$("#show_name").click(function(){
		$("#show_name1").show();
		$("#show_name1").focus();
		$("#show_name").hide();
	});
	
	$("#show_email").click(function(){
		$("#show_email1").show();
		$("#show_email1").focus();
		$("#show_email").hide();
	});
	
	$("#show_sub").click(function(){
		$("#show_sub1").show();
		$("#show_sub1").focus();
		$("#show_sub").hide();
	});
			
		   // $('#RadioGroup1_0').click(); 
		     
	});

</script>
<style>
#fb_tw a {
color: #428bca;
text-decoration: none;
}

#fb_tw a:hover {
color: #FFF;
text-decoration: none;
}

.custom_colors{
	margin-top:3px;
}
.blk_lbl{
color:#000;
}
.email_bg{
 		background: <?php echo $inv_back_color; ?>;
}

.email_bg, .email_bg b, .email_bg p{
 		color: <?php echo $inv_text_color; ?>;
} 	
 	.email_bg a, .email_bg a:visited, .email_bg a:hover{
 		color: <?php echo $inv_link_color; ?>;
}
.marT3p{
margin-top:3%;
}
#show_email, #show_name, #show_sub{
width:100%;
}

</style>

<script>

function validate_submit(){
	$('#fromnameInfo').text("");
	$('#replytoInfo').text("");
	$('#subjectInfo').text("");
	if($('#submit_type').val() != 'test_mail')
	{
		var guest = $('.eventinrcont');
		var len = guest.length;
			if(len==0)
			{
			 var guests_div = $("#addguest_error");
			 guests_div.text("<?php echo PLEASE_ADD_ONE_GUEST; ?>");
			 guests_div.addClass("error1");
			 return false ;
			}
			else{
			 var guests_div = $("#addguest_error");
			 guests_div.text("");
		    }
		}

	
	if($('#show_name1').val()==''){
		$('#fromnameInfo').text("<?php echo ENTER_NAME_SENDER; ?>");
		$('#show_name1').focus();
		return false;
	}
	
	if($('#show_email1').val()==''){
		$('#replytoInfo').text("<?php echo ENTER_REPLY_TO_EMAIL; ?>");
		$('#show_email1').focus();
		return false;
	}
	
	if($('#show_email1').val()!=''){
		if(!email_reg_exp.test($('#show_email1').val())){
			$('#replytoInfo').text("<?php echo ENTER_VALID_EMAIL; ?>");
			$('#show_email1').focus();
			return false;
		}
	}
	
	if($('#show_sub1').val()==''){
		$('#subjectInfo').text("<?php echo ENTER_SUBJECT_LINE; ?>");
		$('#show_sub1').focus();
		return false;
	}else if($('#show_sub1').val()!=''){
		  var subject_temp = $('#show_sub1').val();
		  var cmp_arr = <?php echo json_encode($all_inv_sub);  ?>;
		  var subject = subject_temp.toLowerCase();
		
		  var check_valid = jQuery.inArray( subject, cmp_arr );
		  
		  if(check_valid >0){
		  	
	        $('#subjectInfo').text("<?php echo SUBJECT_CANT_BE_UNIQUE; ?>");
	  	    $('#show_sub1').focus();
			return false;
		  }
		
	}
	
	
	
	 if ($('#submit_type').val() == 'send'){
      
	  // guest_list = $('#eventinrcont');
	  
	  if($("#RadioGroup1_1").prop('checked')){
	  
	   if ($('#invites_select_date').val()== "" ){
	     $('#invites_select_date_err').text("<?php echo VALUE_CANT_BE_BLANK; ?>");
	     $('#invite_days_err').text("");
	     return false;
	     }
	   }
	   
	   if($("#RadioGroup1_2").prop('checked')){
	   
	   if ($('#days').val()== "" || $('#hours').val()== "" || $('#minutes').val()== "" )
	   {
	     $('#invite_days_err').text("<?php echo VALUE_CANT_BE_BLANK; ?>");
	      $('#invites_select_date_err').text("");
	     return false;
	     }
	     else
	     {
	     	 if (Number($('#days').val())<0 || Number($('#hours').val())<0 ||Number($('#minutes').val())<0 )
				   {
				     $('#invite_days_err').text("<?php echo VALUE_NOT_VALID; ?>");
				      $('#invites_select_date_err').text("");
				     return false;
				     }

	     }
	   }
	   
	 }
	 $('#invite_days_err').text("");
	 $('#invites_select_date_err').text("");
	$('#submit_btn').click();
	
	return true;
}

var email_reg_exp= /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;



function set_custom_values(type){
	if($('#invite_facebook').is(":checked") && $('#invite_twitter').is(":checked"))
	{
		//$('#and').css('visibility', 'visible');
		$('#and').show();
	}else
	{
		//$('#and').css('visibility', 'hidden');
		$('#and').hide();
	}
	if(type=='custom'){
		if($('#invite_image').is(":checked")){
			$('#event_image').show();
		}else{
			$('#event_image').hide();
		}
		
		if($('#invite_facebook').is(":checked") || $('#invite_twitter').is(":checked")){
			$('#fb_tw').show();
			if($('#invite_facebook').is(":checked")){
				$('#fb_link').show();
			}else{
				$('#fb_link').hide();
			}
			
			if($('#invite_twitter').is(":checked")){
				$('#tw_link').show();
			}else{
				$('#tw_link').hide();
			}
			
		}else{
			$('#fb_tw').hide();
		}
		
		//alert($('#invite_sal').is(":checked"));
		$('#salute_t').show();
		if($('#invite_sal').is(":checked")){
			$('#salute_t').show();
			
			if($('#invite_salutation').val()==''){
				$('#salute').text("");
			}else{
				$('#salute').text($('#invite_salutation').val());
			}
			
		}else{
			$('#salute_t').hide();
		}
		
		
	}
	
	if(type=='message'){
		 var editorText = CKEDITOR.instances.invite_message.getData();
			$('#invite_message_data').html(editorText);
                        $('#invite_message_data1').val(editorText);
                        CKEDITOR.instances['invite_message'].destroy();
		
	}
		setTimeout(function() {  
						
						 $('.mfp-close').click(); //parent.jQuery.fancybox.close(); 
							}, 500);//	$.fancybox.close();
	//$("#customize, #modal-boxes").fadeOut();
	
}

function send_test_email(){
	
	var a = $('#send_mail').val();
	$('#sendmailInfo').text("");
	
	if(a==''){
		$('#sendmailInfo').text("<?php echo EMAIL_REQUIRED; ?>");
		$('#send_mail').focus();
		return false;
	}
	
	if(a!=''){
		if(!email_reg_exp.test(a)){
			$('#sendmailInfo').text("<?php echo ENTER_PROPER_EMAIL_FORMATE; ?>");
			$('#send_mail').focus();
			return false;
		}
	}
	$('#submit_type').val('test_mail');
	
	
	 if(validate_submit()){
		$('#createinviteForm').submit();
		
	 }
	
	 return false;
	
}

function remove_selected(){

	 $('#err1').text("");
	 var chks = document.getElementsByName('guest_id');
	// var chks = $('#guest_id');
	 var guest_id='';
 	 var hasChecked = true; 
 	  	for (var i = 0; i < chks.length; i++)
        {
            if (chks[i].checked==true)
            {
                hasChecked = false;
                if(guest_id=='') guest_id=chks[i].value;
                else guest_id = guest_id+','+chks[i].value;
            }
		}
		
	if(hasChecked){
		$('#err1').text("<?php echo SELECT_ATLEST_ONE_RECORD; ?>");
		return false;
	}
	
	if(confirm('<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_RECORD; ?>')){
	 var page_path ="<?php echo site_url('invites/delete_guest')?>/<?php echo $random; ?>";
        
        var invitation_id = $('#invitation_id').val();
        var random_no = $('#random_no').val();
       // alert(invitation_id);
        $.ajax({
            type: "POST",
            data: {guest_id: guest_id, invitation_id: invitation_id, random_no: random_no},
            url: page_path,
			dataType: 'json',
		    //data: formData,
            success: function(data) {
            	// $("#show_guest_list_replace").html(data);

                     // alert(JSON.stringify(data));
              	//alert(data.guest.length);
              	 	if(data.guests.length > 0){
		                	
	                	var table = '<div class="eventinrcont" style="border: none;"><table class="should_come table table_res invite_edittable tck-type"><tr><th><input type="checkbox" class="check_all"  name="select_all" id="select_all" value=""></th><th><?php echo 'email'; ?></th><th><?php echo 'First Name'; ?></th><th><?php echo 'Last Name'; ?></th><th><?php echo 'Action' ; ?></th></tr>';
			            var obj = data.guests;
		               	for (i=0; i < obj.length; i++) {
						  // or if (Object.prototype.hasOwnProperty.call(obj,prop)) for safety...
						    prop = obj[i]
						    if(prop["first_name"]=='null' || prop["first_name"]=='' || prop["first_name"]==null)
						    {
						    	var first_name = 'N/A';
						    }else{
						    	var first_name = prop["first_name"];
						    }
						    
						    if(prop["last_name"]=='null' || prop["last_name"]=='' || prop["last_name"]==null)
						    {
						    	var last_name = 'N/A';
						    }else{
						    	var last_name = prop["last_name"];
						    }
						    
						    
						 table=table+'<tr><td><input type="checkbox" name="guest_id" id="guest_id" class="check" value="'+prop["id"]+'" /></td><td id="email'+prop["id"]+'">'+prop["email"]+'</td><td id="first_name'+prop["id"]+'">'+first_name+'</td><td  id="last_name'+prop["id"]+'">'+last_name+'</td><td class="reg"><a href="<?php echo site_url('invites/edit_guests/');?>/'+prop["id"]+'" class="mfPopup" ><?php echo 'Edit'; ?></a></td></tr>';
						 $("#addguest_error").text("");     
						}
						
						table=table+'</table></div><div class="clr"></div>';
                                             
						$('#show_guest_list').html(table);
						$('#show_guest_list').show();
						myfunction();
						$('#remove_contact_option').show();
						$(".eventinrcont .rr").colorbox();
					
						
						
					}else{
						$('#show_guest_list').html('<p class="no_records"><?php echo NO_RECORDS_AVAILABLE; ?></p>');
						//$('#remove_contact_option').hide();
						$('#remove_contact_option').css('visibility', 'hidden');
					}
                
            }
        });
		}
}

</script>
<script type="text/javascript">
$(document).ready(function() {
    $('.check_all').change(function (e) {
    	
    	if($(".check_all").is(':checked') ){
    	
				 	$('.check').prop('checked', this.checked)
				 	//$('#guest_id').attr( 'checked="checked"');
				 }
				 else
				 {
				 	$('.check').prop('checked', '')
				 	//$('#guest_id').attr( 'checked=""');
				 }
    	
    });
});
	
</script>
  

  <script type="text/javascript">
	       
			function set_preview_invite(ele,id){
					var hex = ele.value;
				// alert(id);
					if(id=='text'){
						$('#invite_text_color_set').val(hex);
						$('.email_bg').css('color',  hex);
						$('.email_bg p').css('color',  hex);
						$('.email_bg b').css('color',  hex);
						$('.email_title').css('borderColor',  hex);
						$('.email_time').css('borderColor',  hex);
						$('#attend_event_btn').css('backgroundColor', hex);
						$('#view_map_btn').css('backgroundColor', hex);
					}
					if(id=='back'){
						//(hex);
						$('#invite_back_color_set').val(hex);
						$('.email_bg').css('backgroundColor', hex);
					}
					if(id=='link'){
						$('#invite_link_color_set').val(hex);
						$('#fb_tw a').css('color', hex);
						$('.reg a').css('color', hex);
					}
					
			}
				</script>
<?php $this->load->view('default/common/dashboard-header')?>
    <section>  
            <div class="container marTB50">
             
           
                <form class="event-title" id="createinviteForm" name="createinviteForm" method="POST" action="<?php echo site_url('invites/create/'.$id.'/'.$invite_id)?>" >
                <div class="row">
                <div class="col-md-8 col-sm-12 mb">
                                
                 <div class="row">    
                            
                <div class="event-webpage col-sm-12">
                	<div class="red-event width100 "><h4><?php echo CREATE_YOUR_INVITATIONS; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                <div class="col-sm-12">
                <div class="event-detail clearfix">
                
                
                	
                <div class="col-xs-12 col-sm-12">
				<div class="form-group clearfix ">
                <div class="pt">
                    
                	<a href="#inline1" class="btn-event2 mfPopupIn"><?php echo CUSTOMIZE; ?></a>
                 <a href="#inline2" class="btn-eventgrey mfPopupIn invitation-btn" onclick="CKEDITOR.replace('invite_message')"><?php echo EDIT_MESSAGE; ?></a>
                
                
                </div>
               </div>
               
               <div class="form-group clearfix ">
                <div class="invite-card email_bg" id="invite_back_color">
                <div class="email_title reg">
                  
                 <h1 id="salute_t" style="display:<?php if ($inv_salutation==''){ ?> none <?php }?>"><b id="salute"><?php echo $inv_salutation ; ?></b> <b> &lt;&lt; Attendee &gt;&gt;, </b></h1>
                
                 <p class="p0"><?php echo YOU_ARE_INVITED_TO_THE_FOLLOWING_EVENT; ?>:</p>
	             <a class="save-water" href="<?php echo site_url('event/view/'.$event_url_link);?>"><?php echo SecureShowData($event_title) ;?></a>
		        </div>
                <div class="email_time clearfix pb pt">
                
                <div class="col-sm-4 col-xs-4 width-xs event-img2" id="event_image" style="display: <?php if ($inv_image==1 ) {?> block; <?php }else{ ?> none; <?php } ?>">
                <img src="<?php echo $event_image;?>" alt="event_image">
                </div>
                <div class="col-sm-8 col-xs-8 width-xs mt20-xs0">
                <p class="p0"><?php echo EVENT_TO_BE_HELD_AT_THE_FOLLOWING_TIME_DATE_AND_LOCATION; ?>:</p>
                <p class="event-desc p0">
                    <span><?php echo START_DATE; ?> : &nbsp;&nbsp;<?php echo datetimeformat($event_start_date_time).' '.timeFormat($event_start_date_time);?></span> <br>
					<span><?php echo END_DATE; ?> : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo datetimeformat($event_end_date_time).' '.timeFormat($event_end_date_time);?></span>
                    <br><br>
                    
                    <?php if ($online_event_option == 1){ ?>
					<span><?php echo YOUR_EVENT_IS_ONLINE_ONLY_MAPS_WILL_NOT_APPEAR_FOR_ONLINE_EVENTS; ?></span><br>
                    <?php }else{ ?>

                    <span><?php echo SecureShowData($vanue_name);?></span> <br>
					<span><?php echo SecureShowData($address);?></span>
                     
                    <?php }?>
	            </p>
                <div class="pt">
                	<a href="<?php echo site_url('event/view/'.$event_url_link);?>" id="attend_event_btn" class="btn-event2"><?php echo ATTEND_EVENT; ?></a>
                
                <?php  

               		 $add = str_replace ( " " , "_" , $street_address );
             		 $add = str_replace ( "," , "_" , $add );
             		
              if ($online_event_option != 1){ 
            		?>
                 <a href="https://maps.google.com/maps?q=<?php echo $add;?>&hl=en" class=" marL10 <?php if ($online_event_option == 1){ ?>btn-eventgrey <?php }else{ ?>btn-event2 invitation-btn<?php } ?>"><?php echo VIEW_MAP; ?></a>
                <?php } ?>
                </div>
                </div>
                
                <div class="col-sm-12 col-xs-12">
                 
              <?php if ($password_protect == 1){ ?>
                <br><br>
                <div class="email_message">
                        	<?php echo YOUR_EVENT_PASSWORD_IS;?>: : <?php echo $password_value; ?><br>
							<?php echo THIS_EVENT_IS_PASSWORD_PROTECTED_REGISTER_WITH_THE_PASSWORD_ABOVE_TO_ATTEND_THIS_EVENT; ?>
                </div>
               <?php } ?>
                </div>
                
                </div>
                <div id="fb_tw" style=" display: <?php if (($inv_facebook==1 || $inv_twitter==1) && ($add_facebook==1 || $add_twitter==1)) {?> block; <?php }else{ ?> none; <?php } ?>">
                 <strong><?php echo SHARE_THIS_EVENT_ON;?>                 				
                 <a id="fb_link" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo site_url('event/view/'.$event_url_link);?>&t=<?php echo $event_title; ?>" style="display: <?php if($add_facebook==1 && $inv_facebook==1){ echo 'inline-block'; }else{ echo 'none'; } ?>"><?php echo FACEBOOK; ?></a>
                                 
                 <label id='and'  <?php if($inv_twitter&&$inv_facebook) {echo "";}else{echo "hidden";}?>>and</label>
                 <?php $site_setting = site_setting(); 
                 $twitter_url = 'https://twitter.com/intent/tweet?original_referer='.site_url('event/view/'.$event_url_link).'&related=twitterdev&text='.$site_setting['site_name'].'&tw_p=tweetbutton&url='.site_url('event/view/'.$event_url_link); 
                 ?>                 				
                 <a id="tw_link" target="_blank" href="<?php echo $twitter_url; ?>" style="display: <?php if ($add_twitter==1 && $inv_twitter==1) { echo 'inline-block'; } else { echo 'none'; } ?>"> <?php echo TWITTER; ?> </a><br /><br />

				</strong>	
		        </div>
                <br />
                <div id="invite_message_data"><?php if ($inv_message!='') {?><?php echo SecureShowData($inv_message); ?><?php } ?></div>
                <input type="hidden" value="<?php if ($inv_message!='') {?><?php echo SecureShowData($inv_message); ?><?php } ?>" name="invite_message_data1" id="invite_message_data1" >
               </div>
               </div>
               </div>
               
               <div class="form-group clearfix">
                 <div class="col-sm-4 col-xs-12 lable-rite">
                   <label><?php echo NAME_OF_SENDER; ?></label>
                 </div>
                 <div class="col-sm-7 col-xs-12">
                 
                   <input type="text" name="from_name" value="<?php echo SecureShowData($inv_from_name); ?>" id="show_name1" style="display: <?php if ( $inv_from_name=="" ) {?>inline-block; <?php } else{ ?>none; <?php } ?>" class="textbox" />    
                   <span id="show_name" class="marT3p" style="display: <?php if ( $inv_from_name=='') { ?>none; <?php } else { ?>inline-block; <?php } ?>"><?php echo SecureShowData($inv_from_name); ?></span>
                   <div id="fromnameInfo" class="error1" style="margin-left:30%;"></div>
                   
                 </div>
                 </div>
                 
                 <div class="form-group clearfix">
                 <div class="col-sm-4 col-xs-12 lable-rite">
                   <label><?php echo REPLY_TO;?></label>
                 </div>
                 <div class="col-sm-7 col-xs-12">
                  
                   <input type="email" name="reply_to" value="<?php echo $inv_reply_to; ?>" id="show_email1" style="display: <?php if ( $inv_reply_to=="" ) {?>inline-block; <?php } else{ ?> none; <?php } ?>" class="textbox" />    
                   <span id="show_email" class="marT3p" style="display: <?php if ( $inv_reply_to=='') { ?>none; <?php } else { ?>inline-block; <?php } ?>"><?php echo $inv_reply_to; ?></span>
                   <div id="replytoInfo" class="error1"  style="margin-left:30%;"></div>
                   
                 </div>
                 </div>
                 
                 <div class="form-group clearfix">
                 <div class="col-sm-4 col-xs-12 lable-rite">
                   <label><?php echo SUBJECT_LINE; ?></label>
                 </div>
                 <div class="col-sm-7 col-xs-12">
                   
                   <input type="text" name="subject" value="<?php echo SecureShowData($inv_subject); ?>" id="show_sub1" style="display: <?php if ( $inv_subject=="" ) {?>inline-block; <?php } else{ ?> none; <?php } ?>" class="textbox" />    
                   <span id="show_sub" class="marT3p" style="display: <?php if ( $inv_subject=='') { ?>none; <?php } else { ?>inline-block; <?php } ?>"><?php echo SecureShowData($inv_subject); ?></span>
                   <div id="subjectInfo" class="error1"  style="margin-left:30%;"></div>
                   
                 </div>
                 </div>
                 
                 <div class="form-group clearfix">
                 
                 <div class="col-sm-4 col-xs-12 lable-rite">
                   <label><?php echo SEND_A_TEST_INVITATION_TO; ?></label>
                 </div>
                 <div class="col-sm-4 col-xs-12 pright0 pr15-xs">
                   <input type="email" name="send_email" id="send_mail" value="" class="textbox" placeholder="Enter" onkeyup="this.value=$.trim(this.value);"  />
                	 <div id="sendmailInfo" class="error1"></div>
                 </div>
                 <div class="col-sm-3 col-xs-3 mt20-xs0">
                 
                 <a href="javascript://" class="btn-event2" onclick="send_test_email();" ><?php echo SEND; ?></a>
                
                
                </div>
                
                 </div>
                 
                
                
                    
                <div id="inline1" class="white-popup-block popup-container mfp-hide">
                        <div class="popupHead">
                          <h1><?php echo CUSTOMIZE;?></h1>
                        </div>
                <div class="event-title">	
                    
                
                 <div class="form-group clearfix">
                 	<div class="col-lg-12">
                    	<ul class="cust_color list-unstyled">
			      <li>
				   <label><?php echo TEXT_COLOR;?></label>
				   <span class="full bg-color_xs" style="background:<?php echo $inv_text_color; ?>"  ></span>
                   <input type="color" class="full" value="<?php echo $inv_text_color; ?>" onchange="set_preview_invite(this,'text');"  />
				  </li>
			                   
			      <li>
				   <label><?php echo BACKGROUND_COLOR;?></label>
				   <input type="color" class="full" value="<?php echo $inv_back_color ; ?>" onchange="set_preview_invite(this,'back');"  />
				  </li>
			                   
			      <li>
				   <label><?php echo LINK_COLOR;?></label>
				   <input type="color" class="full" value="<?php echo $inv_link_color ; ?>" onchange="set_preview_invite(this,'link');"  />
				  </li>
                  
			     </ul>
                 
                  <?php 
                  if($add_facebook==1){ ?>
                     <div class="col-sm-7 col-xs-8 width-xs clearfix">
                        <div class="checkbox">
                        <label>
                           <input type="checkbox" name="facebook" id="invite_facebook"  value="1" <?php if ($inv_facebook==1) {?> checked="checked" <?php } ?> />
                           <?php echo SHOW_FACEBOOK_SHARE; ?>
                        </label>
                        </div>
                     </div>
                  <?php
                  } 
                  ?>
                  <?php 
                  if($add_twitter==1){ ?>
                      <div class="col-sm-12 col-xs-8 width-xs clearfix">
                        <div class="checkbox">
                        <label>
                           <input type="checkbox" value="">
                           <input type="checkbox" name="twitter" id="invite_twitter"  value="1" <?php if ($inv_twitter==1) {?> checked="checked" <?php } ?> />
                          <?php echo SHOW_TWITTER_SHARE; ?>
                        </label>
                        </div>
                      </div>
                  <?php
                  } 
                  ?>
                    </div>
                 </div>
                 <div class="form-group">
                 	
                    	<div class="col-sm-3 col-xs-12">
                    <div class="checkbox">
                     <label>
                         <input type="checkbox" name="salutation_check" id="invite_sal" <?php if ($inv_salutation)  {?> checked="checked" <?php }else{ ?><?php } ?> onclick="if(this.checked){$('#invite_salutation').prop('disabled',false);}else{ $('#invite_salutation').prop('disabled',true); }" /> <?php echo SHOW_SALUTATION; ?>
                     </label>
                     </div>
                    </div>
                    	<div class="col-sm-9 col-xs-12 mb10">
                  	<select class="select-pad" id="invite_salutation" name="salutation" placeholder="" <?php if ($inv_salutation =='')  {?> disabled="disabled" <?php } ?> >
                       <option value="Hello" <?php if ($inv_salutation=='Hello') { ?> selected="selected" <?php } ?> >Hello</option>
                       <option value="Hi" <?php if ($inv_salutation=='Hi') { ?> selected="selected" <?php } ?> >Hi</option>
                       <option value="Greetings" <?php if ($inv_salutation=='Greetings') { ?> selected="selected" <?php } ?> >Greetings</option>
                  </select>
                  	</div>
                 		<div class="col-lg-12 mb10">
                            <div class="checkbox">
                         <label>
                            <input type="checkbox" value="">
                            <input type="checkbox" name="image" id="invite_image" value="1" <?php if ($inv_image==1) {?> checked="checked" <?php } ?> />
                            <?php echo SHOW_EVENT_IMAGE; ?>
                         </label>
                     </div>
                     </div>
                    
                 </div>
                
                <div class="form-group">
                       <div class="col-lg-12"> <a href="javascript://" class="btn-event2" onclick="set_custom_values('custom');"><?php echo DONE; ?></a></div>
                </div>
                
                
                </div>
                </div>
                
                <!-- inline-block 2 -->
                
                <div id="inline2" class="white-popup-block popup-container mfp-hide">
                        <div class="popupHead">
                          <h1><?php echo EDIT_MESSAGE; ?></h1>
                        </div>
                        <div id="add_new" class="popup_Content">
                		<div class="form-group clearfix">
                            <div class="clearfix">
                            
                             <div class="form-group clearfix " >
                             <div class="col-sm-12 col-xs-12 text-editor pt">
                               <textarea name="invite_message" id="invite_message" ><?php echo SecureShowData($inv_message);?> </textarea>
                             </div>
                             </div>
                             
                              <div class="col-lg-12">
                              
                                    <a href="javascript://" onclick="set_custom_values('message');" class="btn-event"><?php echo DONE; ?></a>
                         
                            </div>
               				
                			</div>
                		<!-- event detail closes -->                
                		</div>
                		</div>
        				</div>
                
                </div> <!-- event detail closes -->
                
                </div>
                    
                 </div>
                 
                 <div class="row">    
                            
                <div class="event-webpage mt col-sm-12">
                	<div class="red-event width100 "><h4><?php echo WHO_SHOULD_COME; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                <div class="col-sm-12">
                <div class="event-detail guest-invite mb0 clearfix" id='show_guest_list_replace'>
                
               
                <div id="show_guest_list">
                <?php if($guests){?>
                <div class="eventinrcont" style="border: none;">   
				<table class="should_come table table_res invite_edittable tck-type">
                        	<thead>
                        	<tr>
                            	<th><input type="checkbox"  name="select_all" id="select_all" class="check_all" value=""></th>
                                <th><?php echo EMAIL;?></th>
                                <th><?php echo FIRST_NAME;?></th>
                                <th><?php echo LAST_NAME;?></th>
                                <th><?php echo ACTION;?></th>
                            </tr>
                            </thead>
                            
                            <tbody>
                        
                    <?php
						foreach($guests as $row_guests)
						{
							$id = $row_guests['id'];
							$email = $row_guests['email'];
							if($row_guests['first_name']!='')
							{	
								$first_name = $row_guests['first_name'];
							}else
							{
								$first_name = "N/A";
							}
						if($row_guests['last_name']!='')
						{	
							$last_name = $row_guests['last_name'];
						}
						else
						{
							$last_name = "N/A";
						}
				
					 ?>
                            <tr>
                            	<td>
                                <div class="checkbox m0">
                                  <label>
                                   <input type="checkbox" name="guest_id" id="guest_id" value="<?php echo $id; ?>" class='check'>
                                  </label>
                                </div>
                                </td>
                                <td id="email<?php echo $id; ?>"><?php echo $email ; ?></td>
                                <td id="first_name<?php echo $id; ?>"><?php echo SecureShowData($first_name) ; ?></td>
                                <td id="last_name<?php echo $id; ?>"><?php echo SecureShowData($last_name) ; ?></td>
                                <td class="reg"><a href="<?php echo site_url('invites/edit_guests');?>/<?php echo $id; ?>" class="mfPopup">Edit</a></td>
                            </tr>
                            <?php } ?> 
                            
                            
                           </tbody> 
                            
                        </table>
                    </div>    
                         <?php }else{ ?>  
                         <p class="no_records"><?php echo NO_RECORDS_AVAILABLE;  ?></p>
						 <?php } ?> 
                        </div>
                        <div class="reg">
                <div id="addguest_error" class="error1"></div>
                <div id="err1" class="error1"></div>
               
                </div>
                <div class="row">
                	<div class="col-md-4 col-sm-3 col-xs-12">
                 	<a href="<?php echo site_url('invites/add_guests');?>/<?php echo $random; ?>?invitation_id=<?php echo $invite_id ; ?>" class="btn-event2 mfPopup_add">+ <?php echo ADD_GUESTS; ?></a>
                	</div>
                	
                    <div class="col-sm-4 col-xs-12 fr">
                
                	 <?php $display='visibility:hidden'; if($guests){ $display='visibility:visible'; }?>
                <a style="<?php echo $display; ?>;cursor: pointer;" onclick="javascript: remove_selected();" id="remove_contact_option" class="btn-event2 marL10 invitation-btn2" style="display: <?php if (count($guests) > 0) { ?> block; <?php }else{ ?> none; <?php } ?>"><?php echo REMOVE_SELECTED; ?></a>
              	
                </div>
               
              
                
                <!-- inline-block 3 starts -->
                
                
                </div> <!-- event detail closes -->
                
                </div>
                    </div>
                 </div>
                 
                 <div class="row">    
                            
                <div class="event-webpage mt pt col-sm-12">
                	<div class="red-event width100 "><h4><?php echo SEND_AND_SCHEDULE; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                <div class="col-sm-12 col-xs-12">
                <div class="event-detail guest-invite mb0 clearfix event-title">
                
               
                <div class="form-group clearfix">
					<div class="row">
                    	<div class="col-sm-12">
                 		 <div class="radio">
                      <label>        	
                      <input type="radio" name="optionsRadios" id="RadioGroup1_0" value="0"  <?php if ($invite_immediately==0) {?> checked="true" <?php }else{?> checked="checked"<?php } ?> />
                       <?php echo IMMEDIATELY; ?>
                      </label>
                  </div>
                		</div>
                    </div>
                </div>
                
                <div class="form-group clearfix">
                	<div class="row">
                    	<div class="col-sm-3 col-md-2 col-xs-3 width-xs pright0">
                  <div class="radio">
                      <label>
                      <input type="radio" name="optionsRadios" id="RadioGroup1_1" value="1" <?php if ($invite_immediately==1) { ?> checked="true" <?php } ?> >
                       <?php echo SELECT_DATE; ?>
                      </label>
                  </div>                  
                </div>
                		<div class="col-sm-4 col-xs-6 width-xs">
                  <input type="text" placeholder="" value="<?php echo $invite_select_date;?>" name ="select_date" id="invites_select_date"  class="datepicker" readonly >  <?php echo 'Server Time : '.date('Y-m-d H:i:s'); ?>
                  </div>
                   		<div id="invites_select_date_err" class="error1"></div>
                    </div>
                  </div>
                  
                  <div class="form-group clearfix">
                	<div class="row">
                    	<div class="col-sm-1 col-xs-1 pright0">
                  <div class="radio">
                      <label>
                      <input type="radio" name="optionsRadios" id="RadioGroup1_2" value="2"  <?php if ( $invite_immediately==2) {?> checked="true" <?php } ?> >
                      </label>
                  </div>
                  
                </div>
                  		<div class="col-sm-11 col-xs-11 width-xs p0 pleft15-xs1">
                                
                                <div class="col-sm-2 col-xs-2 pleft0 pright0 width-xs">
                                <div class="col-sm-12 col-xs-12 pleft0">
                                  <input type="number" min="0" name="days" id="days" placeholder="Days" value="<?php echo $invite_days;?>">
                                  </div>
                                  </div>
                                  
                                  <div class="col-sm-2 col-xs-2 pleft0 pright0 pt10-xs width-xs">
                                  <div class="col-sm-12 col-xs-12 pleft0">
                                  <input type="number" min="0" placeholder="Hours" name="hours" id="hours" value="<?php echo $invite_hours;?>">
                                  </div>
                                  </div>
                                  
                                  <div class="col-sm-6 col-xs-8 pt10-xs pleft0 pright0 width-xs">
                                  <div class="col-sm-6 col-xs-6 width-xs2 pleft0">
                                  <input type="number" min="0" placeholder="Minutes" name="minutes" id="minutes" value="<?php echo $invite_minutes;?>">
                                  	
                                  </div>
                                  <div class="max-time2">
                                  <label><?php echo BEFORE_MY_EVENT; ?></label>
                                  </div>
                                  </div>
                                  
                                  </div>
                    	<div id="invite_days_err" class="error1"></div>
                    </div>
                  </div>
              
                
                </div>
                
                </div> <!-- event detail closes -->
                
                </div>
                
                <input type="hidden" name="event_id" id="event_id" value="<?php echo $event_id ; ?>" />
                <input type="hidden" name="invitation_id" id="invitation_id" value="<?php echo $invite_id;?>" />
                <input type="hidden" name="text_color" id="invite_text_color_set" value="<?php echo $invite_text_color ; ?>" />
             	<input type="hidden" name="back_color" id="invite_back_color_set" value="<?php echo $invite_back_color ; ?>" />
             	<input type="hidden" name="link_color" id="invite_link_color_set" value="<?php echo $invite_link_color ; ?>" />
                <input type="hidden" name="random_no" id="random_no" value="<?php echo $random; ?>" />
                
                <input type="hidden" name="submit_type" id="submit_type" value="" />
                
             <div class="text-right mt">
                    <input type="submit" style="display:none" id="submit_btn"  />
                    <a href="javascript://" class="btn-eventgrey" onclick="$('#submit_type').val('send'); return validate_submit();"><?php echo SEND_AND_SCHEDULE;?></a>
                    <a href="javascript://" class="btn-event2 marL10" onclick="$('#submit_type').val('draft'); return validate_submit();" ><?php echo SAVE;?></a>
                </div>
                    
                 </div> <!-- LEFT CONTENT ENDS -->
                
                </form>
                <!-- RIGHT CONTENT -->
             
              	<?php $data1['events_id']=$event_id; ?>
	      		<?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>                    
                </div>
                </div>
            </div><!-- End container -->
            
    </section>
<script src="<?php echo base_url()?>ckeditor/ckeditor.js"></script>
