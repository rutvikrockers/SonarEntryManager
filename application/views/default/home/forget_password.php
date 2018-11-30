    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/validation.css"/>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/additional-methods.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.maskedinput.js"></script>
    
    <script>
    $( document ).ready(function() {
    	$( "#forget_form" ).submit(function(event){ 
    		var email = $('#femail').val();
    
    		if(!email){
 			
 				$('#femail').closest('.form-group').addClass('has-error');
 				$('#femail').closest('label').addClass('control-label');
 				$('#femail').addClass('form-control');
 				return false;
 			}
 			
    	});
 		
	});	
    	
    </script>
    
    <section>  
            <div class="container marTB50">
            	<div class="row">
                    <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
                    	<div class="loginBox">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo FORGET_PASSWORD;?></h3>
                                    <p><?php echo ENTER_YOUR_EMAIL_ADDRESS_AND_SEND_YOU_LINK_TO_RESET_YOUR_PASSWORD;?></p>
                                </div>
                                <div class="panel-body">
                                	<?php if($error!=''){
                        			?>
                        			<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> <?php echo $error; ?></div>
                        		<?php 	
                        		}?>
                            	
                            
                            	<form class="event-title" name="forget_form" id="forget_form" method="post" action="<?php echo site_url('home/forget_password');?>">
                                
                                 <div class="form-group">
                                 	 <input type="text" placeholder="Email" name="femail" id="femail" class="form-control">                                
                        		</div>
                                <div class="text-right">
	                                <input type="submit" name="submit" value="<?php echo SUBMIT;?>" class="btn-event2">	
                                </div>
                                
                                
                                </form>
                                <div class="backLink"><a href="<?php echo site_url('home/login');?>"><?php echo RETURN_TO_LOG_IN;?></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            
            	 
                
            </div><!-- End container -->
    </section>
     <script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
    <script>
    		$(document).ready(function(){
    		$(".rover_tip").popover();
	});
	</script>
	<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#datepicker1').datepicker({
                    format: "dd/mm/yyyy",
					orientation: 'top'
                });
				
            });
			
			$(document).ready(function () {
                
                $('#datepicker2').datepicker({
                    format: "dd/mm/yyyy",
					orientation: 'top'
                });
				
            });
        </script>