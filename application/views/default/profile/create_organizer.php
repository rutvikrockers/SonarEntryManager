<script src="<?php echo base_url()?>js/jquery.form.js"></script>  

<script src="<?php echo base_url();?>js/swfobject.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/jquery.clippy.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/heartcode-canvasloader-min.js"></script>

<script src="<?php echo base_url();?>js/redactor/redactor.js"></script>
<link href="<?php echo base_url();?>css/redactor.css" rel="stylesheet" />

<script>
	$( document ).ready(function() {

    $('#description').redactor({
          minHeight: 200,
          imageUpload: '<?php echo base_url('event/image_upload') ;?>'
    });
		var clippy_swf = "<?php echo base_url();?>js/clippy.swf";
		var html3_ = '<a href="<?php echo site_url('profile/create_organizer/'.$url);?>" target="_blank"><img src="<?php echo base_url();?>images/bl3.png" /></a>';
		$('#change_this').html('').clippy({'text': html3_, clippy_path: clippy_swf });
		
		if($("#chkwebsite").is(':checked')){
			$("#website_div").show();
		}else{
			$("#website_div").hide();
		}
		
		if($("#fbchk").is(':checked')){
			$("#fb_div").show();
		}else{
			$("#fb_div").hide();
		}
		
		if($("#twitterchk").is(':checked')){
  			$("#twitter_div").show();
  			
  			
  		}else{
  			$("#twitter_div").hide();
  			
  		}
  		
  		if($("#tw_user").is(':checked')){
  			$("#twuser_div").show();
  		}else{
  			$("#twuser_div").hide();
  		}
  		
  		if($("#tw_query").is(':checked')){
  			//$("#twquery_div").show();
  			$("#twuser_div").show();
  		}else{
  			//$("#twquery_div").hide();
  			$("#twuser_div").hide();
  		}
  		
  		$("#tw_div").hide();
  		
  		$("#chkwebsite").click(function() {
  			if($("#chkwebsite").is(':checked')){
  				$("#website_div").show();
  			}else{
  				$("#website_div").hide();
  			}
		});
		
		$("#fbchk").click(function() {
  			if($("#fbchk").is(':checked')){
  				$("#fb_div").show();
  			}else{
  				$("#fb_div").hide();
  			}
		});	
		
		$("#twitterchk").click(function() {
  			if($("#twitterchk").is(':checked')){
  				$("#twitter_div").show();
  			}else{
  				$("#twitter_div").hide();
  			}
		});
		
		$('input:radio[name="tw_feed"]').change(function() {
  			if($("#tw_user").is(':checked')){ 
  				$("#twuser_div").show();
  				//$("#twquery_div").hide();
  			}else{ 
  				//$("#twuser_div").hide();
  				$("#twuser_div").show();
  			}
		});	
		
		$('input:radio[name="optionsRadios"]').change(function() {
			<?php 
          $site_setting = site_setting();
          $promote_small_logo = $site_setting['promot_profile_logo_small'];
          $promote_medium_logo = $site_setting['promot_profile_logo_medium'];
          $promote_large_logo = $site_setting['promot_profile_logo_large'];
      ?>
  			if($("#radio_large").is(':checked')){ 
          var html1 = '<a href="<?php echo site_url('profile/create_organizer/'.$url);?>" target="_blank"><img src="<?php echo base_url().'images/'.$promote_large_logo; ?>" /></a>';
          $("#change_me").html(html1);
          $("#promote_logo").attr('src', "<?php echo base_url().'images/'.$promote_large_logo; ?>");
          
          
        $('#change_this').html('').clippy({'text': html1, clippy_path: clippy_swf });
        }
        if($("#radio_small").is(':checked')){ 
          var html2 = '<a href="<?php echo site_url('profile/create_organizer/'.$url);?>" target="_blank"><img src="<?php echo base_url().'images/'.$promote_small_logo; ?>" /></a>';
          $("#change_me").html(html2);
          $("#promote_logo").attr('src', "<?php echo base_url().'images/'.$promote_small_logo; ?>");

        $('#change_this').html('').clippy({'text': html2, clippy_path: clippy_swf });
        }
        if($("#radio_medium").is(':checked')){ 
          var html3 = '<a href="<?php echo site_url('profile/create_organizer/'.$url);?>" target="_blank"><img src="<?php echo base_url().'images/'.$promote_medium_logo; ?>" /></a>';
          $("#change_me").html(html3);
          $("#promote_logo").attr('src', "<?php echo base_url().'images/'.$promote_medium_logo; ?>");
          
        $('#change_this').html('').clippy({'text': html3, clippy_path: clippy_swf });
        
        }
		});	
		
		
  			/*if($("#tw_query").attr('checked', 'checked')){
  				$("#twquery_div").show();
  			}else{
  				$("#twquery_div").hide();
  			}
  			
  			if($("#tw_user").attr('checked', 'checked')){
  				$("#twuser_div").show();
  			}else{
  				$("#twuser_div").hide();
  			}*/
			
			
		$( "#org_image" ).change(function() {
			
			var name= $( "#org_image" ).val();
  			var b=name.replace("C:\\fakepath\\","");
			$('#img_name').val(b);
			var item = $(this).clone(true);
			
			$('#edit_profile_file').children().remove();
			$(this).prependTo('#edit_profile_file').addClass('hidden-file-field');
			$('#img_form').submit();
			$('.chks').after(item);
			
			//$(this).clone(true).prependTo("#picture_file_field_display").removeClass('hidden-file-field').removeAttr('id');

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
            $("#image_name").val('');//add by darshan
           var srcs = '<?php echo base_url();?>images/bimage.png';
           $("#org_img_show").attr('src',srcs);
			  	 }
				 if(data.msg.success){
				 	$("#jsonsuccess").show();
				  	$("#jsonerror").hide();
				  	$("#jsonsuccess").html(data.msg.success);
				  	$("#img_name").val(data.msg.img);
            $("#image_name").val(data.msg.img);//add by darshan
				  	var srcs = '<?php echo base_url().'upload/organizer/org_small_image/'?>'+data.msg.img;
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
			document.location.href = "<?php echo site_url('profile/create_organizer')?>/"+temp;
		});
		
		/*****copy to clipboard******/
		//var clippy_swf = "<?php echo base_url();?>js/clippy.swf";
			
		/*$('#change_me').on('change keyup paste',function()
		{
			alert($(this).val());
			$('#change_this').html('').clippy({'text': $(this).val(), clippy_path: clippy_swf });
		}).keyup();*/		
	});	
</script>
<style type="text/css">
  .expert1 {
    text-align: right;
    position: absolute;
    left: 40%;
    top: 11%;
  }
</style>
<section class="eventDash-head">
    <div class="container">
        <div class="row"> 
            <div class="col-sm-6 col-xs-12 test-contct">
               <h1><?php echo MY_ORGANIZER_PROFILE;?></h1>
            </div>
            <div class="orgProfile event-title">
            	<select class="select-pad" name="org_select" id="org_select">
                            			<option value=""><?php echo SELECT;?></option>
                            			 <?php 
                                            if($org){
                                            	foreach($org as $organizer){
                                            			
													$organizer_name = $organizer['name'];
													$organizer_url = $organizer['page_url'];
											
													if($url == $organizer_url){
														$select='selected="selected"';
													}else{
														$select='';
													}
													
													echo '<option value="'.$organizer_url.'" '.$select.'>'.SecureShowData($organizer_name).'</option>';
														
                                            	}
                                            }
                                            ?>
                                            <option value=""><?php echo ADD_NEW;?></option>
                                    </select>
            </div>
      </div>
    </div>
</section>
<section>
<?php
if($single_org){
	foreach($single_org as $orgs) {
        $name=$orgs['name'];
        $description=$orgs['description'];
        $org_logo=$orgs['org_logo'];
        $show_website=$orgs['show_website'];
        $website=$orgs['website'];
        $show_no_event=$orgs['show_no_event'];
        $display_event=$orgs['display_event'];
        $facebook_link=$orgs['facebook_link'];
        $add_facebook=$orgs['add_facebook'];
        $add_twitter=$orgs['add_twitter'];
        $twitter_link=$orgs['twitter_link'];
        $org_icon=$orgs['org_icon'];
    }

}
?>


						
						
    <form name="img_form" id="img_form"	action="<?php echo site_url('profile/profile_img_upload');  ?>" method="post" enctype="multipart/form-data">
    	<div class="input-item-file" id="edit_profile_file"  style="display:none">
        
  		</div>
    </form> 
                          
            <div class="container marTB50">
            
                
                <div class="clearfix"></div>
                
                <?php if($success){?>
                	<div class="alert alert-success message" > <?php echo $success;?></div>
                <?php } ?>
                 <?php if($error){?>
                	<div class="alert alert-danger message" ><?php echo $error;?></div>
                <?php } ?>
                
                <div class="alert alert-success message" id="jsonsuccess" style="display:none"></div>
                <div class="alert alert-danger message" id="jsonerror" style="display:none"></div>
                 
                
                          	
            	
                <form name="org_form" id="org_form" method="post" action="<?php echo site_url('profile/create_organizer/'.$url);?>" class="event-title">
                <!-- 1st part--> 
                
            	<div class="row">
                
           		<div class="event-webpage col-sm-12">
                	<div class="red-event width100 "><h4><?php echo ABOUT_THE_ORGANIZER;?></h4></div>
                    <div class="clear"></div>
                </div>
                <div class="col-sm-12  clearfix  mb">
                	<div class="event-detail pt pb">
                       
                    	
                            	
                            <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo ORG_NAME;?></label><span>*</span>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                            		<input type="text" placeholder="<?php echo Give_your_event_a_short_distinct_name;?>" name="name" id="name" value="<?php echo SecureShowData($name);?>">
                            	</div>
                        	</div>
                           
                            
                            <div class="form-group clearfix ">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo DESCRIPTION;?></label><span>*</span>
                            	</div>
                            	<div class="col-sm-8 col-xs-12 text-editor">
                            		<textarea name="description" id="description"><?php echo SecureShowData($description);?></textarea>
                            	</div>
                        	</div>
                            
                        <div id="picture_file_field_display"> 
                           <div class="form-group clearfix ">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo ORG_IMAGE;?></label>
                            	</div>
                                
                                <div class="col-sm-9 p0">
                                
                                <div class="col-sm-1 col-xs-2 bimg bimg img-icon-alD">
                                	<?php  if($org_logo){ ?>
                                		<img id="org_img_show" src="<?php echo base_url().'upload/organizer/org_small_image/'.$org_logo;?>" alt=" " height=" " width=" ">
                                	<?php }else{ ?>
                                		<img id="org_img_show" src="<?php echo base_url();?>images/bimage.png" alt=" " height=" " width=" ">
                                	<?php } ?>
                                	
                                </div>
                            	<div class="col-sm-5 col-xs-10 m10 img-Tfield-alD">
                            		<input type="text" name="img_name" id="img_name" value="<?php echo $org_logo;?>" >	
                            	</div>
                                
                                <div class="pull-left clearfix browse1">
                                	<div class="upload">
                                   		 <a href="javascript://" class="btn btn-event chks"><?php echo Browse;?></a>
                                		 <input type="file" name="org_image" id="org_image" class="uploads" accept="image/*">
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
                                
                                <div class="col-sm-9 col-xs-12">
                                	<p class="fromText"><?php echo imagen_message_2MB;?></p>
                                </div>
                                </div>
                        	</div>
                        </div>
								
                       
                    </div>
                 </div>
             </div><!-- End row-->
                    <!-- End 1st part-->
                    
                    <!-- 2rd part--> 
                    
            	<div class="row">    
                            
                <div class="event-webpage col-sm-12">
                	<div class="red-event width100 "><h4><?php echo OPTIONAL_SETTINGS;?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
			
                <div class="col-sm-12  clearfix mb">
                    <div class="event-detail pt pb">
                       
                        
                        	<div class="form-group clearfix">
                        		
                        		<div id="website_div">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo WEBSITE;?></label>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                            		<input type="text" placeholder="Organizers website." name="website" id="website" value="<?php echo $website; ?>">
                            	</div>
                            	</div>
                            	
                                <div class="col-sm-8 col-sm-offset-3 clearfix">
                                	<div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="chkwebsite" id="chkwebsite" value="1" <?php if($show_website) { echo 'checked'; } ?> ><?php echo SHOW_MY_WEBSITE;?>
                                          </label>
                                    </div>
                                    
                                    <div class="checkbox">
                                          <label>
                                            <input type="checkbox" name="chkevents" id="chkevents" value="1" <?php if($show_no_event) { echo 'checked'; } ?>><?php echo SHOW_NUMBER_OF_EVNT_HELD;?>
                                          </label>
                                    </div>
                               </div>
                        	</div>
                            
                            
                            	<div class="form-group clearfix ">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo EVENT_INFO;?></label>
                            	</div>
                              <?php if($display_event=='' || $display_event=='0'){ $display_event=1; } ?>
                            	<div class="col-sm-8 col-xs-12">
                                	<div class="radio">
                                          <label>
                                            <input type="radio" name="eventinfo" id="event_org" value="1" <?php if($display_event==1) { echo 'checked'; } ?> >
                                            <?php echo DISPLAY_ONLY_EVENTS_BY_ORGANIZER;?>
                                          </label>
                                        </div>
                                        
                                     <div class="radio">
                                          <label>
                                            <input type="radio" name="eventinfo" id="all_event" value="2" <?php if($display_event==2) { echo 'checked'; } ?>>
                                            <?php echo DISPLAY_ALL_OF_MY_EVENTS;?>
                                          </label>
                                    </div>
                            	</div>
                        	</div>

                       
                    </div>
                 </div>
             </div><!-- End row-->
             
             
                    <!-- End 2nd part-->
                    
                    <!-- 3rd part-->
              	<div class="row">    
                            
                <div class="event-webpage col-sm-12">
                  <div class="red-event width100"><h4><?php echo PROMOTE_YOUR_PROFILE;?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
			
                <div class="col-sm-12  clearfix mb">
                    <div class="event-detail pt pb">
                    
                    	<div class="expert text-right expert1">
                      <?php 
                        $site_setting = site_setting();
                        $promote_logo = $site_setting['promot_profile_logo_medium'];
                        $promote_large_logo_default = $site_setting['promot_profile_logo_large'];
                      ?>
                    			<a href="javascript://"><strong><?php echo BUTTON;?>:</strong><img id="promote_logo" src="<?php echo base_url().'images/'.$promote_large_logo_default;?>" alt=" " style= "max-width: 100px;"   /></a>
                       	</div>
                        
                       
                        	<div class="form-group clearfix ">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo BUTTON_SIZE;?></label>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                                	<div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="radio_large" value="1" <?php if($org_icon==1) { echo 'checked';}else{?> checked <?php } ?>>
                                             <?php echo LARGE_44PX;?>
                                          </label>
                                        </div>
                                        
                                     <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="radio_medium" value="2" <?php if($org_icon==2) { echo 'checked'; } ?>>
                                            <?php echo MEDIUM_34PX;?>
                                          </label>
                                    </div>
                                    <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="radio_small" value="3" <?php if($org_icon==3) { echo 'checked'; } ?>>
                                            <?php echo SMALL_24PX;?>
                                    </div>
                                    
                            	</div>
                        	</div>
                        
                        	<div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo CODE;?></label>
                            	</div>
                                
                            	<div class="col-sm-8 col-xs-12">
                            		<textarea name="change_me" id="change_me" disabled><a href="<?php echo site_url('profile/create_organizer/'.$url);?>" target="_blank"><img src="<?php echo base_url();?>images/bl3.png" alt="organizer" /></a></textarea>
                            		<span id="change_this"></span>
                            
                                    <p class="fromText"><?php echo COPY_AND_PASTE_THIS_CODE_FOR_USE_ON_YOUR_WEBSITE;?></p>
                                   <!--Copy and paste this code for use on your website-->
 
                            	</div>
                                
                        	</div>
                          
                    </div>
                 </div>
             </div><!-- End row-->
                    
                   <!-- End 3nd part-->
                    
               	<div class="row">     
                <div class="event-webpage col-sm-12">
                	<div class="red-event width100"><h4><?php echo ADD_SOCIAL_NETWORKS;?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
			            
                <div class="col-sm-12 clearfix mb">
                   <div class="event-detail pt pb ">
                   		
                     
                             
                            
                            <div class="form-group clearfix ">
                            	<div class="col-sm-8 col-sm-offset-3 clearfix">
                                	<div class="checkbox">
                                          <label>
                                            <input type="checkbox" value="1" id="fbchk" name="fbchk"  <?php if($add_facebook) { echo 'checked'; } ?>><?php echo ADD_MY_PAGE_FACEBOOK;?>
                                          </label>
                                    </div>
                               </div>
	                               <div id="fb_div">
	                            	<div class="col-sm-3 col-xs-12 lable-rite">
	                            		<label class="wordbrk"><?php echo HTTP_WWW_FACEBOOK_COM;?></label>
	                            	</div>
	                            	 <div class="col-sm-8 col-xs-12">
	                            		<input type="text" placeholder="Facebook page" id="facebook_link" name="facebook_link" value="<?php echo $facebook_link;?>">
	                            	</div>
	                            	</div>
                        	</div>
                            
                            <div class="form-group clearfix ">
                            	
                            	
                                
                                <div class="col-sm-8 col-sm-offset-3 clearfix">
                                	<div class="checkbox">
                                          <label>
                                            <input type="checkbox" value="1" name="twitterchk" id="twitterchk" <?php if($add_twitter) { echo 'checked'; } ?>><?php echo ADD_MY_PAGE_TWITTER;?>
                                          </label>
                                    </div>
                                    
                               	</div>
                               	  <div id="twitter_div">
                                        	<div class="col-sm-3 col-xs-12 lable-rite">
			                            		<label class="wordbrk"><?php echo HTTP_WWW_TWITTER_COM;?></label>
			                            	</div>
			                            	 <div class="col-sm-8 col-xs-12">
			                            		<input type="text" placeholder="Twitter page" name="tw_link" id="tw_link" value="<?php echo $twitter_link;?>">
                                    	</div>
                        	</div>
                                              
                   </div>
                   <div class="clearfix"></div>
                 </div>
              </div><!-- End row-->
              <!-- End 3rd part-->
              
              	<div class="row">
              
             	<div class="col-sm-12 col-xs-12 text-center pb">
                    <ul class="save-preview">
                    <input type="hidden" value="<?php echo $org_logo;?>" name="image_name" id="image_name" class="btn-event"/><!--//add by darshan-->
                    <input type="hidden" value="<?php echo $page; ?>" name="page" id="page">
                        <li><input type="submit" value="<?php echo SAVE;?>" class="btn-event"/></li>
                        <?php if($url){?><li><a href="<?php echo site_url('profile/my_profile/'.$url);?>" class="btn-event"><?php echo VIEW;?></a></li><?php } ?>
                    </ul>
                </div>
                
             </div>
                  
            </form> 
            
             
            </div><!-- End container -->
    </section>
     <script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
    <script>
    		$(document).ready(function(){
    		$(".rover_tip").popover();
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
			
			$(document).ready(function () {
                
                $('#datepicker2').datepicker({
                    format: "dd/mm/yyyy",
					orientation: 'top'
                });
				
            });
        </script>