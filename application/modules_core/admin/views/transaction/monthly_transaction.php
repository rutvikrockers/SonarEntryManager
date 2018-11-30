<style type="text/css">
    a.tooltip {
        outline:none;
        opacity: 1; 
    }
    a.tooltip strong {line-height:30px;}
    a.tooltip:hover {text-decoration:none;} 
    a.tooltip span {
        z-index:10;
        display:none; 
        padding:14px 20px;
        margin-top:28px; 
        margin-left:-40px;
        width:300px; 
        line-height:16px;
    }
    a.tooltip:hover span{
        display:inline; 
        position:absolute; 
        border:2px solid #FFF;  
        color:#EEE;
        background:#333 url(../images/css-tooltip-gradient-bg.png) repeat-x 0 0;
    }
    .callout {
        z-index:20;
        position:absolute;
        border:0;top:-14px;
        left:120px;
    }
    
    /*CSS3 extras*/
    a.tooltip span
    {
        border-radius:2px;        
        box-shadow: 0px 0px 8px 4px #666;
        /*opacity: 0.8;*/
    }
</style>
<link href="<?php echo base_url(); ?>admin_css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>admin_js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
        $('#to_month').datepicker({
            format: "mm-yyyy",
            startView: "months", 
            minViewMode: "months",
            autoclose: true
        });
        
    });

  $(function (){
    $('#to_month').change(function (){
      var totalDeductions = $("#to_month").val();
      var totalDeductions_new = totalDeductions.replace(/\s/g, '');
      $("#export_data").attr("href", "<?php echo base_url();?>admin/transaction/selected_monthly_transaction_data/"+totalDeductions_new);

    });       

});
</script>

<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-xs-8 clearfix">
                    <h1><?php echo MONTHLY_TRANSACTIONS_LIST; ?></h1>
                </div>
                <div class="col-lg-4 col-xs-12 clearfix mt20 text-right">
                    <input class="form-control" type="text" data-toggle="tooltip" title="Selected month regarding export Data" data-placement="left" readonly="readonly" placeholder="Select Month" name="to_month" id="to_month" value="" style="width: 192px;">

                    <?php
                    $export_url = site_url('admin/transaction/list_monthly_transaction');
                     if(DEMO_MODE=="0"){ 
                        $export_url = site_url('admin/transaction/all_monthly_transaction_data'); 
                    } ?>
                    <a href="<?php echo $export_url;?>" class="btn btn-primary" id="export_data" style="margin-top: -34px;"><i class="fa fa-download"></i>  <?php echo EXPORT_DATA; ?></a>
                    
                </div>
                <div class="page-header border"></div>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> <?php echo MONTHLY_TRANSACTIONS_LIST; ?>
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
                                            <th><?php echo MONTH_YEAR; ?></th>
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
														$mon=$row['mon'];
														$yr=$row['yr'];
														
														$month = intval($mon);
														$mons = explode(" ","Zer January Febuary March April May June July August September October November December");
														 

														$currency = get_currency($total);
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $currency; ?></td>
                                            <td><?php echo $qty; ?></td>
                                            <td><?php  echo $mons[$month];?> -<?php echo $yr; ?></td>
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
