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
                    <h1><?php echo MODULE_EXTENSION; ?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                 
                 <div class="page-header border clearfix"></div>
            </div>
            <!-- /.row -->
            <?php 
            if($msg == 'delete')
                    {   ?>
                        
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
						
						echo form_open('admin/categories/action_categories/', $attributes);

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
                                            <th><?php echo NAME; ?></th>
                                            <th><?php echo VERSION; ?></th>
                                            <th><?php echo DESCRIPTION; ?></th>         
                                            <th class="sorting_disabled"><?php echo ACTION; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($extensions as $key => $value) { ?>
                                        <tr class="odd gradeX">                                         
                                            <td><?php echo ucwords(SecureShowData($value['name'])); ?></td>
                                            <td><?php echo $value['version']; ?></td>
                                            <td><?php echo SecureShowData($value['description']); ?></td>
                                            <td>
                                            <?php $is_enable = '0'; $enable = 'Disable'; 
                                                if($value['is_enable']=="0"){ $is_enable = '1'; $enable='Enable'; }
                                                if($value['is_enable']=="1"){ $is_enable = '0'; $enable='Disable'; }
                                            ?>
                                            <a  href="<?php echo site_url('admin/preferences/module_update/'.$is_enable.'/'.$value['module_id']); ?>"><?php echo $enable; ?></a></td>                                            
                                        </tr>
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
            
            </form>
</div>

        <!-- /#page-wrapper -->

    </div>
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
