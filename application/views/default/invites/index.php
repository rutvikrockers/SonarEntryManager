<?php 
$data1['events_id']=$id;
?>
<script type="text/javascript">  

function remove_div(invite_id) 
{
	
	if(confirm('<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_RECORD; ?>'))
	{
           // alert('try');
		window.location.href = "<?php echo site_url('invites/delete_invite'); ?>/"+invite_id;
	}
        return false;
	
}
</script>

<?php if($success_msg){
                    ?>
                    <div class="alert alert-success message"><?php echo SecureShowData($success_msg); ?></div>
                <?php }?>
                <?php if($error_msg){
                    ?>
                    <div class="alert alert-danger message"><?php echo SecureShowData($error_msg); ?></div>
                <?php }?>

<?php $this->load->view('default/common/dashboard-header')?>
<section>  
            <div class="container marTB50">
            
               
                <div class="row">
                 
                <div class="col-md-8 col-sm-12 mb">
                                
                 <div class="row">    
                            
                <div class="event-webpage col-sm-12">
                	<div class="red-event width100 "><h4><?php echo MANAGE_YOUR_INVITATIONS; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                <div class="col-sm-12">
                <div class="tab my-event mb">
                    
                    <ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
                    <?php 
                    if($schedule_invite)
                    {
                    	$schedule_count =  count($schedule_invite);
                    }
                    else 
                    {
                    	$schedule_count = '0';
                    }
                    if($draft_invite)
                    {
                    	$draft_count =  count($draft_invite);
                    }
                    else
                    {
                    	$draft_count = '0';
                    }
                    ?>	
                          <li class="active"><a href="#order" data-toggle="tab"><?php echo SCHEDULED;?> (<?php echo $schedule_count;?>)</a></li>
                          <li><a href="#attend" data-toggle="tab"> <?php echo DRAFT; ?> (<?php echo $draft_count;?>)</a></li>
                    </ul>
                    
                    <div class="tab-content responsive hidden-sm hidden-xs">
                        
                        	<div class="tab-pane fade in active" id="order">
                        	   <?php 
                            if($schedule_invite)
                            { ?>
                            	<table class="table table_res invite_table contct-table">
                        	<thead>
                            	<tr>
                                    <th><?php echo SUBJECT; ?></th>
                                    <th><?php echo CREATED_AT; ?></th>
                                    <th><?php echo ACTION; ?></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            
                         
                            	<?php foreach ($schedule_invite as $se)
                            	{
                            		
                            		
                            		$created_at = $se['created_at'];
                            		$subject = $se['subject'];
                            		$invite_id = $se['id'];
                            		
                            	?>
                            	<tr>
                                	<td><?php echo SecureShowData($subject);?></td>	
                                    <td><?php echo datetimeformat($created_at).' '.timeFormat($created_at);?></td>
                                    <td>
                                     <ul class="nav navbar-nav edit-delt text-center">
                                     
                                    	<li class="icon7">
                                        <a href="<?php echo site_url('invites/create/'.$id.'/'.$invite_id)?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="edit" data-original-title="Edit"></a>
                                        </li>
                                        
                                        <li class="del-icon icon3">
                                        <a href="javascript://" onclick="remove_div(<?php echo $invite_id;?>)"><i class="glyphicon glyphicon-trash edit" data-toggle="tooltip" data-placement="bottom" title="Delete" data-original-title="Delete"></i></a>
                                        </li>
                                        
                                    </ul>
                                    </td>
                                </tr>
                            <?php 
                            	}
                             ?>    
                               
                                                            
                            </tbody>
                            	
                        </table>
                          <?php   } 
                            else
                            {
                            ?>    
                               <p class="noattend"><?echo NO_EMAIL_INVITATIONS_IN_SCHEDULED_YET;  ?></p>
                      <?php }?> 
                            </div>
                                                        
                            <div class="tab-pane fade" id="attend">
                           
                              <?php 
                            if($draft_invite)
                            { ?>
                            <table class="table table_res invite_table contct-table">
                        	<thead>
                            	<tr>
                                   <th><?php echo SUBJECT; ?></th>
                                    <th><?php echo CREATED_AT; ?></th>
                                    <th><?php echo ACTION; ?></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php 
                          
                            	foreach ($draft_invite as $de)
                            	{
                            		
                            		$created_at = $de['created_at'];
                            		$subject = $de['subject'];
                            		$invite_id = $de['id'];
                            		
                            	?>
                            	<tr>
                                	<td><?php echo SecureShowData($subject);?></td>	
                                    <td><?php echo $created_at;?></td>
                                    <td>
                                     <ul class="nav navbar-nav edit-delt text-center">
                                     
                                    	<li class="icon7">
                                        <a href="<?php echo site_url('invites/create/'.$id.'/'.$invite_id)?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="edit" data-original-title="Edit"></a>
                                        </li>
                                        
                                        <li class="del-icon icon3">
                                        	<a href="javascript://" onclick="remove_div(<?php echo $invite_id;?>)"><i class="glyphicon glyphicon-trash edit" data-toggle="tooltip" data-placement="bottom" title="Delete" data-original-title="Delete"></i></a>
                                        </li>
                                        
                                    </ul>
                                    </td>
                                </tr>
                            <?php 
                            	} ?>
                                                    
                            </tbody>
                            	
                        </table>
                             <?php   } 
                            else
                            {
                            ?>    
                               <p class="noattend"><?php echo NO_EMAIL_INVITATIONS_IN_DRAFT_YET; ?></p>
                      <?php }?> 
                            
                           
                            </div>
                            
                            
                            	
                            
                            
                    </div><!-- End tab-content -->        
                    
                	</div>
                </div>
                    
                 </div>
                 
                
             <div class="text-right">
                   <?php echo anchor('invites/create/'.$id ,CREATE_INVITATIONS,'class="btn-event2"');?>
                </div>
                    
                 </div> <!-- LEFT CONTENT ENDS -->
                 
                <!-- RIGHT CONTENT -->
             
                    <?php echo $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
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
    <script>
    		$(document).ready(function(){
    		$(".edit").tooltip();
	});
	</script>