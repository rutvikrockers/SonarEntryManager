<script>
$(document).ready(function(){

	var specialKeys = new Array();
    specialKeys.push(8); //Backspace
    specialKeys.push(9); //Tab
    specialKeys.push(46); //Delete
    specialKeys.push(36); //Home
    specialKeys.push(35); //End
    specialKeys.push(37); //Left
    specialKeys.push(39); //Right
    
 $("#code").keypress(function (evt) 
 {	
	   var keyCode = evt.keyCode == 0 ? evt.charCode : evt.keyCode;
	   if ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (specialKeys.indexOf(evt.keyCode) != -1 && evt.charCode != evt.keyCode))
	   { 
      	return true;
  	 }
	   else
	   {
	      return false;
  	 }
	});

});
</script>

<?php 
$data1['events_id']=$id;

if($single_aff){
	$code = $single_aff['code'];
	$fee_amt = $single_aff['fee_amt'];
	$fee_perc = $single_aff['fee_perc'];
	if($fee_amt<0) {
        $fee_amt = '';
    }
	if($fee_perc<0) {
	   $fee_perc = '';
    }
	$public = $single_aff['public'];
	$notes = $single_aff['notes'];
}else{
    if(!isset($code)) {
        $code = ''; 
    }
    if(!isset($fee_amt)) {
        $fee_amt = ''; 
    }
    if(!isset($fee_perc)) {
        $fee_perc = ''; 
    }
    if(!isset($notes)) {
        $notes = ''; 
    }
}

$aff_user = getAllRecordById('user_affiliates','affiliate_id',$aff_id);
$read_only='';

if(count($aff_user) > 1 && $aff_id != '')
{
	$read_only = 'readonly="readonly"';
}
else
{
	$read_only ='';
}

?>
<?php $this->load->view('default/common/dashboard-header')?>
<section>  
<script> 
$(document).ready(function(){ 
$(".edit").tooltip(); 
}); 
</script> 
            <div class="container marTB50">            	
              
                <?php if($error){?>
                		 <div class="alert alert-danger mar10"><?php echo $error; ?></div>
                	<?php } ?>
                	
             
                <div class="row">
                <div class="col-md-8 col-sm-12">
                	 
               
                	
                <form class="event-title event-title2" method="post" action="<?php echo site_url('affiliate/create_affiliate/'.$id.'/'.$aff_id);?>" name="create_aff" id="create_aff">
                <div class="row">    
                            
                <div class="event-webpage col-xs-12 col-sm-12">
                	<div class="red-event width100 "><h4><?php echo CREATE_NEW_AFFILIATE_PROGRAM;?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
			
                <div class="col-sm-12 col-xs-12 clearfix">
                    <div class="event-detail event-detail2 pt pb">
                        
                            	<div class="form-group clearfix">
                                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                                   <label class="mt0-xs1"><?php echo CODE_OF_AFFILIATE_PROGRAM;?></label>
                                 </div>
                                 <div class="col-sm-7 col-xs-8 width-xs">
                                  <input type="text" name="code" id="code" value="<?php echo $code;?>" <?php echo $read_only;?>>
                                  <p class="mt10 p0"><?php echo SPACES_APOSTROPHES_NON_ALPHANUMERIC_CHARACTERS_NOT_ALLOWED;?></p>
                                 </div>
                                 </div>
                       	
                                <div class="form-group pt clearfix">
                                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                                   <label class="mt0-xs1"><?php echo REFERRAL_FEE;?></label>
                                 </div>
                                 <div class="col-sm-8 col-xs-9 width-xs p0">
                                
                                <div class="col-xs-4 pright0 width-xs">
                                <div class="discount-dollar">
                                  <label><?php echo getCurrencySymbol($id); ?></label>
                                  </div>
                                <div class="col-sm-9 col-xs-9 pright0">
                                  <input type="text" placeholder="0.0" name="fee_amt" id="fee_amt" value="<?php echo $fee_amt;?>">
                                  </div>
                                  </div>
                                  
                                  <div class="col-xs-8 pleft0 pright0 pleft15-xs1 pt10-xs width-xs">
                                  <div class="discount-dollar">
                                  <label>or</label>
                                  </div>
                                  <div class="col-sm-4 col-xs-4 pright0">
                                  <input type="text" placeholder="0.0" name="fee_perc" id="fee_perc" value="<?php echo $fee_perc;?>">
                                  </div>
                                  <div class="ticket-price2 pl10">
                                  <label><?php echo OFF_TICKET_PRICE;?></label>
                                  <i class="glyphicon glyphicon-question-sign edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Select which type of referral fee mechanism you want to setup for this affiliate."></i>
                                  </div>
                                  
                                  </div>
                                  
                                  </div>
                                 </div>
                                 
                                 <div class="form-group pt clearfix">
                                 
                                 </div>
                                 
                                 <div class="form-group clearfix">
                                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                                   <label><?php echo NOTES;?></label>
                                 </div>
                                 <div class="col-sm-7 col-xs-9 width-xs">
                                   <textarea name="notes" id="notes"><?php echo $notes;?></textarea>
                                 </div>
                                 </div>                                 
                    </div>
                 </div>
                 
                 <div class="col-sm-12">
                
                <div class="text-right">
                <input type="submit" value="Save" class="btn-event2">
                <a href="<?php echo site_url('affiliate/all_affiliate/'.$id)?>" class="btn-eventgrey marL10"><?php echo Cancel;?></a>
                </div>
                
                </div>
                
             </div>
             
                  </form>           
                 <div class="row">    
                            
                <!-- End event-webpage -->
                
                    
                 </div>
             </div>
                
                <!-- RIGHT CONTENT -->
                <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
             	</div>
                
            </div><!-- End container -->
            <div class="pb"></div>
    </section>
    