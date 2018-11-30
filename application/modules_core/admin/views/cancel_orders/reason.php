<script type="text/javascript">
  function goBack() {
    window.history.back();
  }
  function ClickEvent(){
    window.location.href="<?php echo site_url('admin/cancel_order/confirm_request/'.$result['id'])?>";
  }
  function ClickDecline(){
    window.location.href="<?php echo site_url('admin/cancel_order/show_decline/'.$result['id']); ?>";
  }
</script>
<div id="print">
  
  <div id="page-wrapper">
  <div class="container-fluid">
            <div class="row">
                <div class=" col-xs-12 clearfix">
                    <h1>Reason  -  <?php echo SecureShowData($site_setting['site_name']);?> </h1>
                </div>
                <div class="page-header border"></div>
            </div>
            
            <div class="row" >              
                <div class="col-lg-8 col-lg-offset-2 col-xs-12 clearfix">
                  <div class="panel panel-default">
                 
                          <div class="panel-heading clearfix">
                          <div class="panel-title pull-left">
                           <?php echo 'Request Refund Details'; ?>
                          </div>
                             <h4 class="panel-title text-right">
                                <button type="button" class="btn btn-default hidden-print btn-sm" onclick="printContent('print')"><?php echo PRINT_TEXT; ?></button>
                             </h4>
                          </div>
                          <ul class="list-group">

                            <li class="list-group-item">
                                <div class="clearfix ww-main">
                                  <div class="ww-item50">                                 
                                      <ul>
                                        <li><strong>Order No.</strong> : <?php echo $result['id']; ?></li>
                                        <li><strong>Name </strong> : <?php echo SecureShowData($result['full_name']); ?></li>
                                        <li><strong>Email Address</strong> : <?php echo SecureShowData($result['sender_email']); ?></li>
                                        <li><strong>Cancel Reason</strong> : <?php echo SecureShowData($result['message']); ?></li>
                                       </ul>
                                  </div>
                                 </div>
                            </li>
                                                  
                          </ul>
                        </div>
                        <?php if($result['with_con']==0 && $result['decline']==0 ) { ?>
                        <button type="button" class="btn btn-success btn-sm" onclick="ClickEvent()">Confirm</button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="ClickDecline()">Decline</button>
                        <?php } ?>
                        <button type="button" class="btn btn-default btn-sm" onclick="goBack()">Cancel</button>
                </div>                     
            </div>          
            </div>
</div>
</div>
<script type="text/javascript">

function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}

</script>
