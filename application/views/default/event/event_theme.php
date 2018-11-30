<style type="text/css">
	.btn-danger:hover{
		color: #fff;
    	background-color: #e0336b;
    	border-color: #e0336b;
	}
	.btn-danger{
		color: #fff;
    	background-color: #e0336b;
    	border-color: #e0336b;
	}
</style>
<link href="<?php echo base_url();?>css/jquery.bxslider.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/spectrum.css" rel="stylesheet">
<script>
var validat_js_min_ticket ='<?php echo Minimum_one_Ticket_Required_to_Make_Event_Live;?>';
</script>



<?php 
$data = array();

$headertext='';
$footertext='';

if($eventTheme){
	
	$headertext = $eventTheme['header_text_display'];
	$footertext = $eventTheme['footer_text_display'];
}

$data['headertext'] = $headertext;
$data['footertext'] = $footertext;		
?>
<?php $this->load->view('default/common/dashboard-header')?>
<section>  
    <div class="container marTB50">
    <?php
		$attributes = array('name'=>'theme_form','id'=>'theme_form','class'=>'event-title');
		echo form_open('event/theme/'.$event_id,$attributes);	
	?>
    <?php if($success_msg){
                ?>	
                	<div class="alert alert-success mar10"><?php echo $success_msg; ?></div>
               	<?php }?>
                
                <?php 
                	if($error_msg && ($error_msg!="You are not allowed to view this event.")){
                ?>	
                	<div class="alert alert-danger mar10"><?php echo $error_msg; ?></div>
               <?php 
               	}
               ?>
               
               <div id="ticket_error"></div>       	
      	
        <?php //=====================Theme Part Start=====================//?>
		<div>
          
         	<div class="row">    
                    
		        <div class="event-webpage col-sm-12">
		        	<div class="red-event width100 "><h4><?php echo Personalize_your_theme;?></h4>
		        	<a href="" data-toggle="tab" class="btn btn-danger btn-sm" style="float: right;margin-top:-34px;margin-right: -11px;font-weight: bold;" onclick="set_event_theme(<?php echo $default_theme_id; ?>);"><?php echo Choose_a_theme;?></a>
		        	</div>
		            <div class="clear"></div>
		        </div><!-- End event-webpage -->
		        
	        	<div class="col-sm-12">
	       		
	       			<div class="event-detail event-detail2 clearfix">
	        
			        	
        
	        			<div class="form-group pt clearfix ">
	                    	<div class="col-sm-12 col-xs-12">
	                    		<h3><?php echo Choose_a_theme;?></h3>
	                    	</div>
	                    </div>
	                    
        				<?php /*for loop for event theme start*/ ?>
						<div class="form-group clearfix ">
                    		<div class="col-sm-12 col-xs-12 lable-rite">
                    			<div class="slider4 bg-design">
                    			<?php 
                    			 	if($themes){ $i=0;
                    					foreach($themes as $theme){ $i++; $active = ""; if($eventTheme['theme_id']==$theme['id']){ $active = "active"; }
                    			?>

                    				<div class="slide <?php echo $active; ?> slide_<?php echo $theme['id']; ?>" onclick="set_event_theme(<?php echo $theme['id']; ?>);" id="change_theme_<?php echo $theme['id']; ?>">
                              			<div class="theme_main <?php if($theme_id == $theme['id']){ echo 'selected'; }?>" style="background: <?php echo $theme['background']; ?>;" id="theme_sel_<?php echo $theme['id']; ?>">
											<div class="theme_head" style="background: <?php echo $theme['event_title']; ?>; "></div>
							        		<div class="table_class" style="background: <?php echo $theme['box_background']; ?>; border-color:<?php echo $theme['box_border']; ?>;">
							            		<div class="table_head" style="background:<?php echo $theme['box_header']; ?>; border-bottom: 1px solid <?php echo $theme['box_border']; ?>;">
							            			<h2 style="background: <?php echo SecureShowData($theme['header_text']); ?>; "></h2>
							                		<h2 style="background: <?php echo SecureShowData($theme['header_text']); ?>; "></h2> 
							               			<div class="clear"></div>
							            		</div>
									            <table width="100%" cellspacing="3px">
									                <tr><td style="background: <?php echo SecureShowData($theme['body_text']); ?>; "></td></tr>
									                <tr><td style="background: <?php echo SecureShowData($theme['body_text']); ?>; "></td></tr>
									                <tr><td style="background: <?php echo SecureShowData($theme['body_text']); ?>; "></td></tr>
									                <tr><td style=" width: 30%; background: <?php echo $theme['body_text']; ?>; "></td></tr>
									            </table>    
							        		</div>        
							    		</div>
							    		
                              		</div>
                    			<?php     						
                    					}
                    				} 
                    			?>
								</div>
							</div>
						</div>
						
						<?php /*for loop for event theme end*/ ?>
        				
        				<?php /*load page for change event theme color start*/ ?>
	                  	<div class="form-group clearfix ">
	                    	<div class="col-sm-12 col-xs-12">
	                    		<h3><?php echo Or_design_your_own;?></h3>
	                    		
	                    	</div>
	                  	</div>

					  	<div class="form-group clearfix"  id="change_event_theme">
					  	 	<?php  echo $this->load->view('default/event/change_event_theme',$oneTheme); ?>
	                    </div>
	                     <?php /*load page for change event theme color end*/ ?>
	                     
	                    <div class="form-group clearfix ">
	                    	<div class="col-sm-12 col-xs-12">
                                    
	                    		<div class="extra-options col-sm-12 col-xs-12 p0">
	                            	
	                            </div>
                                    
	                    	</div>
	                    </div>

			        	
			        	
				        <div id=setDisplayAttendee class="inline-block">
				    		<?php echo $this->load->view('default/event/event_display_attendee'); ?>
						</div>
        
				        <div id="setCutomHtml" class="inline-block">
				        
					    	<div>
						        <div class="form-group clearfix event-detail ">
			                    	<div class="col-sm-12 col-xs-12 p0 width-xs text-editor">
			                    	
			                    	
				                    	<ul class="nav nav-pills option-select pleft0 pb10 event-theam-tab">
		                                   <li class="active"><a href="#header" data-toggle="tab"><?php echo Custom_Header;?></a></li>
		                                   <li ><a href="#footer" data-toggle="tab"><?php echo Custom_Footer;?></a></li>
		                               	</ul>
		                               	<div class="tab-content">
		                                   <div class="tab-pane active" id="header">
		                                       <textarea name="header_text_display" id="header_text_display" class=""><?php echo SecureShowData($headertext);?></textarea>
		                                   </div>
		                                   
		                                   <div class="tab-pane" id="footer">
		                                   		<textarea name="footer_text_display" id="footer_text_display" class=""><?php echo SecureShowData($footertext);?></textarea>
		                                   </div> 
		                                 </div>	<!-- End Tab-content-->
										
			                       	</div>
			                     </div>
						         <div class="fr pb">
						            <ul class="save-preview3 clearfix">
						            
							            <input type="hidden" name="event_theme_header_text_display" id="event_theme_header_text_display" value="<?php echo $headertext;?>" />
		             					<input type="hidden" name="event_theme_footer_text_display" id="event_theme_footer_text_display" value="<?php echo $footertext;?>" />
	                
						                <li><a href="javascript://" onclick="save_theme_header_footer();"  class="btn-event2"><?php echo Save;?></a></li>
						                <li><a href="javascript://" class="btn-eventgrey" onclick="$.fancybox.close();"><?php echo Cancel;?></a></li>
						            </ul>
						        </div>
					        </div>
				        </div>
        
	       			</div> <!-- event detail closes -->
        		</div>
         	</div>
     	</div>
     	<?php //=====================Theme Part End=====================//?>
     	
     	
                                
                                
     	<?php //=====================View Part start=====================//?>
        
        <div class="eventPreview">
        <div class="loadPreview" id="progressbar"  style="display : none;">
            <img src="<?php echo base_url();?>images/Preloader_3.gif" alt="" height="32" width="32"/>
            <span><?php echo LOADING_PREVIEW;?></span>
		</div> 
        <div class="previewOver"></div>
        	<div id="event_theme_page">
				 <?php  $this->load->view('default/event/event_view1',$data); ?>                 
            </div>
        </div>
        
       	<div class="col-sm-12 col-xs-12"> 
       	 	<div class="row">
             	<div class="col-sm-12 col-xs-12 text-center pb">
             	
             		<input type="hidden" value="<?php echo $event_details['id'];?>" name="event_id" id="event_id">
	    	 	 	<input type="hidden" value="<?php echo $theme_id;?>" name="event_theme_id" id="event_theme_id">
	             	<input type="hidden" value="" name="submit_type" id="submit_type">
             
					<ul class="save-preview">
                     	<li><input class="btn-event save_event_theme" name="commit" onclick="return set_submit_type('save')" type="submit" value="<?php echo Save;?>" /></li>
						<li><input class="btn-event save_event_theme" name="commit" onclick="return set_submit_type('view')" type="submit" value="<?php echo Preview;?>" /></li>
					 	<?php if($event_details['active'] == 0) {?>           
					 	
					 	<?php } ?>
			 	 	</ul>
                </div>
                
             </div>
        </div>
     	<?php //=====================View Part End=====================//?>
     </form>
    </div><!-- End container -->
</section>
<div class="clear"></div>

<!-- bxSlider Javascript file -->
<script src="<?php echo base_url();?>js/jquery.bxslider.min.js"></script>
<script src="<?php echo base_url();?>js/jquery.fancybox.js"></script>
<script src="<?php echo base_url();?>js/spectrum.js"></script>
<script src="<?php echo base_url();?>js/rekha_validation.js"></script>

<script type="text/javascript">

var site_url = '<?php echo site_url();?>';
function set_submit_type(type){
	document.getElementById('submit_type').value = type;
}

function set_allow_facebook(ele){
 	if(ele.checked==true){
 		$('#allow_facebook_id').show();
 	}else{
 		$('#allow_facebook_id').hide();
 	}
  }  

function save_theme_header_footer(){
	
	var head = $('#header_text_display').val(); 
	var foot = $('#footer_text_display').val(); 

	$('#event_theme_header_text_display').val(head); 
	$('#event_theme_footer_text_display').val(foot); 

	$('#header_text_html').html(head); 
	$('#footer_text_html').html(foot); 
	
	$.fancybox.close();
}


function set_event_theme(val){
	
	$('#progressbar').show();
	document.getElementById('event_theme_id').value = val;
	
	$(".theme_main").removeClass("selected");
	$("#theme_sel_"+val).addClass("selected");
	 
	var theme_path =  site_url+'event/change_event_theme/';
	var theme_id = val;
	$.ajax({
	    type: "GET",
	    data: {theme_id: theme_id}, 
	    url: theme_path+theme_id,
	    success: function(data) {
			$("#change_event_theme").html(data);
			$('.slide').removeClass('active');   
            $('.slide_'+theme_id).toggleClass("active");
		
	    }
	});
	
	set_theme_ajax(theme_id);
}

function set_theme_ajax(theme_id){
	var page_path = site_url+ 'event/event_theme_page/';
    var event_id = '<?php echo $event_id; ?>';
    var promo_code = '<?php echo $promo_code; ?>';
       $.ajax({
           type: "GET",
           data: {event_id: event_id, theme_id: theme_id, promo_code: promo_code}, 
           url: page_path+event_id,
           success: function(data) {
       
               $("#event_theme_page").html(data);
               $('#progressbar').hide();
           }
       });
}

	$(document).ready(function() {
		/*
		 *  Simple image gallery. Uses default settings
		 */

		$('.fancybox').fancybox();

		/*
		 *  Different effects
		 */

		// Change title type, overlay closing speed
		$(".fancybox-effects-a").fancybox({
			helpers: {
				title : {
					type : 'outside'
				},
				overlay : {
					speedOut : 5
				}
			}
		});


		
		// Remove padding, set opening and closing animations, close if clicked and disable overlay
		$(".fancybox-effects-d").fancybox({
			padding: 0,

			openEffect : 'elastic',
			openSpeed  : 190,

			closeEffect : 'elastic',
			closeSpeed  : 190,

			closeClick : true,

		});

	});

	$(document).ready(function(){
		$('.slider4').bxSlider({
			slideWidth: 190,
			minSlides: 1,
			maxSlides: 5,
			moveSlides: 1,
			slideMargin: 10
		});
	});
</script>

<script>
       function set_color_picker(){
	
			 /*************** color picker *************/

			$(".full").spectrum({
			    className: "full-spectrum",
			    maxPaletteSize: 10,
			    preferredFormat: "hex",
			    localStorageKey: "spectrum.demo",
			});
			
		}
			
		function set_preview_event(ele,id){
				var hex = ele.value;
				
				if(id=='event_theme_title'){
					$('#event_theme_title').val(hex);
					$('#event_theme_title_span').attr('style','background:'+hex);
					$('#eventDesign .eventTitleColor').css('color', hex);
					$('#eventDesign .eventTitleColor a').css('color', hex);
					$('#eventDesign .eventTitleColor a:hover').css('color', hex);
				}
				if(id=='event_theme_background'){
					$('#event_theme_background').val(hex);
					$('#event_theme_background_span').attr('style','background:'+hex);
					$('.mainBGColor').css('backgroundColor', hex);
				}
				if(id=='event_theme_header_text'){
					$('#event_theme_header_text').val(hex);
					$('#event_theme_header_text_span').attr('style','background:'+hex);
					$('#eventDesign .red-event').css('color',  hex);
				}
				if(id=='event_theme_box_background'){
					$('#event_theme_box_background').val(hex);
					$('#event_theme_box_background_span').attr('style','background:'+hex);
					$('#eventDesign .event-detail').css('backgroundColor',  hex);
					$('#eventDesign .btn-event').css('color',  hex);
					$('#eventDesign .btn-saveevent').css('color',  hex);
					
				}
				if(id=='event_theme_body_text'){
					$('#event_theme_body_text').val(hex);
					$('#event_theme_body_text_span').attr('style','background:'+hex);
					$('#eventDesign .event-detail').css('color',  hex);
					$('#eventDesign .icon-protection').css('color',  hex);
					$('#eventDesign .btn-event').css('backgroundColor',  hex);
					$('#eventDesign .btn-saveevent').css('backgroundColor',  hex);
					$('#eventDesign .passBox input[type="password"]').css('borderColor',  hex);
				}
				if(id=='event_theme_box_border'){
					$('#event_theme_box_border').val(hex);
					$('#event_theme_box_border_span').attr('style','background:'+hex);
					$('#eventDesign .brdrColor').css('borderColor',  hex);
					$('#eventDesign .event-detail').css('borderColor',  hex);
					$('#eventDesign .red-event').css('borderColor',  hex);
					$('#eventDesign .eventBrdr').css('borderColor',  hex);
					$('#eventDesign .org_Name').css('borderColor',  hex);
					
				}
				if(id=='event_theme_links'){
					$('#event_theme_links').val(hex);
					$('#event_theme_links_span').attr('style','background:'+hex);
					$('#eventDesign .linkColor').css('color',  hex);
					$('#eventDesign .org_Link').css('color',  hex);
					$('#eventDesign a').css('color',  hex);
					$('#eventDesign a:hover').css('color',  hex);
				}
				if(id=='event_theme_box_header'){
					$('#event_theme_box_header').val(hex);
					$('#event_theme_box_header_span').attr('style','background:'+hex);
					$('#eventDesign .event-webpage .red-event').css('backgroundColor',  hex);
					
				}
		}
</script>