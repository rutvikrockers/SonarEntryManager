<section class="eventDash-head">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 test-contct test-cntr">
        <h1><?php echo MY_ACCOUNT; ?></h1>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right pt mt10 con-cntr">
        <div class="halfacc">
          <p><?php echo SecureShowData($site_setting['site_name']); ?> <?php echo ACCOUNT_SINCE; ?> <span><?php echo datetimeformat($user_info[0]['created_at']);?> <?php echo timeFormat($user_info[0]['created_at']); ?></span></p>
        <?php 
            if($user_info[0]['ref_id']){
              $admin=getRecordById('users','id',$user_info[0]['ref_id']);

              ?><p><?php echo THE_MAIN_ACCOUNT_HOLDER_IS;?> <span><?php echo SecureShowData($admin['email']);?></span></p>
            <?php } ?>
            </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container marTB50">
    <div class="row">
      <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="row">
          <div class="event-webpage col-xs-12 col-sm-12">
            <div class="red-event width100 ">
              <h4><?php echo CANCELLED_ORDERS;?></h4>
            </div>
            <div class="clear"></div>
          </div>        
          <div class="col-sm-12 clearfix">
            <div class="event-detail event-detail2">
              <ul class="nav nav-pills ls-tab text-center mb fontblack">
                <li class="active col-sm-6 col-xs-6 login"><a href="#pending" data-toggle="tab"><?php echo PENDING;?></a></li>
                <li class="col-sm-6 col-xs-6 signup"><a href="#paid" data-toggle="tab"><?php echo PAID;?></a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="pending">
                  <form class="pd15">
                    <table class="table table_res cancel-info contct-table">
                      <thead>
                        <tr>
                          <th><?php echo EVENT_NAME; ?></th>
                          <th><?php echo TICKET_NAME; ?></th>
                          <th><?php echo TICKET_QTY; ?></th>
                          <th><?php echo AMOUNT; ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            if($pending_order)
						                {
                                foreach($pending_order as $pending)
                                {
							                     $amount = set_event_currency($pending['total'], $pending['event_id']);
						          ?>
                                  <tr>
                                    <td><?php echo SecureShowData($pending['event_title']); ?></td>
                                    <td><?php echo SecureShowData($pending['ticket_name']); ?></td>
                                    <td><?php echo SecureShowData($pending['ticket_qty']); ?></td>
                                    <td><?php echo $amount; ?></td>
                                  </tr>
                        <?php   }
						                }else{?>
                                  <tr>
                                    <td colspan="4"><?php echo NO_RECORDS_AVAILABLE;?></td>
                                  </tr>
                            <?php } ?>
                      </tbody>
                    </table>
                  </form>
                </div>
                <!-- End tab-pane id=home -->
                
                <div class="tab-pane" id="paid">
                  <form class="pd15">
                    <table class="table table_res cancel-info contct-table">
                      <thead>
                        <tr>
                          <th><?php echo EVENT_NAME; ?></th>
                          <th><?php echo TICKET_NAME; ?></th>
                          <th><?php echo TICKET_QTY; ?></th>
                          <th><?php echo AMOUNT; ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          		if($paid_order)
										          {
            											foreach($paid_order as $paid)
            											{
            														$amount1 = set_event_currency($paid['total'],$paid['event_id']);
										        ?>
                                    <tr>
                                      <td><?php echo SecureShowData($paid['event_title']); ?></td>
                                      <td><?php echo SecureShowData($paid['ticket_name']); ?></td>
                                      <td><?php echo SecureShowData($paid['ticket_qty']); ?></td>
                                      <td><?php echo $amount1; ?></td>
                                    </tr>
                          <?php  }
									           	}else{?>
                                    <tr>
                                      <td colspan="4"><?php echo NO_RECORDS_AVAILABLE;?></td>
                                    </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </form>
                </div>
                <!-- End tab-pane id=bill --> 
                
              </div>
              <!-- End tab-content  --> 
              
            </div>
            <!-- end event-detail --> 
          </div>
        </div>
        <!-- End Row--> 
        
      </div>
      <!-- End col-sm-8 --> 
      
      <!-- RIGHT CONTENT --> 
      <?php echo $this->load->view('default/common/account_sidebar');?> </div>
  </div>
  <!-- End container -->
</section>

<!-- Start footer -->

</body></html>