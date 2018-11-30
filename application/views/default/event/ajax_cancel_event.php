 <form>
<table id="cancel_event_table" class="table table_res event_cancel_table contct-table">
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
<?php if($cancelled_events){
                            		
		foreach ($cancelled_events as $aevents) {
			$event_title = $aevents['event_title'];
			if($event_title==''){ $event_title = UNTITLE_EVENT; }
			$event_start_date_time = datetimeformat($aevents['event_start_date_time']);
			$active = $aevents['active'];
			$event_url_link = $aevents['event_url_link'];
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
            if($event_url_link){
                $url = $event_url_link;
            }else{
                $url = $event_id;
            }
			?>
			<tr>
            	<td class="reg"><a href="<?php echo site_url('event/view/'.$url);?>"><?php echo  SecureShowData($str_name);?></a></td>
                <td><?php echo $event_start_date_time;?> <?php echo timeFormat($aevents['event_start_date_time']); ?></td>	
                <td><?php echo $status;?></td>
                <td><?php echo $used.'/'.$event_capacity;?></td>
                <td class="H39_sm"><ul class="nav navbar-nav edit-delt text-center">
                 
                	<li>
                    <a href="<?php echo site_url('event/event_dashboard/1/'.$event_id);?>" data-toggle="tooltip" data-placement="bottom" title="Manage"><i class="fa fa-cog" aria-hidden="true"></i></a>
                    </li>
                    
                	<li>
                    <a href="<?php echo site_url('event/view/'.$url);?>" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    </li>
                    
                    <li>
                    <a href="javascript://" data-toggle="tooltip" data-placement="bottom" title="invite"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                    </li>
                    
                </ul>
                </td>
    		</tr>
			<?php
		}
		}else{?>
			<tr><td colspan="5"><?php echo NO_RECORDS; ?></td></tr>
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
</script>