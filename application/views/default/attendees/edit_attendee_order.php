<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/validation.css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.maskedinput.js"></script>
<script src="<?php echo base_url()?>js/jquery.form.js"></script>  
 <script>
  $(function() {
    $( "#birth_date").datepicker({
      endDate: "date()",
      format: "yyyy/mm/dd",
    orientation: "top",
    autoclose: true
    });
    
  });
 </script>
  
  <script>
    $( document ).ready(function() {
    $("#change_email_form").hide();
    
    $( "#change_email_btn").click(function() {
        $("#change_email_form").show();
        $("#change_email_btn").hide();
    });
    
    $( "#change_email_cancel").click(function() {
        $("#change_email_form").hide();
        $("#change_email_btn").show();
        $("#email").val('');
        $("#password").val('');
    });
    
    $( "#change_email").click(function() {
      
      var email = $("#email").val();
      var password = $("#password").val();
      if(email==''){
        
        $('#email').closest('.form-group').addClass('has-error');
        $('#email').closest('label').addClass('control-label');
        $('#email').addClass('form-control');
        return false; 
      }
      if(password==''){
        
        $('#password').closest('.form-group').addClass('has-error');
        $('#password').closest('label').addClass('control-label');
        $('#password').addClass('form-control');
        return false; 
      }
      
        $("#change_email_form").submit();
    });
        
      if ((pic = jQuery('#change_email_form')).length )
        
      pic.ajaxForm({
        dataType: 'json',
        beforeSend:function (){
          
        },
        success: function(data){
             
             if(data.error){
              $("#jsonsuccess").hide();
              $("#jsonerror").show();
              $("#jsonerror").html(data.error);
             }
             if(data.msg){
              $("#jsonsuccess").show();
              $("#jsonerror").hide();
              $("#jsonsuccess").html(data.msg);
             }
        },
        error: onError,
        complete: function(){
        
        },
      });
      
        /**************home ******************/
    $('#home_country').change(function(){
      
      country = $('#home_country').val();

      var getStatusUrl= '<?php echo site_url('attendees/ajax_state_home')?>/'+country;
      $.ajax({
        url: getStatusUrl,
        dataType: 'text',
        type: 'POST',
        timeout: 99999,
        global: false,
        data: '[]',
        success: function(data)
        {
          $('#statediv').html(data);
        },    
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
        
        }
      });
    }); 
    /******************* home_end ***********************/
    
    /****************** bill *************************/ 
    
    $('#bill_country').change(function(){
      
      country1 = $('#bill_country').val();

      var getStatusUrl= '<?php echo site_url('attendees/ajax_state_bill')?>/'+country1;
      $.ajax({
        url: getStatusUrl,
        dataType: 'text',
        type: 'POST',
        timeout: 99999,
        global: false,
        data: '[]',
        success: function(data)
        {
          $('#billdiv').html(data);
        },    
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
        
        }
      });
    }); 
    
    /*********** bill_end  ************/
    
    /****************** shipp *************************/ 
    
    $('#ship_country').change(function(){
      
      country1 = $('#ship_country').val();

      var getStatusUrl= '<?php echo site_url('attendees/ajax_state_shipp')?>/'+country1;
      $.ajax({
        url: getStatusUrl,
        dataType: 'text',
        type: 'POST',
        timeout: 99999,
        global: false,
        data: '[]',
        success: function(data)
        {
          $('#shipdiv').html(data);
        },    
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
        
        }
      });
    }); 
    
    /*********** shipp_end  ************/
    
    /****************** working_address *************************/ 
    
    $('#work_country').change(function(){
      
      country1 = $('#work_country').val();

      var getStatusUrl= '<?php echo site_url('attendees/ajax_state_work')?>/'+country1;
      $.ajax({
        url: getStatusUrl,
        dataType: 'text',
        type: 'POST',
        timeout: 99999,
        global: false,
        data: '[]',
        success: function(data)
        {
          $('#workdiv').html(data);
        },    
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
        
        }
      });
    }); 
    
    /*********** working_address  ************/


    });
  
  
  jQuery(function($){   
    var validator = $("#account_form").validate({
      rules: {
        first_name: {
          required: true, 
        },
        last_name: {
          required: true,       
        }
      },
      messages: {
      
        first_name: {
          required: "<?php echo "FIRST_NAME_IS_REQUIRED";?>",
        },
        
        last_name: {
          required: '<?php echo "LAST_NAME_IS_REQUIRED";?>',
          
        }
      },
    });
    
  });
  
  </script>
  
    <section> 
    <?php
  
    $data1['events_id']=$event_id;

    $first_name = $single_attendee[0]['first_name'];
    $last_name = $single_attendee[0]['last_name'];
    $email = $single_attendee[0]['email'];
    $suffix = $single_attendee[0]['suffix'];
    $prefix = $single_attendee[0]['prefix'];
  
    $cell_phone = $single_attendee[0]['cell_phone'];
    
    $home_phone = $single_attendee[0]['home_phone'];
    $gender = $single_attendee[0]['gender'];
    $home_add1 = $single_attendee[0]['home_add1'];
    $home_add2 = $single_attendee[0]['home_add2'];
    $home_city = $single_attendee[0]['home_city'];
    $home_zip = $single_attendee[0]['home_zip'];
    $home_state = $single_attendee[0]['home_state'];
    $home_country = $single_attendee[0]['home_country'];
    
    
    $bill_city = $single_attendee[0]['bill_city'];
    $bill_state = $single_attendee[0]['bill_state'];
    $bill_zip = $single_attendee[0]['bill_zip'];
    $bill_add1 = $single_attendee[0]['bill_add1'];
    $bill_add2 = $single_attendee[0]['bill_add2'];
    
    $bill_country = $single_attendee[0]['bill_country'];
    
    $ship_city = $single_attendee[0]['ship_city'];
    $ship_state = $single_attendee[0]['ship_state'];
    $ship_zip = $single_attendee[0]['ship_zip'];
    $ship_country = $single_attendee[0]['ship_country'];
    $ship_add1 = $single_attendee[0]['ship_add1'];
    $ship_add2 = $single_attendee[0]['ship_add2'];
    
    $work_job_title = $single_attendee[0]['work_job_title'];
    $work_company = $single_attendee[0]['work_company'];
    $work_add1 = $single_attendee[0]['work_add1'];
    $work_add2 = $single_attendee[0]['work_add2'];
    $work_city = $single_attendee[0]['work_city'];
    $work_state = $single_attendee[0]['work_state'];
    $work_country = $single_attendee[0]['work_country'];
    $work_zip = $single_attendee[0]['work_zip'];
    $work_phone = $single_attendee[0]['work_phone'];
    $work_blog = $single_attendee[0]['work_blog'];
    $work_website = $single_attendee[0]['work_website'];
    
    $birth_date = $single_attendee[0]['birth_date'];
  ?> 
            <div class="container marTB50">
 
                <div class="clearfix"></div>
                 <?php if($success!=''){
                              ?>
                        <div class="alert alert-success mar10"><?php echo $success; ?></div>
               <?php  
                     }?>
                    <?php if($error!=''){
                              ?>
                        <div class="alert alert-error mar10"><?php echo $error; ?></div>
               <?php  
                     }?>
                      
                 <div class="alert alert-success mar10" id="jsonsuccess" style="display:none"></div>
                 <div class="alert alert-danger mar10" id="jsonerror" style="display:none"></div>

                <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12 mb">
                
                
               
                
          <form name="account_form" id="account_form" class="event-title"  method="post" action="<?php echo site_url('attendees/edit_attendee_order/'.$event_id.'/'.$purchase_id);?>" style="margin-bottom:0px;">
                
            <div class="row">    
                        
            <div class="event-webpage col-xs-12 col-sm-12">
                <div class="red-event width100 "><h4><?php echo CONTACT_INFORMATION;?></h4></div>
                <div class="clear"></div>
            </div><!-- End event-webpage -->
            
        
            <div class="col-sm-12 clearfix mb">
                <div class="event-detail event-detail2 pt pb">

                        <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo Prefix;?></label>
                              </div>
                              <div class="col-sm-4 col-xs-12">
                                <input type="text" name="prefix" id="prefix" value="<?php echo $prefix;?>">
                              </div>
                        </div>
                        
                        <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo First_Name;?></label><span>*</span>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" name="first_name" id="first_name" value="<?php echo SecureShowData($first_name);?>">
                              </div>
                        </div>
                        
                        <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                               <label><?php echo Last_Name;?></label><span>*</span>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" name="last_name" id="last_name" value="<?php echo SecureShowData($last_name);?>">
                              </div>
                        </div>
                        
                        <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo Suffix;?></label>
                              </div>
                              <div class="col-sm-4 col-xs-12">
                                <input type="text" name="suffix" id="suffix" value="<?php echo SecureShowData($suffix);?>">
                              </div>
                        </div>
                        
                        <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo Home_Phone;?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="number" min='0' name="home_phone" id="home_phone" value="<?php echo SecureShowData($home_phone);?>">
                              </div>
                        </div>
                        
                        <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo Cell_Phone;?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="number" min='0' name="cell_phone" id="cell_phone" value="<?php echo $cell_phone;?>">
                              </div>
                        </div>
                        
                        <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo Gender;?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <select class="select-pad" name="gender" id="gender">
                                      <option value="Female" <?php if($gender=='Female') { echo 'selected'; } ?> >Female</option>
                                        <option value="Male" <?php if($gender=='Male') { echo 'selected'; } ?> >Male</option>
                                    </select>
                              </div>
                        </div>
                        
                        <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo Birth_Date;?></label>
                              </div>
                              <div class="col-sm-4 col-xs-12">
                                <input type="text" name="birth_date" id="birth_date" value="<?php echo $birth_date;?>">
                              </div>
                        </div>   
                    
                 </div><!-- end event-detail -->
            </div>      
                
              </div><!-- End Row-->
              
              <!-- 3rd part-->
              <div class="row">    
                            
                <div class="event-webpage col-xs-12 col-sm-12">
                 <div class="red-event width100 "><h4><?php echo Address;?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
      
                <div class="col-sm-12 clearfix">
                    <div class="tab my-event mb">
                    
                      <ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
                      
                         <li class="active"><a href="#home" data-toggle="tab"><?php echo Home_Address;?></a></li>
                          <li><a href="#bill" data-toggle="tab"><?php echo Billing_Address;?></a></li>
                          <li><a href="#shipp" data-toggle="tab"><?php echo Shipping_Address;?></a></li>
                          <li><a href="#work" data-toggle="tab"><?php echo Working_Address;?></a></li>
                    </ul>
                    
                    <div class="tab-content responsive hidden-sm hidden-xs">
                        
                          <div class="tab-pane fade in active" id="home">
                                   
                                     <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Address;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                           <input type="text" name="home_add1" id="home_add1" value="<?php echo SecureShowData($home_add1);?>">
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS2;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="home_add2" id="home_add2" value="<?php echo SecureShowData($home_add2);?>">
                                            
                                        </div>
                                    </div>
                            
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Country;?></label>
                                            </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <select class="select-pad" name="home_country" id="home_country">
                                               <option value="">-- <?php echo Select_Country;?> --</option>
                                              
                                            <?php 

                                              if($country){
                                                foreach($country as $countryh){
                                                  
                                                  $country_name = $countryh['country_name'];
                                                  $country_id = $countryh['id'];
                                                 
                                                  if($country_name == $home_country){
                                                    $select='selected="selected"';
                                                  }else{
                                                    $select='';
                                                 }
                            
                                         echo '<option value="'.SecureShowData($country_name).'" '.$select.'>'.SecureShowData($country_name).'</option>';
                            
                                                }
                                              }
                                            ?>
                                            
                                            
                                            </select>
                                        </div>
                              </div>
                       
                               <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                           <label><?php echo State;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12" id="statediv">
                                            <select class="select-pad" name="home_state" id="home_state">
                                            <option value="">-- <?php echo Select_State;?> --</option>
                                             <?php 
                                              if($state){
                                                foreach($state as $stateh){
                                                  
                                                      $state_name = $stateh['state_name'];
                                                      $state_id = $stateh['id'];
                                                      
                                                      if($state_name == $home_state){
                                                        $select='selected="selected"';
                                                      }else{
                                                        $select='';
                                                      }
                                                      
                                                      echo '<option value="'.SecureShowData($state_name).'" '.$select.'>'.SecureShowData($state_name).'</option>';
                            
                                                }
                                              }
                                            ?>
                        
                                            </select>
                                        </div>
                              </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                           <label><?php echo City;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="home_city" id="home_city" value="<?php echo SecureShowData($home_city);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ZIP_POSTAL_CODE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="home_zip" id="home_zip" value="<?php echo SecureShowData($home_zip);?>">
                                        </div>
                                    </div>
                              
                            </div><!-- End tab-pane id=home -->
                            
                            
                            <div class="tab-pane fade" id="bill">
                              
                                
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Address;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="bill_add1" id="bill_add1" value="<?php echo SecureShowData($bill_add1);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS2;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="bill_add2" id="bill_add2" value="<?php echo SecureShowData($bill_add2);?>">
                                        </div>
                                    </div>
                            
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Country;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <select class="select-pad" name="bill_country" id="bill_country">
                                            <option value="">-- <?php echo Select_Country;?> --</option>
                         <?php 
                                              if($country){
                                                foreach($country as $countryb){
                                                  
                                                    $country_name = $countryb['country_name'];
                                                    $country_id = $countryb['id'];
                                                    
                                                    if($country_name == $bill_country){
                                                      $select='selected="selected"';
                                                    }else{
                                                      $select='';
                                                    }
                                                    
                                                    echo '<option value="'.SecureShowData($country_name).'" '.$select.'>'.SecureShowData($country_name).'</option>';
                            
                                                }
                                              }
                                            ?>
                                            </select>
                                        </div>
                              </div>
                       
                               <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo State;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12" id="billdiv">
                                            <select class="select-pad" name="bill_state" id="bill_state">
                                            <option value="">-- <?php echo Select_State;?> --</option>
                         <?php 
                                              if($state){
                                                foreach($state as $stateb){
                                                  
                                                      $state_name = $stateb['state_name'];
                                                      $state_id = $stateb['id'];
                                                      
                                                      if($state_name == $bill_state){
                                                        $select='selected="selected"';
                                                      }else{
                                                        $select='';
                                                      }
                                                      
                                                      echo '<option value="'.SecureShowData($state_name).'" '.$select.'>'.SecureShowData($state_name).'</option>';
                            
                                                }
                                              }
                                            ?>
                                            </select>
                                        </div>
                              </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo City;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="bill_city" id="bill_city" value="<?php echo SecureShowData($bill_city);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ZIP_POSTAL_CODE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="bill_zip" id="bill_zip" value="<?php echo SecureShowData($bill_zip);?>">
                                        </div>
                                    </div>
                              
                          
                            </div><!-- End tab-pane id=bill -->
                            
                            <div class="tab-pane fade" id="shipp">
                              
                                
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Address;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="ship_add1" id="ship_add1" value="<?php echo SecureShowData($ship_add1);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS2;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                           <input type="text" name="ship_add2" id="ship_add2" value="<?php echo SecureShowData($ship_add2);?>">
                                        </div>
                                    </div>
                            
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Country;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <select class="select-pad" name="ship_country" id="ship_country">
                                            <option value="">-- <?php echo Select_Country;?> --</option>
                        <?php 
                                              if($country){
                                                foreach($country as $countrys){
                                                  
                                                    $country_name = $countrys['country_name'];
                                                    $country_id = $countrys['id'];
                                                    
                                                    if($country_name == $ship_country){
                                                      $select='selected="selected"';
                                                    }else{
                                                      $select='';
                                                    }
                                                    
                                                    echo '<option value="'.SecureShowData($country_name).'" '.$select.'>'.SecureShowData($country_name).'</option>';
                            
                                                }
                                              }
                                            ?>
                                            </select>
                                        </div>
                              </div>
                       
                               <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo State;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12"id="shipdiv">
                                            <select class="select-pad"  name="ship_state" id="ship_state">
                                            <option value="">-- <?php echo Select_State;?> --</option>
                        <?php 
                                              if($state){
                                                foreach($state as $states){
                                                  
                                                    $state_name = $states['state_name'];
                                                    $state_id = $states['id'];
                                                    
                                                    if($state_name == $ship_state){
                                                      $select='selected="selected"';
                                                    }else{
                                                      $select='';
                                                    }
                                                    
                                                    echo '<option value="'.SecureShowData($state_name).'" '.$select.'>'.SecureShowData($state_name).'</option>';
                            
                                                }
                                              }
                                            ?>
                                            </select>
                                        </div>
                              </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo City;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="ship_city" id="ship_city" value="<?php echo SecureShowData($ship_city);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ZIP_POSTAL_CODE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="ship_zip" id="ship_zip" value="<?php echo SecureShowData($ship_zip);?>">
                                        </div>
                                    </div>
                            
                            
                            </div><!-- End tab-pane id=shipp -->
                            
                            <div class="tab-pane fade" id="work">
                              
                                
                                  <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Job_Title;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="work_add1" id="work_add1" value="<?php echo SecureShowData($work_job_title);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Company?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="work_add1" id="work_add1" value="<?php echo SecureShowData($work_company);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Address;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="work_add1" id="work_add1" value="<?php echo SecureShowData($work_add1);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS2;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                           <input type="text" name="work_add2" id="work_add2" value="<?php echo SecureShowData($work_add2);?>">
                                        </div>
                                    </div>
                            
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Country;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <select class="select-pad" name="work_country" id="work_country">
                                            <option value="">-- <?php echo Select_Country;?> --</option>
                        <?php 
                                              if($country){
                                                foreach($country as $countryw){
                                                  
                            $country_name = $countryw['country_name'];
                            $country_id = $countryw['id'];
                            
                            if($country_name == $work_country){
                              $select='selected="selected"';
                            }else{
                              $select='';
                            }
                            
                            echo '<option value="'.SecureShowData($country_name).'" '.$select.'>'.SecureShowData($country_name).'</option>';
                            
                                                }
                                              }
                                            ?>
                                            </select>
                                        </div>
                              </div>
                       
                               <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo State;?></label>
                                        </div>

                                        <div class="col-sm-8 col-xs-12" id="workdiv">
                                            <select class="select-pad" name="work_state" id="work_state">
                                            <option value="">-- <?php echo Select_State;?> --</option>
                         <?php 
                                              if($state){
                                                foreach($state as $statew){
                                                  
                            $state_name = $statew['state_name'];
                            $state_id = $statew['id'];
                            
                            if($state_name == $work_state){
                              $select='selected="selected"';
                            }else{
                              $select='';
                            }
                            
                            echo '<option value="'.SecureShowData($state_name).'" '.$select.'>'.SecureShowData($state_name).'</option>';
                            
                                                }
                                              }
                                            ?>
                                            </select>
                                        </div>
                              </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo City;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                           <input type="text" name="work_city" id="work_city" value="<?php echo SecureShowData($work_city);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ZIP_POSTAL_CODE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="work_zip" id="work_zip" value="<?php echo SecureShowData($work_zip);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo PHONE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                           <input type="text" name="work_phone" id="work_phone" value="<?php echo SecureShowData($work_phone);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Blog;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="work_blog" id="work_blog" value="<?php echo SecureShowData($work_blog);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Website;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="work_website" id="work_website" value="<?php echo SecureShowData($work_website);?>">
                                        </div>
                                    </div>
                                    
                           
                            </div><!-- End tab-pane id=work -->
                              
                            
                            
                    </div><!-- End tab-content  -->
                    
                   </div><!-- end event-detail -->
               </div>      
                
              </div><!-- End Row-->                  
                             
                <div class="text-right">
                    
                            <input type="submit" value="Save" class="btn-event2" />
                       
                </div>
                
            </form>
                             
           </div><!-- End col-sm-8 -->          
                    
                 
             
                
                <!-- RIGHT CONTENT -->
                <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
             
                
            </div><!-- End container -->
            <div class="pb"></div>
    </section>
    
    <!-- Start footer -->
    
     <script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
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
      } );

      ( function( $ ) {
          // Test for making sure event are maintained
          $( '.js-alert-test' ).click( function () {
            alert( 'Button Clicked: Event was maintained' );
          } );
          fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
      } )( jQuery );

    </script>
    <script>
        $(document).ready(function(){
        $(".edit").tooltip();
  });
  </script>
    
    <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#datepicker1').datepicker({
                    format: "dd/mm/yyyy",
          orientation: 'top'
                });
        
            });
            
        </script>