
<?php if(($order['prefix']=='10' || $order['prefix']=='11' || $order['prefix']=='1') && $order['ctype']==1){?>

<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    <label><?php echo Prefix; if($order['prefix']=='11'){?><span>*</span><?php } ?></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    <input type="text" name="b_prefix" id="buyer_prefix" value="<?php echo $user['prefix'];?>" placeholder="<?php echo Enter.Prefix;?>">
</div>
</div>
<?php } ?>

 <div class="form-group clearfix">
     <div class="col-sm-3 col-xs-12 lable-rite">
     <label><?php echo First_Name; ?><span>*</span></label>
     </div>
     <div class="col-sm-8 col-xs-12">
     <input type="text" name="b_first_name" id="buyer_first_name" value="<?php echo SecureShowData($user['first_name']);?>" placeholder="<?php echo Enter.First_Name;?>">
     </div>
 </div>


 <div class="form-group clearfix">
     <div class="col-sm-3 col-xs-12 lable-rite">
     <label><?php echo Last_Name; ?><span>*</span></label>
     </div>
     <div class="col-sm-8 col-xs-12">
     <input type="text" name="b_last_name" id="buyer_last_name" value="<?php echo SecureShowData($user['last_name']);?>" placeholder="<?php echo Enter.Last_Name;?>">
     </div>
 </div>



<?php if(($order['suffix']=='10' || $order['suffix']=='11' || $order['suffix']=='1') && $order['ctype']==1){?>
<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    <label><?php echo Suffix; if($order['suffix']=='11'){?><span>*</span><?php } ?></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    <input type="text" name="b_suffix" id="buyer_suffix" value="<?php echo SecureShowData($user['suffix']);?>" placeholder="<?php echo Enter.Suffix;?>">
    </div>
</div>
<?php } ?>

<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    <label><?php echo Email_Address;?><span>*</span></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    <input type="text" name="b_email" id="buyer_email" value="<?php echo SecureShowData($user['email']);?>" placeholder="<?php echo Enter.Email_Address;?>">
    </div>
</div>

<?php /*ctype = 1 start*/ ?>
<?php if($order['ctype']==1){ ?>

        <?php if($order['home_phone']=='10' || $order['home_phone']=='11' || $order['home_phone']=='1'){ ?>
<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    	<label><?php echo Home_Phone; if($order['home_phone']=='11'){?><span>*</span><?php } ?></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    	<input type="text" name="b_home_phone" maxlength="16" id="buyer_home_phone" value="<?php echo SecureShowData($user['home_phone']);?>" placeholder="<?php echo Enter.Home_Phone;?>">
    </div>
</div>
<?php } ?> 

		<?php if($order['cell_phone']=='10' || $order['cell_phone']=='11' || $order['cell_phone']=='1'){ ?>
<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    	<label><?php echo Cell_Phone; if($order['cell_phone']=='11'){?><span>*</span><?php } ?></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    	<input type="text" name="b_cell_phone" maxlength="16"  id="buyer_cell_phone" value="<?php echo $user['cell_phone'];?>" placeholder="<?php echo Enter.Cell_Phone;?>">
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
            		<select name="b_bill_country" id="user_address_bill_country" class="select-pad" onchange="set_state(this.value, 'bill')">
                 		<option value=""><?php echo Select_Country;?></option>
                 		<?php foreach($country as $ct){?>
                 		<option value="<?php echo $ct['country_name']; ?>" <?php if($ct['country_name'] == $user_address['bill_country']) { echo 'selected="selected"'; } ?> ><?php echo SecureShowData($ct['country_name']); ?></option>
                 		<?php } ?>
           		</select>
           	<?php } else { ?>
           		<input type="text" name="b_bill_country" id="user_address_bill_country" value="<?php echo SecureShowData($user_address['bill_country']);?>" placeholder="<?php echo Enter.Country;?>" />
           	<?php } ?>
    	</div>
        </div>
        
        <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Address; if($order['billing_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_bill_add1" id="user_address_bill_add1" value="<?php echo SecureShowData($user_address['bill_add1']);?>" placeholder="<?php echo Enter.Billing_Address;?>">
    	</div>
        </div>
        
        <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Address.' 2'; if($order['billing_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_bill_add2" id="user_address_bill_add2" value="<?php echo SecureShowData($user_address['bill_add2']);?>" placeholder="<?php echo Enter.Billing_Address.' 2';?>">
    	</div>
        </div>

        <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo City; if($order['billing_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_bill_city" id="user_address_bill_city" value="<?php echo SecureShowData($user_address['bill_city']);?>" placeholder="<?php echo Enter.Billing_City;?>">
    	</div>
        </div>
            
           
            <?php 
                if($user_address['bill_country'] != 0 || $user_address['bill_country'] != ''){
						$country_id = getCountryIdByName($user_address['bill_country']);
						$state = getStateByCountry($country_id);
                } else {
						$state = getAllState();
                }	
            ?>
            
            <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo State; if($order['billing_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
            	<?php if($state) {?>
            		<div id="bill_state_list">
                    		<select name="b_bill_state" id="user_address_bill_state" class="select-pad">
                 			<option value=""><?php echo Select_State;?></option>
                 			<?php foreach($state as $st){?>
                 			<option value="<?php echo $st['state_name']; ?>" <?php if($st['state_name'] == $user_address['bill_state']) { echo 'selected="selected"'; } ?> ><?php echo SecureShowData($st['state_name']); ?></option>
                 			<?php } ?>
           			</select>
           		</div>
           	<?php } else { ?>
           		<input type="text" name="b_bill_state" id="bill_state" value="<?php echo SecureShowData($user_address['bill_state']);?>" placeholder="<?php echo Enter.State;?>" />
           	<?php } ?>
    	</div>
        </div>
        
        <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Zip_Postal_Code; if($order['billing_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_bill_zip" id="user_address_bill_zip" maxlength="8" value="<?php echo $user_address['bill_zip'];?>" placeholder="<?php echo Enter.Zip_Postal_Code;?>">
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
            		<select name="b_home_country" id="user_address_home_country" class="select-pad" onchange="set_state(this.value, 'home')">
                 		<option value=""><?php echo Select_Country;?></option>
                 		<?php foreach($country as $ct){?>
                 		<option value="<?php echo $ct['country_name']; ?>" <?php if($ct['country_name'] == $user_address['home_country']) { echo 'selected="selected"'; } ?> ><?php echo SecureShowData($ct['country_name']); ?></option>
                 		<?php } ?>
           		</select>
           	<?php } else { ?>
           		<input type="text" name="b_home_country" id="user_address_home_country" value="<?php echo SecureShowData($user_address['home_country']);?>" placeholder="<?php echo Enter.Country;?>" />
           	<?php } ?>
    	</div>
        </div>
        
        <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Address; if($order['home_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_home_add1" id="user_address_home_add1" value="<?php echo SecureShowData($user_address['home_add1']);?>" placeholder="<?php echo Enter.Home_Address;?>">
    	</div>
        </div>
        
        <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Address.' 2'; if($order['home_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_home_add2" id="user_address_home_add2" value="<?php echo SecureShowData($user_address['home_add2']);?>" placeholder="<?php echo Enter.Home_Address.' 2';?>">
    	</div>
        </div>

        <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo City; if($order['home_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_home_city" id="user_address_home_city" value="<?php echo SecureShowData($user_address['home_city']);?>" placeholder="<?php echo Enter.Home_City;?>">
    	</div>
        </div>
            
           
            <?php 
                if($user_address['home_country'] != 0 || $user_address['home_country'] != ''){
						$country_id = getCountryIdByName($user_address['home_country']);
						$state = getStateByCountry($country_id);
                } else {
						$state = getAllState();
                }	
            ?>
            
            <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo State; if($order['home_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
            	<?php if($state) {?>
            		<div id="home_state_list">
                    		<select name="b_home_state" id="user_address_home_state" class="select-pad">
                 			<option value=""><?php echo Select_State;?></option>
                 			<?php foreach($state as $st){?>
                 			<option value="<?php echo $st['state_name']; ?>" <?php if($st['state_name'] == $user_address['home_state']) { echo 'selected="selected"'; } ?> ><?php echo SecureShowData($st['state_name']); ?></option>
                 			<?php } ?>
           			</select>
           		</div>
           	<?php } else { ?>
           		<input type="text" name="b_home_state" id="home_state" value="<?php echo SecureShowData($user_address['home_state']);?>" placeholder="<?php echo Enter.State;?>" />
           	<?php } ?>
    	</div>
        </div>
        
        <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Zip_Postal_Code; if($order['home_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_home_zip" id="user_address_home_zip" maxlength="8" value="<?php echo SecureShowData($user_address['home_zip']);?>" placeholder="<?php echo Enter.Zip_Postal_Code;?>">
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
            		<select name="b_ship_country" id="user_address_ship_country" class="select-pad" onchange="set_state(this.value, 'ship')">
                 		<option value=""><?php echo Select_Country;?></option>
                 		<?php foreach($country as $ct){?>
                 		<option value="<?php echo $ct['country_name']; ?>" <?php if($ct['country_name'] == $user_address['ship_country']) { echo 'selected="selected"'; } ?> ><?php echo SecureShowData($ct['country_name']); ?></option>
                 		<?php } ?>
           		</select>
           	<?php } else { ?>
           		<input type="text" name="b_ship_country" id="user_address_ship_country" value="<?php echo SecureShowData($user_address['ship_country']);?>" placeholder="<?php echo Enter.Country;?>" />
           	<?php } ?>
    	</div>
        </div>
        
        <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Address; if($order['shipping_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_ship_add1" id="user_address_ship_add1" value="<?php echo SecureShowData($user_address['ship_add1']);?>" placeholder="<?php echo Enter.Shipping_Address;?>">
    	</div>
        </div>
        
        <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Address.' 2'; if($order['shipping_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_ship_add2" id="user_address_ship_add2" value="<?php echo SecureShowData($user_address['ship_add2']);?>" placeholder="<?php echo Enter.Shipping_Address.' 2';?>">
    	</div>
        </div>

        <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo City; if($order['shipping_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_ship_city" id="user_address_ship_city" value="<?php echo SecureShowData($user_address['ship_city']);?>" placeholder="<?php echo Enter.Shipping_City;?>">
    	</div>
        </div>
            
           
            <?php 
                if($user_address['ship_country'] != 0 || $user_address['ship_country'] != ''){
						$country_id = getCountryIdByName($user_address['ship_country']);
						$state = getStateByCountry($country_id);
                } else {
						$state = getAllState();
                }	
            ?>
            
            <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo State; if($order['shipping_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
            	<?php if($state) {?>
            		<div id="ship_state_list">
                    		<select name="b_ship_state" id="user_address_ship_state" class="select-pad">
                 			<option value=""><?php echo Select_State;?></option>
                 			<?php foreach($state as $st){?>
                 			<option value="<?php echo $st['state_name']; ?>" <?php if($st['state_name'] == $user_address['ship_state']) { echo 'selected="selected"'; } ?> ><?php echo SecureShowData($st['state_name']); ?></option>
                 			<?php } ?>
           			</select>
           		</div>
           	<?php } else { ?>
           		<input type="text" name="b_ship_state" id="ship_state" value="<?php echo $user_address['ship_state'];?>" placeholder="<?php echo Enter.State;?>" />
           	<?php } ?>
    	</div>
        </div>
        
        <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Zip_Postal_Code; if($order['shipping_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_ship_zip" id="user_address_ship_zip" maxlength="8" value="<?php echo $user_address['ship_zip'];?>" placeholder="<?php echo Enter.Zip_Postal_Code;?>">
    	</div>
        </div>

<?php } ?>
		<?php /*shipping address end*/ ?>
		
		<?php /*work address start*/ ?>
		<?php if($order['work_address']=='10' || $order['work_address']=='11' || $order['work_address']=='1'){ ?>
		
			<h3><?php echo Working_Address;?></h3>
			
			<div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Country; if($order['work_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
            	<?php if($country) {?>
            		<select name="b_work_country" id="user_address_work_country" class="select-pad" onchange="set_state(this.value, 'work')">
                 		<option value=""><?php echo Select_Country;?></option>
                 		<?php foreach($country as $ct){?>
                 		<option value="<?php echo $ct['country_name']; ?>" <?php if($ct['country_name'] == $user_address['work_country']) { echo 'selected="selected"'; } ?> ><?php echo SecureShowData($ct['country_name']); ?></option>
                 		<?php } ?>
           		</select>
           	<?php } else { ?>
           		<input type="text" name="b_work_country" id="user_address_work_country" value="<?php echo $user_address['work_country'];?>" placeholder="<?php echo Enter.Country;?>" />
           	<?php } ?>
    	</div>
        </div>
        
        <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Address; if($order['work_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_work_add1" id="user_address_work_add1" value="<?php echo SecureShowData($user_address['work_add1']);?>" placeholder="<?php echo Enter.Work_Address;?>">
    	</div>
        </div>
        
        <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Address.' 2'; if($order['work_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_work_add2" id="user_address_work_add2" value="<?php echo SecureShowData($user_address['work_add2']);?>" placeholder="<?php echo Enter.Work_Address.' 2';?>">
    	</div>
        </div>

        <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo City; if($order['work_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_work_city" id="user_address_work_city" value="<?php echo SecureShowData($user_address['work_city']);?>" placeholder="<?php echo Enter.Work_City;?>">
    	</div>
        </div>
            
           
            <?php 
                if($user_address['work_country'] != 0 || $user_address['work_country'] != ''){
						$country_id = getCountryIdByName($user_address['work_country']);
						$state = getStateByCountry($country_id);
                } else {
						$state = getAllState();
                }	
            ?>
            
            <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo State; if($order['work_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
            	<?php if($state) {?>
            		<div id="work_state_list">
                    		<select name="b_work_state" id="user_address_work_state" class="select-pad">
                 			<option value=""><?php echo Select_State;?></option>
                 			<?php foreach($state as $st){?>
                 			<option value="<?php echo $st['state_name']; ?>" <?php if($st['state_name'] == $user_address['work_state']) { echo 'selected="selected"'; } ?> ><?php echo SecureShowData($st['state_name']); ?></option>
                 			<?php } ?>
           			</select>
           		</div>
           	<?php } else { ?>
           		<input type="text" name="b_work_state" id="work_state" value="<?php echo SecureShowData($user_address['work_state']);?>" placeholder="<?php echo Enter.State;?>" />
           	<?php } ?>
    	</div>
        </div>
        
        <div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Zip_Postal_Code; if($order['work_address']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_work_zip" id="user_address_work_zip" maxlength="8" value="<?php echo $user_address['work_zip'];?>" placeholder="<?php echo Enter.Zip_Postal_Code;?>">
    	</div>
        </div>
<?php } ?>
		<?php /*work address end*/ ?>
		
		
		<?php if($order['job_title']=='10' || $order['job_title']=='11' || $order['job_title']=='1'){?>
<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    	<label><?php echo Job_Title; if($order['job_title']=='11'){?><span>*</span><?php } ?></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    	<input type="text" name="b_work_job_title" id="user_address_work_job_title" value="<?php echo $user_address['work_job_title'];?>" placeholder="<?php echo Enter.Job_Title;?>">
    </div>
</div>
<?php } ?>

<?php if($order['company']=='10' || $order['company']=='11' || $order['company']=='1'){?>
<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    	<label><?php echo Company; if($order['company']=='11'){?><span>*</span><?php } ?></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    	<input type="text" name="b_work_company" id="user_address_work_company" value="<?php echo SecureShowData($user_address['work_company']);?>" placeholder="<?php echo Enter.Company;?>">
    </div>
</div>
<?php } ?>

<?php if($order['work_phone']=='10' || $order['work_phone']=='11' || $order['work_phone']=='1'){?>
<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    	<label><?php echo Work_Phone; if($order['work_phone']=='11'){?><span>*</span><?php } ?></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    	<input type="text" name="b_work_phone" id="user_address_work_phone" value="<?php echo $user_address['work_phone'];?>" placeholder="<?php echo Enter.Work_Phone;?>">
    </div>
</div>
<?php } ?>

<?php if($order['website']=='10' || $order['website']=='11' || $order['website']=='1'){?>
<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    	<label><?php echo Website; if($order['website']=='11'){?><span>*</span><?php } ?></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    	<input type="text" name="b_work_website" id="user_address_work_website" value="<?php echo $user_address['work_website'];?>" placeholder="<?php echo Enter.Website;?>">
    </div>
</div>
<?php } ?>

<?php if($order['blog']=='10' || $order['blog']=='11' || $order['blog']=='1'){?>
<div class="form-group clearfix">
    <div class="col-sm-3 col-xs-12 lable-rite">
    	<label><?php echo Blog; if($order['blog']=='11'){?><span>*</span><?php } ?></label>
    </div>
    <div class="col-sm-8 col-xs-12">
    	<input type="text" name="b_work_blog" id="user_address_work_blog" value="<?php echo SecureShowData($user_address['work_blog']);?>" placeholder="<?php echo Enter.Blog;?>">
    </div>
</div>
<?php } ?>


<?php /*other information satrt*/ ?>
<?php if($order['gender']=='10' || $order['gender']=='11' || $order['gender']=='1' || $order['birth_date']=='10' || $order['birth_date']=='11' || $order['birth_date']=='1' || $order['age']=='10' || $order['age']=='11' || $order['age']=='1'){ ?>
	<h3><?php echo Other_Information;?></h3>
	
	<?php if($order['gender']=='10' || $order['gender']=='11' || $order['gender']=='1'){?>
    	<div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Gender; if($order['gender']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<select name="b_gender" id="gender" class="select-pad">
	    		<option value="Male" <?php if('Male' == $user_address['gender']) { echo 'selected="selected"'; } ?>><?php echo Male;?></option>
				<option value="Female" <?php if('Female' == $user_address['gender']) { echo 'selected="selected"'; } ?>><?php echo Female;?></option>
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
    		<input type="text" name="b_birth_date" id="birth_date" class="datepicker" value="" placeholder="<?php echo Enter.Birth_Date;?>">
    	</div>
        </div>
        <?php } ?>
        
        <?php if($order['age']=='10' || $order['age']=='11' || $order['age']=='1'){?>
    	<div class="form-group clearfix">
    	<div class="col-sm-3 col-xs-12 lable-rite">
    		<label><?php echo Age; if($order['age']=='11'){?><span>*</span><?php } ?></label>
    	</div>
    	<div class="col-sm-8 col-xs-12">
    		<input type="text" name="b_age" id="age" maxlength="2" value="" placeholder="<?php echo Enter.Age;?>">
    	</div>
        </div>
        <?php } ?>
<?php } ?>
<?php /*other information end*/ ?>

<?php /*question start*/ ?>
<?php if($questions){ ?>
	<h3><?php echo Other_Questions;?></h3>
	<?php 
	
	
	$ticks = $ticket_qty;
	foreach($questions as $q){
		$ask =1;
		if($q['rules']=='11' || $q['rules']=='1' || $q['rules']=='10') {
			
			if($q['spec_ticket']==1){
  						$ask = 0;
  						$que_ticks = export(',',$q['tickets']);
  						
  						foreach($que_ticks as $qticks){
  							if(array_key_exits($qticks,$ticks)){
  								$ask = 1;
  							}
  							
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
            		<textarea name="que[<?php echo $q['id']; ?>][]" id="que_<?php echo $q['id']; ?>"></textarea>
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
		                            		<input type="radio" name="que[<?php echo $q['id']; ?>][]" id="que_<?php echo $q['id'].$opt['id']; ?>" value="<?php echo $opt['value'];?>" <?php if($i==0){ echo 'checked="checked"'; }?> />
		                            		<?php echo $opt['value'];?>
	                            		</label>
                            		</div>
									<?php } elseif($q['que_type'] == 'check'){ ?>
									<div class="checkbox">
	                            		<label>
		                            		<input type="checkbox" name="que[<?php echo $q['id']; ?>][]" id="que_<?php echo $q['id'].$opt['id']; ?>" value="<?php echo $opt['value'];?>" <?php if($i==0){ echo 'checked="checked"'; }?> />
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
	
	
	$ticks = $ticket_qty;
	foreach($waivers as $q){
		$ask =1;
		if($q['rules']=='11' || $q['rules']=='1' || $q['rules']=='10') {
			
			if($q['spec_ticket']==1){
  						$ask = 0;
  						$que_ticks = export(',',$q['tickets']);
  						
  						foreach($que_ticks as $qticks){
  							if(array_key_exits($qticks,$ticks)){
  								$ask = 1;
  							}
  							
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
<input type="hidden" name="ticket_id[]" value="0" />
<?php } ?>
<?php /*ctype = 1 end*/ ?>  