<?php ?>

<div class="training-tab-wrapper wrap">
<?php tt_header(); ?>
	<h3>Your Training Items</h3>
	<div class="section table-of-contents">
		<h4>Table of Contents</h4>
		<?php
			global $wpdb;
			$table_name = $wpdb->prefix . "tt_training";
			$current_training = $wpdb->get_results("SELECT * FROM $table_name");
		?>
		<ul>
			<li>
				<a href="#">How-To Videos</a>
				<ul>
					<?php foreach ($current_training as $contents){ 
						echo '<li><a href="#Anchor'.$contents->id.'">'.$contents->training_title.'</a></li>';
					}
					?>					
				</ul>
			</li>
		</ul>
	</div>
	
	<h3>How-To Videos</h3>
<?php
	//testing new code for importing from DB
			foreach ($current_training as $training){		
?>
	<div class="section" id="record-id-<?php echo $training->id ?>">
		<h4><?php echo $training->training_title ?></h4>
		<?php echo stripslashes($training->training_content) ?>
		<h5>Screencast Video: <?php echo $training->training_title ?></h5>
		<div class="screencast-video">
<?php echo stripslashes($training->training_embed) ?>
		</div>
		<div class="show-hide-wrapper"><div class="show-hide-acc">Show Video</div></div>
	</div>
		<a name="Anchor<?php echo $training->id ?>"></a>
<?php
}; //end foreach loop that pulls the info
//end testing
?>	

</div>

</div><!-- /wrap -->

<?php ?>
