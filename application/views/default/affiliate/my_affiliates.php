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

   <script src="<?php echo base_url();?>js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap-datetimepicker.css" />
<script>
$(document).ready(function() {
	$(".fancybox").fancybox({
		
	});
});
</script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.zclip.min.js"></script>
<?php 
	$data1['events_id'] = $id;
?>

<section class="eventDash-head">
  	<div class="container">
    	<div class="row">              
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 test-contct test-cntr">
                <h1><?php echo MY_ACCOUNT; ?></h1>
          </div>
         
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right pt mt10 con-cntr">
        
            <div class="halfacc">
             <p><?php echo SecureShowData($site_setting['site_name']); ?> <?php echo ACCOUNT_SINCE; ?> <span><?php echo datetimeformat($user_data['created_at']);?> <?php echo timeFormat($user_data['created_at']); ?></span></p>
            </div>
          </div>
        
      </div>
    </div>
  </section>
  
 <section>  
      <div class="container marTB50"> 
    <?php if($success_msg){ ?>
          <div class="alert alert-success message"><?php echo $success_msg; ?></div>
    <?php }?>
    <?php if($error_msg){ ?>
          <div class="alert alert-danger message"><?php echo $error_msg; ?></div>
    <?php } ?>
      
    <?php if($this->session->flashdata('common_message') != ''){ ?>
      		<div class="alert alert-danger mar10"><?php echo $this->session->flashdata('common_message'); ?></div>
  	<?php }?>
      	<div class="row">                
                <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12">
              
              <?php 
			  	if($affiliates){ 
            $i=0;

  					foreach($affiliates as $aff){ $i++;
  						$visit = checkValue($aff['visit']);
  						$tickets_sold = checkValue($aff['tickets_sold']);
  						$sales = $aff['sales'];
  						$your_share = $aff['your_share'];
  						$paid = $aff['paid'];
  						$due = $aff['due'];
  						$event_title = $aff['event_title'];
  						$event_url_link = $aff['event_url_link'];
  						$code = $aff['code'];
  						$user_id_a = $aff['user_id'];
  						$affiliate_id = $aff['affiliate_id'];
              $event_id = $aff['eid'];

              $affiliate_data =getRecordById('affiliates','id',$affiliate_id);
              $note=$affiliate_data['notes'];
              $fee_amt = $affiliate_data['fee_amt'];
              $fee_perc = $affiliate_data['fee_perc'];
              if($fee_amt==0.0)
              {
                $fee=$fee_perc.'%';
              }else
              {
                $fee=set_event_currency($fee_amt,$affiliate_data['event_id']);
              }
					?>
						<div class="row">
                            
                <div class="event-webpage col-xs-12 col-sm-12">
                	<div class="red-event width100 "><h4><?php echo $event_title;?> <span><?php echo anchor('event/contact_organizer/'.$aff['euser_id'].'/'.$event_id,Contact_the_organizer,'class=" fancybox fancybox.iframe"')?></span></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
                	<div class="admin">    
                    </div>
			
                <div class="col-sm-12 clearfix">
                    <div class="event-detail event-detail2 clearfix pd15">
                    <form class="event-title">
                    	
                        <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 p0-xs0 lable-rite">
                            		<label><?php echo REFERRAL_LINK;?></label>
                            	</div>
                                 <div class="col-sm-8 col-xs-12 pright0 p0-xs0 del-icon copy-icon icon3">


                                <input type="text" id='link_<?php echo $i;?>'  value="<?php echo site_url('event/view/'.$event_url_link.'/'.$affiliate_id.'/'.$user_id_a);?>">
                                    <a href="javascript://" id='copy-button_<?php echo $i;?>' class="glyph-copy edit" data-toggle="tooltip" data-placement="bottom" title="Copy" data-original-title="Copy"><i class="glyph-copy edit" data-toggle="tooltip" data-placement="bottom" title="Copy" data-original-title="Copy"></i></a>
                                 </div>
                                 <script type="text/javascript">
                                  $(document).ready(function () {
                                      $("#copy-button_<?php echo $i;?>").zclip({
                                          path: "<?php echo base_url();?>js/ZeroClipboard.swf",
                                          copy: function(){return $('#link_<?php echo $i;?>').val();},
                                          beforeCopy: function () { },
                                          afterCopy: function () {
                                              alert('Copy To Clipboard : \n'+ $('#link_<?php echo $i;?>').val());
                                          }
                                      });
                                 });
                          </script>
                        </div>
                      <div class="form-group m0 clearfix">  
                        <div class="col-sm-12 col-xs-12 p0">

                       <?php echo THE_REFERRAL_FEE_FOR;?> "<?php echo $affiliate_data['code'] ;?>" <?php echo AFFILIATE_PROGRAM_IS;?> <?php echo $fee;?> <?php echo OF_TICKET_SALES;?>
                 <table class="table table_res mb0 my_affiliate_table contct-table">
                          <thead>
                              <tr>
                                    <th><?php echo SITE_VISITS;?></th>
                                    <th><?php echo TICKETS_SOLD;?></th>
                                    <th><?php echo SALES;?></th>
                                    <th><?php echo YOUR_SHARE;?></th>
                                    <th><?php echo AMOUNT;?></th>

                                </tr>
                            </thead>
                            
                            <tbody>
                            	<tr>
                                	<td><?php echo $visit;?></td>	
                                    <td><?php echo $tickets_sold;?></td>
                                    <td><?php echo set_event_currency($sales,$event_id);?></td>
                                    <td><?php echo set_event_currency($your_share,$event_id);?></td>

                                    <td><?php echo set_event_currency($due,$event_id);?></td>
                                </tr>

                                <tr >
                                  <td colspan='5' style="word-break:break-all"> <b>Notes:</b><?php echo $note;?></td>
                                </tr>                                
                                                         
                            </tbody>
                            	
                        </table>

                 </div>
                 </div>
                 
                    </form>
                    
                 	 </div><!-- end event-detail -->
               </div>      
                
              </div>
					
					<?php
                    }
				}
			  ?>
           </div><!-- End col-sm-8 -->          

      <!-- RIGHT CONTENT -->
                 <?php echo $this->load->view('default/common/account_sidebar');?>
             </div>
                
            </div><!-- End container -->
    </section>
    
    <!-- Start footer -->
   
<script>
	$(document).ready(function(){
		$(".rover_tip").popover();
	});
</script>
    
<script>
	$(document).ready(function(){
		$(".edit").tooltip();
	});
</script>
    
<script type="text/javascript">
	function hideshow(which){
		if (!document.getElementById)
  		return
		if (which.style.display=="block")
	   	which.style.display="none"
		else
		  which.style.display="block"
	}
</script>