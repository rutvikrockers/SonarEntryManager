<script>

function setaction(elename, actionval, actionmsg, formname) {
	
	vchkcnt=0;
	elem = document.getElementsByName(elename);

	for(i=0;i<elem.length;i++){

		if(elem[i].checked) vchkcnt++;	

	}

	if(vchkcnt==0) {

		alert('<?php echo PLEASE_SELECT_A_RECORD; ?>')

	} else {

		if(confirm(actionmsg))

		{
			document.getElementById('action').value=actionval;	

			document.getElementById(formname).submit();
		}		

	}
}
</script>    
<script type="text/javascript" language="javascript">

	<?php /*?>function delete_rec(id,offset)
	{
		var ans = confirm("<?php echo ARE_YOU_SURE_TO_DELETE_USER; ?>");
		if(ans)
			{
				location.href = "<?php echo site_url('admin/admin_user/delete_user/'); ?>"+"/"+id+"/";

			}else{

			return false;

			}
	}<?php */?>
</script>    

  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-8 col-xs-12 clearfix">
                    <h1><?php echo USERS;?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="col-lg-4 col-xs-12 clearfix mt20 text-right">
                	<a href="<?php echo base_url();?>index.php/admin/admin_user/add_newuser" class="btn btn-primary"><?php echo NEW_USER;?></a>
                </div>
                <div class="page-header border"></div>
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
			<?php } 
				if($msg == 'active')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_ACTIVE;?>
                            </div>
			  <?php } 
                if($msg == 'suspend')
                    {   ?>
                        
                            <div class="alert alert-success" role="alert">
                            <button class="close" data-dismiss="alert">x</button>
                            <strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_SUSPEND;?>
                            </div>
			 <?php }
			 	if($msg == 'deactive')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_DEACTIVE;?>
                            </div>
			 
			 <?php } ?>
			
            <?php
		 				$attributes = array('name'=>'frm_listpage','id'=>'frm_listpage');
						echo form_open('admin/admin_user/action_user/', $attributes);

		 	?>
            <input type="hidden" name="action" id="action" />   
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                    	<div class="panel-heading">
                                    <h4 class="panel-title text-right">
                                        <button type="button" class="btn btn-success" onclick="setaction('chk[]','active', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_ACTIVE_SELECTED_USER;?>', 'frm_listpage')"><?php echo ACTIVE; ?></button>
                                        
                                    	<button type="button" class="btn btn-warning" onclick="setaction('chk[]','deactive', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_DEACTIVE_SELECTED_USER; ?>', 'frm_listpage')"><?php echo DEACTIVE; ?></button>

                                    	 <button type="button" class="btn btn-warning" onclick="setaction('chk[]','suspend', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_SUSPEND_SELECTED_USER; ?>', 'frm_listpage')"><?php echo SUSPEND; ?></button>
                                        
                                    </h4>
                                    
                        </div>
                    	
                            <div class="panel-body">
                            
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <div class="table-responsive">
                                      <table class="table table-striped table-bordered table-hover" id="dataTables-example4">
                                        <thead>
                                            <tr>
                                                <th class="sorting_disabled"><input type="checkbox" id="selecctall"></th>
                                                <th><?php echo FIRST_NAME; ?></th>
                                                <th><?php echo LAST_NAME; ?></th>
                                                <th><?php echo EMAIL; ?></th>
                                                <th><?php echo USERS_IP_ADDRESS; ?></th>
                                                <th><?php echo EVENTS; ?></th>
                                                <th><?php echo PURCHASES; ?></th>
                                                <th><?php echo MULTI_USERS; ?></th>
                                                <?php /*?><th><?php echo ADDRESSES; ?></th><?php */?>
                                                <th><?php echo CURRENT_STATUS; ?></th>
                                                
                                                <th class="sorting_disabled"><?php echo ACTION; ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if($result)
                                                {
                                                    
                                                    $i=0;
                                                    foreach($result as $row)
                                                        {
                                            ?>
                                            <tr class="odd gradeX">
                                                <td><input type="checkbox" class="checkbox1" name="chk[]" value="<?php echo $row['id'];?>" ></td>
                                                <td><?php echo SecureShowData($row['first_name']); ?></td>
                                                <td><?php echo SecureShowData($row['last_name']); ?></td>
                                                <td><?php echo SecureShowData($row['email']); ?></td>
                                                <td><?php echo $row['user_ip']; ?></td>
                                                <td><a href="<?php echo site_url('admin/admin_user/event_user/'.$row['id']); ?>"><img src="<?php echo base_url();?>admin_images/event.png" alt=" " height=" " width=" "  /></a></td>
                                                <td><a href="<?php echo site_url('admin/admin_user/purchase_user/'.$row['id']); ?> "><img src="<?php echo base_url();?>admin_images/ticketimg.png" alt=" " height=" " width=" "  /></a></td>
                                                <td><a href=""><img src="<?php echo base_url();?>admin_images/accountimg.png" alt=" " height=" " width=" "  /></a></td>
                                                <?php /*?><td><a href=""><img src="<?php echo base_url();?>admin_images/address.png" alt=" " height=" " width=" "  /></a></td><?php */?>
                                                <td>
                                                    <?php 
                                                        if($row['active'] == 1)
                                                        {
                                                            echo ACTIVE;
                                                        }else if($row['active']==0){
                                                            echo INACTIVE;
                                                        }else{
                                                            echo SUSPEND;
                                                        }

                                                    ?>
                                                <td><?php echo anchor('admin/admin_user/view_user/'.$row['id'].'/',VIEW)?> / 
                                                    <?php echo anchor('admin/admin_user/edit_user/'.$row['id'].'/' , EDIT);?>/
                                                    <?php echo anchor('admin/admin_user/refferal_user/'.$row['id'].'/' , USER_REFFERAL);?>
                                                     <?php /*?><a href="#" onclick="delete_rec('<?php echo $row['id']; ?>')"><?php echo DELETE; ?></a><?php */?></td>
                                                
                                            </tr>
                                            <?php 
                                            
                                                $i++;
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                
                                </div>  
                            </div>
                         </div>
                   
                 </div>
                </div><!-- col-lg-8  -->
            </div>
            
            </form>
            <!-- /.row -->
       </div>     
</body>
<script>

	$(document).ready(function(){
		
    	$('#dataTables-example4').dataTable();
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
