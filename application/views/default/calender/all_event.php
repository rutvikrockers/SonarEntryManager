<?php 
	foreach ($event_check as $key => $value) {
        $event_check[$key]['title']=SecureShowData($value['title']);
		$event_check[$key]['description']=strip_tags($value['description']);
		$event_image = event_image($value['eventId']);
		$event_check[$key]['image'] = ($event_image) ? base_url().'upload/event/thumb/'.$event_image['image_name'] : base_url().'images/898351default-image.png';
	}
	$check = json_encode($event_check);
?>

<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"/>
<link href="<?php echo base_url('fullcalender/fullcalendar.css');?>" rel='stylesheet' />

<link href="<?php echo base_url('fullcalender/fullcalendar.print.css');?>" rel='stylesheet' media='print' />
<script src="<?php echo base_url('fullcalender/lib/moment.min.js');?>"></script>
<script src="<?php echo base_url('fullcalender/lib/jquery-ui.custom.min.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/gcal.js"></script>
<script src="<?php echo base_url();?>js/ics.deps.min.js"></script>

<script>
	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
		 header: {
        	left: 'prev,next today',
        	center: 'title',
        	right: 'month,agendaWeek,agendaDay'
    	},
		eventMouseover: function(calEvent, jsEvent) {
		    var tooltip = '<div class="tooltipevent" style="width:100px;height:100px;background:#ccc;position:absolute;z-index:10001;">'+"Click To Show Event Details for "+"'"+calEvent.title.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')+"'"+'</div>';
		    $("body").append(tooltip);
		    $(this).mouseover(function(e) {
		        $(this).css('z-index', 10000);
		        $('.tooltipevent').fadeIn('500');
		        $('.tooltipevent').fadeTo('10', 1.9);
		    }).mousemove(function(e) {
		        $('.tooltipevent').css('top', e.pageY + 10);
		        $('.tooltipevent').css('left', e.pageX + 20);
		    });
		},

		eventMouseout: function(calEvent, jsEvent) {
		    $(this).css('z-index', 8);
		    $('.tooltipevent').remove();
		},
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				document.getElementById("vresult").innerHTML = "";
				var title = prompt('Enter Event Title:');
				var T = Test(title);
				if (T == false | T == "null") {
        			document.getElementById("vresult").innerHTML = "You did not enter a valid event title!";
    			} else {
				var eventData;
				if (title) {
					eventData = {
						title: title,
						start: start,
						end: end
					};

					$.ajax ({
                        url: "<?php echo site_url('Calender/test/');?>",
                        type: 'POST',
                        data: {'event_title': title, 'event_start_date_time' : start.format(), 'event_end_date_time': end.format()},
                        success: function(msg) {
                            window.location.href = "<?php echo site_url('event/edit_event/');?>/"+msg.trim();
                        }
                    });

					eventData.color = '#d0baa8';
					eventData.borderColor = '1px solid #3a87ad';
					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
				}
				$('#calendar').fullCalendar('unselect');
				}
			},

			editable: false,
			eventLimit: true,
			
			events: <?php echo json_encode($event_check);?>,
			eventClick:  function(event, jsEvent, view) {
                    $('#modalTitle').html("Event Details");
                    $('#eventTitle').html("Event Name : "+ event.title.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-'));
                    $('#eventstart').html("Event Start Date : "+ event.start.format());
                    if(event.end) {
                    	$('#eventend').html("Event End Date : "+ event.end.format());
                    } else {
                    	$('#eventend').html("Event End Date : Unspecified");
                    }
                    $('#eventdescription').html("Event Description : "+event.description.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-'));
                    if(event.venue_add1) {
                    	$('#eventlocation').html("Event Location : "+ event.venue_add1.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')+","+event.venue_add2.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')+","+event.venue_city.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')+","+event.venue_state.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')+","+event.venue_country.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')+"-"+event.venue_zip.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-'));
                    } else {
                    	$('#eventlocation').html("Event Location : Unspecified");
                    }
                    if(event.event_active == 0) {
                    	$('#eventedit').show();
                    	$('#eventedit').attr('href',"<?php echo site_url('event/edit_event/');?>"+"/"+event.eventId);
                    } else {
                    	$('#eventedit').hide();
                    }
                    $('#eventview').attr('href',"<?php echo site_url('event/view/');?>"+"/"+event.event_url_link);
                    $('#eventImg').attr('src', event.image);
                    $('#fullCalModal').modal();
                    return false;
            },
		});
 
		var checkboxes = $("input[type='checkbox']");
		checkboxes.on('change', function() {
			if(!$(this).is(":checked")) {
				$("#all_events").prop('checked', false);
			}
			if($('#all_events').is(":checked")) { 
			} else {
			    $('input[id=search_type]').val(
			        checkboxes.filter(':checked').map(function(item) {
			            return this.value;
			        }).get().join(',')
		     	);
			}
		});

	});
	
	function allEvents(me) {
		if($(me).is(":checked")) { 
			$('input[id=search_type]').val("all");
			$(".eventStatus").each(function() {
				$(this).prop('checked', 'checked');
			});
		} else {
			$(".eventStatus").each(function() {
			    $('input[id=search_type]').val($(this).val()).get().join(',');
			});
		}
	}
	

	function getSelectedValue(id) {
		var event_type = id.value;		
	    //$('input[id=search_type]').val(event_type);
	}
	function Test(str) {
    	return /^[a-z A-Z 0-9]+$/.test(str)
	}

</script>
<style>

	body {

	}
	#loading {
		display: none;
		position: absolute;
		top: 10px;
		right: 10px;
	}
	#calendar {
		max-width: 900px;
		margin: 10px 0px;
	}
	.btn-calender {
	    text-align: center;
	    background: #e0336b;
	    padding: 5px 20px;
	    display: block;
	    font-size: 15px !important;
	    text-transform: uppercase;
	    font-weight: 300;
	    color: #FFF;
	    border-radius: 5px;
	    border: none !important;
	    display: inline-block;
	    -webkit-transition: all ease-in-out .15s;
	    transition: all ease-in-out .15s;
	}
	.tooltipevent {
		display:none;
		position:absolute;
		border:1px solid #333;
		background-color:#161616;
		border-radius:5px;
		padding:10px;
		color:#e0336b;
		font-size:12px Arial;
		cursor:hand;
	}


</style>
<div class="container marTB50">
	<p id="vresult" style="text-align: center;font-size: larger;color: red;"></p>
	<div class="marTB20">
		<a class="btn btn-primary" id="exporet" href="<?php echo base_url();?>calender/export_data_event"><i class="glyphicon glyphicon-download-alt"></i> <?php echo EXPORT_TO_CSV_REPORT?></a>	
	</div>
<div class="row">
    <?php
		$attributes = array('id'=>'calender','name'=>'calender','method'=>'post','accept-charset'=>'UTF-8');
		echo form_open_multipart('calender', $attributes);
	?>
		<div class="col-md-2 col-md-push-10">
		<ul class="event-lable event-calender">
		<?php
			$total_event_count = $event_draft_count+$event_live_count+$event_completed_count+$event_cancel_count;
		?>
		<li>
			<label>
				<input id="all_events" type="checkbox" name="event_search" value="all" <?php echo (in_array("all", $calender_search_type)) ? "checked='checked'" : ''; ?> onclick="allEvents(this);"> <i></i> <span></span> <?php echo ALL;?> <?php echo '('.$total_event_count.')';?>
			</label>
		</li>
		<?php if($event_type_data){
			foreach ($event_type_data as $value) {
            $status_id = $value['status_id'];
			$event_count = "";
			if($status_id=="0"){ $event_count = $event_draft_count; }
			if($status_id=="1"){ $event_count = $event_live_count; }
			if($status_id=="2"){ $event_count = $event_completed_count; }
			if($status_id=="3"){ $event_count = $event_cancel_count; }
		?>
	       		<li>
		       		<label>
		       			<input class="eventStatus" type="checkbox" name="event_search" value="<?php echo $status_id; ?>" onclick="getSelectedValue(this);" <?php echo (in_array($status_id, $calender_search_type) || in_array("all", $calender_search_type)) ? "checked='checked'" : ''; ?>> <i></i>  
		       			<span style="background-color:<?php echo $value['event_bg_color']; ?>;"></span>
		       			
		       				<?php echo SecureShowData($value['name']).' ('.$event_count.')';?> 
	   				</label>	       				
	       		</li>
	    <?php
	    	} 
	    }
	    ?>
	    <input type="hidden" name="search_type" id="search_type" value="">
	    </ul>
	        <button type="submit" class="btn-calender"><?php echo SEARCH;?></button>
		</div>
		<script type="text/javascript">
			$(document).ready(function () { 
				$('form#calender').submit(function(event) {
					event.preventDefault();
                    window.location.href = "<?php echo site_url('calender');?>?search_type="+$('#search_type').val();
				});
			});
		</script>
		
	</form>
	<div class="col-md-10 col-md-pull-2">

		<div id='calendar'></div>
		 <div id="fullCalModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only"> <?php echo CLOSE;?></span></button>
                    <h4 id="modalTitle" class="modal-title"></h4>
                </div>
                <div id="modalBody" class="modal-body">
                	<h5 id="eventTitle" class="modal-title"></h5>
                	<h5 id="eventstart" class="modal-title"></h5>
                	<h5 id="eventend" class="modal-title"></h5>
                	<h5 id="eventdescription" class="modal-title"></h5>
                	<h5 id="eventlocation" class="modal-title"></h5>
                	<img id="eventImg" src="<?php echo base_url(); ?>images/898351default-image.png" alt=" " height="150px" class="img-responsive smallimg" style="float: right;position: absolute;right: 16px;top: 8px;height: 70px;"> 
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" id="eventview" target="_blank"><?php echo VIEW?> <?php echo EVENT?></a>
                    <a class="btn btn-primary" id="eventedit" target="_blank"><?php echo EDIT?> <?php echo EVENT?></a>
                </div>
            </div>
        </div>
    </div>
	</div>
	

</div>
</div>
<style type="text/css">
	.event-lable li{
		list-style:none;

	}
</style>
<script type="text/javascript">
var cal = ics();
var json = <?php echo json_encode($download_event_ical) ?>;
for (var i = 0; i < json.length; i++) {	
	cal.addEvent(json[i].title,json[i].description,json[i].location+" "+json[i].location1+" "+json[i].location2,json[i].start,json[i].end);
}

</script>