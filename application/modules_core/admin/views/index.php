    <script src="<?php echo base_url();?>js/morris/raphael.min.js"></script>
    <script src="<?php echo base_url();?>js/morris/morris.js"></script>
    <link href="<?php echo base_url();?>css/morris.css" rel="stylesheet">

<?php 
    $check = json_encode($user_status);
?>

<script type="text/javascript">
function drawChart() {

var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    Morris.Bar({
        barGap:1,
        barSizeRatio:0.11,
        element: 'morris_area_chart',
        data: <?php echo json_encode($user_status);?>,
        xkey: 'udate',
        ykeys: ['active'],
        ymin: 0,
        type: "Bar",
        gridIntegers: true,
        labels: ['User Register'],
        pointSize: 5,
        lineColors: ['#5cb85c'],
        axes: true,
        pointFillColors: ['#5cb85c'],
        hideHover: true,
        stacked: true,
        xLabelAngle:80,
        resize: true,
        xLabels:"month",
        hideHover: 'auto',
        xLabelFormat: function (x) { // <-- changed
        console.log("this is the new object:" + x);
        var month = months[x.x];
        return month;
    },
    });
}

function drawChart_purchase() {

var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    Morris.Bar({
        barGap:1,
        barSizeRatio:0.11,
        element: 'morris_bar_chart',
        data: <?php echo json_encode($purchase_status);?>,
        xkey: 'udate',
        ykeys: ['qty'],
        ymin: 0,
        type: "Bar",
        gridIntegers: true,
        labels: ['Sold Tickets'],
        pointSize: 5,
        lineColors: ['#333'],
        axes: true,
        pointFillColors: ['#e0336b'],
        stacked: true,
        xLabelAngle:80,
        resize: true,
        xLabels:"month",
        hideHover: 'auto',
        xLabelFormat: function (x) { // <-- changed
        console.log("this is the new object:" + x);
        var month = months[x.x];
        return month;
        },
    });
}

//window.onload = drawChart;
</script>
<script type="text/javascript">
    $(document).on('ready', function(){
        drawChart();
        drawChart_purchase();
});
</script>

<?php 



//withdrawals report...

$multi_currency = getAllData('currency_codes');
$site_setting = site_setting();

$currency_id = getRecordById('currency_codes','currency_code',$site_setting['currency_code']);                  
$currency_code_id = $currency_id['id'];

$withdrawals = get_withdrawals_by_currency($currency_code_id);





$currency_label = getCurrenctCodeSymbolById($currency_code_id);

$total_withdrawals = $currency_label.' '.$withdrawals['amount'];

$pending_withdrawals = get_pending_withdrawals($currency_code_id);

$total_pending_withdrawals = $currency_label.' '.$pending_withdrawals['pending_amount'];

$confirm_withdrawals = get_confirm_withdrawals($currency_code_id);
$total_confirm_withdrawals = $currency_label.' '.$confirm_withdrawals['confirm_amount'];

//sales report...
$total_sales = get_total_sales($currency_code_id);
$total_sales_report = $currency_label.' '.$total_sales['total'];

$total_earnings = get_total_earnings($currency_code_id);
$total_sales_earnings = $currency_label.' '.$total_earnings['total_fees'];


//ticket report...
$ticket_qty = 0; 
$ticket_used = 0;
$ticket_sold = get_tickets_sold_Currency($currency_code_id); 
$ticket_qty = $ticket_sold['qty'];
$ticket_used = $ticket_sold['used'];
if($ticket_used == ''){
    $ticket_used = 0;
}
$total_sold = $ticket_qty - $ticket_used;
?>
<script type="text/javascript">
    function updatePrices(c_id){
        
        $.ajax({
            type: "POST",
            data: {id: c_id}, 
            url: "<?php echo site_url('admin/home/updatePrices/');?>",
            success: function(data) {
                var res = data.split("*");
                var report = res[0];
                var sales = res[1];
                var userreport = res[2];
                $(".currency_report").replaceWith(report);
                $(".currency_sales").replaceWith(sales);
                $('.used_report').replaceWith(userreport);
            }
        });
    }

$('.collapsing').on('shown.bs.collapse', function(){
$(this).parent().find("fa-arrow-down").removeClass("fa-arrow-down").addClass("fa-arrow-up");
}).on('hidden.bs.collapsing', function(){
$(this).parent().find("fa-arrow-up").removeClass("fa-arrow-up").addClass("fa-arrow-down");
});
</script>

<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo DASHBOARD; ?>  <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>
                <div class="page-header border"></div>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> <?php echo DASHBOARD; ?>
                    </li>
                </ol>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-calendar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $event_count; ?></div>
                                        <div>Total Events</div>
                                        <div>Live Events (<?php echo $live_event_count; ?>)</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo site_url();?>admin/events/list_events">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $user_count; ?></div>
                                        <div>Users</div>
                                        <div>&nbsp;</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo site_url();?>admin/admin_user/list_users">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-credit-card fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $purchase_count; ?></div>
                                        <div>Transactions</div>
                                        <div>&nbsp;</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo site_url();?>admin/transaction/list_all_transaction">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-fw fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $pending_cancel_count; ?></div>
                                        <div>Pending Orders</div>
                                        <div>Confirm Orders (<?php echo $confirm_cancel_count; ?>)</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo site_url(); ?>admin/cancel_order/list_pending_cancel">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Graph Start -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Monthly Average Registration <b>[<?php echo date("Y");?>]</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris_area_chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>

                 <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Monthly Average Purchase <b>[<?php echo date("Y");?>]</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris_bar_chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>

        </div>
            <!-- Graph End -->

            <!-- /.row -->
            <div class="row">
            <div class="col-lg-4">
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                        <?php echo SELECT_CURRENCY; ?>
                        </div>
                        <div class="panel-body">
                            <select name="currency_id" id="currency_id" onchange="updatePrices(this.value);">
                            <?php 
                                foreach($multi_currency as $mc){
                                    $select ='';
                                    if($mc['id'] == $currency_code_id){
                                        $select = 'selected="selected"';
                                    }
                                    echo '<option value="'.$mc['id'].'" '.$select.'>'.SecureShowData($mc['currency_name']).' '.SecureShowData($mc['currency_code']).' '.SecureShowData($mc['currency_symbol']).'</option>'; 
                                }
                            ?>  
                            </select>                      
                        </div>
                    </div>
            </div> 


            </div>
            
            
            <div class="row">
                <div class="col-lg-4">
                	<div class="panel panel-default ">
                        <div class="panel-heading">
                            <?php echo TICKETS_REPORT; ?>
                        </div>
                        <div class="panel-body used_report">
                            <p><span><?php echo TICKETS_SOLD; ?>: </span> <?php echo  $ticket_used;?></p>
                            <p><span><?php echo TICKETS_AVAILABLE; ?>: </span> <?php echo  $total_sold;?>
                            </p>
                        </div>
                    </div>
                 </div>
                 
                 <div class="col-lg-4">   
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                           <?php echo WITHDRAWALS_REPORT; ?>
                        </div>
                        <div class="panel-body currency_report">
                            <p><span><?php echo TOTAL_WITHDRAWALS; ?> : </span><?php echo $total_withdrawals; ?></p>
                            <p><span><?php echo PENDING_WITHDRAWALS; ?> : </span><?php echo $total_pending_withdrawals; ?></p>
                            <p><span><?php echo CONFIRMED_WITHDRAWALS; ?>: </span><?php echo $total_confirm_withdrawals; ?></p>
                        </div>
                    </div>
                  </div>
                  
                  <div class="col-lg-4">  
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                            <?php echo SALES_REPORT; ?>
                        </div>
                        <div class="panel-body currency_sales">
                            <p><span><?php echo TOTAL_SALES; ?> : </span><?php echo $total_sales_report; ?></p>
                            <p><span><?php echo TOTAL_EARNINGS; ?>: </span><?php echo $total_sales_earnings; ?></p>
                        </div>
                    </div>
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" class="collapsed">
                            <h4 class="panel-title" >
                                <a href="#collapseOne" style="text-decoration: none;"><?php echo LATEST_EVENTS; ?><i style="float:right" class="fa fa-arrow-down"></i></a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapsing">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            
                            	<div class="table-responsive">
                                  
                                  <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th><?php echo EVENT_TITLE;?></th>
                                            <th><?php echo EVENT_START;?></th>
                                            <th><?php echo EVENT_END;?></th>
                                            <th><?php echo CURRENT_STATUS;?></th>
                                            <th><?php echo TICKET_QTY; ?></th>
                                            <th><?php echo VIEW;?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result)
											{
												foreach($result as $row)
													{
											
													$event_id=$row['id'];
													$event_title=$row['event_title'];
													$event_start_date_time=$row['event_start_date_time'];
													$event_end_date_time=$row['event_end_date_time'];
													$active=$row['active'];
													$qty=$row['qty'];
													$event_url_link=$row['event_url_link'];
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo SecureShowData($event_title); ?></td>
                                            <td><?php echo $event_start_date_time; ?></td>
                                            <td><?php echo $event_end_date_time; ?></td>
                                            <td>
                                            	<?php 
													if($active == 0) { 
														echo DRAFT;
													}
													if($active == 3){
														echo CANCELLED;
													}
													if($active == 1){
														echo LIVE;
													}
													if($active == 2){
														echo COMPLETED;
													}//http://cakephp-cms.com/eventbriteclone/index.php/event/view/friday-fun
												?>
                                            </td>
                                            <td><?php echo $qty; ?></td>
                                            <td><a href="<?php echo site_url('event/view/'.$event_url_link);?>" target="_blank"><img src="<?php echo base_url(); ?>admin_images/event.png" alt=" " height=" " width=" " ></a></td>
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
                 
                 	<div class="panel panel-default">
                    <div class="panel-heading collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#collapseTwo">
                        <h4 class="panel-title">
                            <a href="#collapseTwo" style="text-decoration: none;"><?php echo LATEST_USERS; ?><i style="float:right" class="fa fa-arrow-down"></i></a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapsing">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            
                            <div class="table-responsive">
                            
                                  <table class="table table-striped table-bordered table-hover" id="sample_2">
                                    <thead>
                                        <tr>
                                            <th><?php echo FIRST_NAME; ?></th>
                                            <th><?php echo LAST_NAME; ?></th>
                                            <th><?php echo EMAIL; ?></th>
                                            <th><?php echo JOINED_AT; ?></th>
                                            <th><?php echo CURRENT_STATUS; ?></th>
                                            <th><?php echo EVENTS?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result1)
											{
												foreach($result1 as $user)
													{
														
														$user_id=$user['id'];
														$first_name=$user['first_name'];
														$last_name=$user['last_name'];
														$email=$user['email'];	
														$created_at=$user['created_at'];
														$active=$user['active'];
										
									?>	
                                        <tr class="odd gradeX">
                                            <td><?php echo SecureShowData($first_name); ?></td>
                                            <td><?php echo SecureShowData($last_name); ?></td>
                                            <td><?php echo SecureShowData($email); ?></td>
                                            <td><?php echo $created_at; ?></td>
                                            <td>
                                             <?php 
                                                if($active == 1)
                                                {
                                                    echo ACTIVE;
                                                }else if($active==0){
                                                    echo INACTIVE;
                                                }else{
                                                    echo SUSPEND;
                                                }
                                             ?>
                                            
                                            </td>
                                            <td><a href="<?php echo site_url('admin/admin_user/event_user/'.$user_id);?>"><img src="<?php echo base_url(); ?>admin_images/event.png" alt=" " height=" " width=" " ></a></td>
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
                 
                 	<div class="panel panel-default">
                    <div class="panel-heading collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#collapseThree">
                        <h4 class="panel-title">
                            <a href="#collapseThree" style="text-decoration: none;"><?php echo LATEST_PURCHASES; ?><i style="float:right" class="fa fa-arrow-down"></i></a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapsing">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            	<div class="table-responsive">
                            
                                  <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                        <tr>
                                            <th><?php echo NAME; ?></th>
                                            <th><?php echo EMAIL; ?></th>
                                            <th><?php echo EVENT; ?></th>
                                            <th><?php echo TICKET_QTY; ?></th>
                                            <th><?php echo AMOUNT; ?></th>
                                            <th><?php echo PURCHASED_AT; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
											if($result2)
												{
													foreach($result2 as $purchase)
														{
														
															$first_name=$purchase['first_name'];
															$last_name=$purchase['last_name'];
															$email=$purchase['email'];
															$event_title=$purchase['event_title'];
															$ticket_qty=$purchase['ticket_qty'];
															$total=$purchase['total'];
															$created_at=$purchase['created_at'];
                                                            $event_id = $purchase['event_id'];
															
															$currency = set_event_currency($total, $event_id);
															
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo SecureShowData($first_name);?> <?php echo SecureShowData($last_name); ?></td>
                                            <td><?php echo SecureShowData($email); ?></td>
                                            <td><?php echo SecureShowData($event_title); ?></td>
                                            <td><?php echo $ticket_qty; ?></td>
                                            <td><?php echo $currency; ?></td>
                                            <td><?php echo $created_at;?></td>
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
                 
                 	<div class="panel panel-default">
                    <div class="panel-heading collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#collapseFour" >
                        <h4 class="panel-title">
                            <a href="#collapseFour" style="text-decoration: none;"><?php echo LATEST_CANCELLED_EVENTS; ?><i style="float:right" class="fa fa-arrow-down"></i></a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapsing">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            	<div class="table-responsive">
                            
                                  <table class="table table-striped table-bordered table-hover" id="sample_4">
                                    <thead>
                                        <tr>
                                            <th><?php echo EVENT_TITLE;?></th>
                                            <th><?php echo EVENT_START;?></th>
                                            <th><?php echo EVENT_END;?></th>
                                            <th><?php echo VIEW;?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result3)
											{
												foreach($result3 as $cancel_event)
													{
													$event_title=$cancel_event['event_title'];
													$event_start_date_time=$cancel_event['event_start_date_time'];
													$event_end_date_time=$cancel_event['event_end_date_time'];
													$event_url_link=$cancel_event['event_url_link'];
													
												
									?>
                                        <tr class="odd gradeX">
                                           	<td><?php echo SecureShowData($event_title); ?></td>
                                            <td><?php echo $event_start_date_time; ?></td>
                                            <td><?php echo $event_end_date_time; ?></td>
                                            <td><a href="<?php echo site_url('event/view/'.$event_url_link);?>" target="_blank"><img src="<?php echo base_url(); ?>admin_images/event.png" alt=" " height=" " width=" " ></a></td>
                                            
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
                 
                </div><!-- col-lg-12  -->
                
             <!----------------------  GRAPH  ------------------------>   
            
             	
                
                <div class="col-lg-6" style="display: none">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo WEEKLY_USER_REGISTRATION; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
                <div class="col-lg-6" style="display: none">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo WEEKLY_EVENT_REGISTRATION; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
                
            </div>
            <!-- /.row -->
        </div>
        </div>
        <!-- /#page-wrapper -->
<?php 
		//user weekly registration....
		$day_result = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0);
		
		foreach($graph_user as $graph)
			{
				
				$date_added = $graph['date_added'];
				$timestamp = strtotime($date_added);
				$day = date('N', $timestamp);
				$day_result[$day] = $graph['total'];
			}
			
?>	
<?php 
		//facebook
	
		$day_facebook = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0);
		
		foreach($graph_facebook as $fb)
			{
				$date_added1 = $fb['date_added'];
				$timestamp1 = strtotime($date_added1);
				$day1 = date('N', $timestamp1);
				$day_facebook[$day1] = $fb['total'];
			}
?> 
<?php 
		//twitter
	
		$day_twitter = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0);
		
		foreach($graph_twitter as $twitt)
			{
				$date_added2 = $twitt['date_added'];
				$timestamp2 = strtotime($date_added2);
				$day2 = date('N', $timestamp2);
				$day_twitter[$day2] = $twitt['total'];
			}
?>  
<?php 
		//events...
	
		$day_events = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0);
		
		foreach($graph_event as $event_data)
			{
				$date_added3 = $event_data['date_added'];
				$timestamp3 = strtotime($date_added3);
				$day3 = date('N', $timestamp3);
				$day_events[$day3] = $event_data['total'];
			}
?>   
 
<script>
$(document).ready(function(){
		$('#sample_1').dataTable({
             "order": [[ 1, "desc" ]]
        });
		//$('#sample_2').dataTable("bSortable" : false);
        $('#sample_2').dataTable({
            "order": [[ 1, "desc" ]]
        });
		//$('#sample_3').dataTable();
        $('#sample_3').dataTable({
            "order": [[ 5, "desc" ]]
        });
		$('#sample_4').dataTable();
		
	});
</script>

<script>
$(function () {
        $('#container').highcharts({
            title: {
                text: '<?php echo WEEKLY_USER_REGISTRATION; ?>',
                x: -20 //center
            },
           xAxis: {
				categories: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun']
			},
			yAxis: {
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
			 
            series: [{
                name: 'Total Registration',
                data: [<?php 
				$i=1; 
				foreach($day_result as $new)
				{ 
					echo $new;
					if($i!=7)
					{
					echo ',';
					}
					 $i++; 
				} 	?>]
            }, 
			{
                name: 'Facebook',
                data: [
				<?php 
				$i=1; 
				foreach($day_facebook as $new_fb)
				{ 
					echo $new_fb;
					if($i!=7)
					{
					echo ',';
					}
					 $i++; 
				} 	?>
				]
            }, {
                name: 'Twitter',
                data: [
				<?php 
				$i=1; 
				foreach($day_twitter as $new_twitt)
				{ 
					echo $new_twitt;
					if($i!=7)
					{
					echo ',';
					}
					 $i++; 
				} 	?>

				]
            }]
        });
    });
    
</script>
<script>
$(function () {
        $('#container1').highcharts({
            title: {
                text: '<?php echo WEEKLY_EVENT_REGISTRATION; ?>',
                x: -20 //center
            },
            
            xAxis: {
                categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat',
                    'Sun']
            },
            yAxis: {
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Events',
                data: [<?php 
				$i=1; 
				foreach($day_events as $new_event)
				{ 
					echo $new_event;
					
					if($i!=7)
					{
					echo ',';
					}
					 $i++; 
				} 	?>]
            },]
        });
    });
    
</script>

<script>

    

</script>
	<script src="<?php echo base_url(); ?>admin_js/highcharts.js"></script>
    
	<script src="<?php echo base_url(); ?>admin_js/exporting.js"></script>

	<script src="<?php echo base_url(); ?>admin_js/plugins/flot/jquery.flot.js"></script>
	
   	<script src="<?php echo base_url(); ?>admin_js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    
	<script src="<?php echo base_url(); ?>admin_js/plugins/flot/jquery.flot.resize.js"></script>
    
	<script src="<?php echo base_url(); ?>admin_js/plugins/flot/jquery.flot.pie.js"></script>
