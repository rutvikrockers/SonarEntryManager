<table class="table table_res ticket-sales-info contct-table">
	<thead>
    	<tr>
            <th><?php echo Ticket_name; ?></th>
           
            <th><?php echo SOLD; ?></th>
            <th><?php echo Sales_Status; ?></th>
            <th><?php echo Sales_Ends; ?></th>
            
        </tr>
    </thead>
    
    <tbody>
    <?php $ticketStatus = getTicketStatus();
    $today = date("Y-m-d H:i:s"); 
	if($free_tickets){
        foreach($free_tickets as $free){
    
            $ticket_status_free="Hidden";
			foreach ($ticketStatus as  $ticket_status) {
                if($free['ticket_status']==$ticket_status['id']){
                    $ticket_status_free=$ticket_status['status_name'];
                }
            }
             if(strtotime($free['end_sale'])<strtotime($today)){
                 $ticket_status_free=ENDED;
            }
    
			?>
            <tr>
               
                <td><?php echo SecureShowData($free['ticket_name']);?></td>	
                <td><?php echo $free['used'].'/'.$free['qty'];?></td>
                <td><?php echo $ticket_status_free;?></td>
                <td><?php echo datetimeformat($free['end_sale']);?></td>
               
        	</tr>
            <?php
		}
	}  
    if($paid_tickets){ 
        foreach($paid_tickets as $paid){ 
            $ticket_status_paid="Hidden";
            foreach ($ticketStatus as  $ticket_status) {
                if($paid['ticket_status']==$ticket_status['id']){
                    $ticket_status_paid=$ticket_status['status_name'];
                }
            }
             if(strtotime($paid['end_sale'])<strtotime($today)){
                 $ticket_status_paid=ENDED;
            }
    
            ?>
            <tr>
               
              <td><?php echo SecureShowData($paid['ticket_name']);?></td>   
                <td><?php echo $paid['used'].'/'.$paid['qty'];?></td>
                <td><?php echo $ticket_status_paid;?></td>
                <td><?php echo datetimeformat($paid['end_sale']);?></td>
               
            </tr>
            <?php
        }
    }  
   if($donation_tickets){
             foreach($donation_tickets as $donation){
                foreach ($ticketStatus as  $ticket_status) {
                if($donation['ticket_status']==$ticket_status['id']){
                    $ticket_status_donation=$ticket_status['status_name'];
                }
            }
            if(strtotime($donation['end_sale'])<strtotime($today)){
                 $ticket_status_donation=ENDED;
            }
            ?>
            <tr>
               
                <td><?php echo SecureShowData($donation['ticket_name']);?></td> 
                <td><?php echo $donation['used'].'/'.$donation['qty'];?></td>
                <td><?php echo $ticket_status_donation;?></td>
                <td><?php echo datetimeformat($donation['end_sale']);?></td>
               
            </tr>
            <?php
        }
    }  
?>

		
	
                                    
    </tbody>
                            	
</table>
