
<?php 

$data1['events_id']=$id;

$event_status = $event_data['active'];
$event_title = $event_data['event_title'];
$venue_id = $event_data['venue_id']; 
$street_address = $event_data['street_address'];
$event_start_date_time = datetimeformat($event_data['event_start_date_time']);
$is_delete = delete_check($event_status);

?>

<?php $this->load->view('default/common/dashboard-header')?>
<?php
   		if($error!=''){ ?>
		 	<div class="alert alert-danger message"><?php echo $error; ?></div>
             <?php
		}?>

<section class="mainBGColor" id="eventDesign">   
    <div class="container marTB50">
        <div class="row">
        <div class="col-md-8 col-sm-12"> 
          <div class="fb_event-area">
         	 <ul class="fb_event">
            <li><h2><span>1</span> <?php echo EVENT;?>: <?php echo $event_title;?></h2></li>
            <li><h2><span>2</span> <?php echo SELECT_FAN_PAGE;?></h2></li>
            <li>        
              <p>The following pages that <?php echo $user_detail['name'];?>	 has admin access to</p>
            
              	
              
                 <?php 
                  if($user_pages){
                  	foreach ($user_pages as  $value) {
                  		$page_name=$value['name'];
                  		$page_id=$value['id'];
                  		$category=$value['category'];
                  		$page_access_token=$value['access_token'];
                  		?>
                  	<h2>
                    
                    <a  href="<?php echo site_url('event_social/create_tabs/'.$id.'/'.$page_id.'/'.$page_access_token);?>" ><?php echo SecureShowData($page_name); ?></a>
                    </h2>
                  		
					<?php
                  		}
                  }

                   ?>
                    <p>
                      <a href="<?php echo site_url('event_social/fb_document'); ?>">Click here</a> & follow the steps to post your ticket on your facebook page and paste the following code in <i><b>secure_page_tab_url</b></i> that you will find in document.
                    </p>
                    <p>Secure page tab url link : <br/>
                    <?php echo site_url('manage_event/customform_new/'.$event_data['event_url_link']); ?>
                    </p>
                   <p>Can’t find your pages? <a href="<?php echo $logout_url;?>"> <?php echo USE_DIFFERENT_ACCOUNT; ?></a> or make sure the current account has admin access to the facebook page you are looking for.</p>
             </li>
            </ul>
          </div>
         </div>
                  
                  				
        
        
        <!-- RIGHT CONTENT -->
       <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
        </div>
        
    </div><!-- End container -->
</section>
