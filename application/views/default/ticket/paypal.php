<style>
input[type="submit"] {
	background-color: #e0336b;
    border-radius: 5px;
    color: #fff;
    margin-left: 10px;
    transition: all 0.15s ease-in-out 0s;
    font-size: 15px;
    font-weight: 300;
    padding-bottom: 15px;
    padding-top: 15px;
}

</style>
<script>
	$(document).ready(function() {
		setTimeout(function(){	$('#paypal_auto_form').submit();	},2000)
	});
</script>

<section>  
	<div class="container" >
     	<div class="browse mt">
			<div  class="row">
			
				<div class="pt">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct">
	                   <h1><?php echo Paypal;?></h1>
	            	</div>
				</div><!-- End pt -->
				
			    <div class="clearfix"></div>
			    <div class="festival pb"></div>
			
				<div class="col-sm-12 clearfix">
                	<div class="event-detail pt Pad8" >
                	
                	<?php 
	                	$this->paypal_lib->add_field('currency_code',$currency_code);
						$this->paypal_lib->add_field('business', $Paypal_Email);
						$this->paypal_lib->add_field('return', $return);
						$this->paypal_lib->add_field('cancel_return', $cancel_return);
						$this->paypal_lib->add_field('notify_url', $notify_url); // <-- IPN url
						$this->paypal_lib->add_field('custom', $custom); // <-- Verify return
						$this->paypal_lib->paypal_url= $Paypal_Url;	
						$this->paypal_lib->add_field('item_name', $item_name);
						$this->paypal_lib->add_field('item_number', $item_number);
						$this->paypal_lib->add_field('amount', $total);
						$this->paypal_lib->button('PAY WITH PAYPAL');
						$data['paypal_form'] = $this->paypal_lib->paypal_auto_form();
                	?> 
                	</div>
                </div>
			</div>	
		</div>
	</div><!-- End container -->
    <div class="pb"></div>
</section>