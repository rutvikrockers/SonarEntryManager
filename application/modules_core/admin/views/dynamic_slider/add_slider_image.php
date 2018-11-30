<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo NEW_SLIDER_IMAGE; ?></h1>
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
							<strong><?php echo ERRORS; ?>!</strong> <?php echo $error;?>
                            </div> 
				<?php } ?>   
                <?php
								
								$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting', 'enctype' => 'multipart/form-data');	
								echo form_open('admin/dynamic_slider/add_slider_image/',$attributes);

				 ?>   
                   
			  <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-body">
                             
                           <!-- add by jaimin -->
                             <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo SLIDER_TEXT.'1'; ?></label>
                                    </div>
                                <div class="col-sm-9">
                                        <input class="form-control" type="text" name="text1" value="<?php echo SecureShowData($text1);?>">
                                    </div>
                                </div>

                                <!-- end by jaimin -->
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo SLIDER_TEXT.'2'; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="text2" value="<?php echo SecureShowData($text2);?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo SLIDER_TEXT.'3'; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" value="<?php echo $text3;?>" type="text" name="text3">
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo LINK; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="link" value="<?php echo $link;?>">
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo LINK_NAME; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="link_name" value="<?php echo SecureShowData($link_name);?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="image_status">
                                                <option value="1" ><?php echo ACTIVE; ?></option>
                                            	<option value="0" ><?php echo INACTIVE; ?></option>
                                        </select>
                                    </div>
                                </div>
                                

                               <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo SLIDER_IMAGE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input type="file" name="slider_image">
                                    </div>
                                </div> 
                                
                        </div>
                	 </div>
                </div><!-- col-lg-12  -->
            </div>
            <?php if(DEMO_MODE=="0"){ ?>
           		<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo ADD_IMAGE;?></button>
            	</div>
            <?php } ?>
            </form>
</div>
</div>
        <!-- /#page-wrapper -->
</body>
</html>
