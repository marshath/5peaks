<?php
// Right Sidebar
?>

<aside id="sidebar" class="span4" style="float:right;">

	<div style="sidebar-sponsor">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Homepage Sidebar") ) : ?>
		<?php endif; ?>
	</div>

	<h3 style="margin-top:1em;">Latest From The Blog</h3>

	<?php

	$the_query = new WP_Query(array(
		'category_name' => 'Blog',
		'posts_per_page' => 2,

		));
		?>

		<?php while ( $the_query->have_posts() ) :
		$the_query->the_post(); ?>

		<article class="latest-news">

			<h4><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>

			<?php the_post_thumbnail('sidebar-news-thumb'); ?>

			<p><?php echo excerpt(9); ?></p>

		</article>

	<?php endwhile; ?>

</aside>
