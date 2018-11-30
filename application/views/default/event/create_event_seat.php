<?php if($event_id != ""){  ?>
    <li>
    	<a href="javascript://" class="btn-event" id="free_t1" onclick="append_div2();">
    		<i class="glyphicon glyphicon-plus-sign"></i>&nbsp; <?php echo Free_ticket;?>
    	</a>
    </li>
    <li>
    	<a href="javascript://" class="btn-event" id="paid_t1" onclick="append_div1();">
    		<i class="glyphicon glyphicon-plus-sign"></i>&nbsp; <?php echo Paid_ticket;?>
    	</a>
    </li>
    <li>
    	<a href="javascript://" class="btn-event" id="donat_t1" onclick="append_div3();">
    		<i class="glyphicon glyphicon-plus-sign"></i>&nbsp; <?php echo Donation;?>
    	</a>
    </li>
<?php } ?>