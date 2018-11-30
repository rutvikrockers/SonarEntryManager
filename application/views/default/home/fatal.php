<div class="main tac">
    <div class="error_404">
        <div class="img_404">
            <img src="<?php echo base_url();?>images/404.png" alt="404" />
        </div>
        <div class="text_404">
            <h2><?php echo SORRY;?></h2>
            <h3><?php echo SERVER_ERROR;?></h3>
            <p><?php echo THE_SERVER_TOOK_TOO_LONG_TO_DISPALY_WEBPAGE_TRY_LATER_CONTACT_SITE_ADMINISTRATOR;?> <a id='fatal' href="javascript:void(0)">here.</a></p>
            <a href="<?php echo site_url('home/index');?>" class="inputB_Default_S"><?php echo RETURN_TO_HOME_PAGE;?></a>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script>
	$(document).ready(function(){
		$('#fatal').click(function(){
			$('#contact_us').trigger('click');
		});
	});
</script>