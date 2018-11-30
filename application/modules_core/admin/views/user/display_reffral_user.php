<?php //Kalpesh Patel//?>

<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-xs-12 clearfix">
            <h1><?php echo REFFERAL; ?> <?php echo USERS; ?> - <?php echo SecureShowData($site_setting['site_name']); ?>
        </div>
        
        <div class="page-header border"></div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12 clearfix">
            <div class="panel panel-default">

                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example4">
                                    <thead>
                                      <tr>
                                            <th><?php echo REFFRAL_CODE; ?></th>
                                            <th><?php echo SITE_VISIT; ?></th>
                                            <th><?php echo SIGN_UP; ?></th>
                                           
                                            <th><?php echo YOUR_SHARE; ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php //To display all referral users//?>
                                        <?php
                                        if ($result) {                          
                                   
                                   
                                              foreach ($result as $value) {
                                                        $id = $value['id'];
                                                       $site_visits = $value['site_visits'];
                                                        $sign_up = $value['sign_up'];

                                                       

                                                       $link = $value['link'];
                                                        $p_data=getreferral_data($link);
                                                      
                                                     
                                                       $sales ='';$shares='';$paid='';$due='';
                                                       if(is_array($p_data))
                                                       {
                                                         foreach($p_data as $vall)
                                                         {
                                                          
                                                           if(is_array($vall))
                                                           {
                                                            
                                                            if( $sales=='') {
                                                                $sales= $vall['currency_symbol'].$vall['sales'];
                                                            } else {
                                                                $sales.=",".$vall['currency_symbol'].$vall['sales'];
                                                            }
                                                          }
                                                           if(is_array($vall))
                                                           {
                                                            if( $shares=='') {
                                                                $shares= $vall['currency_symbol'].$vall['shares'];
                                                            } else {
                                                                $shares.=",".$vall['currency_symbol'].$vall['shares'];
                                                            }
                                                           }

                                                         }
                                                        } 

                                                       if( !$sales)
                                                        {
                                                            $sales ='0.00';
                                                         } 
                                                      if(!$shares)
                                                      {
                                                        $shares = '0.00';
                                                      }

                          
                                                ?>
                                                <tr class="odd gradeX">
                                                     <td><?php echo $link ?></td>
                                                    <td><?php echo $site_visits; ?></td>
                                                    <td><?php echo $sign_up; ?></td>
                                                   
                                                    <td><?php echo $shares ?></td>
                                                    
                                                  

                                                </tr>
                                                <?php
                                            
                                        }
                                    }
                                        ?> 
                                    </tbody>
                                </table>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- col-lg-8  -->
    </div>
    <!-- /.row -->
</div>
</div>
<!-- /#page-wrapper -->


</body>
<script>

    $(document).ready(function() {
        $('#dataTables-example4').dataTable();
    });
</script>
</html>
