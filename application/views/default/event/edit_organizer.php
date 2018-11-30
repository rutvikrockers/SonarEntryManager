
<div class="white-popup-block popup-container">
<div class="popupHead">
    <h1><?php echo EDIT.' '.Organizer; ?></h1>
</div>
<script>
	var base_url = '<?php echo base_url();?>';

</script>
    <script src="<?php echo base_url();?>js/redactor/redactor.min.js"></script>
    <link href="<?php echo base_url();?>css/redactor.css" rel="stylesheet" />

    <script>
    		$(document).ready(function(){
    		$('#host_description_edit').redactor({
    			minHeight: 200,
    			imageUpload: '<?php echo base_url('event/image_upload') ;?>'
    		});
	});
	</script>
<link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet">

<div class="">

<form action="<?php echo site_url('event/edit_organizer/'.$org_id)?>"  id="newguestForm" method="post" name="newguestForm" class="event-title">
<?php if($error != '') {?><div class="alert alert-danger mar10"><?php echo $error; ?></div><?php }?>
	<div id="organization_div" >
	                            
	    <div class="form-group clearfix " >
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Organizer; ?><span>&#42;</span></label>
	    	</div>
	    	
	    	<div class="col-sm-9 col-xs-12">
	    		<input type="text" name="organizer_host_edit" id="organizer_host_edit" Placeholder="<?php echo Organizer; ?>" value="<?php echo SecureShowData($name);?>">
	    		<p class="error" id="organizer_host_error"></p>
	    	</div>
	    	
	    </div>
	   
	    <div class="form-group clearfix ">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Organizer_Description; ?><span>&#42;</span></label>
	    	</div>
	    	
	    	<div class="col-sm-9 col-xs-12 text-editor">
	            	<textarea id="host_description_edit" name="host_description_edit" ><?php echo SecureShowData($description);?></textarea>
	            	<p class="error" id="host_description_error"></p>
	    	</div>
	    </div>
	    
	</div>
	
	<input type="hidden" name="organizer_id_edit" id="organizer_id_edit" value="<?php echo $org_id;?>" />
	<div class="col-lg-12 col-lg-offset-3">        
		<input class="btn-event" name="commit" type="button" value="Save" onclick="check_organizer_validdate()" />
        <input class="btn-eventgrey btn-closeP marL10" name="commit" type="button" value="Cancel" />
	</div>

</form>
</div>
</div>


<script>
function check_organizer_validdate(){
	
	var name = $("#organizer_host_edit"); 
	var desc = $("#host_description_edit"); 
	
	if(name.val() == ''){
		$("#organizer_host_error").html(validat_js_organizer_host_required); 
		$("#organizer_host_error").focus();
		return false;	
	}
	
	else if(desc.val() ==''){
		$("#host_description_error").html(validat_js_organizer_description_required); 
		$("#host_description_error").focus();
		return false;	
	}
	
	$("#organizer_host_error").html(''); 
	$("#host_description_error").html(''); 
	
			var url = '<?php echo site_url('event/edit_organizer/'.$org_id)?>'; // the script where you handle the form input.
			var formData = new FormData($('form#newguestForm')[0]);
			
			 $.ajax({
		           type: "POST",
		           url: url,
				 	dataType: 'json',
		           data: formData,
        		  
		           success: function(data)
		           {
		           	
					  if(data.organizer.length>0)
					  {
					  var select='<select class="select-pad" onchange="org_change(this)"  name="organiser_id_event" id="organiser_id_event"><option value=""><?php echo Select_Organizer;?></option>';
						var obj = data.organizer;
						
							for (i=0; i < obj.length; i++) {
								var selected='';
								if(obj[i]['id']==data.id)
								{
									var selected='selected';	
								}
								var option = '<option value="'+obj[i]['id']+'" '+selected+'>'+obj[i]['name']+'</option>';
								select=select+option;
							}
							var info ='</select><p id="selectorganizererrorInfo"></p>';
							select=select+info;
						parent.$('#org_replace').html(select);				
									
		              	alert('<?php echo Organizer." ".RECORDS_UPDATED;?>');
						setTimeout(function() {  
							  $('.mfp-close').click(); 
							}, 1000);
		          	}
		          },
					cache: false,
			        contentType: false,
			        processData: false
		         });
}
</script>
