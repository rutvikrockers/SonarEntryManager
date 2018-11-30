<table class="table table_res event-info contct-table">
	<thead>
    	<tr>
            <th><?php echo NAME; ?></th>
           
            <th><?php echo QUANTITY; ?></th>
            <th><?php echo PRICE; ?></th>
            
        </tr>
    </thead>
    
    <tbody>
    <?php 
	if($attendees){
		foreach($attendees as $purchase){
    
			$first_name = $purchase['first_name'];
			$last_name = $purchase['last_name'];
			$ticket_qty = $purchase['ticket_qty'];
			$created_at = $purchase['created_at'];
			$total = $purchase['total'];
    
			?>
            <tr>
               
                <td><?php echo SecureShowData($first_name).' '.SecureShowData($last_name);?></td>	
                <td><?php echo $ticket_qty;?></td>
                <td><?php echo $total;?></td>
               
        	</tr>
            <?php
		}
	}else{ ?>
		 <tr>
         <td colspan="3"><?php echo NO_RECORDS; ?></td>
         </tr>
	<?php							
	}
	?>
                                    
    </tbody>
                            	
</table>
<?php echo $page_link;?>