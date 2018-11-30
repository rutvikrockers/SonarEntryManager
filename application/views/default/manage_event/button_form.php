<!-- Start of Darshan Code -->
<?php 
$address='';
// print_r($event_venue);die();
if($event_id!=''){
        $venue_add1 = $event_venue['venue_add1'];
        $venue_add2 = $event_venue['venue_add2'];
        $venue_city = $event_venue['venue_city'];
        $venue_state = $event_venue['venue_state'];
        $venue_country = $event_venue['venue_country'];
		if($venue_add1!='')
		{	
			$address=$venue_add1;
		}
		if($venue_add2!='')
		{
			if($address!=''){
			$address=$address.','.$venue_add2;
				}else
				{
					$address=$venue_add2;
				}
		}
		if($venue_city!='')
		{
			if($address!=''){
			$address=$address.','.$venue_city;
				}else
				{
					$address=$venue_city;
				}
		}
		if($venue_state!='')
		{
			if($address!=''){
			$address=$address.','.$venue_state;
				}else
				{
					$address=$venue_state;
				}
		}
		if($venue_country!='')
		{
			if($address!='')
			{
				$address=$address.','.$venue_country;
				}else
				{
					$address=$venue_country;
				}
		}
	}
	$back = $oneTheme['background'];
	$title = $oneTheme['event_title'];
	$head_text = $oneTheme['header_text'];
	$box_back = $oneTheme['box_background'];
	$body_text = $oneTheme['body_text'];
	$box_border = $oneTheme['box_border'];
	$link = $oneTheme['links'];
	$box_head = $oneTheme['box_header'];
?>
<!-- End of Darshan Code -->
<style>
.wid55 {
	width: 55% !important;
}
#eventDesign.mainBGColor {
 background: <?php echo $back;
?>;
}
#eventDesign .eventTitleColor {
 color: <?php echo $title;
?>;
}
#eventDesign .eventTitleColor a, #eventDesign .eventTitleColor a:hover {
 color: <?php echo $title;
?>;
}
#eventDesign .red-event {
 color: <?php echo $head_text;
?>;
}
#eventDesign .event-detail {
 background: <?php echo $box_back;
?>;
}
#eventDesign .event-detail, #eventDesign .icon-protection {
 color: <?php echo $body_text;
?>;
}
#eventDesign .brdrColor, #eventDesign .event-detail, #eventDesign .red-event, #eventDesign .eventBrdr, #eventDesign .org_Name {
 border-color: <?php echo $box_border;
?>;
}
#eventDesign .linkColor, #eventDesign .org_Link, #eventDesign a, #eventDesign a:hover {
 color: <?php echo $link;
?>;
}
#eventDesign .linkColor:hover, #eventDesign .org_Link:hover, #eventDesign .eventTitleColor a:hover {
	text-decoration: underline;
}
#eventDesign .event-webpage .red-event {
 background-color: <?php echo $box_head;
?>;
}
#eventDesign .btn-event, #eventDesign .btn-saveevent {
 background:<?php echo $body_text;
?>;
 color:<?php echo $box_back;
?>;
}
#eventDesign .btn-event:hover, #eventDesign .btn-saveevent:hover {
 background:<?php echo $body_text;
?>;
 color:<?php echo $box_back;
?>;
	box-shadow: none !important;
}
#eventDesign .passBox input[type="password"] {
 border-color: <?php echo $body_text;
?>;
	box-shadow: none;
}
#eventDesign .red-event {
	border-bottom: 1px solid transparent !important;
}
</style>
<script src="<?php echo base_url()?>js/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/spectrum.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/spectrum.css" />
<script>
$(document).ready(function(){
	$('#recent_attendee').click(function(){
	
		var getStatusUrl= '<?php echo site_url('event/attendees/'.$id)?>';
			$.ajax({
				url: getStatusUrl,
				dataType: 'text',
				type: 'POST',
				timeout: 99999,
				global: false,
				data: '',
				success: function(data)
				{ 
					$('#attend').html(data);
						
				},		
				error: function(XMLHttpRequest, textStatus, errorThrown)
				{
				
				}
			});
	});
});

function show(offset){
	//alert(offset);
		var getStatusUrl= '<?php echo site_url('event/list_purchases/'.$id)?>/'+offset;
			$.ajax({
				url: getStatusUrl,
				dataType: 'text',
				type: 'POST',
				timeout: 99999,
				global: false,
				data: '',
				
				success: function(data)
				{ 
				//alert(data);
					$('#order').html(data);
				},		
				error: function(XMLHttpRequest, textStatus, errorThrown)
				{
				
				}
			});
		}
		
	function cancel_event(){
		if(confirm('<?php echo ARE_YOU_SURE_YOU_WANT_TO_CANCEL_THIS_EVENT;?>')){
			document.location.href = "<?php echo site_url('event/cancel_single_event/'.$id)?>";
		}
		return false;
	}
	
	function delete_event(){
		if(confirm('<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_EVENT;?>')){
			document.location.href = "<?php echo site_url('event/delete_single_event/'.$id)?>";
		}
		return false;
	}
	
</script>
<script>
 $(document).ready(function() {
 	document.getElementById('btn_widget').value = "<?php echo BUY_TICKETS.' '.$site_setting['site_name']; ?>";
 	document.getElementById('othertext').value = "<?php echo CLICK_AND_REGISTER;?>";
    $('#btn_widget').addClass('smallFont');	
    $('#btn_widget').removeClass('btn');	
    $('#copypath').val('');
    
    
	$(".full").spectrum({
		    className: "full-spectrum",
		    maxPaletteSize: 10,
		    preferredFormat: "hex",
		    localStorageKey: "spectrum.demo",
		    
		});
 });
 
 
 /* Color customization */
	function set_preview_invite(ele,id){
					var hex = ele.value;
					
					if(id=='text'){
						$('#btn_widget').css('color',  hex);
					}
					if(id=='back'){
						$('#btn_widget').css('backgroundColor', hex);
					}
			} 
 </script>
<?php 

$data1['events_id']=$id;

$event_status = $event_data['active'];
$event_title = $event_data['event_title'];
$venue_id = $event_data['venue_id']; // Darshan
$street_address = $event_data['street_address'];
$event_start_date_time = datetimeformat($event_data['event_start_date_time']);


$is_delete = delete_check($event_status);


?>
<?php $this->load->view('default/common/dashboard-header')?>
<section class="mainBGColor" id="eventDesign">
<div class="container marTB50">
  <div class="row">
    <div class="col-md-8 col-sm-12">
      <div class="row">
        <div class="event-webpage col-sm-12">
          <div class="red-event">
            <h4><?php echo BUTTON_WIDGET;?></h4>
          </div>
          <div class="clear"></div>
        </div>
        <div class="col-sm-12">
          <div class="event-detail pd15 clearfix">
            <h4> <?php echo PREVIEW;?> </h4>
            <div class="btn_bg">
              <?php 
        			$page_url; 
                    $event_url_link = $event_details['event_url_link'];
        			if($event_url_link=='' || $event_url_link==null){
        				$page_url = site_url('event/view/'.$events_id);
        			}else{
        				$page_url = site_url('event/view/'.$event_url_link);
        			} ?>
              <a href="<?php echo $page_url; ?>" target="_blank">
              <input type="button" class="btn" id="btn_widget" value =""  />
              </a> </div>
            <div class="clear"></div>
            <script type="text/javascript">
        function selectall()
		{ 
		
			var text_val=document.getElementById('copypath');			
			text_val.focus();			
			text_val.select();			
			if (!document.all) return; // IE only
			
			r= text_val.createTextRange();
			
			r.execCommand('Copy');			
		}
		
	function set_button_widget(val){
		//alert(val);
		if (document.getElementById('buytickets').checked) {
			
			 $('#copypath').val('');
				  result = document.getElementById('buytickets').value;
				  document.getElementById('othertext').disabled=true;
				  document.getElementById('btn_widget').value = "<?php echo BUY_TICKETS.' '.$site_setting['site_name']; ?>";
		
		}
		if (document.getElementById('regnow').checked) {
			
			    $('#copypath').val('');
				 
				  document.getElementById('othertext').disabled=true;
				  result = document.getElementById('regnow').value;
				  document.getElementById('btn_widget').value = "<?php echo REGISTER_NOW.' on '.$site_setting['site_name']; ?>";
				 
		}
		if (document.getElementById('other').checked) {
			      
			      document.getElementById('othertext').disabled=false;
			      result = document.getElementById('othertext').value;
			      if(result.trim()==""){ result = "<?php echo CLICK_AND_REGISTER;?>"; }
				  document.getElementById('btn_widget').value = result;
		}
		
		if (document.getElementById('smallText').checked) {
				  $('#copypath').val('');
				  
				  $('#btn_widget').addClass('smallFont');		

			  	  $('#btn_widget').removeClass('btn');
			  	  $('#btn_widget').removeClass('mediumFont');
			  	  $('#btn_widget').removeClass('largeFont');
		}
		else if (document.getElementById('mediumText').checked) {
			 	  $('#copypath').val('');
				  
				  $('#btn_widget').addClass('mediumFont');
				  
				  $('#btn_widget').removeClass('btn');
				  $('#btn_widget').removeClass('smallFont');
			  	  $('#btn_widget').removeClass('largeFont');
		
		}
		else if (document.getElementById('largeText').checked) {		
			 	  $('#copypath').val('');		   
				  
				  $('#btn_widget').addClass('largeFont');
				  
				  $('#btn_widget').removeClass('btn');
				  $('#btn_widget').removeClass('mediumFont');
			  	  $('#btn_widget').removeClass('smallFont');
		}

	}
	
	function get_code(){
		var back_color = document.getElementById('backcol').value;
		var text_color = document.getElementById('textcol').value;
		var widget_text = document.getElementById('btn_widget').value;
		var widget_size;
		
		if (document.getElementById('smallText').checked){
			widget_size = 0; 
		}
		if (document.getElementById('mediumText').checked){
			widget_size = 1; 
		}
		if (document.getElementById('largeText').checked){
			widget_size = 2; 
		}
		
		var page_path = '<?php echo site_url("manage_event/widget_info/".$event_details["id"]); ?>';
        $.ajax({
            type: "POST",
            data:  {widgetText: widget_text, text_color: text_color, back_color: back_color, widget_size: widget_size},
            url: page_path,
            success: function(data) {
              
          var site_url = '<?php echo site_url("manage_event/custombutton"); ?>'+'/'+data.trim();
         $('#copypath').val('<div id="widgets"></div><iframe src="'+site_url+'" frameBorder="0" width="100%"></iframe>');

              }
        });
       
        
	}
</script>
            <div class="form-group mb0 mt">
              <h4><?php echo CUSTOMIZE;?></h4>
              <div class="row">
                <div class="col-lg-6 col-sm-6">
                  <h4 class="small-size"><?php echo TEXT?>:</h4>
                  <div class="form-group event-title">
                    <ul class="list-unstyled">
                      <li>
                        <label>
                        <input type="radio" name="manage_event[btntext]" id="buytickets" value="<?php echo BUY_TICKETS;?>" onclick="set_button_widget('buynow');" checked="checked" />
                         <?php echo BUY_TICKETS;?></label>
                      </li>
                      <li>
                        <label>
                        <input type="radio" name="manage_event[btntext]" id="regnow" value="<?php echo REGISTER_NOW;?>" onclick="set_button_widget('regnow');" />
                        <?php echo REGISTER_NOW;?></label>
                      </li>
                      <li>
                        <label>
                        <input type="radio" name="manage_event[btntext]" id="other" value="<?php echo OTHER;?>" onclick="set_button_widget('other');" />
                        <?php echo OTHER;?>:</label>
                        <input type="text" name="manage_event[othertxt]" id="othertext" value="" style="width: 65%;" onchange="set_button_widget(this.value);" disabled="true" maxlength="30" />
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                  <h4 class="small-size"><?php echo SIZE;?>:</h4>
                  <div class="form-group event-title">
                    <ul class="list-unstyled">
                      <li>
                        <label class="radio">
                        <input type="radio" name="size[btnSize]" id="smallText" value="small" onclick="set_button_widget('small');" checked="checked" />
                        <?php echo SMALL;?></label>
                      </li>
                      <li>
                        <label>
                        <input type="radio" name="size[btnSize]" id="mediumText" value="medium" onclick="set_button_widget('medium');" />
                        <?php echo MEDIUM;?></label>
                      </li>
                      <li>
                        <label>
                        <input type="radio" name="size[btnSize]" id="largeText" value="large" onclick="set_button_widget('large');" />
                        <?php echo LARGE;?></label>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group event-title small-font">
            	<div class="row">
                	<div class="col-lg-6 col-sm-6 col-xs-6">
                    	<h4 class="small-size"><?php echo BACKGROUND_COLOR;?></h4>
                		<input type='color' class="full" id="backcol" value="#7AB962" onchange="set_preview_invite(this,'back');" />               
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-6">
                    	<h4 class="small-size"><?php echo TEXT_COLOR;?></h4>
                		<input type='color' class="full" id="textcol" value="#FFFFFF" onchange="set_preview_invite(this,'text');"  />
                    </div>
                </div>
            </div>
            <div class="form-group event-title mt">
            	
                  <input type="submit" class="btn-event mb" id="generate_code" value ="<?php echo GENERATE_CODE;?>" onclick="get_code();" style="font-size: 15px;" />
                  <label> <?php echo printf(CLICK_TO_GENERATE_SITE_BUTTON,$site_setting['site_name']); ?> </label>
                  <div id="widgets">
                    <textarea id="copypath" style="height:100px;" onclick="this.select()" readonly="readonly"><a href="<?php echo  $page_url; ?>" target="_blank">" /></a></textarea>
                    <a href="javascript:" onclick="selectall()" class="copy"></a><br />
                  </div>
                
                <label><?php echo COPY_AND_PASTE_THIS_CODE_FOR_USE_ON_YOUR_WEBSITE;?></label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- RIGHT CONTENT -->
    <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
  </div>
</div>
<!-- End container -->
</section>