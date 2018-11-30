<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo "Newsletter Setting"; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php 
				if($error!= '')
				{ ?>
					
                    		<div class="alert alert-danger" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<?php echo $error;?>
                            </div> 
				<?php } ?>  
				
              <?php
								
								$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting');	
								echo form_open('admin/newsletter/send_testing_newsetter/',$attributes);

				 ?>   
              
 				     
			  <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                    <div class="panel-heading">
                          			<?php echo 'Newsletter Setting'; ?>                      
                            </div>
                        <div class="panel-body">
                        	
                        	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo "Receiver Email"; ?></label>
                                    </div>
                                    <div class="col-sm-6">
                                    	<input type="text" name="receiver_email" class="form-control"/>
                                    </div>
                            </div>
                            
                           
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo "Message"; ?></label>
                                    </div>
                                    <div class="col-sm-6">
                                    	<textarea cols="20" rows="10" name="message_text" class="form-control"></textarea>
                                    </div>
                            </div>
                                
                        </div>
                   	
                 </div>
                 
                 
                 	
                </div><!-- col-lg-12  -->
           
            </div>
           		<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo "Send Mail";?></button>
            	</div>
            	
            </form>
</div>
</div>
        <!-- /#page-wrapper -->
</body>
</html>
