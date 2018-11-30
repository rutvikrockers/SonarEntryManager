<select class="select-pad" name="work_state" id="work_state">
                                            <option value="">-- <?php echo SELECT_STATE;?> --</option>
										     <?php 
                                            	if($state_list){
                                            		foreach($state_list as $statew){
                                            			
														$state_name = $statew['state_name'];
														$state_id = $statew['id'];
														
														if($state_name == $work_state){
															$select='selected="selected"';
														}else{
															$select='';
														}
														
														echo '<option value="'.$state_name.'" '.$select.'>'.SecureShowData($state_name).'</option>';
														
                                            		}
                                            	}
                                            ?>
                                            </select>