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
<?php

$event_data = $this->event_model->getOneEventById($id);
$venue=getRecordById('venue','id',$event_data['venue_id']); 
$final_gross=0;
$final_total_gross=0;
$final_attendee_gross=0;
$final_admin_fees=0;

$sales = $this->event_model->getTicketInfo('sales',$id);

if($sales){
    $attendee_gross=0;
    $gross=0;
    $admin_fees=0;
    
    foreach($sales as $sale)
    {
        $gross_all = $sale['gross'];
        $attendee_id = $sale['attendee_id'];
        $total_fees = $sale['total_fees'];
        $admin_fees = $admin_fees+$total_fees;
        
        if($attendee_id){
            $attendee_gross = $attendee_gross + $gross_all; 
        }else{
            $gross = $gross + $gross_all; 
        }        
    }
    $total_gross = $attendee_gross + $gross;
    
    $final_gross=$gross;
                    
    $final_total_gross=$total_gross;
                     
    $final_attendee_gross=$attendee_gross;
                     
    $final_admin_fees=$admin_fees;                    
} ?>
<?php
        $status = $event_data['active'];

        $event_title = $event_data['event_title'];

        $vanue_name=$event_venue['name']; 
		
        $address='';
        if($event_venue['venue_add1']!='')
        {   

            $address=$event_venue['venue_add1'];
        }
        if($event_venue['venue_add2']!='')
        {
            if($address!='')
            {
                $address=$address.','.$event_venue['venue_add2'];
            }else
            {
                $address=$event_venue['venue_add2'];
            }
        }
        if($event_venue['venue_city']!='')
        {
            if($address!='')
            {
                $address=$address.','.$event_venue['venue_city'];
            }else
            {
                $address=$event_venue['venue_city'];
            }
        }
        if($venue['venue_state']!='')
        {
            if($address!='')
            {
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
        $street_address=$address;
        
        $event_start_date_time = datetimeformat($event_data['event_start_date_time']);
        $total_net_sales=$final_admin_fees + $final_total_gross;
        
        $is_delete = delete_check($status);
        
        $rights = check_permission_label('event','create_event',$id);
        $rights1 = check_permission_label('event','edit_event',$id);
                     
?>
<section class="eventDash-head">
    <div class="container dashHeader">
        <div class="clearfix">

            <div class="dashHeaderLeft">
                   <h3 id="event_title_h3" ><?php if( $event_title!=''){echo SecureShowData($event_title);}else{echo UNTITLE_EVENT; } ?></h3>
                    <span class="badge">
                    <?php $status = $event_data['active']; 
                         if($status==0){
                                echo DRAFT;
                            } elseif($status==1){
                                echo LIVE;
                            } elseif($status==2){
                                echo COMPLETED;
                            } elseif($status==3){
                                echo CANCELLED;
                            }
                    
                    ?>
                    </span>
                     <?php if($event_venue['name']||$event_data['online_event_option']=="1") {?>
                    <?php if($event_data['online_event_option']=="1"){ echo "Online Event"; }else{ ?>
                    <p><?php echo SecureShowData($event_venue['name']);?> <?php echo '  | '.setAddress($id,$event_venue);?></p>
                    <p><?php echo $event_start_date_time;?> <?php echo timeFormat($event_data['event_start_date_time']); ?></p>                                                
                    <?php } ?>
                     <?php } ?>
                </div>
            
            <?php $style=''; if($this->uri->segment('3')!='' && $this->uri->segment('2')=='create_event') { $style = "style='display:none;'";}
							 else if($this->uri->segment('2')=="theme"){$style = "style='display:none;'";}	 ?>
            <div class="dashHeaderRight" <?php echo $style; ?>>
            <form class="event-title" name="attendee_search" method="get" action="<?php echo site_url('attendees/all_attendees/'.$id);?>">
                        <ul class="dashRightLinks">
                        <?php if(!($rights===true || $rights1===true)){
                            $copy_url = base_url().'/images/copy-event.png';
                            $cancel_url = base_url().'/images/cancel-event.png';
                            $view_url = base_url().'/images/view-event.png';
                            ?>
                        	<li>                            
                            	<a href="<?php echo site_url('event/copy_event/'.$id);?>" class="mfPopup">
                                    <img data-placement="bottom" data-toggle="tooltip" title="Copy Event" class="header-icon" src="<?php echo $copy_url; ?>" alt="copy-event">
                                </a>
                            </li>
                            <?php if($status==1){?>
                            <li>                            
                                <a href="javascript://" onclick="cancel_event_dash()">
                                    <img data-placement="bottom" data-toggle="tooltip" title="Cancel Event" class="header-icon" src="<?php echo $cancel_url; ?>" alt="cancel-event">
                                </a>
                            </li>
                            <?php }?>
                            <?php if($is_delete){ ?>
                            <li>                            
                            	<a href="javascript://" onclick="delete_event_dash()">
                                <img data-placement="bottom" data-toggle="tooltip" title="Delete Event" class="header-icon" src="<?php echo $cancel_url; ?>" alt="cancel-event">
                                </a>
                            </li>    
                            <?php }?>
                             <?php }?>
                            <li>                            
                            	<a href="<?php echo site_url('event/view/'.$event_data['event_url_link']);?>" target="_blank">
                                <img data-placement="bottom" data-toggle="tooltip" title="View Event" class="header-icon" src="<?php echo $view_url; ?>" alt="view-event">
                                </a>
                            </li>
                        </ul>
            </form>
            </div>
            <?php if($this->uri->segment('2')=='create_event' || $this->uri->segment('2')=='theme'){ ?>
            	<div class="previewRight">
                <a href="<?php echo site_url('event/view/'.$event_data['event_url_link']);?>" target="_blank" class="btn-eventgrey"><?php echo VIEW;?></a>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="btnsBG">
    	<div class="container">
        	<ul class="clearfix">
            	<li><a href="<?php echo site_url('event/edit_event/'.$event_data['id']); ?>" <?php if($this->uri->segment('2')=='create_event'  || $this->uri->segment('2')=='edit_event'){ echo 'class="active"';} ?>><?php echo EDIT;?></a></li>
            	<li><a href="<?php echo site_url('event/theme/'.$event_data['id']); ?>" <?php if($this->uri->segment('2')=="theme"){ echo 'class="active"'; } ?>><?php echo DESIGN;?></a></li>
            	<li><a href="<?php echo site_url('event/event_dashboard/1/'.$event_data['id']); ?>" <?php if($this->uri->segment('2')=="event_dashboard" || $this->uri->segment('2')=="order_customize" || $this->uri->segment('2')=="email_confirmation" || $this->uri->segment('2')=="event_language" || $this->uri->segment('2')=="event_update" || $this->uri->segment('2')=="create" || $this->uri->segment('2')=="index" || $this->uri->segment('2')=="google_analytics" || $this->uri->segment('2')=="orders" || $this->uri->segment('2')=="add_attendee" || $this->uri->segment('2')=="all_attendees" || $this->uri->segment('2')=="promotional_codes" || $this->uri->segment('2')=="all_affiliate" || $this->uri->segment('2')=="button_widget" || $this->uri->segment('2')=="form_widget" || $this->uri->segment('2')=="add_code" || $this->uri->segment('2')=="create_affiliate"){ echo 'class="active"'; } ?>><?php echo MANAGE;?></a></li>
                <li style="display: none;"><a href="<?php echo site_url('event/event_view_layout/'.$event_data['id']); ?>" <?php if($this->uri->segment('2')=="event_view_layout"){ echo 'class="active"'; } ?>><?php echo LAYOUT;?></a></li>
            </ul>
    	</div>
    </div>
</section>
<script>
    function cancel_event_dash(){
        if(confirm("<?php echo ARE_YOU_SURE_YOU_WANT_TO_CANCEL_THIS_EVENT;?>")){
            document.location.href = "<?php echo site_url('event/cancel_single_event/'.$id)?>";
        }
        return false;
    }
    
    function delete_event_dash(){
        if(confirm("<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_EVENT;?>")){
            document.location.href = "<?php echo site_url('event/delete_single_event/'.$id)?>";
        }
        return false;
    }
</script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>