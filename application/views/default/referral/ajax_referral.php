<script src="<?php echo base_url()?>js/jquery.form.js"></script>  

<!-- add by Jaimin -->
<!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="<?php echo base_url();?>js/lib/jquery.mousewheel-3.0.6.pack.js"></script>

   <link href="<?php echo base_url();?>css/popup.css" rel="stylesheet" />
<script src="<?php echo base_url();?>js/jquery.magnific-popup.js"></script>
 <script type="text/javascript">
      $(document).ready(function() {
      
    $('.mfPopup').magnificPopup({
          type: 'ajax',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });
       

      });
    </script>
<?php 

  if($error){?>
                         <div class="alert alert-danger mar10"><?php echo $error; ?></div>
                    <?php } ?>
                     <?php if($success){?>
                         <div class="alert alert-success mar10"><?php echo $success; ?></div>
                    <?php } 
                        if($referral){
                        	foreach ($referral as $value) { 
                        		$paid = $value['paid'];
								$due = $value['due'];
								$link = $value['link'];
								$your_share = $value['your_share'];
								$site_visits = $value['site_visits'];
                        	?>
                        <div class="form-group clearfix mar10">
                            	<div class="col-sm-3 col-xs-12 p0-xs0 lable-rite">
                            		<label><?php echo REFERRAL_LINK;?></label>
                            	</div>
                            	<div class="col-sm-8 col-xs-12 pright0 p0-xs0 del-icon icon3">
                            		<input type="text" value="<?php echo site_url('referral/index/'.$link.'/'.$user_id);?>">
                                    <a href=""><i class="glyph-copy edit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Copy"></i></a>
                                 </div>
                        </div>
                        <div class="form-group clearfix">  
                        <div class="col-sm-12 col-xs-12 p0">
                 <table class="table table_res mb0 event-info contct-table">
                        	<thead>
                            	<tr>
                                    <th><?php echo SITE_VISITS;?></th>
                                    <th><?php echo ACCOUNT_SIGNUPS;?></th>
                                    <th><?php echo SALES;?></th>
                                    <th><?php echo YOUR_SHARE;?></th>
                                    <th><?php echo PAID;?></th>
                                    <th><?php echo DUE;?></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            	<tr>
                                	<td><?php echo SecureShowData($site_visits);?></td>	
                                    <td>0</td>
                                    <td>$0.00</td>
                                    <td><?php echo SecureShowData($your_share);?></td>
                                    <td><?php echo $paid;?></td>
                                    <td><?php echo $due;?></td>
                                </tr>
                                                         
                            </tbody>
                            	
                        </table>
                 </div>
                 </div>
                 		<?php	
							}	
                        }
                        ?>