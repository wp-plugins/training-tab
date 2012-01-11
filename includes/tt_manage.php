<?php
	global $wpdb;
        $table_name = $wpdb->prefix . "tt_training";
		$settings_table = $wpdb->prefix . "tt_settings";		
		
		//Saves Email Setting
		if (isset($_POST['save_settings'])){
		$email = $_POST['settingsemail'];
		
		$wpdb->get_results("UPDATE $settings_table SET 
		email_to='$email'
		WHERE id=1");
		echo '<div class="manage-response"><p>Your Training has been updated.</p></div>';
		}

		//cancel edit/add request and return to normal listing for records
		if (isset($_POST['cancel_it'])){
			echo '<meta http-equiv="refresh" content="0" />';
		}
		
		//deletes record chosen for removal
		if (isset($_POST['delete_record'])){
			$id = $_POST['record_id'];
		$wpdb->query("
		DELETE FROM $table_name WHERE id = $id
					");
		echo '<div class="manage-response"><p>This Training has been deleted.</p></div>';	
		}


		//Performs functions for saving new record or saving edits to existing record
		if (isset($_POST['add_edit'])){
		
				$title = $_POST['tt_title'];
				$content = $_POST['tt_content'];
				$embed = $_POST['tt_embed'];
				$order = $_POST['tt_order'];
				$indent = $_POST['tt_indent'];	
				
			if (empty($_POST['record_id'])){
				$insert = "INSERT INTO " . $table_name . " (
				training_title, 
				training_content, 
				training_embed, 
				training_order, 
				training_indent
				)VALUES (
				'" . $wpdb->escape($title) . "',
				'" . $wpdb->escape($content) . "',
				'" . $wpdb->escape($embed) . "',
				'" . $wpdb->escape($order) . "',
				'" . $wpdb->escape($indent) . "'
				)";
				$results = $wpdb->query( $insert );
		echo '<div class="manage-response"><p>Your Training has been added.</p></div>';
			
			}else{
				$id = $_POST['record_id'];
				$wpdb->get_results("UPDATE $table_name SET 
				training_title='$title',
				training_content='$content',
				training_embed='$embed',
				training_order='$order',
				training_indent='$indent'
				WHERE id=$id");
		echo '<div class="manage-response"><p>This Training has been updated.</p></div>';
			
			
			}
		}

		
		//performs action for ADD or EDIT FORM
		if (isset($_POST['add_record']) || isset($_POST['edit_record'])){

			//checks to see if we are editting or adding record
		if (isset($_POST['edit_record'])){
			$id = $_POST['record_id'];			
			$current_training = $wpdb->get_results("SELECT * FROM $table_name WHERE id=$id");
			foreach ($current_training as $training){}; //turns data from record into variables for display
			} //end add or edit check
?>

<div class="edit_form" id="<?php if (!empty($id)) { echo $id; } else { echo 'new'; } ?>">
	<h4>Training Record</h4>
	<form method="POST" id="edit_form">
		<input type="hidden" name="record_id" value="<?php echo $id ?>" />
		<h5>Training Title:</h5>
		<input type="text" name="tt_title" value="<?php echo $training->training_title ?>" class="tt_title" />
		<h5>Training Content:</h5>
		<textarea name="tt_content" cols="80" rows="10"><?php echo stripslashes($training->training_content) ?></textarea>
		<h5>Add/Change Embedded Video:</h5>
		<p>For now this is designed to embed videos from <a href="http://screencast.com" target="_blank">Screencast.com</a>.</p>
		<textarea name="tt_embed" cols="80" rows="10"><?php echo stripslashes($training->training_embed) ?></textarea>
		
		<?php if ( 0 == 1 ) : // for now we won't show the video while the user is editing ?>
		<h5>Current Video:</h5>
		<div class="screencast-video">
			<?php echo stripslashes($training->training_embed) ?>
		</div>
		<div class="show-hide-wrapper"><div class="show-hide-acc">Show Video</div></div>
		<?php endif; ?>
	
		<?php if ( 0 == 1 ) : //to be implemented later on, order and hierarchy features ?>	
		<h5>Display Options</h5>
		Display Order: <input type="text" name="tt_order" value="<?php //echo $training->training_order ?>"><br/>
		Display Indentation: <input type="text" name="tt_indent" value="<?php //echo $training->training_indent ?>"><br/>
		<?php endif; ?>

		<h5>Finish Editing</h5>
		<?php if ( empty($_POST['record_id']) ) : ?>
		<input type="submit" name="add_edit" value="Add Training">
		<?php else : ?>
		<input type="submit" name="add_edit" value="Save Changes">
		<?php endif; ?>
		<input type="submit" name="cancel_it" value="Cancel">
	</form>
</div>

<?php
	}
        $current_training = $wpdb->get_results("SELECT * FROM $table_name");
		$current_settings = $wpdb->get_results("SELECT * FROM $settings_table");
		foreach ($current_settings as $setting) { };
		$email = $setting->email_to;
 ?>
<div class="training-tab-wrapper wrap">
<?php tt_header(); ?>
<h3>Manage Training Tab</h3>
<p>Use the Manage page to add, edit, organize or delete training items.</p>
<div class="main-function-buttons">
	<form method="POST">
		<input type="submit" name="add_record" value="Add New Training Record">
	</form>
	<div class="clear"></div>
</div>
<h3>Existing Training Items</h3>
<?php 
if ($current_training){ //if any records exist display or else display no records
foreach ($current_training as $training) { ?>
<div class="section" id="record-id-<?php echo $training->id ?>">
	<h4>Training Item ID: <?php echo $training->id ?></h4>
	<div class="main-function-buttons">
		<form method="POST"><input type="hidden" name="record_id" value="<?php echo $training->id ?>">
			<input type="submit" name="edit_record" value="Edit">
		</form>
		<form method="POST" onSubmit="return confirm('Do you wish to remove this Training Video Record');">
			<input type="hidden" name="record_id" value="<?php echo $training->id ?>">
			<input type="submit" name="delete_record" value="Delete">
		</form>
		<div class="clear"></div>
	</div>
	<p><strong>Indention Level: </strong><?php echo $training->training_indent ?></p>
	<p><strong>Training Order: </strong><?php echo $training->training_order ?></p>
	<p><strong>Title: </strong><?php echo $training->training_title ?></p>
	<p><strong>Content: </strong><br /><br /> <?php echo stripslashes($training->training_content) ?></p>
	<p><strong>Video: </strong><br />
		<div class="screencast-video">
<?php echo stripslashes($training->training_embed) ?>
		</div>
		<div class="show-hide-wrapper"><div class="show-hide-acc">Show Video</div></div>
	</p>
</div>
<?php
	} //end foreach loop
}else{
echo "<div class='manage-response'><p>There are currently no Training records.</p></div>";
} //end main IF Statement
?>

<div class="section set-email">
	<h4>Training Request Delivery</h4>
	<p>By default, training requests are delivered to the TechStudio, the plugin creators, to be filled. If you'd like to manage those requests yourself, enter an e-mail address for those requests to be delivered to.</p>
	<form method="POST" id="settings_form">
		<strong>E-mail: </strong><input type="text" name="settingsemail" value="<?php echo $email ?>"><br /><br />
		<input type="submit" name="save_settings" value="Save">
	</form>
</div>

</div>

</div><!-- /wrap -->

<?php

?>