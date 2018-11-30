
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

</head>

<!-- Start of Darshan Code -->
<?php 
$address='';
if($event_detail['id']!='')
{
  $address=setAddress($event_detail['id'], $event_detail);
 
  }
?>

<!-- End of Darshan Code -->

<?php 

  $inv_facebook = $invite['facebook'];
  $inv_twitter = $invite['twitter'];
  $inv_message = $invite['message'];    
  $inv_from_name = $invite['from_name'];
  $inv_reply_to = $invite['reply_to'];
  $inv_subject = $invite['subject'];
  $inv_salutation = $invite['salutation'];
  $inv_image= $invite['image'];
  $inv_text_color = $invite['text_color'];
  $inv_back_color = $invite['back_color'];
  $inv_link_color = $invite['link_color'];
  $invite_id = $invite['id'];
  
  $invite_text_color = $invite['text_color'];
  $invite_back_color = $invite['back_color'];
  $invite_link_color = $invite['link_color'];
  
  $invite_immediately = $invite['immediately'];
  $invite_select_date = $invite['select_date'];
  $invite_days = $invite['days'];
  $invite_hours = $invite['hours'];
  
  
$event_id = $event_detail['id'];
$event_title = $event_detail['event_title'];
$event_start_date_time = $event_detail['event_start_date_time'];
$event_end_date_time = $event_detail['event_end_date_time'];
$event_logo_image = $event_detail['event_logo'];
$event_images=getAllRecordById('event_images','event_id',$event_id);

$event_logo_image = $event_images[0]['image_name'];
$event_url_link = $event_detail['event_url_link'];
$online_event_option = $event_detail['online_event_option'];
$vanue_name = $event_detail['name'];
$street_address = $address;
$password_protect = $event_detail['password_protect'];
$password_value=$event_detail['password_value'];
$add_facebook = $event_detail['add_facebook'];
$add_twitter = $event_detail['add_twitter'];
$facebook_link = $event_detail['facebook_link'];
$twitter_link = $event_detail['twitter_link'];



if(file_exists("upload/event/thumb/".$event_logo_image))
{
  $event_image = base_url().'upload/event/thumb/'.$event_logo_image;
}
else
{
  $event_image = base_url().'upload/event/thumb/no_img.jpeg';
}

?>  


<?

if(isset($single_guest['first_name'])){
  if($single_guest['first_name']!=''){
    $name = $single_guest['first_name']; 
  }
  else{
    $name = 'Attendee' ;  
  }
}else{
  $name = 'Attendee' ;
}

?>
<style type="text/css">
body{
    background-color: <?php echo $invite_back_color;?>;
    color: <?php echo $invite_text_color;?>;
  }
 .bg{
   background-color:<?php echo $invite_back_color;?>;
 }

</style>
<body>
<div style="background-color:<?php echo $invite['back_color'];?>; color:<?php echo $invite['text_color'];?> ">
   <div style="padding: 20px; width: 740px; background-color:<?php echo $invite['back_color'];?>; color:<?php echo $invite['text_color'];?> ">
                <div class="reg" style="text-align: center; padding-bottom: 20px; border-bottom: 1px solid #CCC;">
                  
                 <h1 id="salute_t" style="margin-top: 20px; margin-bottom: 10px; display:<?php if ($inv_salutation==''){ ?> none <?php }?>"><b id="salute"><?php echo $inv_salutation ; ?></b> <b> <?php echo SecureShowData($name); ?></b></h1>
                
                 <p style="margin: 0 0 10px;">You are invited to the following event:</p>
               <a class="save-water" style="text-decoration: none;font-size: 20px; color: <?php echo $invite['link_color'];?>" href="<?php echo site_url('event/view/'.$event_url_link);?>"><?php echo SecureShowData($event_title) ;?></a>
            </div>

                <?php if($inv_image){ ?>
                <div style="width:100%">
                    <div id="event_image" style="background-color:<?php echo $invite['back_color'];?>; color:<?php echo $invite['text_color'];?>; padding: 15px 10px;width: 30%;line-height: 1.42857143;float: left;display: <?php if ($inv_image==1 ) {?> block; <?php }else{ ?> none; <?php } ?>">
                        <img style="width: 100%;" src="<?php echo $event_image;?>" alt=inv"">
                    </div>
                <?php
                }
                ?>
         <div  style="width: 60%;float:left;padding:0px 15px 0px 30px; background-color:<?php echo $invite['back_color'];?>; color:<?php echo $invite['text_color'];?> ">
          <div class="email_time clearfix pt pb" style="padding: 20px 0; background-color:<?php echo $invite['back_color'];?>; color:<?php echo $invite['text_color'];?> ">
                <p style="margin: 0 0 10px;">Event to be held at the following time, date, and location:</p>
                </div>


                <p class="p0" style="font-weight: bold;">
                     <span>Start Date : &nbsp;&nbsp;<?php echo datetimeformat($event_start_date_time).' '.timeFormat($event_start_date_time);?></span> <br>
                    <span>End Date : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo datetimeformat($event_end_date_time).' '.timeFormat($event_end_date_time);?></span>
                    <br><br>
                    
              <?php if ($online_event_option == 1){ ?>
                     <span>Your event is online-only. Maps will not appear for online events.</span><br>
              <?php }else{ ?>

                    <span><?php echo SecureShowData($vanue_name);?></span> <br>
                    <span><?php echo SecureShowData($address);?></span>
                     
                    <?php }?>
              </p>
               <div style="width: 100%;float:left; background-color:<?php echo $invite['back_color'];?>; color:<?php echo $invite['text_color'];?> ">
                    <div style="clear: both;margin-top: 10px;width: 158px;display: inline-block;margin-right: 10px;background-color:<?php echo $invite['back_color'];?>; color:<?php echo $invite['text_color'];?>">
                 <a style="text-align: center;background: #e0336b;padding: 12px 20px;display: block;font-size: 15px !important;text-transform: uppercase;font-weight: 300;color: #FFF;border-radius: 5px;border: none !important;-webkit-transition: all ease-in-out .15s;transition: all ease-in-out .15s;text-decoration: blink" href="<?php echo site_url('event/view/'.$event_url_link);?>" id="attend_event_btn" class="btn-event2">Attend Event</a>
              
                </div>
                <?php 
               $add = str_replace ( " " , "+" , $street_address );
                $add = str_replace ( "," , "+" , $add );
           
                
            
               if ($online_event_option != 1){ 
                ?>
                <div style="margin-top: 10px;width: 158px;display: inline-block; margin-right: 10px;background-color:<?php echo $invite['back_color'];?>; color:<?php echo $invite['text_color'];?>">
                 <a style="text-align: center;background: #e0336b;padding: 12px 20px;display: block;font-size: 15px !important;text-transform: uppercase;font-weight: 300;color: #FFF;border-radius: 5px;border: none !important;-webkit-transition: all ease-in-out .15s;transition: all ease-in-out .15s;text-decoration: blink" href="https://maps.google.com/maps?q=<?php echo $add ?>&hl=en" class=" <?php if ($online_event_option == 1){ ?>btn-eventgrey <?php }else{ ?>btn-event2 <?php } ?>">View Map</a>
                </div>
                <?php } ?>
                
                </div>
                 <div class="clear" style="clear: both;"></div>
                
               
                 </div>
                 <div class="clear" style="clear: both;"></div>
                 </div>

              <?php if ($password_protect == 1){ ?>
                <br><br>
                
                <div class="email_message" style="clear: both;padding: 10px 20px; background-color:<?php echo $invite['back_color'];?>; color:<?php echo $invite['text_color'];?> ">
                          Your event password is: : <?=$password_value?><br>
              This event is password-protected. Register with the password above to attend this event.
                </div>
               <?php } ?>
               
                
                
                <?php 
                if (($inv_facebook==1 || $inv_twitter==1) && ($event_detail['add_facebook']==1 || $event_detail['add_twitter']==1)) { 
                    ?><div style="clear:both;"></div>
                <hr>
                        <div id="fb_tw" style=" display:<?php if (($inv_facebook==1 || $inv_twitter==1) && ($event_detail['add_facebook']==1 || $event_detail['add_twitter']==1)) {?> block; <?php }else{ ?> none; <?php } ?>">
                        <strong>Share this event on
                            <?php
                            if($inv_facebook){ ?>
                                <a target="_blank" id="fb_link" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo site_url('event/view/'.$event_detail['event_url_link']);?>&t=<?php echo SecureShowData($event_detail['event_title']); ?>" style="display: block <?php if ($event_detail['add_facebook']==1  && $invite['facebook']==1 ){?> inline-block; <?php }else{ ?> none; <?php } ?>; color: <?php echo $invite['link_color'];?>;">  <?php echo 'Facebook'; ?> </a>

                            <?php
                            }
                            if($inv_twitter&&$inv_facebook){
                              echo 'and';
                            }
                            if($inv_twitter){

                              $site_setting = site_setting(); 
                              $twitter_url = 'https://twitter.com/intent/tweet?original_referer='.site_url('event/view/'.$event_detail['event_url_link']).'&related=twitterdev&text='.$site_setting['site_name'].'&tw_p=tweetbutton&url='.site_url('event/view/'.$event_detail['event_url_link']);                  
                             ?>
                               <a id="tw_link" target="_blank" href="<?php echo $twitter_url; ?>" style="display: block<?php if ($event_detail['add_twitter']==1 && $invite['twitter']==1) {?> inline-block; <?php } else { ?> none; <?php } ?>"; color: <?php echo $invite['link_color'];?>;> <?php echo 'Twitter'; ?> </a><br /><br />

                               <?php

                            }
                            ?>
</strong>


                       </div>
                    <?php
                }else{ ?>
<div style="clear:both;"></div> <hr>
                  <?php }?>
                
                <br />
                <div style="background-color:<?php echo $invite['back_color'];?>; color:<?php echo $invite['text_color'];?>" id="invite_message_data"><?php echo SecureShowData($inv_message); ?></div>
                
               </div>
                      </div>
  </body>
</html>