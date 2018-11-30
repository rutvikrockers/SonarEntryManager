 <?php 
$location_address = $this->input->cookie('location');
if($this->input->get('location')!='')
{
        $new_val = $this->input->get('location');
        $this->input->set_cookie('location',$new_val,86500);
        $new_location_address = $this->input->cookie('location');
        $search_location = $new_location_address;                   
}else
{
    $search_location = $this->input->cookie('location');
}

$site_image = site_setting();
$site_logo =  $site_image['site_logo'];
$site_logo_hover =  $site_image['site_logo_hover'];
                ?>
<script type="text/javascript">
  $(document).ready(function(){
  $('#logo').hover(function(){
   $('#logo').attr('src','<?php echo base_url(); ?>images/<?php echo $site_logo_hover;?>');
    },function(){
    $('#logo').attr('src','<?php echo base_url(); ?>images/<?php echo $site_logo;?>');
  });
}); 
    
</script>

<script type="text/javascript">
$( document ).ready(function() {
    $("#topsearch").focusin(function(e) {
        $("#topsearch_ajax").slideToggle();
		if($('#topsearch_category').css('display')=='none'){ $('#topsearch_category').slideToggle();  }		
        e.stopPropagation();
    });

    $(document).click(function(e) {
        if (!$(e.target).is('#topsearch, #topsearch_ajax *')) {
			if($('#topsearch_ajax').css('display')=='block'){ $('#topsearch_ajax').slideToggle();  } 
        }
		
    });
	
	$('#topsearch_location').focusin(function(e) {
        if($('#topsearch_category').css('display')=='block'){ 
				$('#topsearch_category').slideToggle();
				$('#topsearch_location').text();
			}
    });
});
</script>
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDd3TN-IJfIiCcLIkZvNHxDLrByz81eoeM&amp;libraries=places" type="text/javascript"></script>
<script type="text/javascript">
function initialize() 
{

	var input = document.getElementById('location_search');
   	var autocomplete = new google.maps.places.Autocomplete(input);
 
	google.maps.event.addListener(autocomplete, 'place_changed', function() {
	       var address='';
	     place= result = autocomplete.getPlace();
  		

                 
                   var address='';
                    var city_name = '';

                  for (var i = 0; i < place.address_components.length; i++)
                        
                      {

                                var addressType = place.address_components[i].types[0];
                             
                                if(addressType=='sublocality_level_1')
                              {     
                                var val = place.address_components[i]['long_name'];
                                  if(address=='')
                                       { 
                                           address = val; 
                                        }else{ 
                                            address =address+','+ val; 
                                        }
                                 
                              }
                              if(addressType=='sublocality_level_2')
                              {
                                var val = place.address_components[i]['short_name'];
                                  if(address=='')
                                       { 
                                           address = val; 
                                        }else{ 
                                            address =address+','+ val; 
                                        }
                              }
                              if(addressType=='locality')
                              {

                                var val = place.address_components[i]['short_name'];
                                  if(address=='')
                                       { 
                                           address = val; 
                                        }else{ 
                                            address =address+','+ val; 
                                        }
                                           city_name=val; 
                              }
                              if(addressType=='administrative_area_level_1')
                              {
                                var val = place.address_components[i]['long_name'];
                                 
                                  if(address=='')
                                       { 
                                           address = val; 
                                        }else{ 
                                            address =address+','+ val; 
                                        }
                              }
                                  if(addressType=='street_number')
                              {
                                var val = place.address_components[i]['short_name'];
                                  
                                  if(address=='')
                                       { 
                                           address = val; 
                                        }else{ 
                                            address =address+' '+ val; 
                                        }
                              }
                                if(addressType=='country')
                              {
                                var val = place.address_components[i]['long_name'];
                                  if(address=='')
                                       { 
                                           address = val; 
                                        }else{ 
                                            address =address+','+ val; 
                                        }
                              }
                              if(addressType=='route')
                              {
                                var val = place.address_components[i]['long_name'];
                                  if(address=='')
                                       { 
                                           address = val; 
                                        }else{ 
                                            address =address+' '+ val; 
                                        }
                              }
                             
                              if(addressType=='train_station')
                              {
                              
                                    
                                var val = place.address_components[i]['short_name'];
                               if(address=='')
                                       { 
                                           address = val; 
                                        }else{ 
                                            address =address+' '+ val; 
                                        }
                              }
                                        

                         }
                       
                        document.getElementById('location_search').value=address;	

		var mapdata={"address":result.formatted_address};
		var changeLocationUrl= '<?php echo site_url('home/updateLocation')?>?city='+city_name;
		$.ajax({

		url: changeLocationUrl,

		dataType: 'json',

		type: 'POST',

		data: mapdata,

		success: function(data)

		{ 
			

		},		

		error: function(XMLHttpRequest, textStatus, errorThrown)

		{

		}

	});
		$('#go_button').click();
      
});
}
google.maps.event.addDomListener(window, 'load', initialize);

function form_validate()
{
	if(document.getElementById('topsearch').value == "Search for events" ||document.getElementById('topsearch').value == "" || document.getElementById('topsearch').value == '<?php echo 'search'; ?>' || document.getElementById('topsearch').value == '<?php echo 'Please enter keyword'; ?>')
	{
		document.getElementById('topsearch').value = "";
		document.getElementById('searchval').value = "<?php echo PLEASE_ENTER_KEYWORD; ?>";
		return false;
	}
	else
	{
		document.frmsearch.submit();
	}
}

function autotext()
{
	var xmlHttp;
	try
	{
		xmlHttp=new XMLHttpRequest();// Firefox, Opera 8.0+, Safari
	}
	catch (e)
	{
		try
		{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
		}
		catch (e)
		{
			try
			{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e)
			{				
				return false;
			}
		}
	}
	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4)
		{
			if(xmlHttp.responseText != '')
			{
				$("#topsearch_category").hide();
			}
			document.getElementById('autoc').innerHTML=xmlHttp.responseText;
			
			if(document.getElementById('srhdiv'))
			{
				var hht = document.getElementById('srhdiv').offsetHeight + 'px';
				document.id('autoc').set('tween', {
					duration: 1000,
					transition: Fx.Transitions.Bounce.easeOut 
				}).tween('height', hht);
			}
			else
			{
				var hht = '0px';
				document.getElementById('autoc').style.height = '0px';
			}
		}
	}
	
	var text = document.getElementById('topsearch').value;
 	var RE_SSN = /^[A-Za-z0-9. ]{1,50}$/; 
	
	if(text!='')
	{
		if (RE_SSN.test(text)) {}
		else 
		{
            $("#topsearch").val(text.slice(0,-1));
            return false;
		}
	}
	xmlHttp.open("GET","<?php echo site_url('search/search_auto');?>/"+text+"/"+<?php echo time(); ?>,true);
	xmlHttp.send(null);
}

function selecttext(el)
{	
	document.getElementById('topsearch').value = el.innerHTML;

	setTimeout(function(){
		el.parentNode.innerHTML = '';
	},500);
	
	document.frmsearch.submit();
}
</script>

<header class="navbar navbar-static-top bs-docs-nav header" id="top" role="banner">
  <div class="container por">
    <div class="navbar-header top-left">    
          <button class="navbar-toggle toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
            <span class="sr-only"><?php echo TOGGLE_NAVIGATION;?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a href="<?php echo site_url('home');?>" class="logo-size">
	          <img src="<?php echo base_url();?>images/<?php echo $site_image['site_logo'];?>" id='logo' alt=" " class="logo-size" >
          </a>

      </a>
	</div>
    
    <?php
        if($this->session->userdata('user_id'))
        {
            $loginu = getRecordById('users','id',$this->session->userdata('user_id'));        
            $create_event_right = check_permission_label('event','create_event');
        }else{
            $create_event_right = false;
        }        
    ?>	      
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">      
       
      <ul class="nav navbar-nav navbar-right">
      <?php if($this->session->userdata('user_id') != "") { ?>
          <li><a href="<?php echo site_url('calender'); ?>"><i class="glyphicon glyphicon-search hidden-lg hidden-md"></i> &nbsp;<?php echo CALENDER;?></a></li>
      <?php } ?>

      <?php if($this->session->userdata('user_id') != "") { ?>
          <li><a href="<?php echo site_url('event/event_watchlist'); ?>"><i class="glyphicon glyphicon-search hidden-lg hidden-md"></i> &nbsp;<?php echo WATCHLIST;?></a></li>
      <?php } ?>
        
        <?php 
			$sso_setting=sso_setting();
			
			$consumer_key = $sso_setting['consumer_key'];
			$secret_key =$sso_setting['secret_key'];
			$url =$sso_setting['url'];
			$login_url=$url.'public/index/index/consumer/'.$consumer_key;
			$reg_url=$url.'public/usuario/add/consumer/'.$consumer_key;
			$logout_url=$url.'public//usuario/logout/consumer/'.$consumer_key;	
			
	        $location_address = $this->input->cookie('location'); 
		    $search_location='';
		    if($location_address != '')
		    {
		   		$search_location = $location_address;
		    }
       		if($this->session->userdata('user_id')){
       	?>
       	<li class="log-drop dropdown">            
      		<a href="javascript://" class="bullet_log dropdown-toggle" data-toggle="dropdown">
      			 <?php
      			 	if($loginu['first_name']!='' && $loginu['last_name']!=''){
      			 		?>
      			 		 <span class="top_user_name"><?php echo HI;?>, <?php echo SecureShowData($loginu['first_name']).' '.SecureShowData($loginu['last_name']); ?> </span>
                         <i class="glyphicon glyphicon-chevron-down hidden-xs hidden-sm"></i>
      			 		<?php
      			 	}else{
      			 		?>
      			 		 <span class="top_user_name"><?php echo HI;?>, <?php echo SecureShowData($loginu['email']); ?> </span>
                         <i class="glyphicon glyphicon-chevron-down hidden-xs hidden-sm"></i>
      			 		<?php
      			 	}
      			 ?>
            
        </a>
            <ul class="user_menu">
                <li><a href="<?php echo site_url('event');?>"><i class="glyphicon glyphicon-th"></i> <span><?php echo MY_EVENTS;?></span></a></li>
                <li><a href="<?php echo site_url('ticket/my_tickets')?>"><i class="glyphicon glyphicon-list-alt"></i> <span><?php echo MY_TICKETS; ?></span></a></li>
                <li><a href="<?php echo site_url('contact_list');?>"><i class="glyphicon glyphicon-envelope"></i> <span><?php echo MY_CONTACTS;?></span></a></li>
            	<li><a href="<?php echo site_url('profile/create_organizer');?>"><i class="glyphicon glyphicon-edit"></i> <span><?php echo EDIT_PROFILE;?></span></a></li>
                <li>
                <a href="<?php echo site_url('user/my_account');?>">
                	<i class="glyphicon glyphicon-cog"></i> 
                    <span><?php echo MY_ACCOUNT;?></span>
                </a>
                </li>
                <li> <a href="<?php echo site_url('user/logout');?>"><i class="glyphicon glyphicon-log-out"></i> <span><?php echo LOGOUT;?></span></a></li>
            </ul>
        </li>
       	<?php	
       	}else{
		
			
       		?>
        		<li><a href="<?php echo site_url('user/signup');?>"><?php echo SIGNUP;?></a></li>
       			<li><a href="<?php echo site_url('user/login');?>"><?php echo LOG_IN;?></a></li>
       		<?php
       	} 
       	?>
      	
       <?php if(!$create_event_right){ ?><li><a href="<?php echo site_url('event/create_event');?>" class="btnCreateEvent"><?php echo CREATE_AN_EVENT;?></a></li><?php }?>
      </ul>
      
    </nav>
   
    <?php
		$attributes = array('name'=>'frmsearch','id'=>'frmsearch','method'=>'get', 'onsubmit'=>'return form_validate()','autocomplete'=>'off','class'=>'navbar-form navbar-left pre');
		echo form_open('search/',$attributes);						
	?>
	<button class="toggle toggle-search collapsed" type="button" data-toggle="collapse" data-target="#topSearch">
        <i class="glyphicon glyphicon-search"></i>
	</button>
    
  	<div id="topSearch">
        <div class="form-group">            
           <input type="text" class="form-control" id="topsearch" 
                  onblur="if (this.value == '') {this.value = '<?php echo SEARCH_FOR_EVENTS; ?>';}" 
                  onfocus="if (this.value == '<?php echo SEARCH_FOR_EVENTS; ?>') {this.value = '';}" 
                  value="<?php if($_POST && isset($_POST['searchprj'])) { echo $_POST['searchprj']; } else { echo SEARCH_FOR_EVENTS; } ?>" name="event_title"  onkeyup="autotext();"/>      
        </div>
        <button type="submit" value="" class="btn btn-default search_btn" onclick="form_validate();">
        <i class="glyphicon glyphicon-search"></i></button>
    </div>
        <div id="topsearch_ajax" style="display:none;" class="header_search">
    <div id="topsearch_location" class="event-title event-title2">
    <div class="searchbartop">
	    <form name="search_form" id="search_form" method="GET" action="<?php echo site_url('search'); ?>">
	    	<div class="row">
	    		<div class="col-lg-9 col-md-9 col-sm-10 col-xs-9">
	    			<input type="text" name="location_search" placeholder="<?php echo ENTER_LOCATION;?>" class="form-control input-large" id="location_search" autocomplete="off" value="" >
				</div>
				    <input type="hidden" value="" name="category_id">
			    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-3">
			    	<input type="submit" id="go_button" value="GO"  name="search_enter" class="btn-event" />
			    </div> 
	    	</div>
	    </form>
	</div>
    </div>
    <ul id="topsearch_category" class="header_searchlist">
        	<label>Categories</label>
            <?php
           
          
            $parent = getCategory(0,1);
                if($parent) 
                {
                    foreach($parent as $par)
                    {
                        $category_name = $par['category_name'];
                        $category_id = $par['id'];
                        $category_url_name = $par['category_url_name'];
			?>                
                        <li class=""> <a href="<?php echo site_url('search/'.'?category='.$category_id.'&location='.$search_location);?>" class="cat_class <?php if($category_id==$this->input->get('category')) { echo 'active'; } ?>"> <?php echo SecureShowData($category_name);?></a></li>                                                     
            <?php }
                }
               ?>
       </ul> 
       	<div id="autoc" class="pab"></div>
        </div>        
      </form>           
  </div>  	   
</header>
<?php if(DEMO_MODE=="1"){ ?>
  <div  class="alert alert-danger demo-alert" role="alert">
    <?php echo FRONT_DEMO_MESSAGE.'<a href="http://ticketingsoftwares.com/contact-us" target="_blank">'.CONTACT_US.'</a>'; ?>
  </div>
<?php } ?> 