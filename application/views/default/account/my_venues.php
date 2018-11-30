<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/validation.css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.maskedinput.js"></script>
<script src="<?php echo base_url()?>js/jquery.form.js"></script>  
 <script>
  $(function() {
    $( "#birth_date").datepicker({
    	endDate: "date()",
    	format: "yyyy/mm/dd",
		orientation: "top",
		autoclose: true
  	});
  	
  });

 </script>
<style type="text/css">
  div#map {
      position: relative;
      width: 96%;
      margin-left: 15px;
      margin-bottom: 15px;
  }

  div#crosshair {
      position: absolute;
      top: 192px;
      height: 19px;
      width: 19px;
      left: 50%;
      margin-left: -8px;
      display: block;
      background: url(crosshair.gif);
      background-position: center center;
      background-repeat: no-repeat;
  }
</style>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    var map;
    var geocoder;
    var centerChangedLast;
    var reverseGeocodedLast;
    var currentReverseGeocodeResponse;

    function initialize(lat,long) {
        var latlng = new google.maps.LatLng(lat,long);
        var myOptions = {
            zoom: 12,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        geocoder = new google.maps.Geocoder();

        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: "NO title"
        });

    }

</script>
<script type="text/javascript">
  function set_map_center(address){
      var geocoder = new google.maps.Geocoder();
      var mapOptions = { zoom: 13 };
      var markersArray = [];
      var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
      geocoder.geocode({'address': address}, function(results, status) {
          if(status == google.maps.GeocoderStatus.OK) 
          {
               result = results[0].geometry.location;
               console.log(result);
               map.setCenter(result);
               marker = new google.maps.Marker({
                   map: map,
                   position: results[0].geometry.location,
                   animation: google.maps.Animation.BOUNCE,
              });
              markersArray.push(marker);
                       
               
          }
    }); 
  }

  function textEdit()
  {

      var address = '';
   
      address = $('#venue_add1').val();
      
      if($('#venue_add2').val() != ''){
         address += ', '+$('#venue_add2').val();
       }

       if($('#venue_city').val() != ''){
         address += ', '+$('#venue_city').val();
       }

       if($('#venue_state').val() != ''){
         address += ', '+$('#venue_state').val();
       }

       if($('#venue_country').val() != ''){
         address += ', '+$('#venue_country').val();
       }

      set_map_center(address);

  }
  </script>

  
  <script>
  	jQuery(function($){		
		var validator = $("#venue_form").validate({
			rules: {
				venue_name: {
					required: true,	
				},
				venue_add1: {
					required: true,				
				},
				venue_country: {
					required: true,				
				},
				venue_state: {
					required: true,				
				},
				venue_city: {
					required: true,				
				},
				venue_zip: {
					required: true,					
				}
			},
			messages: {
			
				venue_name: {
					required: "<?php echo Venue_name_required;?>",
				},
				
				venue_add1: {
					required: "<?php echo ADDRESS_REQUIRED; ?>",
					
				},
				venue_country: {
					required: "<?php echo COUNTRY_REQUIRED; ?>",
					
				},
				venue_state: {
					required: "<?php echo STATE_REQUIRED; ?>",
					
				},
				venue_city: {
					required: "<?php echo CITY_REQUIRED; ?>",
					
				},
				
				venue_zip: {
					required: "<?php echo ZIP_CODE_REQUIRED; ?>",					 
				}

			},
		});
		
	});
	
  </script>
   
  <?php 
  if(isset($birth_date) && $birth_date=='0000-00-00') {
    $birth_date='';
  }
  ?>
  
    <section>  
            <div class="container">
            	
              <div class="pt">
              
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 test-contct test-cntr">
                		<h1><?php echo MY_ACCOUNT; ?></h1>
                  </div>
                 
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right pt mt10 con-cntr">
                
                	<div class="halfacc">
                	 <p><?php echo SecureShowData($site_setting['site_name']); ?> <?php echo ACCOUNT_SINCE; ?> <span><?php echo datetimeformat($user_info[0]['created_at']);?> <?php echo timeFormat($user_info[0]['created_at']); ?></span></p>
                    </div>
                  </div>
                
              </div><!-- End pt -->
             
                
                <div class="clearfix"></div>
                 <?php if($msg!=''){
                        			?>
                        <div class="alert alert-success mar10"><?php echo $msg; ?></div>
               <?php 	
                     }?>
                     <?php 
                     if(isset($del_msg) && $del_msg!=''){
                        			?>
                        <div class="alert alert-success mar10"><?php echo $del_msg; ?></div>
               <?php 	
                     }?>
                     
                 <div class="alert alert-success mar10" id="jsonsuccess" style="display:none"></div>
                 <div class="alert alert-danger mar10" id="jsonerror" style="display:none"></div>
                 
                <div class="festival pb"></div>
                
                <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12 p0-xs2  pt15 ">
                
                <div class="row">    
                            
                <div class="event-webpage col-xs-12 col-sm-12">
                	<div class="red-event width100 "><h4><?php echo YOUR_ACCOUNT_EMAIL_ADDRESS; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
			
                <div class="col-sm-12 clearfix mb ">
                    <div class="event-detail event-detail2 pt pb40">
                    
                    <div class="col-sm-6 url center-sm">
                    	<p class="p0"><?php echo SecureShowData($user_info[0]['email']);?></p>
                    </div>
                         
                    
                    <div class="col-sm-6 ">
                    	<div class="change center-sm">
                         
                        </div>
                    </div>
                    
                    
                    	
                 	 </div><!-- end event-detail -->
               </div>      
                
              </div><!-- End Row-->         
            
            <?php
            if(!isset($venue_id)||$venue_id==0) {
            	$venue_id='';
            }
            ?>         
                
            <form name="venue_form" id="venue_form" class="event-title"  method="post" action="<?php echo site_url('venues/my_venues/'.$venue_id);?>">
                
         <!-- start Row-->
            
              <!-- 3rd part------>
              <div class="row">    
                            
                <div class="event-webpage col-xs-12 col-sm-12">
                	<div class="red-event width100 "><h4><?php echo VENUES; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
			
                <div class="col-sm-12 clearfix">
                    <div class="event-detail event-detail2 pb">
                    
                    	<br/>
                    
                    <div class="tab-content">
                        
                        	<div class="tab-pane active" id="venue">
                                
                              		<div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo Venue_Name; ?></label><a>*</a>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                           <input type="text" name="venue_name" id="venue_name" value="<?php echo SecureShowData($venue_name);?>">
                                            
                                        </div>
                                    </div>
                                

                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS; ?></label><a>*</a>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                           <input type="text" name="venue_add1" id="venue_add1" value="<?php echo SecureShowData($venue_add1);?>">
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ADDRESS; ?>2</label>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text"  name="venue_add2" id="venue_add2" value="<?php echo SecureShowData($venue_add2);?>">
                                            
                                        </div>
                                    </div>
                                     <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo CITY;?></label><a>*</a>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="venue_city" id="venue_city" value="<?php echo SecureShowData($venue_city);?>">
                                        </div>
                                    </div>

                       
                       				 <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo STATE;?></label><a>*</a>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="venue_state" id="venue_state" value="<?php echo SecureShowData($venue_state);?>">
                                            
                                        </div>                    
                       				</div>
                       				<div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo COUNTRY; ?></label><a>*</a>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" name="venue_country" id="venue_country" value="<?php echo SecureShowData($venue_country);?>">
                                            
                                        </div>
                       				</div>
                                    
                                   
                                    <div class="form-group clearfix">
                                        <div class="col-sm-3 col-xs-12 lable-rite">
                                            <label><?php echo ZIP;?> / <?php echo POSTAL_CODE;?></label><a>*</a>
                                        </div>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" onfocus="textEdit()" name="venue_zip" id="venue_zip" value="<?php echo SecureShowData($venue_zip);?>">
                                        </div>
                                    </div>
                            </div>
                            
                            
                    </div><!-- End tab-content  -->
                    
                 	 </div><!-- end event-detail -->
               </div>      
                	<div class="col-lg-12">
                	 <div style="height: 60px;" class="fr pb">
                    <ul class="save-preview3 clearfix">
                        <?php 
                        if($venue_id==''||$venue_id==0)
                        {
                        ?>
                        <li>
                           	<input type="submit" value="<?php  echo SAVE;?>" class="btn-event2" />
                        </li>
                        <?php
                        } else
                        {?>
                         <li>
                           	<input type="submit" value="<?php echo UPDATE;?>" class="btn-event2" />
                        </li><?php }?>
                    </ul>
                </div>  
                </div>         
              </div><!-- End Row-->                  

              
                
            </form>
<!--Venues list start -->

<div class="row">    
    <body onLoad="initialize(<?php if(isset($lat)){echo $lat;}else{echo '0';}?>,<?php if(isset($long)){echo $long;}else{ echo '0';}?>)">
        <div id="map">
            <div id="map_canvas" style="width:100%; height:300px"></div>
            <div id="crosshair"></div>
        </div>
     
      
    </body>
                <div class="event-webpage col-xs-12 col-sm-12">
                	<div class="red-event width100 "><h4><?php echo VENUES_LIST; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
                	<div class="admin">    
                    </div>
			
                <div class="col-sm-12 clearfix">
                    <div class="event-detail event-detail2 pd15">
                    
                    
                    
                    	<table class="table table_res venues_list_table contct-table">
                        	<thead>
                            	<tr>
                                	<th><?php echo Venue_Name; ?></th>
                                  
                                    <th style="text-align: -webkit-right;"><?php echo Action; ?></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php 
                            	foreach ($user_venues as  $venue) { ?>
                            <tr>                            	
                                <td><?php echo SecureShowData($venue['name']); ?></td>      
                                    <td style="text-align: -webkit-right;" >
                                    <a href="<?php echo site_url('venues/my_venues/'.$venue['id']); ?>" id="edit_multi"><?php echo Edit;?></a>
                                    <?php 
                                      $used_v = $this->account_model->GetAllUsedVenues($venue['id']);

                                      if($used_v['0']['count']<=0){
                                    ?>
                                    <a href="<?php echo site_url('venues/delete_venues/'.$venue['id']);?>" onclick="if(confirm('Are you sure you want to delete this user?')){return true;}else{return false;}">| <?php echo DELETE;?></a>                                    
                                    <?php }else{ ?>
                                    <a href="javascript:void(0);" title="This venue is aleady in used you can not delete">| <i class="glyphicon glyphicon-info-sign"></i></a>                                    
                                    <?php  } ?>
                       				</td>	
                                </tr>
                                <?php

                                }?> 
                                   
                            </tbody>
                            	
                        </table>
                  
                 	 </div><!-- end event-detail -->
               </div>      
                
              </div><!-- End Row-->           
                   
           </div><!-- End col-sm-8 --> 
           <!----start list of user venues------>
    <!-- RIGHT CONTENT -->
                <?php echo $this->load->view('default/common/account_sidebar');?>
               
            </div><!-- End container -->
            <div class="pb"></div>
    </section>
    
    <!-- Start footer -->
    
     <script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
    <script>
    		$(document).ready(function(){
    		  $(".rover_tip").popover();
        });
	</script>
    
    <script>
    		$(document).ready(function(){
    		$(".edit").tooltip();
	});
	</script>
    
<script type="text/javascript">
   
    $(document).ready(function () {
        
        $('#datepicker1').datepicker({
            format: "dd/mm/yyyy",
	           orientation: 'top'
        });

    });
    
</script>