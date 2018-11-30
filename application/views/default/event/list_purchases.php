<table class="table table_res event-info contct-table">
	<thead>
    	<tr>
            <th><?php echo ORDER;?></th>
            <th><?php echo TICKET_BUYER; ?></th>
            <th><?php echo QUANTITY;?></th>
            <th><?php echo PRICE;?></th>
            <th><?php echo DATE;?></th>
        </tr>
    </thead>
                            
    <tbody>
    <?php 
	if($purchases){
		foreach($purchases as $purchase){
			$purchase_id = $purchase['id'];
			$first_name = $purchase['first_name'];
			$last_name = $purchase['last_name'];
			$ticket_qty = $purchase['ticket_qty'];
			$created_at = $purchase['created_at'];
			$total = set_event_currency($purchase['total'], $id);
		
			?>
            <tr>
                <td class="reg"><a href="<?php echo site_url('attendees/orders/').'?date_range=start&sort_by=date_desc&limit_search=20&order='.$purchase_id.'#orders_'.$purchase_id; ?>"><?php echo $purchase_id;?></a></td>
                <td><?php echo SecureShowData($first_name).' '.SecureShowData($last_name);?></td>	
                <td><?php echo $ticket_qty;?></td>
                <td><?php echo $total;?></td>
                <td><?php echo $created_at;?></td>
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