<?php 
	$data1['events_id'] = $id;
        
  $active = $event_detail['active'];
  
  $purchase=0;
  if($active==1){
      $purchase=1;
  }
?>
<script>

function drop_change(id){
    var qty = document.getElementById('ticket_qty_'+id).value;
    
    if(qty==''){
        qty = 0;
    }
    var orig_price = document.getElementById('ticket_orig_price'+id).value;
    var ticket_price = qty*orig_price;
    
    document.getElementById('ticket_price_'+id).value= ticket_price;
}

/* Function to set amount on change of qty for all tickets */

function set_amount(id,price,ele){
  
  var val = ele.value;
  var price = price;
  var old = 0;
  
  var testPattern=/^[0-9]*\.?[0-9]*$/;
    
  if(testPattern.test(ele.value)==false && ele.value !=''){
    document.getElementById(ele.id).value=0;
  } 
  
  var max_ticket_price = <?php echo $site_setting['max_ticket_price']; ?>;
  var tick_limit = document.getElementById(ele.id).value;    
  if(tick_limit >  max_ticket_price)
  {
  
    var paid_total = '#ticket_amount_'+id;
    $('#amount_req_fields').show();
    $('#amount_req_fields').text("<?php echo Ticket_price_should_be_less_than_or_equal_to;?> <?php echo $site_setting['max_ticket_price']; ?>"); 
    val = 0;
    document.getElementById(ele.id).value='';
        
  }else{
    $('#amount_req_fields').text("");
  }
  
  if(val!='' && val!=null && price >=0) 
  { 
      
    price = (parseFloat(val) * parseFloat(price));
      document.getElementById("ticket_amount_"+id).value = price;     
    }   
         
    else if(val == 0 && price != 'donation'){     
      document.getElementById("ticket_amount_"+id).value = 0;   
    }
    else if (price == 'donation' && val > 0 && val != ''){    
      document.getElementById("ticket_qty_"+id).value = val;
      document.getElementById("ticket_price_"+id).value = val;    
    }
    else if (price == 'donation' && (val == '' || val == 0)){   
      document.getElementById("ticket_qty_"+id).value = 0;    
      document.getElementById("ticket_price_"+id).value = 0;    
    }
 
    var chks1 = document.getElementsByClassName("all_free_tickets");
     for (var i = 0; i < chks1.length; i++){        
        val1 = chks1[i].value;        
        if(val1!='' && val1!=0){          
          if(old!=0 && old!=''){
          old = parseFloat(old) + parseFloat(val1);
        }else{
          old = parseFloat(val1);
        }
        }  
     }

     var chks2 = document.getElementsByClassName("all_paid_tickets");
     for (var i = 0; i < chks2.length; i++){        
        val2 = chks2[i].value;        
        if(val2!='' && val2!=0){          
          if(old!=0 && old!=''){
          old = parseFloat(old) + parseFloat(val2);
        }else{
          old = parseFloat(val2);
        }
        }  
     }

     var chks3 = document.getElementsByClassName("all_donation_tickets");
     for (var i = 0; i < chks3.length; i++){        
        val3 = chks3[i].value;        
        if(val3!='' && val3!=0){          
          if(old!=0 && old!=''){
          old = parseFloat(old) + parseFloat(val3);
        }else{
          old = parseFloat(val3);
        }
        }  
     }

     if(ele == 'Complimentary'){
        document.getElementById("total_amount").value = 0;
     }else {
        document.getElementById("total_amount").value = old;
     }  
}

</script>
<?php $this->load->view('default/common/dashboard-header')?>
<section>  
            <div class="container marTB50">
            <?php 
				if($error)
        { ?>
                <div class="alert alert-danger mar10" id="errorMsg"><?php echo $error; ?></div>
                <script type="text/javascript">
                  $(document).ready(function() {
                      setTimeout(function() {
                        $('#errorMsg').slideUp("slow");
                      }, 5000);
                  })
                </script>
				<?php } ?>
                <div class="row">
                <div class="col-md-8 col-sm-12">
                <div class="error1" id="amount_req_fields"></div>
                <form name="add_attendee" class="event-title" method="post" action="<?php echo site_url('attendees/add_attendee/'.$id);?>">
                                
                 <div class="row">    
                            
               <div class="event-webpage col-sm-12 col-xs-12">
                  <div class="red-event width100"><h4><?php echo ADD_ATTENDEES;?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                <div class="col-sm-12 col-xs-12">
                <div class="event-detail clearfix">
                
                 <div class="col-sm-12 col-xs-12 pt15 pb15">
                 <table class="table table_res mb0 event-info contct-table">
                  <thead>
                      <tr>
                            <th><?php echo TICKET_TYPE;?></th>
                            <th><?php echo END_SALES;?></th>
                            <th><?php echo PRICE;?></th>                
                            <th><?php echo Quantity;?></th>
                            <th><?php echo AMOUNT_PAID;?></th>
                        </tr>
                    </thead>                          
                  <tbody>
              <?php 
								if($tickets){
								$cnt=0;
									foreach($tickets as $tkt){
                                        $price_fee = 0;
                                        if($tkt['ticket_status'] != 0) {
										$ticket_name = $tkt['ticket_name'];
										$tid = $tkt['id'];
										$qty = $tkt['qty'];
										$used = $tkt['used'];
										$avail = $qty - $used;
							      $end_sale = datetimeformat($tkt['end_sale']);
									  $start_sale = datetimeformat($tkt['start_sale']);
										$type = $tkt['type'];									
										
										$now_date = date('Y-m-d H:i:s');
										if($type =='1'){
											$price = Free;
											$fee = Free;
                      $type_ticket = 'free';
                      $qty_args = 'free';
                      $textbox_class = 'all_free_tickets';
										}else if($type =='2'){
                                            $qty_args = $tkt['price'];
                                            $price_fee += $tkt['fee'] + $qty_args;
                                            $price = set_event_currency($qty_args, $id);
                                            $fee = set_event_currency($tkt['fee'], $id);
                      $type_ticket = 'paid_textbox';
                      $textbox_class = 'all_paid_tickets';
										}
										else{
											$price = N_A;
											$fee = N_A;
                      $type_ticket = 'donation';
                      $qty_args = 'donation';
                      $textbox_class = 'all_donation_tickets';
										}
										
										?>
                              <tr>
                                  <td><?php echo SecureShowData($ticket_name);?></td>	
                                  <td><?php echo $end_sale;?></td>
                                  <td><?php echo $price;?></td>                                         
                                  <td>
                                  <div class="col-sm-10 col-xs-7 float0-xs width-xs2 p0">
                                  <?php if($purchase==1){
                                    $end_sale = date('Y-m-d h:i:s', strtotime($tkt['end_sale']));
                                    $now_date = date('Y-m-d h:i:s', strtotime($tkt['start_sale']));
                                  if($end_sale=='' || strtotime($end_sale) < strtotime($now_date) || strtotime($event_detail['event_end_date_time']) < strtotime($now_date) )
                                  {
                                      if($type==1 || $type==2){?>
                                          <input type="hidden" name="ticket_qty[<?php echo $tid?>]" value="" />
                                          <input type="hidden" name="ticket_price[<?php echo $tid?>]" value="" />
                                          <?php
                                      }else{?>
                                          <input type="hidden" name="ticket_price[<?php echo $tid?>]" value="" />
                                          <input type="hidden" name="ticket_qty[<?php echo $tid?>]" value="" />
	<?php
                                      }
						
                                  }else{
	                                     if($type==1 || $type==2){ ?>
                                        <?php if($avail){ ?>
                                          <select class="select-pad" name="ticket_qty[<?php echo $tid?>]" id="ticket_qty_<?php echo $tid;?>" onchange="set_amount('<?php echo $tid; ?>','<?php echo $qty_args; ?>',this);" >
                                          <option value="">Select</option>
                                          <?php
                                          if($avail){
                                              for($i=1;$i<=$avail;$i++){
                                              ?>
                                                  <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                              <?php
                                              }
                                          }
                                        }else{
                                          echo Sold_Out;?>
                                          <input type="hidden" name="ticket_qty[<?php echo $tid; ?>]" id="ticket_qty_[<?php echo $tid; ?>]" value="" />
                                        <?php }
                                      ?>
                                    
                                      </select>
                                      <input type="hidden" name="ticket_price[<?php echo $tid?>]" id="ticket_price_<?php echo $tid;?>" value="">
                                      <input type="hidden" name="ticket_orig_price[<?php echo $tid?>]" id="ticket_orig_price<?php echo $tid;?>" value="<?php echo $price_fee;?>">
                          <?php }else{?>                                        
                              <?php if($avail){ echo '1';}else{ echo N_A; }?>                                              
                                      <input type="hidden" name="ticket_qty[<?php echo $tid?>]" value="" id="ticket_qty_<?php echo $tid; ?>" />                                                      
                                      <input type="hidden" name="ticket_price[<?php echo $tid?>]" id="ticket_price_<?php echo $tid;?>" value="">  
                                  </div>
                            <?php }
                                }
                              }else{
                                  echo N_A; ?>
                                  <input type="hidden" name="ticket_price[<?php echo $tid?>]" id="ticket_price_<?php echo $tid;?>" value="">		
                                  <input type="hidden" name="ticket_qty[<?php echo $tid?>]" value="" />
                       <?php } ?>
                                 
                      </div>
                      </td>
                        <td>                                              
                          <input <?php if(!$avail){ echo "readonly='readonly'";} ?> type="text" class="<?php echo $textbox_class; ?>" name="ticket_amount[<?php echo $tid; ?>]" id="ticket_amount_<?php echo $tid; ?>" value="0" onchange="set_amount('<?php echo $tid; ?>','<?php echo $type_ticket; ?>',this);">
                        </td>                                
                  </tr>
                <?php
                $cnt++;
                    }
					     }
    					?> 
              <input type="hidden" name="event_id" value="<?php echo $id?>" />
                               
              <?php }?>
            	<tr>
                <td colspan="3"><?php echo sprintf(DOES_NOT_CHARGE, SecureShowData($site_setting['site_name'])); ?></td>
                <td><?php echo TOTAL_PAID.'('.getCurrencySymbol($id).')'; ?></td>
                <td><input type="text" name="total_amount" id="total_amount" value="0" readonly="readonly"></ins></td>
              </tr>                                        
              </tbody>              
          </table>
   </div>
  </div> <!-- event detail closes -->               
</div>
           </div>
         <div class="row">                                
                <div class="event-webpage mt col-sm-12">
                  <div class="red-event width100 "><h4><?php echo Buy_Tickets;?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                <div class="col-sm-12">
                <div class="event-detail clearfix">
                
                <div class="form-group pt clearfix">
                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                   <label><?php echo PAYMENT_TYPE;?></label>
                 </div>
                 <div class="col-sm-7 col-xs-8 width-xs">
                  <select class="select-pad" placeholder="11:00 PM" name="payment_type" id="payment_type" onchange="set_amount('','',this.value);">
                    <option value="Paid with check"><?php echo PAID_WITH_CHEQUE;?></option>
                    <option value="Paid with cash"><?php echo PAID_WITH_CASH; ?></option>
                    <option value="Paid directly online with PayPal"><?php echo PAID_DIRECTLY_ONLINE_WITH_PAYPAL;?></option>
                    <option value="Paid online non-PayPal"><?php echo PAID_ONLINE_NON_PAYPAL;?> </option>
                    <option value="Paid by Google Checkout"><?php echo PAID_BY_GOOGLE_CHECKOUT;?> </option>
                    <option value="Complimentary"><?php echo COMPLIMENTARY;?> </option>
                    <option value="No payment necessary"><?php echo NO_PAYMENT_NECESSARY;?></option>
                    <option value="Other"><?php echo OTHER;?> </option>
                  </select>
                 </div>
                 </div>
                 
                 <div class="form-group clearfix">
                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                   <label><?php echo NOTES;?></label>
                 </div>
                 <div class="col-sm-7 col-xs-8 width-xs">
                  <textarea name="note" id="note"></textarea>
                 </div>
                 </div>
                 
                 <div class="col-sm-11 col-xs-11 width-xs p0">
                 <div class="col-sm-4 col-xs-6 save-btn pb fr clearfix browse">
                 <input type="submit" value="<?php echo Buy_Tickets;?>" class="btn-event2"  />
                
                </div>
                </div>
               
                
                </div> <!-- event detail closes -->
                                
                </div>
                    
                 </div>
                    
                </form>
                 </div> <!-- LEFT CONTENT ENDS -->
                 
                <!-- RIGHT CONTENT -->
                 <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
                    
                </div>
            </div><!-- End container -->
    </section>
     <script>
    		$(document).ready(function(){
    		$(".rover_tip").popover();
	});
	</script>
    
    <script>
    		$(document).ready(function(){
    		$(".edit").tooltip();
	});
	</script>