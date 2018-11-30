	<style>
.contct-table{
margin-bottom:20px;
}
.promo_code td:nth-of-type(6) {width: 90px;}
</style> 
<script>
    		$(document).ready(function(){
    		$(".rover_tip").popover();
	});
	</script>
    <script>
    		$(document).ready(function(){
    		$(".rover_tip").popover();
	});
	</script>
     <!-- code add by darshan start-->
 <script type="text/javascript">
    function show(offset){
        
       
      var getStatusUrl= '<?php echo site_url()."/event/promotional_codes_ajax";?>/'+offset+'/<?php echo $id;?>';

        //var getStatusUrl= '<?php echo site_url()."/attendees/attendees_orders_list";?>/'+offset;
            
            //alert(getStatusUrl);
            $.ajax({
                url: getStatusUrl,
                dataType: 'text',
                type: 'POST',
                timeout: 99999,
                global: false,
                data: '[]',
                
                success: function(data)
                { 
                    $('.alls').html(data);
                },      
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                
                }
            });
        }
</script>
<script type="text/javascript">
    function show_acc(offset){
        
       
      var getStatusUrl= '<?php echo site_url()."/event/promotional_access_codes_ajax";?>/'+offset+'/<?php echo $id;?>';

        //var getStatusUrl= '<?php echo site_url()."/attendees/attendees_orders_list";?>/'+offset;
            
            //alert(getStatusUrl);
            $.ajax({
                url: getStatusUrl,
                dataType: 'text',
                type: 'POST',
                timeout: 99999,
                global: false,
                data: '[]',
                
                success: function(data)
                { 
                    $('.alls_ass').html(data);
                },      
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                
                }
            });
        }
</script>
 <!-- code add by darshan end-->
    <?php $this->load->view('default/common/dashboard-header')?>
<section>
	<?php 
	$data1['events_id'] = $id;
	
	?>
  
            <div class="container marTB50">
                           
 	
                <?php if($success_msg){ ?>
                	
					<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							 <?php echo SecureShowData($success_msg);?>
                            </div>
              <?php   }?>
                <div class="row"> 	         
                <div class="col-md-8 col-sm-12">                
                   <div class="text-right">
                    <a href="<?php echo site_url('event/add_code/'.$id);?>" class="btn-event2"><?php echo CREATE_MORE_CODES;?></a>
                </div>
                  
                <div class="row">    
                            
                <div class="event-webpage col-sm-12 pt">
                	<div class="red-event width100 "><h4><?php echo DISCOUNT_CODES; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
              
              
                <div class="col-sm-12">
                <div class="event-detail clearfix">
                
                <form class="event-title">
                  
                 <div class="col-sm-12 pt alls">
                               
                 <table class="table table_res event-info contct-table promo_code">
                        	<thead>
                            	<tr>
                                	<th><?php echo DISCOUNT_CODE; ?></th>
                                    <th><?php echo AMOUNT; ?></th>
                                    <th><?php echo STARTS; ?></th>
                                    <th><?php echo ENDS; ?></th>
                                    <th><?php echo AVAILABLE; ?></th>
                                    <th><?php echo ACTION; ?></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            	
                          <?php if($disc_codes){      
                                foreach ($disc_codes as $single_code) {
								$id = $single_code['id'];
								$code = $single_code['code'];
								$disc_amt = $single_code['disc_amt'];
								$disc_perc = $single_code['disc_perc'];
								$used_cnt = $single_code['used_cnt'];
								$uses = $single_code['uses'];	
								$event_id = $single_code['event_id'];
								$end_now = $single_code['end_now'];
								$start_date_time = $single_code['start_date_time'];
								$end_date_time = $single_code['end_date_time'];
								$start_now = $single_code['start_now'];
								$start_day = $single_code['start_day'];
								$start_hour = $single_code['start_hour'];
								$start_minute = $single_code['start_minute'];
								
								$end_now = $single_code['end_now'];
								$end_day = $single_code['end_day'];
								$end_hour = $single_code['end_hour'];
								$end_minute = $single_code['end_minute'];
								
								if($disc_amt>0){
									$amount = set_event_currency($disc_amt, $event_data['id']);	
								}else{
									$amount = $disc_perc.'%';
								}
								
								
								
								?>
                                 <tr>
                                	<td class="reg"><?php echo $code; ?></td>
                                    <td><?php echo $amount; ?></td>
                                    <td>
                                       	<?php if ($start_now ==0 ){ ?>
                                            <?php echo STARTED ; ?>
                                        <?php }elseif ($start_now == 1) {?>
                                            <?php echo datetimeformat($start_date_time).' '.timeFormat($start_date_time); ?>
                                        <?php }elseif ($start_now == 2){ ?>
                                            <?php if ($start_day) {?>
                                                <?php echo $start_day ; ?> <?php echo DAYS ; ?>
                                            <?php } ?>
                                            
                                            <?php if ($start_hour) { ?>
                                                <?php echo $start_hour ; ?> <?php echo HOURS; ?>
                                            <?php } ?>
                                            
                                            <?php if ($start_minute){ ?>
                                                <?php echo $start_minute; ?> <?php echo MINUTES; ?>
                                            <?php } ?>
                                            <?php echo BEFORE_EVENT_START; ?> 
                                       <?php } ?>
                                    </td>	
                                    <td>
                                       <?php if ($end_now==0) {?>
                                        <?php echo WHEN_SALES_END ?>
                                    <?php }elseif ($end_now==1){ ?>
                                        <?php echo datetimeformat($end_date_time).' '.timeFormat($end_date_time);?>
                                    <?php }else{ ?>
                                        <?php if ($end_day){ ?>
                                            <?php echo SecureShowData($end_day); ?> <?php echo DAYS ?>
                                        <?php } 
                                        if ($end_hour){ ?>
                                            <?php echo $end_hour; ?> <?php echo HOURS ?>
                                        <?php } ?>
                                        
                                        <?php if ($end_minute) { ?>
                                            <?php echo $end_minute; ?> <?php echo MINUTES; ?>
                                        <?php } ?>
                                        <?php echo BEFORE_EVENT ; ?> 
                                    <?php } ?>
                                    </td>
                                    <td>
                                         <?php if ($used_cnt > $uses ) {
                                              $available = 0
                                        ?>
                                            <?php echo AVAILABLE; ?>/<?php $uses; ?>                        	
                                        <?php }elseif ($uses == 0){ ?>
                                            <?php echo NO_LIMITS; ?>
                                        <?php }else{
										   $result = $uses- $used_cnt;
										 ?>
                                            <?php echo SecureShowData($result); ?>/<?php echo SecureShowData($uses); ?>
                                        <?php } ?>
                                    </td>
                                    <td style="width:90px;">
                                    <ul class="nav navbar-nav edit-delt text-center">
                                     
                                        <li class="del-icon icon3">
                                            <a href="<?php echo site_url('event/delete_code');?>/<?php echo $event_id ;?>/<?php echo $id ?>" data-original-title="Delete" onclick="return confirm('Are you sure? you,want to delete this record')"><i class="glyphicon glyphicon-trash edit" data-toggle="tooltip" data-placement="bottom" title="Delete"></i></a>
                                            </li>
                                        
                                        <li class="icon7">
		                                    <a href="<?php echo site_url('event/edit_code');?>/<?php echo $event_id ;?>/<?php echo $id;?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="edit"></a>
		                                        </li>
                                    </ul>
                                    </td>
                                </tr>
                                
                              <?php }
							    }else {?>
                                
                                
                                <tr > <td colspan="6" style="text-align:center"><?php echo NO_DATA; ?> </td></tr>  
                                
                               <?php  }?> 
                                                                
                            </tbody>
                            	
                        </table>
                        <!-- code add by darshan start-->
                         <div class="text-right">
                            <div class="pagi_block pagi_marB0">
                            <?php echo $page_link_dic_code; ?>
                            </div>
                                <div class="clear"></div>
                        </div>
                         <!-- code add by darshan end-->
                 </div>
                 
                 
                </form>
                
                </div> <!-- event detail closes -->
                                
                </div>
                
                
                    
                 </div>  
                
                       
              <div class="row">    
                            
                <div class="event-webpage col-sm-12 pt">
                	<div class="red-event width100 "><h4><?php echo ACCESS_CODES; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
              
              
                <div class="col-sm-12">
                <div class="event-detail clearfix">
                
                <form class="event-title">
                  
                 <div class="col-sm-12 pt alls_ass">
                               
                 <table class="table table_res event-info contct-table">
                        	<thead>
                            	<tr>
                                	<th><?php echo ACCESS_CODE; ?></th>
                                    <th><?php echo STARTS; ?></th>
                                    <th><?php echo ENDS; ?></th>
                                    <th><?php echo AVAILABLE; ?></th>
                                    <th><?php echo ACTION; ?></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            	
                          <?php if($access_codes){      
                                foreach ($access_codes as $single_code) {
								$id = $single_code['id'];
								$code = $single_code['code'];
								$disc_amt = $single_code['disc_amt'];
								$disc_perc = $single_code['disc_perc'];
								$used_cnt = $single_code['used_cnt'];
								$uses = $single_code['uses'];	
								$event_id = $single_code['event_id'];
								$end_now = $single_code['end_now'];
								$start_date_time = $single_code['start_date_time'];
								$end_date_time = $single_code['end_date_time'];
								$start_now = $single_code['start_now'];
								$start_day = $single_code['start_day'];
								$start_hour = $single_code['start_hour'];
								$start_minute = $single_code['start_minute'];
								
								$end_now = $single_code['end_now'];
								$end_day = $single_code['end_day'];
								$end_hour = $single_code['end_hour'];
								$end_minute = $single_code['end_minute'];
								
								?>
                                 <tr>
                                	<td class="reg"><?php echo $code; ?></td>
                                    <td>
                                       	<?php if ( $start_now ==0 ){ ?>
                                            <?php echo STARTED; ?>
                                        <?php }elseif ($start_now == 1) {?>
                                            <?php echo datetimeformat($start_date_time).' '.timeFormat($start_date_time); ?>
                                        <?php }else{ ?>
                                            <?php if ($start_day) {?>
                                                <?php echo $start_day ; ?> <?php echo DAYS ; ?>
                                            <?php } ?>
                                            
                                            <?php if ($start_hour) { ?>
                                                <?php echo $start_hour ; ?> <?php echo HOURS; ?>
                                            <?php } ?>
                                            
                                            <?php if ($start_minute){ ?>
                                                <?php echo $start_minute; ?> <?php echo MINUTES ; ?>
                                            <?php } ?>
                                            <?php echo BEFORE_EVENT; ?> 
                                       <?php } ?>
                                    </td>	
                                    <td>
                                       <?php if ($end_now==0) {?>
                                        <?php echo WHEN_SALES_END; ?>
                                    <?php }elseif ($end_now==1){ ?>
                                        <?php echo datetimeformat($end_date_time).' '.timeFormat($end_date_time);?>
                                    <?php }else{ ?>
                                        <?php if ($end_day){ ?>
                                            <?php echo SecureShowData($end_day); ?> <?php echo DAYS ?>
                                        <?php } 
                                        if ($end_hour){ ?>
                                            <?php echo $end_hour; ?> <?php echo HOURS ?>
                                        <?php } ?>
                                        
                                        <?php if ($end_minute) { ?>
                                            <?php echo $end_minute; ?> <?php echo MINUTES; ?>
                                        <?php } ?>
                                        <?php echo BEFORE_EVENT; ?> 
                                    <?php } ?>
                                    </td>
                                    <td>
                                         <?php if ($used_cnt > $uses ) {
                                              $available = 0
                                        ?>
                                            <?php echo AVAILABLE; ?>/<?php $uses; ?>                        	
                                        <?php }elseif ($uses == 0){ ?>
                                            <?php echo NO_LIMITS; ?>
                                        <?php }else{
										   $result = $uses- $used_cnt;
										 ?>
                                            <?php echo SecureShowData($result); ?>/<?php echo SecureShowData($uses); ?>
                                        <?php } ?>
                                    </td>
                                    <td>
                                    <ul class="nav navbar-nav edit-delt text-center">
                                     
                                        <li class="del-icon icon3">
                                            <a href="<?php echo site_url('event/delete_code');?>/<?php echo $event_id ;?>/<?php echo $id ?>" data-original-title="Delete" onclick="return confirm('Are you sure? you,want to delete this record')"><i class="glyphicon glyphicon-trash edit" data-toggle="tooltip" data-placement="bottom" title="Delete"></i></a>
                                            </li>
                                        
                                        <li class="icon7">
                                        <a href="<?php echo site_url('event/edit_code');?>/<?php echo $event_id ;?>/<?php echo $id;?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="edit"></a>
		                                        </li>
                                    </ul>
                                    </td>
                                </tr>
                                
                              <?php }
							    }else {?>
                                
                                
                                <tr> <td colspan="6" style="text-align:center"><?php echo NO_DATA; ?> </td></tr>  
                                
                               <?php  }?> 
                                                                
                            </tbody>
                            	
                        </table>
                        <!-- code add by darshan start-->
                             <div class="text-right">
                            <div class="pagi_block pagi_marB0">
                            <?php echo $page_link_access_code; ?>
                            </div>
                                <div class="clear"></div>
                        </div>
                         <!-- code add by darshan end-->
                 </div>
                 
                </form>
                
                </div> <!-- event detail closes -->
                                
                </div>
                
                
                    
                 </div>
              
              
                
                </div>
                
                <!-- RIGHT CONTENT -->
                <?php echo $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
				</div>
                             
                
            </div><!-- End container -->
    </section>
