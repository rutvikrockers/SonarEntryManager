
<link href="<?php echo base_url();?>css/jquery.bxslider.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/spectrum.css" rel="stylesheet">

<script src="<?php echo base_url();?>js/jquery.bxslider.min.js"></script>
<script src="<?php echo base_url();?>js/jquery.fancybox.js"></script>
<script src="<?php echo base_url();?>js/spectrum.js"></script>


<style type="text/css">
    .bx-wrapper {
  ul{
     padding: 0px;
     li{
        text-align: center; 
     }
   }
}
</style>
<div id="page-wrapper">
 <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_SITE_THEMES; ?> <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <?php 
                if($msg == 'update')
                    {   ?>
                        
                            <div class="alert alert-success" role="alert">
                            <button class="close" data-dismiss="alert">x</button>
                            <strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_UPDATED;?>
                            </div>
            
            <?php } ?>
             <?php 
                if($error!= '')
                { ?>
                    
                            <div class="alert alert-danger" role="alert">
                            <button class="close" data-dismiss="alert">x</button>
                            <strong><?php echo ERRORS; ?>!</strong> <?php echo $error;?>
                            </div> 
                <?php } ?>   
                <?php
                                
                                $attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting' ); 
                                echo form_open('admin/site_setting/edit_site_theam/',$attributes);

                 ?>   
                 <input type="hidden" name="theme_id" id="theme_id"  value="">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12 clearfix">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            
                        <?php /*for loop for event theme start*/ ?>
                        <div class="form-group clearfix ">
                            <div class="col-sm-12 col-xs-12 lable-rite">
                                <div class="slider4 bg-design">
                                <?php 
                                    if($themes){ $i=0; $actsld = 0; $actsldQty = 0;
                                        foreach($themes as $theme){ $i++; $active = ""; if($site_theme_id==$theme['id']){ $active = "active"; $actsldQty=$i; $actsld = $site_theme_id; }
                                ?>

                                    <div class="slide <?php echo $active; ?> slide_<?php echo $theme['id']; ?>" id="change_theme_<?php echo $theme['id']; ?>" onclick="changeThemeColors(<?php echo $theme['id']; ?>);">
                                        <div class="theme_main" style="background: <?php echo $theme['background']; ?>;" id="theme_sel_<?php echo $theme['id']; ?>">
                                            <div class="theme_head" style="background: <?php echo $theme['event_title']; ?>; "></div>
                                            <div class="table_class" style="background: <?php echo $theme['box_background']; ?>; border-color:<?php echo $theme['box_border']; ?>;">
                                                <div class="table_head" style="background:<?php echo $theme['box_header']; ?>; border-bottom: 1px solid <?php echo $theme['box_border']; ?>;">
                                                    <h2 style="background: <?php echo $theme['header_text']; ?>; "></h2>
                                                    <h2 style="background: <?php echo $theme['header_text']; ?>; "></h2> 
                                                    <div class="clear"></div>
                                                </div>
                                                <table width="100%" cellspacing="3px">
                                                    <tr><td style="background: <?php echo $theme['body_text']; ?>; "></td></tr>
                                                    <tr><td style="background: <?php echo $theme['body_text']; ?>; "></td></tr>
                                                    <tr><td style="background: <?php echo $theme['body_text']; ?>; "></td></tr>
                                                    <tr><td style=" width: 30%; background: <?php echo $theme['body_text']; ?>; "></td></tr>
                                                </table>    
                                            </div>        
                                        </div>
                                        
                                    </div>
                                <?php                           
                                        }
                                    } 
                                ?>
                                </div>
                            </div>
                        </div>
                        
                        <?php /*for loop for event theme end*/ ?>

                        </div>
                    
                 </div>
                 
                 <?php if(DEMO_MODE=="0"){ ?>
                    <div class="text-center">
                        <button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_THEME; ?></button>
                         <a href="<?php echo site_url();?>admin/home/dashboard" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
                    </div>
                 <?php } ?>
                </div><!-- col-lg-12  -->
           
            </div>
            <!-- /.row -->
            </form>
        </div>
        <!-- /#page-wrapper -->

    </div>

    <!-- /#wrapper -->

<script type="text/javascript">
    var id ='';
    function changeThemeColors(id){
        
        var change_theme_path = '<?php echo site_url('admin/site_setting/changeThemeColors/'); ?>';
        
            $.ajax({
                type: "POST",
                data: {theme_id: id}, 
                url: change_theme_path,
                success: function(data) {  
                    
                    var data = data.split("^");
                    var theme_id = data[0].trim();                    
                    var event_title = data[1];
                    var background = data[2];
                    var header_text = data[3];
                    var box_background = data[4];
                    var body_text = data[5];
                    var box_border = data[6];
                    var links = data[7];
                    var box_header = data[8];
                    $('#theme_id').val(theme_id);
                    $('#event_title').val(event_title);
                    $('#background').val(background);
                    $('#header_text').val(header_text);
                    $('#box_background').val(box_background);
                    $('#body_text').val(body_text);
                    $('#box_border').val(box_border);
                    $('#links').val(links);
                    $('#box_header').val(box_header);

                    $('#span_event_title').css('background-color',event_title);
                    $('#span_background').css('background-color',background);
                    $('#span_header_text').css('background-color',header_text);
                    $('#span_box_background').css('background-color',box_background);
                    $('#span_body_text').css('background-color',body_text);
                    $('#span_box_border').css('background-color',box_border);
                    $('#span_links').css('background-color',links);
                    $('#span_box_header').css('background-color',box_header); 
                    $('.slide').removeClass('active');   
                    $('.slide_'+theme_id).toggleClass("active");
                }
            });   
    }
    $(document).ready(function(){
        var startsld = '<?php echo $actsldQty; ?>';
        // alert(startsld);
        if(startsld>3){
            startsld = startsld-3;
        } else {
            startsld=0;
        }
         var homeSlider = $('.slider4').bxSlider({
            slideWidth: 190,
            minSlides: 1,
            maxSlides: 5,
            moveSlides: 1,
            startSlide : startsld,
            slideMargin: 10,
            infiniteLoop :  false
        });
    });

</script>