<div class="white-popup-block popup-container">
	<div class="popupHead">
    	<h1><?php echo SecureShowData($tip['title']);?></h1>
    </div>
    <p><?php if($tip['description'] != '') { echo SecureShowData($tip['description']); } else { echo NO_TIPS_AVAILABLE;}?></p>
</div>