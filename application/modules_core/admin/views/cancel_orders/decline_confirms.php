<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
               <div class="col-xs-8 clearfix">
                    <h1>Decline Orders - <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>
                <div class="col-lg-4 col-xs-12 clearfix mt20 text-right">
                    <a href="<?php echo base_url();?>admin/cancel_order/decline_cancerl_report" class="btn btn-primary"><i class="fa fa-download"></i>  <?php echo EXPORT_DATA; ?></a>
                </div>
                <div class="page-header border"></div>
                  <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-ban"></i> <?php echo ADMIN;?> Decline Orders
                    </li>
                </ol>
            </div>
            <!-- /.row -->
            
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
                                            <th><?php echo FIRST_NAME; ?></th>
                                            <th><?php echo LAST_NAME; ?></th>
                                            <th><?php echo EMAIL; ?></th>
                                            <th><?php echo EVENT_TITLE; ?></th>
                                            <th><?php echo TICKET_NAME; ?></th>
                                            <th><?php echo TICKET_QTY; ?></th>
                                            <th><?php echo USER_TYPE; ?></th>
                                            <th><?php echo AMOUNT; ?></th>
                                            <th>Cancel Type</th>
                                            <th>Decline Date</th>
                                            <th>Decline Reason</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if($result)
                                            {
                                                foreach($result as $row)
                                                    {
                                                        
                                                        $id=$row['id'];
                                                        $first_name=$row['first_name'];
                                                        $last_name=$row['last_name'];
                                                        $email=$row['email'];
                                                        $event_id=$row['event_id'];
                                                        $ticket_id=$row['ticket_id'];
                                                        $ticket_qty=$row['ticket_qty'];
                                                        $total=$row['total'];
                                                        $event_title=$row['event_title'];
                                                        $ticket_name=$row['ticket_name'];
                                                        $user_type=$row['user_type'];
                                                        $confirm_date=$row['updated_at'];
                                                        $cancel_type=$row['ticket_id'];
                                                        
                                                        if(!(float)$total>0){
                                                            $ticket_type = 'Free';
                                                        }else{
                                                            $ticket_type = 'Paid';
                                                        }
                                                        
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo SecureShowData($first_name); ?></td>
                                            <td><?php echo SecureShowData($last_name); ?></td>
                                            <td><?php echo SecureShowData($email); ?></td>
                                            <td><?php echo SecureShowData($event_title);?></td>
                                            <td><?php echo SecureShowData($ticket_name);?></td>
                                            <td><?php echo SecureShowData($ticket_qty); ?></td>
                                            <td>
                                                <?php if($user_type == 1 ) {?>
                                                <span class="badge">USER</span>
                                                <?php } else {?>
                                                <span class="badge">ORG</span>
                                                <?php }?>
                                            </td>
                                            <td><?php echo set_event_currency($total,$event_id); ?></td>
                                            <td>
                                                <?php if($cancel_type == 0 ) {?>
                                                <span class="badge">Order Cancel</span>
                                                <?php } else {?>
                                                <span class="badge">Ticket Cancel</span>
                                                <?php }?>
                                            </td>
                                            <td><?php echo $confirm_date; ?></td>
                                            <td><a href="<?php echo site_url('admin/cancel_order/view_reason/'.$id); ?>">Show Reason</a></td>
                                         </tr>
                                         
                                       <?php }
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
        <!-- /#page-wrapper -->
</div>
</body>
<script>
$(document).ready(function(){
        $('#sample_1').dataTable();
        
    });
</script>
</html>
