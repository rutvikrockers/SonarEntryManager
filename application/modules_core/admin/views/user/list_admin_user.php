<style>
.disabled {
    /*Disabled link style*/
     cursor:no-drop;
}
</style>
<script type="text/javascript" language="javascript">

	function delete_rec(id,offset)
	{
		var ans = confirm('<?php echo ARE_YOU_SURE_TO_DELETE_ADMIN_USER ?>');
		if(ans)
			{
				location.href = "<?php echo site_url('admin/admin_user/delete_admin_user/'); ?>"+"/"+id+"/";

			}else{

			return false;

			}
	}
</script>  
<?php $admin_id = check_admin_authentication();
   $admin_type= $this->session->userdata('admin_type'); 
              ?>   
     <div id="page-wrapper">
     	<div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-xs-12 clearfix">
                    <h1><?php echo ADMIN;?> <?php echo USERS;?> <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>
                <?php if($admin_type==1){?>
               <div class="col-lg-4 col-xs-12 clearfix mt20 text-right">
               
               	<a href="<?php echo base_url();?>admin/admin_user/add_admin_user" class="btn btn-primary"><?php echo NEW_ADMIN_USER; ?></a>
                
                <?php
                $export_url = site_url('admin/admin_user/list_admin');
                 if(DEMO_MODE=="0"){ 
                    $export_url = site_url('admin/admin_user/admin_user_report'); 
                } ?>
                <a href="<?php echo $export_url; ?>" class="btn btn-primary"><i class="fa fa-download"></i>  <?php echo EXPORT_DATA; ?></a>
                
               </div>

               <?php }?>
                 <div class="page-header border clearfix"></div>

                 <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> <?php echo ADMIN;?> <?php echo USERS;?>
                    </li>
                </ol>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <?php 
				if($msg == 'add')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_ADDED;?>
                            </div>
                            
            <?php 
			} 
				if($msg == 'update')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_UPDATED;?>
                            </div>
			
			<?php } 
				if($msg == 'delete')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_DELETED;?>
                            </div>
			<?php } ?>
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                    
                    <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper dataTable_res form-inline" role="grid">
                            <div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover" id="dataTables-example4">
                                    <thead>
                                        <tr>
                                            <th><?php echo EMAIL; ?></th>
                                            <th><?php echo USERNAME; ?></th>
                                            <th><?php echo ADMIN_TYPE; ?></th>
                                            <th><?php echo CURRENT_LOGIN; ?></th>
                                            <th><?php echo LAST_LOGIN; ?></th>
                                            <th><?php echo STATUS; ?></th>
                                            <th class="sorting_disabled"><?php echo RIGHTS; ?></th>
                                            <th class="sorting_disabled"><?php echo ACTION; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(DEMO_MODE=="0"){ ?>
                                    	<?php 
										if($result)
											{
											
										foreach($result as $row) 
											{ ?>
                                        <tr class="odd gradeX">
                                            
                                            <td><?php echo SecureShowData($row['email']); ?></td>
                                            <td><?php echo SecureShowData($row['username']); ?></td>
                                            <td><?php 
												if($row['admin_type'] == 0)
												{
												 echo ADMIN; 
												 }else { 
												 echo SUPER_ADMIN;
												 }
												 ?>
                                            </td>
                                            <td><?php echo $row['current_sign_in_at']; ?></td>
                                            <td><?php echo $row['last_sign_in_at']; ?></td>
                                            <td><?php 
												if($row['active'] == 0)
												{
												 	echo INACTIVE; 
												 
												}else {
												 
													echo ACTIVE;
												}
												 ?>
                                            </td>
                                            <?php 
											if($admin_type==1){ ?>
														<td><?php echo anchor('admin/admin_user/list_rights/'.$row['id'].'/',RIGHTS); ?></td>
													
												
											<?php }else { ?>
													<td><?php echo anchor('admin/admin_user/list_rights/'.$row['id'].'/',RIGHTS); ?></td>
											<?php }?>
                                            
                                            
                                            <td><?php echo anchor('admin/admin_user/edit_admin_user/'.$row['id'].'/',EDIT); ?>  
                                            <?php if(DEMO_MODE=="0"){ ?>
                                            <?php if($row['admin_type'] == 0) {?> / <a href="#" onclick="delete_rec('<?php echo $row['id']; ?>')"><?php echo DELETE; ?></a> <?php }
                                            } ?>
                                            </td>
                                        </tr>
                                        <?php 
											
											}
											}
										 ?> 
                                      <?php }else{ ?>
                                          <td colspan="8">
                                            <?php echo ADMIN_DEMO_USER; ?>
                                          </td>
                                      <?php } ?>
                                    </tbody>
                                </table>
                             </div>   
                            </div>
                         </div>
                   	</div>
                 </div>
                </div><!-- col-lg-8  -->
            </div>
            <!-- /.row -->
        </div>
        </div>
        <!-- /#page-wrapper -->
	
    
</body>
<script>

	$(document).ready(function(){
    	$('#dataTables-example4').dataTable({
        overflow-x:hidden
      });
	});
</script>
</html>
