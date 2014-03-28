<?php
// Right Sidebar
?>

<aside id="sidebar" class="span4">

	<?php get_template_part('sidepanel-signup'); ?>
	
	<div class="side-icons">
		<h3><span class="en">Follow us on</span><span class="fr">Suivez-nous sur</span></h3>
		<?php get_template_part('sidepanel-social'); ?>
	</div>

	<!-- <div id="submenu" role="complementary">
		  <nav style="margin-bottom:4em;">
			    <h3>Discover more...</h3>
			    <?php
			    if($post->post_parent)
			      $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
			    else
			      $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
			      // Add icon html before the LI with link_before -
			      // $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0&link_before=<i class="icon-something"></i>');
			    if ($children) { ?>
			    <ul class="submenu-children">
			      <?php echo $children; ?>
			    </ul>
			    <?php } ?>
		  </nav>
	</div> -->

	<h3><span class="en">Latest From The Blog</span><span class="fr">Dernieres nouvelles du Blog</span></h3>

	<?php 

	$the_query = new WP_Query(array( 
		'category_name' => 'Blog', 
		'posts_per_page' => 3, 

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