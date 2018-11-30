
<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_SLIDER_IMAGE; ?></h1>
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
								echo form_open('admin/dynamic_slider/edit_slider_image/'.$id,$attributes);

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
                                    	<input class="form-control" value="<?php echo SecureShowData($text3);?>" type="text" name="text3">
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
                                        <input class="form-control" type="text" name="link_name" value="<?php echo $link_name;?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="image_status">
                                                <option value="1" <?php if($active == 1) { echo "selected"; }?> ><?php echo ACTIVE; ?></option>
                                            	<option value="0" <?php if($active == 0) { echo "selected"; }?> ><?php echo INACTIVE; ?></option>
                                        </select>
                                    </div>
                                </div>
                                

                               <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo SLIDER_IMAGE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input type="file" name="slider_image"> 
                                    
                                     <?php 
										if(file_exists('upload/home_banner/'.$slider_image))
										 { ?>
                                        <video src="<?php echo base_url();?>upload/home_banner/<?php echo $slider_image; ?>" height="100" width="200"/></video>
                                        <?php }else { ?>
                                        <img src="<?php echo base_url(); ?>upload/home_banner/no_img.jpg" alt=" " height="100" width="100" >
                                        <?php } ?>
                                        </div>
                                </div> 
                                
                        </div>
                	 </div>
                </div><!-- col-lg-12  -->
            </div>
            <?php if(DEMO_MODE=="0"){ ?>
           		<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo EDIT_IMAGE;?></button>
                   <a href="<?php echo site_url();?>admin/dynamic_slider/dynamic_slider_list" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
            	</div>
            <?php } ?>
            </form>
</div>
</div>
        <!-- /#page-wrapper -->
</body>
</html>
