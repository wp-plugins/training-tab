<?php

/*
This is the standard TechStudio header. We put this here to promote our business. If you are clever enough to open this page and remove it, then more power to you. But consider donating to our cause... WordPress plugins that developers use to make a living, WordPress plugins that help WordPress users get more out of the platform. :)

http://techstudio.co/wordpress/plugins/training-tab

Thanks,
TechStudio
*/

function tt_header() {

?>
<h2>Training Tab</h2>
<p class="detailed-info">Version 1.1.2</p>
<p class="info">This training is being managed and displayed by the Training Tab WordPress plugin by TechStudio.</p>

<div class="tt-header section">
	<div class="left">
		<h3>Donate</h3>
		<p>
			<div class="paypal-donate-button">
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="AX2GAZSZERJPW">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
			</div>
		We at TechStudio hope you like this plugin and find it useful. In order to help promote the continued development and maintenance of this plugin, consider donating to the TechStudio plugin cause. For those of you who use this plugin as a source of revenue, consider donating a small percentage to maintain the plugin.</p>
		<h3>About This Plugin</h3>
		<p>Thank you for using Training Tab by TechStudio. For general details or to get updates on this plugin, check out the <a href="http://wordpress.org/extend/plugins/training-tab/" target="_blank">plugin page</a> at <a href="http://www.wordpress.org"  target="_blank">wordpress.org</a>. Documentation outlining the use of this plugin can be found on the <a href="http://techstudio.co/wordpress/plugins/training-tab" target="_blank">plugin page</a> at <a href="http://www.techstudio.co" target="_blank">techstudio.co</a>. We love to hear from our users. If you would like to <a href="http://techstudio.co/wordpress/plugins/training-tab" target="_blank">report a bug</a>, <a href="http://techstudio.co/wordpress/plugins/training-tab" target="_blank">request features</a> or talk to us for any other reason, visit us at <a href="http://www.techstudio.co" target="_blank">techstudio.co</a>.</p>
		<h3>Request Training For Your Training Tab</h3>
		<p>Are you an end-user who needs training on how to get the most out of WordPress? We're here to provide you with the one-on-one training, documentation and videos that you need.</p>
		<p><a href="admin.php?page=tt-request">Request Training</a></p>
	</div>
	<div class="right">
		<div class="ads125">
			<h3>Please Consider Our Advertisers</h3>
			<iframe src="http://techstudio.co/ads?include=yes" height="310" width="369" scrolling="no"></iframe>
			<!-- <p>TechStudio community members can hide this header. Join the TechStudio community today.</p> -->
		</div>
	</div>
	<div class="clear:both"></div>
</div>
<?php

}
