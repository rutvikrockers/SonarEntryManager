<script src="<?php echo base_url()?>js/jquery.form.js"></script>  
<script type="text/javascript" src="<?php echo base_url();?>js/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<link href="<?php echo base_url();?>css/popup.css" rel="stylesheet" />
<script src="<?php echo base_url();?>js/jquery.magnific-popup.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
      
      $('.mfPopup').magnificPopup({
            type: 'ajax',
            overflowY: 'scroll'
      });
       
  });
</script>
<script>
 
$(document).ready(function(){
	$("#paypal_form").submit(function() { 
		dataString = $("#paypal_form").serialize();

	    $.ajax({
	           type: "POST",
	           dataType: 'json',
	           data: dataString,
	           url: '<?php echo site_url('referral/paypal_email');?>',
	           beforeSend: function() {
	           		$('#submit').val('Loading....');
	  		   },
	           success: function(data){
	              if(data.error){
	              	$('#emailerr').show();
	              	$('#emailsuc').hide();
	              	$('#emailerr').html(data.error);
	              }
	              if(data.success){
	              	$('#emailerr').hide();
	              	$('#emailsuc').show();
	              	$('#emailsuc').html(data.success);
	              }
	           },
	           complete: function(){
	           		$('#submit').val('Save');
	           }
	         });
	
	    return false; 
	});
	
	$("#referral_form").submit(function() { 
		dataString = $("#referral_form").serialize();

	    $.ajax({
	           type: "POST",
	           dataType: 'text',
	           data: dataString,
	           url: '<?php echo site_url('referral/create_referral');?>',
	           beforeSend: function() {
	           		$('#referral_btn').val('Loading....');
	  		   },
	           success: function(data){
	              $('#referral_link').val('');
	             $('#referral_div').html(data);
	           },
	           complete: function(){
	           		$('#referral_btn').val('<?php echo SAVE?>');
	           }
	         });
	
	    return false; 
	});
	
})
</script>

<section class="eventDash-head">
  	<div class="container">
    	<div class="row">              
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 test-contct test-cntr">
                <h1><?php echo MY_ACCOUNT; ?></h1>
          </div>
         
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right pt mt10 con-cntr">
        
            <div class="halfacc">
             <p><?php echo SecureShowData($site_setting['site_name']); ?> <?php echo ACCOUNT_SINCE; ?> <span><?php echo datetimeformat($user_data['created_at']);?> <?php echo timeFormat($user_data['created_at']); ?></span></p>
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
                <div class="red-event width100 ">
                 <h4><?php echo $site_setting['site_name']; ?><?php echo REFERRAL_PROGRAM;?></h4>
                </div>
                <div class="clear"></div>
            </div><!-- End event-webpage -->
            
                <div class="admin">    
                </div>
        
            
            <div class="col-sm-12 clearfix">
                <div class="event-detail event-detail2 clearfix pd15">
                <form class="event-title" name="referral_form" id="referral_form" action="" method="post">
                    
                    <div class="form-group clearfix">
                            <div class="order-details event-webpage">
                   <div class="col-sm-4 col-md-5 col-lg-4 col-xs-12 width-xs p0">
                   <div class="red-one red-one2 pt pb text-center col-sm-3 col-xs-3 width-xs p0"><h4>1.</h4></div>
                   <div class="col-sm-9 col-xs-8 order-info text-left">
                   <label class="m0"><?php echo CREATE_UNIQUE_LINK;?></label><br>
                   <span><?php echo base_url().'referral/index/';?></span>
                   </div>
                   </div>
                            <div class="col-sm-4 col-xs-6 pleft0">
                                <input type="text" name="referral_link" id="referral_link">
                            </div>
                            <div class="col-sm-3 col-xs-6 pright0">
                             <div class="clearfix hover-btn">
                             <input type="submit" value="<?php echo SAVE?>" id="referral_btn" class="btn-event2">
                            </div>
                            </div>
                            
                    </div>        
                    </div>
                    
                    <div class="form-group m0 clearfix">
                    <div class="order-details event-webpage">
                   <div class="col-sm-12 col-xs-12 width-xs p0">
                   <div class="red-one red-one2 pt pb text-center col-sm-3 col-xs-3 width-xs p0"><h4>2.</h4></div>
                   <div class="col-sm-9 col-xs-8 order-info text-left">
                   <label class="m0"><?php echo PROMOTE_YOUR_LINKS;?></label><br>
                   <span><?php echo EXAMPLES_YOUR_WEBSITE_EMAIL_EVENT_HOLDERS;?></span>
                   </div>
                   </div>
                            
                    </div>        
                    </div>
                    
                   <div id="referral_div"> 
                    <?php 

                    if($referral){
                        foreach ($referral as $value) {
                            $id = $value['id'];
                            $site_visits = $value['site_visits'];
                            $sign_up = $value['sign_up'];

                            $link = $value['link'];
                        
    
                            $p_data=getreferral_data($link);
                          
                         
                            $sales ='';$shares='';$paid='';$due='';
                            if(is_array($p_data))
                            {
                               foreach($p_data as $vall)
                               {
                              
                                 if(is_array($vall))
                                 {                     
                                    if( $sales=='') { $sales= $vall['currency_symbol'].$vall['sales']; }
                                    else { $sales.=",".$vall['currency_symbol'].$vall['sales']; }
                                 }
                                 if(is_array($vall))
                                 {
                                    if( $shares=='') { $shares= $vall['currency_symbol'].$vall['shares']; }
                                    else { $shares.=",".$vall['currency_symbol'].$vall['shares']; }
                                 }

                              }
                            } 

                          if(!$sales)
                          {
                            $sales ='0.00';
                          } 
                          if(!$shares)
                          {
                            $shares = '0.00';

                          }

                          $p_get1 = getreferral_data_status($link,0);
                          $p_get = getreferral_data_status($link,1);
                          if(is_array($p_get))
                          {
                            foreach($p_get as $vall)
                            {                            
                                if(is_array($vall))
                                {                              
                                  if( $paid=='') { $paid= $vall['currency_symbol'].$vall['shares']; }
                                  else { $paid.=",".$vall['currency_symbol'].$vall['shares']; }
                                }
                             }
                            } 
                            if(is_array($p_get1))
                            {
                              foreach($p_get1 as $vall)
                              {                              
                                if(is_array($vall))
                                {                                
                                  if( $due=='') { $due= $vall['currency_symbol'].$vall['shares']; }
                                  else { $due.=",".$vall['currency_symbol'].$vall['shares']; }
                                }
                              }
                            } 
                        ?>
                      <!-- code is end here -->

                      <!-- end by Jaimin -->

                    <div class="form-group clearfix mar10">
                      <div class="col-sm-3 col-xs-12 p0-xs0 lable-rite">
                          <label><?php echo REFERRAL_LINK;?></label>
                      </div>
                      <div class="col-sm-8 col-xs-12 pright0 p0-xs0 del-icon icon3">
                          <input type="text" readonly="readonly" value="<?php echo site_url('referral/index/'.$link.'/'.$user_id);?>" >
                          <a href=""><i class="glyph-copy edit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Copy"></i></a>
                       </div>
                    </div>
                    <div class="form-group clearfix">  
                    <div class="col-sm-12 col-xs-12 p0">
                    
                    <table class="table table_res mb0 event-info contct-table">
                        <thead>
                            <tr>
                               <th style="display:none">Id</th>
                                <th><?php echo SITE_VISITS;?></th>
                                <th><?php echo ACCOUNT_SIGNUPS; ?></th>
                                <th><?php echo SALES;?></th>
                                <th><?php echo YOUR_SHARE;?></th>
                                <th><?php echo PAID;?></th>
                                <th><?php echo DUE;?></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <tr>
                               <td style="display:none"><?php echo $id;?></td>
                                <td><?php echo SecureShowData($site_visits);?></td>	
                                <td><?php echo SecureShowData($sign_up);?></td>                            
                                <td><?php echo SecureShowData($sales); ?></td>
                                <td><a href="<?php echo site_url('account/my_get_data').'/'.$link;?>" class="mfPopup"><?php echo SecureShowData($shares);?></td></a>
                                <td><?php echo $paid;?></td>
                                <td><?php echo $due;?></td>
                            </tr>

                        </tbody>
                            
                    </table>
             </div>
             </div>
                    <?php	
                        }	
                    }
                    ?>
           
                    </div>
                        
                </form>
                
                 </div><!-- end event-detail -->
           </div>  
            
          </div><!-- End Row-->                  
                      
           <div class="row">    
                        
            <div class="event-webpage col-xs-12 pt col-sm-12">
                <div class="red-event width100 "><h4><?php echo PAYPAL_ACCOUNT;?></h4></div>
                <div class="clear"></div>
            </div><!-- End event-webpage -->

            <div class="admin"></div>
        
            <div class="col-sm-12 clearfix">
                
                <div class="alert alert-danger mar10" style="display: none" id="emailerr"></div>
                <div class="alert alert-success mar10" style="display: none" id="emailsuc"></div>
            
                <div class="event-detail event-detail2 pd15">
                
                    <p class="p0 reg"><?php echo PLEASE_PAYPAL_ACCOUNT_REFERRAL_ACCOUNT_BOUNCES_DEPOSITED_PAYPAL_ACCOUNT;?><span><a href="https://www.paypal.com" target="_blank">create one now</a></span></p>
                    <form class="event-title" name="paypal_form" id="paypal_form" method="post" action="<?php echo site_url('referral/paypal_email');?>">
                    
                    <div class="form-group clearfix">
                    <div class="order-details event-webpage">
                    <div class="col-sm-3 col-md-4 col-lg-3 col-xs-12 width-xs p0">
                    <div class="col-sm-12 col-xs-12 pright0 pb10-xs order-info text-left">
                    <label><?php echo PAYPAL_EMAIL_ADDRESS;?></label>
                    </div>
                    </div>
                            <div class="col-sm-4 col-xs-6">
                                <input type="text" name="email" id="email" placeholder="example@email.com" value="<?php echo SecureShowData($user_data['ref_pay_account']);?>">
                            </div>
                            <div class="col-sm-3 col-xs-6">
                             <div class="clearfix hover-btn">
                             <input type="submit" value="<?php echo SAVE?>" name="submit" id="submit" class="btn-event2">
                            </div>
                            </div>
                            
                    </div>        
                    </div>
                   
                </form>
                
                 </div><!-- end event-detail -->
           </div>      
            
          </div> <!-- End 2nd row -->
                     
       </div><!-- End col-sm-8 -->          
            <!-- RIGHT CONTENT -->
             <?php echo $this->load->view('default/common/account_sidebar');?>
         </div>            
        </div><!-- End container -->
</section>