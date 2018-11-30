<script type="text/javascript">
function drawChart() {



    Morris.Line({
        
        element: 'morris_area_chart',
        data: <?php echo json_encode($check_status);?>,
        xkey: 'pdate',
        ykeys: ['qty'],
        ymin: 0,
        type: "area",
        gridIntegers: true,
        labels: ['Sold Ticket'],
        pointSize: 5,
        lineColors: ['#333'],
        axes: true,
        pointFillColors: ['#e0336b'],
        hideHover: true,
        stacked: true,
        xLabelAngle:80,
        resize: true,
        parseTime:false
    });
}

//window.onload = drawChart;
</script>
<script type="text/javascript">
    $(document).on('ready', function(){
        drawChart();
});
</script>
<style>
    .wid55{
        width: 55% !important;
    }
</style>
<script src="<?php echo base_url()?>js/jquery.form.js"></script> 

<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo base_url();?>js/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="<?php echo base_url();?>js/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="<?php echo base_url();?>js/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="<?php echo base_url();?>js/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
    
    <script src="<?php echo base_url();?>js/morris/raphael.min.js"></script>
    <script src="<?php echo base_url();?>js/morris/morris.js"></script>
    <link href="<?php echo base_url();?>css/morris.css" rel="stylesheet">

    <script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox(
				
			);
		});
	</script>
<script>
$(document).ready(function(){
	$('#recent_attendee').click(function(){
	   
		var getStatusUrl= '<?php echo site_url('event/attendees/'.$id)?>';
		
			$.ajax({
				url: getStatusUrl,
				dataType: 'text',
				type: 'POST',
				timeout: 99999,
				global: false,
				data: '[]',
				success: function(data)
				{ 
					$('#attend').html(data);
						
				},		
				error: function(XMLHttpRequest, textStatus, errorThrown)
				{
				
				}
			});
	});
        $('#sales_type,#sales_type_responsive').click(function(){
       
        var getStatusUrl= '<?php echo site_url('event/sales_type/'.$id)?>';
        
            $.ajax({
                url: getStatusUrl,
                dataType: 'text',
                type: 'POST',
                timeout: 99999,
                global: false,
                data: '[]',
                success: function(data)
                { 
                    $('#sales_type_view').html(data);
                        
                },      
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                
                }
            });
    });

         $('#manual_sale_type').click(function(){
       
        var getStatusUrl= '<?php echo site_url('event/manual_sales_type/'.$id)?>';
            $.ajax({
                url: getStatusUrl,
                dataType: 'text',
                type: 'POST',
                timeout: 99999,
                global: false,
                data: '[]',
                success: function(data)
                { 
                    $('#manual_sales_type_view').html(data);
                        
                },      
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                
                }
            });
    });
});

function show(offset){
	
		var getStatusUrl= '<?php echo site_url('event/list_purchases')?>/'+offset+'/<?php  echo $id;?>';//add by darshan
			$.ajax({
				url: getStatusUrl,
				dataType: 'text',
				type: 'POST',
				timeout: 99999,
				global: false,
				data: '',
				
				success: function(data)
				{ 				
					$('#order').html(data);
				},		
				error: function(XMLHttpRequest, textStatus, errorThrown)
				{
				
				}
			});
		}
		
	function cancel_event(){
		if(confirm('Are you sure, you want to cancel this event.')){
			document.location.href = "<?php echo site_url('event/cancel_single_event/'.$id)?>";
		}
		return false;
	}
	
	function delete_event(){
		if(confirm('Are you sure, you want to delete this event.')){
			document.location.href = "<?php echo site_url('event/delete_single_event/'.$id)?>";
		}
		return false;
	}
</script>

<?php 

$data1['events_id']=$id;

$event_status = $event_data['active'];
$event_title = $event_data['event_title'];
$venue_id = $event_data['venue_id']; 
$street_address = $event_data['street_address'];
$event_start_date_time = datetimeformat($event_data['event_start_date_time']);
$is_delete = delete_check($event_status);

?>

<?php $this->load->view('default/common/dashboard-header')?>

<section>  
    <div class="container marTB50">
        <div class="row">
        
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 mb">
               
      <div class="open-air col-xs-12 col-sm-12 p0">
            
            <ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
                
                  <li class="active"><a href="#stats1" data-toggle="tab"><?php echo DSALES;?></a></li>
                  
                  <li><a href="#stats3" data-toggle="tab" id="sales_type" ><?php echo SALES_BY_TICKET_TYPE; ?></a></li>
                  <li><a href="#stats4" data-toggle="tab" id="manual_sale_type" ><?php echo MANUAL_SALES; ?></a></li>
            </ul>
            
            <div class="tab-content responsive hidden-sm hidden-xs">
                
                    <div class="tab-pane fade in active clearfix" id="stats1">
                        <div class="col-sm-6  col-xs-6 status">

                            <div class="col-xs-12 col-sm-12 p0 mt">
                            <article class="col-sm-6 col-xs-6 width-xs2">
                            <?php echo PAGE_VIEWS; ?>:
                            </article>
                            <span class="col-sm-6 col-xs-6 width-xs2">
                             <?php echo $page_visits; ?>
                            </span>
                            </div>
                            <article class="col-sm-6 col-xs-6 width-xs2">
                            <?php echo TICKETS_SOLD; ?>:
                            </article>
                            <span class="col-sm-6 col-xs-6 width-xs2">
                             <?php echo ($status) ? $status['sold'] : 0; ?> / <?php echo ($status) ? $status['total_tickets'] : 0; ?>
                            </span>

                            <div class="col-xs-12 col-sm-12 p0 mt">
                                <article class="col-xs-6 col-sm-6 width-xs2">
                                <?php echo GROSS_SALES; ?>:
                                </article>
                                <span class="col-xs-6 col-sm-6 width-xs2">
                                <?php echo set_event_currency($final_gross, $id);?>
                                </span>
                                <article class="col-xs-6 col-sm-6 width-xs2">
                                <?php echo MANUAL_SALES; ?>:
                                </article>
                                <span class="col-xs-6 col-sm-6 width-xs2">
                               <?php echo set_event_currency($final_attendee_gross, $id);?>
                                </span>
                                <article class="col-xs-6 col-sm-6 width-xs2">

                                <?php echo "Offline payment"; ?>:
                                </article>
                                <span class="col-xs-6 col-sm-6 width-xs2">
                               <?php echo set_event_currency($offline_payment, $id);?>
                                </span>
                                <article class="col-xs-6 col-sm-6 width-xs2">
                                <?php echo FEES; ?>:

                                </article>
                                <span class="col-xs-6 col-sm-6 width-xs2">
                               <?php echo set_event_currency($total_fees, $id);?>
                                </span>
                                <article class="col-xs-6 col-sm-6 width-xs2">
                                <?php echo NET_SALES; ?>:
                                </article>
                                <span class="col-xs-6 col-sm-6 width-xs2">
                               <?php echo set_event_currency($total_net_sales, $id);?>
                                </span>
                            </div>
                            
                            <div class="ticket-detail mt tac col-xs-12 col-sm-12">
                                <a class="mt15 btn btn-purrept" href="<?php echo site_url('event/purchase_report/'.$id);?>"><i class="  glyphicon glyphicon-cloud-download"></i> <?php echo DOWNLOAD_PURCHASE_REPORT; ?></a> <a class="mt10 btn btn-tickreprt" href="<?php echo site_url('event/ticket_report/'.$id);?>"><i class=" glyphicon glyphicon-cloud-download"></i> <?php echo DOWNLOAD_TICKET_REPORT; ?></a>
                            </div>
                            
                        </div>
                        
                        <div class="col-xs-6 col-sm-6 ticket-parent tac">
                        <div class="panel panel-green">
                            
                            <div class="panel-body">
                                
                                <div id="morris_area_chart" style="width: 300px; height: 250px;"></div>
                            </div>
                        </div>
                        </div>
                        
                    </div>
                    
                    <?php if(!$rights){ ?>
                    <div class="tab-pane fade clearfix" id="stats2">
                    <div class="col-xs-6 col-sm-6 status">
                            <article class="col-xs-6 col-sm-6 width-xs2">
                            <?php echo GROSS_SALES; ?>:
                            </article>
                            <span class="col-xs-6 col-sm-6 width-xs2">
                            <?php echo set_event_currency($final_gross, $id);?>
                            </span>
                            
                            <div class="col-xs-12 col-sm-12 p0 mt">
                            <article class="col-xs-6 col-sm-6 width-xs2">
                            <?php echo TOTAL_MANUAL_SALES; ?>:
                            </article>
                            <span class="col-xs-6 col-sm-6 width-xs2">
                           <?php echo set_event_currency($final_attendee_gross, $id);?>
                            </span>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 p0 mt">
                            <article class="col-xs-6 col-sm-6 width-xs2">
                            <?php echo TOTAL_SALES; ?>:
                            </article>
                            <span class="col-xs-6 col-sm-6 width-xs2">
                            <?php echo set_event_currency($final_total_gross, $id);?>
                            </span>
                            </div>
                        
                        </div>
                        
                        <div class="col-xs-6 col-sm-6 ticket-parent tac">
                        <div class="ticket-detail">
                        <span> <?php echo set_event_currency($final_admin_fees, $id);?></span>
                        <article><?php echo SecureShowData($site_setting['site_name']);?> <?php echo FEES_PAID; ?></article>
                        </div>
                        
                        <div class="ticket-detail mt">
                        <span><?php echo set_event_currency($total_net_sales, $id);?></span>
                        <article><?php echo TOTAL_NET_SALES; ?></article>
                        </div>
                    </div>
                    </div>
                    <?php } ?>
                    <div class="tab-pane fade clearfix" id="stats3">
                        <div class="col-xs-12 col-sm-12 " id="sales_type_view">
                            
                        </div>
                        
                    
                    
                  </div><!-- End tab-content -->

                   <div class="tab-pane fade clearfix" id="stats4">
                        <div class="col-xs-12 col-sm-12 " id="manual_sales_type_view">
                            
                        </div>
                        
                    
                    
                  </div><!-- End tab-content -->        
            </div>
            </div>
            
            
     <?php if(!$show_orders){ ?> 
      <div class="open-air col-xs-12 col-sm-12 mt25 p0">
            
            <ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab2">
                
                  <li class="active"><a href="#order" data-toggle="tab"><?php echo RECENT_ORDERS; ?> </a></li>
                  <li><a href="#attend" data-toggle="tab" id="recent_attendee"><?php echo RECENT_ATTENDEES;?></a></li>
            </ul>
            
            <div class="tab-content responsive hidden-sm hidden-xs">
                
                    <div class="tab-pane fade in active" id="order">
                        <table class="table table_res event-info contct-table">
                    <thead>
                        <tr>
                            <th><?php echo ORDER; ?></th>
                            <th><?php echo TICKET_BUYER; ?></th>
                            <th><?php echo QUANTITY; ?></th>
                            <th><?php echo PRICE; ?></th>
                            <th><?php echo DATE; ?></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php 
                    if($purchases){
                        foreach($purchases as $purchase){
                            $purchase_id = $purchase['id'];
                            $first_name = $purchase['first_name'];
                            $last_name = $purchase['last_name'];
                            $ticket_qty = $purchase['ticket_qty'];
                            $created_at = $purchase['created_at'];
                            $total = $purchase['total'];
                            
                            
                            ?>
                            <tr>
                                <td class="reg"><a href="<?php echo site_url('attendees/orders/').'?date_range=start&sort_by=date_desc&limit_search=20&order='.$purchase_id.'#orders_'.$purchase_id; ?>"><?php echo $purchase_id;?></a></td>
                                <td><?php echo SecureShowData($first_name).' '.SecureShowData($last_name);?></td>	
                                <td><?php echo $ticket_qty;?></td>                                
                                <td><?php echo set_event_currency($total, $event_data['id']); ?></td>
                               <td><?php echo datetimeformat($created_at).' '.timeFormat($created_at);?></td>
                            </tr>
                            <?php
                        }
                    }else{ ?>
                         <tr>
                         <td colspan="5"><?php echo NO_RECORDS; ?></td>
                         </tr>
                    <?php							
                    }
                    ?>
                
                                                    
                    </tbody>
                        
                </table>
                <?php echo $page_link;?>
                    </div>
                                                
                    <div class="tab-pane fade" id="attend">
            </div>

            </div><!-- End tab-content -->        
            
            </div>
            
     <?php } ?>
        
        </div>
        
        <!-- RIGHT CONTENT -->
       <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
        </div>
        
    </div><!-- End container -->
</section>
<script src="<?php echo base_url()?>js/responsive-tabs.js"></script>
<script type="text/javascript">
  $( '#myTab' ).click( function ( e ) {
    e.preventDefault();
    $( this ).tab( 'show' );
  } );

  ( function( $ ) {
      // Test for making sure event are maintained
      $( '.js-alert-test' ).click( function () {
        alert( 'Button Clicked: Event was maintained' );
      } );
      fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
  } )( jQuery );

</script>