 <?php 
 
 	$prefix = $row['prefix'];
	$f_name=$row['first_name'];
	$l_name=$row['last_name'];
  $birth_date=$row['birth_date'];
	$suffix=$row['suffix'];
	$email=$row['email'];
	$home_phone=$row['home_phone'];
	$cell_phone=$row['cell_phone'];
	
	//home_address
	
	$home_address1=$row['home_add1'];
	$home_address2=$row['home_add2'];
	$home_city=$row['home_city'];
	$home_state=$row['home_state'];
	$home_zip=$row['home_zip'];
  $home_country = getCountryNamebyId($row['home_country']);
	
	//billing_address
	
	$bill_address1=$row['bill_add1'];
	$bill_address2=$row['bill_add2'];
	$bill_city=$row['bill_city'];
	$bill_state=$row['bill_state'];
	$bill_zip=$row['bill_zip'];
  $bill_country = getCountryNamebyId($row['bill_country']);
	
	//shipping_address
	
	$ship_address1=$row['ship_add1'];
	$ship_address2=$row['ship_add2'];
	$ship_city=$row['ship_city'];
	$ship_state=$row['ship_state'];
	$ship_zip=$row['ship_zip'];
  $ship_country = getCountryNamebyId($row['ship_country']);
	
	//working_address
	
	$work_address1=$row['work_add1'];
	$work_address2=$row['work_add2'];
	$work_city=$row['work_city'];
	$work_state=$row['work_state'];
	$work_zip=$row['work_zip'];
	$work_country=$row['work_country'];
	$work_job_title=$row['work_job_title'];
	$work_phone=$row['work_phone'];
	$work_company=$row['work_company'];
	$work_blog=$row['work_blog'];
	$work_website=$row['work_website'];

  $gender = $row['gender'];
  $event_pay_account = $row['event_pay_account'];
  $ref_pay_account = $row['ref_pay_account'];


   if($stripe_detail!='')
          {

            $compny_name=$stripe_detail['company_name'];
            $address=$stripe_detail['address'];
            $bank_name=$stripe_detail['bank_name'];
            $iban_number=$stripe_detail['iban_number'];
            
          }else
          {
             $compny_name='';
            $address='';
            $bank_name='';
            $iban_number='';
          }

	
 ?>
 
  <div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class=" col-xs-12 clearfix">
                    <h1><?php echo USERS; ?>  -  <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
                <div>
                <button onclick='window.location.href = "<?php echo base_url('admin/admin_user/list_users'); ?>";'>Back</button>  
                </div>
                
            </div>
            <!-- /.row -->
            
            <div class="row">
            	
                <div class="col-lg-4 col-xs-12 clearfix">
                	<div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading"><?php echo USERS_DETAILS; ?></div>
                          <!-- List group -->
                          <ul class="list-group">
                            <li class="list-group-item"><?php echo PREFIX; ?> : <?php echo SecureShowData($prefix); ?></li>
                            <li class="list-group-item"><?php echo NAME; ?> : <?php echo SecureShowData($f_name); ?> <?php echo SecureShowData($l_name); ?></li>
                            <li class="list-group-item"><?php echo SUFFIX; ?> : <?php echo SecureShowData($suffix); ?></li>
                            <li class="list-group-item"><?php echo EMAIL;?> : <?php echo SecureShowData($email); ?></li>
                            <li class="list-group-item"><?php echo HOME_PHONE;?> : <?php echo SecureShowData($home_phone); ?></li>
                            <li class="list-group-item"><?php echo CELL_PHONE;?> : <?php echo SecureShowData($cell_phone); ?></li>
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->
                
                <div class="col-lg-4 col-xs-12 clearfix">
                	<div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading"><?php echo HOME_ADDRESS; ?></div>
                          <!-- List group -->
                          <ul class="list-group">
                            <li class="list-group-item"><?php echo ADDRESS; ?> : <?php echo SecureShowData($home_address1); ?></li>
                            <li class="list-group-item"><?php echo ADDRESS2; ?> : <?php echo SecureShowData($home_address2); ?></li>
                            <li class="list-group-item"><?php echo CITY; ?> : <?php echo SecureShowData($home_city); ?></li>
                            <li class="list-group-item"><?php echo STATE; ?> : <?php echo SecureShowData($home_state); ?></li>
                            <li class="list-group-item"><?php echo COUNTRY; ?> : <?php echo SecureShowData($home_country); ?></li>
                            <li class="list-group-item"><?php echo ZIP ?> / <?php echo POSTAL_CODE; ?> : <?php echo SecureShowData($home_zip); ?></li>
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->
                
                <div class="col-lg-4 col-xs-12 clearfix">
                	<div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading"><?php echo BILLING_ADDRESS; ?></div>
                          <!-- List group -->
                          <ul class="list-group">
                            <li class="list-group-item"><?php echo ADDRESS; ?> : <?php echo SecureShowData($bill_address1); ?></li>
                            <li class="list-group-item"><?php echo ADDRESS2; ?> : <?php echo SecureShowData($bill_address2); ?></li>
                            <li class="list-group-item"><?php echo CITY; ?> : <?php echo SecureShowData($bill_city); ?></li>
                            <li class="list-group-item"><?php echo STATE; ?> : <?php echo SecureShowData($bill_state); ?></li>
                            <li class="list-group-item"><?php echo COUNTRY; ?> : <?php echo SecureShowData($bill_country); ?></li>
                            <li class="list-group-item"><?php echo ZIP ?> / <?php echo POSTAL_CODE; ?> : <?php echo SecureShowData($bill_zip); ?></li>
                          </ul>
                        </div>
                </div>
                
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-6 col-xs-12 clearfix">
                	<div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading"><?php echo SHIPPING_ADDRESS; ?></div>
                          <!-- List group -->
                          <ul class="list-group">
                           <li class="list-group-item"><?php echo ADDRESS; ?> : <?php echo SecureShowData($ship_address1); ?></li>
                            <li class="list-group-item"><?php echo ADDRESS2; ?> : <?php echo SecureShowData($ship_address2); ?></li>
                            <li class="list-group-item"><?php echo CITY; ?> : <?php echo SecureShowData($ship_city); ?></li>
                            <li class="list-group-item"><?php echo STATE; ?> : <?php echo SecureShowData($ship_state); ?></li>
                            <li class="list-group-item"><?php echo COUNTRY; ?> : <?php echo SecureShowData($ship_country); ?></li>
                            <li class="list-group-item"><?php echo ZIP ?> / <?php echo POSTAL_CODE; ?> : <?php echo SecureShowData($ship_zip); ?></li>
                          </ul>
                        </div>
               	 </div>
                
                <div class="col-lg-6 col-xs-12 clearfix">
                	<div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading"><?php echo WORK_INFORMATION; ?></div>
                          <!-- List group -->
                          <ul class="list-group">
                            <li class="list-group-item"><?php echo ADDRESS; ?> : <?php echo SecureShowData($work_address1); ?></li>
                            <li class="list-group-item"><?php echo ADDRESS2; ?> : <?php echo SecureShowData($work_address2); ?></li>
                            <li class="list-group-item"><?php echo CITY; ?> : <?php echo SecureShowData($work_city); ?></li>
                            <li class="list-group-item"><?php echo STATE; ?> : <?php echo SecureShowData($work_state); ?></li>
                            <li class="list-group-item"><?php echo COUNTRY; ?> : <?php echo SecureShowData($work_country); ?></li>
                            <li class="list-group-item"><?php echo ZIP ?> / <?php echo POSTAL_CODE; ?> : <?php echo SecureShowData($work_zip); ?></li>
                            <li class="list-group-item"><?php echo JOB_TITLE; ?> : <?php echo SecureShowData($work_job_title); ?></li>
                            <li class="list-group-item"><?php echo COMPANY; ?> : <?php echo SecureShowData($work_company); ?></li>
                            <li class="list-group-item"><?php echo PHONE; ?> : <?php echo SecureShowData($work_phone); ?></li>
                            <li class="list-group-item"><?php echo BLOG; ?> : <?php echo SecureShowData($work_blog); ?></li>
                            <li class="list-group-item"><?php echo WEBSITE; ?> : <?php echo SecureShowData($work_website); ?></li>
                            
                          </ul>
                        </div>
                
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-6 col-xs-12 clearfix">
                	<div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading"><?php echo OTHER_INFORMATION; ?></div>
                          <!-- List group -->
                          <ul class="list-group">
                            <li class="list-group-item"><?php echo GENDER; ?> : <?php echo SecureShowData($gender); ?></li>
                            <li class="list-group-item"><?php echo BIRTH_DATE; ?> : <?php echo SecureShowData($birth_date); ?></li>
                           
                          </ul>
                        </div>
               	 </div>
                
                <div class="col-lg-6 col-xs-12 clearfix">
                	<div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading"><?php echo PAYMENT_ACCOUNTS; ?></div>
                          <!-- List group -->
                          <ul class="list-group">
                            <li class="list-group-item"><?php echo EVENT_PAYMENT_ACCOUNT; ?> : <?php echo SecureShowData($event_pay_account); ?></li>
                            <li class="list-group-item"><?php echo REFFERAL; ?> / <?php echo AFFILIATE?> : <?php echo SecureShowData($ref_pay_account); ?></li>                            
                          </ul>
                        </div>
                
                </div>

                <div class="col-lg-6 col-xs-12 clearfix">
                  <div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading"><?php echo STRIPE_ACCOUNT; ?></div>
                          <!-- List group -->
                          <ul class="list-group">
                            <li class="list-group-item"><?php echo COMPANY_NAME; ?> : <?php echo SecureShowData($compny_name); ?></li>
                            <li class="list-group-item"><?php echo Address; ?>  : <?php echo SecureShowData($address); ?></li>    
                            <li class="list-group-item"><?php echo BANK_NAME; ?> : <?php echo SecureShowData($bank_name); ?></li>    
                            <li class="list-group-item"><?php echo BANK_IBAN_NUMBER; ?> : <?php echo SecureShowData($iban_number); ?></li>                            
                          </ul>
                        </div>
                
                </div>
            </div>
            </div>
          </div>
</body>

</html>
