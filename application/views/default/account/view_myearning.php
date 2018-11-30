<?php  $session_user = $this->session->userdata('user_id'); ?>

<style>
.successbox{
    color: #a94442;
}   
</style>
<div class="white-popup-block popup-container">
<div class="popupHead">
<h1>
<?php 
    if($earn_type=='0'){
        echo EVENT_EARN;
    }elseif($earn_type=='1') {
        echo REFFERAL_EARN;    
    }else{
        echo AFFILIATE_EARN;
    } 
?>
</h1>
</div>

<table class="table table_res contct-table earn-info-table">
  <thead>
    <tr>                          
      <th><?php echo Ticket_Buyer;?></th>
      <th><?php echo AMOUNT;?></th>
      <th><?php echo PAYMENT_TYPE;?></th>
      <th><?php echo PAID;?></th>
      <th><?php echo DUE;?></th>
      <th><?php echo DATE;?></th>                          
    </tr>
  </thead>
  <tbody>
  <?php if($earning){
                
          foreach($earning as $earn){
              
              $donor_email = $earn['email'];
                $created_at = $earn['created_at'];
              if($donor_email=='' || $donor_email=='0'){
                $donor_email = $this->session->userdata('email');
              }
                $amount = set_event_currency($earn['purchases_total'], $event_id);
                if($earn['purchases_total'] == 0) {
                    $due = "<i class='glyphicon glyphicon-minus'></i>";
                    $paid = "<i class='glyphicon glyphicon-minus'></i>";
                } elseif($earn['is_wallet'] && !$wallet_paid && $request_send) {
                    $due = "<i class='glyphicon glyphicon-ok'></i>";
                    $paid = "<i class='glyphicon glyphicon-minus'></i>";
                } elseif($earn['is_wallet'] && !$wallet_paid) {
                    $due = "<i class='glyphicon glyphicon-minus'></i>";
                    $paid = "<i class='glyphicon glyphicon-minus'></i>";
                } else {
                    $due = "<i class='glyphicon glyphicon-minus'></i>";
                    $paid = "<i class='glyphicon glyphicon-ok'></i>";
                }
                if($earn['purchases_total'] == 0) {
                    $payment_gateway = "<i class='glyphicon glyphicon-minus'></i>";
                } elseif($earn['payment_gateway']) {
                    $payment_gateway = ($earn['payment_gateway'] == 'split_paypal' || $earn['payment_gateway'] == 'paypal') ? 'Paypal' : 'Card';
                } else {
                    $payment_gateway = "Manual";
                }
            ?>
        <tr>                          
          <td class="break-word_xs"><?php echo SecureShowData($donor_email); ?></td>
          <td><?php echo $amount; ?></td>
          <td><?php echo $payment_gateway; ?></td>
          <td><?php echo $paid; ?></td>
          <td><?php echo $due; ?></td>
         <td><?php echo datetimeformat($created_at); ?> <?php echo timeFormat($created_at); ?></td>
          
        </tr>
    <?php } 
    }else{
               echo '<tr><td colspan="7">'.NO_RECORDS.'</td></tr>';
           } ?>
      </tbody>
</table>      
