
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
  <div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-xs-12 clearfix">
                    <h1><?php echo AFFILIATE_USERS;?>  <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>
                <div class="page-header border clearfix"></div>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> <?php echo AFFILIATE_USERS;?>
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
                                    
                        </div>
                    	
                            <div class="panel-body">
                            
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <div class="table-responsive">
                                      <table class="table table-striped table-bordered table-hover" id="dataTables-example4">
                                        <thead>
                                            <tr>
                                                <th><?php echo EVENT_NAME; ?></th>
                                                <th><?php echo AFFILIATE_USERS; ?></th>
                                                <th><?php echo EARN_AMOUNT; ?></th>
                                                
                                                <?php /*?><th><?php echo ADDRESSES; ?></th><?php */?>
                                                
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if($result)
                                                {
                                                    $i=0;
                                                    foreach($result as $row)
                                                        { 
                                                         $data_user = getAllRecordById('user_affiliates','affiliate_id',$row['affiliate_id']);
                                                         ?>
                                                    <tr class="odd gradeX">
                                                        <td><?php echo SecureShowData($row['event_title']); ?></td>
                                                        <td><?php echo count($data_user); ?></td>
                                                        <td><?php if(isset($data_user[0]['due'])){
                                                            
                                                          echo set_event_currency($data_user[0]['due'],$data_user[0]['event_id']) ;
                                                            
                                                        }
?></td>
                                                        
                                                        
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
       </div>     
</body>
<script>

	$(document).ready(function(){
		
    	$('#dataTables-example4').dataTable({
            
        });
        
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
