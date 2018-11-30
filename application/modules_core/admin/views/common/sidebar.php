<?php 
	
    
    $list_admin_user = get_rights("list_admin_user");
    $list_user = get_rights("list_user");
    $list_events = get_rights("list_events");
    $list_products = get_rights("list_products");
    $list_pages = get_rights("list_pages");
    $list_all_transactions = get_rights("list_all_transactions");
    $list_monthly_transactions = get_rights("list_monthly_transactions");
    $list_yearly_transactions = get_rights("list_yearly_transactions");
    $list_site_setting = get_rights("list_site_setting");
    $list_site_theme = get_rights("list_site_theme");
    $list_facebook_setting = get_rights("list_facebook_setting");
    $list_twitter_setting = get_rights("list_twitter_setting");
    $list_paypal_setting = get_rights("list_paypal_setting");
    $list_authorize_net_setting = get_rights("list_authorize_net_setting");
    $list_captcha_setting = get_rights("list_captcha_setting");
    $list_stripe_setting = get_rights("list_stripe_setting");
    $list_authorize_setting = get_rights("list_authorize_setting");
    $list_wallet_setting = get_rights("list_wallet_setting");
    $list_currency_codes = get_rights("list_currency_codes");
    $list_email_preference = get_rights("list_email_preference");
    $list_newsletter_templates = get_rights("list_newsletter_templates");
    $list_newsletter_job = get_rights("list_newsletter_job");
    $list_email_templates = get_rights("list_email_templates");
    $list_tips_setting = get_rights("list_tips_setting");
    $list_all_categories = get_rights("list_all_categories");
    $list_all_event_types = get_rights("list_all_event_types");
    $list_pending_withdrawals = get_rights("list_pending_withdrawals");
    $list_confirmed_withdrawals = get_rights("list_confirmed_withdrawals");
    $list_pending_cancelled_orders = get_rights("list_pending_cancelled_orders");
    $list_confirm_cancelled_orders = get_rights("list_confirm_cancelled_orders");
    $list_linkdin_setting=get_rights("list_linkdin_setting");
    $list_google_setting=get_rights("list_google_setting");
    $list_google_plus_setting=get_rights("list_google_plus_setting");
    
    //Kalpesh Patel//
        $affiliate_user=get_rights("list_affiliate_users");
        $refferal_user=get_rights("list_refferal_users");
		$refferal_withdraw=get_rights("list_refferal_withdraw");
		
   //End Of Code//	
        $country_list=get_rights("country_list");
        $dynamic_slider_list=get_rights("dynamic_slider_list");

        $message_conversation_list = get_rights("message_conversation_list");
?>

<div class="collapse navbar-collapse navbar-ex1-collapse">
               
                    <ul class="nav navbar-nav side-nav" id="side-menu">
                    	
                        <li>
                            <a href="<?php echo site_url();?>admin/home/dashboard"><i class="fa fa-dashboard fa-fw"></i> <?php echo DASHBOARD; ?></a>
                        </li>
                        
                        <li>
                            <a href="<?php echo site_url();?>admin/admin_user/list_users"><i class="fa fa-user"></i> <?php echo USERS; ?> <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul class="collapse">
                            <?php if($list_admin_user == 1) {?>
                                <li>
                                    <a href="<?php echo site_url();?>admin/admin_user/list_admin"> <?php echo ADMIN_USERS; ?></a>
                                </li>
                                 <?php } 
                                 if($list_user == 1) {?>
                                <li>
                                    <a href="<?php echo site_url();?>admin/admin_user/list_users"><?php echo USERS; ?></a>
                                </li>
                            <?php } ?>
                            </ul>
                        </li>

                        <?php if($message_conversation_list == 1) {?>
                        <li>
                            <a href="<?php echo site_url();?>admin/message/message_conversation"><i class="fa fa-envelope"></i> <?php echo MESSAGE; ?></a>
                        </li>
                        
                        <?php //Kalpesh Patel:This is for affiliate users//?>
                        <?php } 
                        if($affiliate_user==1) {?>
                        <?php } ?>
                         <li>
                            <a href="<?php echo site_url();?>admin/fb_applications"><i class="fa fa-facebook-square"></i> <?php echo FACEBOOK_APPLICATIONS; ?></a>
                        </li>
                      
                        <?php  if($dynamic_slider_list == 1) {?>
                        <li>
                            <a href="<?php echo site_url();?>admin/dynamic_slider/dynamic_slider_list"><i class="fa fa-picture-o"></i> <?php echo SLIDERS; ?></a>
                        </li>
                        
                        <?php }
                        if($list_events == 1) {?>
                        <li>
                            <a href="<?php echo site_url();?>admin/events/list_events"><i class="fa fa-calendar-o"></i> <?php echo EVENTS; ?></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url();?>admin/events/list_venue"><i class="fa fa-user"></i> Venue</a>
                        </li>
                        <?php } ?>
                        <?php if($list_pages == 1) {?>
                        <li>
                            <a href="<?php echo site_url();?>admin/pages/list_pages"><i class="fa fa-file"></i> <?php echo PAGES; ?></a>
                        </li>
                        <?php } 
                        if($list_all_transactions==1 || $list_monthly_transactions==1 ||  $list_yearly_transactions ==1) {?>
                        <li <?php if($this->uri->segment(2)=='transaction'){echo "class='active'";}?>>
                            <a href="#"><i class="fa fa-credit-card"></i> <?php echo TRANSACTIONS; ?><i class="fa fa-fw fa-caret-down"></i></a>
                            <ul class="collapse">
                            	<?php if($list_all_transactions == 1) {?>
                                <li>
                                    <a href="<?php echo site_url();?>admin/transaction/list_all_transaction"><?php echo ALL_TRANSACTIONS; ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } if($list_site_setting==1 || $list_site_theme==1 || $list_facebook_setting==1 || $list_twitter_setting==1 || $list_paypal_setting==1 ||$list_authorize_setting==1
						|| $list_wallet_setting==1 || $list_currency_codes==1 || $list_email_preference==1 || $list_newsletter_templates==1 || $list_newsletter_job==1 || $list_email_templates==1
						|| $list_tips_setting==1 || $list_all_categories==1 || $list_all_event_types==1) {?>
                        <li <?php if($this->uri->segment(2)=='site_setting'||$this->uri->segment(2)=='social_setting'||$this->uri->segment(2)=='currency'||$this->uri->segment(2)=='email_preferences'||$this->uri->segment(2)=='tips'||$this->uri->segment(2)=='categories'||$this->uri->segment(2)=='event_types'||$this->uri->segment(2)=='newsletter'){echo "class='active'";}?>>
                            <a href="#"><i class="fa fa-gears"></i> <?php echo MANAGE_SETTINGS; ?><i class="fa fa-fw fa-caret-down"></i></a>
                            <ul class="collapse">
                            	<?php if($list_site_setting == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/site_setting/edit_site_setting"><?php echo SITE_SETTING; ?></a>
                                </li>
                                <?php } 
                                if($list_site_theme == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/site_setting/edit_site_theam"><?php echo SITE_THEMES; ?></a>
                                </li>
                                <?php } 
                                if($list_facebook_setting == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/site_setting/edit_facebook_setting"><?php echo FACEBOOK_SETTING; ?></a>
                                </li>
                                <?php } 
                                if($list_twitter_setting == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/site_setting/edit_twitter_setting"><?php echo TWITTER_SETTING; ?></a>
                                </li>
                                <?php } 
                                if($list_linkdin_setting == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/social_setting/edit_linkedin_setting"><?php echo LINKDIN_SETTING; ?></a>
                                </li>
                                <?php } 
                                if($list_google_plus_setting == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/social_setting/edit_google_setting"><?php echo GOOGLE_PLUS_SETTING; ?></a>
                                </li>
                                <?php } 
                                if($list_paypal_setting == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/site_setting/edit_paypal_setting"><?php echo PAYPAL_SETTING; ?></a>
                                </li>
                                <?php } 
                                if($list_authorize_net_setting == 1 && $site_setting['is_wallet'] == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/site_setting/edit_authorize_net_setting"><?php echo "Authorize Net"; ?></a>
                                </li>
                                <?php } 
                                if($list_paypal_setting == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/social_setting/edit_captcha_setting"><?php echo CAPTCHA_SETTING; ?></a>
                                </li>
                                <?php } 
                                if($list_stripe_setting == 1) { ?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/site_setting/edit_stripe_setting"><?php echo STRIPE_SETTING; ?></a>
                                </li>
                                <?php } 
                                if($list_currency_codes == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/currency/list_currency"><?php echo CURRENCY_CODES; ?></a>
                                </li>
                                <?php } 
                                if($list_email_preference == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/email_preferences/list_email_preference"><?php echo EMAIL_PREFERENCE; ?></a>
                                </li>
                                  <?php }
                                  if($list_email_preference == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/email_preferences/email_setting"><?php echo EMAIL_SETTING; ?></a>
                                </li>
                                <?php } 
                                if($list_newsletter_templates == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/newsletter/list_newsletter_template"><?php echo NEWSLETTER_TEMPLATES; ?></a>
                                </li>
                                <?php } 
                                if($list_newsletter_job == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/newsletter/list_newsletter_job"><?php echo NEWSLETTER_JOB; ?></a>
                                </li>
                                <?php } 
                                if($list_email_templates == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/email_template/list_email_template"><?php echo EMAIL_TEMPLATES; ?></a>
                                </li>
                                <?php } 
                                if($list_tips_setting == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/tips/list_tips"><?php echo TIPS_SETTING; ?></a>
                                </li>
                                <?php } 
                                if($list_all_categories == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/categories/list_categories"><?php echo ALL_CATEGORIES; ?></a>
                                </li>
                                <?php } 
                                if($list_all_event_types == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/event_types/list_event_types"><?php echo ALL_EVENT_TYPES; ?></a>
                                </li>
                                <?php } ?>
                                
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/site_setting/calender_list"><?php echo CALENDER_SETTING; ?></a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li <?php if($this->uri->segment(2)=='country'){echo "class='active'";}?>>
                            <a href="#"><i class="fa fa-globe"></i> <?php echo GLOBALIZATION; ?><i class="fa fa-fw fa-caret-down"></i></a>
                            <ul class="collapse">
                                <?php if($country_list == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/country/country_list"><?php echo COUNTRIES; ?></a>
                                </li>
                               
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/country/state_list"><?php echo STATES; ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                       <?php } if($list_pending_withdrawals==1 || $list_confirmed_withdrawals==1) {?> 
                        <li <?php if($this->uri->segment(2)=='wallet'){echo "class='active'";}?>>
                            <a href="#"><i class="fa fa-money"></i> <?php echo MANAGE_WALLET; ?><i class="fa fa-fw fa-caret-down"></i></a>
                            <ul class="collapse">
                            	<?php if($list_pending_withdrawals == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/wallet/list_pending_withdrawal"><?php echo PENDING_WITHDRAWALS; ?></a>
                                </li>
                                <?php } 
                                if($list_confirmed_withdrawals == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/wallet/list_confirm_withdrawal"><?php echo CONFIRMED_WITHDRAWALS; ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } if($list_pending_cancelled_orders==1 || $list_confirm_cancelled_orders==1) {?>
                        <li <?php if($this->uri->segment(2)=='cancel_order'){echo "class='active'";}?>>
                            <a href="#"><i class="fa fa-ban"></i> <?php echo CANCELLED_ORDERS; ?><i class="fa fa-fw fa-caret-down"></i></a>
                            <ul class="collapse">
                            	<?php if($list_pending_cancelled_orders == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/cancel_order/list_pending_cancel"><?php echo PENDING_CANCELS_FULL_ORDER; ?></a>
                                </li>
                                <?php if(IS_PARTIAL_REFUND_ENABLE) { ?>
                                    <li>
                                        <a href="<?php echo site_url(); ?>admin/cancel_order/list_pending_single_cancel_ticket"><?php echo PENDING_CANCELS_TICKET_ORDER; ?></a>
                                    </li>
                                <?php } ?>
                                <?php } 
                                if($list_confirm_cancelled_orders == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/cancel_order/list_confirm_cancel"><?php echo CONFIRM_CANCELLED_ORDERS; ?></a>
                                </li>
                                <?php } 
                                if($list_confirm_cancelled_orders == 1) {?>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/cancel_order/list_decline_cancel"><?php echo DECLINE_CANCELLED_ORDERS; ?></a>
                                </li>
                                <?php } ?>
                               
                            </ul>
                             <li <?php if($this->uri->segment(2)=='preferences'){echo "class='active'";}?>>
                            <a href="#"><i class="fa fa-wrench"></i>  <?php echo PREFERENCES; ?><i class="fa fa-fw fa-caret-down"></i></a>
                            <ul class="collapse">
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/preferences/list_images"><?php echo IMAGE_SETTING; ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/preferences/maintenance_setting"><?php echo MAINTENANCE; ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url(); ?>admin/preferences/edit_ticket_setting"><?php echo TICKET_SETTING; ?></a>
                                </li>
                               <li>
                                    <a href="<?php echo site_url(); ?>admin/preferences/module_setting"><?php echo MODULE_SETTING; ?></a>
                                </li> 
                            </ul>
                            </li>

                             <li>
                                  <a href="<?php echo site_url();?>admin/admin_user/error_list"><i class="fa fa-exclamation-triangle"></i> <?php echo ERROR_LIST; ?></a>
                            </li>
                            <div class="xyz" style="position: relative;display: inline-block;margin-top: 40px; color: #999;"><p class="text-center">Copyright © <?php echo date('Y'); ?> <a href="<?php echo base_url(); ?>" target="_blank"><?php echo SecureShowData($site_setting['site_name']); ?> </a> . All rights reserved.</p></div>
                        </li>
                        <?php } ?>
                    </ul>
                    <!-- /#side-menu -->
                <!-- /.sidebar-collapse -->
            </div>
