

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/validation.css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.maskedinput.js"></script>
<script src="<?php echo base_url()?>js/jquery.form.js"></script>  

<script src="<?php echo base_url();?>js/swfobject.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/jquery.clippy.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/heartcode-canvasloader-min.js"></script>
<style type="text/css">
	.bimg img{
		width: 45px !important;
	}
</style>
 <script>
  $(function() {
    $( "#birth_date").datepicker({
    	endDate: "date()",
    	format: "yyyy/mm/dd",
		orientation: "top",
		autoclose: true
  	});

  	$( "#org_image" ).change(function() {
		
		var name= $( "#org_image" ).val();
		var b=name.replace("C:\\fakepath\\","");
		$('#img_name').val(b);
		var item = $(this).clone(true);

		$('#edit_profile_file').children().remove();
		$(this).prependTo('#edit_profile_file').addClass('hidden-file-field');
		$('#img_form').submit();
		$('.chks').after(item);

	});

	if ((pic = jQuery('#img_form')).length )
				
		pic.ajaxForm({
			dataType: 'json',
			beforeSend:function (){
				$('#cl_oval').show();
			},
			success: function(data){
				  	 
			  	 if(data.msg.error){
			  	 	$("#jsonsuccess").hide();
			  	 	$("#jsonerror").show();
			  	 	$("#jsonerror").html(data.msg.error);
            		$('html, body').animate({
              			scrollTop: $("#jsonerror").offset().top
            		}, 200);
            		$('#img_name').val('');
            		$("#image").val('');

           			var srcs = '<?php echo base_url();?>images/bimage.png';
            		$("#org_img_show").attr('src',srcs);
			  	 }
				 if(data.msg.success){
				 	$("#jsonsuccess").show();
				  	$("#jsonerror").hide();
				  	$("#jsonsuccess").html(data.msg.success);
				  	$("#img_name").val(data.msg.img);
            		$("#image").val(data.msg.img);

				  	var srcs = '<?php echo base_url().'upload/profile/small/'?>'+data.msg.img;
				  	$("#org_img_show").attr('src',srcs);				  	
				 }
			},
			error: onError,
			complete: function(){
		 		$('#cl_oval').hide();
		 	},
		});
		
		$("#org_select").change(function() {
			var temp = $("#org_select").val();
			//document.location.href = "<?php echo site_url('profile/create_organizer')?>/"+temp;
		});
  	
  	
  });
 </script>
  
  <script>
  	$( document ).ready(function() {
			
			/**************home ******************/
		$('#home_country').change(function(){
			
			country = $('#home_country').val();
			//alert(country);
			var getStatusUrl= '<?php echo site_url('user/ajax_state_home')?>/'+country;
			$.ajax({
				url: getStatusUrl,
				dataType: 'text',
				type: 'POST',
				timeout: 99999,
				global: false,
				data: '',
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
			//alert(country1);
			var getStatusUrl= '<?php echo site_url('user/ajax_state_bill')?>/'+country1;
			$.ajax({
				url: getStatusUrl,
				dataType: 'text',
				type: 'POST',
				timeout: 99999,
				global: false,
				data: '',
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
			//alert(country1);
			var getStatusUrl= '<?php echo site_url('user/ajax_state_shipp')?>/'+country1;
			$.ajax({
				url: getStatusUrl,
				dataType: 'text',
				type: 'POST',
				timeout: 99999,
				global: false,
				data: '',
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
			//alert(country1);
			var getStatusUrl= '<?php echo site_url('user/ajax_state_work')?>/'+country1;
			$.ajax({
				url: getStatusUrl,
				dataType: 'text',
				type: 'POST',
				timeout: 99999,
				global: false,
				data: '',
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
				},
				home_phone: {
					required: true,	
								
				},
				cell_phone: {
					digits: true,		
				}		
			},
			messages: {
			
				first_name: {
					required: "<?php echo FIRST_NAME_IS_REQUIRED;?>",
				},
				
				last_name: {
					required: '<?php echo LAST_NAME_IS_REQUIRED; ?>',
					
				},
				
				home_phone: {
					required: '<?php echo LAST_NAME_IS_REQUIRED; ?>',
				},
				
				cell_phone: {
					digits:'Enter valid phone number.'
				},
			},
		});
		
	});
	
  </script>
   <script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);            
            return ret;
        }
    </script>
  <?php 
  if($birth_date=='0000-00-00') { 
    $birth_date='';
  }
  ?>
  
  <section class="eventDash-head">
  	<div class="container">
    	<div class="row">              
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 test-contct test-cntr">
                <h1><?php echo MY_ACCOUNT; ?></h1>
          </div>
         
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right pt mt10 con-cntr">
        
             <div class="halfacc"><!--code change by darshan start-->
             <p><?php echo SecureShowData($site_setting['site_name']); ?> <?php echo ACCOUNT_SINCE; ?> <span><?php echo datetimeformat($user_info[0]['created_at']);?> <?php echo timeFormat($user_info[0]['created_at']); ?></span></p>
            <?php 

            if($user_info[0]['ref_id']){
            	$admin=getRecordById('users','id',$user_info[0]['ref_id']);

            	?><p><?php echo THE_MAIN_ACCOUNT_HOLDER_IS;?> <span><?php echo $admin['email'] ;?></span></p>
            <?php } ?>
            <!--code change by darshan end-->
            </div>
          </div>
        
      </div>
    </div>
  </section>
  
    <section>  
            <div class="container marTB50">
             
                
                <div class="clearfix"></div>
           		<?php if($this->session->flashdata('errorMsg')) { ?>
	                <div class="alert alert-danger mar10" id="errorMsg"><?php echo $this->session->flashdata('errorMsg'); ?></div>
	                <script type="text/javascript">
	                  $(document).ready(function() {
	                      setTimeout(function() {
	                        $('#errorMsg').slideUp("slow");
	                      }, 5000);
	                  })
	                </script>
				<?php } ?>

                 <?php if($msg!=''){
                        			?>
                        <div class="alert alert-success mar10"><?php echo $msg; ?></div>
               <?php 	
                     }?>
                     <?php if($error!=''){ ?>
                        <div class="alert alert-danger mar10"><?php echo $error; ?></div>
               <?php 	
                     }?>
                     
                 <div class="alert alert-success mar10" id="jsonsuccess" style="display:none"></div>
                 <div class="alert alert-danger mar10" id="jsonerror" style="display:none"></div>                
               
              <div class="row">
                
                <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12 mb">
                
                <div class="row">    
                            
                <div class="event-webpage col-xs-12 col-sm-12">
                	<div class="red-event width100 "><h4><?php echo YOUR_ACCOUNT_EMAIL_ADDRESS; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
			
                <div class="col-sm-12 clearfix mb ">
                    <div class="event-detail event-detail2 pt pb40">
                    
                        <div class="col-sm-6 url center-sm">
                        	<p class="p0"><?php echo $user_info[0]['email'];?></p>
                        </div>
                             
                        
                        <div class="col-sm-6 ">
                        	<div class="change center-sm">
                            </div>
                        </div>
                 	 </div><!-- end event-detail -->
               </div>      
                
              </div><!-- End Row-->         
                      
                      <form name="img_form" id="img_form"	action="<?php echo site_url('user/profile_img_upload');  ?>" method="post" enctype="multipart/form-data">
					    	<div class="input-item-file" id="edit_profile_file"  style="display:none">
					        
					  		</div>
					    </form> 
                
            <form name="account_form" id="account_form" class="event-title"  method="post" action="<?php echo site_url('user/my_account');?>">
                
            <div class="row">    
                        
            <div class="event-webpage col-xs-12 col-sm-12">
                <div class="red-event width100 "><h4><?php echo CONTACT_INFORMATION; ?></h4></div>
                <div class="clear"></div>
            </div><!-- End event-webpage -->
            
        
            <div class="col-sm-12 clearfix mb">
                <div class="event-detail event-detail2 pt">
                	
                   
                    	
                        <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo PREFIX; ?></label>
                            	</div>
                            	<div class="col-sm-4 col-xs-12">
                            		<input type="text" name="prefix" id="prefix" value="<?php echo SecureShowData($prefix);?>">
                            	</div>
                        </div>

                        <div class="form-group clearfix ">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo PROFILE_IMAGE;?></label>
                            	</div>
                                
                                <div class="col-sm-9 p0">
                                
                                <div class="col-sm-1 col-xs-2 bimg">
                                	<?php  if($image){ ?>
                                		<img id="org_img_show" src="<?php echo base_url().'upload/profile/small/'.$image;?>" alt=" " height=" " width=" ">
                                	<?php }else{ ?>
                                		<img id="org_img_show" src="<?php echo base_url();?>images/bimage.png" alt=" " height=" " width=" ">
                                	<?php } ?>
                                	
                                </div>
                            	<div class="col-sm-8 col-xs-10 m10 pl25">
                            		<input readonly="readonly" type="text" name="img_name" id="img_name" value="<?php echo $image;?>" >	
                            	</div>
                                
                                <div class="col-sm-3 col-xs-12 clearfix browse1">
                                	<div class="upload">
                                   		 <a href="javascript://" class="btn btn-event chks"><?php echo Browse;?></a>
                                		 <input readonly="readonly" type="file" name="org_image" id="org_image" class="uploads" accept="image/*">
                                    </div>
                                </div>
                               
                                 <div id='cl_oval' class="loader" style="margin-left:-5px; display:none;">
                                                <script>
                                                    var cl1 = new CanvasLoader("cl_oval", {id: "canvasLoader", safeVML: true});
                                                    cl1.setShape("oval");
                                                    cl1.setDiameter(50);
                                                    cl1.setDensity(80);
                                                    cl1.setSpeed(3);
                                                    cl1.setFPS(36);
                                                    cl1.setFPS(12);
                                                    cl1.setRange(0.95);
                                                    cl1.show();
                                                </script>	
                                 </div>  
                                
                                <div class="col-sm-8 col-xs-12">
                                	<p class="fromText"><?php echo imagen_message_2MB;?></p>
                                </div>
                                </div>
                        	</div>
                        
                        <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo FIRST_NAME; ?></label><span>*</span>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                            		<input type="text" name="first_name" id="first_name" value="<?php echo SecureShowData($first_name);?>">
                            	</div>
                        </div>
                        
                        <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo LAST_NAME; ?></label><span>*</span>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                            		<input type="text" name="last_name" id="last_name" value="<?php echo SecureShowData($last_name);?>">
                            	</div>
                        </div>
                        
                        <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo SUFFIX; ?></label>
                            	</div>
                            	<div class="col-sm-4 col-xs-12">
                            		<input type="text" name="suffix" id="suffix" value="<?php echo SecureShowData($suffix);?>">
                            	</div>
                        </div>
                        
                        <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo HOME_PHONE; ?></label><span>*</span>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                            		<input type="text" name="home_phone" id="home_phone" value="<?php echo $home_phone;?>">
                            	</div>
                        </div>
                        
                        <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo CELL_PHONE; ?></label><span>*</span>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                            		<input type="text" name="cell_phone" id="cell_phone" value="<?php echo $cell_phone;?>">
                            	</div>
                        </div>
                        
                        <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo GENDER; ?></label>
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
                            		<label><?php echo BIRTH_DATE; ?></label>
                            	</div>
                            	<div class="col-sm-4 col-xs-12">
                            		<input type="text" name="birth_date" id="birth_date" value="<?php echo $birth_date;?>" readonly="readonly">
                            	</div>
                        </div>
                    	
                    
                    
                 </div><!-- end event-detail -->
           	</div>      
                
              </div><!-- End Row-->
              
              <!-- 3rd part-->
              <div class="row">    
                            
                <div class="event-webpage col-xs-12 col-sm-12">
                	<div class="red-event width100 "><h4><?php echo ADDRESS; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
			
                <div class="col-sm-12 clearfix">
                    <div class="tab my-event mb">
                    
                    	<ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
                    	
                          <li class="active"><a href="#home" data-toggle="tab"><?php echo HOME_ADDRESS; ?></a></li>
                          <li><a href="#bill" data-toggle="tab"><?php echo BILLING_ADDRESS; ?></a></li>
                          <li><a href="#shipp" data-toggle="tab"><?php echo SHIPPING_ADDRESS; ?></a></li>
                          <li><a href="#work" data-toggle="tab"><?php echo Working_Address; ?></a></li>
                    </ul>
                    
                    <div class="tab-content responsive hidden-sm hidden-xs">
                        
                        	<div class="tab-pane fade in active" id="home">
                                
                              
                                
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS; ?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                           <input type="text" name="home_add1" id="home_add1" value="<?php echo SecureShowData($home_add1);?>">
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS; ?>2</label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="home_add2" id="home_add2" value="<?php echo SecureShowData($home_add2);?>">
                                            
                                        </div>
                                    </div>
                    				
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo COUNTRY; ?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <select class="select-pad" name="home_country" id="home_country">
                                            	 <option value="">-- <?php echo SELECT_COUNTRY; ?> --</option>
                                            	
                                            <?php 
                                            	if($country){
                                            		foreach($country as $countryh){
                                            			
														$country_name = $countryh['country_name'];
														$country_id = $countryh['id'];
														
														if($country_id == $home_country){
															$select='selected="selected"';
														}else{
															$select='';
														}
														
														echo '<option value="'.$country_id.'" '.$select.'>'.SecureShowData($country_name).'</option>';
														
                                            		}
                                            	}
                                            ?>
                                            
                                            
                                            </select>
                                        </div>
                       				</div>
                       
                       				 <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo STATE;?></label>
                                        </div>
                                        
                                        <div class="col-sm-8 col-xs-12" id="statediv">
                                            <select class="select-pad" name="home_state" id="home_state">
                                            <option value="">-- <?php echo SELECT_STATE; ?> --</option>
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
														
														echo '<option value="'.$state_name.'" '.$select.'>'.SecureShowData($state_name).'</option>';
														
                                            		}
                                            	}
                                            ?>
										    
                                            </select>
                                        </div>
                                        
                       				</div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo CITY;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="home_city" id="home_city" value="<?php echo SecureShowData($home_city);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ZIP;?> / <?php echo POSTAL_CODE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="home_zip" id="home_zip" value="<?php echo $home_zip;?>" onkeypress="return IsNumeric(event);" maxlength="8">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo APPLY_TO;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
											
                                            <div class="checkbox">
                                              <label>
                                                <input type="checkbox" value="1" name="billchk" id="billchk" <?php if($billchk=="1"){ echo 'checked="checked"'; } ?>><?php echo BILLING_ADDRESS; ?>
                                              </label>
                                             </div> 
                                             
                                             <div class="checkbox">
                                              <label>
                                                <input type="checkbox" value="1" name="shippchk" id="shippchk" <?php if($shippchk=="1"){ echo 'checked="checked"'; } ?>><?php echo SHIPPING_ADDRESS; ?>
                                              </label>
                                             </div> 
                                             
                                             <div class="checkbox">
                                              <label>
                                                <input type="checkbox" value="1" name="workchk" id="workchk" <?php if($workchk=="1"){ echo 'checked="checked"'; } ?>><?php echo Working_Address; ?>
                                              </label>
                                             </div> 
                                             
                                    	</div>                                       
                                    </div>
                    	
                   				
                            	
                            </div><!-- End tab-pane id=home -->
                            
                            
                            <div class="tab-pane fade" id="bill">
                            	
                                
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="bill_add1" id="bill_add1" value="<?php echo SecureShowData($bill_add1);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS;?>2</label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="bill_add2" id="bill_add2" value="<?php echo SecureShowData($bill_add2);?>">
                                        </div>
                                    </div>
                    				
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo COUNTRY;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <select class="select-pad" name="bill_country" id="bill_country">
                                            <option value="">-- <?php echo SELECT_COUNTRY; ?> --</option>
										     <?php 
                                            	if($country){
                                            		foreach($country as $countryb){
                                            			
														$country_name = $countryb['country_name'];
														$country_id = $countryb['id'];
														
														if($country_id == $bill_country){
															$select='selected="selected"';
														}else{
															$select='';
														}
														
														echo '<option value="'.$country_id.'" '.$select.'>'.SecureShowData($country_name).'</option>';
														
                                            		}
                                            	}
                                            ?>
                                            </select>
                                        </div>
                       				</div>
                       
                       				 <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite" >
                                            <label><?php echo STATE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12" id="billdiv">
                                            <select class="select-pad" name="bill_state" id="bill_state">
                                            <option value="">-- <?php echo SELECT_STATE;?> --</option>
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
														
														echo '<option value="'.$state_name.'" '.$select.'>'.SecureShowData($state_name).'</option>';
														
                                            		}
                                            	}
                                            ?>
                                            </select>
                                        </div>
                       				</div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo CITY;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="bill_city" id="bill_city" value="<?php echo SecureShowData($bill_city);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ZIP;?> / <?php echo POSTAL_CODE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="bill_zip" id="bill_zip" value="<?php echo $bill_zip;?>" onkeypress="return IsNumeric(event);" maxlength="8">
                                        </div>
                                    </div>
                            	
                          
                            </div><!-- End tab-pane id=bill -->
                            
                            <div class="tab-pane fade" id="shipp">
                            	
                                
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="ship_add1" id="ship_add1" value="<?php echo SecureShowData($ship_add1);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS;?>2</label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                           <input type="text" name="ship_add2" id="ship_add2" value="<?php echo SecureShowData($ship_add2);?>">
                                        </div>
                                    </div>
                    				
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo COUNTRY;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12" >
                                            <script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);            
            return ret;
        }
    </script><select class="select-pad" name="ship_country" id="ship_country">
                                            <option value="">-- <?php echo SELECT_COUNTRY;?> --</option>
										    <?php 
                                            	if($country){
                                            		foreach($country as $countrys){
                                            			
														$country_name = $countrys['country_name'];
														$country_id = $countrys['id'];
														
														if($country_id == $ship_country){
															$select='selected="selected"';
														}else{
															$select='';
														}
														
														echo '<option value="'.$country_id.'" '.$select.'>'.SecureShowData($country_name).'</option>';
														
                                            		}
                                            	}
                                            ?>
                                            </select>
                                        </div>
                       				</div>
                       
                       				 <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo STATE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12" id="shipdiv">
                                            <select class="select-pad"  name="ship_state" id="ship_state">
                                            <option value="">-- <?php echo SELECT_STATE;?> --</option>
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
														
														echo '<option value="'.$state_name.'" '.$select.'>'.SecureShowData($state_name).'</option>';
														
                                            		}
                                            	}
                                            ?>
                                            </select>
                                        </div>
                       				</div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo CITY;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="ship_city" id="ship_city" value="<?php echo SecureShowData($ship_city);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ZIP;?> / <?php echo POSTAL_CODE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="ship_zip" id="ship_zip" value="<?php echo $ship_zip;?>" onkeypress="return IsNumeric(event);" maxlength="8">
                                        </div>
                                    </div>
                            
                            
                            </div><!-- End tab-pane id=shipp -->
                            
                            <div class="tab-pane fade" id="work">
                            	
                                
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="work_add1" id="work_add1" value="<?php echo SecureShowData($work_add1);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS;?>2</label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                           <input type="text" name="work_add2" id="work_add2" value="<?php echo SecureShowData($work_add2);?>">
                                        </div>
                                    </div>
                    				
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo COUNTRY;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <select class="select-pad" name="work_country" id="work_country">
                                            <option value="">-- <?php echo SELECT_COUNTRY;?> --</option>
										    <?php 
                                            	if($country){
                                            		foreach($country as $countryw){
                                            			
														$country_name = $countryw['country_name'];
														$country_id = $countryw['id'];
														
														if($country_id == $work_country){
															$select='selected="selected"';
														}else{
															$select='';
														}
														
														echo '<option value="'.$country_id.'" '.$select.'>'.SecureShowData($country_name).'</option>';
														
                                            		}
                                            	}
                                            ?>
                                            </select>
                                        </div>
                       				</div>
                       
                       				 <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo STATE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12" id="workdiv">
                                            <select class="select-pad" name="work_state" id="work_state">
                                            <option value="">-- <?php echo SELECT_STATE;?> --</option>
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
														
														echo '<option value="'.$state_name.'" '.$select.'>'.SecureShowData($state_name).'</option>';
														
                                            		}
                                            	}
                                            ?>
                                            </select>
                                        </div>
                       				</div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo CITY;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                           <input type="text" name="work_city" id="work_city" value="<?php echo SecureShowData($work_city);?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ZIP;?> / <?php echo POSTAL_CODE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="work_zip" id="work_zip" value="<?php echo $work_zip;?>" onkeypress="return IsNumeric(event);" maxlength="8">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo PHONE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                           <input type="text" name="work_phone" id="work_phone" value="<?php echo $work_phone;?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo BLOG;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="work_blog" id="work_blog" value="<?php echo $work_blog;?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo WEBSITE;?></label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="work_website" id="work_website" value="<?php echo $work_website;?>">
                                        </div>
                                    </div>
                                    
                           
                            </div><!-- End tab-pane id=work -->
                            	
                            
                            
                    </div><!-- End tab-content  -->
                    
                 	 </div><!-- end event-detail -->
               </div>      
                
              </div><!-- End Row-->                  
                             
              	<div class="text-right">
              		<input type="hidden" value="<?php echo $image;?>" name="image" id="image" class="btn-event"/>
                    <input type="submit" value="<?php echo SAVE;?>" class="btn-event2" />
                </div>
                
            </form>
                             
           </div><!-- End col-sm-8 -->          
                    
                 
             
                
                <!-- RIGHT CONTENT -->
                <?php echo $this->load->view('default/common/account_sidebar');?>
             </div>
                
            </div><!-- End container -->
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