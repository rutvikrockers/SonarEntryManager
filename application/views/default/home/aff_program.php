<?php 
$referral_percentage='';
$fee_amt = $affiliate_data['fee_amt'];
if($fee_amt == '' || $fee_amt > 0)
		{

			$referral_percentage = set_event_currency($fee_amt,$eid). ' per ticket';

		}
		else
		{
            $fee_perc = $affiliate_data['fee_perc'];
			if($fee_perc != '' || $fee_perc > 0.00)
			{
				$referral_percentage = $fee_perc. '% of ticket';
			}
			
		}

?>

<section>

    <div class="container marTB50">
        <div class="row">
        <div class="col-md-12 event-webpage">
            <div class="red-event">
                <h4><?php echo WELCOME_TO_THE_ATTENDEE_AFFILIATE_PROGRAM_FOR;?> "<?php echo $event_data['event_title'];?>"!</h4>
            </div>
            <div class="event-detail pd15 mb0">
                <p><?php echo THE_REFERRAL_FOR_THIS_PROGRAM;?> <?php echo $referral_percentage; ?> <?php echo SALES_START_MAKING_MONEY_BY_FOLLOWING_THESE_STEPS;?>
            
                <?php echo PROMOTE_THE_EVENT_AND_GET_ATTENDEES_TO_SIGNUP_USING_AFFILIATE_LINK_LISTED_REFERRALS_PAGE;?>
                <?php echo TRACK_THE_ATTENDEE_SIGN_UPS_AND_YOUR_EARNINGS;?>
                <?php echo PAYMENTS_ARE_MADE_TO_YOU_BY_THE_AFFILIATE_PROGRAM_OWNER_PAYPAL_STATED_THE_AFFILIATE_PROGRAM_INVITATION;?>
                <br /><br />
                <strong><?php echo NOTE;?></strong> <?php echo MAKE_SURE_PAYPAL_ACCOUNT_EMAIL_ADDRESS_LISTED_ON_YOUR_REFERRALS_PAGE_RECEIVE_YOUR_MONEY;?>
            </p>
            <form method="post" class="clearfix" action="<?php echo site_url('home/invited/'.$eid.'/'.$aff_id);?>">
                 <div class="form-group pull-right">
                       <input type="submit" name="submit" value="Join this program" class="btn-event2"/>
                 </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</section>


