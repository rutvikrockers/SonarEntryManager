<!--code add by Darshan start-->
<style type="text/css">
   .dropdown-menu{

}
    a.tooltip {
        outline:none;
        opacity: 1; 
    }
    a.tooltip strong {line-height:30px;}
    a.tooltip:hover {text-decoration:none;} 
    a.tooltip span {
        z-index:10;
        display:none; 
        padding:14px 20px;
        margin-top:28px; 
        margin-left:-40px;
        width:300px; 
        line-height:16px;
    }
    a.tooltip:hover span{
        display:inline; 
        position:absolute; 
        border:2px solid #FFF;  
        color:#EEE;
        background:#333 url(../images/css-tooltip-gradient-bg.png) repeat-x 0 0;
    }
    .callout {
        z-index:20;
        position:absolute;
        border:0;top:-14px;
        left:120px;
    }
    
    /*CSS3 extras*/
    a.tooltip span
    {
        border-radius:2px;        
        box-shadow: 0px 0px 8px 4px #666;
        /*opacity: 0.8;*/
    }
</style>
<?php 
 $site_image = site_setting();
 $site_logo =  $site_image['site_logo'];
 $site_logo_hover =  $site_image['site_logo_hover'];
 $site_name =  $site_image['site_name'];
 
 $maintenance_setting = maintenance_setting();
 $site_mode = $maintenance_setting['site_mode'];

?>
<script type="text/javascript">
  $(document).ready(function(){
  $('#logo').hover(function(){
   $('#logo').attr('src','<?php echo base_url(); ?>admin_images/<?php echo $site_logo_hover;?>');
    },function(){
    $('#logo').attr('src','<?php echo base_url(); ?>admin_images/<?php echo $site_logo;?>');
  });
  $('[data-toggle="tooltip"]').tooltip();  
}); 
  
</script>

  <!--code add by Darshan end-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand" href="<?php echo site_url('admin/home/dashboard')?>"><img src="<?php echo base_url(); ?>admin_images/<?php echo $site_logo;?>" alt=" "  id='logo' class="logo-size" ></a> 
                
            </div>
            <!-- /.navbar-header -->
            <?php   $admin_id = check_admin_authentication();
                    $admin_email = getRecordById('admin_users','id',$admin_id);
                    $email = $admin_email['email'];
                    $username = $admin_email['username'];
                    $last_sign_in_ip = $admin_email['last_sign_in_ip'];
            ?>

            <ul class="nav navbar-right top-nav">
            <?php if($site_mode == 1 ) { ?>
              <li class="dropdown">
                  <a href="#" class="tooltip">
                    <?php echo SecureShowData($site_name); ?> — Maintenance mode
                    <span>
                        <img class="callout" src="<?php echo base_url(); ?>images/callout_black.gif" alt="callout" />
                        <p class='text-left text-nowrap'><strong>Your Site is in maintenance.</strong></p><p class='text-left'>Your visitors and customers cannot access your site while in maintenance mode.<br /> To manage the maintenance settings, go to Preferences > Maintenance.</p>
                    </span>
                 </a>
              </li>
            <?php } else {?>
            <?php } ?>
              <li class="dropdown">
                    <a href="<?php echo site_url();?>admin/message"><i class="fa fa-envelope"></i></a>
                </li> 

                <?php 
                $ver_check=check_latest_version();
                     $version_data = latest_version(5);
                     $no_of_versions = count($ver_check); 
                ?>

              <li class="dropdown">
                 <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php if($username !="") {?> <?php echo $username; ?> <?php } else { ?> <?php echo $email; ?> <?php }?><b class="caret"></b></a>
                    <ul class="dropdown-menu" style="width: 260px;">
                    <li><a href="<?php echo site_url();?>admin/home/dashboard"><i class="fa fa-dashboard fa-fw"></i> <?php echo DASHBOARD; ?></a></li>
                    <li><a href="<?php echo site_url();?>admin/home/change_password"><i class="fa fa-lock fa-fw"></i> Change Your Password</a></li>
                    <li><a href="<?php echo site_url();?>admin/home/logout" style="text-align: center;"><i class="fa fa-fw fa-power-off"></i> Log out</a></li>
                    </ul>
              </li>
            </ul>
            <!-- /.navbar-top-links -->

            
            <!-- /.navbar-static-side -->
        </nav>
        <?php $this->load->view('common/sidebar'); ?>