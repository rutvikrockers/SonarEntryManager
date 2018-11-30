<?php

        $address='';
        $event_venue=$venue;

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
?>

<div id="div_replace">
	<div id='venue_location'  class="form-group clearfix">
        <div class="col-sm-3 col-xs-12 lable-rite">
            <label><?php echo Location; ?><span>&#42;</span></label>
        </div>
        <div class="col-sm-8 col-xs-12">
            <input type="text" value="<?php echo SecureShowData($address); ?>" placeholder="<?php echo Specify_where_your_event_will_happen; ?>" autocomplete="off" name="venue_location_field" id="venue_location_field"  disabled >
            <span id="streetaddressInfo"></span>
        </div>                         
    </div>
</div>