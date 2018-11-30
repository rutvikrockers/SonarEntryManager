<script type="text/javascript">
  function goBack() {
    window.history.back();
  }
</script>
<div id="page-wrapper">
  <div class="container-fluid">
            <div class="row">
                <div class=" col-xs-12 clearfix">
                    <h1>Decline  -  <?php echo SecureShowData($site_setting['site_name']);?> </h1>
                </div>
                <div class="page-header border"></div>
            </div>

            <?php 
         if($error!= '')
         { ?>
          
               <div class="alert alert-danger" role="alert">
               <button class="close" data-dismiss="alert">x</button>
               <strong><?php echo ERRORS; ?>!</strong> <?php echo $error;?>
               </div> 
         <?php } ?> 

            <?php
                $attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting');  
                echo form_open('admin/cancel_order/decline/'.$result['id'],$attributes);
            ?>
            <div class="row" >              
                <div class="col-lg-8 col-lg-offset-2 col-xs-12 clearfix">
                  <div class="panel panel-default">
                 
                          <div class="panel-heading clearfix">
                            <div class="panel-title pull-left">
                             <?php echo 'Decline Details'; ?>
                            </div>
                          </div>
                          <ul class="list-group">

                            <li class="list-group-item">
                                <div class="clearfix ww-main">
                                  <div class="ww-item50">                                 
                                      <ul>
                                          <li><strong>Order No.</strong> : <?php echo $result['id']; ?></li>
                                          <li><strong>Event Name</strong> : <?php echo SecureShowData($event_details['event_title']); ?></li>
                                          <li><strong>Decline Message</strong> :</li>
                                          <li><textarea id="decline_message" name="decline_message" rows="10 " style="width: 100%;"></textarea></li>
                                       </ul>
                                       <input type="hidden" name="decline" value="1" />
                                       <input name="submit" type="submit" value="Update Decline" class="btn btn-primary" />
                                       <button type="button" class="btn btn-primary" onclick="goBack()">Cancel</button>
                                  </div>
                                 </div>
                            </li>
                          </ul>
                        </div>
                </div>                     
            </div> 
            </form>         
            </div>
</div>


