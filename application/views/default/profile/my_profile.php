<section> 
    
            <div class="container">
            	
              <div class="pt">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct ">
                   <h1><?php echo MY_PROFILE;?></h1>
            	</div>
                
              </div><!-- End pt -->
                
                <div class="clearfix"></div>
                
                <div class="festival pb"></div>
                
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12  pt15 pdlr">
                	<div class="open-air">
                    
                    	<ul class="abut-org">
                        	<li><?php echo ABOUT_ORGANIZER;?></li>
                        </ul>
                    	
                        <div class="name pl pb">
                        	<h3><strong><?php echo SecureShowData($single_org[0]['name']);?></strong></h3>
                            <?php if($single_org[0]['show_no_event']){ ?>
                            <p><strong>Events Held : </strong><?php echo count($event_held); ?></p>
                            <?php } ?>
                            <p class="mt"><a href="<?php echo $single_org[0]['website'];?>"><?php echo $single_org[0]['website'];?></a></p>
                            
                            <p>
                            	<?php echo SecureShowData($single_org[0]['description']);?>		
                            </p>
                            <?php 
                               
                               $fb_link = 'https://www.facebook.com/'. $single_org[0]['facebook_link'];
                               $tw_link = 'https://www.twitter.com/'. $single_org[0]['twitter_link'];
                            
                            ?>
                          
                             <?php if($single_org[0]['add_facebook']){ ?>
                            <p> <strong> <?php echo Facebook;?>  : </strong>  <a href="<?php echo $fb_link; ?> "> <?php echo $fb_link; ?>  </a>  </p>
                          <?php } ?>
                            
                             <?php if($single_org[0]['add_twitter']){ ?>
                                <p> <strong> <?php echo Twitter;?>  : </strong> <a href="<?php echo $tw_link; ?> "> <?php echo $tw_link; ?>  </a>  </p> 
                           <?php } ?>
                            
                                                       
                            
                    	</div>
                    
                	</div><!-- End open-air -->
                    	
                    <div class="current-evnt mt">
                    	
                        <ul class="nav nav-pills ls-tab text-center open-air">
                          <li class="active col-sm-6 col-xs-6 login"><a href="#current" data-toggle="tab"><?php echo CURRENT_EVENTS;?></a></li>
                          <li class="col-sm-6 col-xs-6 signup"><a href="#past" data-toggle="tab"><?php echo PAST_EVENTS;?></a></li>
                        </ul>
                        
                        
                        <div class="tab-content">
                        
                        	<div class="tab-pane active" id="current">
                            	
                                <div class="world-tour">
                	           
                                    <ul class="clearfix mt10 mb0 pl15">
                                    <?php 
                                    	if($active_event){
                                    		foreach ($active_event as $aevent ) {
                                    			
												$event_logo = $aevent['event_logo'];
												$event_title = $aevent['event_title'];
												$active=$aevent['active'];
												$event_id=$aevent['id'];
												$event_start_date_time = $aevent['event_start_date_time'];
												if($event_logo && file_exists('upload/event/thumb/'.$event_logo)){
													$event_img = base_url().'upload/event/thumb/'.$event_logo;
												}else{
													$event_img = base_url().'upload/event/thumb/no_img.jpeg';
												}
													
											?>
												 <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			                                     	<div class="josef">
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
			                                        	<div class="tour">
			                                            	<h2><a href="javascript://"><?php echo SecureShowData($event_title);?></a></h2>
			                                            	<p><?php echo $event_start_date_time;?></p>
			                                           		<p class="view pb10">
			                                           			<?php if($active!= 0) {?>
			                                           			<a href="<?php echo site_url('event/view/'.$event_title);?>"><?php echo VIEW;?></a>
			                                           			<?php }else { ?>
			                                           				<a href="<?php echo site_url('event/theme/'.$event_id);?>"><?php echo VIEW;?></a>
			                                           			<?php } ?>	
			                                           			</p>
			                                        	</div>
			                                        </div>
			                                      </li>
											<?php 
											}
                                    	}else{ ?>
                                    		 <li class="col-xs-12">
			                                     	<div class="josef text-center">
			                                     		<strong><?php echo CURRENTLY_ORGANIZER_NAME_HAS_NOT_ANY_LIVE_EVENTS;?></strong>
			                                        </div>
			                                      </li>
                                    		
                                    	<?php } ?>	 
                                   
                                    
                                </ul>   
                            </div>
                                
                                
                            </div><!-- current tab-pane -->
                            
                            <div class="tab-pane" id="past">
                            
                            	<div class="world-tour">
                	
                                    <ul class="clearfix mt10 mb0 pl15">
                                    	<?php 
                                    	if($past_event){
                                    		foreach ($past_event as $pevent ) {
                                    			
												$event_logo_past = $pevent['event_logo'];
												$event_title_past = $pevent['event_title'];
												$event_id=$aevent['id'];
												$active=$aevent['active'];
												$event_start_date_time_past = $pevent['event_start_date_time'];
												
												if($event_logo_past && file_exists('upload/event/thumb/'.$event_logo_past)){
													$event_img_past = base_url().'upload/event/thumb/'.$event_logo_past;
												}else{
													$event_img_past = base_url().'upload/event/thumb/no_img.jpeg';
												}
													
											?>
												 <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			                                     	<div class="josef">
			                                        	<a href="javascript://"><img src="<?php echo $event_img_past;?>" alt=" " height=" " width=" " ></a>
			                                        	<div class="tour">
			                                            	<h2><a href="javascript://"><?php echo SecureShowData($event_title_past);?></a></h2>
			                                            	<p><?php echo $event_start_date_time_past;?></p>
			                                           		<p class="view pb10">
			                                           			<?php if($active!= 0) {?>
			                                           			<a href="<?php echo site_url('event/view/'.$event_title);?>"><?php echo VIEW;?></a>
			                                           			<?php }else { ?>
			                                           				<a href="<?php echo site_url('event/theme/'.$event_id);?>"><?php echo VIEW;?></a>
			                                           			<?php } ?>
			                                           			</p>
			                                        	</div>
			                                        </div>
			                                      </li>
											<?php 
											}
                                    	}else{ ?>
                                    		 <li class="col-xs-12">
			                                     	<div class="josef text-center">
			                                     		<strong><?php echo CURRENTLY_ORGANIZER_NAME_HAS_NOT_ANY_PAST_EVENTS;?></strong>
			                                        </div>
			                                      </li>
                                    		
                                    	<?php } ?>	 
                                    
                                     
                                </ul>
                                
                            </div>
                            	
                                
                            </div><!-- past tab-pane -->
                        </div>
                     
                    </div>    
                        
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 clearfix pt15 pdlr">
                           		<div class="login-fb">
                    					
                                        <div class="col-sm-12 col-md-12 col-xs-12 pt15 man pb">
                                        	
                                        	<?php 
                                        	if($single_org[0]['org_logo'] || file_exists(base_url().'upload/organizer/org_large_image/'.$single_org[0]['org_logo'])){
                                        	?>		
                                        		<img src="<?php echo base_url().'upload/organizer/org_large_image/'.$single_org[0]['org_logo'];?>" alt=" " height=" " width=" ">	
                                        	<?php 
                                        	}else{
                                        	?>
                                        	<img src="<?php echo base_url();?>images/no_image.png" alt=" " height=" " width=" ">
                                        	<?php 
                                        	}
                                        	?>
                                        	
                                        </div>    
                                       
                                       <div class="clearfix"></div>	
                                      	<div class="facebook pb text-center">
                                            <ul class="pt pl">
                                            	
                                            <?php 
                                        	if($single_org[0]['add_facebook'])
                                        	{
                                        	?>		
                                        		<li class="fb">
                                                    <a href="<?php echo $fb_link; ?>" target="_blank" class="facebook_icon fbpd">
                                                    <img src="<?php echo base_url();?>images/social_icon.png" alt=" " height=" " width=" " >
                                                    <span><?php echo Facebook;?></span>
                                                    </a>
                
                                                </li>	
                                        	<?php 
											}
											?>
                                            <?php 
                                        	if($single_org[0]['add_twitter'])
                                        	{
                                        	?>
                                        	 	 <li>
                                                    <a href="<?php echo $tw_link; ?>" target="_blank" class="twitter_icon twpd">
                                                    <img src="<?php echo base_url();?>images/twitter.png" alt=" " height=" " width=" " >
                                                    <span><?php echo Twitter;?></span>
                                                    </a> 
                                                 </li>
                                        	<?php 
											}
											?> 
                                                 
                                                
                                            </ul>
                                        </div>       
                                </div>
                                
                    </div>
                
            </div><!-- End container -->
            <div class="pb"></div>
    </section>
    