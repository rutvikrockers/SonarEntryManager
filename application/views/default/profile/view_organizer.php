<section class="eventDash-head org-head">
    <div class="container">
        <div class="orgLeft">
            <?php if($single_org[0]['org_logo'] && file_exists(base_path().'upload/organizer/org_large_image/'.$single_org[0]['org_logo'])) {?>

                    <img src="<?php echo base_url().'upload/organizer/org_large_image/'.$single_org[0]['org_logo'];?>" alt=" " height=" " width=" ">    
                    
            <?php 
                } elseif($single_org[0]['org_logo'] && file_exists(base_path().'upload/organizer/org_small_image/'.$single_org[0]['org_logo'])){
                ?>      
                    <img src="<?php echo base_url().'upload/organizer/org_small_image/'.$single_org[0]['org_logo'];?>" alt=" " height=" " width=" ">    
                <?php 
                }else{
                ?>
                <img src="<?php echo base_url();?>images/no_image.png" alt=" " height=" " width=" ">
                <?php 
                }
            ?>
        </div>
         <div class="orgRight">
           <h1><?php echo SecureShowData($single_org[0]['name']);?></h1>
           <p><a href="<?php echo $single_org[0]['website'];?>"><?php echo $single_org[0]['website'];?></a></p>
           <p><?php echo SecureShowData($single_org[0]['description']);?></p>
        </div>
    </div>
  </section>

<section>  
            <div class="container marTB50">            	
              
                <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 marB25-sm">
                	
                    	
                    	<div class="current-evnt open-air">
                    	
                        <ul class="nav nav-pills ls-tab text-center ">
                          <li class="active col-sm-6 col-xs-6 login"><a href="#current" data-toggle="tab"><?php echo CURRENT_EVENTS;?></a></li>
                          <li class="col-sm-6 col-xs-6 signup"><a href="#past" data-toggle="tab"><?php echo COMPLETED_EVENTS;?></a></li>
                        </ul>
                        <div class="tab-content">
                        
                        	<div class="tab-pane active eventListContainer orgEvent" id="current">
                            	
                                <div class="world-tour">
                	
                                    <ul class="clearfix mt10 mb0 pd15">
                                    <?php 
                                    	if($active_event){
                                    		foreach ($active_event as $aevent ) {
												$event_logo = $aevent['event_logo'];
												$event_title = $aevent['event_title'];
												$active=$aevent['active'];
												$event_id=$aevent['id'];
												$event_link=$aevent['event_url_link'];
												$event_start_date_time = $aevent['event_start_date_time'];
												if($event_logo && file_exists('upload/event/thumb/'.$event_logo)){
													$event_img = base_url().'upload/event/thumb/'.$event_logo;
												}else{
													$event_img = base_url().'upload/event/thumb/no_img.jpeg';
												}
													
											?>
												 <li>
			                                     	<div class="josef">
			                                        	<div class="imgLeft">
                                                        <div class="flexslider">
                                                        <ul class="slides">
                                                          <?php  
                                                            $event_images=getAllRecordById('event_images','event_id',$event_id);

                                                            if($event_images){
                                                              foreach ($event_images as  $image_data) {
                                                              
                                                          ?>
                                                          <li>
                                                           <?php 
                                                                    $image = base_url().'upload/event_default/no_img.jpg';
                                                                    $image_slide =  $image_data['image_name'];
                                                                    if ($image_slide && file_exists('upload/search_default/'. $image_slide)) {
                                                                        $image = base_url().'upload/search_default/'.$image_slide;
                                                                    }
                                                                    else if($image_slide != '' && file_exists(base_path().'upload/event/orig/'.$image_slide)){ 
                                                                        $image = base_url().'upload/event/thumb/'.$image_slide;
                                                                    }
                                                                    elseif($image_slide != '' && file_exists(base_path().'upload/event/thumb/'.$image_slide)){ 
                                                                        $image = base_url().'upload/event/thumb/'.$image_slide;
                                                                    }
                                                                ?>
                                                          <img src="<?php echo $image; ?>" alt=" "  height="120px" width="120px"  > 
                                                          </li>
                                                          <?php 
                                                            
                                                              }
                                                            } ?>
                                                          
                                                        </ul>
                                                      </div></div>
			                                        	<div class="tour">
			                                            	<h2><a href="javascript://"><?php echo SecureShowData($event_title);?></a></h2>
			                                            	<p><?php echo $event_start_date_time;?></p>
			                                           		<p class="view pb10">
			                                           			<?php if($active!= 0) {?>
			                                           			<a href="<?php echo site_url('event/view/'.$event_link);?>"><?php echo VIEW;?></a><!--add by darshan-->
			                                           			<?php }else { ?>
			                                           				<a href="<?php echo site_url('event/theme/'.$event_id);?>"><?php echo VIEW;?></a>
			                                           			<?php } ?>	
			                                           			</p>
			                                        	</div>
			                                        </div>
			                                      </li>
											<?php 
											}
                                    	}else{
											?>
                                            <li>
                                    			<p class="no_recordSearch"> <?php echo ORGANIZER_HAS_NO_CURRENT_EVENTS ?></p>
                                            </li>
                                            <?php
                                    	}	 
                                    ?>
                                    
                                </ul>   
                            </div>
                                
                                
                            </div><!-- current tab-pane -->
                            
                            <div class="tab-pane eventListContainer orgEvent" id="past">
                            
                            	<div class="world-tour">
                	
                                    <ul class="clearfix mt10 mb0 pd15">
                                    	<?php 
                                    	if($past_event){
                                    		foreach ($past_event as $pevent ) {
                                    			
												$event_logo_past = $pevent['event_logo'];
												$event_title_past = $pevent['event_title'];
												$event_id_past=$pevent['id'];
												$active_past=$pevent['active'];
												$event_start_date_time_past = $pevent['event_start_date_time'];
												
												if($event_logo_past && file_exists('upload/event/thumb/'.$event_logo_past)){
													$event_img_past = base_url().'upload/event/thumb/'.$event_logo_past;
												}else{
													$event_img_past = base_url().'upload/event/thumb/no_img.jpeg';
												}
													
											?>
												 <li>
			                                     	<div class="josef">
			                                        	<div class="imgLeft">
                                                        <div class="flexslider">
                                                        <ul class="slides">
                                                         
                                                          <?php  
                                                            $event_images=getAllRecordById('event_images','event_id',$event_id);

                                                            if($event_images){
                                                              foreach ($event_images as  $image_data) {
                                                              
                                                          ?>
                                                          <li>
                                                           <?php 
                                                                    $image = base_url().'upload/event_default/no_img.jpg';
                                                                    $image_slide =  $image_data['image_name'];
                                                                    if ($image_slide && file_exists('upload/search_default/'. $image_slide)) {
                                                                        $image = base_url().'upload/search_default/'.$image_slide;
                                                                    }
                                                                    else if($image_slide != '' && file_exists(base_path().'upload/event/orig/'.$image_slide)){ 
                                                                        $image = base_url().'upload/event/thumb/'.$image_slide;
                                                                    }
                                                                    elseif($image_slide != '' && file_exists(base_path().'upload/event/thumb/'.$image_slide)){ 
                                                                        $image = base_url().'upload/event/thumb/'.$image_slide;
                                                                    }
                                                                ?>
                                                          <img src="<?php echo $image; ?>" alt=" "  height="120px" width="120px"  > 
                                                          </li>
                                                          <?php 
                                                            
                                                              }
                                                            } ?>
                                                          
                                                        </ul>
                                                      </div>

                                                        </div>
			                                        	<div class="tour">
			                                            	<h2><a href="javascript://"><?php echo SecureShowData($event_title_past);?></a></h2>
			                                            	<p><?php echo $event_start_date_time_past;?></p>
			                                           		<p class="view pb10">
			                                           			<?php if($active_past!= 0) {?>
			                                           			<a href="<?php echo site_url('event/view/'.$event_title_past);?>"><?php echo VIEW;?></a>
			                                           			<?php }else { ?>
			                                           				<a href="<?php echo site_url('event/theme/'.$event_id_past);?>"><?php echo VIEW;?></a>
			                                           			<?php } ?>
			                                           			</p> 
			                                           			<!-- tour --> 
			                                        	</div>
			                                        	<!-- josef --> 
			                                        </div>
			                                      </li>
											<?php 
											}
                                    	}else{
											?>
                                            <li>
                                    			<p class="no_recordSearch"> <?php echo ORGANIZER_HAS_NO_PAST_EVENTS ?></p>
                                            </li>
                                            <?php
                                    	}	 
                                    ?>
                                     <!-- ul --> 
                                </ul>
                                <!-- world -->  
                            </div>
                            	
                                
                            </div><!-- past tab-pane -->
                       
                        </div>
                     
                    </div>    
                      
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                
                	<div class="current-evnt open-air">
                    	<ul class="nav nav-pills ls-tab text-center ">
                    	<!-- Facebook Page Feed -->
                          <li class="active login col-sm-6 col-xs-6">
                          	<a href="#facebook" data-toggle="tab"><?php echo Facebook;?></a>
                          	
                          </li>
                        <!-- End of Facebook Page Feed -->  
                          <li class="signup col-sm-6 col-xs-6"><a href="#twitter" data-toggle="tab"><?php echo Twitter;?></a></li>
                        </ul>
                        <div class="tab-content pd15">
                    		<div class="tab-pane active" id="facebook">
                            	
                                <?php 
									if($single_org[0]['facebook_link'])
									{
									?>		
											<a href="https://www.facebook.com/<?php echo $single_org[0]['facebook_link'];?>" target="_blank" class="facebook_icon fbpd">
											<img src="<?php echo base_url();?>images/social_icon.png" alt=" " height=" " width=" " >
											<span><?php echo Facebook;?></span>
											</a>	
									<?php 
									}
									?>
                            </div>
                    		<div class="tab-pane" id="twitter">
                            	
                                <?php 
										if($single_org[0]['twitter_link'])
										{
										?>
												<a href="https://twitter.com/<?php echo $single_org[0]['twitter_link'];?>" target="_blank" class="twitter_icon twpd">
												<img src="<?php echo base_url();?>images/twitter.png" alt=" " height=" " width=" " >
												<span><?php echo Twitter;?></span>
												</a> 
										<?php 
										}
										?> 
                            </div>
                        </div>
                    </div>
                                
                    </div>
                </div>
            </div><!-- End container -->
            <div class="pb"></div>
    </section>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/flexslider.css');?>">
<script type="text/javascript" src="<?php echo base_url('js/jquery.flexslider.js');?>"></script>
<script type="text/javascript">
   $(window).load(function() {
  $('.flexslider').flexslider({
    animation: "fade",
    controlNav: false, 
    directionNav: false,
  });
});
</script>