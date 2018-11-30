<table class="table table_res contact-info contct-table">
	<thead>
    	<tr>
        	<th><?php echo SELECT; ?></th>
            <th><?php echo NAME; ?></th>
            <th><?php echo CONTACTS; ?></th>
            <th><?php echo CREATED; ?></th>
            <th><?php echo QUICK_LINKS; ?></th>
        </tr>
    </thead>
    
    <tbody>        		          
<?php 
if($contact_list)
{                 
   foreach($contact_list as $contact_list)
	{
	    $list_id = $contact_list['id'];			
		$list_name = $contact_list['name'];
		$list_count = $contact_list['cnt'];
		$list_created = $contact_list['created_at'];
	?>
	<tr>
    	<td><input name="id[]" class="check" type="checkbox" value="<?php echo $list_id ?>" id="<?php echo $list_id ?>"  onclick="$('.error1').html('');" /></td>
        <td><?php echo SecureShowData($list_name); ?></td>	
        <td><?php echo SecureShowData($list_count); ?></td>
        <td><?php echo $list_created ?></td>        
        <td  class="H39_sm"><ul class="nav navbar-nav edit-delt text-center">        
        	<li class="del-icon">
            <a href="<?php echo site_url('contacts/lists');?>/<?php echo $list_id?>" data-toggle="tooltip" data-placement="bottom" title="Contact List" class="edit"><i class="glyphicon glyphicon-list-alt"></i></a>
            </li>
            
        	<li class="del-icon">
            <a class="fancybox fancybox.iframe edit" href="<?php echo site_url('contact_list/copy');?>/<?php echo $list_id?>"  data-toggle="tooltip" data-placement="bottom" title="Copy" id="copy_edit">
           	<i class="glyphicon glyphicon-file"></i>
            </a>
            </li>
            
            <li class="del-icon">
            <a href="<?php echo site_url('contact_list/delete');?>/<?php echo $list_id?>"  data-toggle="tooltip" data-placement="bottom" title="Delete" class="edit"><i class="glyphicon glyphicon-trash"></i></a>
            </li>
            
            <li class="del-icon">
            <a class="fancybox fancybox.iframe edit" href="<?php echo site_url('contact_list/select_invite');?>/<?php echo $list_id?>" data-toggle="tooltip" data-placement="bottom" title="Invite" onclick="$('#<?php echo $list_id ?>').attr('checked','checked');" id="copy_invite"><i class="glyphicon glyphicon-envelope"></i></a>
            </li>            
         </ul>
        </td>
	</tr>                  
  <?php }
}
else{ ?>	
    <tr>
      	<td colspan="5" style="text-align: center;">
		   <?php echo NO_CONTACT_AVAILABLE; ?>
		</td>
    </tr>
<?php } ?>             			                                                           
	</tbody>                           
</table>
                        
<div class="text-right">
	<div class="pagi_block">
		<?php echo $page_link; ?>
        </div>
            <div class="clear"></div>
		</div>
						
		<div id="selecterr" class="successbox mar10"></div>
        	<div class="mt">                    		
        		<input type="hidden" name="action_form" id="action_form" value="" />
        		<input type="hidden" name="select_invitation_id" id="select_invitation_id" value="" />
        		<input type="hidden" name="cont_list" id="cont_list" value="" />
            	<a href="<?php echo site_url('contact_list/select_invite');?>" class="btn-event mfPopup" id="send_invite_click" style="display: none;"><?php echo SEND_INVITATION_TO_SELECTED; ?></a>&nbsp;
      			<a href="javascript://" class="btn-event btn-eventmargin_768 marB15_xs" onclick="set_check('invite');" id="send_invite_link"><?php echo SEND_INVITATION_TO_SELECTED; ?></a>
      			<a href="<?php echo site_url('contact_list/add_new')?>" class="btn-event mfPopup"><?php echo CREATE_NEW_CONTACT_LIST; ?></a>    	                  	        
			</div>
                        
</form>
            