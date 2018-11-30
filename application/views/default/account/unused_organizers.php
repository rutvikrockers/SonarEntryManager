<style type="text/css">
  .btn-danger:hover{
    color: #fff;
      background-color: #e0336b;
      border-color: #e0336b;
  }
  .btn-danger{
    color: #fff;
      background-color: #e0336b;
      border-color: #e0336b;
  }
</style>
<script type="text/javascript" language="javascript">
  
  function delete_rec(id,offset)
  {
    var ans = confirm('<?php echo ARE_YOU_SURE_TO_DELETE_UNUSED_ORGANIZER ?>');
    if(ans)
      {
        location.href = "<?php echo site_url('account/delete_unused_organizer/'); ?>"+"/"+id+"/";

      }else{

      return false;

      }
  }
</script>

<section class="eventDash-head">
    <div class="container">
      <div class="row">              
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 test-contct test-cntr">
                <h1><?php echo MY_ACCOUNT; ?></h1>
          </div>
         
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right pt mt10 con-cntr">
        
            <div class="halfacc">
             <p><?php echo SecureShowData($site_setting['site_name']); ?> <?php echo ACCOUNT_SINCE; ?> <span><?php echo datetimeformat($user_info['created_at']);?></span></p>
            <?php 
            if($user_info['ref_id']){
              $admin=getRecordById('users','id',$user_info['ref_id']);

              ?><p><?php echo THE_MAIN_ACCOUNT_HOLDER_IS;?> <span><?php echo SecureShowData($admin['email']); ?></span></p>
            <?php } ?>
            </div>
          </div>
        
      </div>
    </div>
  </section>
<section>  
            <div class="container marTB50">
              
                 <?php 
          if($msg){
          ?>
          <div class="alert alert-success">
              <button class="close" data-dismiss="alert">x</button>
              <strong><?php echo SUCCESS; ?>!</strong> <?php echo $msg; ?>.
           </div> 
          <?php
          }
        ?>
                <div class="row">
                
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
              
             
                <div class="row">    
                            
                <div class="event-webpage col-xs-12 col-sm-12">
                  <div class="red-event width100 clearfix">
                  <h4 class="pull-left"><?php echo ORGANIZERS; ?></h4>
                   <a href="<?php echo site_url('profile/create_organizer/account');?>" class="btn btn-danger btn-sm" style="float: right;margin-top: 4px;margin-right: -11px;font-weight: bold;"><?php echo ADD_ORGANIZER;?></a>
                   </div>
                 
                    <div class="clear"></div>
                <!-- End event-webpage -->
                 </div>
                
      
               
                <?php 
                            if($all_data) 
                              {?>
                <div class="col-sm-12 col-xs-12 clearfix">
                    <div class="event-detail event-detail2 pd15 replace">
                <table class="table table_res organizer_table contct-table">
                          <thead>
                              <tr>
                                   <th><?php echo NAME; ?></th>
                                    <th><?php echo STATUS; ?></th>
                                    <th style="text-align: center;"><?php echo ACTION; ?></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                              <?php 
                            if($all_data) 
                              {
                                foreach($all_data as $row)
                                  {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $url=$row['page_url'];
                                   
                                    $unused=false;
                                    foreach ($unused_data as $key)
                                     { 
                                       if($row['id']== $key['id']){
                                                $unused=true;
                                                break;

                                         }
                                    }
                                    $star_class='glyphicon glyphicon-star-empty';
                                    if($row['is_default']==1){
                                      $star_class='glyphicon glyphicon-star';
                                    }
                                   

                          ?>
                              <tr>                                                                
                                  <td>
                                  <?php 
                                 
                                    echo  SecureShowData($name);
                                 ?>
                                  </td>
                                    <td>
                                  <?php 
                                 if($unused){
                                    echo  UNUSED;
                                  }else{
                                    echo USED;
                                  }
                                 
                                 ?>
                                  </td>
                                    <td style="text-align: center;">
                                    <div class="add-new " >
                                    <ul class="list-unstyled">
                                    <li><a href="<?php echo site_url('profile/create_organizer/'.$url.'/account');?>" id="edit_multi" data-toggle="tooltip" data-placement="bottom" title="" class="edit" data-original-title="Edit"><i class="glyphicon glyphicon-edit"  ></i></a></li> |
                                     <?php  if($unused){?>
                                    <li><a href="javascript://"  onclick="delete_rec('<?php echo $id; ?>')"  data-toggle="tooltip" data-placement="bottom" title="" class="edit" data-original-title="Delete"> <i class="glyphicon glyphicon-trash"  ></i></a></li> |
                                  <?php }else{?>
                                  <li><a href="javascript://" data-toggle="tooltip" data-placement="bottom" title="" class="edit" data-original-title="<?php echo THIS_ORGNIZER_HAS_EVENT;?>"> <i class="glyphicon glyphicon-info-sign"  ></i></a></li> | 
                                  <?php } ?>

                                  <?php if($unused){ ?>
                                    <li><a href="javascript://"  data-toggle="tooltip" data-placement="bottom" title="" class="edit" data-original-title=""><i class="glyphicon glyphicon-star-empty" style="color: black;" ></i></a></li>
                                 <?php } else if($row['is_default']==1){ ?>
                                   <li><a href="<?php echo site_url('profile/unset_default_organizer/'.$row['id']);?>" onclick="return confirm('<?php echo ARE_YOU_SURE_UNUSED_ORGANIZER_DEFAULTUNSET;?>')"  data-toggle="tooltip" data-placement="bottom" title="" class="edit" data-original-title="Delete"><i class="<?php echo $star_class;?>"  ></i></a></li>
                                   <?php } else { ?>
                                   <li><a href="<?php echo site_url('profile/set_default_organizer/'.$row['id']);?>" onclick="return confirm('<?php echo ARE_YOU_SURE_UNUSED_ORGANIZER;?>')"  data-toggle="tooltip" data-placement="bottom" title="" class="edit" data-original-title="Default"><i class="<?php echo $star_class;?>"  ></i></a></li>
                                   <?php }?>
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
                 
                </div>
            </div>
                         <?php 

                } else {?>
                
                <div class="col-sm-12 clearfix">
                    <div class="event-detail event-detail2 pd15 replace">
                <p class="no_records"><?php echo NO_RECORDS;?></p>
                </div>
                </div>
                

                <?php }
            ?>
                       
               
              </div><!-- End Row-->                  
                          
           </div><!-- End col-sm-8 -->          
                   
                 
             
                
                <!-- RIGHT CONTENT -->
               <?php echo $this->load->view('default/common/account_sidebar');?>
             </div>
                
            </div><!-- End container -->
    </section>
    
    <!-- Start footer -->
   
    <script>
        $(document).ready(function(){
        $(".rover_tip").popover();
  });
  </script>
    
    <script>
        $(document).ready(function(){
        $(".edit").tooltip();
  });
  </script>
  </body>
</html>