<script type="text/javascript">
    $( document ).ready(function() {

        $('#name').change(function(){
            
            image_name = $('#name').val();
            if(image_name !=""){
                $("#image_button").prop( "disabled",false);
            }
            else{
                $("#image_button").prop( "disabled", true );
            }
            var getImageUrl= '<?php echo site_url('admin/preferences/ajax_image_generate')?>/'+image_name;
            $.ajax({
                url: getImageUrl,
                dataType: 'text',
                type: 'POST',
                timeout: 99999,
                global: false,
                data: '',
                success: function(data)
                {
                    $('#image_generate_div').html(data);
                    
                },      
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                
                }
            });
        }); 
    
    $( "#image_button" ).prop( "disabled", true );

    });

</script>
<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                    <h1><?php echo REGENERATE_THUMBNAILS; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <?php 
				if($msg == 'update')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_UPDATED;?>
                            </div>
			
			<?php } ?>
            
                <?php
								
								$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting' );	
								echo form_open('admin/preferences/generate_thumb/',$attributes);

				 ?>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo IMAGE_SETTING; ?>
                        </div>
                        <div class="panel-body">
                           
                                                            
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo IMAGES_NAME; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="name" id="name">
                                        <option value="" selected="selected">All</option>
                                        <?php 
                                        if($result){
                                        
                                            foreach($result as $row){
                                                $name = $row['name']; ?>
                                                 <option value="<?php echo SecureShowData($name);?>"><?php echo SecureShowData($name); ?></option>
                                            <?php }
                                        }
                                            ?>    
                                       </select>
                                    </div>

                                </div>
                            <div id="image_generate_div">
                            </div>
                                
                            
                        </div>
                   	
                 </div>
                 
                 <?php if(DEMO_MODE=="0"){ ?>
                 	<div class="text-center">
                 		<button type="submit" class="btn btn-default btn-lg" id="image_button"><?php echo REGENERATE_THUMBNAILS; ?></button>
                    </div>
                <?php } ?>
                </div><!-- col-lg-12  -->
           
            </div>
            <!-- /.row -->
</div>
</div>
        <!-- /#page-wrapper -->

    <!-- /#wrapper -->

   
</body>

</html>
