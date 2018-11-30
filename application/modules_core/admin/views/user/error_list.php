

<div id="page-wrapper">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-xs-12 clearfix">
            <h1><?php echo ERROR_LIST; ?> <?php echo USERS; ?>  <small><?php echo SecureShowData($site_setting['site_name']); ?></small>
        </div>
        
        <div class="page-header border"></div>
        <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> <?php echo ERROR_LIST; ?> <?php echo USERS; ?>
                    </li>
                </ol>
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
                                            <th><?php echo NAME; ?></th>
                                            <th><?php echo ERROR_NO; ?></th>
                                            <th><?php echo FILE; ?></th>
                                            <th><?php echo LINE_NO; ?></th>
                                            <th><?php echo CREATED_AT; ?></th>
                                            <th><?php echo ERROR_TYPE; ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <?php
                                        if ($result)
                                         {
                                        foreach ($result as $row)
                                         {
                                                                      # code...
                                                                                       
                                            $file_array=explode('application', $row['file']);
                                            $file=$file_array[1];

                                         ?>
                                                <tr class="odd">
                                                     <td><?php echo str_replace(':', ': ', SecureShowData($row['name'])); ?></td>
                                                    <td><?php echo $row['error_number'];?> </td>
                                                    <td><a title='<?php echo $row['file']?>'><?php echo $file; ?></a></td>
                                                   
                                                    <td><?php echo $row['line_number'] ?></td>
                                                    <td><?php echo $row['created_at'] ?></td>
                                                    <td><?php echo SecureShowData($row['error_type']) ?></td>

                                                    
                                                  

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
