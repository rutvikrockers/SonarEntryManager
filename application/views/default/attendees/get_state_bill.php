<select class="select-pad" name="bill_state" id="bill_state">
	<option value="">-- <?php echo SELECT_STATE;?> --</option>
	 <?php 
		if($state_list){
			foreach($state_list as $stateb){
				
				$state_name = $stateb['state_name'];
				$state_id = $stateb['id'];
				
				if($state_name == $bill_state){
					$select='selected="selected"';
				}else{
					$select='';
				}
				
				echo '<option value="'.SecureShowData($state_name).'" '.$select.'>'.SecureShowData($state_name).'</option>';
				
			}
		}
	?>
</select>