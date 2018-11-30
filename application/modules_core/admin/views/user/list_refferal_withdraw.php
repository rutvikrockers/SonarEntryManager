<script>

function setaction(elename, actionval, actionmsg, formname) {
	//alert(actionval);
	
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
                   <h1><?php echo list_refferal_withdraw;?>  </h1>
                </div>
                
                <div class="page-header border"></div>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> <?php echo list_refferal_withdraw;?>
                    </li>
                </ol>
                <!-- /.col-lg-12 -->
            </div>
            
            <?php 
            
            if($msg == 'paid')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo USER_HAS_BEEN_SUCCESSFULLY_PAID;?>
                            </div>
			  <?php } 
            
            ?>
            
       
            <?php
		 				$attributes = array('name'=>'frm_listpage','id'=>'frm_listpage');
						echo form_open('admin/refferal_setting/action_refferal/', $attributes);

		 	?>
            <input type="hidden" name="action" id="action" />   
            
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                    	<div class="panel-heading">
                                    <h4 class="panel-title text-right">
                                        <button type="button" class="btn btn-success" onclick="setaction('chk[]','paid', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_PAID_SELECTED_RECORD;?>', 'frm_listpage')"><?php echo PAID ; ?></button>
                                        
                                    </h4>
                                    
                        </div>
                    	
                            <div class="panel-body">
                            
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <div class="table-responsive">
                                      <table class="table table-striped table-bordered table-hover" id="dataTables-example4">
                                        <thead>
                                            <tr>
                                                <th class="sorting_disabled"><input type="checkbox" id="selecctall"></th>
                                                <th><?php echo USER_NAME; ?></th>
                                                <th><?php echo WITHDRAW_NO; ?></th>
                                                <th><?php echo WITHDRAW_DATE; ?></th>
                                                <th><?php echo WITHDRAW_AMMOUNT; ?></th>
                                                <th><?php echo WITHDRAW_STATUS; ?></th>
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
                                            	<?php if($row['status']==0){?>
                                                <td><input type="checkbox" class="checkbox1" name="chk[]" value="<?php echo $row['id'];?>" ></td>
                                                <?php }else{?>
                                                	 <td><input type="checkbox" class="checkbox1" name="chk[]" style="visibility: hidden;" value="<?php echo $row['id'];?>"  ></td>
                                                	 <?php } ?>
                                                <td><?php echo SecureShowData($row['first_name']); ?></td>
                                                <td><?php echo SecureShowData($row['withdraw_no']); ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><?php echo $row['amount']; ?></td>
                       
                                                <?php /*?><td><a href=""><img src="<?php echo base_url();?>admin_images/address.png" alt=" " height=" " width=" "  /></a></td><?php */?>
                                                <td>
                                                    <?php 
                                                        if($row['status'] == 1)
                                                        {
                                                            echo PAID;
                                                        }else {
                                                            echo PENDING;
                                                        }

                                                    ?>
                                                    </td>
                                                
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
