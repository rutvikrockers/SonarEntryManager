<script>

function setaction(elename, actionval, actionmsg, formname) {
    vchkcnt=0;
    elem = document.getElementsByName(elename);
    
    for(i=0;i<elem.length;i++){

        if(elem[i].checked) vchkcnt++;  

    }

    if(vchkcnt==0) {

        alert('<?php echo PLEASE_SELECT_A_RECORD; ?>')

    } else {

        if(confirm(actionmsg))

        {
            document.getElementById('action').value=actionval;  

            document.getElementById(formname).submit();
        }       

    }
}
</script>  
     <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 clearfix">
                    <h1><?php echo ASSIGN_RIGHTS; ?></h1>
                </div>
                
                 <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                
            <div class="row">
                <div class="col-lg-12 clearfix">
                    <div class="panel panel-default">
                    
                    <?php 
                     /*code add by darshan start*/ 
                    $admin_id_user = check_admin_authentication();
                     $disabled='';
                    $one_data= getRecordById('admin_users','id',$admin_id);
                    $one_data_user= getRecordById('admin_users','id',$admin_id_user);
                    if($one_data_user['main_admin']!=1){
                    if($admin_id ==$admin_id_user || $one_data['admin_type'] == 0)
                    {
                        $disabled='';
                    }else
                    {
                         $disabled='disabled';
                    }
                }else
                {
                    $disabled=''; 
                }
/*code add by darshan end*/
                    $attributes = array('name'=>'frm_assignrights','id'=>'frm_listpage');
                    echo form_open('admin/admin_user/update_rights/'.$admin_id,$attributes);
                    
                    ?>
                    <input type="hidden" name="action" id="action" /> 
                    
                    <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            
                                <div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover">
                                    
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="selecctall"  <?php echo $disabled;?>></th>
                                            <th><?php echo RIGHTS_NAME;?></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                        if($result)
                                            {
                                            
                                            foreach($result as $row) 
                                                {
                                                    $check = '';
                                                    foreach($rights as $right)
                                                    {
                                                        if($row['rights_id']==$right['rights_id'] && $right['rights_set']==1)
                                                        {
                                                            $check = 'checked="checked"';
                                                        }
                                                    }
                                                     
                                            ?>
                                        
                                        <tr class="odd gradeX">
                                            <td><input type="checkbox" onchange="check_all_rights(this);"  class="checkbox admin_right" name="chk[]" <?php echo $check?> value="<?php echo $row['rights_id']?>" <?php echo $disabled;?> >
                                                 <input type="hidden" class="checkbox1" name="chk_hidden[]" <?php echo $check?> value="<?php echo $row['rights_id']?>" <?php echo $disabled;?> >
                                            </td>
                                            <td><?php echo $row['rights_name']?></td>
                                        <tr>
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
                 <?php if(DEMO_MODE=="0"){ ?>
                    <?php if(!$disabled) {?> <!-- /*code add by darshan */ -->
                    <div class="text-center">
                        <button type="button" class="btn btn-default btn-lg <?php echo $disabled;?>" onclick="setaction('chk[]','update', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_UPDATE_SELECTED_RIGHTS;?>', 'frm_listpage')" <?php echo $disabled;?>><?php echo UPDATE; ?></button>
                        <?php /*?><button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE;?></button><?php */?>
                    </div>
                    <?php }?><!-- /*code add by darshan */ -->
                 <?php } ?>
                  </form>              
                </div><!-- col-lg-8  -->
            </div>
            <!-- /.row -->
        </div>
        </div>
        <!-- /#page-wrapper -->
    
    
</body>
<script>
    $(document).ready(function() {
    
    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
        
</script>     

<script type="text/javascript">
                      function check_all_rights() {
                        no_uncheck = $("input.admin_right:checkbox:not(:checked)").length
                        if(no_uncheck == 0) {
                          $('#selecctall').prop('checked', 'checked');
                        } else {
                          $('#selecctall').prop('checked', "");
                           $('#selecctall').removeAttr('checked');
                        }
                        $.uniform.update('#selecctall');
                      }
                      $(document).ready(function() {
                        check_all_rights();
                                              
                    })
                    </script>
<script>
$(document).ready(function(){
        $('#sample_1').dataTable();
        
    });
</script>



</html>
