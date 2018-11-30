 <p class="p0"><?php echo $email; ?> (Administrator)</p>
                    
                      <table class="table table_res cancel-info contct-table">
                          <thead>
                              <tr>
                                  <th><?php echo EMAIL; ?></th>
                                    <th><?php echo ACTION; ?></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                             <?php if($user_email)
                                   {

                                      foreach($user_email as $reff_email)
                                      {
                                            $id = $reff_email['id'];
                                            $email = $reff_email['email'];
                                            $permission_email = $reff_email['permission_email'];
                                      ?>
                                <tr>                                                                
                                  <td>
                                  <?php 
                                  if($email=='')
                                  {
                                    echo $permission_email;
                                  }else{
                                    echo $email;
                                  } ?>
                                  </td>
                                  <td>
                                    <div class="add-new ">
                                      <ul>
                                        <li><a href="<?php echo site_url('account/multi_user/1/'.$id);?>" id="edit_multi"><?php echo EDIT;?></a></li>
                                        <li><a href="<?php echo site_url('account/delete_multiuser/'.$id);?>" onclick="if(confirm('Are you sure you want to delete this user?')){return true;}else{return false;}">| <?php echo DELETE;?></a></li>
                                      </ul>
                                    </div>
                                  </td> 
                                </tr> 
                             <?php
                        }
                    }
                ?>          
                          </tbody>                            
                        </table>
                        <div class="text-right">
                            <div class="pagi_block pagi_marB0">
                              <?php echo $page_link; ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                       