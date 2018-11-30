<?php 
    $stripe_payment = stripe_payment_detail();
    $stripe_test_mode = $stripe_payment->stripe_test_mode;
    if ($stripe_test_mode == '1') {
        $stripe_client_id = $stripe_payment->stripe_client_id_development;
    } else {
        $stripe_client_id = $stripe_payment->stripe_client_id_production;
    }
?>
<div class="row">
    <div class="event-webpage col-lg-12">
        <div class="red-event clearfix">
            <h4 class="pull-left"><span class="titleNum">4</span>
                <?php echo CHOOSE_PAYMENT_OPTION; ?>
            </h4>
            <div class="expertTip">
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="col-lg-12 clearfix mb">
        <div class="event-detail ex_pay_design_wrp pt pb">
            <div class="alert alert-success mar10 stripeSuccess" style="display: none;"></div>
            <div class="alert alert-danger mar10 stripeFailed" style="display: none;"></div>
            <div class="alert alert-success mar10 paypalSuccess" style="display: none;"></div>
            <div class="alert alert-danger mar10 paypalFailed" style="display: none;"></div>
            <ul class="ex_pay_design clearfix">
                <?php if($stripe_setting && $stripe_setting['active']) { ?>
                    <li>

                        <div class="evt_stripe_connect">
                            
                            <div class="form-group clearfix">

                                <img src="<?php echo base_url() ?>images/stripe_logo.png" alt="stripe">


                            </div>
                            <div class="form-group clearfix">
                                <div class="col-xs-12 stripe_connect_div"></div>
                                <input type="hidden" id="stop_stripe_ajax_request" value="0">
                                <input type="hidden" id="stripe_ajax_in_progress" value="0">
                            </div>
                        </div>
                        <div class="info" style="display: none;">
                       
                <strong>THIS IS TEST ENVIRONMENT. YOUR DETAILS WILL NOT WORK HERE. <br>
                    PLEASE USE THIS DETAIL.</strong>
                <br>
                Stripe Email: vatsal.test1@gmail.com<br>
                Password: 12345678<br>
               
                        </div>
                    </li>
                <?php } ?>
                <?php if($paypal_setting && $paypal_setting['active']) { ?>
                    <li>
                        <div class="evt_fb_connect">
                            <div class="ex_paypal ex_tc">
                                <img src="<?php echo base_url() ?>images/paypal.png" alt="paypal">

                            </div>
                            <div class="form-group clearfix">
                                <div class="col-sm-4 col-xs-12 lable-rite">
                                    <label><?php echo FIRST_NAME; ?></label>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <input autocomplete="off" type="text" id="paypal_first_name" name="first_name" value="<?php echo ($paypal_event) ? SecureShowData($paypal_event['first_name']) : ''; ?>">
                                    <span class="paypal_first_nameError"></span>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-sm-4 col-xs-12 lable-rite">
                                    <label><?php echo LAST_NAME; ?></label>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <input autocomplete="off" type="text" id="paypal_last_name" name="last_name" value="<?php echo ($paypal_event) ? SecureShowData($paypal_event['last_name']) : ''; ?>">
                                    <span class="paypal_last_nameError"></span>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-sm-4 col-xs-12 lable-rite">
                                    <label><?php echo EMAIL_ADDRESS; ?></label>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <input autocomplete="off" type="text" id="paypal_email" name="email" value="<?php echo ($paypal_event) ? SecureShowData($paypal_event['email']) : ''; ?>">
                                    <span class="paypal_emailError"></span>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-sm-8 col-sm-offset-4 col-xs-12 comonback brm20 tr8">
                                    <a class="btn-event" href="javascript:void(0);" onclick="paypal_connect(this);" grant_refund_permission="1" tmpName="Save"><?php echo SAVE; ?></a>
                                    <a href="javascript:void(0);" id="paypal_connect_grant_permission" target="_blank" style="display: none;">Refund</a>
                                </div>
                            </div>
                        </div>
                         <div class="info" style="display: none;">
                       
                <strong>THIS IS TEST ENVIRONMENT. YOUR DETAILS WILL NOT WORK HERE. <br>
                    PLEASE USE THIS DETAIL.</strong>
                <br>
                Stripe Email: vatsal.test1@gmail.com<br>
                Password: 12345678<br>
               
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        <?php if($stripe_event) { ?>
            set_stripe_disconnect();
        <?php } else { ?>
            set_stripe_connect();
        <?php } ?>
    });

    function paypal_connect(me) {
        grant_refund_permission = $(me).attr('grant_refund_permission');
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('event/paypal_connect/'.$event_id); ?>/"+grant_refund_permission,
            data: {
                paypal_first_name: $('#paypal_first_name').val(),
                paypal_last_name: $('#paypal_last_name').val(),
                paypal_email: $('#paypal_email').val()
            },
            dataType: 'json',
            beforeSend: function() {
                set_paypal_loader(me);
                $('.paypalSuccess').hide();
                $('.paypalFailed').hide();
            },
            success: function(result) {
                if (result.response) {
                    $('.paypalSuccess').html(result.msg);
                    $('.paypalSuccess').show();
                    scrollto('.paypalSuccess');
                    if (result.grant_refund_permission_link) {
                        $('#paypal_connect_grant_permission').attr('href', result.grant_refund_permission_link);
                        $('#paypal_connect_grant_permission').get(0).click();
                    }
                } else {
                    jQuery.each(result.frmError, function(index, item) {
                        if (item) {
                            $('.' + index).html(item);
                            $('.' + index).show();
                        }
                    });
                }
                if (result.errorMsg) {
                    $('.paypalFailed').html(result.errorMsg);
                    $('.paypalFailed').show();
                    scrollto('.paypalFailed');
                }
            },
            complete: function() {
                remove_paypal_loader(me);
            }
        });
    }

    function set_stripe_loader(me) {
        $(me).text('Loading...');
        $(me).removeAttr('onclick');
        setTimeout(function() {
            $(me).removeAttr('target');
            $(me).attr('href', "javascript:void(0);");
        }, 1000);
    }

    function remove_stripe_loader(me) {
        $(me).attr('onclick', "stripe_connect(this, event);");
        $(me).text('Connect With Stripe');
        $(me).attr('href', "https://connect.stripe.com/oauth/authorize?response_type=code&client_id=<?php echo $stripe_client_id; ?>&scope=read_write&state=<?php echo $encrypt_stripe_key; ?>");
        $(me).attr('target', '_blank');
    }

    function stripe_disconnect(me) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url("event/stripe_disconnect/".$event_id); ?>',
            dataType: 'json',
            beforeSend: function() {
                $(me).removeAttr('onclick');
                $(me).text('Loading...');
            },
            success: function(result) {
                if(result.response) {
                    set_stripe_connect();
                    $('.stripeSuccess').html(result.msg);
                    $('.stripeSuccess').show();
                    scrollto('.stripeSuccess');
                } else {
                    $('.stripeFailed').html(result.msg);
                    $('.stripeFailed').show();
                    scrollto('.stripeFailed');
                    set_stripe_disconnect()
                }
            },
            complete: function() {

            }
        });
    }

    function set_stripe_disconnect() {
        $('.stripe_connect_div').html('<a onclick="stripe_disconnect(this);" class="evt-sconnect-btn evt-sdisconnect" href="javascript:void(0);">Disconnect From Stripe</a>')
    }

    function set_stripe_connect() {
        $('.stripe_connect_div').html('<a id="stripe_connect" onclick="stripe_connect(this, event);" target="_blank" class="evt-sconnect-btn" href="https://connect.stripe.com/oauth/authorize?response_type=code&client_id=<?php echo $stripe_client_id; ?>&scope=read_write&state=<?php echo $encrypt_stripe_key; ?>">Connect With Stripe</a>')
    }

    function is_stripe_connected(me) {
        set_stripe_loader(me);
        setInterval(function() {
            if ($('#stripe_ajax_in_progress').val() == 0 && $('#stop_stripe_ajax_request').val() == 0) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('event/is_stripe_connected/'.$event_id); ?>",
                    data: '[]',
                    dataType: 'json',
                    beforeSend: function() {
                        $('#stop_stripe_ajax_request').val(1);
                    },
                    success: function(result) {
                        if (result.process_completed && result.response) {
                            $('#stripe_ajax_in_progress').val(1);
                            set_stripe_disconnect();
                            $('.stripeSuccess').html(result.msg);
                            $('.stripeSuccess').show();
                            scrollto('.stripeSuccess');
                        } else if (result.process_completed && result.anyError) {
                            $('#stripe_ajax_in_progress').val(1);
                            remove_stripe_loader(me);
                            $('.stripeFailed').html(result.errorMsg);
                            $('.stripeFailed').show();
                            scrollto('.stripeFailed');
                        }
                    },
                    complete: function() {
                        $('#stop_stripe_ajax_request').val(0);
                    }
                });
            }
        }, 10000);
    }

    function set_paypal_loader(me) {
        $(me).removeAttr('onclick');
        $(me).text('Loading...');
    }

    function remove_paypal_loader(me) {
        $(me).attr('onclick', "paypal_connect(this);");
        $(me).text($(me).attr('tmpName'));
    }

    function scrollto(scrollto) {
        $('html, body').animate({
            scrollTop: $(scrollto).offset().top - 100
        }, 'slow');
    }

    function stripe_connect(me, e) {
        $('#stop_stripe_ajax_request').val(0);
        $('#stripe_ajax_in_progress').val(0);
        $('.stripeSuccess').hide();
        $('.stripeFailed').hide();
        is_stripe_connected(me)
    }
</script>