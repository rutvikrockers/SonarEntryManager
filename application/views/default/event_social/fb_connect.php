
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

<?php if($success_msg){ ?>
        <div class="alert alert-success message"><?php echo $success_msg; ?></div>
<?php }?>
<?php if($error_msg){ ?>
        <div class="alert alert-danger message"><?php echo $error_msg; ?></div>
<?php }?>
<section class="mainBGColor" id="eventDesign">   
    <div class="container marTB50">
        <div class="row">
        <div class="col-md-8 col-sm-12"> 
        <div class="fb_event-area">
          <ul class="fb_event">
            <li><h2><span>1</span> <?php echo EVENT;?>: <?php echo SecureShowData($event_title);?></h2></li>
            <li><h2><span>2</span> <?php echo CONNECT_WITH_FACEBOOK?></h2></li>
            <li>        
              <p>Please connect to your facebook account that has admin access to the page you want the widget to appear</p>

                <div class="btn-common">
                   <a href="<?php echo $login_url;?>" class="facebook_icon">
                   <img src="<?php echo base_url();?>images/iconFB.png" alt=" " height=" " width=" " >
                   <span><?php echo CONNECT_WITH_FACEBOOK?></span>
                   </a>
               </div>
             </li>
            </ul>
          </div>

     </div>
        
        
        <!-- RIGHT CONTENT -->
       <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
        </div>
        
    </div><!-- End container -->
</section>