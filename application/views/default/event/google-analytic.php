<?php 
    
    $data1['events_id'] = $id;
    
    
    
    ?>
<?php $this->load->view('default/common/dashboard-header')?>
<section>  
            <div class="container marTB50">
              
                <?php 
                if($error!= '')
                { ?>
                    
                            <div class="alert alert-danger message" role="alert">
                            <button class="close" data-dismiss="alert">x</button>
                            <strong><?php echo ERRORS; ?>!</strong> <?php echo $error;?>
                            </div> 
                <?php } 
                if($success)
                { ?>
                            <div class="alert alert-success message" role="alert">
                            <button class="close" data-dismiss="alert">x</button>
                             <?php echo $success;?>
                            </div> 
                    
                <?php   } ?>
                <div class="row">
                <div class="col-md-8 col-sm-12">
                                
                 <div class="row">    
                            
                <div class="event-webpage col-sm-12">
                    <div class="red-event width100 "><h4><?php echo GOOGLE_ANALYTICS;?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                <div class="col-sm-12">
                <div class="event-detail clearfix">
                
                <form class="event-title" method="post" action="<?php echo site_url('event/google_analytics/'.$id);?>">
                
                 <div class="form-group pt clearfix">
                 <div class="col-sm-4 col-xs-12 width-xs pright0">
                   <label><?php echo IF_YOU_USE_GOOGLE_ANALYTICS_ENTER_YOUR_FULL_UA_NUMBER; ?></label>
                 </div>
                 <div class="col-sm-7 col-xs-12 width-xs">
                   <input type="text" placeholder="UA-000000-0" name="google_code" value="<?php echo $google_code; ?>">
                 </div>
                 </div>
                 
                 <div class="form-group clearfix">
                 <div class="col-sm-12 col-xs-12 width-xs google-analytic clearfix">
                     <h3><?php echo ABOUT_GOOGLE_ANALYTICS; ?></h3>
                     <?php if($active==0) {?>
                     <h6><?php echo "Draft Event" ?></h6>
                     <?php } 
                     if($active==3){?>
                     <h6><?php echo "Cancelled Event" ?></h6>   
                     <?php  }
                     if($active==1 || $active==2) {
                        if($event_url_link) {
                            $event_url = $event_url_link;
                        } else {
                         $event_url = $id;
                        }
                        ?>  
                     <h6><strong><?php echo EVENT_LINK;?></strong> <a href="<?php echo site_url('event/view/'.$event_url);?>"><?php echo site_url('event/view/'.$event_url);?></a></h6>
                     <?php } ?>
                     <p><?php echo IF_YOU_USE_GOOGLE_ANALYTICS_ENTER_YOUR_FULL_UA_NUMBER; ?> <br>
                     <?php echo FOR_EXAMPLE_UA; ?><br>
                     <?php echo FOR_MORE_INFORMATION_OR_TO_SET_UP_AN_ACCOUNT_GO_TO; ?>: <a href="http://www.google.com/analytics" target="_blank">http://www.google.com/analytics</a>
                     </p>
                 </div>
                 <div class="col-lg-12">
                    <input type="submit" value="<?php echo SAVE;?>" class="btn-event2"/>
                    
                </div>
                 </div>
                                  
                </form>
                
                </div>
                </div>
                    
                 </div>
                 
                    
                 </div> <!-- LEFT CONTENT ENDS -->
                 
                 <!-- RIGHT CONTENT -->
                
                <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
                </div>    
                
            </div><!-- End container -->
    </section>
    
    
  </body>
</html>
