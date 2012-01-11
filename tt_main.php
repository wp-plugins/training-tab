<?php
	global $wpdb;
	$table_name = $wpdb->prefix . "tt_training";
	$current_training = $wpdb->get_results("SELECT * FROM $table_name");
	tt_header();
?>
<div class="left">	
	<div class="section table-of-contents">
		<h4>Table of Contents</h4>
		<ol>
			<?php foreach ($current_training as $contents){ 
				echo '<li><a href="#Anchor'.$contents->id.'">'.$contents->training_title.'</a></li>';
			}
			?>					
		</ol>
	</div>
<?php foreach ($current_training as $training) : ?>
	<div class="section" id="record-id-<?php echo $training->id; ?>">
		<a name="Anchor<?php echo $training->id ?>"></a>
		<h4><?php echo $training->training_title; ?></h4>
		<?php echo stripslashes($training->training_content); ?>
		<h5>Screencast Video: <?php echo $training->training_title; ?></h5>
		<div class="screencast-video"><?php echo stripslashes($training->training_embed); ?></div>
		<div class="show-hide-wrapper"><a class="show-hide-acc button-secondary" href="javascript:void(0)">Show Video</a></div>
	</div>
<?php endforeach; ?>
</div>

</div><!-- /wrap -->
