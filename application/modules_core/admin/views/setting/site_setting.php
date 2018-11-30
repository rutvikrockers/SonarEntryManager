 <div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_SITE_SETTING; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php 
                if($msg == 'update')
                    {   ?>
                        
                            <div class="alert alert-success" role="alert">
                            <button class="close" data-dismiss="alert">x</button>
                            <strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_UPDATED;?>
                            </div>
            
            <?php } ?>
            
            
            
             <?php 
                if($error!= '')
                { ?>
                    
                            <div class="alert alert-danger" role="alert">
                            <button class="close" data-dismiss="alert">x</button>
                            <strong><?php echo ERRORS; ?>!</strong> <?php echo $error;?>
                            </div> 
                <?php } ?>   
                <?php
                                
                                $attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting' , 'enctype' => 'multipart/form-data' );    
                                echo form_open('admin/site_setting/edit_site_setting/',$attributes);

                 ?>   
                 <input type="hidden" name="id"  value="<?php echo $id;?>"/>
                 
            <div class="row">
                <div class="col-lg-12 clearfix">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo BASIC_SITE_SETTING; ?>
                        </div>
                        <div class="panel-body">

                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo SITE_VERSION; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <label><?php echo $site_version; ?></label>
                                    </div>
                                </div>
                           
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo SITE_NAME; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="site_name" value="<?php echo SecureShowData($site_name); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo SITE_LANGUAGE; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="site_language">
                                        <?php 
                                        if($language){
                                        
                                            foreach($language as $lang){
                                            
                                                $language_name=$lang['language_name'];
                                                $lan_id=$lang['id']; 
                                                $select="";
                                                if($lan_id == $site_language) { $select="selected=selected"; }
                                                
                                                ?>
                                                 <option value="<?php echo $lan_id;?>" <?php echo  $select; ?>><?php echo SecureShowData($language_name); ?></option>
                                            <?php }
                                        }
                                        ?>    
                                       </select>
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo VERIFY_ACCOUNT_ON_SIGN_UP; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="verify_account">
                                                <option value="0" <?php if($verify_account == 0) { echo "selected"; } ?> ><?php echo DISABLE; ?></option>
                                                <option value="1" <?php if($verify_account == 1) { echo "selected"; } ?>><?php echo ENABLE; ?></option>
                                            </select>
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo "Location sharing"; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="location_popular_event_enable">
                                                <option value="0" <?php if($location_popular_event_enable == 0) { echo "selected"; } ?> ><?php echo DISABLE; ?></option>
                                                <option value="1" <?php if($location_popular_event_enable == 1) { echo "selected"; } ?>><?php echo ENABLE; ?></option>
                                            </select>
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix" style="display: none">
                                    <div class="col-sm-3">
                                        <label><?php echo FORGOT_PASSWORD_TIME_LIMIT_HOURS; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="forgot_time_limit" value="<?php echo $forgot_time_limit;?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix" style="display: none">
                                    <div class="col-sm-3">
                                        <label><?php echo SITE_MODE; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="site_mode">
                                                <option value="1" <?php if($site_mode == 1) { echo "selected"; } ?>><?php echo LIVE_MODE; ?></option>
                                                <option value="0" <?php if($site_mode == 0) { echo "selected"; } ?>><?php echo TESTING_MODE; ?></option>
                                         </select>
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix" style="display:none">
                                    <div class="col-sm-3">
                                        <label><?php echo FEATURE_EVENT_LIMIT; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="feature_limit" value="<?php echo $feature_limit; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix" style="display:none">
                                    <div class="col-sm-3">
                                        <label><?php echo UPCOMING_EVENT_LIMIT; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="upcoming_limit" value="<?php echo $upcoming_limit; ?>">
                                    </div>
                                </div>
                            
                        </div>
                    
                 </div>
                 
                    <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo CURRENCY; ?>
                            </div>
                            <div class="panel-body">
                                
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3">
                                            <label><?php echo CURRENCY; ?></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="currency">
                                                <?php 
                                                if($currency_data)
                                                {
                                                    foreach($currency_data as $curr)
                                                        {
                                                            $code=$curr['currency_code'];
                                                            $symbol=$curr['currency_symbol'];
                                                            
                                                            $select="";
                                                            if($symbol == $currency_symbol && $code == $currency_code) $select="selected=selected";
                                                            
                                                ?>
                                                    <option value="<?php echo $symbol.','.$code; ?>" <?php echo $select; ?>><?php echo $code;?>,<?php echo $symbol;?></option>
                                                    
                                                <?php } 
                                                    
                                                    }
                                                ?>    
                                                </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3">
                                            <label><?php echo WHERE_TO_DISPLAY_CURRENCY_SYMBOL; ?></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="currency_symbol_side">
                                                    <option value="left_code"<?php if($currency_symbol_side == 'left_code') { echo "selected";}?>>USD100 </option>
                                                    <option value="left_space_code" <?php if($currency_symbol_side == 'left_space_code') { echo "selected";}?>>USD 100</option>
                                                    <option value="right_code" <?php if($currency_symbol_side == 'right_code') { echo "selected";}?>>100USD</option>
                                                    <option value="right_space_code" <?php if($currency_symbol_side == 'right_space_code') { echo "selected";}?>>100 USD</option>
                                                </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3">
                                            <label><?php echo DECIMAL_POINTS_AFTER_AMOUNT; ?></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="decimal_points">
                                                    <option value="0" <?php if($decimal_points == 0) { echo "selected";}?>>0</option>
                                                    <option value="1" <?php if($decimal_points == 1) { echo "selected";}?>>1</option>
                                                    <option value="2" <?php if($decimal_points == 2) { echo "selected";}?>>2</option>
                                             </select>
                                        </div>
                                    </div>
                                
                            </div>
                        
                     </div>
                     
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo DATE_TIME; ?>
                        </div>
                        <div class="panel-body">
                            
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo DATE_FORMAT; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                    <select class="form-control" name="date_format" id="date_format" onchange="changeDateFormat(this.value);">                                    
                                        <option value='d M, Y' <?php if($date_format == 'd M, Y') { echo 'selected="selected"'; } ?>>20 Jan, 2015</option>
                                        <option value='Y-m-d' <?php if($date_format == 'Y-m-d') { echo 'selected="selected"'; } ?>>2015-01-20</option>  
                                        <option value='m-d-Y' <?php if($date_format == 'm-d-Y') { echo 'selected="selected"'; } ?>>01-20-2015</option> 
                                        <option value='d-m-Y' <?php if($date_format == 'd-m-Y') { echo 'selected="selected"'; } ?>>20-01-2015</option>
                                        <option value='Y/m/d' <?php if($date_format == 'Y/m/d') { echo 'selected="selected"'; } ?>>2015/01/20</option> 
                                        <option value='m/d/Y' <?php if($date_format == 'm/d/Y') { echo 'selected="selected"'; } ?>>01/20/2015</option>
                                        <option value='d/m/Y' <?php if($date_format == 'd/m/Y') { echo 'selected="selected"'; } ?>>20/01/2015</option> 
                                    </select>    
                                    </div> 
                                    <div>
                                        <?php $date_example=''; 
                                            if($date_format == 'd M, Y'){ $date_example = 'Day Month, Year'; } 
                                            else if($date_format == 'Y-m-d'){ $date_example = 'Year-month-Day'; } 
                                            else if($date_format == 'm-d-Y'){ $date_example = 'Month-Day-Year'; } 
                                            else if($date_format == 'd-m-y'){ $date_example = 'Day-Month-Year'; } 
                                            else if($date_format == 'Y/m/d'){ $date_example = 'Year/Month/Day'; } 
                                            else if($date_format == 'm/d/Y'){ $date_example = 'Month/Day/Year'; } 
                                            else if($date_format == 'd/m/Y'){ $date_example = 'Day/Month/Year'; } 
                                        ?>
                                        <span id="time_span">
                                            <?php echo $date_example; ?>
                                        </span>
                                    </div> 
                                </div>
                                <script type="text/javascript">

                                function changeDateFormat(format){
                                    if(format == 'd M, Y'){ $("#time_span").text('Day Month, Year'); } 
                                    else if(format == 'Y-m-d'){ $("#time_span").text('Year-month-Day'); } 
                                    else if(format == 'm-d-Y'){ $("#time_span").text('Month-Day-Year'); } 
                                    else if(format == 'd-m-y'){ $("#time_span").text('Day-Month-Year'); } 
                                    else if(format == 'Y/m/d'){ $("#time_span").text('Year/Month/Day'); } 
                                    else if(format == 'm/d/Y'){ $("#time_span").text('Month/Day/Year'); } 
                                    else if(format == 'd/m/Y'){ $("#time_span").text('Day/Month/Year'); }                                     
                                }

                                </script>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo DATE_TIME_FORMAT; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                    <select class="form-control" name="date_time_format" id="date_time_format">
                                        <option value='H:i' <?php if($date_time_format == 'H:i') { echo 'selected="selected"'; } ?>>05:45 (24 Hours)</option>
                                        <option value='g:i a' <?php if($date_time_format == 'g:i a') { echo 'selected="selected"'; } ?>>05:45 PM (12 Hours)</option>
                                    </select>
                                    </div>                                    
                                </div>
                            
                        </div>
                    
                 </div>
                 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo EVENT_SETTING; ?>
                        </div>
                        <div class="panel-body">
                            
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo PAID_TICKET_FEE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="paid_ticket_fee" value="<?php echo $paid_ticket_fee; ?>">
                                    </div>  
                                </div>
                                    
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo PAID_TICKET_FLAT_FEE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="paid_ticket_flat_fee" value="<?php echo $paid_ticket_flat_fee; ?>">
                                    </div>  
                                </div>

                                <div class="form-group clearfix" style="display: none">
                                    <div class="col-sm-3">
                                        <label><?php echo EVENT_START_DAY_NO_OF_DAY; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="event_start_day" value="<?php echo $event_start_day; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix" style="display: none;">
                                    <div class="col-sm-3">
                                        <label><?php echo MINIMUM_PURCHASE_TICKET; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="min_purchase_allowed" value="<?php echo $min_purchase_allowed;?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo MAXIMUM_PURCHASE_TICKET; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="max_purchase_allowed" value="<?php echo $max_purchase_allowed;?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo MAXIMUM_TICKET_QUANTITY; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="max_ticket_qnty" value="<?php echo $max_ticket_qnty;?>">
                                    </div>
                                    <div class="col-sm-9 col-md-offset-3">
                                        <p class="payment-message"><?php echo QTY_VALIDAIONT_SETTING_MESSAGE; ?></p>
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo MAXIMUM_TICKET_PRICE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="max_ticket_price" value="<?php echo $max_ticket_price;?>">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo TICKET_TYPE; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                        <select  class="form-control" name="ticket_type">
                                            <option value="0" <?php if($ticket_type == 0){ echo "selected"; } ?>><?php echo NORMAL_TICKET; ?></option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix hide">
                                    <div class="col-sm-3">
                                        <label><?php echo PAYMENT_TESTING_MODE; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                         <label style="font-size: 11px;">Virtual Payment Gateway (Purchase ticket without payment gateway)</label>
                                    </div>
                                </div>
                                <input type="hidden" name="test_payments" value="0">

                                 <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label>Payment Type</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="is_wallet">
                                            <option value="1" <?php echo ($is_wallet == 1) ? "selected='selected'" : ''; ?>>Wallet</option>
                                            <option value="2" <?php echo ($is_wallet == 2) ? "selected='selected'" : ''; ?>>Adaptive</option>
                                         </select>
                                         
                                    </div>
                                    <div class="col-sm-9 col-md-offset-3">
                                        <p class="payment-message"><?php echo CHANGE_PAYMENT_MESSAGE; ?></p>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label>Pay At Event</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="on_event_payment">
                                            <option value="1" <?php echo ($on_event_payment == 1) ? "selected='selected'" : ''; ?>>Yes</option>
                                            <option value="0" <?php echo ($on_event_payment == 0) ? "selected='selected'" : ''; ?>>No</option>
                                         </select>
                                    </div>
                                </div>
                        </div>
                    
                 </div>
                 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo SITE_LOGO; ?> (Max:300px X 50px )
                        </div>
                        <div class="panel-body">
                            
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo SITE_LOGO; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="file" name="site_logo" value="<?php echo $site_logo;?>"><br>
                                        <input type="hidden" name="site_logo1" value="<?php echo $site_logo;?>" />
                                        <?php 
                                        if(file_exists('admin_images/'.$site_logo)) {?>
                                        <img src="<?php echo base_url(); ?>admin_images/<?php echo $site_logo;?>" width="200" height="100" alt=" "  />
                                        <?php }else { ?>
                                        <img src="<?php echo base_url(); ?>admin_images/no_image.jpg" alt=" " height="100" width="200" >
                                        <?php } ?>
                                         
                                    </div>  
                               
                                
                                
                                    <div class="col-sm-3">
                                        <label><?php echo SITE_LOGO_HOVER; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="file" name="site_logo_hover" ><br>
                                        <input type="hidden" name="site_logo_hover1" value="<?php echo $site_logo_hover;?>" />
                                        <?php 
                                        if(file_exists('admin_images/'.$site_logo_hover)) {?>
                                        <img src="<?php echo base_url(); ?>admin_images/<?php echo $site_logo_hover;?>" width="200" height="100" alt=" "  />
                                        <?php }else { ?>
                                        <img src="<?php echo base_url(); ?>admin_images/no_image.jpg" alt=" " height="100" width="200" >
                                        <?php } ?>
                                         
                                    </div>

                                    <div class="col-sm-3">
                                    	<label><?php echo "Site Favicon"; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                    	<input type="file" name="site_fav_icon" ><br>
                                    	<input type="hidden" name="site_fav_icon1" value="<?php echo $site_fav_icon;?>" />
                                    	<?php 
                                    	if(file_exists('admin_images/'.$site_fav_icon)) {?>
                                    		<img src="<?php echo base_url(); ?>admin_images/<?php echo $site_fav_icon;?>" width="30" height="30" alt=" "  />
                                    	<?php }else { ?>
                                    		<img src="<?php echo base_url(); ?>admin_images/no_image.jpg" alt=" " height="100" width="200" >
                                    	<?php } ?>
                                    	
                                    </div>
                                </div>
                            
                        </div>
                    
                 </div>
                 
                 <div class="panel panel-default">
                    <div class="panel-heading">
                            <?php echo PLACEHOLDER_LOGO; ?>
                        </div>
                        <div class="panel-body">
                             <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo PLACEHOLDER_LOGO; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="file" name="org_placeholder_logo" value="<?php echo $org_placeholder_logo;?>"><br>
                                        <input type="hidden" name="org_placeholder_logo1" value="<?php echo $org_placeholder_logo;?>" />
                                        <?php 
                                        if($org_placeholder_logo && file_exists('admin_images/'.$org_placeholder_logo)) {?>
                                        <img src="<?php echo base_url(); ?>admin_images/<?php echo $org_placeholder_logo;?>" width="80" height="80" alt=" "  />
                                        <?php }else { ?>
                                        <img src="<?php echo base_url(); ?>admin_images/no_image.jpg" alt=" " height="100" width="200" >
                                        <?php } ?>
                                         
                                    </div>  

                                    <div class="col-sm-3">
                                        <label><?php echo AUDIO_IMAGE; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="file" name="audio_image" value="<?php echo $audio_image;?>"><br>
                                        <input type="hidden" name="audio_image1" value="<?php echo $audio_image;?>" />
                                        <?php 
                                        if($audio_image && file_exists('admin_images/'.$audio_image)) {?>
                                        <img src="<?php echo base_url(); ?>admin_images/<?php echo $audio_image;?>" width="80" height="80" alt=" "  />
                                        <?php }else { ?>
                                        <img src="<?php echo base_url(); ?>admin_images/no_image.jpg" alt=" " height="100" width="200" >
                                        <?php } ?>
                                         
                                    </div>  

                                </div>
                        </div>
                 </div>

                 <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo PROMOTE_PROFILE_LOGO; ?>
                        </div>
                        <div class="panel-body">
                            
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo SMALL_LOGO; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="file" name="promot_profile_logo_small" value="<?php echo $promot_profile_logo_small;?>"><br>
                                        <input type="hidden" name="promot_profile_logo_small1" value="<?php echo $promot_profile_logo_small;?>" />
                                        <?php 
                                        if($promot_profile_logo_small && file_exists('admin_images/'.$promot_profile_logo_small)) {?>
                                        <img src="<?php echo base_url(); ?>admin_images/<?php echo $promot_profile_logo_small;?>" width="40" height="40" alt=" "  />
                                        <?php }else { ?>
                                        <img src="<?php echo base_url(); ?>admin_images/no_image.jpg" alt=" " height="100" width="200" >
                                        <?php } ?>
                                         
                                    </div>  
                               
                                
                                
                                    <div class="col-sm-3">
                                        <label><?php echo MEDIUM_LOGO; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="file" name="promot_profile_logo_medium" ><br>
                                        <input type="hidden" name="promot_profile_logo_medium1" value="<?php echo $promot_profile_logo_medium;?>" />
                                        <?php 
                                        if(file_exists('admin_images/'.$promot_profile_logo_medium)) {?>
                                        <img src="<?php echo base_url(); ?>admin_images/<?php echo $promot_profile_logo_medium;?>" width="50" height="50" alt=" "  />
                                        <?php }else { ?>
                                        <img src="<?php echo base_url(); ?>admin_images/no_image.jpg" alt=" " height="100" width="200" >
                                        <?php } ?>
                                         
                                    </div>

                                    
                                </div>
                                <div class="form-group clearfix">
                                <div class="col-sm-3">
                                        <label><?php echo LARGE_LOGO; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="file" name="promot_profile_logo_large" ><br>
                                        <input type="hidden" name="promot_profile_logo_large1" value="<?php echo $promot_profile_logo_large;?>" />
                                        <?php 
                                        if(file_exists('admin_images/'.$promot_profile_logo_large)) {?>
                                        <img src="<?php echo base_url(); ?>admin_images/<?php echo $promot_profile_logo_large;?>" width="60" height="60" alt=" "  />
                                        <?php }else { ?>
                                        <img src="<?php echo base_url(); ?>admin_images/no_image.jpg" alt=" " height="100" width="200" >
                                        <?php } ?>
                                         
                                    </div>
                                </div>
                            
                        </div>
                    
                 </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo HELP_OTHER_SETTING; ?>
                        </div>
                        <div class="panel-body">
                        
                            
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo HOME_PAGE_TAG_LINE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="home_tage_line" value="<?php echo SecureShowData($home_tage_line); ?>">
                                    </div>  
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo HELP_LINE_NUMBER; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="admin_phone" value="<?php echo SecureShowData($admin_phone); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo EVENT_HELP_LINE_NUMBER; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="event_help_line" value="<?php echo SecureShowData($event_help_line); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo TECHNICAL_SUPPORT_NUMBER; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="tech_support"  value="<?php echo SecureShowData($tech_support); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo OUTSIDE_US_HELP_NUMBER; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="outside_us_help" value="<?php echo $outside_us_help; ?>">
                                    </div>
                                </div>
                        </div>
                    
                 </div>
                 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo SOCIAL_LINK_SETTING; ?>
                        </div>
                        <div class="panel-body">
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo FOOTER_FACEBOOK_LINK; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="facebook_link" value="<?php echo $facebook_link; ?>">
                                    </div>  
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo FOOTER_TWITTER_LINK; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="twitter_link" value="<?php echo $twitter_link; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo FOOTER_GOOGLE_PLUS_LINK; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="gplus_link" value="<?php echo $gplus_link; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo FOOTER_LINKEDIN_LINK; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="linked_link" value="<?php echo $linked_link; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo FOOTER_YAHOO_LINK; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="yahoo_link" value="<?php echo $yahoo_link; ?>">
                                    </div>
                                </div>
                           
                        </div>
                    
                 </div>
                 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo META_SETTING; ?>
                        </div>
                        <div class="panel-body">
                          <!--code add by Darshan start-->
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo META_TITLE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="meta_title" value="<?php echo SecureShowData($meta_title); ?>">
                                    </div>  
                                </div>
                                  <!--code add by Darshan end-->
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo META_KEYWORD; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="meta_keyword" value="<?php echo SecureShowData($meta_keyword); ?>">
                                    </div>  
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo META_DESCRIPTION; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="meta_description" value="<?php echo SecureShowData($meta_description); ?>">
                                    </div>
                                </div>
                        </div>
                    
                 </div>
                 
                    <div class="text-center mb20">
                    <?php if(DEMO_MODE=="0"){ ?>
                        <button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_SITE_SETTING; ?></button>
                         <a href="<?php echo site_url();?>admin/home/dashboard" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
                    <?php } ?>
                    </div>
                </div><!-- col-lg-12  -->
           
            </div>
            
            </form>
            <!-- /.row -->
</div>
</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>
