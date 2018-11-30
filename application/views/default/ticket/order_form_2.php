<?php $state = getAllState(); 
  
            $work_address = $order['work_address'];
            $job_title = $order['job_title'];
            $company = $order['company'];
            $work_phone = $order['work_phone'];
            $website = $order['website'];
            $blog = $order['blog'];
            $chk_array = array('11','10','1');
            
            if(in_array($work_address,$chk_array)||in_array($job_title,$chk_array)||in_array($company,$chk_array)||in_array($work_phone,$chk_array)||in_array($website,$chk_array)||in_array($blog,$chk_array)){
                $work=1;
            }else{
                $work=0;
            }
?>

<?php if($order['prefix']=='10' || $order['prefix']=='11' || $order['prefix']=='1') {?>
<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    <label><?php echo Prefix; if($order['prefix']=='11'){?><span>*</span><?php } ?></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    <input type="text" name="prefix[<?php echo $free['id'];?>][]" id="buyer_prefix" value="" placeholder="<?php echo Enter.Prefix;?>">
</div>
</div>
<?php } ?>

<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    <label><?php echo First_Name; ?><span>*</span></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    <input type="text" name="first_name[<?php echo $free['id'];?>][]" id="buyer_first_name" value="" placeholder="<?php echo Enter.First_Name;?>">
    </div>
</div>

<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    <label><?php echo Last_Name; ?><span>*</span></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    <input type="text" name="last_name[<?php echo $free['id'];?>][]" id="buyer_last_name" value="" placeholder="<?php echo Enter.Last_Name;?>">
    </div>
</div>

<?php if($order['suffix']=='10' || $order['suffix']=='11' || $order['suffix']=='1') {?>
<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    <label><?php echo Suffix; if($order['suffix']=='11'){?><span>*</span><?php } ?></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    <input type="text" name="suffix[<?php echo $free['id'];?>][]" id="buyer_suffix" value="" placeholder="<?php echo Enter.Suffix;?>">
    </div>
</div>
<?php } ?>

<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    <label><?php echo Email_Address;?><span>*</span></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    <input type="text" name="email[<?php echo $free['id'];?>][]" id="buyer_email" value="" placeholder="<?php echo Enter.Email_Address;?>">
    </div>
</div>

<?php if($order['home_phone']=='10' || $order['home_phone']=='11' || $order['home_phone']=='1'){ ?>
<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    	<label><?php echo Home_Phone; if($order['home_phone']=='11'){?><span>*</span><?php } ?></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    	<input type="text" name="home_phone[<?php echo $free['id'];?>][]" maxlength="16" id="buyer_home_phone" value="" placeholder="<?php echo Enter.Home_Phone;?>">
    </div>
</div>
<?php } ?> 

		<?php if($order['cell_phone']=='10' || $order['cell_phone']=='11' || $order['cell_phone']=='1'){ ?>
<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    	<label><?php echo Cell_Phone; if($order['cell_phone']=='11'){?><span>*</span><?php } ?></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    	<input type="text" name="cell_phone[<?php echo $free['id'];?>][]" maxlength="16"  id="buyer_cell_phone" value="" placeholder="<?php echo Enter.Cell_Phone;?>">
    </div>
</div>
<?php } ?>

<?php /* Billing address start*/?>
<?php if($order['billing_address']=='10' || $order['billing_address']=='11' || $order['billing_address']=='1'){ ?>

	<h3><?php echo Billing_Address;?></h3>
			
		<div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Country; if($order['billing_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	            	<?php if($country) {?>
	            		<select name="bill_country[<?php echo $free['id'];?>][]" id="user_address_bill_country" class="select-pad" onchange="set_state(this.value, 'bill_<?php echo $tick_count;?>')">
	                 		<option value=""><?php echo Select_Country;?></option>
	                 		<?php foreach($country as $ct){?>
	                 		<option value="<?php echo SecureShowData($ct['country_name']); ?>" ><?php echo SecureShowData($ct['country_name']); ?></option>
	                 		<?php } ?>
	           		</select>
	           	<?php } else { ?>
	           		<input type="text" name="bill_country[<?php echo $free['id'];?>][]" id="user_address_bill_country" value="" placeholder="<?php echo Enter.Country;?>" />
	           	<?php } ?>
	    	</div>
        </div>
        
        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Address; if($order['billing_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	    		<input type="text" name="bill_add1[<?php echo $free['id'];?>][]" id="user_address_bill_add1" value="" placeholder="<?php echo Enter.Billing_Address;?>">
	    	</div>
        </div>
        
        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Address.' 2'; if($order['billing_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	    		<input type="text" name="bill_add2[<?php echo $free['id'];?>][]" id="user_address_bill_add2" value="" placeholder="<?php echo Enter.Billing_Address.' 2';?>">
	    	</div>
        </div>

        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo City; if($order['billing_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	    		<input type="text" name="bill_city[<?php echo $free['id'];?>][]" id="user_address_bill_city" value="" placeholder="<?php echo Enter.Billing_City;?>">
	    	</div>
        </div>

        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo State; if($order['billing_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	            	<?php if($state) {?>
	            		<div id="bill_<?php echo $tick_count;?>_state_list">
	                    		<select name="bill_state[<?php echo $free['id'];?>][]" id="user_address_bill_state" class="select-pad">
	                 			<option value=""><?php echo Select_State;?></option>
	                 			<?php foreach($state as $st){?>
	                 			<option value="<?php echo SecureShowData($st['state_name']); ?>" ><?php echo SecureShowData($st['state_name']); ?></option>
	                 			<?php } ?>
	           			</select>
	           		</div>
	           	<?php } else { ?>
	           		<input type="text" name="bill_state[<?php echo $free['id'];?>][]" id="bill_state" value="" placeholder="<?php echo Enter.State;?>" />
	           	<?php } ?>
	    	</div>
        </div>
        
        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Zip_Postal_Code; if($order['billing_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	    		<input type="text" name="bill_zip[<?php echo $free['id'];?>][]" id="user_address_bill_zip" maxlength="8" value="" placeholder="<?php echo Enter.Zip_Postal_Code;?>">
	    	</div>
        </div>

<?php } ?>
<?php /* Billing address End*/?>
		
<?php /* home address start*/?>
<?php if($order['home_address']=='10' || $order['home_address']=='11' || $order['home_address']=='1'){ ?>
		
	<h3><?php echo Home_Address;?></h3>
			
		<div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Country; if($order['home_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	            	<?php if($country) {?>
	            		<select name="home_country[<?php echo $free['id'];?>][]" id="user_address_home_country" class="select-pad" onchange="set_state(this.value, 'home_<?php echo $tick_count;?>')">
	                 		<option value=""><?php echo Select_Country;?></option>
	                 		<?php foreach($country as $ct){?>
	                 		<option value="<?php echo SecureShowData($ct['country_name']); ?>"  ><?php echo SecureShowData($ct['country_name']); ?></option>
	                 		<?php } ?>
	           		</select>
	           	<?php } else { ?>
	           		<input type="text" name="home_country[<?php echo $free['id'];?>][]" id="user_address_home_country" value="" placeholder="<?php echo Enter.Country;?>" />
	           	<?php } ?>
	    	</div>
        </div>
        
        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Address; if($order['home_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	    		<input type="text" name="home_add1[<?php echo $free['id'];?>][]" id="user_address_home_add1" value="" placeholder="<?php echo Enter.Home_Address;?>">
	    	</div>
        </div>
        
        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Address.' 2'; if($order['home_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	    		<input type="text" name="home_add2[<?php echo $free['id'];?>][]" id="user_address_home_add2" value="" placeholder="<?php echo Enter.Home_Address.' 2';?>">
	    	</div>
        </div>

        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo City; if($order['home_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	    		<input type="text" name="home_city[<?php echo $free['id'];?>][]" id="user_address_home_city" value="" placeholder="<?php echo Enter.Home_City;?>">
	    	</div>
        </div>

        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo State; if($order['home_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	            	<?php if($state) {?>
	            		<div id="home_<?php echo $tick_count;?>_state_list">
	                    		<select name="home_state[<?php echo $free['id'];?>][]" id="user_address_home_state" class="select-pad">
	                 			<option value=""><?php echo Select_State;?></option>
	                 			<?php foreach($state as $st){?>
	                 			<option value="<?php echo SecureShowData($st['state_name']); ?>" ><?php echo SecureShowData($st['state_name']); ?></option>
	                 			<?php } ?>
	           			</select>
	           		</div>
	           	<?php } else { ?>
	           		<input type="text" name="home_state[<?php echo $free['id'];?>][]" id="home_state" value="" placeholder="<?php echo Enter.State;?>" />
	           	<?php } ?>
	    	</div>
        </div>
        
        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Zip_Postal_Code; if($order['home_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	    		<input type="text" name="home_zip[<?php echo $free['id'];?>][]" id="user_address_home_zip" maxlength="8" value="" placeholder="<?php echo Enter.Zip_Postal_Code;?>">
	    	</div>
        </div>

<?php } ?>
<?php /*home address end*/ ?>

<?php /*shipping address end*/ ?>
<?php if($order['shipping_address']=='10' || $order['shipping_address']=='11' || $order['shipping_address']=='1'){ ?>
		
	<h3><?php echo Shipping_Address;?></h3>
			
		<div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Country; if($order['shipping_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	            	<?php if($country) {?>
	            		<select name="ship_country[<?php echo $free['id'];?>][]" id="user_address_ship_country" class="select-pad" onchange="set_state(this.value, 'ship_<?php echo $tick_count;?>')">
	                 		<option value=""><?php echo Select_Country;?></option>
	                 		<?php foreach($country as $ct){?>
	                 		<option value="<?php echo SecureShowData($ct['country_name']); ?>" ><?php echo SecureShowData($ct['country_name']); ?></option>
	                 		<?php } ?>
	           		</select>
	           	<?php } else { ?>
	           		<input type="text" name="ship_country[<?php echo $free['id'];?>][]" id="user_address_ship_country" value="" placeholder="<?php echo Enter.Country;?>" />
	           	<?php } ?>
	    	</div>
        </div>
        
        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Address; if($order['shipping_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	    		<input type="text" name="ship_add1[<?php echo $free['id'];?>][]" id="user_address_ship_add1" value="" placeholder="<?php echo Enter.Shipping_Address;?>">
	    	</div>
        </div>
        
        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Address.' 2'; if($order['shipping_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	    		<input type="text" name="ship_add2[<?php echo $free['id'];?>][]" id="user_address_ship_add2" value="" placeholder="<?php echo Enter.Shipping_Address.' 2';?>">
	    	</div>
        </div>

        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo City; if($order['shipping_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	    		<input type="text" name="ship_city[<?php echo $free['id'];?>][]" id="user_address_ship_city" value="" placeholder="<?php echo Enter.Shipping_City;?>">
	    	</div>
        </div>

        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo State; if($order['shipping_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	            	<?php if($state) {?>
	            		<div id="ship_<?php echo $tick_count;?>_state_list">
	                    		<select name="ship_state[<?php echo $free['id'];?>][]" id="user_address_ship_state" class="select-pad">
	                 			<option value=""><?php echo Select_State;?></option>
	                 			<?php foreach($state as $st){?>
	                 			<option value="<?php echo SecureShowData($st['state_name']); ?>" ><?php echo SecureShowData($st['state_name']); ?></option>
	                 			<?php } ?>
	           			</select>
	           		</div>
	           	<?php } else { ?>
	           		<input type="text" name="ship_state[<?php echo $free['id'];?>][]" id="ship_state" value="" placeholder="<?php echo Enter.State;?>" />
	           	<?php } ?>
	    	</div>
        </div>
        
        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Zip_Postal_Code; if($order['shipping_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	    		<input type="text" name="ship_zip[<?php echo $free['id'];?>][]" id="user_address_ship_zip" maxlength="8" value="" placeholder="<?php echo Enter.Zip_Postal_Code;?>">
	    	</div>
        </div>

<?php } ?>
<?php /*shipping address end*/ ?>

<?php /*work address start*/ ?>
<?php 
    if($work){ ?>
        <h3><?php echo 'Work';?></h3>
        <?php
        if($order['work_address']=='10' || $order['work_address']=='11' || $order['work_address']=='1'){ 
    ?>

	
			
		<div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Country; if($order['work_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	            	<?php if($country) {?>
	            		<select name="work_country[<?php echo $free['id'];?>][]" id="user_address_work_country" class="select-pad" onchange="set_state(this.value, 'work_<?php echo $tick_count;?>')">
	                 		<option value=""><?php echo Select_Country;?></option>
	                 		<?php foreach($country as $ct){?>
	                 		<option value="<?php echo SecureShowData($ct['country_name']); ?>" ><?php echo SecureShowData($ct['country_name']); ?></option>
	                 		<?php } ?>
	           		</select>
	           	<?php } else { ?>
	           		<input type="text" name="work_country[<?php echo $free['id'];?>][]" id="user_address_work_country" value="" placeholder="<?php echo Enter.Country;?>" />
	           	<?php } ?>
	    	</div>
        </div>
        
        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Address; if($order['work_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	    		<input type="text" name="work_add1[<?php echo $free['id'];?>][]" id="user_address_work_add1" value="" placeholder="<?php echo Enter.Work_Address;?>">
	    	</div>
        </div>
        
        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Address.' 2'; if($order['work_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	    		<input type="text" name="work_add2[<?php echo $free['id'];?>][]" id="user_address_work_add2" value="" placeholder="<?php echo Enter.Work_Address.' 2';?>">
	    	</div>
        </div>

        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo City; if($order['work_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	    		<input type="text" name="work_city[<?php echo $free['id'];?>][]" id="user_address_work_city" value="" placeholder="<?php echo Enter.Work_City;?>">
	    	</div>
        </div>
                        
        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo State; if($order['work_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	            	<?php if($state) {?>
	            		<div id="work_<?php echo $tick_count;?>_state_list">
	                    		<select name="work_state[<?php echo $free['id'];?>][]" id="user_address_work_state" class="select-pad">
	                 			<option value=""><?php echo Select_State;?></option>
	                 			<?php foreach($state as $st){?>
	                 			<option value="<?php echo SecureShowData($st['state_name']); ?>" ><?php echo SecureShowData($st['state_name']); ?></option>
	                 			<?php } ?>
	           			</select>
	           		</div>
	           	<?php } else { ?>
	           		<input type="text" name="work_state[<?php echo $free['id'];?>][]" id="work_state" value="" placeholder="<?php echo Enter.State;?>" />
	           	<?php } ?>
	    	</div>
        </div>
        
        <div class="form-group clearfix">
	    	<div class="col-sm-3 col-xs-12 lable-rite">
	    		<label><?php echo Zip_Postal_Code; if($order['work_address']=='11'){?><span>*</span><?php } ?></label>
	    	</div>
	    	<div class="col-sm-8 col-xs-12">
	    		<input type="text" name="work_zip[<?php echo $free['id'];?>][]" id="user_address_work_zip" maxlength="8" value="" placeholder="<?php echo Enter.Zip_Postal_Code;?>">
	    	</div>
        </div>
<?php } ?>
        
        <?php if($order['job_title']=='10' || $order['job_title']=='11' || $order['job_title']=='1'){?>
            <div class="form-group clearfix">
                <div class="col-sm-3 col-xs-12 lable-rite">
                    <label><?php echo Job_Title; if($order['job_title']=='11'){?><span>*</span><?php } ?></label>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <input type="text" name="work_job_title[<?php echo $free['id'];?>][]" id="user_address_work_job_title" value="" placeholder="<?php echo Enter.Job_Title;?>">
                </div>
            </div>
        <?php } ?>

        <?php if($order['company']=='10' || $order['company']=='11' || $order['company']=='1'){?>
        <div class="form-group clearfix">
            <div class="col-sm-3 col-xs-12 lable-rite">
                <label><?php echo Company; if($order['company']=='11'){?><span>*</span><?php } ?></label>
            </div>
            <div class="col-sm-8 col-xs-12">
                <input type="text" name="work_company[<?php echo $free['id'];?>][]" id="user_address_work_company" value="" placeholder="<?php echo Enter.Company;?>">
            </div>
        </div>
        <?php } ?>

        <?php if($order['work_phone']=='10' || $order['work_phone']=='11' || $order['work_phone']=='1'){?>
        <div class="form-group clearfix">
            <div class="col-sm-3 col-xs-12 lable-rite">
                <label><?php echo Work_Phone; if($order['work_phone']=='11'){?><span>*</span><?php } ?></label>
            </div>
            <div class="col-sm-8 col-xs-12">
                <input type="text" name="work_phone[<?php echo $free['id'];?>][]" id="user_address_work_phone" value="" placeholder="<?php echo Enter.Work_Phone;?>">
            </div>
        </div>
        <?php } ?>

        <?php if($order['website']=='10' || $order['website']=='11' || $order['website']=='1'){?>
        <div class="form-group clearfix">
            <div class="col-sm-3 col-xs-12 lable-rite">
                <label><?php echo Website; if($order['website']=='11'){?><span>*</span><?php } ?></label>
            </div>
            <div class="col-sm-8 col-xs-12">
                <input type="text" name="work_website[<?php echo $free['id'];?>][]" id="user_address_work_website" value="" placeholder="<?php echo Enter.Website;?>">
            </div>
        </div>
        <?php } ?>

        <?php if($order['blog']=='10' || $order['blog']=='11' || $order['blog']=='1'){?>
        <div class="form-group clearfix">
            <div class="col-sm-3 col-xs-12 lable-rite">
                <label><?php echo Blog; if($order['blog']=='11'){?><span>*</span><?php } ?></label>
            </div>
            <div class="col-sm-8 col-xs-12">
                <input type="text" name="work_blog[<?php echo $free['id'];?>][]" id="user_address_work_blog" value="" placeholder="<?php echo Enter.Blog;?>">
            </div>
        </div>
        <?php } ?>

        
    <?php
    }
?>
<?php /*work address end*/ ?>
		
		


<?php /*other information satrt*/ ?>
<?php if($order['gender']=='10' || $order['gender']=='11' || $order['gender']=='1' || $order['birth_date']=='10' || $order['birth_date']=='11' || $order['birth_date']=='1' || $order['age']=='10' || $order['age']=='11' || $order['age']=='1'){ ?>
	<h3><?php echo Other_Information;?></h3>
	
	<?php if($order['gender']=='10' || $order['gender']=='11' || $order['gender']=='1'){?>
    	<div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Gender; if($order['gender']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<select name="gender[<?php echo $free['id'];?>][]" id="gender" class="select-pad">
	    		<option value="Male"><?php echo Male;?></option>
				<option value="Female"><?php echo Female;?></option>
			</select>
    	</div>
        </div>
        <?php } ?>
        
        <?php if($order['birth_date']=='10' || $order['birth_date']=='11' || $order['birth_date']=='1'){?>
    	<div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Birth_Date; if($order['birth_date']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="birth_date[<?php echo $free['id'];?>][]" id="birth_date" class="datepicker" value="" placeholder="<?php echo Enter.Birth_Date;?>">
    	</div>
        </div>
        <?php } ?>
        
        <?php if($order['age']=='10' || $order['age']=='11' || $order['age']=='1'){?>
    	<div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Age; if($order['age']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="age[<?php echo $free['id'];?>][]" id="age" maxlength="2" value="" placeholder="<?php echo Enter.Age;?>">
    	</div>
        </div>
        <?php } ?>
<?php } ?>
<?php /*other information end*/ ?>

<input type="hidden" name="ticket_id[]" value="<?php echo $free['id'];?>" />
<input type="hidden" name="ticket_qty[]" value="<?php echo $ticket_qty[$free['id']];?>" />
<input type="hidden" name="ticket_type_ids[<?php echo $free['id']; ?>]" value="<?php echo $ticket_type;?>" />

<?php /*question start*/ ?>
<?php if($questions){ ?>
	<h3><?php echo Other_Questions;?></h3>
	
	<?php 

	foreach($questions as $q){
		$ask =1;
		if($q['rules']=='11' || $q['rules']=='1'|| $q['rules']=='10') {
			
			if($q['spec_ticket']==1){
				
  				$ask = 0;
  				$que_ticks = export(',',$q['tickets']);
  				
  				if(array_key_exits($free['id'],$que_ticks)){
  					$ask = 1;
  				}
		
			}
			
			if($ask == 1){				
	?>
				
		<div class="form-group clearfix">
            	<div class="col-sm-3 col-xs-12 lable-rite">
            		<label><?php echo $q['que']; if($q['rules']=='11'){?><span>*</span><?php } ?></label>
            	</div>
            	<div class="col-sm-8 col-xs-12">
            	
            	<?php if($q['que_type'] == 'text'){ ?>
            		<input type="text" name="que[<?php echo $q['id']; ?>][]" id="que_<?php echo $q['id']; ?>" />
            	<?php } else if($q['que_type'] == 'para'){ ?>
            		<textarea <?php /*readonly="readonly"*/?> name="que[<?php echo $q['id']; ?>][]" id="que_<?php echo $q['id']; ?>"></textarea>
            	<?php } else {
            		
								$que_options = getQuestionOption($q['id'],'All');
								$i=0;
								
								if($q['que_type'] == 'select'){
								?>
									<select class="select-pad" name="que[<?php echo $q['id']; ?>][]" id="que_<?php echo $q['id']; ?>">
								<?php 
									
								} 
								foreach($que_options as $opt){
									
									if($q['que_type'] == 'radio'){
									?>
									<div class="radio">
	                            		<label>
		                            		<input type="radio" name="que[<?php echo $q['id']; ?>][<?php echo $tick_count; ?>][]" id="que_<?php echo $q['id'].$opt['id'].$tick_count; ?>" value="<?php echo $opt['value'];?>" <?php if($i==0){ echo 'checked="checked"'; }?> />
		                            		<?php echo $opt['value'];?>
	                            		</label>
                            		</div>
									<?php } elseif($q['que_type'] == 'check'){ ?>
									<div class="checkbox">
	                            		<label>
		                            		<input type="checkbox" name="que[<?php echo $q['id']; ?>][<?php echo $tick_count; ?>][]" id="que_<?php echo $q['id'].$opt['id'].$tick_count; ?>" value="<?php echo $opt['value'];?>" <?php if($i==0){ echo 'checked="checked"'; }?> />
		                            		<?php echo $opt['value'];?>
	                            		</label>
                            		</div>
									<?php } else { ?>
									
										<option value="<?php echo $opt['value'];?>" ><?php echo $opt['value'];?></option>
									<?php  
										 }
									$i++;
								}
									
								if($q['que_type'] == 'select'){
									echo '</select>';
								}
            	 	} ?>
            	</div>
                </div>
                <div class="claer"></div>	
	<?php 
			}	
		}
	}
	} 
?>
<?php /*question end*/ ?>

<?php /*waivers start*/ ?>

<?php if($waivers){?>

	<h3><?php echo Wievers;?></h3>

	<?php 

	foreach($waivers as $q){
		$ask =1;
		if($q['rules']=='11' || $q['rules']=='1' || $q['rules']=='10') {
			
			if($q['spec_ticket']==1){
  				$ask = 0;
  				$que_ticks = export(',',$q['tickets']);
  				
  				if(array_key_exits($free['id'],$que_ticks)){
  					$ask = 1;
  				}
			}
			if($ask == 1){	
				$que_options = getQuestionOption($q['id']);			
	?>
			

<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    	<label><?php echo $q['que']; if($q['rules']=='11'){?><span>*</span><?php } ?></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    	<textarea readonly="readonly"><?php echo $que_options['value']; ?></textarea>
    	<div class="checkbox">
    	<label>
    	<input type="checkbox" name="que[<?php echo $q['id']; ?>][]" id="que_<?php echo $q['id'].$que_options['id']; ?>" value="1" />
    	<?php echo I_agree_to_the_above_waiver;?>
    	</label>
    	</div>
    </div>
</div>
            <?php } 
        } 
    } 
} ?>
<?php /*waivers end*/ ?>
