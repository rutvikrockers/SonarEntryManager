
<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
               <div class="col-xs-12 clearfix">
                    <h1><?php echo PENDING_CANCELS_TICKET_ORDER; ?>  - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="page-header border"></div>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-ban"></i> <?php echo ADMIN;?> <?php echo PENDING_CANCELS;?>
                    </li>
                </ol>
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-12 clearfix">
                    <div class="panel panel-default">
                    
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                            <?php if($this->session->flashdata('error_msg')) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <button class="close" data-dismiss="alert">x</button>
                                    <strong><?php echo ERRORS; ?>!</strong> <?php echo $this->session->flashdata('error_msg');?>
                                </div> 
                            <?php } ?>
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            
                            <div class="table-responsive">
                                  
                                  <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th><?php echo CANCEL_ID; ?></th>
                                            <th><?php echo FIRST_NAME; ?></th>
                                            <th><?php echo LAST_NAME; ?></th>
                                            <th><?php echo EMAIL; ?></th>
                                            <th><?php echo EVENT_TITLE; ?></th>
                                            <th><?php echo TICKET_NAME; ?></th>
                                            <th><?php echo TICKET_QTY; ?></th>
                                            <th><?php echo USER_TYPE; ?></th>
                                            <th>Cancel Type</th>
                                            <th><?php echo AMOUNT; ?></th>
                                            <th class="sorting_disabled"><?php echo ACTION; ?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if($result)
                                            {
                                                
                                                foreach($result as $row)
                                                    {
                                                        
                                                        $id=$row['id'];
                                                        $pid=$row['purchase_id'];
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
                                                        $cancel_type=$row['ticket_id'];
                                                        
                                                        if(!(float)$total>0){
                                                            $ticket_type = 'Free';
                                                        }else{
                                                            $ticket_type = 'Paid';
                                                        }
                                                        
                                                        
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $id; ?></td>
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
                                            <td>
                                                <?php if($cancel_type == 0 ) {?>
                                                <span class="badge">Order Cancel</span>
                                                <?php } else {?>
                                                <span class="badge">Ticket Cancel</span>
                                                <?php }?>
                                            </td>
                                            <td><?php echo set_event_currency($total,$event_id); ?></td>
                                            <td>
                                            <?php if($ticket_type!="Free"){ ?>
                                                <?php if(DEMO_MODE=="0"){ ?><img src="<?php echo base_url(); ?>admin_images/tick1.png" alt=" " height=" " width=" "  /> <a href="<?php echo site_url('admin/cancel_order/confirm_request/'.$id)?>">Confirm</a> 
                                            | <?php }
                                            } ?><a href="<?php echo site_url('admin/cancel_order/view_reason/'.$id); ?>">Show Reason</a>
                                            <?php if(DEMO_MODE=="0"){ ?>  | <a href="<?php echo site_url('admin/cancel_order/show_decline/'.$id); ?>">Decline</a>
                                            <?php } ?>
                                            </td>
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
        $('#sample_1').dataTable({
            "order": [[ 1, "desc" ]]
        });
        
    });
</script>
</html>
