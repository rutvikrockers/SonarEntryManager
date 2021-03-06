
<table id="event_list"  class="table table_res contct-table">
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
<?php if($events){
                            		
			foreach ($events as $aevents) {
				$event_title = $aevents['event_title'];
				$event_start_date_time = $aevents['event_start_date_time'];
				$active = $aevents['active'];
				$event_id = $aevents['id'];
				$event_url_link = $aevents['event_url_link'];
				
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
				
				$str_name = "";
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
					
                	<td class="reg"><a href="<?php echo site_url('event/view/'.$event_url_link);?>"><?php echo SecureShowData($str_name);?></a>
                	<a class="reg1" style="display: none"><?php echo $search;?></a></td>
                    <td><?php echo $event_start_date_time;?></td>	
                    <td><?php echo $status;?></td>
                    <td><?php if($event_capacity==''){ echo N_A; }else{echo $used.'/'.$event_capacity;}  ?></td>
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
        		</tr>
				<?php
			}
    	}else{?>
    		<tr><?php echo NO_RECORDS; ?></tr>
    		<?php
    	}?>                             
   </tbody>
                            	
</table>

<div class="text-right">
	<div class="pagi_block">
		<?php echo $page_link_access_code; ?>
	</div>                        	
    <div class="clear"></div>
</div>
    
</form>

