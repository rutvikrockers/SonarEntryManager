<table class="table table_res ticket-sales-info contct-table">
	<thead>
    	<tr>
            <th><?php  echo PAYMENT_TYPE; ?></th>
            <th><?php echo SOLD; ?></th>
        </tr>
    </thead>
    
    <tbody>
           <?php if($check_attender) {
            ?>
            
            <?php foreach($check_attender as $manual_sale){ ?>
            <tr>
            <td><?php echo SecureShowData($manual_sale['payment_type']); ?></td> 
            <td><?php echo $manual_sale['total_ticket']; ?></td>
            </tr>
            <?php } ?>
           
            
           <?php } else{ ?>
             <tr>
             <td colspan="3"><?php echo NO_RECORDS; ?></td>
             </tr>
            <?php                           
            }
            ?>  
    </tbody>
                            	
</table>
