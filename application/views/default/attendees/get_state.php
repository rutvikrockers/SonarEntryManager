<select class="select-pad" name="home_state" id="home_state">
    <option value="">-- <?php echo SELECT_STATE; ?> --</option>
     <?php 
    	if($state_list){
    		foreach($state_list as $stateh){
    			
				$state_name = $stateh['state_name'];
				$state_id = $stateh['id'];
				
				if($state_name == $home_state){
					$select='selected="selected"';
				}else{
					$select='';
				}
				
				echo '<option value="'.SecureShowData($state_name).'" '.$select.'>'.SecureShowData($state_name).'</option>';
				
    		}
    	}
    ?>										    
 </select>