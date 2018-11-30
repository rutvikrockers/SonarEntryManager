<style type="text/css">
    .red{
        color: red;
    }
</style>
<?php 

$venue_add1 = $event_venue['venue_add1'];
$venue_add2 = $event_venue['venue_add2'];
$venue_city = $event_venue['venue_city'];
$venue_state = $event_venue['venue_state'];
$venue_country = $event_venue['venue_country'];
$address='';
if($venue_id!=''){
    if($venue_add1!='')
    {
        $address=$venue_add1;
    }
    if($venue_add2!='')
    {
        if($address!=''){
            $address=$address.','.$venue_add2;
        } else {
            $address=$venue_add1;
        }
    }
    if($venue_city!='')
    {
        if($address!=''){
            $address=$address.','.$venue_city;
        } else {
            $address=$venue_city;
        }
    }
    if($venue_state!='')
    {
        if($address!=''){
            $address=$address.','.$venue_state;
        } else {
            $address=$venue_state;
        }
    }
    if($venue_country!='')
    {
        if($address!='')
        {
            $address=$address.','.$venue_country;
        } else {
            $address=$venue_country;
        }
    }
}


?>
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDd3TN-IJfIiCcLIkZvNHxDLrByz81eoeM&amp;libraries=places" type="text/javascript"></script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1><?php echo 'Venue'; ?></h1>
            </div>
            <div class="page-header border"></div>
        </div>
        <?php if($error!= '') { ?>
            <div class="alert alert-danger" role="alert">
                <button class="close" data-dismiss="alert">x</button>
                <strong><?php echo ERRORS; ?>!</strong> <?php echo $error;?>
            </div> 
        <?php } ?>
        <?php 
            $attributes = array('name' => 'frm_listVenue' , 'class' => 'site-setting');
            echo form_open('admin/events/add_venue' ,$attributes);
        ?>
            <input type="hidden" name="venue_id" value="<?php echo $venue_id ;?>">
            <div class="row">
                <div class="col-lg-12 clearfix">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo 'Venue'; ?>
                        </div>

                        <div class="panel-body">
                            <div id='New_venue' class="form-group clearfix">
                                <div class="col-sm-3 col-xs-12 lable-rite">
                                    <label><?php echo Venue; ?><span>&#42;</span></label>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" value="<?php echo ($event_venue) ? SecureShowData($event_venue['name']) : ''; ?>" placeholder="Venue Name" id="vanue_name" name="venue_name">
                                    <span id="vanuenameInfo"></span>
                                </div>
                            </div>
                            <div id='location' class="form-group clearfix">
                                <div class="col-sm-3 col-xs-12 lable-rite">
                                    <label><?php echo Location; ?><span>&#42;</span></label>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" onfocus="set_address_value()" value="<?=$address?>" placeholder="<?php echo Specify_where_your_event_will_happen; ?>" autocomplete="off" name="street_address1" id="street_address1" >
                                    <p class="comment"><a onclick="show_div('venue_address_div','location',''); "href="javascript://"><?php echo Cant_find_your_location;?></a></p>
                                    <span id="streetaddressInfo"></span>
                                </div>
                            </div>
                            <div id='venue_address_div' class="form-group clearfix">
                                <div class="col-sm-3 col-xs-12 lable-rite">
                                    <label><?php echo Address; ?></label>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" onkeypress="set_address_value()" onfocus="set_address_value()" placeholder="<?php echo Address_Line; ?> 1" id="sublocality_level_2" name="venue_add1" value='<?php if($venue_id) { echo SecureShowData($venue_add1); } ?>'>
                                    <span class="comment" id="address1errInfo"></span><br /><br />
                                    <input type="text" onkeypress="set_address_value()" onfocus="set_address_value()" placeholder="<?php echo Address_Line; ?> 2" id="sublocality_level_1" name="venue_add2" value='<?php if($venue_id) { echo SecureShowData($venue_add2); } ?>'><br /><br />
                                    <input type="text" onkeypress="set_address_value()" onfocus="set_address_value()" onkeyup="set_address_value()" placeholder="<?php echo City; ?> " id="locality" name="venue_city" value='<?php if($venue_id) { echo SecureShowData($venue_city); } ?>' ><br /><br />
                                    <input type="text" onkeypress="set_address_value()" onfocus="set_address_value()" placeholder="<?php echo 'State'; ?>" id="administrative_area_level_1" name="venue_state" value='<?php if($venue_id) { echo SecureShowData($venue_state); } ?>'  style="width:38%;">
                                    <input type="text" onkeypress="set_address_value()" onfocus="set_address_value()" placeholder="<?php echo "Country"; ?>" id="country" name="venue_country" style="width:38%;" value='<?php if($venue_id) { echo SecureShowData($venue_country); } ?>'>
                                    <br /><br />
                                    <input type="text" onkeypress="set_address_value()" onfocus="set_address_value()" placeholder="<?php echo Zip_Code; ?>" id="postal_code" name="venue_zip" style="width:60%;" value='<?php if($venue_id) { echo SecureShowData($event_venue['venue_zip']); } ?>'>
                                    <span id="addresszipInfo" class="comment" style="margin-left: 41%;"></span>
                                    <p class="comment">  <b><a onclick="show_div('location','venue_address_div','');" href="javascript://"><?php echo 'Reset Address'; ?> </a></b> ? </p>
                                </div>
                            </div>

                            <div class="form-group clearfix">
                                <div class="col-sm-8 col-sm-offset-3 mapimg clearfix" id="map_div">
                                    <div id='map_canvas' style='width: 100%; height: 200px;'> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <?php if(DEMO_MODE=="0"){ ?>
                    <button type="submit" class="btn btn-default btn-lg"><?php echo ($venue_id) ? 'Update Venue' : "Add Venue";?></button>
                <?php } ?>
                <a href="<?php echo base_url('admin/events/list_venue'); ?>" class="btn btn-default btn-lg">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?php $map_address = getip2location(getRealIP()); ?>
<script type="text/javascript">
    var map;
    var geocoder;
    var centerChangedLast;
    var reverseGeocodedLast;
    var currentReverseGeocodeResponse;
    $(document).ready(function(){
        $('#venue_address_div').hide();
        <?php if($venue_id=='') { ?>
            $('#map_div').hide();
            $('#venue_location').hide();
            google.maps.event.addDomListener(window, 'load', initialize);
        <?php } else { ?>
            $('#map_div').show();
            $('#venue_location').show();
            set_map_center('<?php echo $address; ?>');
        <?php } ?>
    });
    function set_map_center(address) {
        var geocoder = new google.maps.Geocoder();
        var mapOptions = {
            zoom: 13
        };
        var markersArray = [];
        var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
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

    function show_div(disp_div, hide_div, val) {
        if (val != '') {
            $('#new_address').val(val);
        }
        $('#' + hide_div).hide();
        $('#' + disp_div).show();
        if (disp_div == 'New_venue') {

            $('#vanue_name').val('');

            empty_field();
            $('#map_div').hide();
            $('#venue_location').hide();
            $('#location').show();
            show_div('', 'venue_address_div', '');

            disabled_field(false);
            initialize('', '');
        }
        if (disp_div == 'venue_list') {
            $('#vanue_name').val('Venue');
            $('#street_address1').val('Location');
            $('#venue_address_div').hide();
            $('#map_div').hide();
            $('#venue_location').show();

            disabled_field(true);

        }
        if (disp_div == 'location') {
            empty_field();
            $('#map_div').hide();
        }
        if (disp_div == 'venue_address_div') {
            $('#map_div').show();
            $('#venue_location').hide();
            <?php if($venue_id !='') { ?>
                $('#street_address1').val('<?php echo $street_address1; ?>');                
            <?php } ?>
        }
    }

    function empty_field() {
        $('#street_address1').val('');
        $('#sublocality_level_1').val('');
        $('#sublocality_level_2').val('');
        $('#administrative_area_level_1').val('');
        $('#locality').val('');
        $('#country').val('');
        $('#postal_code').val('');
    }

    function set_address_value() {

        var address = '';
        $('#address1errInfo').text("");

        address = $('#sublocality_level_2').val();

        if ($('#sublocality_level_1').val() != '') {
            if (address == '') {
                address = $('#sublocality_level_1').val();

            } else {
                address += ', ' + $('#sublocality_level_1').val();
            }
        }



        if ($('#locality').val() != '') {
            if (address == '') {
                address = $('#locality').val();

            } else {
                address += ', ' + $('#locality').val();
            }
        }

        if ($('#administrative_area_level_1').val() != '') {
            if (address == '') {
                address = $('#administrative_area_level_1').val();

            } else {
                address += ', ' + $('#administrative_area_level_1').val();
            }
        }
        if ($('#country').val() != '') {
            if (address == '') {
                address = $('#country').val();

            } else {
                address += ', ' + $('#country').val();
            }
        }

        if ($('#postal_code').val() != '') {
            if (address == '') {
                address = $('#postal_code').val();

            } else {
                address += ', ' + $('#postal_code').val();
            }
        }

        $('#street_address1').val(address);
        set_map_center(address);

    }
    function initialize() {
        var latitude = '<?php echo $map_address['latitude'];?>';
        var longitude = '<?php echo $map_address['longitude'];?>';
        var mapOptions = {
            center: new google.maps.LatLng(latitude, longitude),
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        var input = document.getElementById('street_address1');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            map: map
        });

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            infowindow.close();
            var place = autocomplete.getPlace();
            var j = true;
            for (var i = 0; i < place.address_components.length; i++) {

                var addressType = place.address_components[i].types[0];

                if (addressType == 'sublocality_level_1') {
                    var val = place.address_components[i]['long_name'];
                    document.getElementById('sublocality_level_1').value = val;

                }
                if (addressType == 'sublocality_level_2') {
                    var val = place.address_components[i]['short_name'];
                    document.getElementById('sublocality_level_2').value = document.getElementById('sublocality_level_2').value + ' ' + val;

                }
                if (addressType == 'locality') {
                    var val = place.address_components[i]['short_name'];
                    document.getElementById('locality').value = val;

                }
                if (addressType == 'administrative_area_level_1') {
                    var val = place.address_components[i]['long_name'];
                    document.getElementById('administrative_area_level_1').value = val;

                }
                if (addressType == 'street_number') {
                    var val = place.address_components[i]['short_name'];
                    document.getElementById('sublocality_level_2').value = document.getElementById('sublocality_level_2').value + ' ' + val;

                }
                if (addressType == 'country') {
                    var val = place.address_components[i]['long_name'];
                    document.getElementById('country').value = val;

                }
                if (addressType == 'route') {
                    var val = place.address_components[i]['long_name'];
                    document.getElementById('sublocality_level_2').value = document.getElementById('sublocality_level_2').value + ' ' + val;

                }
                if (addressType == 'postal_code') {
                    var val = place.address_components[i]['short_name'];
                    document.getElementById('postal_code').value = val;

                }
                if (addressType == 'train_station') {


                    var val = place.address_components[i]['short_name'];
                    document.getElementById('sublocality_level_2').value = document.getElementById('sublocality_level_2').value + ' ' + val;
                }
                var val = place.name;
                var value_name = document.getElementById('vanue_name').value;

                if (value_name == "") {
                    console.log(val);
                    document.getElementById('vanue_name').value = val;
                }

            }
            show_div('venue_address_div', 'location', '');
            show_div('', 'venue_location', '');
            set_address_value();

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(13);
            }
            place.icon = 'https://mts.googleapis.com/vt/icon/name=icons/spotlight/spotlight-poi.png';
            var image = new google.maps.MarkerImage(
                place.icon,
                new google.maps.Size(71, 71),
                new google.maps.Point(0, 0),
                new google.maps.Point(17, 34),
                new google.maps.Size(22, 40));
            marker.setIcon(image);
            marker.setAnimation(google.maps.Animation.BOUNCE);
            marker.setPosition(place.geometry.location);

        });
    }
</script>