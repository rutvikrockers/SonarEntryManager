<?php 
$address='';
$currency = getRecordById('currency_codes','id',$event_details['currency_code_id']);
if($event_id!=''){
    
    if($event_venue['venue_add1']!='')
    {   

        $address=$event_venue['venue_add1'];
    }
    if($event_venue['venue_city']!='')
    {
        if($address!=''){
            $address=$address.', '.$event_venue['venue_city'];
        }else
        {
            $address=$event_venue['venue_city'];
        }
    }
    if($event_venue['venue_state']!='')
    {
        if($address!=''){
            $address=$address.', '.$event_venue['venue_state'];
        }else
        {
            $address=$event_venue['venue_state'];
        }
    }
}
?>


<style>

td._51m-._51mw a {
    color: #fff !important;
}
.sel-width90{
    width: 80%;
}
.break-all-word p{
    word-break: break-all;
}
<?php if($event_details['event_display_sales_end']!='1') {?>
    @media only screen and (max-width: 760px), (min-device-width: 768px) and (max-device-width: 1024px) {
        .event_view_table td:nth-of-type(1):before {
            content: "Ticket name"; font-weight:bold;
        }
/*.event_view_table td:nth-of-type(2):before {
    content: "Sales End"; font-weight:bold;
    }*/
    .event_view_table td:nth-of-type(2):before {
        content: "Price"; font-weight:bold;
    }
    .event_view_table td:nth-of-type(3):before {
        content: "Fee"; font-weight:bold;
    }
    .event_view_table td:nth-of-type(4):before {
        content: "Quantity"; font-weight:bold;
    }
}
<?php } ?>

img {
    max-width:100%;
    max-height:100%;
    width:auto;
    height:auto;
}
</style>
<?php if($event_details['google_code']!=''){ ?>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '<?php echo $event_details['google_code']; ?>', 'auto');
    ga('send', 'pageview');

</script>
<?php } ?>

<!-- CSS/JS FOR FIXSLIDER-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/flexslider.css');?>">
<script type="text/javascript" src="<?php echo base_url('js/jquery.nicescroll.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.flexslider.js');?>"></script>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="<?php echo base_url();?>js/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<link href="<?php echo base_url();?>css/popup.css" rel="stylesheet" />
<script src="<?php echo base_url();?>js/jquery.magnific-popup.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('.mfPopup').magnificPopup({
            type: 'ajax',

          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump

        });
        $('.mfPopup_add').magnificPopup({
            type: 'ajax',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });
        $('.mfPopupIn').magnificPopup({
            type: 'inline',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });


         //$("tbody").niceScroll();

         

        });



    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "fade",
            controlNav: false, 
            directionNav: false,
        });


        var outerContentsHeight = $("tbody").height();
        if(outerContentsHeight > 260)
        {
    //$("tbody").css("display", "none");
  }

});
</script>
<style type="text/css">
thead, tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;
}
/*
tbody {
    display:block;
    max-height:260px;
    overflow-y:scroll;
}
*/
</style>
<script src="<?php echo base_url();?>js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap-datetimepicker.css" />
<?php

if($event_details['active']==1)
{
    $is_purchase=1;    
}else{
    $is_purchase=2;
}

$free_tickets = $this->event_model->getTickets($event_id,1);
$paid_tickets = $this->event_model->getTickets($event_id,2);
$donation_tickets = $this->event_model->getTickets($event_id,3);

$paid_ticket_fee = $site_setting['paid_ticket_fee'];

$headertext='';
$footertext='';

if($eventTheme){
    $headertext = $eventTheme['header_text_display'];
    $footertext = $eventTheme['footer_text_display'];
}   


$data = array();

$back = $oneTheme['background'];
$title = $oneTheme['event_title'];
$head_text = $oneTheme['header_text'];
$box_back = $oneTheme['box_background'];
$body_text = $oneTheme['body_text'];
$box_border = $oneTheme['box_border'];
$link = $oneTheme['links'];
$box_head = $oneTheme['box_header'];

$updates = getEventUpdate($event_details['id']);

?>
<script>
    
    //This code snippet hides the row if there's any empty column
    $(document).ready(function() {  
        $(".tool_tip_class").tooltip();     
        $('#ticket_table tr').filter(function() {
            return $(this).find('td').filter(function() {
                return ! $.trim($(this).text());  
            }).length;
        }).hide();
    });
    
    function show_promotional_code(){
        document.getElementById('sdsds').style.display = 'block';
        document.getElementById('promotional_text').style.display = 'none';
    }
    // Save Event Click (Rahul)
    function save_event(id){
        var subcategory_path = site_url+'/event/save_event/';
        $.ajax({
            type: "POST",
            data: {event_id: id}, 
            url: subcategory_path,
            success: function(data) {  
                data=jQuery.parseJSON(data);
                if(data.error == "" || data.success != null){
                    $("#getEventSaveCount").text(parseInt($("#getEventSaveCount").text())+parseInt(1));
                    $("#user_event_save"+id).addClass("btn-saveevent forborder_event").text('<?php echo REMOVE_WATCHLIST; ?>');
                    $("#saveeventInfo").text(data.success);
                    $("#saveeventInfo").addClass('mar10 alert alert-success');
                    $("#user_event_save"+id).attr("onclick","save_event_remove("+data['id']+")").attr('id','user_event_save'+data['id']);
                }else{
                    $("#user_event_save"+id).removeClass("btn-saveevent forborder");
                    $("#user_event_save"+id).addClass("btn-saveevent forborder");
                    $("#saveeventInfo").text(data.error);
                    $("#saveeventInfo").addClass('mar10 alert alert-danger');
                }   
                setTimeout(function() { 
                    $("#saveeventInfo").text('').removeClass('mar10 alert alert-danger').removeClass('mar10 alert alert-success');
                }, 4000);
            }
        });    
    }
    function save_event_remove(id) {
        var subcategory_path = site_url+'/event/save_event_remove/';
        $.ajax({
            type: "POST",
            data: {save_id: id}, 
            url: subcategory_path,
            success: function(data) {
            data=jQuery.parseJSON(data);
                if(data['success'] != "success"){
                $("#saveeventInfo").removeClass('mar10 alert alert-danger');
                $("#saveeventInfo").addClass('mar10 alert alert-success');
                $("#saveeventInfo").text('<?php echo Event_saved_successfuuly;?>');
                $("#getEventSaveCount").text(parseInt($("#getEventSaveCount").text())+parseInt(1));
                $("#user_event_save"+id).removeClass("forborder_event");
                $("#user_event_save"+id).addClass("forborder_event_default");
                }else{
                $("#saveeventInfo").removeClass('mar10 alert alert-success').addClass('mar10 alert alert-danger').text('<?php echo REMOVE_WATCH_LIST_SUCCESSFULLY;?>');
                $("#user_event_save"+id).text('<?php echo SAVE_TO_WATCHLIST; ?>').removeClass("forborder_event").addClass("btn-saveevent forborder").attr("onclick","save_event("+data['event_id']+")").attr("id","user_event_save"+data['event_id']);

            }   
            setTimeout(function() { 
                $("#saveeventInfo").text('').removeClass('mar10 alert alert-danger').removeClass('mar10 alert alert-success');
            }, 1500);
            }
        });   
    }
    

    // Remove Save Event Click  (Rahul)
    function submit_check_form(){
        var chk = true;
        
        $('#orderInfo').text("");
        $('#orderInfo').removeClass("mar10 alert alert-danger");

        <?php ?><?php 
        if(count($free_tickets) > 0){
            foreach($free_tickets as $free){ ?>
                if($("#ticket_qty_<?php echo $free['id']?>").val() > 0){
                    chk=false;
                }
                <?php } 
            } ?>

            <?php 
            if(count($paid_tickets) > 0){
                foreach($paid_tickets as $paid){ ?>
                    if($("#ticket_qty_<?php echo $paid['id']?>").val() > 0){
                        chk=false;
                    }
                    <?php } 
                } ?>

                <?php 
                if(count($donation_tickets) > 0){
                    foreach($donation_tickets as $donation){ ?>
                        if($("#ticket_price_<?php echo $donation['id']?>").val() > 0){
                            chk=false;
                        }
                        <?php } 
                    } ?>

                    if(chk){
                        $('#orderInfo').focus();
                        $('#orderInfo').text("<?php echo Invalid_quantity_Please_enter_quantity_of_1_or_more_Or_amount;?>");
                        $('#orderInfo').addClass("mar10 alert alert-danger");
                        $('#orderInfo').show();
                        setTimeout(function() {
                            $('#orderInfo').slideUp("slow");
                        }, 5000);
                        return false;
                    }else{
                        $('#purchase').submit();
                    }

                }

    //Function for password-protected event                     
    function submit_password_form(){
        
        if($('#event_password').val()==''){
            $('#event_pass_info').text('<?php echo Enter_Password;?>');
            return false;
        }
        $('#passwordform').submit();
    }
    
    //Function for password-protected event     
    function submit_check_promotional_code(){

        var code_val = $('#promo');
        
        var codeerrInfo = $('#promotional_codeInfo');
        
        codeerrInfo.text('');

        var a = code_val.val();
        
        var filter=/^[a-zA-Z0-9_.@]+$/;
            //if it's valid url
            if(a==''){      
                code_val.focus();
                codeerrInfo.text('<?php echo Enter_a_valid_promotional_code;?>');
                return false;
            }
            //if it's NOT valid
            else if(!filter.test(a)){
                code_val.focus();
                codeerrInfo.text('<?php echo Type_only_alpha_numeric_characters;?>');
                return false;
            }
            else {
                var url = window.location.href;             
                window.location = url+'/?promo='+a; 
            }   
        }

    </script>
    <style>

    #eventDesign.mainBGColor {
        background: <?php echo $back; ?>;
    }
    #eventDesign .eventTitleColor {
        color: <?php echo $title; ?>;
    }
    #eventDesign .eventTitleColor a, #eventDesign .eventTitleColor a:hover {
        color: <?php echo $title; ?>;
    }
    #eventDesign .red-event {
        color: <?php echo $head_text; ?>;
    }
    #eventDesign .event-detail {
        background: <?php echo $box_back; ?>;
    }
    #eventDesign .event-detail, #eventDesign .icon-protection {
        color: <?php echo $body_text; ?>;
    }
    #eventDesign .brdrColor, #eventDesign .event-detail, #eventDesign .red-event, #eventDesign .eventBrdr, #eventDesign .org_Name, #eventDesign .org_Image, #eventDesign .table>thead>tr>th, #eventDesign .table>tbody>tr>td {
        border-color: <?php echo $box_border; ?>;
    }
    #eventDesign .linkColor, #eventDesign .org_Link, #eventDesign a, #eventDesign a:hover {
        color: <?php echo $link; ?>;
    }
    #eventDesign .linkColor:hover, #eventDesign .org_Link:hover, #eventDesign .eventTitleColor a:hover {
        text-decoration: underline;
    }
    #eventDesign .event-webpage .red-event {
        background-color: <?php echo $box_head; ?>;
    }
    #eventDesign .event-type li {
        background: <?php echo $box_back; ?>;
    }
    #eventDesign .btn-event, #eventDesign .btn-saveevent {
        background:<?php echo $body_text; ?>;
        color:<?php echo $box_back; ?>;
    }
    #eventDesign .btn-event:hover, #eventDesign .btn-saveevent:hover {
        background:<?php echo $body_text; ?>;
        color:<?php echo $box_back; ?>;
        box-shadow: none !important;
    }
    #eventDesign .passBox input[type="password"] {
        border-color: <?php echo $body_text;?>;
        box-shadow: none;
    }
    #eventDesign .red-event {
        border-bottom: 1px solid transparent !important;
    }
</style>
<?php if($event_details['active']==2){ ?>
<div class="endedEvent" style="display: none;">
    <i class="glyphicon glyphicon-time"></i> <?php echo THIS_EVENT_HAS_ENDED;?>
</div>
<?php }
else if($event_details['active']==3){ ?>
<div class="endedEvent" style="display: none;">
    <i class="glyphicon glyphicon-time"></i> <?php echo THIS_EVENT_HAS_CANCEL;?>
</div> <?php } ?>

<div class="endedEvent" style="display: none;">
    <i class="glyphicon glyphicon-time"></i> <?php echo LAYOUT. ' 1';?>
</div> 



<?php

if($this->uri->segment('4')=='preview' && $this->uri->segment('2')=='view'){ $this->load->view('default/common/dashboard-header'); }

?>
<section class="mainBGColor" id="eventDesign">
    <div class="container padTB50">
        <?php if($error_msg){ ?>
        <div class="alert alert-danger mar10"><?php echo $error_msg; ?></div>
        <?php }?>
        <div id="event_view_page_theme">
            <div id="event_theme_page_change">
                <div id="header_text_html">
                    <?php if($headertext!=''){ echo $headertext; }?>
                </div>


                <div class="row event-webpage">
                    <div class="col-lg-9 col-sm-8">

                        <div class="slide_head clearfix">

                            <div class="col-lg-8 col-md-12 col-sm-12 slid_l">
                                <a href="<?php echo site_url('event/slider/'.$event_id);?>" class='mfPopup event-page'>     
                                    <div class="flexslider">
                                        <ul class="slides">
                          <!--   <li>
                               <?php 
                                    $image = base_url().'upload/event_default/no_img.jpg';
                                    $event_logo =  $event_details['event_logo'];
                                    if($event_logo != '' && file_exists(base_path().'upload/event/orig/'.$event_logo)){ 
                                        $image = base_url().'upload/event/orig/'.$event_logo;
                                    }
                                    elseif($event_logo != '' && file_exists(base_path().'upload/event/thumb/'.$event_logo)){ 
                                        $image = base_url().'upload/event/thumb/'.$event_logo;
                                    }
                                ?>
                                <img src="<?php echo $image; ?>" alt=" " height="180px" class="img-responsive smallimg" > 
                            </li> -->
                            <?php  
                            $event_images=getAllRecordById('event_images','event_id',$event_id);

                            if($event_images){
                                foreach ($event_images as  $image_data) {

                                    ?>
                                    <li>
                                        <?php 
                                        $image = base_url().'upload/event_default/no_img.jpg';
                                        $image_slide =  $image_data['image_name'];
                                        if($image_slide != '' && file_exists(base_path().'upload/event/orig/'.$image_slide)){ 
                                            $image = base_url().'upload/event/orig/'.$image_slide;
                                        }
                                        elseif($image_slide != '' && file_exists(base_path().'upload/event/thumb/'.$image_slide)){ 
                                            $image = base_url().'upload/event/thumb/'.$image_slide;
                                        }
                                        ?>
                                        <img src="<?php echo $image; ?>" alt=" " height="180px" class="img-responsive smallimg" > 
                                    </li>
                                    <?php 

                                }
                            } ?>

                        </ul>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 eventTitleColor slide_r">
                <?php 
                $organizer_id = $event_details['organizer_id'];
                $organizers = getRecordById('organizers','id',$organizer_id);
                ?>
                <div class="date-ttl">
                    <span class="month"><?php echo date('F', strtotime($event_details['event_start_date_time'])); ?></span>
                    <span class="date"><?php echo date('d', strtotime($event_details['event_start_date_time'])); ?></span>
                </div>
                <div class="tckt_desc"> <h1 class="main_event_title"><?php echo SecureShowData(ucfirst($event_details['event_title']));?></h1>
                    <p>
                        <?php 

                        $display_start_time = $event_details['display_start_time'];
                        $display_end_time = $event_details['display_end_time'];
                        $display_timezone = $event_details['display_time_zone'];
             //  $start=$event_details['event_start_date_time']
                        $end_date_display=1;
                        $start_date =strtotime($event_details['event_start_date_time']." +24 hours");
                        $end_date =strtotime($event_details['event_end_date_time']);
                        if($end_date<$start_date){
                            $end_date_display=0;
                        }
                        $input_tz = date_default_timezone_get();
                        $output_tz = $timezone;
                        $zoneList = timezone_identifiers_list();

                        echo changeDateTime($event_details['event_start_date_time'], $input_tz, $output_tz, $display_start_time);
                        if($end_date_display){

                            echo ' '.TO.' '.changeDateTime($event_details['event_end_date_time'], $input_tz, $output_tz, $display_end_time); 
                        }

                        if($display_timezone){
                            echo ' ('.$timezone.')';
                        } ?>

                    </p>



                    <?php 
                    if(!$event_details['online_event_option']){ ?>
                    <p><b><?php echo SecureShowData(ucfirst($event_venue['name']));?></b> | <?php echo SecureShowData($address);?></p>           
                    <?php }else{ echo online_event; }?>
                    <?php if($event_audio){ ?>
                    <audio style="width: 100%;" loop controls <?php if($event_audio['is_autoplay']) { ?>autoplay<?php } ?>><source src="<?php echo  base_url('upload/event/audio');?>/<?php echo $event_audio['audio_name'];?>" type="audio/mpeg"></audio>

            <?php } ?>
             <ul class="event-type ">
                <li><?php echo SecureShowData(getCategoryName($event_details['category']));?></li>
                <li><?php echo SecureShowData(getCategoryName($event_details['subcategory']));?></li>
                <?php 
                if(!$event_details['online_event_option']){ ?>
                <li><?php echo SecureShowData(ucfirst($event_venue['venue_country']));?></li>
                <?php } ?>
             </ul>
            </div>
           </div>

    </div>
            <div class="event-detail pd15 <?php if(!($event_details['event_capacity']>0)){ echo "hide";}?>">
                <div id="orderInfo"></div>

                <?php 
                $protect = 1;
                if($this->uri->segment('2')=='theme'){ $event_details['keep_private']=0;}

                if($promo_code=='' && $event_details['password_protect']==1 && $event_details['keep_private']==1){
                    $protect = 0;

                    if($event_details['password_value']==$event_password){
                        $protect = 1;
                    }
                } ?>
                <?php if($protect == 1){ ?>
                <div  class="event_detail event_detail-table" id="event_detail">
                    <?php  if (is_array($free_tickets) || is_array($paid_tickets) || is_array($donation_tickets)){ ?>
                    <?php
                    $attributes = array('name'=>'purchase','id'=>'purchase','class'=>'event-title mb');
                    echo form_open('event/view/'.$event_url_link,$attributes);  
                    ?>


                    <table class="table table_res event_view_table contct-table" id="ticket_table">
                        <thead>
                            <tr>
                                <th class="TW25p"><?php echo Ticket_name;?></th>
                                <?php if($event_details['event_display_sales_end']=='1') {?>
                                <th><?php echo Sales_Ends;?></th>
                                <?php } ?>
                                <th><?php echo Price;?></th>
                                <th><?php echo Fee;?></th>
                                <?php if($event_details['remaining_tickets'] == 1){ ?>
                                <th><?php echo Available;?></th>
                                <?php }?>
                                <?php if($event_details['event_rand_id'] == ''){ ?>
                                <th><?php echo Quantity;?></th>
                                <?php } ?>
                            </tr>
                        </thead>    
                        <tbody>
                                        <?php 
                            $pur_available=0;
                            $now_date = date('Y-m-d H:i:s');
                    $hidden=0;
                    $checkTicketQty['free'] = 0;
                    $checkTicketQty['paid'] = 0;
                    $checkTicketQty['donation'] = 0;
                            /****************************FREE TICKETS START**********************************/
                            if($free_tickets){
                                foreach($free_tickets as $free){

                                    if($code_type == 2 && isApplicablePromocode($access_codes, $free) == 1){
                                        $hidden=1;
                                    }

                                    $available = $free['qty'] - $free['used'];
                                    $available = $available - $free['temp_qty'];    

                                    if($free['ticket_name'] != ''){     
                                        ?>
                                        <tr>
                                            <td>
                                                <?php 
                                                if ($access_codes){                         
                                                    $promo_tkts = $access_codes['tickets'];

                                                    $promo_tkts_new = explode(',',$promo_tkts);                         
                                                    if($promo_tkts_new)
                                                    { 
                                                        if(in_array($free['id'], $promo_tkts_new)){                                     
                                                            echo $free['ticket_name'];                                  

                                                            if(!$free['hide_description'] && $free['description']){
                                                                ?>
                                                                <a href="javascript:" onclick="if($('#<?php echo $free['id']; ?>').val()==1){ $('#desc_<?php echo $free['id']; ?>').hide(); $('#<?php echo $free['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $free['id']; ?>').show(); $('#<?php echo $free['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
                                                                <input type="hidden" id="<?php echo $free['id']; ?>" value="0" />
                                                                <div id="desc_<?php echo $free['id']; ?>" style="display: none;"> <?php echo $free['description'];?> </div>
                                                                <?php  
                                                            
                                                            }
                                                        }else{
                                                            echo $free['ticket_name'];                              
                                                        }                                                                                       
                                                    }                                               
                                                } else { 
                                                    if($free['ticket_status']!=2  || $hidden==1 ){
                                                        echo $free['ticket_name'];
                                                        if(!$free['hide_description']  && $free['description'] ){
                                                            ?>
                                                            <a href="javascript:" onclick="if($('#<?php echo $free['id']; ?>').val()==1){ $('#desc_<?php echo $free['id']; ?>').hide(); $('#<?php echo $free['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $free['id']; ?>').show(); $('#<?php echo $free['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
                                                            <input type="hidden" id="<?php echo $free['id']; ?>" value="0" />
                                                            <div id="desc_<?php echo $free['id']; ?>" style="display: none;"> <?php echo SecureShowData($free['description']);?> </div>
                                                        <?php }
                                                    }                           
                                                }?>
                                            </td>
                                            <?php if($event_details['event_display_sales_end']=='1') {?>
                                            <td>
                                                <?php 
                                                if($free['end_sale'] != '' && $free['end_sale'] !== '0000-00-00 00:00:00') {
                                                    if ($access_codes){                                 
                                                        $promo_tkts = $access_codes['tickets'];
                                                        $promo_tkts_new = explode(',',$promo_tkts);
                                                        if($promo_tkts_new){

                                                            if(in_array($free['id'], $promo_tkts_new)){                                         
                                                                echo datetimeformat($free['end_sale']).' '.timeFormat($free['end_sale']);
                                                            } else {
                                                                if($free['ticket_status']!=2 ){                                         
                                                                    echo datetimeformat($free['end_sale']).' '.timeFormat($free['end_sale']);
                                                                }
                                                            }                                   
                                                        }

                                                    } else { 
                                                        echo datetimeformat($free['end_sale']).' '.timeFormat($free['end_sale']);
                                                            
                                                    }
                                                } 
                                                ?>
                                            </td>
                                            <?php } ?>  
                                            <td><?php echo Free;?></td>
                                            <td><?php echo Free;?></td>
                                            <?php 
                                            if($event_details['remaining_tickets'] == 1){ ?>
                                            <td>
                                                <?php  
                                                if($access_codes){                          
                                                    $promo_tkts = $access_codes['tickets'];

                                                    $promo_tkts_new = explode(',',$promo_tkts);
                                                    if ($promo_tkts_new){
                                                        if(in_array($free['id'], $promo_tkts_new)){     
                                                            if($access_codes['uses'] > 0 ){
                                                                $qty = $access_codes['uses'] ;  
                                                                # Calculate available tickets having discount 
                                                                $available = $qty  - $access_codes['used_cnt'];
                                                                echo $available.'/'.$qty; 
                                                            #For unlimited uses of discount code -->    
                                                            } elseif($access_codes['uses'] == 0 ){      
                                                                echo $available.'/'.$free['qty']; 
                                                            }   
                                                        }else{
                                                            if($free['ticket_status']!=2){
                                                                echo $available.'/'.$free['qty'];   
                                                            }                                            
                                                        }       
                                                    } else{
                                                        if($free['ticket_status']!=2  || $hidden==1 ){
                                                            echo $available.'/'.$free['qty'];   
                                                        }                                            
                                                    }                               
                                                } else {
                                                    echo $available.'/'.$free['qty'];                       
                                                }   
                                                ?>
                                            </td>
                                            <?php } ?>
                                            <td><?php               
                                            if($free['end_sale']=='' || $free['end_sale'] < $now_date || $free['start_sale'] > $now_date || $event_details['event_end_date_time'] < $now_date || $is_purchase==2 ) {
                                                            echo N_A;
                                                            
                                                            $checkTicketQty['free'] = 0;
                                                $free_ids=$free['id'];
                                                echo '<input type="hidden"  name="ticket_qty['.$free_ids.']" id="ticket_qty_'.$free_ids.'"/>';                                                  
                                            } else {                                                                                            $checkTicketQty['free'] = 1;        
                                                if ($free['min_purchase']=='' || $free['min_purchase']==0){
                                                    $free['min_purchase']=$site_setting['min_purchase_allowed'];
                                                }

                                                if ($free['max_purchase']=='' || $free['max_purchase']==0){
                                                    $free['max_purchase']=$site_setting['max_purchase_allowed'];
                                                }

                                                if ($available >= $free['min_purchase']){
                                                    $pur_available=1;


                                                    if($available >= $free['max_purchase'] && $free['max_purchase']>0){
                                                        $available = $free['max_purchase'];
                                                    }

                                                    ?>
                                                    <div class="posrel">
                                                        <select name="ticket_qty[<?php echo $free['id'] ?>]" id="ticket_qty_<?php echo $free['id'] ?>" class="select-pad sel-width90">
                                                            <option value="0">0</option>
                                                            <?php 
                                                            for($i = $free['min_purchase']; $i<=$available; $i++){
                                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                        <a class="tool_tip_class" data-placement="left" data-toggle="tooltip" href="javascript://" title="<?php echo Maximum.' '.Purchase_Tickets.' : '.$available.' '.Minimum.' '.Purchase_Tickets. ' : '.$free['min_purchase'] ; ?>"></a>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <?php 
                                                } else {
                                                                $checkTicketQty['free'] = 0; 
                                                    if($free['qty']==$free['used']){ echo Sold_Out; }
                                                    else{ 
                                                        echo UNAVAILABLE; ?>
                                                        <i class="tool_tip_class ico-info" data-placement="right" data-toggle="tooltip" href="javascript://" title="<?php echo UNAVAILABLE_INFO;?>"></i>
                                                        <?php }

                                                        $free_ids=$free['id'];
                                                        echo '<input type="hidden"  name="ticket_qty['.$free_ids.']" id="ticket_qty_'.$free_ids.'"/>';
                                                    }  
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php 
                                    }
                                }
                            }
                            ?>
                            <?php /****************************FREE TICKETS END**********************************/ ?>


                            <?php /****************************PAID TICKETS START**********************************/ ?>
                            <?php 
                            $seat_data = getRecordById('seat_planner','plan_id',$event_details['id']); 
                            $plan_value = json_decode($seat_data['plan_value'], true);
                            $guest_array = $plan_value['guests'];
                        
                            if($paid_tickets){
                                foreach($paid_tickets as $paid){

                                    if($code_type == 1 && isApplicablePromocode($disc_codes, $paid) == 1){
                                        $hidden=1;
                                    }

                                    if($code_type == 2 && isApplicablePromocode($access_codes, $paid) == 1){
                                        $hidden=1;
                                    }

                                    $available = $paid['qty'] - $paid['used'];
                                    $available = $available - $paid['temp_qty'];

                                    if($paid['ticket_name'] != ''){     
                                        ?>

                                        <?php $color = '';
                                        if($guest_array) {
                                            foreach ($guest_array as $key => $val) {
                                                if ($val['ticket_name'] === $paid['ticket_name']) {
                                                    $color = $guest_array[$key]['colorcode'];
                                                }
                                            }
                                        }

                                            ?>
                                            <?php if($color==''){ ?>
                                            <tr>
                                                <?php }else{ ?>
                                                <tr style="background:<?php echo $color; ?>;" >
                                                    <?php } ?>
                                                    <td><?php 
                                                    if($disc_codes){

                                                        $promo_tkts = $disc_codes['tickets'];

                                                        $promo_tkts_new = explode(',',$promo_tkts);


                                                        if($promo_tkts_new && $paid['ticket_status'] != 2){

                                                            if(in_array($paid['id'], $promo_tkts_new)){

                                                                echo $paid['ticket_name'];

                                                                if($disc_codes['disc_amt']!=0)
                                                                {                                                               
                                                                    echo '<br /> ('.Discounted.set_event_currency($disc_codes['disc_amt'],$event_details['id']).')';
                                                                    echo '<br />'. anchor ('event/view/'.$event_details['event_title'], 'Remove Promo', 'class="org_Link"');
                                                                }
                                                                if ($disc_codes['disc_perc']!=0){
                                                                    echo '<br /> ('.Discounted.$disc_codes['disc_perc'].'%)';
                                                                }
                                                            } else {                                                        
                                                                echo $paid['ticket_name'];  

                                                            }
                                                        }                                   
                                                    }
                                                    elseif ($access_codes){                             
                                                        $promo_tkts = $access_codes['tickets'];
                                                        $promo_tkts_new = explode(',',$promo_tkts);

                                                        if($promo_tkts_new){
                                                            if(in_array($paid['id'], $promo_tkts_new)){                                     
                                                                echo SecureShowData($paid['ticket_name']);
                                                            }   else {
                                                                if($paid['ticket_status']!=2){                                          
                                                                    echo SecureShowData($paid['ticket_name']);  
                                                                }

                                                            }
                                                        }

                                                    } else {
                                                        if  ($paid['ticket_status']!=2  || $hidden==1){
                                                            echo SecureShowData($paid['ticket_name']);
                                                        }                           
                                                    }

                                                    if(!$paid['hide_description'] && $paid['description']){
                                                            
                                                        if($paid['ticket_status']!=2  || $hidden==1){ ?>
                                                        <a href="javascript:" onclick="if($('#<?php echo $paid['id']; ?>').val()==1){ $('#desc_<?php echo $paid['id']; ?>').hide(); $('#<?php echo $paid['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $paid['id']; ?>').show(); $('#<?php echo $paid['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
                                                        <input type="hidden" id="<?php echo $paid['id']; ?>" value="0" />
                                                        <div id="desc_<?php echo $paid['id']; ?>" style="display: none;"> <?php echo SecureShowData($paid['description']);?> </div>
                                                        <?php
                                                    } ?>
                                                    <?php }?></td>
                                                    <?php if($event_details['event_display_sales_end']=='1') {?>
                                                    <td>
                                                        <?php                                               
                                                        if($disc_codes){
                                                            $promo_tkts = $disc_codes['tickets'];

                                                            $promo_tkts_new = explode(',',$promo_tkts);

                                                            if ($promo_tkts_new && $paid['ticket_status']!= 2){

                                                                if(in_array($paid['id'], $promo_tkts_new)){ 

                                                                    if($disc_codes['end_date_time']!='' && $disc_codes['end_date_time']!='0000-00-00 00:00:00'){
                                                                        echo datetimeformat($disc_codes['end_date_time']).' '.timeFormat($disc_codes['end_date_time']);
                                                                    } else {                                            
                                                                        echo datetimeformat($paid['end_sale']).' '.timeFormat($paid['end_sale']);
                                                                    }
                                                                } else {

                                                                    if($paid['end_sale'] != '' && $paid['end_sale'] !== '0000-00-00 00:00:00'){
                                                                        echo datetimeformat($paid['end_sale']).' '.timeFormat($paid['end_sale']);
                                                                    }

                                                                }                               
                                                            }
                                                        }
                                                        elseif ($access_codes){                                 
                                                            $promo_tkts = $access_codes['tickets'];
                                                            $promo_tkts_new = explode(',',$promo_tkts);

                                                            if($promo_tkts_new){

                                                                if(in_array($paid['id'], $promo_tkts_new)){ 

                                                                    if($access_codes['end_date_time']!='' && $access_codes['end_date_time']!='0000-00-00 00:00:00'){    
                                                                        echo datetimeformat($access_codes['end_sale']).' '.timeFormat($access_codes['end_date_time']);
                                                                    } else {  
                                                                        echo datetimeformat($paid['end_sale']).' '.timeFormat($paid['end_sale']);
                                                                    }

                                                                } else {

                                                                    if($paid['ticket_status']!=2 && $paid['end_sale'] != '' && $paid['end_sale'] !== '0000-00-00 00:00:00'){  
                                                                        echo datetimeformat($paid['end_sale']).' '.timeFormat($paid['end_sale']);
                                                                    }                                           

                                                                }                                   
                                                            }
                                                        }
                                                        else {
                                                            echo datetimeformat($paid['end_sale']).' '.timeFormat($paid['end_sale']);
                                                        }
                                                        ?>
                                                    </td>
                                                    <?php } ?>
                                                    <td>
                                                        <?php
                                                        if($disc_codes){
                                                            $promo_tkts = $disc_codes['tickets'];

                                                            $promo_tkts_new = explode(',',$promo_tkts);

                                                            if($promo_tkts_new && $paid['ticket_status']!= 2){

                                                                if(in_array($paid['id'], $promo_tkts_new)){

                                                                    if($disc_codes['disc_amt']!='' && $disc_codes['disc_amt'] > 0 ){

                                                                        $paid['price'] = $paid['price'] - $disc_codes['disc_amt'];                                                              
                                                                        echo set_event_currency($paid['price'],$event_details['id']);

                                                                    } elseif($disc_codes['disc_perc']!='' && $disc_codes['disc_perc'] > 0 && $disc_codes['disc_perc'] < 100 ){

                                                                        $perc = (($paid['price'] * $disc_codes['disc_perc']) / 100);
                                                                        $paid['price'] = $paid['price']- $perc;
                                                                        echo set_event_currency($paid['price'],$event_details['id']);

                                                                    }elseif($disc_codes['disc_perc'] == 100){
                                                                        echo Free;
                                                                    }
                                                                } else {                                                                                        

                                                                    echo set_event_currency($paid['price'],$event_details['id']);

                                                                }                                   
                                                            } 

                                                        } elseif($access_codes){  

                                                            $promo_tkts = $access_codes['tickets'];

                                                            $promo_tkts_new = explode(',',$promo_tkts);

                                                            if($promo_tkts_new){

                                                                if(in_array($paid['id'], $promo_tkts_new)){
                                                                    echo set_event_currency($paid['price'],$event_details['id']);
                                                                }else{
                                                                    if($paid['ticket_status']!=2  ){
                                                                        echo set_event_currency($paid['price'],$event_details['id']);
                                                                    }                                                           
                                                                }
                                                            }
                                                        } else {
                                                            echo set_event_currency($paid['price'],$event_details['id']);
                                                        }
                                                        ?></td>
                                                        <td>
                                                            <?php 
                                                            /*flat fee add in view start*/
                                                            $paid_ticket_flat_fee =  $site_setting['paid_ticket_flat_fee'];
                                                            $payment_gateway_flat_fee =  $currency['payment_gateway_flat_fee'];
                                                            $paid['fee']=$paid['fee']+$paid['gateway_fee']+$paid_ticket_flat_fee;
                                                            /*flat fee add in view  end*/
                                                            if($disc_codes){
                                                                $promo_tkts = $disc_codes['tickets'];

                                                                $promo_tkts_new = explode(',',$promo_tkts);

                                                                if($promo_tkts_new && $paid['ticket_status']!= 2){

                                                                    if(in_array($paid['id'], $promo_tkts_new)){ 
                                                                        if (($event_details['event_pass_fees']==1) || ($event_details['event_pass_fees']==3 && $paid['service_fee']==1)) {
                                                                            if($disc_codes['disc_perc']!= '' && $disc_codes['disc_perc'] == 100){
                                                                                echo Free;
                                                                            } else {
                                                                                echo set_event_currency($paid['fee'],$event_details['id']);
                                                                            }   
                                                                        } else {
                                                                            echo set_event_currency(0,$event_details['id']);
                                                                        }
                                                                    } else {
                                                                        echo set_event_currency($paid['fee'],$event_details['id']);
                                                                    }                                   
                                                                }           
                                                            } elseif($access_codes){  
                                                                $promo_tkts = $access_codes['tickets'];

                                                                $promo_tkts_new = explode(',',$promo_tkts);

                                                                if($promo_tkts_new){
                                                                    if(in_array($paid['id'], $promo_tkts_new)){                                         
                                                                        if(($event_details['event_pass_fees']==1) || ($event_details['event_pass_fees']==3 && $paid['service_fee']==1)) {
                                                                            echo set_event_currency($paid['fee'],$event_details['id']);
                                                                        } else {
                                                                            echo set_event_currency(0,$event_details['id']);
                                                                        }       
                                                                    } else {
                                                                        if($paid['ticket_status']!=2){
                                                                            echo set_event_currency($paid['fee'],$event_details['id']);
                                                                        }
                                                                    }                               
                                                                }   
                                                            } else {
                                                                if(($event_details['event_pass_fees']==1) || ($event_details['event_pass_fees']==3 && $paid['service_fee']==1)){
                                                                    echo set_event_currency($paid['fee'],$event_details['id']);
                                                                } else {
                                                                    echo set_event_currency(0,$event_details['id']);
                                                                }
                                                            }
                                                            ?></td>
                                                            <?php if($event_details['remaining_tickets'] == 1){ ?>
                                                            <td>
                                                                <?php  
                                                                if($access_codes){                          
                                                                    $promo_tkts = $access_codes['tickets'];
                                                                    $promo_tkts_new = explode(',',$promo_tkts);
                                                                    if ($promo_tkts_new){
                                                                        if(in_array($paid['id'], $promo_tkts_new)){     
                                                                            if($access_codes['uses'] > 0 ){
                                                                                $qty = $access_codes['uses'] ;  
                                        # Calculate available tickets having discount 
                                                                                $available = $qty  - $access_codes['used_cnt'];
                                                                                echo $available.'/'.$qty; 
                                    #For unlimited uses of discount code
                                                                            } elseif($access_codes['uses'] == 0 ){      
                                                                                echo $available.'/'.$paid['qty']; 
                                                                            }   
                                                                        }else{
                                                                            if($paid['ticket_status']!=2 ){                                              
                                                                                echo $available.'/'.$paid['qty']; 
                                                                            }              
                                                                        }       
                                                                    } else{
                                                                        if($paid['ticket_status']!=2 ){                                              
                                                                            echo $available.'/'.$paid['qty']; 
                                                                        }                
                                                                    }                               
                                                                }
                                                                elseif($disc_codes){

                                                                    $promo_tkts = $disc_codes['tickets'];
                                                                    $promo_tkts_new = explode(',',$promo_tkts);
                                                                    if($promo_tkts_new && $paid['ticket_status']!= 2){
                                                                        if(in_array($paid['id'], $promo_tkts_new)){     
                                                                            if($disc_codes['uses'] > 0){
                                                                                $qty = $disc_codes['uses'];     
                                            # Calculate available tickets having discount 
                                                                                $available = $qty  - $disc_codes['used_cnt'];
                                                                                echo $available.'/'.$qty;
                                     #For unlimited uses of discount code
                                                                            } elseif($disc_codes['uses'] == 0){     
                                                                                echo $available.'/'.$paid['qty'];                                   
                                                                            }                                                                               
                                                                        } else {                                        
                                                                            echo $available.'/'.$paid['qty'];                    
                                                                        }                               
                                                                    }
                                                                }
                                                                else {
                                                                    echo $available.'/'.$paid['qty'];                       
                                                                }   
                                                                ?></td>
                                                                <?php } ?>

                                                                <?php 
                                                                if ($available >= $paid['min_purchase']){ $pur_available=1; }

                                                                if($event_details['event_rand_id']==''){ ?>
                                                                <td>
                                                                    <?php
                                                                    if($paid['end_sale']=='' || $paid['end_sale'] < $now_date || $paid['start_sale'] > $now_date || $event_details['event_end_date_time'] < $now_date || $is_purchase==2) {
                                                                                    echo N_A;
                                                                                    $checkTicketQty['paid'] = 0;
                                                                        $paid_ids = $paid['id'];
                                                                        echo '<input type="hidden"  name="ticket_qty['.$paid_ids.']" id="ticket_qty_'.$paid_ids.'"/>';
                                                                    } else {                                                                             $checkTicketQty['paid'] = 1;                           
                                                                        if ($paid['min_purchase']=='' || $paid['min_purchase']==0){
                                                                            $paid['min_purchase']=$site_setting['min_purchase_allowed'];
                                                                        } 

                                                                        if ($paid['max_purchase']=='' || $paid['max_purchase']==0){
                                                                            $paid['max_purchase']=$site_setting['max_purchase_allowed'];
                                                                        }

                                                                        if ($available >= $paid['min_purchase']){
                                                                            $pur_available=1;                                                       
                                                                            if($available >= $paid['max_purchase'] && $paid['max_purchase']>0){
                                                                                $available = $paid['max_purchase'];
                                                                            }
                                                                            ?>
                                                                            <div class="posrel">
                                                                                <select name="ticket_qty[<?php echo $paid['id'] ?>]" id="ticket_qty_<?php echo $paid['id'] ?>" class="select-pad sel-width90" >
                                                                                    <option value="0">0</option>
                                                                                    <?php 
                                                                                    for($i = $paid['min_purchase']; $i<=$available; $i++){
                                                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                                <a class="tool_tip_class" data-placement="left" data-toggle="tooltip" href="javascript://" title="<?php echo Maximum.' '.Purchase_Tickets.' : '.$available.' '.Minimum.' '.Purchase_Tickets. ' : '.$paid['min_purchase'] ; ?>"></a>
                                                                                <div class="clear"></div>
                                                                            </div>
                                                                            <?php 
                                                                        } else {
                                                                                        $checkTicketQty['paid'] = 0; 
                                                                            echo Sold_Out;
                                                                            $paid_ids = $paid['id'];
                                                                            echo '<input type="hidden"  name="ticket_qty['.$paid_ids.']" id="ticket_qty_'.$paid_ids.'"/>';
                                                                        }  
                                                                    }
                                                                    ?></td>
                                                                    <?php } ?>
                                                                </tr>
                                                                <?php 
                                                            }
                                                        }
                                                    }
                                                    ?>

                                                    <?php /****************************PAID TICKETS END**********************************/ ?>

                                                    <?php /****************************DONATION TICKETS START**********************************/ ?>
                                                    <?php  if($donation_tickets){
                                                        foreach($donation_tickets as $donation){

                                                            if($code_type == 2 && isApplicablePromocode($access_codes, $donation) == 1){
                                                                $hidden=1;
                                                            }

                                                            $available = $donation['qty'] - $donation['used'];
                                                            $available = $available - $donation['temp_qty'];

                                                            if($donation['ticket_name'] != ''){     
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php 
                                                                        if ($access_codes){                             
                                                                            $promo_tkts = $access_codes['tickets'];

                                                                            $promo_tkts_new = explode(',',$promo_tkts);
                                                                            if($promo_tkts){
                                                                                if(in_array($donation['id'], $promo_tkts_new)){                                     
                                                                                    echo SecureShowData($donation['ticket_name']);
                                                                                }else { 
                                                                                    if($donation['ticket_status']!=2){      
                                                                                        echo SecureShowData($donation['ticket_name']);
                                                                                    }
                                                                                }

                                                                            }

                                                                        } else {
                                                                            if  ($donation['ticket_status']!=2  || $hidden==1){
                                                                                echo SecureShowData($donation['ticket_name']);
                                                                            }                           
                                                                        }

                                                                                if(!$donation['hide_description'] && $donation['description']){

                                                                            if($donation['ticket_status']!=2  || $hidden==1){ ?>
                                                                            <a href="javascript:" onclick="if($('#<?php echo $donation['id']; ?>').val()==1){ $('#desc_<?php echo $donation['id']; ?>').hide(); $('#<?php echo $donation['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $donation['id']; ?>').show(); $('#<?php echo $donation['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
                                                                            <input type="hidden" id="<?php echo $donation['id']; ?>" value="0" />
                                                                            <div id="desc_<?php echo $donation['id']; ?>" style="display: none;"> <?php echo SecureShowData($donation['description']);?> </div>
                                                                            <?php } ?>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <?php if($event_details['event_display_sales_end']=='1') {?>
                                                                        <td>
                                                                            <?php 
                                                                            if($donation['end_sale'] != '' && $donation['end_sale'] !== '0000-00-00 00:00:00') {
                                                                                if ($access_codes){                                 
                                                                                    $promo_tkts = $access_codes['tickets'];
                                                                                    $promo_tkts_new = explode(',',$promo_tkts);
                                                                                    if($promo_tkts_new){

                                                                                        if(in_array($donation['id'], $promo_tkts_new)){                                         
                                                                                            echo datetimeformat($donation['end_sale']).' '.timeFormat($donation['end_sale']);
                                                                                        } else {
                                                                                            if($donation['ticket_status']!=2 ){                                                     
                                                                                                echo datetimeformat($donation['end_sale']).' '.timeFormat($donation['end_sale']);
                                                                                            }
                                                                                        }                                   
                                                                                    }

                                                                                } else {
                                                                                    echo datetimeformat($donation['end_sale']).' '.timeFormat($donation['end_sale']);
                                                                                }
                                                                            } 
                                                                            ?></td>
                                                                            <?php } ?>
                                                                            <td>
                                                                                <?php 
                                                                                if($access_codes){
                                                                                    $promo_tkts = $access_codes['tickets'];
                                                                                    $promo_tkts_new = explode(',',$promo_tkts);
                                                                                    if($promo_tkts_new){
                                                                                        if(in_array($donation['id'], $promo_tkts_new)){                                             
                                                                                            echo N_A;
                                                                                        }

                                                                                        if($donation['ticket_status']!=2){
                                                                                            echo N_A;
                                                                                        }                           
                                                                                    }                                       

                                                                                } elseif($disc_codes){                                  
                                                                                    $promo_tkts = $disc_codes['tickets'];
                                                                                    $promo_tkts_new = explode(',',$promo_tkts);
                                                                                    if($promo_tkts_new && $donation['ticket_status']!= 2){                                                                                      
                                                                                        echo N_A;
                                                                                    }
                                                                                } else {
                                                                                    echo N_A;
                                                                                } 
                                                                                ?></td>
                                                                                <td>
                                                                                    <?php 
                                                                                    if($access_codes){ 
                                                                                        $promo_tkts = $access_codes['tickets'];
                                                                                        $promo_tkts_new = explode(',',$promo_tkts);
                                                                                        if($promo_tkts_new){
                                                                                            if(in_array($donation['id'], $promo_tkts_new)){                                         
                                                                                                echo N_A;
                                                                                            }

                                                                                            if($donation['ticket_status']!=2){
                                                                                                echo N_A;
                                                                                            }                           
                                                                                        }                                               
                                                                                    } elseif($disc_codes){                                  
                                                                                        $promo_tkts = $disc_codes['tickets'];
                                                                                        $promo_tkts_new = explode(',',$promo_tkts);
                                                                                        if($promo_tkts_new && $donation['ticket_status']!= 2){                                                                                      
                                                                                            echo N_A;
                                                                                        }
                                                                                    } else {
                                                                                        echo N_A;
                                                                                    } 
                                                                                    ?></td>
                                                                                    <?php if($event_details['remaining_tickets'] == 1){ ?>
                                                                                    <td>
                                                                                        <?php  
                                                                                        if($access_codes){                          
                                                                                            $promo_tkts = $access_codes['tickets'];
                                                                                            $promo_tkts_new = explode(',',$promo_tkts);
                                                                                            if ($promo_tkts_new){
                                                                                                if(in_array($donation['id'], $promo_tkts_new)){     
                                                                                                    if($access_codes['uses'] > 0 ){
                                                                                                        $qty = $access_codes['uses'] ;  
                                            # Calculate available tickets having discount 
                                                                                                        $available = $qty  - $access_codes['used_cnt'];
                                                                                                        echo $available.'/'.$qty; 
                                        #For unlimited uses of discount code -->    
                                                                                                    } elseif($access_codes['uses'] == 0 ){      
                                                                                                        echo $available.'/'.$donation['qty']; 
                                                                                                    }   
                                                                                                }else{
                                                                                                    if($donation['ticket_status']!=2 ){     
                                                                                                        echo $available.'/'.$donation['qty']; 
                                                                                                    }
                                                                                                }       
                                                                                            } else{
                                                                                                if($donation['ticket_status']!=2  || $hidden==1 ){                                                   
                                                                                                    echo $available.'/'.$donation['qty']; 
                                                                                                }                
                                                                                            }                               
                                                                                        } else {
                                                                                            echo $available.'/'.$donation['qty'];                       
                                                                                        }   
                                                                                        ?></td>
                                                                                        <?php } ?>
                                                                                        <td>
                                                                                            <?php               
                                                                                            if($donation['end_sale']=='' || $donation['end_sale'] < $now_date || $donation['start_sale'] > $now_date || $event_details['event_end_date_time'] < $now_date  || $is_purchase==2) {
                                                                                                $donation_id = $donation['id'];
                                                                                                            echo N_A;
                                                                                                            $checkTicketQty['donation'] = 0;
                                                                                                echo '<input type="hidden"  name="ticket_qty['.$donation_id.']" id="ticket_qty_'.$donation_id.'"/>';
                                                                                                echo '<input type="hidden"  name="ticket_price['.$donation_id.']" id="ticket_price_'.$donation_id.'"/>';
                                                                                            } else {                                                
                                                                                                if ($available > 0){
                                                                                                                $checkTicketQty['donation'] = 1;
                                                                                                    $pur_available=1;
                                                                                                    $donation_id = $donation['id'];

                                                                                                    echo Enter_Amount.'('.getCurrencySymbol($event_details['id']).')<br /> 
                                                                                                    <input type="hidden" value="0"  name="ticket_qty['.$donation_id.']" id="ticket_qty_'.$donation_id.'"/>'; 
                                                                                                    $d_name = "ticket_price[".$donation_id."]";
                                                                                                    $d_id = "ticket_price_".$donation_id;
                                                                                                    ?>
                                                                                                    <input type="text" id="ticket_price_<?php echo $donation_id; ?>" class="ticket_price"  name="<?php echo $d_name; ?>" id="<?php echo $d_id; ?>" onkeyup="if(this.value > 0){  }else{ this.value=''; }"/>
                                                                                                    <?php } else {
                                                                                                        echo Sold_Out;
                                                                                                        $donation_id = $donation['id'];
                                                                                                        echo  '<input type="hidden" value="0" name="ticket_qty['.$donation_id.']" id="ticket_qty_'.$donation_id.'"/>';
                                                                                                        echo '<input type="hidden"  name="ticket_price['.$donation_id.']" id="ticket_price_'.$donation_id.'"/>';
                                                                                                    }  
                                                                                                }
                                                                                                ?></td>
                                                                                            </tr>
                                                                                            <?php 
                                                                                        }
                                                                                    }
                                                                                }
                                                                                ?>

                                                                                <?php /****************************DONATION TICKETS END**********************************/ ?>
                                                                            </tbody>

                                                                        </table>
                                                                        <input type="hidden" name="aff_id" id="aff_id" value="<?php echo $msg;?>" />
                                                                        <input type="hidden" name="affu_id" id="affu_id" value="<?php echo $affu_id;?>" />
                                                                        <input type="hidden" name="event_id" id="event_id" value="<?php echo $event_details['id']; ?>" />                                
                                                                        <input type="hidden" name="return_url" id="return_url" value="<?php if($msg != '') { echo str_replace('/'.$msg,'',getcurrenturl()); } else { echo getcurrenturl();}?>" />


                                                                        <?php                               
                                                                        if($code_type==1){ ?>
                                                                        <input type="hidden" name="promo_code_id" id="promo_code_id" value="<?php echo $disc_codes['id'];?>" />
                                                                        <input type="hidden" name="promo_code_amt" id="promo_code_amt" value="<?php echo $disc_codes['disc_amt'];?>" />
                                                                        <input type="hidden" name="promo_code_perc" id="promo_code_perc" value="<?php echo $disc_codes['disc_perc'];?>" />
                                                                        <?php } else if($code_type==2){ ?>
                                                                        <input type="hidden" name="promo_code_id" id="promo_code_id" value="<?php echo $access_codes['id'];?>" />               
                                                                        <?php } ?>
                                                                        <?php if($this->uri->segment('2')!='theme'){ ?></form><?php }?> 
                                                                                    <?php 
                                                                                    //$pur_available==1 ||
                                                                                    if(in_array(1, $checkTicketQty)) { ?>

                                                                    </div>
                        <div class="form-group clearfix fr">
                            <?php if(check_user_authentication()==''){ ?>
                                    <a href="javascript:" id="buy_btn" onclick="submit_check_form();" ondblclick="this.preventDefault();" class="btn-event"><?php echo REGISTER;?></a> 
                            <?php }else{ ?>
                                    <?php if($event_details['event_rand_id']==''){ ?>

                                        <?php 
                                        $ticket_status = array_filter(ticket_setting());
                                        if(!empty($ticket_status)){ ?>  
                                            <i class="glyphicon glyphicon-warning-sign"></i> <span style="font-weight: bold;">Some Issue Stope Ticket Purchase</span>

                                        <?php }  else { ?> 
                                            <a href="javascript:" id="buy_btn" onclick="submit_check_form();" ondblclick="this.preventDefault();" class="btn-event"><?php echo Buy_Tickets;?></a>

                                        <?php } ?>

                                    <?php }else{ ?>                             
                                        <a target="_blank" href="<?php echo site_url('seat_plan/seat/'.$event_details['id'].'?step=step3&plan_id='.$event_details['id'].'&page=view'); ?>" id="buy_btn" ondblclick="this.preventDefault();" class="btn-event"><?php echo SELECT_SEAT;?></a> 
                                <?php } ?>
                            <?php } ?>                              
                        </div>
                        <?php  $promotional_codes = getAllPromotionalCode($event_details['id']); ?>              
                        <?php 
                        $promo = $this->input->get('promo');
                        if($promotional_codes && $is_purchase==1 && $code_type==0 && $protect==1)
                            {?>
                                <div> <a href="javascript:void(0);" onclick="show_promotional_code();" id="promotional_text"><?php echo CLICK_HERE_TO_ENTER_PROMOCODE;?></a> </div>
                                <div class="event_detail" id="sdsds" style="display: none;">
                                    <?php                              
                                    if($code_type==0 && count($promotional_codes) > 0){

                                        $attributes = array('name'=>'promocode','id'=>'promocode','class'=>'event-title','method'=>'get', 'onClick'=>'return submit_check_promotional_code();');
                                        echo form_open('event/view/'.$event_url_link,$attributes);  

                                        ?>                
                                        <div class="form-group clearfix">
                                            <div class="col-sm-4 col-xs-12">
                                                <label><?php echo Enter_promotional_code_here_if_you_have; ?><span>&#42;</span></label>
                                            </div>
                                            <div class="col-sm-4 col-xs-12">
                                                <input type="text" name="promo" id="promo" value=""  />
                                            </div>
                                            <div class="col-sm-2 col-xs-12 fr">
                                                <input type="submit"  value="Apply" class="btn-event"/>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                        <?php if($this->uri->segment('2')!='theme'){ ?> </form> <?php } ?>
                                        <?php }    ?>
                                    </div>
                            <?php }?>
                                    <div class="clear"></div>
              <?php
            } else { ?>
                <?php echo No_tickets_available_for_purchase_now;?> </div>
                        <?php } 
                        } else { ?>
            <?php echo No_tickets_available_for_purchase_now;?> </div>
                        <?php } 
                    } else {?>
            <div class="event_detail pad3 marT20">
                <?php
                $attributes = array('name'=>'passwordform','id'=>'passwordform','class'=>'event-title');
                echo form_open('event/view/'.$event_url_link.'/'.$msg.'/'.$affu_id,$attributes);    
                ?>
                <div class="event_detail row form-group pt pb">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="row">
                            <div class="col-sm-3 col-xs-12"> <i class="icon-protection"></i> </div>
                            <div class="col-sm-8 col-xs-12">
                                <h4><strong><?php echo This_event_is_password_protected;?></strong></h4>
                                <p><?php echo event_password_protected_enter_password;?></p>
                                <div class="passProtected">
                                    <div class="passBox">
                                        <input type="password" id="event_password" name="event_password" placeholder="<?php echo Enter_Password;?>" value="" />
                                    </div>
                                    <a href="javascript:" onclick="submit_password_form();" class="btn-event"><?php echo View_Now;?></a>
                                    <div id="event_pass_info" class="error" >
                                        <?php  
                                        if($event_password!='' ){
                                            echo Incorrect_Password;
                                        } 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($this->uri->segment('2')!='theme'){ ?> </form> <?php } ?>

                <div class="clear"></div>
            </div>          
            <?php } ?>
          </div>

          <style type="text/css">
          .mrgT10 {
            margin-top: 5px;
          }
          .in-share {
            float: left;
            vertical-align: middle;
            margin-left: 10px;
            margin-right: 10px;
            text-align: center;
            font-size: 15px;
          }
        </style>
        <div class="event-detail pd15 clearfix">
            <?php
            $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            $event_share_link = $actual_link;
            $facebook = facebook_setting();
                
            $facebook_id = $facebook['facebook_api_key'];
            ?>
            <!------------------------------------>
            <div id="fb-root"></div>
            <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=<?php echo $facebook_id;?>&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

            <!------------------------------------>
            <div class="in-share mrgT10">
                <div class="fb-share-button" data-href="<?php echo $event_share_link; ?>" data-layout="button"
                    onmouseover='fb_url_update()'></div>
                </div>
                <div class="in-share mrgT10">

                    <div id="tweet-container"></div>
                    <script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
                    <script type="text/javascript">
                        twttr.widgets.createShareButton(
                            "<?php echo $event_share_link; ?>",
                            document.getElementById("tweet-container"),
                            {
                                size: "small",

                                related: "twitterapi,twitter",
                                text: "<?php echo SecureShowData($event_details['event_title']); ?>",
                                url: "<?php echo $event_share_link; ?>"

                            }
                            );
                        </script>
                    </div>
                    <div class="in-share mrgT10">
                        <script type="text/javascript" src="//platform.linkedin.com/in.js"></script>
                        <script type="in/share" data-url="<?php echo $event_share_link; ?>" data-counter=""></script>
                    </div>
                    <div class="in-share mrgT10">
                        <script src="https://apis.google.com/js/platform.js" async defer></script>
                        <div class="g-plus" data-action="share" data-annotation="none" data-height=""
                        data-href="<?php echo $event_share_link; ?>"></div>
                    </div>

                </div>
                <?php if($protect==1){ ?>
                <div class="red-event">
                    <h4><?php echo EVENT_DETAILS;?></h4>
                </div>
                <div class="event-detail pd15 break-all-word"> <?php echo SecureShowData($event_details['event_detail']);?> </div>
                <?php } ?>
                <?php  if($updates){?>
                <div class="red-event">
                    <h4><?php echo News_Updates;?></h4>
                </div>
                <div class="event-detail pd15 clearfix">
                    <?php foreach($updates as $update){ 
                        $created_at = $update['created_at'];
                        ?>
                        <div class=" pb">
                            <h4><?php echo datetimeformat($created_at).' '.timeFormat($created_at); ?></h4>
                            <p><?php echo SecureShowData($update['updates']);?></p>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>

                    <!-- Facebook event page -->
                    <?php  if($fb_event_id!=''){
                        $fb_event_link = "https://www.facebook.com/event/".$fb_event_id;
                        ?>
                        <div class="red-event">
                            <h4>Who is going ?</h4>
                        </div>
                        <div class="event-detail pd15 ">
                            <a target="_blank" href="<?php echo $fb_event_link ?>">Facebook Event</a>
                            <fb:login-button scope="public_profile,email,user_friends" onlogin="checkLoginState();" id="fb_login_button">
                        </fb:login-button>
                        <div id="status"></div>
                        <ul id="list" class="fb_list"></ul>
                    </div>

                    <script>
                        var fb_event_id = '<?php echo $fb_event_id; ?>';
                    </script>

                    <script>
                        var list = [];
                        function statusChangeCallback(response) {
            //console.log('statusChangeCallback');
            //console.log(response);
            //console.log(fb_event_id);
            if (response.status === 'connected') {                                 
                friendAPI(fb_event_id);
            } else if (response.status === 'not_authorized') {              
                document.getElementById('status').innerHTML = 'Please log ' +
                'into this app.';
            } else {
                document.getElementById('status').innerHTML = 'Please log ' +
                'into Facebook.';
            }
          }

          function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
          }

          window.fbAsyncInit = function() {
            FB.init({
                appId      : '199656537083869',
                cookie     : true,
                xfbml      : true,
                version    : 'v2.6'
            });

            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
          };

          (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));

          function friendAPI(fb_event_id) {

            console.log('Welcome!  Fetching your information.... ');                    
            FB.api('/me', function(response) {
                console.log(response);
                console.log('Successful login for: ' + response.name);
                document.getElementById('status').innerHTML =
                'You are logging in as ' + response.name + '!';
                document.getElementById('fb_login_button').style.display = 'none';
            });

            FB.api("/"+fb_event_id+"/attending", function (response) {              
                //var count = $(response.data).toArray().length;                
                
                for(key in response.data){
                    var name = response.data[key]['name'];
                    var id = response.data[key]['id'];
                    
                    getListHTML(id, name, key);     

                }
                
            });

            function getListHTML(id, name, key){
                var fb_list = document.getElementById("list");
                FB.api("/"+id+"/picture", {type: 'small'},function (response) {

                    fb_list.innerHTML += "<li><a data-toggle='tooltip' title='"+name+"' target='_blank' href='https://www.facebook.com/profile.php?id="+id+"'><img src='"+response.data.url+"' /></a></li>";                      
                }
                ); 
            }

          }
        </script>

        <?php } ?>
        <!-- End of facebook event page-->
      </div>
      <div class="col-lg-3 col-sm-4">

        <?php
        $event_start_date_time=$event_details['event_start_date_time'];
        $temp=explode(" ",$event_details['event_start_date_time']);
        if(isset($temp[0])) {
            $event_start_date_time=$temp[0];
        }

        $event_end_date_time=$event_details['event_end_date_time'];
        $temp=explode(" ",$event_details['event_end_date_time']);
        if(isset($temp[0])) {
            $event_end_date_time=$temp[0];
        }

        $cal_event_title=$event_details['event_title'];
        $cal_start_date=str_replace("-","",$event_start_date_time);
        $cal_end_date=str_replace("-","",$event_end_date_time);
        $cal_event_desc=$event_details['event_detail'];
        $cal_location=$address;

        ?>
        <?php $style=''; if($event_details['online_event_option'] || $event_details['show_on_map'] !=1){ $style='style="display: none;"';} ?>
        <div class="red-event pt" <?php echo $style;?>>
            <h4><?php echo WHERE;?></h4>
        </div>
        <div class="event-detail pd15 "  <?php echo $style; ?>>

            <div class="" <?php echo $style; ?>>
                <?php 
                if($address != '' && $event_details['show_on_map'] ==1 ){

                    $street_address = str_replace(' ','+',$address);

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://maps.google.com/maps/api/geocode/json?address='.$street_address.'&key=AIzaSyDd3TN-IJfIiCcLIkZvNHxDLrByz81eoeM');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    $geocode = curl_exec($ch);
                    curl_close($ch);
                    $output = json_decode($geocode);

                    if($output->status == 'OK'){ 
                        $lat = $output->results[0]->geometry->location->lat; 
                        $long = $output->results[0]->geometry->location->lng;                                           
                        ?>
                        <script type="text/javascript">
                            $(document).ready(function () {

                                var latitude = parseFloat("<?php echo $lat; ?>"); 
                                var longitude = parseFloat("<?php echo $long; ?>"); 
                                var latlngPos = new google.maps.LatLng(latitude, longitude);

                                var myOptions = {
                                    zoom: 15,
                                    center: latlngPos,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                                };


                                map = new google.maps.Map(document.getElementById("map"), myOptions);

                                var marker = new google.maps.Marker({
                                    position: latlngPos,
                                    map: map,
                                    title: "test",
                                    animation: google.maps.Animation.BOUNCE,
                                });
                            });
                        </script>
                        <div class="map" id="map"></div>
                        <?php } 
                        }?>
                    </div>
      </div>

      <div class="red-event pt">
        <h4><?php echo Organizer;?></h4>
      </div>
      <div class="event-detail pd15">
        <p class="org_Image">
            <?php if($org_logo && file_exists('upload/organizer/org_large_image/'.$org_logo)){ ?>
            <img class="" width="100%" src="<?php echo site_url('upload/organizer/org_large_image/'.$org_logo); ?>" alt="logo">
            <?php } else { ?>
            <img class="" width="100%" src="<?php echo site_url('upload/org_default/no_img.jpg'); ?>" alt="no_img">
            <?php } ?>
        </p>
        <p class="org_Name"><?php echo SecureShowData($org_name);?></p>
        <a href="<?php echo site_url('event/contact_organizer/'.$event_details['user_id'].'/'.$event_details['id']); ?>" class="btn-saveevent mfPopup"><i class="glyphicon glyphicon-envelope"></i> <?php echo Contact_the_organizer ?></a> 
        <a href="<?php echo site_url('profile/user_profile/'.$organizers['page_url']); ?>" class="org_Link"><i class="glyphicon glyphicon-eye-open"></i>&nbsp; <?php echo view_organizer_profile ?></a>

        <?php if($event_details['add_social_link']==1){ 
            if($event_details['facebook_link']!=""  && $event_details['add_facebook']=="1"){
                ?>
                <a href="http://www.facebook.com/<?php echo $event_details['facebook_link']; ?>" class="org_Link"><i class="iconsSocial icon-FB"></i>&nbsp; <?php echo FACEBOOK_COM.$event_details['facebook_link']; ?></a>
                <?php }
                if($event_details['twitter_link']!=""  && $event_details['add_twitter']=="1"){ ?>
                <a href="http://www.twitter.com/<?php echo $event_details['twitter_link']; ?>" class="org_Link"><i class="iconsSocial icon-TW"></i>&nbsp; <?php echo TWITTER_COM.$event_details['twitter_link']; ?></a>
                <?php }
                } ?>
            </div>
            <div class="event-detail  brdrRadius5 pd15" >
                <?php if($this->session->userdata('user_id') == ''){ 
                    $current_page = getcurrenturl();
                    if ($current_page == "") {
                        $page = base64_encode(getcurrenturl());
                    } else {
                        $page = base64_encode($current_page);
                    }
                    $url = site_url('user/login');
                    $login_url = $url . '/' . $page;
                    ?>
                    <a href="<?php echo $login_url; ?>" class="btn-saveevent forborder"  id="user_event_save<?php echo $save_events_id; ?>"><?php echo SAVE_TO_WATCHLIST; ?></a> 
                    <?php
                } else {
                     if($event_save_count > 0) {?>
                <a href="javascript://" class="btn-saveevent forborder_event rmWatchlist" onclick="save_event_remove('<?php echo $save_events_id; ?>');" id="user_event_save<?php echo $save_events_id; ?>"><?php echo REMOVE_WATCHLIST; ?></a> 

                <?php } else { ?>
                <a href="javascript://" class="btn-saveevent forborder" onClick="save_event('<?php echo $event_details['id']; ?>');" id="user_event_save<?php echo $event_details['id'];?>"><?php echo SAVE_TO_WATCHLIST; ?></a> 
                  <?php } 
                } ?>
                <p id="saveeventInfo"></p>
            </div>

        </div>
      </div>
      <?php /*</div><!-- End container -->*/?>
      <div id="footer_text_html">
        <?php if($footertext!=''){ echo $footertext; }?>
      </div>
    </div>
  </div>
</div>
<!-- End container --> 
</section>
<script>
$(document).ready(function(){
  $('.ticket_price').change(function(){
    var id = $(this).attr('id');
    var idA = id.split('_');
    var value = $(this).val();
    if(value){
      $('#ticket_qty_'+idA[2]).val(1);
    }
  });
});
</script>

