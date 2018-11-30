<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 col-xs-12 clearfix">
                    <h1>Venue  <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
            </div>
            <div class="col-lg-4 col-xs-12 clearfix mt20 text-right">
                <a class="btn btn-primary" href="<?php echo base_url('admin/events/add_venue'); ?>">Add Venue</a>
            </div>
            <div class="page-header border clearfix"></div>

            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-user"></i> Venue
                </li>
            </ol>

		</div>

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
                            <?php if($this->session->flashdata('success_msg')) { ?>
                                <div class="alert alert-success" role="alert">
                                    <button class="close" data-dismiss="alert">x</button>
                                    <strong><?php echo SUCCESS; ?>!</strong> <?php echo $this->session->flashdata('success_msg');?>
                                </div> 
                            <?php } ?>
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper dataTable_res form-inline" role="grid">
                            <div class="table-responsive">
                            
                                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Venue Name</th>
                                            <th>User/Organizer</th>
                                            <th>Events</th>
                                            <th>Suggested</th>
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
                                            $name=$row['name'];
                                            $fname=$row['first_name'];
                                            $lname=$row['last_name'];
                                            $event=$row['eventcount'];
                                    ?>
                                    <tr class="odd gradeX">
                                        <td>
                                            <?php echo SecureShowData($name); ?>
                                        </td>
                                        <td>
                                            <?php if($row['user_id']) { ?>
                                                <?php echo SecureShowData($fname)." ".SecureShowData($lname); ?>
                                            <?php } else { ?>
                                                Admin
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $event; ?></td>
                                        <td id="venue_suggested_<?php echo $row['vid']; ?>"><?php echo ($row['is_suggested']) ? 'Yes' : 'No'; ?></td>
                                        <td>
                                            <span id="venue_action_<?php echo $row['vid']; ?>">
                                                <?php if($row['is_suggested']) { ?>
                                                    <a href="javascript:void(0);" onclick="change_suggestion(this);" action="0" venue_id="<?php echo $row['vid']; ?>">Un-suggest</a>
                                                <?php } else { ?>
                                                    <a href="javascript:void(0);" onclick="change_suggestion(this);" action="1" venue_id="<?php echo $row['vid']; ?>">Suggest</a>
                                                <?php } ?>
                                                / <a href="<?php echo base_url('admin/events/add_venue/'.$row['vid']); ?>">Edit</a>
                                            </span>
                                            <?php if($row['user_id']) { ?>
                                            <?php } else { ?>
                                                <?php if(!$event) { ?>
                                                    / <a href="<?php echo base_url('admin/events/delete_venue/'.$row['vid']); ?>">Delete</a>
                                                <?php } ?>
                                            <?php } ?>
                                        </td>
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
            </div>
        </div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#dataTables-example').dataTable();
    });
    function change_suggestion(me) {
        venue_id = $(me).attr('venue_id');
        action = $(me).attr('action');
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('admin/events/venue_action'); ?>/'+venue_id,
            data: {'action': action},
            dataType: 'json',
            beforeSend: function () {
                // PopupOpen();
            },
            success: function (rep) {
                console.log(action);
                if(action == 1) {
                    $('#venue_suggested_'+venue_id).text('Yes');
                    $('#venue_action_'+venue_id).html('<a href="javascript:void(0);" onclick="change_suggestion(this);" action="0" venue_id="'+venue_id+'">Un-suggest</a>');
                } else {
                    $('#venue_suggested_'+venue_id).text('No');
                    $('#venue_action_'+venue_id).html('<a href="javascript:void(0);" onclick="change_suggestion(this);" action="1" venue_id="'+venue_id+'">Suggest</a>');
                }
            },
            complete: function () {
                // PopupClose();
                // $("#error_box2").hide();
                // // alert('test');
                // goToByScroll("error_box1");
                // $('#step1').fadeOut();
            }
        });
    }
</script>