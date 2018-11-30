<style>
.disabled {
     cursor:no-drop;
}
</style>

<script type="text/javascript" src="<?php echo base_url();?>js/lib/jquery-1.10.1.min.js"></script>
<?php 
 $contacts_name = $one_list[0]['name'];
 $list_id = $one_list[0]['id'];
?>
<style>
.unsub{
	text-decoration: line-through;
}	
	
</style>
<script src="<?php echo base_url()?>js/jquery.form.js"></script> 

<link href="<?php echo base_url();?>css/popup.css" rel="stylesheet" />
<script src="<?php echo base_url();?>js/jquery.magnific-popup.js"></script>
 <script type="text/javascript">
      $(document).ready(function() {
      
		$('.mfPopup').magnificPopup({
          type: 'ajax',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });
        $('.mfPopup_add').magnificPopup({
          type: 'ajax',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });
		$('.mfPopupIn').magnificPopup({
          type: 'inline',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });

		

      });
    </script>

<script type="text/javascript">
	
	function show(offset){

		var getStatusUrl= '<?php echo site_url('contacts/lists_ajax/')?>/'+offset+'/<?php echo $org_id; ?>';
					
			$.ajax({
				url: getStatusUrl,
				dataType: 'text',
				type: 'POST',
				timeout: 99999,
				global: false,
				data: '',
				
				success: function(data)
				{ 
					$('.alls').html(data);
				},		
				error: function(XMLHttpRequest, textStatus, errorThrown)
				{
				
				}
			});
		}
	
		$('.alert-danger .close').on('click', function(e) {
   			 $(this).parent().hide();
		});
		
	
</script>
	

<script>

	
function confirm_delete(){
	var con = confirm('<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_RECORD; ?>');
	if(con){
		return true;
	}
	return false;	
}

function confirm_unsubscribe(){
	var con = confirm('<?php echo ARE_YOU_SURE_YOU_WANT_TO_UNSUBSCRIBE; ?>');
	if(con){
		return true;
	}
	return false;	
}
</script> 	
	
<script type="text/javascript">
	$(document).ready(function() {
		//$(".fancybox").fancybox();
	});
</script>
  <section class="eventDash-head">
  	<div class="container">
    	<div class="row"> 
        	<div class="col-sm-6 col-xs-12 test-contct">
               <h1><?php echo SecureShowData($contacts_name); ?></h1>
            </div>
            <div class="col-sm-6 col-xs-12 text-right mt10">  
                 <a href="<?php echo site_url('contacts/add_new/');?>/<?php echo $list_id?>" class="mfPopup btn-eventgrey" data-toggle="modal" data-target=".bs-example-modal-lg"><?php echo ADD_NEW_CONTACT; ?></a>
        </div>
      </div>
    </div>
  </section>
<section>  
            <div class="container marTB50">
              
                
                 <?php if($contact_data){
                ?>	
                	<div class="alert alert-success mar10"><?php echo $contact_data; ?></div>
               <?php }?>
               <div class="alert alert-danger fade in" id="selecterr" style="display:none;">
    				<button type="button" class="close">×</button>
			   </div>

                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 alls" id="all">
                	<form accept-charset="UTF-8" action="<?php echo site_url('contacts/action')?>" id="contactForm" method="post" name="contactForm" class="event-title">
                	
                     	  <div class="bgw">	
                    	<table class="table table_res contact-listtable contct-table">
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
				
				if($contacts['last_mailed']){
				  $updated_at = $contacts['last_mailed'];	
				}else{
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
                    				 <?php if ($unsub != 1) { ?> <input name="id[]" type="checkbox" value="<?php echo $id ?>" /> <?php } ?>
                                        </label>
                                    </td>
                                    <td <?php if ($unsub == 1) { ?> class="unsub" <?php }?> id="email" ><?php echo $email ?></td>	
                                    <td <?php if ($unsub == 1) { ?>  <?php }?> > <?php echo $updated_at ?></td>
                                    <td <?php if ($unsub == 1) { ?>  class="unsub"<?php }?> id="name" ><?php if($first_name){echo SecureShowData($first_name); ?> <?php echo SecureShowData($last_name); ?><?php }else{ echo " - ";} ?></td>
                                    <td <?php if ($unsub == 1) { ?> class="unsub"<?php }?> ><?php echo datetimeformat($created_at).' '.timeFormat($created_at); ?></td>
                                    <td  class="H39_sm"><ul class="nav navbar-nav edit-delt text-center">
                                    	<li class="icon5">
                                        <a class="mfPopup" href="<?php echo site_url('contacts/edit/');?>/<?php echo $id?>" data-toggle="tooltip" title="Edit" data-placement="bottom" data-original-title="Edit"></a>
                                        </li>
                                        
                                        <li class="del-icon"><a href="<?php echo site_url('contacts/delete/');?>/<?php echo $id?>" onclick="return confirm_delete();" ><i class="glyphicon glyphicon-trash edit" data-toggle="tooltip" data-placement="bottom" title="Delete" data-original-title="Delete"></i></a></li>
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
                            <div class="pagi_block pagi_marB0">
                            <?php echo $page_link; ?>
                            </div>
                                <div class="clear"></div>
						</div>
                        
                       
                        		
                   
                
      <script type="text/javascript">
	function set_check(act){
		
		//alert(act);
		$('#selecterr').hide();
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
			//alert('else');
			
			for (var i = 0; i < chks.length; i++)
	        {
	        	
	            if (chks[i].checked==true)
	            {
	            	
	                   fl = false;
	            }
	         }
	        // console.log(fl);
	         if(fl==true){
	         	$('#selecterr').text('<?php echo SELECT_ATLEST_ONE_RECORD; ?>');
	         	$('#selecterr').addClass("alert-danger");
	         	$('#selecterr').show();
				return false;
	         }else{
	         	
	         	if(act=='export'){
                        //alert('imhere'); 
                    //    return ;
                    $('#selecterr').hide();
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
	         		 	
						//$('#various1').trigger('click');
						return false;
	         	}
	         	else if(act=='copy'){
	         			$('#selecterr').hide();
						var page_path ='<?php echo site_url('/contacts/copy');?>';
	         		    //var page_path = '/contacts/copy';
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
						$('#selecterr').hide();
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
				
			    <a href="javascript:" class="mfPopup" id="various2" style="display:none;">&nbsp;</a>	   
                    	 <div class="select-all pt">
                    	 	
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
                </div>
                </div>
            </div><!-- End container -->
             
   </section>
   
 <script src="<?php echo base_url();?>js/rekha_validation.js"></script>

