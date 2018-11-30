<script type="text/javascript">
  function goBack() {
    window.history.back();
  }
 
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<section>  
            <div class="container">
            	
              <div class="pt">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct">
                   <h1><?php echo CONTACT_US;?></h1>
            	</div>
                
              </div><!-- End pt -->
                
                <div class="clearfix"></div>
                
                <div class="festival"></div>
                
                <div class="col-sm-12 col-xs-12 p0-xs2  pt15 ">
                <div class="row"> 
                <?php if($error){ ?>   
               <div class="alert alert-danger message" ><?php echo $error; ?></div>  
               <?php }?>      
                <?php if($success){ ?>                                    
                <div class="alert alert-success message" ><?php echo $success; ?></div>   
                 <?php }?>          
                <div class="event-webpage col-xs-12 col-sm-12 pt">
                	<div class="red-event width100 "><h4><?php echo CONTACT_US;?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
              
			
                <div class="col-sm-12  clearfix mb">
                    <div class="event-detail event-detail2 pt pb">
                        
                        <div class="form-group clearfix">
                                   <div class="col-sm-12 col-xs-12">
                                   <h3><?php echo Tell_us_more_so_we_can_better_assist_you;?></h3>
                                   </div>
                               </div>
                        <form name="account_form" id="account_form" class="event-title"  method="post" action="<?php echo site_url('home/contact_us');?>">        
                           <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo I_AM; ?></label><span>*</span>
                              </div>
                              <div class="col-sm-8 col-xs-12">

                              <select class="select-pad" name="i_am" id="i_am">
                               <option value="" >- - Select One - -</option>
                                        <option value="I am an Event organizer" <?php if($i_am=='I am an Event organizer') { echo 'selected'; } ?>  >I am an Event organizer</option>   
                                        <option value="I am an Event Attendee" <?php if($i_am=='I am an Event Attendee') { echo 'selected'; } ?> >I am an Event Attendee</option>
                                        <option value="other" <?php if($i_am=='other') { echo 'selected'; } ?>  >Other</option>
                                        </select>
                              </div>
                        </div>
                             <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo CATAGORY_QUESTION; ?></label><span>*</span>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                              <select class="select-pad" name="category" id="category">
                                    <option value="">- - Select One - -</option>
                                     <option value="Login and password" <?php if($category=='Login and password') { echo 'selected'; } ?> >Login and password</option>
                                    <option value="Event page design" <?php if($category=='Event page design') { echo 'selected'; } ?>>Event page design</option>
                                    <option value="Fees, payments and invoices" <?php if($category=='Fees, payments and invoices') { echo 'selected'; } ?> >Fees, payments and invoices</option>
                                    <option value="Collecting and viewing attendee info" <?php if($category=='Collecting and viewing attendee info') { echo 'selected'; } ?>>Collecting and viewing attendee info</option>
                                    <option value="Promoting an event" <?php if($category=='Promoting an event') { echo 'selected'; } ?>>Promoting an event</option>
                                    <option value="Management tools" <?php if($category=='Management tools') { echo 'selected'; } ?>>Management tools</option>
                                    <option value="Sales - I am organizing a large event" <?php if($category=='Sales - I am organizing a large event') { echo 'selected'; } ?>>Sales - I am organizing a large event</option>
                                    <option value="Unsubscribe" <?php if($category=='Unsubscribe') { echo 'selected'; } ?>>Unsubscribe</option>
                                    <option value="Other" <?php if($category=='Other') { echo 'selected'; } ?>>Other</option>
                                        </select>
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
                                <label><?php echo EMAIL_ADDRESS; ?></label><span>*</span>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="email" name="email" id="email" value="<?php echo SecureShowData($email);?>">
                              </div>
                        </div>
                         <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo EVENT_NAME.'/'.'URL'; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" name="event" id="event" value="<?php echo SecureShowData($event);?>">
                              </div>
                        </div>
                         <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo SUBJECT; ?></label><span>*</span>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" name="subject" id="subject" value="<?php echo SecureShowData($subject);?>">
                              </div>
                        </div>
                         <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo DETAILS; ?></label><span>*</span>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                               <textarea name="details"  id="details" ><?php echo SecureShowData($details);?></textarea>
                              </div>
                        </div>
                        <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                
                              </div>
                              <div class="col-sm-8 col-xs-12">
                               <div class="g-recaptcha" data-sitekey="<?php echo $result['captcha_site_key']; ?>"></div> 
                              </div>
                        </div>
                         <div class="form-group clearfix">
                        <div class="text-center">
                            <input type="submit" value="<?php echo SEND;?>" class="btn-event2" />
                            <input type="button" value="<?php echo Cancel;?>" onclick="goBack()" class="btn-eventgrey marL10" />
                        </div>
                        </div>
                        </form>
                                 
                     </div>
                    </div>
                 </div>
                 
             </div>
                
            </div><!-- End container -->
            <div class="pb"></div>
    </section>
    
   
  </body>
</html>
