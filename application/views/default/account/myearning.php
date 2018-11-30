
<?php $affiliate_status = $site_setting['affiliate_status'];?>
<!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="<?php echo base_url();?>js/lib/jquery.mousewheel-3.0.6.pack.js"></script>

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
<style>
.check_box{
	font-size: 14px;
	border-radius: 3px;
	background: #3cc4f3;
	border:none;
	color: #fff;
	padding: 5px 10px;
}	
</style>
<script type="text/javascript">
    $(document).ready(function() {
       
    });
</script>       
<section class="eventDash-head">
  	<div class="container">
    	<div class="row">              
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 test-contct test-cntr">
                <h1><?php echo MY_ACCOUNT; ?></h1>
          </div>
         
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right pt mt10 con-cntr">
        
            <div class="halfacc">
             <p><?php echo SecureShowData($site_setting['site_name']); ?> <?php echo ACCOUNT_SINCE; ?> <span><?php echo datetimeformat($user_info['created_at']);?> <?php echo timeFormat($user_info['created_at']); ?></span></p>
            <?php 
            if($user_info['ref_id']){
              $admin=getRecordById('users','id',$user_info['ref_id']);

              ?><p><?php echo THE_MAIN_ACCOUNT_HOLDER_IS;?> <span><?php echo SecureShowData($admin['email']);?></span></p>
            <?php } ?>
            </div>
          </div>
        
      </div>
    </div>
  </section>
  <?php if($this->session->flashdata('home_common_succ')!=null){ ?>
  <div class="alert alert-success message"><?php echo $this->session->flashdata('home_common_succ'); ?></div>
  <?php } ?>
<section>  
            <div class="container marTB50">
            	<div class="row">
                
                <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12">
              
              <form method="post" action="<?php echo site_url('account/change_status/'.$user_id);?>">
             
              	<div class="row"> 
                  
            <?php if($this->session->flashdata('RECORD_HAS_BEEN_SUCCESSFULLY_ADDED')){?>
                <div class="alert alert-success mar10 sucerrcmn" style="/* display: none; */"><?php echo YOUR_WITHDRAW_PROCESS_SUCESSFULLY_COMPLETE;?></div>
            <?php }?>                    
                
                <div class="event-webpage col-xs-12 col-sm-12">
                	<div class="red-event width100 "><h4><?php echo MY_EARNINGS; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
			
                <div class="col-sm-12 clearfix">
                    <div class="tab my-event mb">
                    
                    	<ul class="nav nav-tabs responsive hidden-xs hidden-sm">
                    	
                          <li class="active"><a href="#event" data-toggle="tab"><?php echo EVENT_EARN;?></a></li>
                    </ul>
                    
                    <div class="tab-content responsive hidden-sm hidden-xs">
                        
                        	<div class="tab-pane fade in active" id="event">
                      
                    	<table class="table table_res event_earn_table contct-table earn_info_textoverflow">
                        	<thead>
                            	<tr>
                                	<th><?php echo EVENT_NAME;?></th>
                                    <th><?php echo "Total earn";?></th>
                                    <th><?php echo PAID;?></th>
                                    <th><?php echo DUE;?></th>
                                    <th><?php echo Date;?></th>
                                    <th><?php echo STATUS;?></th>
                                    <th><?php echo ACTION;?></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            	<?php if($earning){
                            		
											foreach($earning as $earn){
                            					
												$event_title = $earn['event_title'];
                                                $credit = 0;
                                                $isWallet = false;
                                                if($earn['total_wallets']) {
                                                    $isWallet = true;
                                                }
                        $event_id = $earn['event_id'];   
                        $event_end_date_time = $earn['event_end_date_time'];                                            
                        $paid = "<i class='glyphicon glyphicon-minus'></i>";
                        $due = "<i class='glyphicon glyphicon-minus'></i>";
                        $is_paid = $is_paids[$event_id];
                        $request_send = $request_sends[$event_id];
                        $payment_status = PENDING;
                        if($isWallet && $is_paid) {
                            $due = "<i class='glyphicon glyphicon-minus'></i>";
                            $paid = "<i class='glyphicon glyphicon-ok'></i>";
                            $payment_status = "Paid";
                        }elseif($isWallet && !$is_paid && $request_send) {
                            $due = "<i class='glyphicon glyphicon-ok'></i>";
                            $paid = "<i class='glyphicon glyphicon-minus'></i>";
                            $payment_status = "Due";
                        } elseif(!$isWallet) {
                            $due = "<i class='glyphicon glyphicon-minus'></i>";
                            $paid = "<i class='glyphicon glyphicon-ok'></i>";
                            $payment_status = PAID;
                        }
            	?>
               	<tr>	
                	<td><?php echo SecureShowData($event_title); ?></td>
                    <td><?php echo set_event_currency($earn['purchases_total'], $event_id); ?></td>
                    <td><?php echo $paid; ?></td>
                    <td><?php echo $due; ?></td>
                    <td><?php echo datetimeformat($event_end_date_time); ?> <?php echo timeFormat($event_end_date_time); ?></td>
                    <td>&nbsp

                    <?php 
                    if($earn['purchases_total']) {
                        if((date('Y-m-d H:i:s') > $event_end_date_time) && !$is_paid && $isWallet){ ?>
                           <a href="<?php echo site_url('account/withdraw_form/'.$event_id);?>" style="color: red;"><?php echo WITHDRAW_REQUEST;?></a>
                       	<?php }
                        else{
                            echo $payment_status;
                        } 
                    } ?>                                    
                    </td>
                    <td>
                    <a href="<?php echo site_url('account/view_earning/0/');?>/<?php echo $event_id;?>" data-toggle="tooltip" data-placement="bottom" title="View Detail" class="mfPopup edit"><?php echo VIEW; ?></a>
                    </td>
                  </tr>
                 <?php } 
                 }else{
                     echo '<tr><td colspan="7">'.NO_RECORDS.'</td></tr>';
                 } ?> 
                 </tbody>
              </table>
                        
                        <div class="add-new mt clearfix" style="display: none;">
                            <ul class="p0">
                            	<li><label><input type="checkbox" id="selecctall"/> <?php echo SELECT_ALL;?></label> &nbsp; <input type="submit" value="Withdraw All" class="btn-event"/></li>   
                            </ul>
                       </div>
              </div><!-- End tab-pane id=home -->
 
                            <div class="tab-pane fade" id="refferal">
                     	<table class="table table_res refferel_earn_table contct-table">
                        
                        	<thead>
                            	<tr>
                                	<th>&nbsp;</th>
                                    <th><?php echo AMOUNT;?></th>
                                    <th><?php echo PAID;?></th>
                                    <th><?php echo DUE;?></th>
                                    <th><?php echo QUICK_LINKS;?></th>
                                </tr>
                            </thead>
                       
                        <!-- this is used for account value -->
                        <?php 
                        $p_data=getreferral_data_byuser($user_id);
                         $amount ='';$paid='';$status='';$due='';
                           if(is_array($p_data))
                           {
                             foreach($p_data as $vall)
                             {
                              if(is_array($vall))
                               {
                                if( $amount=='') { $amount= $vall['currency_symbol'].$vall['shares']; }
                                else { $amount.=",".$vall['currency_symbol'].$vall['shares']; }
                               }

                             }
                          

                          /* this is used for a paid & due */


                           $p_get1 = getreferral_data_status_byuser($user_id,0);
                         
                           $p_get = getreferral_data_status_byuser($user_id,1);
                           if(is_array($p_get))
                           {
                             foreach($p_get as $vall)
                             {
                              
                               if(is_array($vall))
                               {
                                
                                if( $paid=='') { $paid= $vall['currency_symbol'].$vall['shares']; }
                                else { $paid.=",".$vall['currency_symbol'].$vall['shares']; }
                              }

                             }
                            } 
                            if(is_array($p_get1))
                           {
                             foreach($p_get1 as $vall)
                             {
                              
                               if(is_array($vall))
                               {
                                
                                if( $due=='') { $due= $vall['currency_symbol'].$vall['shares']; }
                                else { $due.=",".$vall['currency_symbol'].$vall['shares']; }
                              }

                             }
                           } 
                              ?> 
                          
                         <tr>
                            <td>&nbsp<?php if($status==1){?><input type="checkbox" class="checkbox1" name="chk[]"  value="<?php echo $id;?>" > <?php }?></td>
                              <td>&nbsp<?php echo $amount; ?></td> 
                              <td>&nbsp<?php echo $paid; ?></td>
                              <td>&nbsp<?php echo $due; ?></td>
                              <td><?php                        
                                    if($paid || $due) { ?>
                                    <a href="<?php echo site_url('account/get_withdraw/');?>" class="mfPopup" style="color: red;"><?php echo "withdraw Request";?></a>
            										    <?php } ?>
                            </td>
                         </tr>
                        <?php } else{
                             echo '<tr><td colspan="6">'.NO_RECORDS.'</td></tr>';
                        } ?> 
                       <!-- this is code for a withdraw details -->
                     
                          <div class="tab-pane fade" id="refferal">
                            <table class="table table_res withdraw_details_table contct-table">
                               <h3><?php echo WITHDRAW_DETAILS ?></h3>
                          <thead>
                              <tr>
                                  <th>&nbsp;</th>
                                  
                                    <th><?php echo USER_ID;?></th>
                                    <th><?php echo WITHDRAW_NO;?></th>
                                    <th><?php echo DATE;?></th>
                                    <th><?php echo AMOUNT;?></th>
                                    <th><?php echo STATUS;?></th>
                                </tr>
                            </thead>            
                            <?php
                             $g_data = withdraw_fetch_value($user_id);
                           
                              foreach($g_data as $row):
                              
                             $user_id = $row['user_id'];
                             $withdraw_no = $row['withdraw_no'];
                             $date = $row['date'];
                             $amount = $row['amount'];
                             $status = $row['status'];
                             if($status == 0)
                             {
                                $comf =  PENDING;
                             }
                             else
                             {
                                $comf =  PAID;
                             } 
               
                            ?>
                            
                               <tr>
                                    <td>&nbsp;</td>
                                    <td><?php echo $user_id; ?></td> 
                                    <td><?php echo $withdraw_no; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td><?php echo $amount; ?></td>
                                    <td><?php echo $comf; ?></td>
                                </tr>
                            <?php endforeach;?>
                            
                         </table>

                            </tbody>
                            	
                        </table>
                            
                            </div>
                           <!-- upto here code add -->
                           <div class="tab-pane fade" id="affiliate">
                                <table class="table table_res afiliate_earn_table contct-table earn_info_textoverflow">
                        	<thead>
                            	<tr>
                                	<th>&nbsp;</th>
                                	<th><?php echo EVENT_NAME;?></th>
                                  <th><?php echo AMOUNT;?></th>      
                                  <th><?php echo DATE;?></th>
                                  <th><?php echo QUICK_LINKS; ?></th>
                              </tr>
                          </thead>
                            
                          <tbody>
                          <?php
                              if($affiliate_earning)
                              {
                              	foreach($affiliate_earning as $aearn){
                          					$id = $aearn['id'];
												            $event_title = $aearn['event_title'];
                                    $event_id = $aearn['event_id'];
                                    $credit = $aearn['credit'];
                                    $debit = $aearn['wcredit'];
                                    $amount = set_event_currency($debit,$event_id).' dr'; 
            												$paid = $aearn['paid'];
            												$due = $aearn['due'];
            												$created_at = $aearn['created_at'];
            												$status = $aearn['status'];
                            	?>
                            	<tr>
                                	<td><?php if($status==1){?><input type="checkbox" class="checkbox1" name="chk[]"  value="<?php echo $id;?>" > <?php }?></td>
                                	<td><?php echo SecureShowData($event_title); ?></td>
                                  <td><?php echo SecureShowData($amount); ?></td>	                                
                                  <td><?php echo $created_at; ?></td>
                                  <td><a href="<?php echo site_url('event/contact_organizer/'.$aearn['user_id'].'/'.$aearn['id']); ?>" class=" fancybox fancybox.iframe"> <?php echo Contact_the_organizer ?></a> </td>
                                </tr>
                               <?php } 
                               }else{
                                  echo '<tr><td colspan="7" class="relPos_H30_xs"><div class="no-record-wrap">'.NO_RECORDS.'</div></td></tr>'; 
                               } ?> 
                                                   
                            </tbody>                            	
                        </table>
                            </div>
                            <!-- End tab-pane id=bill -->                            
                      </div><!-- End tab-content  -->                    
               	  </div><!-- end event-detail -->
               </div>                      
            </div><!-- End Row-->                  
        </form>
        
        <div class="text-right" style="display: none;">
          <a href="javascript://" class="btn-event2"><?php echo WITHDRAW;?></a>
          </div>
     		</div><!-- End col-sm-8 -->          
  
        <!-- RIGHT CONTENT -->
        <?php echo $this->load->view('default/common/account_sidebar');?>
             
        </div>
    </div><!-- End container -->
</section>
    
<!-- Start footer -->
<script>

    $(document).ready(function() {
      $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
      });
    });

</script>

<script>
		$(document).ready(function(){
  		$(".rover_tip").popover();
    });
</script>
    
<script src="<?php echo base_url()?>js/responsive-tabs.js"></script>
<script type="text/javascript">
      $( '#myTab' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
      });

      ( function( $ ) {
          // Test for making sure event are maintained
          $( '.js-alert-test' ).click( function () {
            alert( '<?php echo BUTTON_CLICKED_EVENT_MAINTAID; ?>' );
          } );
          fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
      } )( jQuery );

    </script>
<script>
    $(document).ready(function(){
      $(".edit").tooltip();
    });
</script>   
  </body>
</html>