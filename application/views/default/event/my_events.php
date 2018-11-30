<script src="<?php echo base_url()?>js/jquery.form.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {






    dataTableInitNew('active_event_table');
} );

    function dataTableInitNew(id) {
      // body...

      $('#'+id).DataTable( {
          // "order": [[ 3, "desc" ]],
       //     "aoColumns": [
       //    null,
       //    null,
       //    null,
       //    null,
       //    { "bSortable": false }, // <-- disable sorting for column 3
       // ],
            "bPaginate": false,
            "showNEntries" : false,
            "bInfo" : false,

      } );
    }
</script>
<script>
    function get_completed() {
        var getStatusUrl= '<?php echo site_url('event/complete_event/'.$org_id)?>';
        $.ajax({
            url: getStatusUrl,
            dataType: 'text',
            type: 'POST',
            timeout: 99999,
            global: false,
            data: '[]',
            success: function(data)
            {
                $('#complete').html(data);
                 dataTableInitNew('completed_event_table');
            },      
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
            
            }
        });
    }
    function get_cancelled() {
        var getStatusUrl= '<?php echo site_url('event/cancel_event/'.$org_id)?>';
        $.ajax({
            url: getStatusUrl,
            dataType: 'text',
            type: 'POST',
            timeout: 99999,
            global: false,
            data: '[]',
            
            success: function(data)
            { 
                $('#cancel').html(data);
                dataTableInitNew('cancel_event_table')
            },      
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
            
            }
        });
    }
    function get_drafted() {
        var getStatusUrl= '<?php echo site_url('event/draft_event/'.$org_id)?>';
        $.ajax({
            url: getStatusUrl,
            dataType: 'text',
            type: 'POST',
            timeout: 99999,
            global: false,
            data: '[]',
            success: function(data)
            { 
                var $response = $(data);
                var r = $response.find('.reg1').val();
                
                if(r==""){
                  var s = 'Draft(0)';  
                }
                else{
                  var s = 'Draft('+r+')';
                }
                $('#drafted').html(s);

                $('#draft').html(data);
                 dataTableInitNew('event_draft_table');
                hide_loader();
            },      
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
            
            }
        });

    }
    $(document).ready(function(){
        
        
        $('#org_list').change(function(){
            var temp = $("#org_list").val();
            document.location.href = "<?php echo site_url('event/index')?>/"+temp;
        });
        $('#drafted_responsive').click(function(){

            var getStatusUrl= '<?php echo site_url('event/draft_event/'.$org_id)?>';
            $.ajax({
                url: getStatusUrl,
                dataType: 'text',
                type: 'POST',
                timeout: 99999,
                global: false,
                data: '[]',
                success: function(data)
                { 
                    var $response = $(data);
                    var r = $response.find('.reg1').val();
                    
                    var s = 'Draft('+r+')'
                    $('#drafted_responsive').html(s);
                    $('#draft').html(data);
                     dataTableInitNew('event_draft_table');
                        
                },      
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                
                }
            });
        });

        $('#cancelled_responsive').click(function(){

            var getStatusUrl= '<?php echo site_url('event/cancel_event/'.$org_id)?>';
            $.ajax({
                url: getStatusUrl,
                dataType: 'text',
                type: 'POST',
                timeout: 99999,
                global: false,
                data: '[]',
                
                success: function(data)
                { 
                    $('#cancel').html(data);
                    dataTableInitNew('cancel_event_table')
                },      
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                
                }
            });
            
        });
    });
    
    function show(offset, type){
        
        var getStatusUrl= '<?php echo site_url('event/list_event')?>/'+offset+'/'+type;
            $.ajax({
                url: getStatusUrl,
                dataType: 'text',
                type: 'POST',
                timeout: 99999,
                global: false,
                data: '[]',
                
                success: function(data)
                { 
                    var $response = $(data);
                    var r = $response.find('.reg1').html();
                    
                    if(r=='draft'){
                        $('#draft').html(data);
                    }else if(r=='completed'){
                        $('#complete').html(data);
                    }else if(r=='all'){
                        $('.alls').html(data);
                    }else{
                        $('#cancel').html(data);
                    }
                    dataTableInitNew('event_list');
                  
                },      
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                
                }
            });
        }
    
</script>

<section class="eventDash-head">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct">
        <h1>
          <?php   
               if($org_id){
                   echo $org_name.' '.EVENTS;
               }else{
                   echo MY_EVENTS;
               }
           ?>
        </h1>
      </div>
    </div>
  </div>
</section>
<?php if($success_msg){
                ?>
    <div class="alert alert-success message"><?php echo $success_msg; ?></div>
    <?php }?>
    <?php if($error_msg){
                ?>
    <div class="alert alert-danger message"><?php echo $error_msg; ?></div>
    <?php }?>
<section>
  <div class="container marTB50">
    
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="event-webpage">
          <div class="red-event">
            <h4><?php echo EVENTS;?></h4>
          </div>
          <div class="tab my-event mb">
            <ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
              <li class="active"><a href="#all" data-toggle="tab" id="all_e"><?php echo ACTIVE;?>(<?php echo $total_events_active;?>)</a></li>
              <li><a href="#draft" data-toggle="tab" id="drafted" onclick="get_drafted();"><?php echo DRAFT;?>(<?php echo $total_events_draft;?>)</a></li>
              <li><a href="#complete" data-toggle="tab" id="completed" onclick="get_completed();"><?php echo COMPLETED;?>(<?php echo $total_events_complete;?>)</a></li>
              <li><a href="#cancel" data-toggle="tab" id="cancelled" onclick="get_cancelled();"><?php echo CANCELLED;?>(<?php echo $total_events_cancel;?>)</a></li>
            </ul>
            <div class="tab-content responsive hidden-sm hidden-xs">
              <div class="tab-pane fade in active event-info" id="all">
                <form>
                  <div class="alls">
                  <table id="active_event_table" class="table table_res active_event_table contct-table">
                    <thead>
                      <tr>
                        <th><?php echo EVENT;?></th>
                        <th><?php echo DATE;?></th>
                        <th><?php echo STATUS;?></th>
                        <th><?php echo SOLD; ?></th>
                        <th><?php echo QUICK_LINKS; ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($all_events){
                                                
                            foreach ($all_events as $aevents) {
                                $event_title = $aevents['event_title'];
                                $event_start_date_time = datetimeformat($aevents['event_start_date_time']);
                                $active = $aevents['active'];
                                $event_id = $aevents['id'];
                                $event_url_link = $aevents['event_url_link'];
                                $set_time_setting = site_setting();
                                if($event_url_link ==''){
                                    $event_url_link = $event_id;
                                }
                                
                                if($active==0){
                                    $status = 'Draft';
                                }else if($active==1){
                                    $status = 'Active';
                                }else if($active==2){
                                    $status = 'Finished';
                                }else{
                                    $status = 'Cancelled';
                                }
                                $event_capacity = $aevents['event_capacity'];
                                $used = $aevents['used'];
                                
                                if(!empty($event_title))
                                {
                                    if(!empty($event_title) && strlen($event_title)>22)
                                    {
                                        $str_name = substr(ucfirst($event_title),0,22).'...';
                                        
                                    }
                                    else
                                    {
                                        $str_name=$event_title;
                                    }
                                }
                                ?>
                      <tr>
                        <td class="reg"><a href="<?php echo site_url('event/view/'.$event_url_link);?>"><?php echo SecureShowData($str_name);?></a></td>
                        <td><?php echo $event_start_date_time;?> 

                          <?php if ($set_time_setting['date_time_format'] == "H:i") { ?> 
                              <?php echo $time_hour_format   = date("H:i",strtotime($aevents['event_start_date_time'])); ?> 
                          <?php } else { ?> 
                              <?php echo $time_hour_format = date("g:i a",strtotime($aevents['event_start_date_time'])); ?> 
                          <?php } ?>
                        
                        </td>
                        <td><?php echo $status;?></td>

                        <td><?php if($event_capacity<=0){ echo N_A; }else{echo $used.'/'.$event_capacity;}?></td>
                        <td class="H39_sm"><ul class="nav navbar-nav edit-delt text-center">
                            <li> <a href="<?php echo site_url('event/event_dashboard/1/'.$event_id);?>" data-toggle="tooltip" data-placement="bottom" title="Manage"><i class="fa fa-cog" aria-hidden="true"></i></a> </li>
                            
                            <li> <a href="<?php echo site_url('event/edit_event/'.$event_id);?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </li>
                            
                            <li> <a href="<?php echo site_url('event/view/'.$event_url_link);?>" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a> </li>
                            
                            <li> <a href="<?php echo site_url('invites/index/'.$event_id);?>" data-toggle="tooltip" data-placement="bottom" title="invite"><i class="fa fa-envelope-o" aria-hidden="true"></i></a> </li>
                          </ul></td>
                      </tr>
                      <?php
                                                }
                                            }else{?>
                      <tr>
                        <td colspan="5"><?php echo NO_RECORDS; ?></td>
                      </tr>
                      <?php
                                            }?>
                    </tbody>
                  </table>
                  
                  <div class="text-right">
                    <div class="pagi_block pagi_marB0"> <?php echo $page_link_access_code; ?> </div>
                    <div class="clear"></div>
                  </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade event-info" id="draft"> </div>
              <div class="tab-pane fade event-info" id="complete"> </div>
              <div class="tab-pane fade event-info" id="cancel"> </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 clearfix">
        <div class="event-webpage">
          <div class="red-event">
            <h4><?php echo FILTER_EVENTS; ?> <?php echo BY_ORGANIZER;?></h4>
          </div>
          <div class="event-detail">
            <form class="event-title">
              <div class="form-group pt clearfix">
                <div class="col-sm-12 col-xs-12">
                  <select name="org_list" id="org_list">
                    <option value=""><?php echo SELECT; ?></option>
                    <?php if($org){ 
                            foreach ($org as $organizer) {
                                $name = $organizer['name'];
                                $id = $organizer['id'];
                                $page_url = $organizer['page_url'];
                                ?>
                    <option value="<?php echo $id;?>" <?php if($id==$org_id) { echo 'selected'; } ?>><?php echo SecureShowData($name);?></option>
                    <?php 
                          }
                      }
                      ?>
                  </select>
                </div>
              </div>
              <div class="form-group clearfix">
                <div class="col-lg-12">
                  <p class="text-center pt">You can also create your own event by just clicking below button!!!</p>
                  <div class=" text-center btn-common"> <a href="<?php echo site_url('event/create_event');?>" class="btn-event"><?php echo CREATE_AN_EVENT; ?></a> </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End container -->
</section>
<script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
<script>
            $(document).ready(function(){
            $(".rover_tip").popover();
    });
    </script>
<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#datepicker1').datepicker({
                    format: "dd/mm/yyyy",
                    orientation: 'top'
                });
                
            });
            
            $(document).ready(function () {
                
                $('#datepicker2').datepicker({
                    format: "dd/mm/yyyy",
                    orientation: 'top'
                });
                
            });
        </script>
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
    
<script>
$(document).ready(function(){
   // $(".edit").tooltip();



if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) { 

  

} else {

$(".edit").tooltip();
$('[data-toggle="tooltip"]').tooltip();
}
});
</script>
