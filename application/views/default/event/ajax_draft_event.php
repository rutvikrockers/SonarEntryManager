<table  id="event_draft_table" class="table table_res event_draft_table contct-table">
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
                            	
<?php if($draft_events){
                            		
		foreach ($draft_events as $aevents) {
			$id = $aevents['id'];
			$event_title = $aevents['event_title'];
			if($event_title==''){ $event_title = UNTITLE_EVENT; }
			$event_start_date_time = datetimeformat($aevents['event_start_date_time']);
			if($event_start_date_time==''){ $event_start_date_time= N_A; }
			$active = $aevents['active'];
			$event_id = $aevents['id'];
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
			if($used==NULL || $used==''){
				$used=0;
			}
			
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
            	<td class="reg"><a href="<?php echo site_url('event/theme/'.$event_id);?>"><?php echo SecureShowData($str_name);?></a></td>
            	
                <td><?php echo $event_start_date_time;?> <?php echo timeFormat($aevents['event_start_date_time']); ?></td>	
                <td><?php echo $status;?></td>
                <td><?php if($event_capacity==''){ echo N_A; }else{echo $used.'/'.$event_capacity;} ?></td>
                <td class="H39_sm"><ul class="nav navbar-nav edit-delt text-center">
                 
                	<li>
                    <a href="<?php echo site_url('event/event_dashboard/1/'.$event_id);?>"  data-toggle="tooltip" data-placement="bottom" title="Manage"><i class="fa fa-cog" aria-hidden="true"></i></a>
                    </li>
                    
                	<li>
                    <a href="<?php echo site_url('event/edit_event/'.$event_id);?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </li>
                    
                	<li>
                    <a href="<?php echo site_url('event/theme/'.$event_id);?>" data-toggle="tooltip" data-placement="bottom" title="Theme"><i class="fa fa-paint-brush" aria-hidden="true"></i></a>
                    </li>
                    
                    <li>
                    <a href="<?php echo site_url('event/edit_event/'.$event_id.'#publish_event'); ?>" data-toggle="tooltip" data-placement="bottom" title="publish"><i class="fa fa-check-square-o" aria-hidden="true"></i></a>
                    </li>

                    <li>
                    <a onclick="delete_event(this, event);" href="<?php echo site_url('event/delete_single_event/'.$event_id); ?>" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </li>
                    
                </ul>
                </td>
                <input type='hidden' class="reg1" style="display: none" value="<?php echo $total_draft;?>"/>
    		</tr>
			<?php
		}
	}else{?>
		<tr><td colspan="5"><?php echo NO_RECORDS; ?></td><td class="reg1" style="display: none"><?php echo $total_draft;?></td></tr>
		<?php
	}?>                             
</tbody>
</table>
                        
 <div class="text-right">
	<div class="pagi_block">
<?php echo $page_link; ?>
</div>
    <div class="clear"></div>
</div>


</form>
<script>

$(document).ready(function(){


   // $(".edit").tooltip();



if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) { 

  

} else {

$(".edit").tooltip();
$('[data-toggle="tooltip"]').tooltip();

}
});
function delete_event(me, e) {
	e.preventDefault();
	if(confirm("<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_EVENT?>")) {
		show_loader();
		linkUrl = $(me).attr('href');
		$.ajax({
			url: linkUrl,
			dataType: 'json',
			type: 'POST',
			timeout: 99999,
			global: false,
			data: '',
			success: function(data)
			{ 
				$('#drafted').click();				
			},		
			error: function(XMLHttpRequest, textStatus, errorThrown)
			{
			
			}
		});
	}
}
</script>