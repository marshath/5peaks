<?php


get_header(); ?>


<?php $the_query = new WP_Query( 'pagename=general-information' ); ?>

<?php while ( $the_query->have_posts() ) :
	$the_query->the_post(); ?>

<?php
// get_template_part( 'sidepanel-submenu' );
?>

<section id="main-content" class="span4">

	<h1 class="delay-quarter"><?php the_title(); ?></h1>

	<!-- 	<img src="<?php the_field('featured_image'); ?>" alt="" /> -->
	<div class="homepage-featured">
		<?php if (get_field('featured_image') ): ?>
			<img src="<?php the_field('featured_image'); ?>" alt="" />
		<?php endif; ?>

		<?php if (get_field('featured_text') ):	?>
			<div class="featured-caption"><?php the_field('featured_text'); ?></div>
		<?php endif; ?>
	</div>
	<?php the_content();

	if (get_field('secondary_sponsor_link'))	{ ?>
		<a href="<?php the_field('secondary_sponsor_link'); ?>" target="sponsor">
	<?php } ?>
		<img src= "<?php the_field('secondary_sponsor_logo'); ?>" alt="
		<?php if (get_field('secondary_sponsor_name')) {
			the_field('secondary_sponsor_name'); ?>
			">
		<?php } 
		if (get_field('secondary_sponsor_link')) { ?>
		</a>
	<?php }	endwhile; ?>

</section><!-- #main-content -->

<section class="span4 sidebar-hm">	
	<a title="<?php the_field('secondary_sponsor_name') ?>" href="<?php the_field('secondary_sponsor_link') ?>"><img class="wp-image-3687" src="<?php the_field('secondary_sponsor_image') ?>" alt="<?php the_field('secondary_sponsor_name') ?>" width="300" height="300" /></a>
	
</section><!-- ad content -->

<section class="span4 events-hm" style="margin-top:4em;">
	<?php the_content(); ?>
</section><!-- main content -->

<?php get_sidebar( 'hmRight' ); ?><!-- Right sidebar -->

<?php get_footer(); ?>
