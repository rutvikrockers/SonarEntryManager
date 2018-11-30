<style type="text/css">  
.clr_size{  
    width: 50px;
    height: 20px;   
    display: block;
} 
</style>
<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
               <div class="col-lg-8 col-xs-12 clearfix">
                    <h1><?php echo CALENDER_SETTING; ?>  <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>
                 <div class="page-header border clearfix"></div>
                 <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> <?php echo CALENDER_SETTING; ?>
                    </li>
                </ol>
            </div>
            <?php if($msg == 'update') { ?>
                        
                            <div class="alert alert-success" role="alert">
                            <button class="close" data-dismiss="alert">x</button>
                            <strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_UPDATED;?>
                            </div>
            
            <?php } ?>
             <?php
		 				$attributes = array('name'=>'frm_listpage','id'=>'frm_listpage');
						
						echo form_open('admin/site_setting/calender_list/', $attributes);

		 	?>
			<input type="hidden" name="action" id="action" />  
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                    	<div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            
                            	<div class="table-responsive">
                                  
                                  <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Color</th>
                                            <th class="sorting_disabled"><?php echo ACTION; ?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result)
											{
											foreach($result as $row)
												{
													
                                                    $id = $row['id'];
													$name=$row['name'];
													$event_bg_color = $row['event_bg_color'];
									           ?>
                                        <tr class="odd gradeX">
                                           	<td><?php echo SecureShowData($name); ?></td>
                                            <td><span id="color" class="clr_size" style="background-color:<?php echo $event_bg_color; ?>"></span></td> 
                                            <td> <?php echo anchor('admin/site_setting/edit_calender_setting/'.$id.'/',EDIT);?></td>
                                        </tr>
                                        <?php 
										
												}
											}	
										?>
                                    </tbody>
                                </table>
                                
                                </div>
                               
                                
                                </div>
                         </div>
                   	</div>
                 </div>
                </div>
            </div>
    </form>
</div>

    </div>
</body>
<script>
$(document).ready(function(){
		$('#sample_1').dataTable();
		
	});
</script>
<script>
    $(document).ready(function() {
    
	$('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
        
</script>
</html>
