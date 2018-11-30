
 <form method="post" action="<?php echo site_url('admin/wallet/confirm/'.$id);?>" id='print' >

  <div id="page-wrapper">
            <div class="row">
                <div class=" col-xs-12 clearfix">
                    <h1><?php echo WITHDRAW_CONFIRM_FORM; ?>  -  <?php echo SecureShowData($site_setting['site_name']);?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php 
        if($error!= '')
        { ?>
          
                        <div class="alert alert-danger" role="alert">
              <button class="close" data-dismiss="alert">x</button>
              <strong><?php echo ERRORS; ?>!</strong> <?php echo $error;?>
                            </div> 
        <?php } ?> 
                       <?php if($payment_mode=="paypal"){  ?>
            <div class="row" >            	
                <div class="col-lg-6 col-lg-offset-3 col-xs-12 clearfix">
                	<div class="panel panel-default">
                 
                          <!-- Default panel contents -->
                          <div class="panel-heading">
                          <div class="panel-title pull-left"><?php echo 'Paypal Details'; ?></div>
                           <h4 class="panel-title text-right">
                                      <button type="button" class="btn btn-default" onclick="printContent('print')"><?php echo PRINT_TEXT; ?></button>
                            </h4>
                            </div>
                          <!-- List group -->
                          <ul class="list-group withdrow">
                            <li class="list-group-item clearfix"><label><?php echo EVENT_TITLE ?> : </label> <div class="text-edit"><?php echo SecureShowData($event_details['event_title']); ?></div></li>
                              <li class="list-group-item clearfix"><label><?php echo EVENT.' '.EVENT_START_DATE ?> : </label> <div class="text-edit"><?php echo date('d-m-Y',strtotime($event_details['event_start_date_time'])); ?></div></li>
                          <li class="list-group-item clearfix"><label><?php echo 'Withdraw Amount' ?> : </label> <div class="text-edit"><?php echo $withdraw_amount; ?></div></li>
                            <li class="list-group-item clearfix"><label><?php echo 'Recipient Name' ?> : </label> <div class="text-edit"><?php echo SecureShowData($result['gateway_name']); ?></div></li>
                            <li class="list-group-item clearfix"><label><?php echo 'Paypal Email'; ?> : </label> <div class="text-edit"><?php echo SecureShowData($result['gateway_account']); ?></div></li>  
                            <li class="list-group-item clearfix"> <label><?php echo CONFIRMATION_ID; ?> :</label> <div class="text-edit"><input class="form-control navbar-right" type="text" name="confirm_id"></div></li> 
                            <li class="list-group-item text-center  clearfix"> <button type="submit" class="btn btn-default btn-lg"><?php echo CONFIRM;?></button></li>                          
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->                              
            </div>     
            <?php } ?>

            <?php if($payment_mode=="bank"){  ?>
            <div class="row">             
                <div class="col-lg-6 col-lg-offset-3 clearfix">
                  <div class="panel panel-default">
                          <!-- Default panel contents -->
                           <div class="panel-heading">
                          <div class="panel-title pull-left"><?php echo 'Bank Details'; ?></div>
                           <h4 class="panel-title text-right">
                                      <button type="button" class="btn btn-default" onclick="printContent('print')"><?php echo PRINT_TEXT; ?></button>
                            </h4>
                            </div>
                          <!-- List group -->
                          <ul class="list-group withdrow">
                          <li class="list-group-item clearfix"><label><?php echo EVENT_TITLE ?> : </label> <div class="text-edit"><?php echo SecureShowData($event_details['event_title']); ?></div></li>
                              <li class="list-group-item clearfix"><label><?php echo EVENT.' '.EVENT_START_DATE ?> : </label> <div class="text-edit"><?php echo date('d-m-Y',strtotime($event_details['event_start_date_time'])); ?></div></li>
                         
                          <li class="list-group-item clearfix"><label><?php echo 'Withdraw Amount' ?> : </label><div class="text-edit"><?php echo SecureShowData($withdraw_amount); ?></div></li>
                            <li class="list-group-item clearfix"><label><?php echo 'A/c Holder Name' ?> : </label><div class="text-edit"><?php echo SecureShowData($result['bank_account_holder_name']); ?></div></li>
                            <li class="list-group-item clearfix"><label><?php echo 'A/c Number'; ?> : </label><div class="text-edit"><?php echo SecureShowData($result['bank_account_number']); ?></div></li>                            
                            <li class="list-group-item clearfix"><label><?php echo 'Bank Name'; ?> : </label><div class="text-edit"><?php echo SecureShowData($result['bank_name']); ?></div></li>       
                            <li class="list-group-item clearfix"><label><?php echo 'Bank Address'; ?> : </label><div class="text-edit"><?php echo SecureShowData($result['bank_address']); ?></div></li>                            
                            <li class="list-group-item clearfix"><label><?php echo 'Bank City'; ?> : </label><div class="text-edit"><?php echo SecureShowData($result['bank_city']); ?></div></li>                            
                            <li class="list-group-item clearfix"><label><?php echo 'Bank State'; ?> : </label><div class="text-edit"><?php echo SecureShowData($result['bank_state']); ?></div></li>                            
                            <li class="list-group-item clearfix"><label><?php echo 'Bank Country'; ?> : </label><div class="text-edit"><?php echo SecureShowData($result['bank_country']); ?></div></li>                            
                            <li class="list-group-item clearfix"><label><?php echo 'Customer Address'; ?> : </label><div class="text-edit"><?php echo SecureShowData($result['bank_settlement_address']); ?></div></li>                            
                            <li class="list-group-item clearfix"><label><?php echo 'City'; ?> : </label><div class="text-edit"><?php echo SecureShowData($result['bank_settlement_city']); ?></div></li>                            
                            <li class="list-group-item clearfix"><label><?php echo 'Province'; ?> : </label><div class="text-edit"><?php echo SecureShowData($result['bank_settlement_province']); ?></div></li>                            
                            <li class="list-group-item clearfix"><label><?php echo 'Country'; ?> : </label><div class="text-edit"><?php echo SecureShowData($result['bank_settlement_country']); ?></div></li>                            
                            <li class="list-group-item clearfix"><label><?php echo 'Customer Code'; ?> : </label><div class="text-edit"><?php echo SecureShowData($result['bank_settlement_bankcode']); ?></div></li>                                                 
                         <li class="list-group-item clearfix"> <label><?php echo CONFIRMATION_ID; ?> :</label> <div class="text-edit"><input class="form-control navbar-right" type="text" name="confirm_id"></div></li> 
                            <li class="list-group-item text-center  clearfix"> <button type="submit" class="btn btn-default btn-lg"><?php echo CONFIRM;?></button></li>                          
                          
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->                              
            </div>     
            <?php } ?>

            <?php if($payment_mode=="cheque"){  ?>
            <div class="row">             
                <div class="col-lg-6 col-lg-offset-3 clearfix">
                  <div class="panel panel-default">
                          <!-- Default panel contents -->
                        <div class="panel-heading">
                          <div class="panel-title pull-left"><?php echo 'Cheque Details'; ?></div>
                           <h4 class="panel-title text-right">
                                      <button type="button" class="btn btn-default" onclick="printContent('print')"><?php echo PRINT_TEXT; ?></button>
                            </h4>
                            </div>
                          <!-- List group -->
                          <ul class="list-group withdrow">
                          
                            <li class="list-group-item clearfix"><label><?php echo EVENT_TITLE ?> : </label> <div class="text-edit"><?php echo SecureShowData($event_details['event_title']); ?></div></li>
                              <li class="list-group-item clearfix"><label><?php echo EVENT.' '.EVENT_START_DATE ?> : </label> <div class="text-edit"><?php echo date('d-m-Y',strtotime($event_details['event_start_date_time'])); ?></div></li>
                         <li class="list-group-item clearfix"><label><?php echo 'Withdraw Amount' ?> : </label><div class="text-edit"><?php echo SecureShowData($withdraw_amount); ?></div></li>
                            <li class="list-group-item clearfix"><label><?php echo 'Name on Cheque' ?> : </label><div class="text-edit"><?php echo SecureShowData($result['cheque_name']); ?></div></li>
                            <li class="list-group-item clearfix"><label><?php echo 'Branch'; ?> : </label><div class="text-edit"><?php echo SecureShowData($result['cheque_branch']); ?></div></li>                            
                            <li class="list-group-item clearfix"><label><?php echo 'Postal Address' ?> : </label><div class="text-edit"><?php echo SecureShowData($result['org_address']); ?></div></li>
                            <li class="list-group-item clearfix"><label><?php echo 'City'; ?> : </label><div class="text-edit"><?php echo SecureShowData($result['org_city']); ?></div></li>                            
                            <li class="list-group-item clearfix"><label><?php echo 'State;' ?> : </label><div class="text-edit"><?php echo SecureShowData($result['org_state']); ?></div></li>
                            <li class="list-group-item clearfix"><label><?php echo 'Country'; ?> : </label><div class="text-edit"><?php echo SecureShowData($result['org_country']); ?></div></li>                            
                            <li class="list-group-item clearfix"><label><?php echo 'Zip Code' ?> : </label><div class="text-edit"><?php echo SecureShowData($result['org_zipcode']); ?></div></li>                            
                         <li class="list-group-item clearfix"> <label><?php echo CONFIRMATION_ID; ?> :</label> <div class="text-edit"><input class="form-control navbar-right" type="text" name="confirm_id"></div></li> 
                            <li class="list-group-item text-center  clearfix"> <button type="submit" class="btn btn-default btn-lg"><?php echo CONFIRM;?></button></li>                          
                          
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->                              
            </div>     
            <?php } ?>    
                         
                <!-- col-lg-8  -->                              
                   
            </div>
            </form>
<script type="text/javascript">

function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}

</script>