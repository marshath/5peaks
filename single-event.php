<?php

/*
Template Name: Events
*/
?>

<?php get_header(); ?>

<section id="main-content" class="span8">

	<?php
	global $post;

	$EM_Event = em_get_event($post->ID, 'post_id');
	?>

	<h1><?php echo $EM_Event->output('#_EVENTNAME'); ?></h1>

	<div class="event-info">

		
		<div class="event-featured-img"><?php echo $EM_Event->output('#_EVENTIMAGE'); ?></div>
		
		<div class="button-container">
			<p>
				<?php
					// register link (ACF)
					$rl = get_field('registration_link');
				
					echo $EM_Event->output(
					"{is_future}<a class='register-btn' href='{$rl}' target='_blank'><i class='icon-user'></i> Register Now</a>{/is_future}");
				
				?>
				
					<?php
					// volunteer link (ACF)
					$vl = get_field('volunteer_link');
				
					echo $EM_Event->output(
					"{is_future}<a class='volunteer-btn' href='{$vl}' target='_blank'><i class='icon-heart'></i> Volunteer Now</a>{/is_future}");
				
				?>
	
			</p>
			
			<p>
				<?php echo $EM_Event->output('{is_past}<h4>This event is over. Check the Race Results link below for information about what happened.</h4>{/is_past}');?>
			</p>
		
	</div>



			<h4>Description:</h4>
			<?php the_field('notes'); ?>




			<h4>When</h4>
			<?php echo $EM_Event->output('#_EVENTDATES'); ?>





				<h4>Directions:</h4>
				<?php the_field('directions'); ?> <br><?php the_field('directions_map_link'); ?>

				<h4>Where:</h4>
				<?php echo $EM_Event->output('#_LOCATIONMAP'); ?><br>
					<?php the_field('location_details'); ?>


				<h4>Event Schedule:</h4>
				<?php the_field('event_schedule'); ?>



				<h4>Distance &amp; Fees:</h4>

					<table>
<tr>
							<td><h4>Category</h4></td>
							<td><h4>Distance</h4></td>
							<td><h4>Early Bird</h4></td>
							<td><h4>Regular</h4></td>
							<td><h4>Race Day</h4></td>
</tr>
<tr>
							<td>Childrens Challenge</td>
							<td><?php the_field('childrens_challenge_distance_text'); ?></td>
							<td><?php the_field('childrens_challenge_early_bird_cost'); ?></td>
							<td><?php the_field('childrens_challenge_regular_cost'); ?></td>
							<td><?php the_field('childrens_challenge_race_day_cost'); ?></td>
</tr>
<tr>
							<td>Timed Kids Race</td>
							<td><?php the_field('timed_kids_race_distance_text'); ?></td>
							<td><?php the_field('timed_kids_early_bird_cost'); ?></td>
							<td><?php the_field('timed_kids_regular_cost'); ?></td>
							<td><?php the_field('timed_kids_race_day_cost'); ?></td>
</tr>
<tr>
							<td>Sports Course</td>
							<td><?php the_field('sport_course_distance_text'); ?></td>
							<td><?php the_field('sport_course_early_bird_cost'); ?></td>
							<td><?php the_field('sport_course_regular_cost'); ?></td>
							<td><?php the_field('sport_course_race_day_cost'); ?></td>
</tr>
<tr>
							<td>Enduro Course</td>
							<td><?php the_field('enduro_course_distance_text'); ?></td>
							<td><?php the_field('enduro_course_early_bird_cost'); ?></td>
							<td><?php the_field('enduro_course_regular_cost'); ?></td>
							<td><?php the_field('enduro_course_race_day_cost'); ?></td>
</tr>
<tr>
							<td>Half Marathon Course</td>
							<td><?php the_field('half_marathon_distance_text'); ?></td>
							<td><?php the_field('half_marathon_early_bird_cost'); ?></td>
							<td><?php the_field('half_marathon_regular_cost'); ?></td>
							<td><?php the_field('half_marathon_race_day_cost'); ?></td>
</tr>

					</table>




				<h4>Terrain:</h4>
				<?php the_field('terrain_text'); ?>



				<h4>Elevation Gain:</h4>

					<h4>Half Marathon Course:</h4> <?php the_field('half_marathon_elevation_gain_text'); ?>
					<h4>Enduro Course:</h4> <?php the_field('enduro_elevation_gain_text'); ?>
					<h4>Sport Course:</h4> <?php the_field('sport_elevation_gain_text'); ?> <br/>




				<h4>First Aid &amp; Water Stations:</h4>
				<?php the_field('first_aid_&_water_stations'); ?>



				<h4>Washrooms:</h4>
				<?php the_field('washrooms'); ?>



				<h4>Parking:</h4>
				<?php the_field('parking'); ?>



				<h4>Important Notes</h4>
				<?php the_field('important_notes'); ?>



				<h4>Spectators:</h4>
				<?php the_field('spectators'); ?>



				<h4>Awards &amp; Prizes:</h4>
				<?php the_field('awards_and_prizes'); ?>



				<h4>Racer List:</h4>
				<?php if( get_field('racer_list') ): ?>
					<a href="<?php the_field('racer_list'); ?>" target="_blank" >View Racer List</a>
				<?php endif; ?>



		<h4>Race Maps</h4>

			<?php if( get_field('enduro_course_map') ):
			?><a href="<?php the_field('enduro_course_map'); ?>" >Enduro Course Map</a>
		<?php endif; ?> <br/>
		<?php if( get_field('sport_course_map') ):
		?><a href="<?php the_field('sport_course_map'); ?>" >Sport Course Map</a>
	<?php endif; ?><br/>
	<?php if( get_field('half_marathon_course_map') ):
	?><a href="<?php the_field('half_marathon_course_map'); ?>" >Half Marathon Course Map</a>
<?php endif; ?>





	<h4>Registration Deadline and Fee:</h4>
	<?php the_field('registration_deadline'); ?>



	<h4>Early Bird Deadline and Fees</h4>
	<?php the_field('early_bird_deadline'); ?>



	<h4>Registration:</h4>
	<a href="<?php the_field('registration_link'); ?>" class="register-btn" target='_blank'><i class='icon-user'></i> Register Now</a>




</table>



<!-- <div class="entry-content">
	<p>-->
		<?php // echo $EM_Event->output('#_EVENTNOTES'); //This is the main content field for the event, currently hidden.?>
	<!-- </p>
</div> -->


</section><!-- #main-content -->


<?php get_template_part('sidepanel-events');
get_footer(); ?>
