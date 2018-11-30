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
                    required: "<?php echo FIRST_NAME_IS_REQUIRED;?>",
                },
                
                last_name: {
                    required: '<?php echo LAST_NAME_IS_REQUIRED;?>',
                    
                }
				
			},
		});
		
	});
	
  </script>
  
    <section> 
    <?php
	
		$data1['events_id']=$event_id;
		
		$total = $single_attendee[0]['total'];

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
                
                      
                 <div class="alert alert-success mar10" id="jsonsuccess" style="display:none"></div>
                 <div class="alert alert-danger mar10" id="jsonerror" style="display:none"></div>
           
                <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12">
                
                <div class="row">    
       
              </div><!-- End Row-->         
                      
                
            <form class="event-title">
                
            <div class="row">    
                        
            <div class="event-webpage col-xs-12 col-sm-12">
                <div class="red-event width100 "><h4><?php echo CONTACT_INFORMATION;?></h4></div>
                <div class="clear"></div>
            </div>
            
        
            <div class="col-sm-12 clearfix mb">
                <div class="event-detail event-detail2 pt pb">
                	
                  	
                        <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                                    <label><?php echo Prefix;?></label>
                                </div>
                            	<div class="col-sm-4 col-xs-12">
                                <label><?php echo $prefix;?></label>
                            	
                            	</div>
                        </div>
                        
                        <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                                    <label><?php echo First_Name;?></label><span>*</span>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                <label><?php echo SecureShowData($first_name);?></label>
                                    
                                </div>
                        </div>
                        
                        <div class="form-group clearfix">
                                <div class="col-sm-3 col-xs-12 lable-rite">
                                    <label><?php echo Last_Name;?></label><span>*</span>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                     <label><?php echo SecureShowData($last_name);?></label>
                                </div>
                        </div>
                        
                        <div class="form-group clearfix">
                                <div class="col-sm-3 col-xs-12 lable-rite">
                                    <label><?php echo Email_Address;?></label><span>*</span>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                     <label><?php echo SecureShowData($email);?></label>
                                </div>
                        </div>
                        
                        <div class="form-group clearfix">
                                <div class="col-sm-3 col-xs-12 lable-rite">
                                    <label><?php echo Suffix;?></label>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                     <label><?php echo SecureShowData($suffix);?></label>
                                </div>
                        </div>
                        
                        <div class="form-group clearfix">
                                <div class="col-sm-3 col-xs-12 lable-rite">
                                    <label><?php echo Home_Phone;?></label>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                     <label><?php echo $home_phone;?></label>
                                </div>
                        </div>
                        
                        <div class="form-group clearfix">
                                <div class="col-sm-3 col-xs-12 lable-rite">
                                    <label><?php echo Cell_Phone;?></label>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                     <label><?php echo $cell_phone;?></label>
                                </div>
                        </div>
                        
                        <div class="form-group clearfix">
                                <div class="col-sm-3 col-xs-12 lable-rite">
                                    <label><?php echo Gender;?></label>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                     <label><?php echo $gender;?></label>
                                </div>
                        </div>
                        
                        <div class="form-group clearfix">
                                <div class="col-sm-3 col-xs-12 lable-rite">
                                    <label><?php echo Birth_Date;?></label>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                <label><?php echo $birth_date;?></label>
                                    
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
                                        <label><?php echo SecureShowData($home_add1);?></label>
                                           
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS2;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                        <label><?php echo SecureShowData($home_add2);?></label>
                                         
                                            
                                        </div>
                                    </div>
                    				
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Country;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                         <label><?php echo SecureShowData($home_country);?></label>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo State;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                         <label><?php echo SecureShowData($home_state);?></label>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo City;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                         <label><?php echo SecureShowData($home_city);?></label>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ZIP_POSTAL_CODE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                          <label><?php echo SecureShowData($home_zip);?></label>
                                            
                                        </div>
                                    </div>
                                    
                           	
                            </div><!-- End tab-pane id=home -->
                            
                            
                            <div class="tab-pane fade" id="bill">
                            	
                                
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Address;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                        <label><?php echo SecureShowData($bill_add1);?></label>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS2;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                         <label><?php echo SecureShowData($bill_add2);?></label>
                                          
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Country;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                         <label><?php echo SecureShowData($bill_country);?></label>
                                            
                                        </div>
                                    </div>
                       
                                     <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo State;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                        <label><?php echo SecureShowData($bill_state);?></label>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo City;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                         <label><?php echo SecureShowData($bill_city);?></label>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ZIP_POSTAL_CODE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                         <label><?php echo SecureShowData($bill_zip);?></label>
                                           
                                        </div>
                                    </div>
                            	
                          
                            </div><!-- End tab-pane id=bill -->
                            
                            <div class="tab-pane fade" id="shipp">
                            	
                                
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Address;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                         <label><?php echo SecureShowData($ship_add1);?></label>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS2;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                        <label><?php echo SecureShowData($ship_add2);?></label>
                                          
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Country;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                         <label><?php echo SecureShowData($ship_country);?></label>
                                           
                                        </div>
                                    </div>
                       
                                     <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo State;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                         <label><?php echo SecureShowData($ship_state);?></label>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo City;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                         <label><?php echo SecureShowData($ship_city);?></label>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ZIP_POSTAL_CODE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                         <label><?php echo SecureShowData($ship_zip);?></label>
                                            
                                        </div>
                                    </div>
                            
                            
                            </div><!-- End tab-pane id=shipp -->
                            
                            <div class="tab-pane fade" id="work">
                            	
                                
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Address;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                         <label><?php echo SecureShowData($work_add1);?></label>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS2;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                        <label><?php echo SecureShowData($work_add2);?></label>
                                          
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Country;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                        <label><?php echo SecureShowData($work_country);?></label>
                                           
                                        </div>
                                    </div>
                       
                                     <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo State;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                         <label><?php echo SecureShowData($work_state);?></label>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo City;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                         <label><?php echo SecureShowData($work_city);?></label>
                                          
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ZIP_POSTAL_CODE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                         <label><?php echo SecureShowData($work_zip);?></label>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo PHONE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                        <label><?php echo SecureShowData($work_phone);?></label>
                                          
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo BLOG;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                        <label><?php echo SecureShowData($work_blog);?></label>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Website;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                        <label><?php echo SecureShowData($work_website);?></label>
                                           
                                        </div>
                                    </div>
                                    
                           
                            </div><!-- End tab-pane id=work -->
                            	
                            
                            
                    </div><!-- End tab-content  -->
                    
                 	 </div><!-- end event-detail -->
               </div>      
                
              </div><!-- End Row-->                  
                             
              	
                
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
           
            $(document).ready(function () {
                
                $('#datepicker1').datepicker({
                    format: "dd/mm/yyyy",
					orientation: 'top'
                });
				
            });
            
    </script>