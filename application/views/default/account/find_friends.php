<script src="<?php echo base_url()?>js/jquery.form.js"></script>

<div id="json_error" class="alert alert-danger message" style="display: none;"></div>
<div id="json_success"  class="alert alert-success message" style="display: none;"></div>
<?php  if($error != '') { ?>  
    <div id="json_error" class="alert alert-danger message"><?php echo $error;?></div>
    <?php } elseif($msg=='verify') {?>
    <div id="json_success"  class="alert alert-success message"><?php echo $msg;?></div>
    
    <?php }elseif($msg == 'fail') {  ?>
    <div id="json_error" class="alert alert-danger"><?php echo $msg;?></div>
<?php }?>
 <?php if($success_msg){
        ?>
        <div class="alert alert-success message"><?php echo $success_msg; ?></div>
      <?php }?>
      <?php if($error_msg){
        ?>
        <div class="alert alert-danger message"><?php echo $error_msg; ?></div>
      <?php }?>
<section class="eventDash-head">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 test-contct test-cntr">
        <h1><?php echo MY_ACCOUNT; ?></h1>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right pt mt10 con-cntr">
        <div class="halfacc">
          <p><?php echo SecureShowData($site_setting['site_name']); ?> <?php echo ACCOUNT_SINCE; ?> <span><?php echo datetimeformat($user_info['created_at']);?> <?php echo timeFormat($user_info['created_at']); ?></span></p>
        <?php 
            if($user_info['ref_id']){
              $admin=getRecordById('users','id',$user_info['ref_id']);

              ?><p><?php echo THE_MAIN_ACCOUNT_HOLDER_IS;?> <span><?php echo SecureShowData($admin['email']);?></span></p>
            <?php } ?>
            </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container marTB50">
    
        
    <div class="row">
      <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="row">
          <div class="event-webpage col-xs-12 col-sm-12">
            <div class="red-event width100 "><h4><?php echo SOCIAL_FRIENDS; ?></h4></div>
              <div class="clear"></div>
          </div>
          <div class="col-sm-12 clearfix">
            <div class="tab my-event mb">
              <ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
                <li class="active">
                  <a href="#home" data-toggle="tab"><?php echo FACEBOOK; ?></a>
                </li>                
              </ul>
              <div class="tab-content responsive hidden-sm hidden-xs">
                <fb:login-button scope="public_profile,email,user_friends" onlogin="checkLoginState();">
                </fb:login-button>
                <div id="status"></div>
                <script>
                
                  function statusChangeCallback(response) {
                    console.log('statusChangeCallback');
                    console.log(response);
                    // The response object is returned with a status field that lets the
                    // app know the current login status of the person.
                    // Full docs on the response object can be found in the documentation
                    // for FB.getLoginStatus().
                    if (response.status === 'connected') {
                      // Logged into your app and Facebook.
                      access_token = response.authResponse.accessToken;
                      
                      testAPI(access_token);
                    } else if (response.status === 'not_authorized') {
                      // The person is logged into Facebook, but not your app.
                      document.getElementById('status').innerHTML = 'Please log ' +
                        'into this app.';
                    } else {
                      // The person is not logged into Facebook, so we're not sure if
                      // they are logged into this app or not.
                      document.getElementById('status').innerHTML = 'Please log ' +
                        'into Facebook.';
                    }
                  }

                  function checkLoginState() {
                    FB.getLoginStatus(function(response) {
                      statusChangeCallback(response);
                    });
                  }

                  window.fbAsyncInit = function() {
                    FB.init({
                      appId      : '199656537083869',
                      cookie     : true,
                      xfbml      : true,
                      version    : 'v2.6'
                    });

                    FB.getLoginStatus(function(response) {
                      statusChangeCallback(response);
                    });
                  };

                  (function(d, s, id){
                     var js, fjs = d.getElementsByTagName(s)[0];
                     if (d.getElementById(id)) {return;}
                     js = d.createElement(s); js.id = id;
                     js.src = "//connect.facebook.net/en_US/sdk.js";
                     fjs.parentNode.insertBefore(js, fjs);
                   }(document, 'script', 'facebook-jssdk'));

                  function testAPI(access_token) {
                    //console.log(access_token);
                    console.log('Welcome!  Fetching your information.... ');                    
                    FB.api('/me', function(response) {
                      console.log(response);
                      console.log('Successful login for: ' + response.name);
                      document.getElementById('status').innerHTML =
                        'Thanks for logging in, ' + response.name + '!';
                      friendAPI(access_token);
                    });

                    
                  }

                  function friendAPI(access_token) {
                    //FB.api('/me/friends', {fields: 'name,id,location,birthday'}, function(response){
                      //console.log(response);
                    //});
                    FB.api("/1753072148269901/attending", function (response) {
                      console.log(response);      
                    });
                    //console.log(access_token);
                     //$.getJSON('https://graph.facebook.com/100004822145029/friends?limit=100&access_token='+access_token, function(mydata) {
                       //console.log(mydata);
                     //});
                  }
                </script>
              </div>
            </div>
        </div>
      </div>
      </div>
      <!-- RIGHT CONTENT --> 
      <?php echo $this->load->view('default/common/account_sidebar');?> </div>
  </div>
  <!-- End container --> 
</section>
<script>
        $(document).ready(function(){
        $(".rover_tip").popover();
  });
  </script> 
<script>
        $(document).ready(function(){
        $(".edit").tooltip();
  });
  </script> 
<script type="text/javascript">
    function hideshow(which){
    if (!document.getElementById)
    return
    if (which.style.display=="block")
    which.style.display="none"
    else
    which.style.display="block"
    }
  </script>
</body></html>