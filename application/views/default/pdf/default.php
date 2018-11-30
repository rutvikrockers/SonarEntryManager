
    <div class="note" style="margin-left: 15%;">
       <?php echo PLESE_PRINT_TICKETS;?>
            </div>
            
            <div class="ticket">
            <table cellpadding="0" style="height: 768px;">
                <tr>
                    <td valign="top">
                        <table style="margin-top: 0px; width: 90%; ">
                     
                            <tbody>
                                <tr>
                                    <td style="padding-top: 30px; width:120px; ">
                                  
                                        <img style="margin-left:20px;margin-bottom:20px;height:90px;width:120px;border-radius: 3px;float:left;" src="<?php echo str_replace("https","http",$event_logo); ?>" />                                                        
                                    </td>
                                    <td style="padding-top: 0px;padding-left: 10px;">

                                       <span style="font-family:Futura-CondensedMedium;text-transform:uppercase;color:#000000;font-size:20px;font-weight:bold; margin-bottom: 0px; margin-top:0px; margin-right: 10px; display:block;"><?php echo SecureShowData($event_title); ?></span>
                                        <br /><br />
                                       <em style="font-size:13px; display:block;"><?php echo convert_System_DateLanguage($event_start); ?></em> 
                                       <?php 
                                        $now = strtotime($event_end); // or your date as well
                                        $your_date = strtotime($event_start);
                                        $datediff = $now - $your_date;
                                        $datediff = floor($datediff / (60 * 60 * 24));
                                        $datediff++;
                                        if($datediff > 1) { ?>
                                            To <em style="font-size:13px; display:block;"><?php echo convert_System_DateLanguage($event_end); ?></em> 
                                        <?php } ?>
                                        (<?php echo $datediff; ?> day event)
                                        at <?php echo SecureShowData($venue_name);?>
                                        <br /><?php echo SecureShowData($event_address); ?>               
                                    </td>                    
                                </tr>
                                <tr>
                                    <td colspan="2">

                                        <table id="" style="clear:both; width: 600px;" cellpadding="1" cellspacing="0" >
                                            <tr>
                                                <td style="padding:10px;border-right:1px solid #b2b2b2;border-bottom:1px solid #b2b2b2;border-top:1px solid #b2b2b2;" colspan="2">
                                                
                                                <p style="margin-left:25px;margin-right:180px;"> <?php echo PURCHSER_NAME;?>   <br />
                                                <span style="text-transform:uppercase;font-size:17px;font-weight:bold;font-family:Futura-CondensedMedium;"><?php echo SecureShowData($buyer_name); ?></span></p>
                                               
                                                </td>
                                                <td style="padding:10px; border-bottom:1px solid #b2b2b2;border-top:1px solid #b2b2b2; text-align:right;">
                                              
                                                <p style="font-size: 13px;">  <?php echo PURCHASE_DATE;?>: <br/>
                                                <span style="text-transform:uppercase;font-size:13px;font-weight:bold;font-family:Futura-CondensedMedium;">
                                                <?php echo convert_System_DateLanguage($purchase_date); //echo date("M d, Y", strtotime($purchase_date)); ?></span></p>
                                                
                                                </td>                                      
                                            </tr>
                                        </table>
                                        <table id="" style="clear:both; width: 600px;" cellpadding="0" cellspacing="0" >
                                        <tr>
                                            <td style="padding:10px; border-bottom:1px solid #b2b2b2;border-right:1px solid #b2b2b2;">
                                                <span style="margin-left:25px;"> <?php echo ORDER_NO;?>: <strong><?php echo $order_no; ?></strong></span><br/>
                                                <span style="margin-left:25px;"><?php echo TICKET_NUMBER;?>: <strong><?php echo $purchase_id; ?></strong></span>
                                                    <?php if ($table_id && $seat_no ) { ?>
                                                        <br/><span style="margin-left:25px;">Table/Seat Number: <strong><?php echo $table_id.'/'.$seat_no; ?></strong></span>
                                                   <?php } ?>
                                                  

                                            </td>
                                            <td style="border-bottom:1px solid #b2b2b2;padding:10px;border-right:1px solid #b2b2b2;text-align:center;">
                                                <p style="font-size:15px;margin:0px 10px;"> <?php echo Price;?>: <strong><?php echo set_event_currency($purchase_price); ?></strong></p>
                                            </td>
                                            <td style="padding:10px; border-bottom:1px solid #b2b2b2;text-align:right;">
                                            <p><?php echo Ticket_name;?><br />
                                            <span style="text-transform:uppercase;font-size:17px;font-weight:bold;font-family:Futura-CondensedMedium;"><?php echo SecureShowData($ticket_name); ?></span>
                                            </p>
                                            </td>
                                       
                                        </tr>
                                        </table>
                                        
                                                                               
                                    </td>
                                </tr>
                                <?php if($type !='1') { ?>
                                    <?php if($payment_gateway == 'Split_paypal') { 
                                        $payment_gateway = "Paypal";
                                    } elseif($payment_gateway == 'Authorize_net') {
                                        $payment_gateway = "Credit Card";
                                    } elseif($payment_gateway == 'Pay_at_event') {
                                        $payment_gateway = "Cash";
                                    } ?>


                                <tr>
                                    <td style="text-align:center;margin-bottom:50px; background: transparent;" colspan="3">
                                        <br />  
                                        <p style="margin:20px 26px 26px;"><?php echo PAYMENT_STATUS;?>: <strong><?php echo PAID_VIA;?> <?php echo $payment_gateway;?></strong></p>
                                    </td>
                                </tr>
                               <?php  } ?>

                            </tbody>
                               
                    </table>
                    </td>            
                
                    <td style=" border-left: 1px dashed #b2b2b2;">
                        <table style="float: left;">
                            <tr>
                                <td>
                                    <div class="sticker" style=" background: transparent;">            
                                        <img style="margin: 5px 0px 20px 0px; height: 250px; width: 60px;" src="<?php echo str_replace("https","http",$barcode_file); ?>" alt="barcode" />
                                        <img style="float: right; width: 60px; margin: -17px 35px 20px -4px;" src="<?php echo str_replace("https","http",$qrcode_file);?>" alt="qrcode" />
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
            </div>

           
              <?php if( $type != 1 &&  $refund_policy_enable) {
                                ?> 
                    <div class="text" style="width: 60%" >
                      <p style="margin:0px 20px;">  Refund Policy : <?php echo SecureShowData($refund_policy_text);?>
                      </p>
                    </div>
                    <?php } ?>
          
            
            <div class="text" style="width: 60%" >
            <?php if($pdf_msg!=''){ ?><p style="margin:0px 20px;"><?php echo SecureShowData($pdf_msg); ?></p> <?php  }else{?>
            <p style="margin:0px 20px;"><strong><?php echo PLESE_PRINT_TICKETS;?></strong></p>
            <?php } ?>
            </div>
            <img style="float: right; margin-bottom: 30px; margin-right: 0px; max-width: 240px;"  src="<?php echo  str_replace("https","http",base_url("images")).'/'.$site_logo; ?>" alt="site logo" />
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p><p></p>
<p></p>
<p></p>
<p></p>
<p></p>