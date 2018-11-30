  <style type="text/css">
  .mtitle h4 {
    float: left;
    margin-left: 10px;
}
  </style>
  <script>
      function displayLocation(latitude,longitude){
        var request = new XMLHttpRequest();

        var method = 'GET';
        var url = '//maps.googleapis.com/maps/api/geocode/json?latlng='+latitude+','+longitude+'&sensor=true';
        var async = true;
        var area_index = '';
        var city_index = '';
 
        request.open(method, url, async);
        request.onreadystatechange = function(){
          if(request.readyState == 4 && request.status == 200){
            var data = JSON.parse(request.responseText);
            var address = data.results[0];            
            
            for(var i=0; i < address.address_components.length; i++){
                
                var string = address.address_components[i].types;
                var substring = "sublocality_level_1";
                
                if(string.indexOf(substring) > -1){
                  area_index = i;                  
                }           

                var city_string = address.address_components[i].types;
                var cityString = "administrative_area_level_2";

                if(city_string.indexOf(cityString) > -1){
                  city_index = i;                  
                }

            }        
                var caddress = address.address_components[city_index].long_name; 
                var subcategory_path = site_url+'home/event_city_search/';
                      var category_id = caddress;
                      
                      $.ajax({
                          type: "GET",
                          data: {category: category_id}, 
                          url: subcategory_path+category_id,
                          success: function(data) {
                            data=jQuery.parseJSON(data);
                            $("#showdata").text(data); 
                            location.reload();                 
                   }
                }); 
                $("#showdata").text(caddress);  

          }
        };
        request.send();
      };

      var successCallback = function(position){
        var x = position.coords.latitude;
        var y = position.coords.longitude;                        
        displayLocation(x,y);
      };

      var errorCallback = function(error){
        var errorMessage = 'Unknown error';        
        switch(error.code) {
          case 1:
            errorMessage = 'Permission denied';
            break;
          case 2:
            errorMessage = 'Position unavailable';
            break;
          case 3:
            errorMessage = 'Timeout';
            break;
        }
        //document.write(errorMessage);
        // document.getElementById("locationBox").value = "Vadodara";
      };

      var options = {
        enableHighAccuracy: true,
        timeout: 1000,
        maximumAge: 0
      };

      <?php if($site_setting['location_popular_event_enable'] == 1 && !$this->input->cookie('event_city')) { ?>
        navigator.geolocation.getCurrentPosition(successCallback,errorCallback,options);
      <?php } ?>
    </script>


  <?php 
     $get_all_dynamic_slider=getAllRecordById('dynamic_slider','active','1');
     $location_address = $this->input->cookie('location'); 
     $search_location='';

     if($location_address != '')
     {
          $search_location = $location_address;
     }
  ?>
<?php if($success_msg){ ?>
        <div class="alert alert-success message"><?php echo $success_msg; ?></div>
<?php }?>
<?php if($error_msg){ ?>
        <div class="alert alert-danger message"><?php echo $error_msg; ?></div>
<?php }?>
<?php   if(count($get_all_dynamic_slider)>=1)  
        { ?> 
            <div id="carousel-example-generic" class="carousel slide home-banner back-img" data-ride="carousel">

            <?php if(count($get_all_dynamic_slider)>1)  { ?>   
              <ol class="carousel-indicators">
              <?php $i=0; foreach ($get_all_dynamic_slider as $val) { 
              if($val['active']=='1')
              { ?> 
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>" <?php if($i==0) { echo 'class="active"'; } ?>></li>         
            <?php $i++; 
              }
          }
          ?>
              </ol>
<?php }?>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <?php if($get_all_dynamic_slider) { 
               $i = 1;
         foreach($get_all_dynamic_slider as $getit) {
         if($getit['active']=='1')
         {
              $dynamic_image_title = $getit['text1'];
              $dynamic_image_paragraph = $getit['text2'];
              $text3 = $getit['text3'];
              $dynamic_image_image = $getit['dynamic_image_image'];
              $link = $getit['link'];
              $text_name = $getit['text_name']; ?>
                     
      <?php  $item_class = ($i == 1) ? 'item active' : 'item';  ?> 
           <div class="<?php echo $item_class; ?>" >
           
          <?php if(is_file("upload/home_banner/".$dynamic_image_image)) { ?> 
                      <?php 
                      $sliderimg = base_url().'upload/home_banner/'.$dynamic_image_image ;
                       
                           } 
                             else
                           {
                               $sliderimg = base_url().'upload/home_banner/no_img.jpg';   
                           }
                 ?>   
           
                 <div class="slider-img" style="background-image: url(<?php echo $sliderimg;?>);"></div>
            <div class="carousel-caption" style="padding-bottom:80px;">
             
                <div class="page-wrap">
                  <?php if($dynamic_image_title) { ?><h3><?php echo SecureShowData($dynamic_image_title); ?></h3> <?php } ?>
                  <?php if($dynamic_image_paragraph) { ?><h4 class="people"><?php echo SecureShowData($dynamic_image_paragraph); ?></h4> <?php } ?>
                  <?php if($text3) { ?><h5 class="people"><?php echo SecureShowData($text3); ?></h5> <?php } ?>
                 <?php if($link ) { ?><p><a class="btn-start capital" href="<?php echo $link; ?>" role="button"><?php if($text_name) { echo SecureShowData($text_name); } ?></a></p> <?php } ?>
                </div>
              </div>

             </div>
         
           <?php  $i++;   
                }     
            } 
        }  ?>  
   
        </div>
        <!-- Controls -->
        <?php if(count($get_all_dynamic_slider)>1){ ?>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only"><?php echo PREVIOS; ?></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only"><?php echo NEXT; ?></span>
        </a>
        <?php } ?>
        </div>
      <?php } else
{?><div class="back-img">
          <div class="image center-block">
                <div class="page-wrap">
                    <h3><?php echo MI_EVENTO_IS_FREE_SIGN_UP_AND_GET_STARTED; ?></h3>
                    <p><?php echo BROWSE_THOUSANDS_OF_EVENTS_OR_CREATE_YOUR_OWN_AND_SELL_TICKETS_RIGHT_HERE; ?></p>
                    <a href="<?php echo site_url('event/create_event');?>"><?php echo CREATE_AN_EVENT; ?></a>
                    
                </div>
            </div>          
      </div>  
<?php }?>

<?php //Feature Event Start ?>
  <section class="bg-grey">     
                       
            <div class="container">
              <div class="upcome-event">
              <?php if(count($feature_event_title) > 0) {?>
                  <div class="mtitle">
                    <h3><?php echo FEATURE_EVENT; ?></h3>
                  </div>
              <?php } ?>      
                <div class="row">     
                <div class="world-tour">
                  
                   <ul class="clearfix mb0 pl15">
                   <?php 
           if($feature_event){ 
              foreach($feature_event as $event){
              $event_id=$event['id'];
              $event_title=$event['event_title'];
              $event_start_date_time=datetimeformat($event['event_start_date_time']);
              $org_name=$event['name'];
              $event_logo=$event['event_logo'];
              $event_url_link=$event['event_url_link'];
              $event_location = $event['street_address'];
              if($event_logo!='' && file_exists('upload/event/thumb/'.$event_logo)){
                $event_img = base_url().'upload/event/thumb/'.$event_logo;
              }else{
                $event_img = base_url().'upload/event_default/no_img.jpg';
              }

              if($event_location==''){
                $location_result = getRecordById('venues', 'id', $event['venue_id']);
                $event_location = setAddress($event['id'], $location_result);
              } 
              $organizers = getRecordById('organizers','id',$event['organizer_id']);
              
            ?>
                           <li class="col-md-3 col-sm-4">
                         <div class="josef home-page">
                            <a href="<?php echo site_url('event/view/'.$event_url_link);?>">
                             <div class="flexslider">
                                <ul class="slides">
                                  <?php  
                                    $event_images=getAllRecordById('event_images','event_id',$event_id);

                                    if($event_images){
                                      foreach ($event_images as  $image_data) {
                                      
                                  ?>
                                  <li>
                                   <?php 
                                            $image = base_url().'upload/category_default/no_img.png';
                                            $image_slide =  $image_data['image_name'];
                                            if ($image_slide && file_exists('upload/category_default/'. $image_slide)) {
                                                  $image = base_url().'upload/category_default/'.$image_slide;
                                            }
                                            elseif($image_slide != '' && file_exists(base_path().'upload/event/orig/'.$image_slide)){ 
                                                $image = base_url().'upload/event/thumb/'.$image_slide;
                                            }
                                            elseif($image_slide != '' && file_exists(base_path().'upload/event/thumb/'.$image_slide)){ 
                                                $image = base_url().'upload/event/thumb/'.$image_slide;
                                            }
                                            
                                        ?>
                                  <img src="<?php echo $image; ?>" alt=" " height="258px" width="258px" > 
                                  </li>
                                  <?php 
                                    
                                      }
                                    } ?>
                                  
                                </ul>
                              </div>

                            </a>
                            <div class="tour">
                                <h2><a href="<?php echo site_url('event/view/'.$event_url_link);?>" title="<?php echo SecureShowData($event_title);?>"><?php echo SecureShowData($event_title);?></a></h2>
                                <p class="orgName"><?php echo ORGANIZED_BY; ?>:  <a href="<?php echo site_url('/profile/user_profile/'.$organizers['page_url']); ?>"><?php echo SecureShowData($org_name);?></a></p>
                                 <?php if(!$event['online_event_option']){?>
                                   <p class="eventLocation"><?php echo $event_location?></p>
                                  <?php }else{
                                    echo online_event;
                                    } ?>
                                     <p class="eventDate"><?php echo $event_start_date_time?> <?php echo timeFormat($event['event_start_date_time']); ?></p>

                            </div>
                            </div>
                          </li>
                        <?php   
            }
           }
           ?>
                     
                          
                    </ul>
                    
                    

                    
                </div>
                </div>
                <div class="more-event">
                <?php if(count($feature_event_title) > 0) {?>
                    <a href="<?php echo site_url('search');?>"><?php echo FIND_MORE_EVENTS; ?></a>
                <?php } ?>    
                </div>
            </div><!--upcome-event -->
            </div><!-- End container -->
    </section>
    
<?php //Event Search using City  start ?>

<section class="bg-grey">                            
<div class="container">
  <div class="upcome-event">
 
      <div class="mtitle">
      <div class="row">
      
        <h3 style="float:left;"><?php echo POPULAR_EVENTS; ?> </h3><h4 id="showdata"><?php echo ucfirst($event_city_name); ?></h4>
      </div>
      </div>    
    <div class="row">     
    <div class="world-tour">
      
       <ul class="clearfix mb0 pl15">
       <?php 
           if($recent_city_event){ 
              foreach($recent_city_event as $event){
              $event_id=$event['id'];
              $event_title=$event['event_title'];
              $event_start_date_time=convert_System_DateLanguage($event['event_start_date_time'],true);
              $org_name=$event['name'];
              $event_logo=$event['event_logo'];
              $event_url_link=$event['event_url_link'];
              $event_location = $event['street_address'];
              if($event_logo!='' && file_exists('upload/event/thumb/'.$event_logo)){
                $event_img = base_url().'upload/event/thumb/'.$event_logo;
              }else{
                $event_img = base_url().'upload/event_default/no_img.jpg';
              }

              if($event_location==''){
                $location_result = getRecordById('venues', 'id', $event['venue_id']);
                $event_location = setAddress($event['id'], $location_result);
              } 
              $organizers = getRecordById('organizers','id',$event['organizer_id']);
              
            ?>
            <li class="col-md-3 col-sm-4">
                 <div class="josef home-page">
                    <a href="<?php echo site_url('event/view/'.$event_url_link);?>">
                     <div class="flexslider">
                        <ul class="slides">
                          <?php  
                            $event_images=getAllRecordById('event_images','event_id',$event_id);

                            if($event_images){
                              foreach ($event_images as  $image_data) {
                              
                          ?>
                          <li>
                           <?php 
                                    $image = base_url().'upload/event_default/no_img.jpg';
                                    $image_slide =  $image_data['image_name'];
                                    if ($image_slide && file_exists('upload/category_default/'. $image_slide)) {
                                          $image = base_url().'upload/category_default/'.$image_slide;
                                    }
                                    elseif($image_slide != '' && file_exists(base_path().'upload/event/orig/'.$image_slide)){ 
                                        $image = base_url().'upload/event/thumb/'.$image_slide;
                                    }
                                    elseif($image_slide != '' && file_exists(base_path().'upload/event/thumb/'.$image_slide)){ 
                                        $image = base_url().'upload/event/thumb/'.$image_slide;
                                    }
                                ?>
                          <img src="<?php echo $image; ?>" alt=" " height="258px" width="258px" > 
                          </li>
                          <?php 
                            
                              }
                            } ?>
                          
                        </ul>
                      </div>

                    </a>
                    <div class="tour">
                        <h2><a href="<?php echo site_url('event/view/'.$event_url_link);?>" title="<?php echo $event_title;?>"><?php echo SecureShowData($event_title);?></a></h2>
                        <p class="orgName"><?php echo ORGANIZED_BY; ?>:  <a href="<?php echo site_url('/profile/user_profile/'.$organizers['page_url']); ?>"><?php echo SecureShowData($org_name);?></a></p>
                         <?php if(!$event['online_event_option']){?>
                           <p class="eventLocation"><?php echo $event_location?></p>
                          <?php }else{
                            echo online_event;
                            } ?>
                             <p class="eventDate"><?php echo $event_start_date_time?> </p>
                    </div>
                    </div>
                  </li>
                <?php   
    }
   }
   ?>
                    </ul>
                </div>
                </div>
                <div class="more-event">
                <?php $city_url = site_url('search').'?city='.$event_city_name ?>
                    <a href="<?php echo $city_url;?>"><?php echo FIND_MORE_EVENTS; ?></a>
                    
                </div>
            </div><!--upcome-event -->
            </div><!-- End container -->
    </section>
<?php //Event Search using City end ?>

    <section class="catBg">
    	<div class="container">
            <div class="mtitle text-center">
               <h3><?php echo TOP_CATEGORIES;?></h3>
             </div>
             <ul class="catList row">

                <?php
                
                if($parent) 
                {
                    $i=1;
                    foreach($parent as $par)
                    {
                        $category_name = $par['category_name'];
                        $category_image = $par['category_image'];
                        $category_des = $par['category_description'];
                        $category_id = $par['id'];
                        $category_url_name = $par['category_url_name'];
                         $image = base_url().'upload/category_default/'.$category_image; 
                          if(!file_exists('upload/category_default/'.$category_image)){
                              $image = base_url().'upload/category_default/no_img.jpg';
                          }
                        ?>
                        
                        <?php                           
                          if ($par['colomn_size'] == 2) { ?>
                            <li class="col-sm-8 col-xs-12 cat-Item"> 
                          <?php } else { ?>
                            <li class="col-sm-4 col-xs-12 cat-Item">                             
                          <?php } ?>
                          <a href="<?php echo site_url('search/'.'?category='.$category_id.'&location='.$search_location);?>" class="cat_class <?php if($category_id==$this->input->get('category')) { echo 'active'; } ?>"> 
                            <span class="cat-overlay">
                              <span class="cat-text-area">
                                <span class="cat-name"><?php echo SecureShowData($category_name);?></span>
                                <span class="cat-text"><?php echo SecureShowData($category_des);?></span>
                              </span>
                            </span>
                            <img src="<?php echo $image; ?>" alt=" " >
                          </a>
                        </li>
                         
                    <?php 
                    $i++;
                  }
                }
               ?>
              </ul> 
        </div>
    </section>

<!-- CSS/JS FOR FIXSLIDER-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/flexslider.css');?>">
<script type="text/javascript" src="<?php echo base_url('js/jquery.flexslider.js');?>"></script>
<script type="text/javascript">
   $(window).load(function() {
  $('.flexslider').flexslider({
    animation: "fade",
    controlNav: false, 
    directionNav: false,
  });
});
</script>