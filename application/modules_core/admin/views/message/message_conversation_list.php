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
                    <h1><?php echo MESSAGE_CONVERSATION; ?>  <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>
                
                 <div class="page-header border clearfix"></div>
                  <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-envelope"></i> <?php echo MESSAGE_CONVERSATION; ?>
                    </li>
                </ol>
            </div>
            <!-- /.row -->
            <?php 

            if($msg == 'delete')
                    {   
                        ?>
                        
                            <div class="alert alert-success" role="alert">
                            <button class="close" data-dismiss="alert">x</button>
                            <strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_DELETED;?>
                            </div>
            <?php
                        }
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
				if($msg == 'active')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_ACTIVE;?>
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
						
						echo form_open('admin/country/message_conversation_list/', $attributes);

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
                                             <th><?php echo MESSAGE_SUBJECT; ?></th>
                                             <th><?php echo EVENT; ?></th>
                                             <th><?php echo SENDER_NAME; ?></th>
                                             <th><?php echo RECEIVER_NAME; ?></th>
                                             <th><?php echo DATE; ?></th>
                                             <th class="sorting_disabled"><?php echo ACTION; ?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($message_conversation_list)
											{
											foreach($message_conversation_list as $row)
												{
													
													$id=$row['message_id'];
													$message_subject = $row['message_subject'];
                                                    $event_title = $row['event_title'];
                                                    $sender_info=  getRecordById('users','id',$row['sender_id']);
                                                    $sender_name=$sender_info['first_name'].' '.$sender_info['last_name'];
                                                    if($sender_name==' ')
                                                    {
                                                        $sender_name=$sender_info['email'];
                                                    }

													$receiver_info=  getRecordById('users','id',$row['receiver_id']);
                                                    $receiver_name=$receiver_info['first_name'].' '.$receiver_info['last_name'];
                                                    if($receiver_name==' ')
                                                    {
                                                        $receiver_name=$receiver_info['email'];
                                                    }
                                                  	$date=$row['date_added'];
													
									?>
                                        <?php if($sender_info && $receiver_info) { ?>
                                            <tr class="odd gradeX">
                                               	<td><?php echo SecureShowData($message_subject); ?></td>
                                               <td><?php echo SecureShowData($event_title); ?> </td>
                                               <td><?php echo SecureShowData($sender_name); ?> </td>
                                               <td><?php echo SecureShowData($receiver_name); ?> </td>
                                               <td><?php echo $date; ?> </td>

                                                <td><?php echo anchor('admin/message/message_list/'.$id.'/',VIEW);?>
                                                <?php if(DEMO_MODE=="0"){ ?>
                                                    /<a href="<?php echo site_url('admin/message/delete_conversation').'/'.$id?>" onclick='return confirm("<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_CONVERSATION;?>");'> <?php echo DELETE;?></a>
                                                <?php } ?></td>
                                               
                                             
                                            </tr>
                                        <?php } ?>
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
                </div><!-- col-lg-8  -->
            	
                
            </div>
            <!-- /.row -->
            
            </form>
</div>
</div>
        <!-- /#page-wrapper -->

    <!-- /#wrapper -->

   

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
