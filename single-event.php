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
					"{is_future}<a class='register-btn' href='{$rl}' target='_blank'><i class='icon-user'></i> <span class='en'>Register Now</span> <span class='fr'>Inscrivez-vous maintenant</span></a>{/is_future}");
				
				?>
				
					<?php
					// volunteer link (ACF)
					$vl = get_field('volunteer_link');
				
					echo $EM_Event->output(
					"{is_future}<a class='volunteer-btn' href='{$vl}' target='_blank'><i class='icon-heart'></i> <span class='en'>Volunteer Now</span> <span class='fr'>Engagez-vous maintenant</span></a>{/is_future}");
				
				?>
	
			</p>
			
			<p>
				<?php echo $EM_Event->output('{is_past}<h4>This event is over. Check the Race Results link below for information about what happened. Cette manifestation est termin?e. Cliquez sur le lien R?sultats de la course ci-dessous pour plus d\'informations ? propos de ce qui s\'est pass?.</h4>{/is_past}');?>
			</p>
		
	</div>



			<h4><span class="en">Description:</span> <span class="fr">Description:</span></h4>
			<p><?php the_field('notes'); ?></p>




			<h4><span class="en">When</span> <span class="fr">Quand:</span></h4>
			<?php echo $EM_Event->output('#_EVENTDATES'); ?>





				<h4><span class="en">Directions:</span> <span class="fr">Itineraire:</span></h4>
				<?php the_field('directions'); ?> <br><?php the_field('directions_map_link'); ?>

				<h4><span class="en">Where:</span> <span class="fr">Instructions:</span></h4>
				<?php echo $EM_Event->output('#_LOCATIONMAP'); ?><br>
					<?php the_field('location_details'); ?>


				<h4><span class="en">Event Schedule:</span> <span class="fr">Dalendrier des evenements:</span></h4>
				<?php the_field('event_schedule'); ?>



				<h4><span class="en">Distance &amp; Fees:</span> <span class="fr">Distance et frais:</span></h4>

					<table>
<tr>
							<td><h4><span class="en">Category</span> <span class="fr">Categorie:</span></h4></td>
							<td><h4><span class="en">Distance</span> <span class="fr">Distance:</span></h4></td>
							<td><h4><span class="en">Early Bird</span> <span class="fr">Preinscription:</span></h4></td>
							<td><h4><span class="en">Regular</span> <span class="fr">Ordinaire:</span></h4></td>
							<td><h4><span class="en">Race Day</span> <span class="fr">Jour de la Race:</span></h4></td>
</tr>
<tr>
							<td><span class="en">Childrens Challenge</span> <span class="fr">Defi enfants</span></td>
							<td><?php the_field('childrens_challenge_distance_text'); ?></td>
							<td><?php the_field('childrens_challenge_early_bird_cost'); ?></td>
							<td><?php the_field('childrens_challenge_regular_cost'); ?></td>
							<td><?php the_field('childrens_challenge_race_day_cost'); ?></td>
</tr>
<tr>
							<td><span class="en">Timed Kids Race</span> <span class="fr">Timed enfants Race</span></td>
							<td><?php the_field('timed_kids_race_distance_text'); ?></td>
							<td><?php the_field('timed_kids_early_bird_cost'); ?></td>
							<td><?php the_field('timed_kids_regular_cost'); ?></td>
							<td><?php the_field('timed_kids_race_day_cost'); ?></td>
</tr>
<tr>
							<td><span class="en">Sports Course</span> <span class="fr">Cours de sport</span></td>
							<td><?php the_field('sport_course_distance_text'); ?></td>
							<td><?php the_field('sport_course_early_bird_cost'); ?></td>
							<td><?php the_field('sport_course_regular_cost'); ?></td>
							<td><?php the_field('sport_course_race_day_cost'); ?></td>
</tr>
<tr>
							<td><span class="en">Enduro Course</span> <span class="fr">Course Enduro</span></td>
							<td><?php the_field('enduro_course_distance_text'); ?></td>
							<td><?php the_field('enduro_course_early_bird_cost'); ?></td>
							<td><?php the_field('enduro_course_regular_cost'); ?></td>
							<td><?php the_field('enduro_course_race_day_cost'); ?></td>
</tr>
<tr>
							<td><span class="en">Half Marathon Course</span> <span class="fr">Demi-cours Marathon</span></td>
							<td><?php the_field('half_marathon_distance_text'); ?></td>
							<td><?php the_field('half_marathon_early_bird_cost'); ?></td>
							<td><?php the_field('half_marathon_regular_cost'); ?></td>
							<td><?php the_field('half_marathon_race_day_cost'); ?></td>
</tr>

					</table>




				<h4><span class="en">Terrain:</span> <span class="fr">Plot:</span></h4>
				<?php the_field('terrain_text'); ?>



				<h4><span class="en">Elevation Gain:</span> <span class="fr">Denivele:</span></h4>

					<h4><span class="en">Half Marathon Course:</span> <span class="fr">Demi-cours Marathon:</span></h4> <?php the_field('half_marathon_elevation_gain_text'); ?>
					<h4><span class="en">Enduro Course:</span> <span class="fr">Course Enduro:</span></h4> <?php the_field('enduro_elevation_gain_text'); ?>
					<h4><span class="en">Sport Course:</span> <span class="fr">Cours de sport:</span></h4> <?php the_field('sport_elevation_gain_text'); ?> <br/>




				<h4><span class="en">First Aid &amp; Water Stations:</span> <span class="fr">Secourisme et de l'eau des stations:</span></h4>
				<?php the_field('first_aid_&_water_stations'); ?>



				<h4><span class="en">Washrooms:</span> <span class="fr">Toilettes:</span></h4>
				<?php the_field('washrooms'); ?>



				<h4><span class="en">Parking:</span> <span class="fr">Parking:</span></h4>
				<?php the_field('parking'); ?>



				<h4><span class="en">Important Notes</span> <span class="fr">Remarques importantes:</span></h4>
				<?php the_field('important_notes'); ?>



				<h4><span class="en">Spectators:</span> <span class="fr">Spectateurs:</span></h4>
				<?php the_field('spectators'); ?>



				<h4><span class="en">Awards &amp; Prizes:</span> <span class="fr">Recompenses et prix:</span></h4>
				<?php the_field('awards_and_prizes'); ?>



				<h4><span class="en">Results:</span> <span class="fr">Resultats:</span></h4>

					<?php if( get_field('race_map_1') ):
					?><a href="<?php the_field('results_pdf'); ?>" >Race Results</a> (PDF)
				<?php endif; ?> <br/>
				<?php if( get_field('race_map_2') ):
				?><a href="<?php the_field('results_html'); ?>" >Race Results</a> (HTML)
			<?php endif; ?>





		<h4><span class="en">Race Maps</span> <span class="fr">Cartes de course</span></h4>

			<?php if( get_field('enduro_course_map') ):
			?><a href="<?php the_field('enduro_course_map'); ?>" >Enduro Course Map</a>
		<?php endif; ?> <br/>
		<?php if( get_field('sport_course_map') ):
		?><a href="<?php the_field('sport_course_map'); ?>" >Sport Course Map</a>
	<?php endif; ?><br/>
	<?php if( get_field('half_marathon_course_map') ):
	?><a href="<?php the_field('half_marathon_course_map'); ?>" >Half Marathon Course Map</a>
<?php endif; ?>





	<h4><span class="en">Registration Deadline and Fee:</span> <span class="fr">Date limite d'inscription et frais:</span></h4>
	<?php the_field('registration_deadline'); ?>



	<h4><span class="en">Early Bird Deadline and Fees</span> <span class="fr">Les frais de preinscription et frais:</span></h4>
	<?php the_field('early_bird_deadline'); ?>



	<h4><span class="en">Registration: </span><span class="fr">Inscription:</span></h4>
	<a href="<?php the_field('registration_link'); ?>" class="register-btn" target='_blank'><i class='icon-user'></i> <span class="en">Register Now </span><span class="fr">Inscrivez-vous maintenant</span></a>




</table>



<!-- <div class="entry-content">
	<p>-->
		<?php // echo $EM_Event->output('#_EVENTNOTES'); //This is the main content field for the event, currently hidden.?>
	<!-- </p>
</div> -->


</section><!-- #main-content -->


<?php get_template_part('sidepanel-events');
get_footer(); ?>
