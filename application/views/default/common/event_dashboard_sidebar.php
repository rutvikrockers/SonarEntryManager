<?php 

    $customize_order = check_permission_label('event','order_customize',$events_id);
    $attendee = check_permission_label('attendees','orders',$events_id);
    $add_attendee = check_permission_label('attendees','manage_orders',$events_id);
    $all_attendees = check_permission_label('attendees','manage_orders',$events_id);
    $invites = check_permission_label('invites','index',$events_id);
    $promotional = check_permission_label('event','promotional_codes',$events_id);
    $affiliate = check_permission_label('affiliate','all_affiliate',$events_id);
    $widget = check_permission_label('event','all_widget',$events_id);
    $site_setting = site_setting();
    $affiliate_status = $site_setting['affiliate_status'];
    $event_detail = getRecordById('events','id',$events_id);
    $event_url_link = $event_detail['event_url_link'];
    $active=$event_detail['active'];

?>

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p0-xs2 clearfix">
 		<div class="list-group  eventDash mb0">				
          <a href="<?php echo site_url('event/event_dashboard/1/'.$events_id)?>" class="eventdash-link"><i class="glyphicon glyphicon-home marR5"></i>  <?php echo EVENT_DASHBOARD;?></a>

				  <div class="accountSidebar">
				  <div id="accordion" class="panel-group eventdash-link2 mb0">                  
                    <div class="panel">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="list-group-item collapsed">
                      	<i class="glyphicon glyphicon-edit"></i> <?php echo REGISTRATION;?> <span class="arrowBottom"></span>
                      </a>
                      <div id="collapse1" class="panel-collapse collapse" style="height: 0px;">
                       	<div class="panel-body">
                        <ul class="inner-list">
                       <?php if(!$customize_order){ ?>
                          <li><a href="<?php echo site_url('event/order_customize/'.$events_id);?>"><?php echo CUSTOMIZE_ORDER_FORM;?> </a></li>
                       <?php }?>
                          <li><a href="<?php echo site_url('event/email_confirmation/'.$events_id);?>"><?php echo EDIT_ORDER_CONFIRMATIONS;?></a></li>
                          <li><a href="<?php echo site_url('event/event_update/'.$events_id);?>"><?php echo ADD_NEWS_AND_UPDATES;?></a></li>
                        </ul>
                       	</div>
                      </div>
                  	</div>
                                      
                     <?php if(!$invites){ ?>
                    <div class="panel">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="list-group-item collapsed">
                      	<i class="glyphicon glyphicon-bullhorn"></i> <?php echo INVITE;?> <span class="arrowBottom"></span>
                      </a>
                      <div id="collapse2" class="panel-collapse collapse" style="height: 0px;">
                       	<div class="panel-body">
                        <ul class="inner-list">
	                		<li><a href="<?php echo site_url('invites/create/'.$events_id);?>"><?php echo CREATE_INVITATIONS;?></a></li>
                      <li><a href="<?php echo site_url('invites/index/'.$events_id);?>"><?php echo MANAGE_INVITATIONS;?> </a></li>
                      </ul>
                       	</div>
                      </div>
                  	</div>
                    <?php }?>
                                      
                    <div class="panel">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="list-group-item collapsed">
                      	<i class="glyphicon glyphicon-stats"></i> <?php echo ANALYZE;?> <span class="arrowBottom"></span>
                      </a>
                      <div id="collapse3" class="panel-collapse collapse" style="height: 0px;">
                       	<div class="panel-body">
                        <ul class="inner-list">
	                		<li><a href="<?php echo site_url('event/google_analytics/'.$events_id);?>"><?php echo GOOGLE_ANALYTICS;?> </a></li>
                      </ul>
                       	</div>
                      </div>
                  	</div>
                                      
                     <?php if(!$attendee){ ?>
                    <div class="panel">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="list-group-item collapsed">
                      	<i class="glyphicon glyphicon-user"></i> <?php echo MANUAL_ORDER_COMP;?> <span class="arrowBottom"></span>
                      </a>
                      <div id="collapse4" class="panel-collapse collapse" style="height: 0px;">
                       	<div class="panel-body">
                        <ul class="inner-list">
                            <li><a href="<?php echo site_url('attendees/orders');?>"><?php echo FIND_ORDERS;?></a></li>
                          <?php if(!$add_attendee){ ?><li><a href="<?php echo site_url('attendees/add_attendee/'.$events_id);?>"><?php echo ADD_ATTENDEES;?></a></li><?php }?><!--//change by darshan-->
                          <?php if(!$all_attendees){ ?><li><a href="<?php echo site_url('attendees/all_attendees');?>"><?php echo ALL_ATTENDEES;?></a></li><?php }?><!--//change by darshan-->
                  	</ul>
                       	</div>
                      </div>
                  	</div>
                    <?php }?>
                    <?php if(!$widget){  ?>
                    <div class="panel">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse7" class="list-group-item collapsed">
                        <i class="glyphicon glyphicon-tasks"></i> <?php echo WIDGET;?> <span class="arrowBottom"></span>
                      </a>
                      <div id="collapse7" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
                        <ul class="inner-list">                       
                             <li><a href="<?php echo site_url('manage_event/button_widget/'.$event_url_link);?>"><?php echo CREATE_BUTTON_WIDGET;?></a></li>
                             <li><a href="<?php echo site_url('manage_event/form_widget/'.$event_url_link);?>"><?php echo CREATE_FORM_WIDGET;?></a></li>
                        </ul>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                    
                    <?php if($promotional===false || $affiliate===false ){ ?>
                    <div class="panel">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapse6" class="list-group-item collapsed">
                        <i class="glyphicon glyphicon-briefcase"></i> <?php echo SELL;?> <span class="arrowBottom"></span>
                      </a>
                      <div id="collapse6" class="panel-collapse collapse" style="height: 0px;">
                       	<div class="panel-body">
                        <ul class="inner-list">	                		
                             <?php if(!$promotional){ ?><li><a href="<?php echo site_url('event/promotional_codes/1/'.$events_id);?>"><?php echo CREATE_PROMOTIONAL_CODES;?></a></li><?php }?>
                             <?php if(!$affiliate && $affiliate_status == 1){ ?><li style="display: none;"><a href="<?php echo site_url('affiliate/all_affiliate/'.$events_id);?>"><?php echo CREATE_AFFILIATE_PROGRAMS;?></a></li><?php }?>
                        </ul>
                       	</div>
                      </div>
                  	</div>
                    <?php }?>   

                  <?php if($active==1){ ?>
                    <div class="panel">
                     <a data-toggle="collapse" data-parent="#accordion" href="#extention" class="list-group-item collapsed">
                        <i class="glyphicon glyphicon-cog"></i> <?php echo MANAGE_EXTENSIONS;?> <span class="arrowBottom"></span>
                      </a>
                      <div id="extention" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
                        <ul class="inner-list">                     
                           <li><a href="<?php echo site_url('event_social/facebook/'.$events_id);?>"><?php echo FACEBOOK_SELL;?></a></li>
                        </ul>
                        </div>
                      </div>
                    </div>
                    <?php }?>  



				  </div>
        </div>
                  <!-- inner-link ENDS -->				  
			</div>                              
</div>