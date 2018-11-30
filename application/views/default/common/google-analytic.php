<?php 
    
    $data1['events_id'] = $id;
    
    $ctype = $single_forms['ctype'];
    $ticketss = $single_forms['tickets'];
    $prefix = $single_forms['prefix'];
    $first_name = $single_forms['first_name'];
    $last_name = $single_forms['last_name'];
    $suffix = $single_forms['suffix'];
    $email = $single_forms['email'];
    $home_phone = $single_forms['home_phone'];
    $cell_phone = $single_forms['cell_phone'];
    $billing_address = $single_forms['billing_address'];
    $home_address = $single_forms['home_address'];
    $shipping_address = $single_forms['shipping_address'];
    $job_title = $single_forms['job_title'];
    $company = $single_forms['company'];
    $work_address = $single_forms['work_address'];
    $work_phone = $single_forms['work_phone'];
    $website = $single_forms['website'];
    $blog = $single_forms['blog'];
    $gender = $single_forms['gender'];
    $birth_date = $single_forms['birth_date'];
    $age = $single_forms['age'];
    $title_of_page = $single_forms['title_of_page'];
    $instructions = $single_forms['instructions'];
    $time_limit = $single_forms['time_limit'];
    $management = $single_forms['management'];
    $return_policy = $single_forms['return_policy'];
    
?>

<section>  
    <div class="container">            
        <div class="pt">
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct">
               <h1><?php echo SAVE_WATER;?></h1>
            </div>
                                        
        </div><!-- End pt -->
                
        <div class="clearfix"></div>
                
        <div class="festival pb"></div>
        <?php 
        if($error!= '')
        { ?>
            
            <div class="alert alert-danger" role="alert">
            <button class="close" data-dismiss="alert">x</button>
            <strong><?php echo ERRORS; ?>!</strong> <?php echo $error;?>
            </div> 
  <?php } 
        if($success)
        { ?>
            <div class="alert alert-success" role="alert">
            <button class="close" data-dismiss="alert">x</button>
             <?php echo $success;?>
            </div>             
<?php   } ?>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p0-xs2  pt15 ">
                                
            <div class="row">    
                            
                <div class="event-webpage col-sm-12">
                    <div class="red-event width100 "><h4><?php echo MANAGE_YOUR_INVITATIONS; ?></h4></div>
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
                     <p><?php echo IF_YOU_USE_GOOGLE_ANALYTICS_ENTER_YOUR_FULL_UA_NUMBER; ?> <br>
                     <?php echo FOR_EXAMPLE_UA; ?><br>
                     <?php echo FOR_MORE_INFORMATION_OR_TO_SET_UP_AN_ACCOUNT_GO_TO; ?>: <a href="http://www.google.com/analytics">http://www.google.com/analytics</a>
                     </p>
                 </div>
                 <div class="col-sm-3 col-xs-4 save-btn fl clearfix browse">
                    <input type="submit" value="<?php echo SAVE;?>" class="btn-event2"/>
                    
                 </div>
             </div>
                                  
        </form>
                
        </div>
    </div>
            
 </div>
                 
                    
</div> 
<!-- LEFT CONTENT ENDS -->
                 
    <!-- RIGHT CONTENT -->                
    <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
                                    
</div><!-- End container -->
            <div class="pb"></div>
    </section>    
  </body>
</html>
