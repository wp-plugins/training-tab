<?php
		global $wpdb;
		$settings_table = $wpdb->prefix . "tt_settings";		

		
		if (isset($_POST['send_it'])){
			foreach ($current_settings as $setting) { };
			$toemail = $setting->email_to;
			if (empty($email)){
				$toemail = "training@techstudio.co";
			}

			$name = $_POST['name'];
			$company = $_POST['company'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$area = $_POST['area_of_training'];
			$method = $_POST['type_of_training'];
			$due_by = $_POST['how_soon'];
			$payment = $_POST['payment_method'];
			$how_to_add = $_POST['how_to_add'];
			$description = $_POST['description'];
			
			$to      = $toemail;
			$subject = 'techstudio.co >> Training Tab >> training request '.$_SERVER['HTTP_HOST'];
			$headers = 'From: '.$email. "\r\n" .
			'Reply-To: '.$email. "\r\n" .
			'X-Mailer: PHP/' . phpversion();

			$message = 
			'New Training Request'. "\r\n" .
			'Name: '.$name. "\r\n" .
			'Company Name: '.$company. "\r\n" .
			'E-mail: '.$email. "\r\n" .
			'Phone: '.$phone. "\r\n" .
			'Training required in '.$area. "\r\n" .
			'Training Method '.$method. "\r\n" .
			'Training is due '.$due_by. "\r\n" .
			'Method of Payment '.$payment. "\r\n" .
			'How to add the Training Video/Materials '.$how_to_add. "\r\n" .
			'Description of training'."\r\n".$description. "\r\n" .
			''
			;
			
		mail($to, $subject, $message, $headers);
		echo '<div class="notices">Message Sent</div>';
			
		}
		
?>
<div class="training-tab-wrapper wrap">
<?php tt_header(); ?>

	<div class="section">
		<h4>Request Training</h4>
		<form id="request_form" method="POST">
			<h5>Name:</h5>
			<input type="text" name="name" value=""><br />
			<h5>Company Name:</h5>
			<input type="text" name="company" value=""><br />
			<h5>E-mail:</h5>
			<input type="text" name="email" value=""><br />
			<h5>Phone:</h5>
			<input type="text" name="phone" value=""><br />
			<p>This information is required in order to properly process your order. Your phone number is optional, but will expedite your request.</p>
			<br />
			<h5>If possible, define the area in which you require training.</h5><br />
			<select name="area_of_training">
				<option value="na">--</option>
				<option value="getting-started">Getting Started: Installation, Setup, Etc.</option>
				<option value="basics">Working With WordPress: Basics, Posts, Pages, Images, Etc.</option>
				<option value="design">Design and Layout</option>
				<option value="advanced">Advanced Topics</option>
				<option value="troubleshooting">Troubleshooting</option>
			</select><br /><br />
			<h5>What type of training best suits your request?</h5><br/>
			<select name="type_of_training">
				<option value="video">Subject-targeted Training Video</option>
				<option value="telephone">Custom video created for your specific question</option>
				<option value="desktop">One-on-one training with video and audio recording for review</option>	
			</select><br/><br />
			<h5>How urgently is this training required?</h5><br/>	
			<select name="how_soon">	
				<option value="whenever">I am in no rush</option>
				<option value="soon">Soon, I'd like to learn this so I can keep working</option>
				<option value="now">It's an emergency, I'm in a bind until I get this figured out</option>
			</select><br /><br />
			<h5>Payment Method</h5><br/>	
			<select name="payment_method">
				<option value="paypal">PayPal Invoice</option>
				<option value="google">Google Checkout</option>
				<option value="techstudio">Bill Me (requires account)</option>
			</select><br /><br />
			<h5>How would you like your training delivered?</h5><br />	
			<select name="how_to_add">
				<option value="na">--</option>
				<option value="email">E-mail it and I'll add it to Training</option>
				<option value="upload">Add it to Training Tab for me</option>
			</select><br /><br />
			<h5>Describe the training you would like to request.</h5><br />
			<textarea name="description" rows="10" cols="30"></textarea><br /><br />
			<input type="submit" name="send_it" value="Send Request">
		</form>
	</div>

</div>
<?php

?>