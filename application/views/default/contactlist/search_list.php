<!-- Add jQuery library -->
<?php ?>
<!-- Add jQuery library -->
	<script type="text/javascript" src="<?php echo base_url();?>js/lib/jquery-1.10.1.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="<?php echo base_url();?>js/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo base_url();?>js/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="<?php echo base_url();?>js/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="<?php echo base_url();?>js/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="<?php echo base_url();?>js/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
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
		

      });
    </script>

<script type="text/javascript">
	function goBack() {
    	window.history.back();
  	}

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
	
	
</script>

<style>
.mt25px{
	margin-top: 25px;

}
.successbox{
	color: #a94442;
}
</style>

<section>  
            <div class="container">
            	
              <div class="pt">
              	
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct">
                
                   <h1><?php echo SEARCH_CONTACT_LIST; ?> <?php echo $search_name;?></h1>
                  
            	</div>
                
              </div><!-- End pt -->
              
                 
                <div class="clearfix"></div>
                 
                <div class="festival pb"></div>
                
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pdlr">
                	<div class="open-air bgw pd15">
                    <form accept-charset="UTF-8" action="<?php echo site_url('contact_list/invite')?>" id="contactForm" method="post" name="contactForm">
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
			if($search)
			{
                             	
		           foreach($search as $search_list)
					{
					    $list_id = $search_list['id'];			
						$list_name = $search_list['name'];
						$list_count = $search_list['cnt'];
						$list_created = $search_list['created_at'];
						
		
					 ?>
									</tr>
		                                	<td><input name="id[]" class="check" type="checkbox" value="<?php echo $list_id ?>" id="<?php echo $list_id ?>"  onclick="$('.error1').html('');" /></td>
		                                    <td><?php echo SecureShowData($list_name); ?></td>	
		                                    <td><?php echo SecureShowData($list_count); ?></td>
		                                    <td><?php echo $list_created ?></td>
		                                    
		                                    <td class="H39_sm"><ul class="nav navbar-nav edit-delt text-center">
		                                     
		                                    	<li class="del-icon">
		                                        <a href="<?php echo site_url('contacts/lists');?>/<?php echo $list_id?>" data-toggle="tooltip" data-placement="bottom" title="Contact List" class="edit"><i class="glyphicon glyphicon-list-alt"></i></a>
		                                        </li>
		                                        
		                                    	<li class="del-icon">
		                                        <a class="mfPopup_add" href="<?php echo site_url('contact_list/copy');?>/<?php echo $list_id?>"  data-toggle="tooltip" data-placement="bottom" title="Copy" id="copy_edit">
		                                       	<i class="glyphicon glyphicon-file"></i>
		                                        </a>
		                                        </li>
		                                        
		                                        <li class="del-icon">
		                                        <a href="<?php echo site_url('contact_list/delete');?>/<?php echo $list_id?>"  data-toggle="tooltip" data-placement="bottom" title="Delete" class="edit" onclick='return confirm("Are you sure, you want to delete this contact.");'><i class="glyphicon glyphicon-trash"></i></a>
		                                        </li>
		                                        
		                                        <li class="del-icon">
		                                        <a class="mfPopup_add edit" href="<?php echo site_url('contact_list/select_invite');?>/<?php echo $list_id?>" data-toggle="tooltip" data-placement="bottom" title="Invite" onclick="$('#<?php echo $list_id ?>').attr('checked','checked');" id="copy_invite"><i class="glyphicon glyphicon-envelope"></i></a>
		                                        </li>                                                                                                
		                                     </ul>
		                                    </td>
		                 </tr>  
		                  
		       
		      <?php }

			}
			else{
			 ?>	
               <tr>
	              	<td colspan="5" style="text-align: center;">
					   <?php echo NO_CONTACT_AVAILABLE; ?>
					</td>
			   </tr>
					
			<?php 
			}
			?>             
			                                                            
                            </tbody>
                            	
                        </table>
                        
                	</div><!-- End open-air -->
                    <div id="selecterr" style="text-align: center;" class="successbox"></div>
                    	<div class="mt">
                    		
		                    		<input type="hidden" name="action_form" id="action_form" value="" />
				            		<input type="hidden" name="select_invitation_id" id="select_invitation_id" value="" />
				            		<input type="hidden" name="cont_list" id="cont_list" value="" />
				            		<a href="<?php echo site_url('contact_list')?>" class="btn-event" >Clear Filter</a>
    	                  			<a href="<?php echo site_url('contact_list/select_invite');?>" class="btn-event mfPopup" id="send_invite_click" style="display: none;"><?php echo SEND_INVITATION_TO_SELECTED; ?></a>&nbsp;
    	                  			<a href="javascript://" class="btn-event btn-eventmargin_768 marB15_xs" onclick="set_check('invite');" id="send_invite_link"><?php echo SEND_INVITATION_TO_SELECTED; ?></a>
    	                  			<a href="<?php echo site_url('contact_list/add_new')?>" class="btn-event" ><?php echo CREATE_NEW_CONTACT_LIST; ?></a>
    	                  	        
    	                  </div>
    	                  
    	                   </form>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                
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
                                                    <input type="submit" class="btn-event2" value="search">
                                                    <a href="<?php echo site_url('contact_list')?>" class="btn-eventgrey" >Cancel</a>
                                                </div>
                                
                        					</div>
                                        	
                                        </form> 
                            </div>        
                            </div>    
                                </div>
                                
                    </div>
                
            </div><!-- End container -->
            <div class="pb"></div>
    </section>