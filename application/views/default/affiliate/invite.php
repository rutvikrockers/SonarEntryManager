<script src="<?php echo base_url().'js/jquery.tagsinput.js';?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'js/jquery.tagsinput.css';?>" />
<?php 
	if($error){ ?>
		<div class="alert alert-danger mar10"><?php echo $error; ?></div>
    <?php
	}
	?>
	<?php 
	if($success){ ?>
		<div class="alert alert-success mar10"><?php echo $success; ?></div>
    <?php } ?>
<?php 
	$data1['events_id'] = $id;
?>
<section>  
            <div class="container">
            	
              <div class="pt">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct">
                   <h1><?php echo SecureShowData($event['event_title']);?></h1>
            	</div>
                
              </div><!-- End pt -->
                
                <div class="clearfix"></div>
                
                
                <div class="festival pb"></div>
                
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p0-xs2  pt15 ">
                 <form name="add_attendee" class="event-title" action="<?php echo site_url('affiliate/invite/'.$id.'/'.$aff_id);?>" method="post" onsubmit='return valid()'>
                 <div class="row">    
                            
                <div class="event-webpage mt col-sm-12">
                	<div class="red-event width100 "><h4><?php INVITE_USERS_AFFILIATE_PROGRAM;?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                <div class="col-sm-12">
                <div class="event-detail clearfix">
                
             
                <div class="form-group pt clearfix">
                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                   <label><?php echo YOUR_NAME;?></label>
                 </div>
                 <div class="col-sm-7 col-xs-8 width-xs">
                 <input type="text" name="name" required value="<?php echo $name;?>" />
                 </div>
                 </div>
                 
                 <div class="form-group pt clearfix">
                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                   <label><?php echo EMAIL;?></label>
                 </div>
                 <div class="col-sm-7 col-xs-8 width-xs">
                 <input type="email" name="email" value="<?php echo SecureShowData($email);?>"  required />
                 </div>
                 </div>
                 
                 <div class="form-group pt clearfix">
                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                   <label><?php echo To;?></label>
                 </div>
                 <div class="col-sm-7 col-xs-8 width-xs">
                 <input type="text" id="tags" name="email_to" value="<?php echo SecureShowData($email_to);?>"  class="to" />
                 <?php echo NOTE_FOR_EMAIL_PRESS_TAB;?>
                 </br><div id="emailsInfo" class="error"></div>
                 </div>

                 </div>
                 
                <div class="form-group pt clearfix">
                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                   <label><?php echo SUBJECT; ?></label>
                 </div>
                 <div class="col-sm-7 col-xs-8 width-xs">
                 <input type="text" name="subject" value="<?php echo SecureShowData($subject);?>"  required/>
                 </div>
                 </div>
                 
                 <div class="form-group pt clearfix">
                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                   <label><?php echo YOUR_MESSAGE;?></label>
                 </div>
                 <div class="col-sm-7 col-xs-8 width-xs">
                 <textarea name="message" required><?php echo SecureShowData($message);?></textarea>
                 </div>
                 </div>
                 
                 <div class="col-sm-11 col-xs-11 width-xs p0">
                 <div class="col-sm-4 col-xs-6 save-btn pb fr clearfix browse">
                 <input type="submit" value="Invite" class="btn-event2"  />
                
                </div>
                </div>
               
                
                </div> <!-- event detail closes -->
                                
                </div>
                    
                 </div>
                    
                </form>
                
                 </div> <!-- LEFT CONTENT ENDS -->
                 
                <!-- RIGHT CONTENT -->
                 <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
                    
                
            </div>
            </div><!-- End container -->
            <div class="pb"></div>
    </section>
     <script>
    		$(document).ready(function(){
    		$(".rover_tip").popover();
	});
	</script>
    <script type="text/javascript">
        function valid()
        {   var emailsInfo = $("#emailsInfo");
            var email_reg_exp= /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
           if($('#tags').val()!='')
           {
            var cmmails = $('#tags').val().split(',');
                            for (var j = 0; j < cmmails.length; j++)
                            {
                               
                                var a = cmmails[j];
                                var filter = email_reg_exp;
           
                                if(a!=''){
                                        
                                    if(!filter.test(a)){
                                      $('#tagsInput').focus(); 
                                        emailsInfo.text("<?php echo ENTER_VALID_EMAIL_ADDRESS_PLEASE_CHECK; ?>");
                                        emailsInfo.addClass("error");
                                        return false;
                                    }                                    
                                }
                                    emailsInfo.text("");
                                    emailsInfo.removeClass("error");
                                } 
            }
            else
            {   
                emailsInfo.text("<?php echo EMAIL_REQUIRED; ?>");
                emailsInfo.addClass("error");
                return false;
            }          
        }
    </script>
    <script>
	$(document).ready(function(){
		$(".edit").tooltip();
        $('#tags').tagsInput({
                'defaultText':'Email',             
                'width':'100%'
        });
	});
	
	</script>
    <style type="text/css">
    .tagsinput span.tag{
        color: white !important;
        background: rgba(224, 51, 107, 0.73) !important;
        border: none!important;
    }
    .tagsinput span.tag a{
        color: white !important;
       
    }
    </style>
