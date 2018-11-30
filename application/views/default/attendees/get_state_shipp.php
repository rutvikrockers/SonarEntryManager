<select class="select-pad"  name="ship_state" id="ship_state">
    <option value="">-- <?php echo SELECT_STATE;?> --</option>
    <?php 
    	if($state_list){
    		foreach($state_list as $states){
    			
				$state_name = $states['state_name'];
				$state_id = $states['id'];
				
				if($state_name == $ship_state){
					$select='selected="selected"';
				}else{
					$select='';
				}
				
				echo '<option value="'.SecureShowData($state_name).'" '.$select.'>'.SecureShowData($state_name).'</option>';
				
    		}
    	}
    ?>
</select>