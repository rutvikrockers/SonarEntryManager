<script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script>
	$(document).ready(function(){
       
        
		$('.edit_event').click(function(){			
			var update = $(this).parent().parent().parent().parent().find('#updates').html();
			
			CKEDITOR.instances.update.setData(update);
			var update_id_value = $(this).parent().parent().parent().parent().find('#update_id').val();
			
			$('#single_update_id').val(update_id_value);
			
		});
		$('#delete').click(function(){
			
		});
	});
	
</script>
<style>
	.red-event .date_left{
		float: left;
	}
	.editdelt-icon{
		float: right;
	}
</style>
<?php $this->load->view('default/common/dashboard-header')?>
<section>  
	<?php
$data1['events_id'] = $id;
?>
            <div class="container marTB50">
            	<div class="row">
                
                <div class="col-md-8 col-sm-12">
                                
                 <div class="row">    
                            
                <div class="event-webpage col-sm-12">
                	<div class="red-event width100 "><h4><?php echo ADD_NEWS_UPDATES;?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                <div class="col-sm-12">
                <div class="event-detail clearfix">
                	
                	<?php if($error){?>
                		 <div class="alert alert-danger mar10"><?php echo $error; ?></div>
                	<?php } ?>
                	
                	<?php if($success){?>
                		 <div class="alert alert-success mar10"><?php echo $success; ?></div>
                	<?php } ?>
                
                <form class="event-title" name="event_update" id="event_update" method="post" action="<?php echo site_url('event/event_update/'.$id);?>">
                
				<div class="form-group pt clearfix ">
                    
                    <div class="col-sm-12 col-xs-12 text-editor">
                    	<textarea name="update" id="update"></textarea>
                    	<script type="text/javascript">
            				 CKEDITOR.replace('update',

                          {

                                                   filebrowserBrowseUrl :'<?php
                               echo base_url();
                               ?>ckeditor/filemanager/browser/default/browser.html?Connector=<?php
                               echo base_url();
                               ?>ckeditor/filemanager/connectors/php/connector.php',



                                                   filebrowserImageBrowseUrl : '<?php
                               echo base_url();
                               ?>ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php
                               echo base_url();
                               ?>ckeditor/filemanager/connectors/php/connector.php',



                                                   filebrowserFlashBrowseUrl :'<?php
                               echo base_url();
                               ?>ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php
                               echo base_url();
                               ?>ckeditor/filemanager/connectors/php/connector.php',

                                                   filebrowserUploadUrl  :'<?php
                               echo base_url();
                               ?>ckeditor/filemanager/connectors/php/upload.php?Type=File',



                                                   filebrowserImageUploadUrl : '<?php
                               echo base_url();
                               ?>ckeditor/filemanager/connectors/php/upload.php?Type=Image',



                                                   filebrowserFlashUploadUrl : '<?php
                               echo base_url();
                               ?>ckeditor/filemanager/connectors/php/upload.php?Type=Flash'

                   });

        				</script>
                   
                   </div>
                   <input type="hidden" id="single_update_id" name="single_update_id" value="" />
               </div>
               <div class="col-sm-4 col-xs-6 mb add-question fr clearfix browse">
               	<input type="submit" value="<?php echo ADD_UPDATE_;?>" class="btn-event2">
                 
                </div>
                   
                </form>
                
                </div> <!-- event detail closes -->
                
                </div>
                    
                 </div>
                 
                 <?php if($updates){
                    		foreach ($updates as $update) {
                    			$one_update =SecureShowData($update['updates']);
								$update_id = $update['id'];
								$created_at = $update['created_at'];
								
								$time  = strtotime($created_at);
								$day   = date('d',$time);
								$month = date('M',$time);
								$year  = date('Y',$time);
								$time  = date('g:i a',$time);
								?>
                 <div class="row">    
                            
                <div class="event-webpage mt col-sm-12">
                	<div class="red-event clearfix "><h4 class="date_left">
                            <?php echo datetimeformat($created_at).' '.timeFormat($created_at); ?>
                    </h4>
                		<div class="editdelt-icon">
                    		<a href="javascript://" class="glyphicon glyphicon-pencil icon-back edit edit_event" data-toggle="tooltip" data-placement="bottom" title="Edit"></a>
                       	 	<a href="<?php echo site_url("event/delete_news/".$id.'/'.$update_id);?>" class="glyphicon glyphicon-trash icon-back edit delete_event" data-toggle="tooltip" data-placement="bottom" onclick="return confirm('<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_RECORD;?>')" title="Delete"></a>
                    	</div>

                	</div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                <div class="col-sm-12">
                <div class="event-detail mb0 clearfix">
                
                <form class="event-title">
				<div class="form-group pt clearfix ">
                    <div class="col-sm-12 col-xs-12 text-editor">
						<div id="updates"><?php echo $one_update;?></div>
						<input type="hidden" name="update_id" id="update_id" value="<?php echo $update_id;?>">								
								
                   </div>
               </div>
                </form>
                
                </div> <!-- event detail closes -->
                
                </div>
                    
                 </div>
                 <?php
							
						}
                    	} ?>
                 
             </div>
             
                <!-- RIGHT CONTENT -->
                <?php $this->load->view('default/common/event_dashboard_sidebar',$data1); ?>
              </div>      
                
            </div><!-- End container -->
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