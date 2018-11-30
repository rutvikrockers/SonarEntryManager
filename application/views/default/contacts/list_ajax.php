<?php 
	$contacts_name = $one_list[0]['name'];
	$list_id = $one_list[0]['id'];
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.mfPopup').magnificPopup({
			type: 'ajax',
			overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
		});
	});
</script>
<form accept-charset="UTF-8" action="<?php echo site_url('contacts/action')?>" id="contactForm" method="post" name="contactForm" class="event-title">
<div class="bgw">	
	<table class="table table_res contct-info contct-table">
    	<thead>
        	<tr>
            	<th><?php echo SELECT; ?></th>
                <th><?php echo EMAIL; ?></th>
                <th><?php echo LAST_EMAILED; ?></th>
                <th><?php echo NAME; ?></th>
                <th><?php echo CREATED; ?></th>
                <th><?php echo QUICK_LINKS; ?></th>
            </tr>
        </thead>                            
    <tbody>
<?php   						 
		if ($contacts){					                   	
           foreach($contacts as $contacts)
			{
			    $id = $contacts['id'];			
				$email = $contacts['email'];
				$unsub = $contacts['unsubscribe'];
				
				if($contacts['last_mailed'])
				{
				  $updated_at = $contacts['last_mailed'];	
				}
				else{
					if($unsub==1){
						$updated_at = UNSUBSCRIBED;	
					}else{
						$updated_at = NEVER_EMAILED;
					}				
				}
                
                $first_name = $contacts['first_name'];
                $last_name = $contacts['last_name'];
                $created_at = $contacts['created_at'];
			 ?>
        	<tr>
            	<td> 
                	<label>
                        <input name="id[]" type="checkbox" value="<?php echo $id ?>" />
                    </label>
                </td>
                <td <?php if ($unsub == 1) { ?> class="unsub" <?php }?> id="email" ><?php echo  SecureShowData($email); ?></td>	
                <td <?php if ($unsub == 1) { ?>  <?php }?> > <?php echo $updated_at ?></td>
                <td <?php if ($unsub == 1) { ?>  class="unsub"<?php }?> id="name" ><?php if($first_name){echo  SecureShowData($first_name); ?> <?php echo  SecureShowData($last_name);?><?php }else{ echo " - ";} ?></td>
                <td <?php if ($unsub == 1) { ?> class="unsub"<?php }?> ><?php echo $created_at ?></td>
                <td  class="H39_sm"><ul class="nav navbar-nav edit-delt text-center">
                	<li class="icon5">
                	    <a class="fancybox fancybox.iframe edit" href="<?php echo site_url('contacts/edit/');?>/<?php echo $id?>" data-toggle="tooltip" title="Edit" data-placement="bottom" data-original-title="Edit"></a>
                    </li>                    
                    <li class="del-icon"><a href="<?php echo site_url('contacts/delete/');?>/<?php echo $id?>" onclick="return confirm_delete();" ><i class="glyphicon glyphicon-trash edit" data-toggle="tooltip" data-placement="bottom" title="Delete" data-original-title="Delete"></i></a></li>
                    <li class="mess-icon icon6">
                    	<?php if($unsub!=1) {?>
                    		<a href="<?php echo site_url('contacts/unsubscribe/');?>/<?php echo $id?>" data-toggle="tooltip" data-placement="bottom" title="Unsubscribe" class="edit" data-original-title="Unsubscribe"></a>		
                    	<?php }else {?>
                    		<a href="" class="disabled"></a>
                    	<?php }?>
                    
                    </li>
                </ul>
                </td>
            </tr>

  <?php }
  }else{ ?>
                             
            <tr>
                	<td colspan="6" style="text-align:center"> 
                      <?php echo NO_CONTACT_AVAILABLE; ?>
                    </td>
            </tr>   <?php }?>                                      
            </tbody>                        	
        </table>
	</div>
                        
    <div class="text-right">
        <div class="pagi_block">
    	    <?php echo $page_link; ?>
        </div>
            <div class="clear"></div>
	</div>
                
<script type="text/javascript">
	function set_check(act)
	{
		$('#action_form').val(act);
		$('#selecterr').text('');
		var list_id = '<?php echo $list_id; ?>';
		
		document.getElementById("various1").href = 'javascript://';
		document.getElementById("various2").href = 'javascript://';
		
		var chks = document.getElementsByName('id[]');
		var fl = true;
		
		if(act=='select')
		{
			for (var i = 0; i < chks.length; i++)
	        {
	            chks[i].checked=true;
	        }
	         fl = false;
		}
		
		else if(act=='clear')
		{
			for (var i = 0; i < chks.length; i++)
	        {
	            chks[i].checked=false;
	        }
	         fl = false;
		}
		
		else {
			
			for (var i = 0; i < chks.length; i++)
	        {
	        	
	            if (chks[i].checked==true)
	            {
	            	
	                   fl = false;
	            }
	         }
	         
	         if(fl==true){
	         	$('#selecterr').text('<?php echo SELECT_ATLEST_ONE_RECORD; ?>');
	         	$('#selecterr').addClass("error1");
				return false;
	         }else{
	         	
	         	if(act=='export'){
                         
	         		 var page_path = '<?php echo site_url('contacts/export');?>/<?php echo $list_id; ?>';
	         		 var str='';   
	         		    for (var i = 0; i < chks.length; i++)
				        {
				            if (chks[i].checked==true)
				            {  
				                  if(str=='') str=chks[i].value;
				                  else str = str+'_'+chks[i].value;
				            }
				         }
				         
	         		 	document.getElementById("various1").href=page_path+'?list_id='+str;
	
						return false;
	         	}
	         	else if(act=='copy'){
						var page_path ='<?php echo site_url('/contacts/copy');?>';
	
	         		    var str='';   
	         		   
						for (var i = 0; i < chks.length; i++)
				        {
				            if (chks[i].checked==true)
				            {
				                  if(str=='') str=chks[i].value;
				                  else str = str+'_'+chks[i].value;
				            }
				         }
						document.getElementById("various2").href=page_path+'?list_id='+str;
	         		 	$('#various2').click();
						return false;
	         	}else{
					 if(act=='delete'){
					 	if(confirm('<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_RECORD; ?>')){
					 		document.contactForm.submit();
					 	}
					 	else{ return false; }
					 		
					 }	
					if(act=='invite'){
						$('#send_invite_click').click();
					}
					
	         	}
	         	
	         }
			
		}         
	}
	</script>             
    <input type="hidden" value="" name="action_form" id="action_form" />
    <input type="hidden" value="<?php echo $list_id; ?>" name="contact_list_id" id="contact_list_id" />
    <input type="hidden" name="select_invitation_id" id="select_invitation_id" value="" />
	<a href="<?php echo site_url('contact_list/select_invite');?>" class="mfPopup" id="send_invite_click" style="display: none;">&nbsp;</a>			
    <a href="javascript:" class="fancybox fancybox.iframe" id="various2" style="display:none;">&nbsp;</a>	   
	<div class="select-all pt">
	 	<div id="selecterr" ></div>
    	<ul>
        	<li><a href="javascript://" onclick="set_check('select');"><?php echo SELECT_ALL; ?></a></li>
            <li><a href="javascript://" onclick="set_check('clear');"><?php echo CLEAR_SELECTED; ?></a></li>
            <li><a href="javascript://" onclick="set_check('export');" id="various1" ><?php echo EXPORT_SELECTED; ?></a></li>
            <li><a href="javascript://" onclick="set_check('delete');" ><?php echo DELETE_SELECTED; ?></a></li>
            <li><a href="javascript://" onclick="set_check('invite');" ><?php echo SEND_INVITATION_TO_SELECTED; ?></a></li>
            <li><a href="javascript://" onclick="set_check('copy');" ><?php echo COPY_SELECTED_TO_ANOTHER_LIST; ?></a></li>
        </ul>
    </div>	                       
    	<!-- End open-air -->
</form>