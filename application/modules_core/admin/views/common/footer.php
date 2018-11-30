<?php $site_setting = site_setting(); ?>
<footer style="display: none;">
    <div class="footer">
        <p class="text-center">Copyright © <?php echo date('Y'); ?> <a href="<?php echo base_url(); ?>" target="_blank"><?php echo SecureShowData($site_setting['site_name']); ?> </a> . All rights reserved.</p>
    </div>
</footer>
<script type="text/javascript">
	$( document ).ready(function() {
	    var winHeight = $( window ).height();
	    var footHeight = $( ".footer" ).height();
	    var footWidth = $( ".footer" ).width()+"px";
	    var wrapperHeight = $( "#page-wrapper" ).height();
	    var minwrapperHeight = winHeight - footHeight;
	    if (wrapperHeight < minwrapperHeight) {
		    $(".footer").css({"bottom": "0", "position": "fixed", "width": footWidth});

		}
	});
</script>