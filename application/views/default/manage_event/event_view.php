<!-- Start of Darshan Code -->
<?php 
$address='';
$currency = getRecordById('currency_codes','id',$event_details['currency_code_id']);
if($event_id!=''){
    
        if($event_venue['venue_add1']!='')
        {   

            $address=$event_venue['venue_add1'];
        }
        if($event_venue['venue_add2']!='')
        {
            if($address!=''){
            $address=$address.','.$event_venue['venue_add2'];
                }else
                {
                    $address=$event_venue['venue_add2'];
                }
        }
        if($event_venue['venue_city']!='')
        {
            if($address!=''){
            $address=$address.','.$event_venue['venue_city'];
                }else
                {
                    $address=$event_venue['venue_city'];
                }
        }
        if($event_venue['venue_state']!='')
        {
            if($address!=''){
            $address=$address.','.$event_venue['venue_state'];
                }else
                {
                    $address=$event_venue['venue_state'];
                }
        }
        if($event_venue['venue_country']!='')
        {
            if($address!='')
            {
                $address=$address.','.$event_venue['venue_country'];
                }else
                {
                    $address=$event_venue['venue_country'];
                }
        }
    }
?>

<!-- End of Darshan Code -->
<style>
    .wid55{
        width: 55% !important;
    }
    #eventDesign.mainBGColor {
 background: <?php echo $back;
?>;
}
#eventDesign .eventTitleColor {
 color: <?php echo $title;
?>;
}
#eventDesign .eventTitleColor a, #eventDesign .eventTitleColor a:hover {
 color: <?php echo $title;
?>;
}
#eventDesign .red-event {
 color: <?php echo $head_text;
?>;
}
#eventDesign .event-detail {
 background: <?php echo $box_back;
?>;
}
#eventDesign .event-detail, #eventDesign .icon-protection {
 color: <?php echo $body_text;
?>;
}
#eventDesign .brdrColor, #eventDesign .event-detail, #eventDesign .red-event, #eventDesign .eventBrdr, #eventDesign .org_Name {
 border-color: <?php echo $box_border;
?>;
}
#eventDesign .linkColor, #eventDesign .org_Link, #eventDesign a, #eventDesign a:hover {
 color: <?php echo $link;
?>;
}
#eventDesign .linkColor:hover, #eventDesign .org_Link:hover, #eventDesign .eventTitleColor a:hover {
    text-decoration: underline;
}
#eventDesign .event-webpage .red-event {
 background-color: <?php echo $box_head;
?>;
}
#eventDesign .btn-event, #eventDesign .btn-saveevent {
 background:<?php echo $body_text;
?>;
 color:<?php echo $box_back;
?>;
}
#eventDesign .btn-event:hover, #eventDesign .btn-saveevent:hover {
 background:<?php echo $body_text;
?>;
 color:<?php echo $box_back;
?>;
    box-shadow: none !important;
}
#eventDesign .passBox input[type="password"] {
 border-color: <?php echo $body_text;
?>;
    box-shadow: none;
}
#eventDesign .red-event {
    border-bottom: 1px solid transparent !important;
}

</style>
<script src="<?php echo base_url()?>js/jquery.form.js"></script> 

<!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="<?php echo base_url();?>js/source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/source/jquery.fancybox.css?v=2.1.5" media="screen" />

    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <script type="text/javascript" src="<?php echo base_url();?>js/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

    <!-- Add Thumbnail helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <script type="text/javascript" src="<?php echo base_url();?>js/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <!-- Add Media helper (this is optional) -->
    <script type="text/javascript" src="<?php echo base_url();?>js/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
    
    <script type="text/javascript" src="<?php echo base_url();?>js/spectrum.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/spectrum.css" />
    
    <script type="text/javascript">
        $(document).ready(function() {
            $(".fancybox").fancybox(
                
            );
        });
    </script>
<script>
$(document).ready(function(){
    $('#recent_attendee').click(function(){
    
        var getStatusUrl= '<?php echo site_url('event/attendees/'.$id)?>';
            $.ajax({
                url: getStatusUrl,
                dataType: 'text',
                type: 'POST',
                timeout: 99999,
                global: false,
                data: '',
                success: function(data)
                { 
                    $('#attend').html(data);
                        
                },      
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                
                }
            });
    });
});

function show(offset){
    //alert(offset);
        var getStatusUrl= '<?php echo site_url('event/list_purchases/'.$id)?>/'+offset;
            $.ajax({
                url: getStatusUrl,
                dataType: 'text',
                type: 'POST',
                timeout: 99999,
                global: false,
                data: '',
                
                success: function(data)
                { 
                //alert(data);
                    $('#order').html(data);
                },      
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                
                }
            });
        }

    function submit_check_form(){
        var chk = true;
        
        $('#orderInfo').text("");
        $('#orderInfo').removeClass("mar10 alert alert-danger");
    
        <?php ?><?php 
        if(count($free_tickets) > 0){
            foreach($free_tickets as $free){
        ?>
            if($("#ticket_qty_<?php echo $free['id']?>").val() > 0){
                chk=false;
            }
        <? }
        } ?>
        
        <?php 
        if(count($paid_tickets) > 0){
            foreach($paid_tickets as $paid){
        ?>
            if($("#ticket_qty_<?php echo $paid['id']?>").val() > 0){
                chk=false;
            }
        <? }
        } ?>
    
        <?php 
        if(count($donation_tickets) > 0){
            foreach($donation_tickets as $donation){
        ?>
            if($("#ticket_price_<?php echo $donation['id']?>").val() > 0){
                chk=false;
            }
        <? }
        } ?><?php ?>
    
         if(chk){
                $('#orderInfo').focus();
                $('#orderInfo').text("<?php echo Invalid_quantity_Please_enter_quantity_of_1_or_more_Or_amount;?>");
                $('#orderInfo').addClass("mar10 alert alert-danger");
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
                //alert();
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
                //alert("asdgjadshgj");
                var url = window.location.href;
                
                //alert(url+'?promo='+a); return false;
                window.location = url+'/?promo='+a; 
                //window.location.reload()
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

    function show_promotional_code(){
        document.getElementById('sdsds').style.display = 'block';
        document.getElementById('promotional_text').style.display = 'none';
    }

    function cancel_event(){
        if(confirm('Are you sure, you want to cancel this event.')){
            document.location.href = "<?php echo site_url('event/cancel_single_event/'.$id)?>";
        }
        return false;
    }
    
    function delete_event(){
        if(confirm('Are you sure, you want to delete this event.')){
            document.location.href = "<?php echo site_url('event/delete_single_event/'.$id)?>";
        }
        return false;
    }
    
</script>


<?php 

if($event_details['active']==1){
            $is_purchase=1;    
        }else{
            $is_purchase=2;
        }

$data1['events_id']=$id;

$event_status = $event_data['active'];
$event_title = $event_data['event_title'];
$venue_id = $event_data['venue_id']; // Darshan
$street_address = $event_data['street_address'];
$event_start_date_time = datetimeformat($event_data['event_start_date_time']);


$is_delete = delete_check($event_status);


?>

<?php $this->load->view('default/common/dashboard-header')?>

<section class="mainBGColor" id="eventDesign">   
    <div class="container marTB50">
        <div class="row">
        <div class="col-md-8 col-sm-12"> 
            <div class="row">
            <div class="event-webpage col-sm-12 pt">
            <div class="red-event">
              <h4><?php echo Ticket_Information;?></h4>
            </div>
            <div class="event-detail pd15">
              <div id="orderInfo"></div>
              <?php /*event tickets start*/ ?>
              <?php 
                                $protect = 1;
                                
                                if($event_details['password_protect']==1 && $event_details['keep_private']==1){
                                    $protect = 1;
                                    if($event_details['password_value']==$event_password){
                                        $protect = 1;
                                    }
                                }
                                
                            ?>
              <?php if($protect == 1){ ?>
              <div  class="event_detail" id="event_detail">
                
                <?php  if (is_array($free_tickets) || is_array($paid_tickets) || is_array($donation_tickets)){ ?>
                <?php
                                    $attributes = array('name'=>'purchase','id'=>'purchase','class'=>'event-title');
                                    echo form_open('event/view/'.$event_url_link,$attributes);  
                                ?>
                <table class="ticket table" id="ticket_table">
                  <thead>
                    <tr>
                      <th class="TW25p"><?php echo Ticket_name;?></th>
                      <th><?php echo Sales_Ends;?></th>
                      <th><?php echo Price;?></th>
                      <th><?php echo Fee;?></th>
                      <?php if($event_details['remaining_tickets'] == 1){ ?>
                      <th><?php echo Available;?></th>
                      <?php }?>
                      <th><?php echo Quantity;?></th>
                    </tr>
                  </thead>
                  <?php /*free event tickets start*/ ?>
                  <tbody>
                    <?php 
                                        $pur_available=0;
                                        $now_date = date('Y-m-d H:i:s');
                                        $hidden=0;
                                        
                                        
                                        
                                        
                                        
                                        
                                        /****************************FREE TICKETS START**********************************/
                                        if($free_tickets){
                                            foreach($free_tickets as $free){
                                                
                                                if($code_type == 2 && isApplicablePromocode($access_codes, $free) == 1){
                                                    $hidden=1;
                                                }
                                                
                                                $available = $free['qty'] - $free['used'];
                                            if  ($free['ticket_status']!=2  || $hidden==1){ 
                                                if($free['ticket_name'] != ''){     
                                    ?>
                    <tr>
                      <td><?php 
                                                if ($access_codes){                             
                                                    $promo_tkts = $access_codes['tickets'];
                                                    
                                                    $promo_tkts_new = explode(',',$promo_tkts);
                                                    if($promo_tkts_new){
                                                        if(in_array($free['id'], $promo_tkts_new)){                                     
                                                            echo SecureShowData($free['ticket_name']);
                                                             if($free['description'] != ''){
                                                            ?>
                        <a href="javascript:" onclick="if($('#<?php echo $free['id']; ?>').val()==1){ $('#desc_<?php echo $free['id']; ?>').hide(); $('#<?php echo $free['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $free['id']; ?>').show(); $('#<?php echo $free['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
                        <input type="hidden" id="<?php echo $free['id']; ?>" value="0" />
                        <div id="desc_<?php echo $free['id']; ?>" style="display: none;"> <?php echo $free['description'];?> </div>
                        <?php  
                                                            } 
                                                        }else {
                                                            if($free['ticket_status']!=2){
                                                                echo SecureShowData($free['ticket_name']);
                                                                if($free['description'] != ''){
                                                                ?>
                        <a href="javascript:" onclick="if($('#<?php echo $free['id']; ?>').val()==1){ $('#desc_<?php echo $free['id']; ?>').hide(); $('#<?php echo $free['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $free['id']; ?>').show(); $('#<?php echo $free['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
                        <input type="hidden" id="<?php echo $free['id']; ?>" value="0" />
                        <div id="desc_<?php echo $free['id']; ?>" style="display: none;"> <?php echo $free['description'];?> </div>
                        <?php  
                                                                } 
                                                            }
                                                        }                           
                                                            
                                                    }
                                                
                                                } else {
                                                    if($free['ticket_status']!=2  || $hidden==1 ){
                                                        echo SecureShowData($free['ticket_name']);
                                                         if($free['description'] != ''){
                                                            ?>
                        <a href="javascript:" onclick="if($('#<?php echo $free['id']; ?>').val()==1){ $('#desc_<?php echo $free['id']; ?>').hide(); $('#<?php echo $free['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $free['id']; ?>').show(); $('#<?php echo $free['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
                        <input type="hidden" id="<?php echo $free['id']; ?>" value="0" />
                        <div id="desc_<?php echo $free['id']; ?>" style="display: none;"> <?php echo $free['description'];?> </div>
                        <?php  
                                                         } 
                                                    }                           
                                                }
                                                    
                                                ?></td>
                      <td><?php 
                                                if($free['end_sale'] != '' && $free['end_sale'] !== '0000-00-00 00:00:00') {
                                                      if ($access_codes){                                   
                                                        $promo_tkts = $access_codes['tickets'];
                                                          $promo_tkts_new = explode(',',$promo_tkts);
                                                        if($promo_tkts_new){
                                                            
                                                            if(in_array($free['id'], $promo_tkts_new)){                                         
                                                                    echo date($site_setting['date_time_format'],strtotime($free['end_sale']));                                          
                                                            } else {
                                                                if($free['ticket_status']!=2 ){                                         
                                                                    echo date($site_setting['date_time_format'],strtotime($free['end_sale']));
                                                                }
                                                            }                                   
                                                        }
                                                        
                                                      } else {
                                                            echo date($site_setting['date_time_format'],strtotime($free['end_sale']));                    
                                                      }
                                                } 
                                                ?></td>
                      <td><?php if  ($paid['ticket_status']!=2  || $hidden==1){ echo Free; }?></td>
                      <td><?php if  ($paid['ticket_status']!=2  || $hidden==1){ echo Free; }?></td>
                      <?php if($event_details['remaining_tickets'] == 1){ ?>
                      <td><?php  
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
                                                    if  ($paid['ticket_status']!=2  || $hidden==1){
                                                    echo $available.'/'.$free['qty'];     
                                                    }                  
                                                }   
                                            ?></td>
                      <?php } ?>
                      <td><?php
                
                                                if($free['end_sale']=='' || $free['end_sale'] < $now_date || $free['start_sale'] > $now_date || $event_details['event_end_date_time'] < $now_date || $is_purchase==2 ) {
                                                    echo N_A;
                                                    $free_ids=$free['id'];
                                                    echo '<input type="hidden"  name="ticket_qty['.$free_ids.']" id="ticket_qty_'.$free_ids.'"/>';
                                                } else {                                                
                                                        
                                                    if ($free['min_purchase']=='' || $free['min_purchase']==0){
                                                        $free['min_purchase']=$site_setting['min_purchase_allowed'];
                                                    }else {
                                                        $paid['min_purchase']=$site_setting['min_purchase_allowed'];
                                                    }
                                                    
                                                    if ($free['max_purchase']=='' || $free['max_purchase']==0){
                                                        $free['max_purchase']=$site_setting['max_purchase_allowed'];
                                                    }
                                                    
                                                    if ($available >= $free['min_purchase']){
                                                        $pur_available=1;
                                                    
                                                        
                                                        if($available >= $free['max_purchase'] && $free['max_purchase']>0){
                                                            $available = $free['max_purchase'];
                                                        }
                                                        
                                           if  ($paid['ticket_status']!=2  || $hidden==1){ ?>
                        <div class="posrel">
                          <select name="ticket_qty[<?php echo $free['id'] ?>]" id="ticket_qty_<?php echo $free['id'] ?>" class="select-pad">
                            <option value="0">0</option>
                            <?php 
                                                            for($i = $free['min_purchase']; $i<=$available; $i++){
                                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                                            }
                                                            ?>
                          </select>
                          <div class="clear"></div>
                        </div>
                        <?php }
                                                    } else {
                                                        if  ($paid['ticket_status']!=2  || $hidden==1){
                                                        echo Sold_Out;
                                                                        $free_ids=$free['id'];
                                                                        echo '<input type="hidden"  name="ticket_qty['.$free_ids.']" id="ticket_qty_'.$free_ids.'"/>';
                                                        }  
                                                    }
                                                }
                                            ?></td>
                    </tr>
                    <?php }
                                                }
                                            }
                                        }
                                    ?>
                    <?php /****************************FREE TICKETS END**********************************/ ?>
                    <?php /****************************PAID TICKETS START**********************************/ ?>
                    <?php 
                                    if($paid_tickets){
                                            foreach($paid_tickets as $paid){
                                                
                                                if($code_type == 1 && isApplicablePromocode($disc_codes, $paid) == 1){
                                                    $hidden=1;
                                                }
                                                
                                                if($code_type == 2 && isApplicablePromocode($access_codes, $paid) == 1){
                                                    $hidden=1;
                                                }
                                                
                                                $available = $paid['qty'] - $paid['used'];
                                        if  ($paid['ticket_status']!=2  || $hidden==1){     
                                                if($paid['ticket_name'] != ''){     
                                    ?>
                    <tr>
                      <td><?php 
                                                if($disc_codes){
                                                    
                                                    $promo_tkts = $disc_codes['tickets'];
                                                    
                                                    $promo_tkts_new = explode(',',$promo_tkts);
                                                    
                                                    
                                                    if($promo_tkts_new && $paid['ticket_status'] != 2){
                                                    
                                                        if(in_array($paid['id'], $promo_tkts_new)){
                                                                                                                
                                                            echo SecureShowData($paid['ticket_name']);
                                                            
                                                            if($disc_codes['disc_amt']!=0)
                                                        {       
                                                                echo '<br /> ('.Discounted.set_event_currency($disc_codes['disc_amt'], $event_details['currency_code_id']).')';                                                             
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
                                                    
                                                if($paid['description'] != ''){
                        if($paid['ticket_status']!=2  || $hidden==1){ ?>
                        <a href="javascript:" onclick="if($('#<?php echo $paid['id']; ?>').val()==1){ $('#desc_<?php echo $paid['id']; ?>').hide(); $('#<?php echo $paid['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $paid['id']; ?>').show(); $('#<?php echo $paid['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
                        <input type="hidden" id="<?php echo $paid['id']; ?>" value="0" />
                        <div id="desc_<?php echo $paid['id']; ?>" style="display: none;"> <?php echo SecureShowData($paid['description']);?> </div>
                        <?php
                                                                                }
                                                                              
                                                                                ?>
                        <?php  } ?></td>
                      <td><?php 
                                                
                                                    
                                                      if($disc_codes){
                                                        $promo_tkts = $disc_codes['tickets'];
                                                          
                                                          $promo_tkts_new = explode(',',$promo_tkts);
                                                          
                                                        if ($promo_tkts_new && $paid['ticket_status']!= 2){
                                                        
                                                            
                                                            if(in_array($paid['id'], $promo_tkts_new)){ 
                            
                                                                    if($disc_codes['end_date_time']!='' && $disc_codes['end_date_time']!='0000-00-00 00:00:00'){
                                                                        
                                                                         echo date($site_setting['date_time_format'],strtotime($disc_codes['end_date_time']));
                                                                    } else {
                                                                        
                                                                            echo date($site_setting['date_time_format'],strtotime($paid['end_sale']));  
                                                                            
                                                                            
                                                                    }
                                                            } else {
                                                                                                
                                                                if($paid['end_sale'] != '' && $paid['end_sale'] !== '0000-00-00 00:00:00'){
                                                                    echo date($site_setting['date_time_format'],strtotime($paid['end_sale']));  
                                                                }
                                                            
                                                            }                               
                                                        }
                                                      }
                                                      elseif ($access_codes){                                   
                                                        $promo_tkts = $access_codes['tickets'];
                                                          $promo_tkts_new = explode(',',$promo_tkts);
                                                        if($promo_tkts_new){
                                                            
                                                            if(in_array($paid['id'], $promo_tkts_new)){ 
                
                                                                if($access_codes['end_date_time']!=''){ 
                                                                    echo date($site_setting['date_time_format'],strtotime($access_codes['end_date_time']));                                  
                                                                     
                                                                } else {
                                                                    echo date($site_setting['date_time_format'],strtotime($paid['end_sale']));  
                                                                }
                                                                
                                                            } else {
                                                                
                                                                if($paid['ticket_status']!=2 && $paid['end_sale'] != '' && $paid['end_sale'] !== '0000-00-00 00:00:00'){
                                                                    echo date($site_setting['date_time_format'],strtotime($paid['end_sale']));  
                                                                }
                                                                
                                                            }                                   
                                                        }
                                                      }
                                                       else {
                                                        if  ($paid['ticket_status']!=2  || $hidden==1){
                                                            echo date($site_setting['date_time_format'],strtotime($paid['end_sale']));                    
                                                        }
                                                      }
                                              
                                                ?></td>
                      <td><?php
                                                if($disc_codes){
                                                    $promo_tkts = $disc_codes['tickets'];
                                                    
                                                    $promo_tkts_new = explode(',',$promo_tkts);
                                                
                                                    if($promo_tkts_new && $paid['ticket_status']!= 2){
                                                        
                                                        if(in_array($paid['id'], $promo_tkts_new)){
                                                            
                
                                                            if($disc_codes['disc_amt']!='' && $disc_codes['disc_amt'] > 0 ){
                                                                
                                                                
                                                                $paid['price'] = $paid['price'] - $disc_codes['disc_amt'];
                                                                
                                                                echo set_event_currency($paid['price'], $event_details['currency_code_id']);
                                                                
                                                                
                                                            } elseif($disc_codes['disc_perc']!='' && $disc_codes['disc_perc'] > 0 && $disc_codes['disc_perc'] < 100 ){
                                                                 
                                                                $perc = (($paid['price'] * $disc_codes['disc_perc']) / 100);
                                                                $paid['price'] = $paid['price']- $perc;
                                                                echo set_event_currency($paid['price'], $event_details['currency_code_id']);
                                                                    
                                                            }elseif($disc_codes['disc_perc'] == 100){
                                                                echo Free;
                                                            }
                                                        } else {
                                                                                            
                                                            echo set_event_currency($paid['price'], $event_details['currency_code_id']);
                                                            
                                                        }                                   
                                                    } 
                                                        
                                                } elseif($access_codes){  
                                                    $promo_tkts = $access_codes['tickets'];
                                                    
                                                    $promo_tkts_new = explode(',',$promo_tkts);
                                            
                                                    if($promo_tkts_new){
                                                        
                                                        if(in_array($paid['id'], $promo_tkts_new)){
                                                            echo set_event_currency($paid['price'], $event_details['currency_code_id']);
                                                        }else{
                                                            if($paid['ticket_status']!=2  ){  
                                                                echo set_event_currency($paid['price'], $event_details['currency_code_id']);
                                                            }
                                                            
                                                        }
                                                    }
                                                } else {
                                                    if  ($paid['ticket_status']!=2  || $hidden==1){
                                                    echo set_event_currency($paid['price'], $event_details['currency_code_id']);
                                                }

                                                }
                                             ?></td>
                      <td><?php 
                                                $paid_ticket_flat_fee =  $site_setting['paid_ticket_flat_fee'];
                                                $payment_gateway_flat_fee =  $currency['payment_gateway_flat_fee'];
                                                $paid['fee']=$paid['fee']+$paid_ticket_flat_fee + $payment_gateway_flat_fee;
                                                if($disc_codes){
                                                   $promo_tkts = $disc_codes['tickets'];
                                                   
                                                   $promo_tkts_new = explode(',',$promo_tkts);
                                                   
                                                    if($promo_tkts_new && $paid['ticket_status']!= 2){
                                                            
                                                        if(in_array($paid['id'], $promo_tkts_new)){ 
                                                               if (($event_details['event_pass_fees']==1) || ($event_details['event_pass_fees']==3 && $paid['service_fee']==1)) {
                                                                   if($disc_codes['disc_perc']!= '' && $disc_codes['disc_perc'] == 100){
                                                                        echo Free;
                                                                   } else {
                                                                    $perc = (($paid['price']  * $disc_codes['disc_perc']) / 100);
                                                                    $paid['price'] = $paid['price'] - $perc;
                                                                    $paid['fee'] = (($paid['price']  * $site_setting['paid_ticket_fee']) / 100);                                        
                                                                    echo set_event_currency($paid['fee'], $event_details['currency_code_id']);
                                                                   }    
                                                               } else {
                                                                echo set_event_currency(0, $event_details['currency_code_id']);
                                                               }
                                                        } else {
                                                            echo set_event_currency($paid['fee'], $event_details['currency_code_id']);
                                                        }                                   
                                                    }           
                                               } elseif($access_codes){  
                                                    $promo_tkts = $access_codes['tickets'];
                                                    
                                                    $promo_tkts_new = explode(',',$promo_tkts);
                                                
                                                    if($promo_tkts_new){
                                                        if(in_array($paid['id'], $promo_tkts_new)){                                         
                                                            if(($event_details['event_pass_fees']==1) || ($event_details['event_pass_fees']==3 && $paid['paid_service_fee']==1)) {
                                                                echo set_event_currency($paid['fee'], $event_details['currency_code_id']);
                                                            } else {
                                                                echo set_event_currency(0, $event_details['currency_code_id']);
                                                            }       
                                                        } else {
                                                            if($paid['ticket_status']!=2){
                                                                echo set_event_currency($paid['fee'], $event_details['currency_code_id']);
                                                            }
                                                        }                               
                                                    }   
                                               } else {
                                                     if(($event_details['event_pass_fees']==1) || ($event_details['event_pass_fees']==3 && $paid['service_fee']==1)){
                                                        if  ($paid['ticket_status']!=2  || $hidden==1){
                                                        echo set_event_currency($paid['fee'], $event_details['currency_code_id']);
                                                    }

                                                     } else {
                                                        if  ($paid['ticket_status']!=2  || $hidden==1){
                                                        echo set_event_currency(0, $event_details['currency_code_id']);
                                                    }
                                                     }
                                               }
                                               ?></td>
                      <?php if($event_details['remaining_tickets'] == 1){ ?>
                      <td><?php  
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
                                                    if  ($paid['ticket_status']!=2  || $hidden==1){
                                                    echo $available.'/'.$paid['qty'];              
                                                    }         
                                                }   
                                            ?></td>
                      <?php } ?>
                      <td><?php
                                                if($paid['end_sale']=='' || $paid['end_sale'] < $now_date || $paid['start_sale'] > $now_date || $event_details['event_end_date_time'] < $now_date || $is_purchase==2) {
                                                    echo N_A;
                                                    $paid_ids = $paid['id'];
                                                    echo '<input type="hidden"  name="ticket_qty['.$paid_ids.']" id="ticket_qty_'.$paid_ids.'"/>';
                                                } else {                                                
                                                        
                                                    $paid['min_purchase']=$site_setting['min_purchase_allowed'];
                                                    
                                                    if ($paid['max_purchase']=='' || $paid['max_purchase']==0){
                                                        $paid['max_purchase']=$site_setting['max_purchase_allowed'];
                                                    }
                                                    
                                                    if ($available >= $paid['min_purchase']){
                                                        $pur_available=1;
                                                    
                                                        
                                                        if($available >= $paid['max_purchase'] && $paid['max_purchase']>0){
                                                            $available = $paid['max_purchase'];
                                                        }
                                       if  ($paid['ticket_status']!=2  || $hidden==1){     ?>
                        <div class="posrel">
                          <select name="ticket_qty[<?php echo $paid['id'] ?>]" id="ticket_qty_<?php echo $paid['id'] ?>" class="select-pad">
                            <option value="0">0</option>
                            <?php 
                                                            for($i = $paid['min_purchase']; $i<=$available; $i++){
                                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                                            }
                                                            ?>
                          </select>
                          <div class="clear"></div>
                        </div>
                        <?php }
                                                    } else {
                                                        if  ($paid['ticket_status']!=2  || $hidden==1){
                                                        echo Sold_Out;
                                                                        $paid_ids = $paid['id'];
                                                                        echo '<input type="hidden"  name="ticket_qty['.$paid_ids.']" id="ticket_qty_'.$paid_ids.'"/>';
                                                                    }
                                                    }  
                                                }
                                            ?></td>
                    </tr>
                    <?php }
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
                    if  ($donation['ticket_status']!=2  || $hidden==1){                         
                                                if($donation['ticket_name'] != ''){     
                                    ?>
                    <tr>
                      <td><?php 
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
                                                    
                                                if($donation['description'] != ''){
                                                                                
                                                                                if($donation['ticket_status']!=2  || $hidden==1){ ?>
                        <a href="javascript:" onclick="if($('#<?php echo $donation['id']; ?>').val()==1){ $('#desc_<?php echo $donation['id']; ?>').hide(); $('#<?php echo $donation['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $donation['id']; ?>').show(); $('#<?php echo $donation['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
                        <input type="hidden" id="<?php echo $donation['id']; ?>" value="0" />
                        <div id="desc_<?php echo $donation['id']; ?>" style="display: none;"> <?php echo SecureShowData($donation['description']);?> </div>
                        <?php
                                                                                }
                                                                            
                                                ?>
                        <?php  } ?></td>
                      <td><?php 
                                                if($donation['end_sale'] != '' && $donation['end_sale'] !== '0000-00-00 00:00:00') {
                                                      if ($access_codes){                                   
                                                        $promo_tkts = $access_codes['tickets'];
                                                          $promo_tkts_new = explode(',',$promo_tkts);
                                                        if($promo_tkts_new){
                                                            
                                                            if(in_array($donation['id'], $promo_tkts_new)){                                         
                                                                echo date($site_setting['date_time_format'],strtotime($donation['end_sale']));                                          
                                                            } else {
                                                                if($donation['ticket_status']!=2 ){                                                     
                                                                    echo date($site_setting['date_time_format'],strtotime($donation['end_sale']));
                                                                }
                                                            }                                   
                                                        }
                                                        
                                                      } else {
                                                        if  ($paid['ticket_status']!=2  || $hidden==1){
                                                            echo date($site_setting['date_time_format'],strtotime($donation['end_sale']));                    
                                                        }
                                                      }
                                                } 
                                                ?></td>
                      <td><?php 
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
                                                    if  ($paid['ticket_status']!=2  || $hidden==1){
                                                   echo N_A;
                                               }
                                                } 
                                            ?></td>
                      <td><?php 
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
                                                    if  ($paid['ticket_status']!=2  || $hidden==1){
                                                   echo N_A;
                                               }
                                                } 
                                            ?></td>
                      <?php if($event_details['remaining_tickets'] == 1){ ?>
                      <td><?php  
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
                                                    if  ($paid['ticket_status']!=2  || $hidden==1){
                                                    echo $available.'/'.$donation['qty'];          
                                                    }             
                                                }   
                                            ?></td>
                      <?php } ?>
                      <td><?php
                                                if($donation['end_sale']=='' || $donation['end_sale'] < $now_date || $donation['start_sale'] > $now_date || $event_details['event_end_date_time'] < $now_date  || $is_purchase==2) {
                                                $donation_id = $donation['id'];
                                                    echo N_A;
                                                    echo '<input type="hidden"  name="ticket_qty['.$donation_id.']" id="ticket_qty_'.$donation_id.'"/>';
                                                    echo '<input type="hidden"  name="ticket_price['.$donation_id.']" id="ticket_price_'.$donation_id.'"/>';
                                                } else {                                                
                                                    if ($available > 0){
                                                        $pur_available=1;
                                                        $donation_id = $donation['id'];
                                                    
                                                        echo Enter_Amount.'('.getCurrencySymbol($id).')<br /> 
                                                        <input type="hidden"  name="ticket_qty['.$donation_id.']" id="ticket_qty_'.$donation_id.'"/>
                                                        <input type="text"  name="ticket_price['.$donation_id.']" id="ticket_price_'.$donation_id.'"/>';
                                                    } else {
                                                        if  ($paid['ticket_status']!=2  || $hidden==1){
                                                        echo Sold_Out;
                                                                        $donation_id = $donation['id'];
                                                                               echo  '<input type="hidden"  name="ticket_qty['.$donation_id.']" id="ticket_qty_'.$donation_id.'"/>';
                                                                               echo '<input type="hidden"  name="ticket_price['.$donation_id.']" id="ticket_price_'.$donation_id.'"/>';
                                                                           } 
                                                    }  
                                                }
                                            ?></td>
                    </tr>
                    <?php }
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
                
                <!--  setting up return url if registratoin time gets over.  -->
                
                <input type="hidden" name="return_url" id="return_url" value="<?php if($msg != '') { echo str_replace('/'.$msg,'',getcurrenturl()); } else { echo getcurrenturl();}?>" />
                <!--  end of retun url   -->
                
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
                if($pur_available==1)
                                { ?>
                
              </div>
              <?php  if(check_user_authentication()=='')
                            { 
                                
                                        $page_url=base64_encode(getcurrenturl());
                            ?>
              <div class="form-group clearfix MarB5 fr"> <strong><?php echo Login_first_to_buy_tickets; ?></strong> <a href="<?php echo site_url('home/login/'.$page_url); ?>"  class="btn-event"><?php echo Login;?></a> </div>
              <div class="clear"></div>
              <?php } 
                            else 
                            { ?>
              <div class="form-group clearfix fr"> <a href="javascript:" id="buy_btn" onclick="submit_check_form();" ondblclick="this.preventDefault();" class="btn-event"><?php echo Buy_Tickets;?></a> </div>
              <?php  $promotional_codes = getAllPromotionalCode($event_details['id']); ?>
              
              <!--Rahul Added -->
              <?php 
                                                    $promo = $this->input->get('promo');
                                                    if($promotional_codes && $is_purchase==1 && $code_type==0 && $protect==1)
                                                {?>
              <div> <a href="javascript:void(0);" onclick="show_promotional_code();" id="promotional_text">Click here to enter promotional code</a> </div>
              <div class="event_detail" id="sdsds" style="display: none;">
                <?php 
                                
                               
                                
                                if($code_type==0 && count($promotional_codes) > 0){
                                         
                                    $attributes = array('name'=>'promocode','id'=>'promocode','class'=>'event-title','method'=>'get');
                                    echo form_open('manage_event/form_widget/'.$event_url_link,$attributes);    
                                    
                                ?>
                
                <div class="form-group clearfix">
                  <div class="col-xs-12 wth43">
                    <label><?php echo Enter_promotional_code_here_if_you_have; ?><span>&#42;</span></label>
                  </div>
                  <div class="col-sm-4 col-xs-12">
                    <input type="text" name="promo" id="promo" value=""  />
                    <span id="promotional_codeInfo" class="error"></span> </div>
                  <div class="col-sm-2 col-xs-12 fr">
                    <input type="submit"  value="Apply" class="btn-event fr"/>
                  </div>
                </div>
                <div class="clear"></div>
                            <?php if($this->uri->segment('2')!='theme'){ ?> </form> <?php } ?>
                <?php }    ?>
              </div>
              <?php  
                                                }
                                                ?>
                                                <div style="clear: both;">
                        <label>Copy & paste this code for use on your website</label>
                        <div class="event-title">
                            <textarea readonly="readonly" style="width: 100%; height: 75px; font-size: 14px; line-height:20px;" onclick="this.select()"><div id="widgets"></div><iframe src="<?php echo site_url('manage_event/customform_new/'.$event_details['event_url_link']); ?>" title="MyForm" allowtransparency="true" id="formwidget" scrolling = "off" style="width: 100%;height: 100%;" target="_blank" frameBorder = “0”></iframe></textarea>
                        </div>
                        </div>
              <div class="clear"></div>
              <?php } 
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
                                    echo form_open('event/view/'.$event_url_link,$attributes);  
                                    
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
                        <input type="password" id="event_password" name="event_password" placeholder="<?php echo Enter_Password;?>" value="<?php echo $event_password; ?>" />
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
          <!-- end outer div of form tag-->
          
          <?php } ?>
        </div>
        
        </div>
        
            </div>
        </div>
        
        
        <!-- RIGHT CONTENT -->
       <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
        </div>
        
    </div><!-- End container -->
</section>
