<style>
	.error-dis p {
		font-size: 16px;
		margin-bottom: 20px;
		text-align: center;
	}	
	.error-dis .notfound-dis {
		text-align: center;
		display: table;
		margin: 0 auto;
	}
</style>
<section>
	<div class="container">
		<div id="event_view_page_theme">
			<div id="event_theme_page_change">
				<div class="pt">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct">
						<h1>
							<?php echo "In process";?>
						</h1>
					</div>
				</div>
				<!-- End pt -->
				<div class="clearfix"></div>
				<div class="festival pb"></div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pt15 open-air">
					<div class="col-lg-12 lucha error-dis pb">
						<p>
							<?php echo "Your order is in under process, please wait for few minute(s)."; ?>
						</p>
						<div class="notfound-dis">
							<a href="<?php echo site_url('event/view').'/'.$event_details['event_url_link']; ?>" class="btn-event2">
								<?php echo BACK_TO_EVENT;?>
							</a>
						</div>
					</div>
					<!-- End lucha -->
				</div>
			</div>
			<!-- End open-air -->
			<div class="pb"></div>
		</div>
	</div>
	<!-- End container -->
	<div class="pb"></div>
</section>
<script type="text/javascript">
	$(document).ready(function() {
		setTimeout(function(){
			window.location.reload(true);
		}, 7000);
	});
</script>