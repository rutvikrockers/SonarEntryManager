<script type="text/javascript" src="<?php echo base_url();?>js/lib/jquery.mousewheel-3.0.6.pack.js"></script>
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

	function set_check(type){
		$('#selecterr').text('');

		var chks = $('.check');
		var fl = true;
		for (var i = 0; i < chks.length; i++)
        {
            if (chks[i].checked==true)
            {
                   fl = false;
                   $('#cont_list').val(type);
            }
         }
         
         if(fl==true){
         	$('#selecterr').text('<?php echo SELECT_ATLEAST_ONE_CONTACT_LIST; ?>');
         	$('#selecterr').addClass("error1");
			return false;
         }else{
         	$('#action_form').val(type);
         	$('#send_invite_click').click();
         }
	}
	
	function confirm_delete(){
		var con = confirm('Conform');
		if(con){
			return true;
		}
		return false;	
	}
	
	
	function show(offset){

		var getStatusUrl= '<?php echo site_url('contact_list/contactlist')?>/'+offset;
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
</script>

<style>
.mt25px{
	margin-top: 25px;
}
.successbox{
	color: #a94442;
}


</style>
  <section class="eventDash-head">
  	<div class="container">
    	<div class="row"> 
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct">
               <h1><?php echo MY_CONTACTS; ?></h1>
            </div>
      </div>
    </div>
  </section>
<section>  
	<div class="container marTB50">	
	     <?php if($clist_data){
	    ?>	
	    	<div class="alert alert-success mar10"><?php echo $clist_data; ?></div>
	   <?php }?>
	    <div class="row">
	    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 alls">
	    	
	        <form accept-charset="UTF-8" action="<?php echo site_url('contact_list/invite')?>" id="contactForm" method="post" name="contactForm">
	        	<div class="bgw">
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
	                        <td><?php echo  SecureShowData($list_name); ?></td>	
	                        <td><?php echo  SecureShowData($list_count); ?></td>
	                         <td><?php echo datetimeformat($list_created).' '.timeFormat($list_created); ?></td>
	                        
	                        <td class="H39_sm"><ul class="nav navbar-nav edit-delt text-center">
	                         
	                        	<li class="del-icon">
	                            <a href="<?php echo site_url('contacts/lists');?>/<?php echo $list_id?>" data-toggle="tooltip" data-placement="bottom" title="Contact List" class="edit"><i class="glyphicon glyphicon-list-alt"></i></a>
	                            </li>
	                            
	                        	<li class="del-icon">
	                            <a class="mfPopup" href="<?php echo site_url('contact_list/copy');?>/<?php echo $list_id?>"  data-toggle="tooltip" data-placement="bottom" title="Copy" id="copy_edit">
	                           	<i class="glyphicon glyphicon-file"></i>
	                            </a>
	                            </li>
	                            
	                            <li class="del-icon">
	                            <a href="<?php echo site_url('contact_list/delete');?>/<?php echo $list_id?>"  data-toggle="tooltip" data-placement="bottom" title="Delete" class="edit" onclick='return confirm("Are you sure, you want to delete this contact.");'><i class="glyphicon glyphicon-trash"></i></a>
	                            </li>
	                            
	                            <li class="del-icon">
	                            <a class="mfPopup edit" href="<?php echo site_url('contact_list/select_invite');?>/<?php echo $list_id?>" data-toggle="tooltip" data-placement="bottom" title="Invite" onclick="$('#<?php echo $list_id ?>').attr('checked','checked');" id="copy_invite"><i class="glyphicon glyphicon-envelope"></i></a>
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
					
		<?php  } ?>             
			                                                            
		</tbody>
    </table>
</div>

<div class="text-right">
    <div class="pagi_block pagi_marB0">
        <?php echo $page_link; ?>
    </div>
</div>	

<!-- End open-air -->
<div id="selecterr" class="successbox mar10"></div>
<div class="mtb20">                		
	<input type="hidden" name="action_form" id="action_form" value="" />
	<input type="hidden" name="select_invitation_id" id="select_invitation_id" value="" />
	<input type="hidden" name="cont_list" id="cont_list" value="" />
	<a href="<?php echo site_url('contact_list')?>" class="btn-event" ><?php echo CLEAR_FILTER; ?></a>
	<a href="<?php echo site_url('contact_list/select_invite');?>" class="btn-event mfPopup marR5" id="send_invite_click" style="display: none;"><?php echo SEND_INVITATION_TO_SELECTED; ?></a>
	<a href="javascript://" class="btn-event btn-eventmargin_768 marR5 marB15_xs" onclick="set_check('invite');" id="send_invite_link"><?php echo SEND_INVITATION_TO_SELECTED; ?></a>
	<a href="<?php echo site_url('contact_list/add_new')?>" class="btn-event " ><?php echo CREATE_NEW_CONTACT_LIST; ?></a>    	                  	       
</div>    	                  
    
   </form>
</div>
            
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 clearfix">
                                
<div class="event-webpage">
    <div class="red-event">
        <h4><?php echo SEARCH_ACROSS_ALL; ?></h4>
    </div>

    <div class="event-detail">
        <form class="event-title" method="get" action="<?php echo site_url('contact_list/search_list')?>">                        
        	<div class="form-group clearfix">
                <div class="col-lg-12 pt">
                    <input type="text" name="search">
                </div>
                <div class="col-lg-12 pt">
                    <input type="submit" class="btn-event2" value="<?php echo SEARCH; ?>">
                    <a href="<?php echo site_url('contact_list')?>" class="btn-eventgrey" id="cancel"><?php echo CANCEL; ?></a>
                </div>
			</div>                        
        </form> 
    </div>        
</div>                                   
</div>
</div>
</div><!-- End container -->
</section>

<script>
	$(document).ready(function(){
		$(".edit").tooltip();
	});
</script>