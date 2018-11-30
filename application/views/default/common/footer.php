<?php 
    $site_setting = site_setting();	
	$pages_data = get_pages();
	
?>
<footer>
    	<div class="footer">
        	<div class="first-footer">
        		<div class="container">
            	
                <div class="footer-list">
                    <ul class="clearfix">
                       <?php foreach($pages_data as $page) { 
					   		$pages_title = $page['pages_title'];
							$slug = $page['slug'];
					   ?>                   
                    	<li class="col-md-2 col-sm-4 col-xs-6">
                        <a href="<?php echo site_url('/pages/'.$slug);?>"><?php echo SecureShowData($pages_title); ?></a></li>
                       <?php } ?> 

                        <li class="col-md-2 col-sm-4 col-xs-6">
                            <a href="<?php echo site_url('home/contact_us');?>"><?php echo CONTACT_US; ?></a>
                        </li>
                        </ul>
                </div><!-- End footer-list-->
           		 </div><!-- End first-footer -->	
            </div><!-- End container-->
            
            <div class="second-footer">
            	<div class="container">
                	
                    <p>
                    	Copyright © <?php echo SecureShowData($site_setting['site_name']); ?> <?php echo date('Y'); ?>. All rights reserved.
                     </p>  
                </div>
            </div>
        </div>
    </footer>
   <!-- End footer-->

    