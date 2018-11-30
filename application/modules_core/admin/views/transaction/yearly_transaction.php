<link href="<?php echo base_url(); ?>admin_css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>admin_js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
        $('#to_year').datepicker({
            format: " yyyy", // Notice the Extra space at the beginning
            viewMode: "years", 
            minViewMode: "years",
            autoclose: true
        });
        
    });

  $(function (){
    $('#to_year').change(function (){
      var totalDeductions = $("#to_year").val();
      var totalDeductions_new = totalDeductions.replace(/\s/g, '');
      $("#export_data").attr("href", "<?php echo base_url();?>admin/transaction/year_transaction_data/"+totalDeductions_new);

    });       

});
</script>

<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-xs-8 clearfix">
                    <h1><?php echo YEARLY_TRANSACTIONS_LIST; ?></h1>
                </div>
                <div class="col-lg-4 col-xs-12 clearfix mt20 text-right">
                    <input class="form-control" type="text" data-toggle="tooltip" title="Selected year regarding export Data" data-placement="left" readonly="readonly" placeholder="Select Year" name="to_year" id="to_year" value="" style="width: 192px;">

                    <?php
                    $export_url = site_url('admin/transaction/list_yearly_transaction');
                     if(DEMO_MODE=="0"){ 
                        $export_url = site_url('admin/transaction/year_transaction_all'); 
                    } ?>
                    <a href="<?php echo $export_url;?>" class="btn btn-primary" id="export_data" style="margin-top: -34px;"><i class="fa fa-download"></i>  <?php echo EXPORT_DATA; ?></a>
                    
                </div>
                <div class="page-header border"></div>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> <?php echo YEARLY_TRANSACTIONS_LIST; ?>
                    </li>
                </ol>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            
                            	<div class="table-responsive">
                                 
                                  <table class="table table-striped table-bordered table-hover" id="dataTables-example4">
                                    <thead>
                                        <tr>
                                            <th><?php echo TOTAL_AMOUNT; ?></th>
                                            <th><?php echo TOTAL_TICKET_QTY;?></th>
                                            <th><?php echo YEAR; ?></th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result)
											{
												foreach($result as $row)
													{
													
														$total=$row['total'];
														$qty=$row['qty'];
														$yr=$row['yr'];
														
														
														$currency = get_currency($total);
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $currency; ?></td>
                                            <td><?php echo $qty; ?></td>
                                            <td><?php echo $yr; ?></td>
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


</body>
<script>

	$(document).ready(function(){
    	$('#dataTables-example4').dataTable();
	});
</script>
</html>
