<?php 
	
	$id=$currency['id'];
	$currency_name=$currency['currency_name'];
	$currency_code=$currency['currency_code'];
	$currency_symbol=$currency['currency_symbol'];
	$created_at=$currency['created_at'];
	$updated_at=$currency['updated_at'];

?>

<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class=" col-xs-12 clearfix">
                    <h1><?php echo CURRENCY_CODE; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
            	
                <div class="col-xs-12 clearfix">
                	<div class="panel panel-default">
                          
                          <div class="panel-heading"><?php echo CURRENCY_CODE_DETAILS; ?></div>
                         
                          <ul class="list-group">
                            <li class="list-group-item">Id : <?php echo $id; ?></li>
                            <li class="list-group-item">Currency Name  : <?php echo SecureShowData($currency_name); ?></li>
                            <li class="list-group-item">Currency Code : <?php echo SecureShowData($currency_code); ?></li>
                            <li class="list-group-item">Currency Symbol  : <?php echo $currency_symbol; ?></li>
                            <li class="list-group-item">Created At  : <?php echo $created_at; ?></li>
                            <li class="list-group-item">Updated At  : <?php echo $updated_at; ?></li>
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->
                                
            </div>
                
                 <?php if(DEMO_MODE=="0"){ ?>
                <div class="text-center">
                   <a href="<?php echo site_url();?>admin/currency/edit_currency/<?= $id ?>" class="btn btn-default btn-lg"><?= EDIT ?></a>
                   <a href="<?php echo site_url();?>admin/currency/list_currency" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
                </div>
            <?php } ?>

            </div>
        </div>
</body>

</html>
