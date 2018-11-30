 <table id="header">
   <tr>
     <td id="text" align="center" colspan="2">Print and bring this ticket with you.</td>
   </tr>
   <tr>
      <td align="left" id="eventtitle" width="70%">
       <?php echo SecureShowData($event_title);?>
       </td>
         <td align="right">
       
        <img src="<?php echo base_url().'images/'.$site_logo;?>" alt="" style="float:right; margin-top:25px;margin-bottom: 30px;">      </td>
   </tr>
   <tr> 
   <td colspan="2">
   <table id="paymetdetail" style="clear:both;" cellpadding="0" cellspacing="0">
   <tr >
     <td style="padding: 20px;font-weight: bold;font-family: arial;color: #919191;border-bottom: 2px solid #fff;">Date+Time :</td>
     <td style="font-size: 16px;font-family: arial;color:#000000;border-bottom: 2px solid #fff;"><?php echo datetimeformat($ticket_date); ?> <?php echo timeFormat($ticket_date); ?></td>
   </tr>
   <tr style="background-color:#f5f5f5;">
     <td style="padding: 20px;font-weight: bold;font-family: arial;color: #919191;border-bottom: 2px solid #fff;">Location :</td>
     <td style="font-size: 16px;font-family: arial;color:#000000;border-bottom: 2px solid #fff;"><?php echo SecureShowData($event_address);?></td>  
   </tr>
   <tr>
     <td style="padding: 20px;font-weight: bold;font-family: arial;color: #919191;border-bottom: 2px solid #fff;">Payment Status :</td>
     <td style="font-size: 16px;font-family: arial;color:#000000;border-bottom: 2px solid #fff;"><?php echo $ticket_type;?></td>  
   </tr>
   <tr style="background-color:#f5f5f5;">
     <td style="padding: 20px;font-weight: bold;font-family: arial;color: #919191;border-bottom: 2px solid #fff;">Ticket Quantity :</td>
     <td style="font-size: 16px;font-family: arial;color:#000000;border-bottom: 2px solid #fff;"><?php echo $ticket_qty;?></td>  
   </tr>
   <tr style="background-color:#f5f5f5;">
     <td style="padding: 20px;font-weight: bold;font-family: arial;color: #919191;border-bottom: 2px solid #fff;">Order Number :</td>
     <td style="font-size: 16px;font-family: arial;color:#000000;border-bottom: 2px solid #fff;"><?php echo $order_number;?></td>  
   </tr>
   <tr>
     <td style="padding: 20px;font-weight: bold;font-family: arial;color: #919191;border-bottom: 2px solid #fff;">Order Info :</td>
     <td style="font-size: 16px;font-family: arial;color:#000000;border-bottom: 2px solid #fff;"><?php echo 'Ticket #'.$purchase_id.' by '.$buyer_name. ' on '.datetimeformat($purchase_date).' '.timeFormat($purchase_date);?></td>  
   </tr>
 </table>
    </td>
    </tr>
    
    <tr>
     <td colspan="2" width="100%" align="center">
      <table style="width:90%;margin-top: 25px;" cellpadding="0" cellspacing="0" width="90%" align="center">
       <tr>
        <td align="left" width="50%"><img src="<?php echo $qrcode_file;?>" alt=" "></td>
        <td align="right"><img src="<?php echo $barcode_file;?>" alt=" "></td>
       </tr> 
      </table>  
     </td>
    </tr>
    <tr>
    <td style="text-align:center;color:#000000;border-bottom: 2px solid #e3e3e3;padding-top: 25px;font-size:20px;font-width:bold" height="100" width="100%" valign="top" colspan="2">
    <?php if($pdf_msg!=''){ echo SecureShowData($pdf_msg); }else{ echo PLEASE_PRINT_AND_BRING_YOUR_TICKETS_TO_THE_EVENT_ENTRANCE; } ?>
    </td>
    </tr>
    <tr>
    <td colspan="2" width="100%">
     <table style="width:100%" cellpadding="0" cellspacing="0" align="left">
      <tr>
       <td align="left" width="70%" style="float:left"><img src="<?php echo base_url().'images/'.$site_logo;?>" alt=""></td>
       <td style="padding-top:10px;float:right" width="20%" align="right">
          <p style="font-size: 20px;font-family: arial;color: #000000;margin-top:0;margin-bottom: 6px;text-align:right;"><?php echo DO_ORGANIZE_EVENTS;?></p>
          <p style="font-size: 12px;font-family: arial;font-weight: bold;color: #000000;margin-top:0;margin-bottom: 6px;float:right;"><?php echo JOIN_OUR_TEAM_NOW;?></p>
          <p style="font-size: 12px;color: #989898;font-family: arial;margin-top:0;margin-bottom: 6px;float:right; clear:right;margin-bottom: 25px;"><?php echo site_url();?></p>
       </td>
      </tr>
     </table>
     </td> 
    </tr>
 </table>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p><p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p><p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p><p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>