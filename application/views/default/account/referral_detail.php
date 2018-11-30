<?php  $session_user = $this->session->userdata('user_id'); ?>

<style>
.successbox{
    color: #a94442;
}   
</style>
<div class="white-popup-block popup-container">
<div class="popupHead">
<h1>
<?php  echo REFERRAL_DETAILS; ?>
</h1>
</div>
<div class="tab-content responsive">
    <div class="tab-pane fade in active" id="event">
      <table class="table table_res earn-info contct-table">
        <thead>
          <tr>                          
            <th><?php echo REFERRAL_EMAIL;?></th>
            <th><?php echo EVENT_NAME;?></th>
            <th><?php echo TICKET_NAME;?></th>
            <th><?php echo Ticket_Price;?></th>
            <th><?php echo REFERRAL_CASE;?></th>                           
          </tr>
        </thead>
        <tbody>
        <?php if($ref_user){
                      
                foreach($ref_user as $row){
                    
                    $email = $row['email'];
                    $etitle = $row['event_title'];
                    $ticket = $row['ticket_name'];
                    $total = $row['buyer_total']; 
                    $rcase = $row['referral_case'];
                    if($rcase) 
                    {
                    	$rcase1="Buy Ticket";
                    }	
                    $event_url = $row['event_url_link'];
              ?>
          <tr>                          
            <td><?php echo SecureShowData($email); ?></td>
            <td><a href="<?php echo base_url().'index.php/event/view/'.$event_url;?>"><?php echo SecureShowData($etitle); ?></a></td>
            <td><?php echo SecureShowData($ticket); ?></td>
            <td><?php echo $total; ?></td>
            <td><?php echo $rcase1; ?></td>
            
          </tr>
          <?php } 
            }else{
                     echo '<tr><td colspan="7">'.NO_RECORDS.'</td></tr>';
                 } ?>
            </tbody>
      </table>      
    </div>
</div>

