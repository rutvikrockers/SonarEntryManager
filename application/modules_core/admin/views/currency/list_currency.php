<script>

function setaction(elename, actionval, actionmsg, formname) {

    var demo_mode = <?php echo DEMO_MODE; ?>;
    
    if(demo_mode=="0"){
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
    }else{
        alert('You can not do this action as you are in demo mode');
        return false;
    }
}
</script>
<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-xs-12 clearfix">
                    <h1><?php echo CURRENCY_CODES; ?></h1>
                </div>
                <div class="col-lg-4 col-xs-12 clearfix mt20 text-right">
                	<a href="<?php echo base_url();?>admin/currency/add_currency" class="btn btn-primary"><?php echo NEW_CURRENCY_CODE; ?></a>
                </div>
                 <div class="page-header border clearfix"></div>
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
            <?php
		 				$attributes = array('name'=>'frm_listpage','id'=>'frm_listpage');
						
						echo form_open('admin/currency/action_currency/', $attributes);

		 	?>
			<input type="hidden" name="action" id="action" />   	
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                    <div class="panel-heading">
                                    <h4 class="panel-title text-right">
                                        
                                        <button type="button" class="btn btn-danger" onclick="setaction('chk[]','delete', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_SELECTED_CURRENCY; ?>', 'frm_listpage')"><?php echo DELETE; ?></button>
                                        
                                    </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <div class="table-responsive">
                                	 <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        <thead>
                                            <tr>
                                            	<th class="sorting_disabled"><input type="checkbox" id="selecctall"></th>
                                                <th><?php echo CURRENCY_NAME; ?></th>
                                                <th><?php echo CURRENCY_CODE; ?></th>
                                                <th><?php echo CURRENCY_SYMBOL; ?></th>
                                                <th><?php echo CREATED_AT; ?></th>
                                                <th><?php echo UPDATED_AT; ?></th>
                                                <th class="sorting_disabled"><?php echo ACTION; ?></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                            <?php 
												if($result)
													{
														foreach($result as $row)
															{
																
																$currency_id=$row['id'];
																$currency_name=$row['currency_name'];
																$currency_code=$row['currency_code'];
																$currency_symbol=$row['currency_symbol'];
																$created_at=$row['created_at'];
																$updated_at=$row['updated_at'];
																
																
											?>
                                            	<td><input type="checkbox" class="checkbox1" name="chk[]" value="<?php echo $currency_id;?>" ></td>
                                                <td><?php echo SecureShowData($currency_name); ?></td>
                                                <td><?php echo SecureShowData($currency_code); ?></td>
                                                <td><?php echo SecureShowData($currency_symbol); ?></td>
                                                <td><?php echo $created_at; ?></td>
                                                <td><?php echo $updated_at; ?></td>
                                                <td><?php echo anchor('admin/currency/view_currency/'.$currency_id.'/',VIEW);?> / <?php echo anchor('admin/currency/edit_currency/'.$currency_id.'/',EDIT);?></td>
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
                </div><!-- col-lg-8  -->
            	
                
            </div>
            <!-- /.row -->
</div>
</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
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
</body>

</html>
