<?php
    $search_event_type_name = '';
    if($event_types && $event_type) {
        foreach($event_types as $eventType) {
            if($eventType['id'] == $event_type) {
                $search_event_type_name = $eventType['event_type_name'];
            }
        }
    }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>

<link href="<?php echo base_url(); ?>css/jquery.tagit.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>js/tag-it.js" type="text/javascript" charset="utf-8"></script>
<style type="text/css">
    ul.tagit li.tagit-new{
    display: none !important;
  }
</style>

<script>
        $(function(){
            var sampleTags = ['c++', 'java', 'php', 'coldfusion', 'javascript', 'asp', 'ruby', 'python', 'c', 'scala', 'groovy', 'haskell', 'perl', 'erlang', 'apl', 'cobol', 'go', 'lua'];

            //-------------------------------
            // Tag events
            //-------------------------------
            var eventTags = $('#eventTags');

            var addEvent = function(text) {
                $('#events_container').append(text + '<br>');
            };

            eventTags.tagit({
                availableTags: sampleTags,
              
                beforeTagRemoved: function(evt, ui) {
                   // addEvent('beforeTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
                  
                          var res = document.URL;
                          var res =decodeURIComponent(res);
                          var category='<?php echo $category; ?>';
                          var location='<?php echo $location;?>';
                          var event_type='<?php echo $search_event_type_name;?>';
                          var click_lable=eventTags.tagit('tagLabel', ui.tag);
                            if(res.indexOf(eventTags.tagit('tagLabel', ui.tag))>0)
                            {
                                new_url = res.replace(eventTags.tagit('tagLabel', ui.tag),''); 
                            }
                            else if(click_lable=='Today' ||click_lable=='Tomorrow'||click_lable=='This Week'||click_lable=='This Weekend' ||click_lable=='This Month')
                            {
                                var date='<?php echo $date;?>';
                                new_url = res.replace('event_date='+date,'event_date='); 
                            }else if(event_type==click_lable)
                            {   
                                new_url = res.replace("event_type=<?php echo $event_type; ?>",'event_type='); 
                            }else if(location==click_lable)
                            { 	
                            	  new_url = res.replace('city='+(decodeURIComponent(location)).replace(/ /g,'+'),'city='); 
                            }else
                            {
                                new_url = res.replace('category='+category,'category='); 
                            }
                              // console.log(new_url);   
                             // alert(new_url);
                          window.location.href = new_url;



                },
              
            });

        });
    </script>
    <section class="eventDash-head pdTB0">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
                <h1 id="">

                <?php
                if($city!='')
                {
                     echo $city.' '.EVENTS; 
                }else{
                        if ($location) { ?><?php
                        echo $location.' '.EVENTS; 
                            } else
                            {
                                echo ALL.' '.EVENTS;
                            }
            } 

?></h1>
          </div>
      </div>
    </div>
  </section>

  <section class="searchBg hide">
    <div class="container clearfix">
        <form class="event-title" method="get" action="<?php
echo site_url('search'); ?>" name="search_form" id="search_form">
            <div class="searcharea clearfix">
                <div class="searchTextbox">
                    <div class="por">
                        <input type="text" value="<?php
echo $event_titles; ?>" name="event_title" id="event_title" placeholder="Event title" >
                        <input type="hidden" value="<?php echo $category ?>" name="category" id="category_id" >
                         <input type="hidden" value="<?php echo $price ?>" name="price" id="price" >
                          <input type="hidden" value="<?php echo $date ?>" name="event_date" id="case" >
                          <input type="hidden" value="" name="city" id="" >
                        <div id="autoc" ></div>
                        <i class="glyphicon glyphicon-search"></i>
                    </div>
                </div>
                <div class="searchTextbox marRW60">
                    <div class="por">
                        <input type="text" name="location" placeholder="Enter a Location" id="location" autocomplete="on" value="<?php
echo $location; ?>">
                        <div id="test" class="gmap3"  style="position:relative;"></div>
                        <i class="glyphicon glyphicon-map-marker"></i>
                    </div>
                </div>
            </div>
            <div class="searchBTN">
                <input type="hidden" name="location_hidden" id="location_hidden" value="<?php

if ($location_hidden != '' && $location_hidden != NULL) {
    echo $location_hidden;
} ?>"/>
                <input id="searchBy" type="submit" class="btn-event" value="<?php
echo SEARCH; ?>">
            </div>
        </form>
    </div>
  </section>
  

    <section>

            <div class="container marTB50">
            <?php   if($price||$date||$city||$category||$location||$search_event_type_name) {?>
    
<?php  

if ($parent && $category!="") {
    foreach($parent as $par) {
      
      if( $par['id']==$category)
      {
          $category_name = $par['category_name'];
      }

        }
    }else{
        $category_name='';
    }

    $search_event_type_name = '';
    if($event_types && $event_type) {
        foreach($event_types as $eventType) {
            if($eventType['id'] == $event_type) {
                $search_event_type_name = $eventType['event_type_name'];
            }
        }
    }

    $date_name='';
     if($date) {  
       switch ($date) {
           case 'today':
              $date_name='Today';
               break;
               
               case 'tomorrow':
                $date_name='Tomorrow';
               break;
              
               case 'this_week':
                   $date_name='This Week';
               break;
              
               case 'this_weekend':
                   $date_name='This Weekend';
               break;
               case 'next_week':
                   $date_name='Next Week';
               break;
               case 'this_month':
                   $date_name='This Month';
               break;
           
           default:
              $date_name='';
               break;
       }
   }

         ?>
       
        <form class="filter-location clearfix">
           <h3 >Filter:</h3>
            <ul id="eventTags">
                <li><?php echo $price;?></li>
                <li><?php echo $date_name;?></li>
                <li><?php echo SecureShowData($city);?></li>
                <li><?php echo SecureShowData($category_name);?></li>
                <li><?php echo SecureShowData($search_event_type_name);?></li>
                <li><?php echo $location;?></li>
            </ul>
             <a href="<?php echo site_url('search'); ?>" ><span> X Clear all filters</span></a>
        </form> 
        
    
        <div id="events_container"></div>
        
        <?php }?>
                <div class="row event-webpage">
                    <div class="col-md-3 col-md-push-9 col-sm-4 col-sm-push-8 filters">
                        <button class="toggle toggle-filters collapsed" type="button" data-toggle="collapse" data-target="#filters">
                            <i class="glyphicon glyphicon-tasks"></i> <?php echo 'FILTER_RESULTS';?>
                         </button>
                <?php // Sidebar start  ?>
                      <div id="filters" class="list-group  eventDash mb0">
                        <div class="accountSidebar">
                          <div id="accordion" class="panel-group eventdash-link2 mb0">
                <div class="panel mapclass">
                    <?php
                      $event_search_city =''; 
                      if($city !='')
                      {
                        $event_search_city = $city;
                      }
                      elseif ($location !="") {
                        $event_search_city = $location; 
                      }
                    ?>
              <script type="text/javascript">
                  $(document).ready(function () {
                   var city_name = '<?php echo $event_search_city; ?>';
                   if(city_name !=""){
                      $('#map').show();
                      $('.mapclass').show();
                   }
                   else{
                      $('#map').hide();
                      $('.mapclass').hide();
                   }
                    set_map_center(city_name);
                  });
                
                function set_map_center(address){
                        var geocoder = new google.maps.Geocoder();
                      var mapOptions = { zoom: 13 };
                      var markersArray = [];
                      var map = new google.maps.Map(document.getElementById("map"), mapOptions);
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
                </script>

                      <div class="map" id="map"></div>
                      </div>
                      <div class="panel">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="list-group-item collapsed"><?php echo DATE; ?> <span class="arrowBottom"></span> 
                        </a>
                        <div id="collapse1" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
                        <div class="event-detail1">
                            <ul class="filtersList">
                             <?php 
                            $url_all_date = site_url('search').'?event_date=&price='.$price.'&city='.$city . '&event_type=' . $event_type . '&category='.$category.'&location='.$location.''; 
                            if($location=='' || $location==NULL){ $url_all_date = site_url('search').'?event_date=&price='.$price.'&city='.$city . '&event_type=' . $event_type . '&category='.$category; } ?>
                                <li> <a href="<?php echo $url_all_date; ?>" class="<?php
if (isset($_GET) && isset($_GET['event_date']) && $_GET['event_date'] == 'all') { echo 'active'; } ?> datesearch"><?php
echo ALL_DATES; ?> </a>

</li><div class="clear"></div>
                        <?php
                             $url_today = site_url('search').'?event_date=today&price='.$price.'&city='.$city.'&category='.$category . '&event_type=' . $event_type.'&location='.$location.''; 
                            if($location=='' || $location==NULL){ $url_today = site_url('search').'?event_date=today&price='.$price.'&city='.$city.'&category='.$category . '&event_type=' . $event_type; } ?>
                                <li> <a href="<?php echo $url_today; ?>" class="<?php
if (isset($_GET) && isset($_GET['event_date']) && $_GET['event_date'] == 'today') { echo 'active'; } ?> datesearch"><?php
echo TODAY; ?>  </a></li>
<?php 
                             $url_tomorrow = site_url('search').'?event_date=tomorrow&price='.$price.'&city='.$city.'&category='.$category . '&event_type=' . $event_type.'&location='.$location.''; 
                            if($location=='' || $location==NULL){ $url_tomorrow = site_url('search').'?event_date=tomorrow&price='.$price.'&city='.$city.'&category='.$category . '&event_type=' . $event_type; } ?>
                               <li> <a href="<?php echo $url_tomorrow; ?>" class="<?php

if (isset($_GET) && isset($_GET['event_date']) && $_GET['event_date'] == 'tomorrow') { echo 'active'; } ?>  datesearch"><?php
echo TOMORROW; ?> </a></li>
<?php 
                           $url_this_week = site_url('search').'?event_date=this_week&price='.$price.'&city='.$city.'&category='.$category . '&event_type=' . $event_type.'&location='.$location.''; 
                            if($location=='' || $location==NULL){ $url_this_week = site_url('search').'?event_date=this_week&price='.$price.'&city='.$city.'&category='.$category . '&event_type=' . $event_type; } ?>
                                 <li> <a href="<?php echo $url_this_week; ?>" class="<?php

if (isset($_GET) && isset($_GET['event_date']) && $_GET['event_date'] == 'this_week') { echo 'active'; } ?> datesearch"><?php
echo THIS_WEEK; ?> </a></li>
<?php 
                            $url_this_weekend = site_url('search').'?event_date=this_weekend&price='.$price.'&city='.$city.'&category='.$category . '&event_type=' . $event_type.'&location='.$location.''; 
                            if($location=='' || $location==NULL){ $url_this_weekend = site_url('search').'?event_date=this_weekend&price='.$price.'&city='.$city . '&event_type=' . $event_type.'&category='.$category.''; } ?>
                                 <li> <a href="<?php echo $url_this_weekend; ?>" class="<?php

if (isset($_GET) && isset($_GET['event_date']) && $_GET['event_date'] == 'this_weekend') { echo 'active'; } ?> datesearch"><?php
echo THIS_WEEKEND; ?> </a>

</li>
<?php 
                            $url_next_week = site_url('search').'?event_date=next_week&price='.$price.'&city='.$city.'&category='.$category . '&event_type=' . $event_type.'&location='.$location.''; 
                            if($location=='' || $location==NULL){ $url_next_week = site_url('search').'?event_date=next_week&price='.$price.'&city='.$city.'&category='.$category . '&event_type=' . $event_type.''; } ?>
                               <li> <a href="<?php echo $url_next_week; ?>" class="<?php

if (isset($_GET) && isset($_GET['event_date']) && $_GET['event_date'] == 'next_week') { echo 'active'; } ?> datesearch" ><?php
echo NEXT_WEEK; ?> </a>

</li>
<?php 
                          $url_this_month = site_url('search').'?event_date=this_month&price='.$price.'&city='.$city.'&category='.$category . '&event_type=' . $event_type.'&location='.$location.''; 
                            if($location=='' || $location==NULL){ $url_this_month = site_url('search').'?event_date=this_month&price='.$price.'&city='.$city.'&category='.$category . '&event_type=' . $event_type.''; } ?>
                                 <li> <a href="<?php echo $url_this_month; ?>" class="<?php

if (isset($_GET) && isset($_GET['event_date']) && $_GET['event_date'] == 'this_month') { echo 'active'; } ?> datesearch"><?php
echo THIS_MONTH; ?> </a></li>
                          </ul>
                            </div>
                        </div>
                      </div>
                      </div>

<div class="panel">
   <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="list-group-item collapsed"><?php echo PRICE; ?> <span class="arrowBottom"></span>
  </a>   
  <div id="collapse2" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
<div class="event-detail1">
    <ul class="filtersList">
     <?php if($location=='' || $location==NULL){ $price_url = site_url('search') . '?price=&category='.$category . '&event_type=' . $event_type.'&city='.$city.'&event_date='.$date; }else{ $price_url=site_url('search') . '?price=&category='.$category . '&event_type=' . $event_type.'&category='.$category . '&event_type=' . $event_type.'&event_date='.$date.'&location='.$location; } ?>
        <li><a href="<?php echo $price_url; ?>" title="<?php echo ALL_PRICE; ?>"><?php echo ALL_PRICE; ?></a></li>
    <?php if($location=='' || $location==NULL){ $price_url = site_url('search') . '?price=free&category='.$category . '&event_type=' . $event_type.'&city='.$city.'&event_date='.$date; }else{ $price_url=site_url('search') . '?price=free&category='.$category . '&event_type=' . $event_type.'&category='.$category . '&event_type=' . $event_type.'&event_date='.$date.'&location='.$location; } ?>
        <li><a href="<?php echo $price_url; ?>" title="<?php echo FREE; ?>"><?php echo FREE; ?></a></li>
    <?php if($location=='' || $location==NULL){ $price_url = site_url('search') . '?price=paid&category='.$category . '&event_type=' . $event_type.'&city='.$city.'&event_date='.$date; }else{ $price_url=site_url('search') . '?price=paid&category='.$category . '&event_type=' . $event_type.'&category='.$category.'&event_date='.$date.'&location='.$location; } ?>
        <li><a href="<?php echo $price_url; ?>" title="<?php echo PAID_DONATION; ?>"><?php echo PAID_DONATION; ?></a></li>
    </ul>
</div>
      </div>
    </div>
</div>

                        <div class="panel">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="list-group-item collapsed"><?php echo CATEGORY; ?><span class="arrowBottom"></span>
                        </a>
                        <div id="collapse3" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
                        <div class="event-detail1">
                            <ul class="filtersList" id="cat_list">
                            <?php

if ($parent) { $show=0;
    foreach($parent as $par) {
        $category_name = $par['category_name'];
        $category_id = $par['id']; 
        $count = $par['count']; ?>
       
            <?php 
            $url_cat = site_url('search') . '?category=' . $category_id . '&event_type=' . $event_type . '&price='.$price.'&city='.$city.'&event_date='.$date.'&location=' . $location ;
            if($location=='' || $location==NULL){
                $url_cat = site_url('search') . '?category=' . $category_id . '&event_type=' . $event_type . '&price='.$price.'&city='.$city.'&event_date='.$date.'';
            }
         ?>
        <?php if($count >0) {  $show++; ?>
                                    <li> <a href="<?php echo $url_cat; ?>" class="cat_class <?php
        if ($category_id == $this->input->get('category')) { echo 'active'; } ?>"> <?php
        echo $category_name; ?> (<?php echo $count; ?>)</a></li>
        <?php } ?>
                                    <?php
        if (isset($child[$par['id']])) {
?>
                                        <ul class="category_sub">
                                        <?php
            foreach($child[$par['id']] as $chd) {
?>
                                            <li><a href="<?php
                echo site_url('search') . '?category=' . $category_id . '&event_type=' . $event_type . '&sub_category=' . $chd['id'] . ''; ?>"> <?php
                echo SecureShowData($chd['category_name']); ?></a>    </li>
                                        <?php
            }

?>

                                        </ul>
                                        <?php
        }
    }
}

?>    
    <?php if($show>4){?>
        <li style="text-align: center;" class="toggle_cat red-event" >
                    <div class="show_cat"><?php echo SHOW_MORE;?> </div>
                    <div class="hide_cat"><?php echo SHOW_LESS;?></div>
                    </li>
    <?php } ?>
                          </ul>
                        </div>
                       </div>
                    </div>
                  </div>

                    <div class="panel">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5" class="list-group-item collapsed"><?php echo "Event Type"; ?><span class="arrowBottom"></span></a>
                        <div id="collapse5" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <div class="event-detail1">
                                    <ul class="filtersList" id="et_list">
                                        <?php if ($event_types) {
                                            $show=0;
                                            foreach($event_types as $eventType) {
                                                $eventType_name = $eventType['event_type_name'];
                                                $eventType_id = $eventType['id']; 
                                                $count = $eventType['count']; ?>
                                                <?php 
                                                    $url_cat = site_url('search') . '?category=' . $category . '&event_type=' . $eventType_id . '&price='.$price.'&city='.$city.'&event_date='.$date.'&location=' . $location ;
                                                    if($location=='' || $location==NULL){
                                                        $url_cat = site_url('search') . '?category=' . $category . '&event_type=' . $eventType_id . '&price='.$price.'&city='.$city.'&event_date='.$date.'';
                                                    }
                                                ?>
                                                <?php if($count >0) {  $show++; ?>
                                                    <li> <a href="<?php echo $url_cat; ?>" class="cat_class <?php if ($eventType_id == $this->input->get('event_type')) { echo 'active'; } ?>">
                                                    <?php echo SecureShowData($eventType_name); ?> (<?php echo $count; ?>)</a></li>
                                                <?php }
                                            }
                                        } ?>
                                        <?php if($show>4){?>
                                            <li style="text-align: center;" class="toggle_et red-event" >
                                                <div class="show_et"><?php echo SHOW_MORE;?> </div>
                                                <div class="hide_et"><?php echo SHOW_LESS;?></div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- code for city start-->
                  <div class="panel">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="list-group-item collapsed">
                      <?php echo CITY; ?> <span class="arrowBottom"></span>
                      </a>
                    <div id="collapse4" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
                        <div class="event-detail1">
                            <ul class="filtersList">
                            <li>

                            <?php
                            $all_count=getEventCountForCity('all');
if($location=='' || $location==NULL){ $city_url = site_url('search') . '?city=all&price='.$price.'&category='.$category . '&event_type=' . $event_type.'&event_date='.$date; }else{ $city_url=site_url('search') . '?city=&price='.$price.'&category='.$category . '&event_type=' . $event_type.'&event_date='.$date.'&location='.$location; }

                            ?>
                                <a href="<?php echo $city_url; ?>"><?php echo ALL.'('.$all_count['count'].')';?></a>

                            </li>
                           <?php  
                           $displayCityCount=0;
                           if ($cities) {
                    foreach($cities as $city) { 

                       $count=getEventCountForCity($city['venue_city']); 
                       
                       if($count)
                       {
                        $count_val=$count['count'];
                       }else
                       {
                         $count_val=0;
                       }

                        ?>
<?php if($location=='' || $location==NULL){ $city_url = site_url('search') . '?city='.$city['venue_city'].'&price='.$price.'&category='.$category . '&event_type=' . $event_type.'&event_date='.$date; }else{ $city_url=site_url('search') . '?city='.$city['venue_city'].'&price='.$price.'&category='.$category . '&event_type=' . $event_type.'&event_date='.$date.'&location='.$location; } ?>
             <?php if($count_val){ 
              $displayCityCount++;
              ?>
             <li> <a href="<?php echo $city_url; ?>" class="cat_class"> <?php
                    echo $city['venue_city'].'('.$count_val.')'; ?></a></li>
                    <?php } ?>



                    <?php }
                    }?>
           <?php if($displayCityCount>3){?>
        <li style="text-align: center;" class="toggle_city red-event" >
                    <div class="show_city"><?php echo SHOW_MORE;?> </div>
                    <div class="hide_city"><?php echo SHOW_LESS;?></div>
                    </li>
    <?php } ?>
                           </ul>
                            </div>
                        </div>
                      </div>
                    </div>
                <!-- code for city end-->
                 </div>
                    </div>
                      </div>
              <?php // Sidebar end  ?>
                  </div>
                    <div>
                        <div class="col-md-94 col-md-pull-3 col-sm-8 col-sm-pull-4 eventListContainer" id="ajaxres">
                            <div class="world-tour">
                                <ul class="padL0">
                                    <?php

if ($events) {
    foreach($events as $event) {
        $event_title = $event['event_title'];
        $event_url_link = $event['event_url_link'];
       $event_end_date_time = datetimeformat($event['event_start_date_time']);
        $event_logo = $event['event_logo'];
        $org_name = $this->event_model->checkevent_owner($event['user_id']);
        $org_name = $org_name['first_name'];
        $event_location = $event['street_address'];

          $location_result = getRecordById('venues', 'id', $event['venue_id']);
          $venue_name=$location_result['name'];
          $event_location = setAddress($event['id'], $location_result);

        if($org_name ==''){
          $org_result = getOrganizers($event['user_id']);
          $org_name = $org_result[0]['name'];
        }
        $event_id=$event['id'];
        if($event_logo!='' && file_exists('upload/event/thumb/'.$event_logo)){
                $event_img = base_url().'upload/event/thumb/'.$event_logo;
              }else{
                $event_img = base_url().'upload/event_default/no_img.jpg';
      }
?>


                                            <li>
                                                <div class="josef">
                                                    <a href="<?php
        echo site_url('event/view/' . $event_url_link); ?>">
                                                        <div class="imgLeft">
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
                                                                    if ($image_slide && file_exists('upload/search_default/'. $image_slide)) {
                                                                        $image = base_url().'upload/search_default/'.$image_slide;
                                                                    }
                                                                    else if($image_slide != '' && file_exists(base_path().'upload/event/orig/'.$image_slide)){ 
                                                                        $image = base_url().'upload/event/thumb/'.$image_slide;
                                                                    }
                                                                    elseif($image_slide != '' && file_exists(base_path().'upload/event/thumb/'.$image_slide)){ 
                                                                        $image = base_url().'upload/event/thumb/'.$image_slide;
                                                                    }
                                                                ?>
                                                          <img src="<?php echo $image; ?>" alt=" "  height="120px" width="120px"  > 
                                                          </li>
                                                          <?php 
                                                            
                                                              }
                                                            } ?>
                                                          
                                                        </ul>
                                                      </div>

                                                        </div>
                                                        <div class="tour">
                                                            <p><?php echo $event_end_date_time; ?> | <?php echo timeFormat($event['event_start_date_time']); ?></p>
                                                            <h2 class="marB20"><?php echo SecureShowData($event_title); ?></h2>
                                                            <?php if(!$event['online_event_option']){?>
                                                            <p><b><?php echo SecureShowData($venue_name);?></b></p>
                                                            <p class="eventLocation"><?php echo SecureShowData($location_result['venue_city']).', '.SecureShowData($location_result['venue_state']); ?></p>
                                                            <?php }else{
                                                              echo '<p><b>'.online_event.'</b></p>';
                                                              } ?>
                                                            
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                        <?php
    }

    echo $page_link;
}
else {
?>
                                        <p class="no_recordSearch"><?php echo SORRY_NO_EVENTS_FOUND;?> <br />
                                            <?php echo TRY_ANOTHER_SEARCH_OR_ADJUST_YOUR_FILTERS;?></p>
    <?php
}

?>
                                    <div class="clear"></div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- End container -->
    </section>
    <script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
    <script>
            $(document).ready(function(){
            $(".rover_tip").popover();
    });
    </script>
    <script type="text/javascript">

            // When the document is ready

            $(document).ready(function () {
                $('#datepicker1').datepicker({
                    format: "dd/mm/yyyy",
                    orientation: 'top'
                });
            });
            $(document).ready(function () {
                $('#datepicker2').datepicker({
                    format: "dd/mm/yyyy",
                    orientation: 'top'
                });
            });
        </script>

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
<script type="text/javascript">
  $(".toggle_cat .show_cat").click(function() {
    $('#cat_list').children('li').show();
    $('#cat_list').children('li').slideDown();
  $(".hide_cat").show();
  $(".show_cat").hide();
});
$(".toggle_cat .hide_cat").click(function() {
  $('#cat_list').children('li:gt(3)').hide();
  $('#cat_list').children('li:last').show();
  $(".hide_cat").hide();
  $(".show_cat").show();
});
$('.hide_cat').click();
  $(".toggle_et .show_et").click(function() {
    $('#et_list').children('li').show();
    $('#et_list').children('li').slideDown();
  $(".hide_et").show();
  $(".show_et").hide();
});
$(".toggle_et .hide_et").click(function() {
  $('#et_list').children('li:gt(3)').hide();
  $('#et_list').children('li:last').show();
  $(".hide_et").hide();
  $(".show_et").show();
});
$('.hide_et').click();
</script>
<script type="text/javascript">
  $(".toggle_city .show_city").click(function() {
    $('#city_list').children('li').show();
    $('#city_list').children('li').slideDown();
  $(".hide_city").show();
  $(".show_city").hide();
});
$(".toggle_city .hide_city").click(function() {
  $('#city_list').children('li:gt(3)').hide();
  $('#city_list').children('li:last').show();
  $(".hide_city").hide();
  $(".show_city").show();
});
$('.hide_city').click();
</script>
          
<script type="text/javascript">
    function show(offset)
    {
        var getStatusUrl= '<?php echo site_url()."search/list_events";?>/'+offset;

        $.ajax({
            url: getStatusUrl,
            dataType: 'text',
            type: 'POST',
            timeout: 99999,
            global: false,
            data: '[]',
            
            success: function(data)
            { 
                $('.eventListContainer').html(data);
            },      
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
            
            }
        });
    }
</script>