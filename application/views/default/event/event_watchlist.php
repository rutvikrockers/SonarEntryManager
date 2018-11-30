<style type="text/css">
  #blank_watchlist img {
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
  #blank_watchlist span {
   display: block;
    margin-left: auto;
    margin-right: auto;
    text-align: center; 
  }
</style>
<script type="text/javascript">
  function remove_save_event(id){
    var subcategory_path = site_url+'/event/remove_save_event/';
    
          $.ajax({
              type: "POST",
              data: {save_id: id}, 
              url: subcategory_path,
              success: function(data) {
                data=jQuery.parseJSON(data);
            
                  if(data['success'] != "success"){
                    $("#saveeventInfo").removeClass('mar10 alert alert-danger');
                    $("#saveeventInfo").addClass('mar10 alert alert-success');
                    $("#saveeventInfo").text('<?php echo Event_saved_successfuuly;?>');
                    $("#getEventSaveCount").text(parseInt($("#getEventSaveCount").text())+parseInt(1));
                    $("#user_event_save"+id).removeClass("forborder_event");
                    $("#user_event_save"+id).addClass("forborder_event_default");
                  }else{
                    $("#saveeventInfo").removeClass('mar10 alert alert-success');
                    $("#saveeventInfo").addClass('mar10 alert alert-danger');
                    $("#user_event_save"+id).removeClass("forborder_event");
                    $("#user_event_save"+id).addClass("forborder_event_default");
                    $("#user_event_save"+id).attr("onclick","save_event("+data['event_id']+")");
                    $("#user_event_save"+id).attr("id","user_event_save"+data['event_id']);
                    $("#saveeventInfo").text(data);
                  
              }   

              
               setTimeout(function() { 
                  $("#saveeventInfo").text('')
                  $("#saveeventInfo").removeClass('mar10 alert alert-danger');
                  $("#saveeventInfo").removeClass('mar10 alert alert-success');
               }, 1500);
              }
          });   
  }

  // Save Event Click (Rahul)
  function save_event(id){
    var subcategory_path = site_url+'/event/watchlist_save_event/';
          
          $.ajax({
              type: "POST",
              data: {event_id: id}, 
              url: subcategory_path,
              success: function(data) {  
                  data=jQuery.parseJSON(data);
                  if(data['success'] != "success"){
                    
                    $("#user_event_save"+id).removeClass("forborder_event_default");
                    $("#user_event_save"+id).addClass("forborder_event");
                    $("#user_event_save"+id).attr("onclick","remove_save_event("+data['id']+")");

                  }else{
                    $("#user_event_save"+id).removeClass("forborder_event_default");
                    $("#user_event_save"+id).addClass("forborder_event");
                    $("#user_event_save"+id).attr("onclick","remove_save_event("+data['id']+")");
                    $("#user_event_save"+id).attr("id","user_event_save"+data['id']);
              }   
               setTimeout(function() { 
                  $("#saveeventInfo").text('')
                  $("#saveeventInfo").removeClass('mar10 alert alert-danger');
                  $("#saveeventInfo").removeClass('mar10 alert alert-success');
               }, 1500);
              }
          });   
  }

</script>
<section class="eventDash-head">
    <div class="container">
      <div class="row">              
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 test-contct test-cntr">
                <h1><?php echo WATCHLIST; ?></h1>
          </div>
         
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right pt mt10 con-cntr">
          </div>
        
      </div>
    </div>
</section>


  <section>     
                       
  <div class="container marTB50">
  <div class="upcome-event">
    <div class="row">     
    <div class="world-tour">
       <ul class="clearfix mb0 pl15">
        <?php 
           if($watchlist_event){ 
              foreach($watchlist_event as $event){
              $event_id=$event['id'];
              $event_title=$event['event_title'];
              $event_start_date_time=datetimeformat($event['event_start_date_time']);
              $event_logo=$event['event_logo'];
              $event_url_link=$event['event_url_link'];
              $event_location = $event['street_address'];
              if($event_logo!='' && file_exists('upload/event/thumb/'.$event_logo)){
                $event_img = base_url().'upload/event/thumb/'.$event_logo;
              }else{
                $event_img = base_url().'upload/event_default/no_img.jpg';
              }

              if($event_location==''){
                $location_result = getRecordById('venues', 'id', $event['venue_id']);
                $event_location = setAddress($event['id'], $location_result);
              } 
              $organizers = getRecordById('organizers','id',$event['organizer_id']);
              
            ?>
                      <li class="col-md-3 col-sm-4 foric">
                         <div class="josef home-page">
                            <a href="<?php echo site_url('event/view/'.$event_url_link);?>">
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
                                            if ($image_slide && file_exists('upload/category_default/'. $image_slide)) {
                                                  $image = base_url().'upload/category_default/'.$image_slide;
                                            }
                                            elseif($image_slide != '' && file_exists(base_path().'upload/event/orig/'.$image_slide)){ 
                                                $image = base_url().'upload/event/thumb/'.$image_slide;
                                            }
                                            elseif($image_slide != '' && file_exists(base_path().'upload/event/thumb/'.$image_slide)){ 
                                                $image = base_url().'upload/event/thumb/'.$image_slide;
                                            }
                                        ?>
                                  <img src="<?php echo $image; ?>" alt=" " height="258px" width="258px" > 
                                  </li>
                                  <?php 
                                    
                                      }
                                    } ?>
                                  
                                </ul>
                              </div>

                            </a>
                            <div class="tour">
                                <h2><a href="<?php echo site_url('event/view/'.$event_url_link);?>" title="<?php echo $event_title;?>"><?php echo $event_title;?></a></h2>
                                <p class="orgName"><?php echo ORGANIZED_BY; ?>:  <a href="<?php echo site_url('/profile/user_profile/'.$organizers['page_url']); ?>"><?php echo $organizers['name'];?></a></p>
                                 <?php if(!$event['online_event_option']){?>
                                   <p class="eventLocation"><?php echo $event_location?></p>
                                  <?php }else{
                                    echo online_event;
                                    } ?>
                                     <p class="eventDate"><?php echo $event_start_date_time?> <?php echo timeFormat($event['event_start_date_time']); ?></p>
                                    <a href="javascript://" class="watchlist forborder_event" id="user_event_save<?php echo $event['save_id'];?>" onclick="remove_save_event('<?php echo $event['save_id'];?>');" data-toggle="tooltip" data-placement="bottom" title="Remove save event"> </a> 
                            </div>
                            </div>
                          </li>
                        <?php   
                        }
                  } else {
                    ?>
                      <div id="blank_watchlist" style="width:100%; height:100%">
                        <img src="<?php echo base_url().'images/404.png' ?>" alt=" " height="180px" class="img-responsive smallimg"> 
                        <span style="font-size: medium;"><?php echo EVENT_WATCHLIST_SAVED_EVENTS_TEXT;?></span>
                      </div>
                      <div class="clear mt10"></div>
                     <?php }?>
                          
                    </ul>
                </div>
                </div>
            </div>
            </div>

    </section>


<!-- CSS/JS FOR FIXSLIDER-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/flexslider.css');?>">
<script type="text/javascript" src="<?php echo base_url('js/jquery.flexslider.js');?>"></script>
<script type="text/javascript">
   $(window).load(function() {
  $('.flexslider').flexslider({
    animation: "fade",
    controlNav: false, 
    directionNav: false,
  });
});
</script>