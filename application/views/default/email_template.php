<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta content="en-us" http-equiv="Content-Language">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Delicious Mail 2</title>
<style>
 body {
	padding:0px;
	margin:0px;
	background:	#eeeeee; 
}
</style>
</head>

<body link="#777777" vlink="#777777">
<table id="container" align="center" cellpadding="0" cellspacing="0" style="width: 100%; margin:0; padding:0; background-color:#eeeeee;">
	
	<!-- Start of main container -->
	<tr>
		<td style="padding:0 20px;">
		
			<!--Start of Logo and view online | forward links--><!--End of Logo and view online | forward links-->
			
			<!-- Start of letter container  -->
			<table width="620" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; text-align:left; font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:12px; line-height:15pt; color:#999999; margin:0 auto;">
				<tr>
				  <td  height="5" style="font-size:2px; line-height:0px; height:20px;" valign="top">&nbsp;</td>
			  </tr>
				<tr>
					<td bgcolor="#323232"  height="5" style="font-size:2px; line-height:0px;" valign="top">
						<table width="620" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border-spacing: 0; margin:0; padding:0; line-height:0px;">
							<tr>
								<td valign="top" height="5" width="5" style="font-size:2px; line-height:0px;"><img alt="" height="5" src="<?php echo base_url();?>images/borderTopLeft4.gif" width="5" align="right" vspace="0" hspace="0" border="0" style="display:block;"></td>
								<td valign="top" height="5" width="610" style="font-size:2px; line-height:0px;"></td>
								<td valign="top" height="5" width="5" style="font-size:2px; line-height:0px;"><img alt="" height="5" src="<?php echo base_url();?>images/borderTopRight4.gif" width="5" align="right" vspace="0" hspace="0" border="0" style="display:block;"></td>
							</tr>
						</table>
					</td>
				</tr>
				
				<!--Start of header - row#1 -->
				<tr>
					<td bgcolor="#f4f4f4" style="padding:15px 20px 22px 20px; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:15pt; color:#999999;">
						
						<table width="580" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; text-align:left; font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:12px; line-height:15pt; color:#999999; margin:0 auto;">
							<tr>
                                <td width="50" valign="middle" style="padding:0 20px 0 0; "><span style="color:#ffffff; padding:20px 0;"><img align="left" border="0" vspace="0" hspace="0" alt="Logo" width="240px" src="<?php echo base_url().'images/'.$site_setting['site_logo'];?>"></span></td>
							</tr>
						</table>
						
					</td>
				</tr>
				<tr>
					<td valign="bottom" bgcolor="#323232" height="6" style="font-size:2px; line-height:0px; padding:0 0 0 39px;">
					<img alt="" height="6" src="<?php echo base_url();?>images/arrowUp.gif" width="12" align="left" vspace="0" hspace="0" border="0" style="display:block;"></td>
				</tr>
				<!--End of header - row#1 -->
				
				<!--Start of text content - row#2-->
				<tr>
				<td bgcolor="#FFFFFF" style="padding:15px 20px; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:15pt; color:#999999;" valign="top">
					<?php echo SecureShowData($message_new);?>
                     </td>
					
				</tr>
				
				
				<!--Start of footer container-->
				<tr>
					<td bgcolor="#f4f4f4" style="padding:17px 20px 12px 20px; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:15pt; color:#999999; border-top:1px #eee dashed;"><span style="padding:0 0 10px 0; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:100%; color:#999999;"><a href="<?php echo site_url('search');?>" target="_blank" style="text-decoration:none; color:#e0336b;"><?php echo FIND_EVENTS;?></a> &nbsp;|&nbsp; <a href="<?php echo site_url('event/create_event');?>" target="_blank" style="text-decoration:none; color:#e0336b;"><?php echo CREATE_AN_EVENT;?></a></span></td>
				</tr>
				<!--End of footer container-->
				
				<tr>
					<td bgcolor="#f4f4f4"  height="5" style="font-size:2px; line-height:0px;" valign="bottom">
						<table width="620" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border-spacing: 0; margin:0; padding:0; line-height:0px;">
							<tr>
								<td valign="top" height="5" width="5" style="font-size:2px; line-height:0px;"></td>
								<td valign="top" height="5" width="610" style="font-size:2px; line-height:0px;"></td>
								<td valign="top" height="5" width="5" style="font-size:2px; line-height:0px;"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
                        <td height="20" style="font-size:2px; line-height:2px;"><img alt="" height="20" src="<?php echo base_url();?>images/shadow620.gif" width="620" border="0" style="display:block;"></td>
				</tr>
				<tr>
				  <td height="20" style="font-size:2px; line-height:2px;">&nbsp;</td>
			  </tr>
			</table>
			<!-- End of letter container  -->
						
			<!--Start of company details and unsubscribe link--><!--End of company details and unsubscribe link-->
		</td>
	</tr>
	<!-- End of main container -->
</table>
</body>
</html>
