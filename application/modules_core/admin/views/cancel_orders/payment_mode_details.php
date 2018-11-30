<div id="print">
  
  <div id="page-wrapper">
  <div class="container-fluid">
            <div class="row">
                <div class=" col-xs-12 clearfix">
                    <h1><?php echo USERS; ?>  -  <?php echo SecureShowData($site_setting['site_name']);?> </h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php if($payment_mode=="paypal"){  ?>
            <div class="row" >              
                <div class="col-lg-8 col-lg-offset-2 col-xs-12 clearfix">
                  <div class="panel panel-default">
                 
                          <!-- Default panel contents -->
                          <div class="panel-heading clearfix">
                          <div class="panel-title pull-left">
                            
                           <?php echo 'Paypal Details'; ?>
                          </div>
                           <h4 class="panel-title text-right">
                                                                 
                                      <button type="button" class="btn btn-default hidden-print" onclick="printContent('print')"><?php echo PRINT_TEXT; ?></button>
                                        
                                    </h4>
                                    </div>
                          <!-- List group -->
                          <ul class="list-group">
                          
                            <li class="list-group-item">
                            <div class="clearfix ww-main">
                              <?php if($result['confirmation_id']!=''){
                                ?>
                                <div class="ww-item33">
                                <strong><?php echo CONFIRMATION_ID ?></strong> <p><?php echo $result['confirmation_id']; ?></p>
                                </div> 
                              <?php 
                            }
                            ?>
                              <div class="ww-item33">
                                <strong><?php echo EVENT_TITLE;?></strong>  <p><?php echo $event_details['event_title'];?></p>
                              </div>
                              <div class="ww-item33">
                                <strong><?php echo EVENT.' '.EVENT_START_DATE;?></strong>  <p><?php echo date('d-m-Y',strtotime($event_details['event_start_date_time'])); ?></p>
                              </div>
                              <div class="ww-item33">
                                <strong><?php echo WITHDRAW_AMOUNT ?></strong> <p><?php echo set_event_currency($cancel_withdraw_amount['total']); ?></p>
                              </div>
                             </div>
                            </li>
                            <li class="list-group-item">
                                <div class="clearfix ww-main">
                                  <div class="ww-item50">                                 
                                      <ul>
                                        <li><strong><?php echo FIRST_NAME; ?></strong> : <?php echo SecureShowData($result['paypal_first_name']); ?></li>
                                        <li><strong><?php echo LAST_NAME; ?></strong> : <?php echo SecureShowData($result['paypal_last_name']); ?></li>
                                        <li><strong><?php echo PAYPAL_EMAIL; ?></strong> : <?php echo SecureShowData($result['paypal_email']); ?></li>
                                       </ul>
                                  </div>
                                 </div>
                            </li>
                                                  
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->                              
            </div>     
            <?php } ?>

            <?php if($payment_mode=="bank"){  ?>
            <div class="row" >             
                <div class="col-lg-8 col-lg-offset-2 col-xs-12 clearfix">
                  <div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading clearfix">
                             <div class="panel-title pull-left">
                                <?php echo 'Bank Details'; ?>
                                </div>
                                 <h4 class="panel-title text-right">
                                                                 
                                      <button type="button" class="btn btn-default hidden-print" onclick="printContent('print')"><?php echo PRINT_TEXT; ?></button>
                                        
                                    </h4>
                                </div>
                          <!-- List group -->
                          <ul class="list-group">
                            <li class="list-group-item">
                              <div class="clearfix ww-main">
                              <?php if($result['confirmation_id']!=''){
                                ?>
                                 <div class="ww-item33">
                                <strong><?php echo CONFIRMATION_ID ?> </strong> <p><?php echo $result['confirmation_id']; ?></p>
                                </div>
                                <?php 
                              }
                              ?>
                               <div class="ww-item33">
                                <strong><?php echo WITHDRAW_AMOUNT;?></strong>  <p><?php echo set_event_currency($cancel_withdraw_amount['total']); ?></p>
                              </div>
                               <div class="ww-item33">
                                <strong><?php echo AC_HOLDER;?></strong>  <p><?php echo SecureShowData($result['bank_account_holder_name']); ?></p>
                              </div>
                               <div class="ww-item33">
                                <strong><?php echo EVENT_TITLE;?></strong>  <p><?php echo SecureShowData($event_details['event_title']);?></p>
                              </div>
                               <div class="ww-item33">
                                <strong><?php echo EVENT.' '.EVENT_START_DATE;?></strong>  <p><?php echo date('d-m-Y',strtotime($event_details['event_start_date_time'])); ?></p>
                              </div>
                              

                              </div>
                            </li>  
                            <li class="list-group-item">
                               <div class="clearfix ww-main">
                                <div class="ww-item50">                                 
                                      <ul>
                                        <li><strong><?php echo IBAN_NUMBER; ?></strong> : <?php echo SecureShowData($result['bank_account_number']); ?></li>
                                        <li><strong><?php echo BANK_NAME; ?></strong> : <?php echo SecureShowData($result['bank_name']); ?></li>
                                        <li><strong><?php echo BANK_ADDRESS; ?></strong> : <?php echo SecureShowData($result['bank_address']); ?></li>
                                        <li><strong><?php echo BANK_CITY; ?></strong> : <?php echo SecureShowData($result['bank_city']); ?></li>
                                        <li><strong><?php echo BANK_STATE; ?></strong> : <?php echo SecureShowData($result['bank_state']); ?></li>
                                         <li><strong><?php echo BANK_COUNTRY; ?></strong> : <?php echo SecureShowData($result['bank_country']); ?></li>
                                      </ul>
                                  </div>
                                   <div class="ww-item50">                                
                                      <ul>
                                        <li><strong><?php echo CUSTOMER_ADDRESS; ?></strong> : <?php echo SecureShowData($result['bank_settlement_address']); ?></li>
                                        <li><strong><?php echo City; ?></strong> : <?php echo SecureShowData($result['bank_settlement_city']); ?></li>
                                        <li><strong><?php echo Province; ?></strong> : <?php echo SecureShowData($result['bank_settlement_province']); ?></li>
                                        <li><strong><?php echo Country; ?></strong> : <?php echo SecureShowData($result['bank_settlement_country']); ?></li>
                                        <li><strong><?php echo Zip_Code; ?></strong> : <?php echo SecureShowData($result['bank_settlement_bankcode']); ?></li>
                                      </ul>
                                  </div>
                               </div>
                            </li>                            
                                                                            
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->                              
            </div>     
            <?php } ?>

            <?php if($payment_mode=="cheque"){  ?>
            <div class="row" >             
                <div class="col-lg-8 col-lg-offset-2 col-xs-12 clearfix">
                  <div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading clearfix">
                             <div class="panel-title pull-left">

                                 <?php echo 'Cheque Details'; ?>
                                 </div>
                                 <h4 class="panel-title text-right">
                                                                 
                                      <button type="button" class="btn btn-default hidden-print" onclick="printContent('print')"><?php echo PRINT_TEXT; ?></button>
                                        
                                    </h4>
                                </div>
                          <!-- List group -->
                          <ul class="list-group">
                              <li class="list-group-item">
                            <div class="clearfix ww-main">
                              <?php if($result['confirmation_id']!=''){
                                ?>
                                <div class="ww-item33">
                                <strong><?php echo CONFIRMATION_ID ?></strong> <p><?php echo $result['confirmation_id']; ?></p>
                                </div> 
                              <?php 
                            }
                            ?>
                              <div class="ww-item33">
                                <strong><?php echo EVENT_TITLE;?></strong>  <p><?php echo SecureShowData($event_details['event_title']);?></p>
                              </div>
                              <div class="ww-item33">
                                <strong><?php echo EVENT.' '.EVENT_START_DATE;?></strong>  <p><?php echo date('d-m-Y',strtotime($event_details['event_start_date_time'])); ?></p>
                              </div>
                              <div class="ww-item33">
                                <strong><?php echo WITHDRAW_AMOUNT ?></strong> <p><?php echo set_event_currency($cancel_withdraw_amount['total']); ?></p>
                              </div>
                              <div class="ww-item33">
                                <strong><?php echo NAME_ON_CHEQUE ?></strong> <p><?php echo SecureShowData($result['cheque_name']); ?></p>
                              </div>
                              <div class="ww-item33">
                                <strong><?php echo BRANCH; ?></strong> <p><?php echo SecureShowData($result['cheque_branch']); ?></p>
                              </div>
                            </div>
                            </li>
                             <li class="list-group-item">
                               <div class="clearfix ww-main">
                                <div class="ww-item50">                                 
                                      <ul>
                                        <li><strong><?php echo Address; ?></strong> : <?php echo SecureShowData($result['org_address']); ?></li>
                                        <li><strong><?php echo City; ?></strong> : <?php echo SecureShowData($result['org_city']); ?></li>
                                        <li><strong><?php echo State; ?></strong> : <?php echo SecureShowData($result['org_state']); ?></li>
                                        <li><strong><?php echo Country; ?></strong> : <?php echo SecureShowData($result['org_country']); ?></li>
                                        <li><strong><?php echo Zip_Code; ?></strong> : <?php echo SecureShowData($result['org_zipcode']); ?></li>
                                      </ul>
                                  </div>
                                   
                               </div>
                            </li>        
                                              
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->                              
            </div>     
            <?php } ?>       
            </div>
</div>
</div>
<script type="text/javascript">

function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}

</script>
