<?php
// Events menu
?>

<aside id="submenu" role="complementary" class="span4" style="margin-top:4em;">


	<nav>
		<h3>Events in these Regions</h3>


<!-- <ul class="submenu-children">
<?php
wp_list_pages('title_li=&child_of='.$post->ID.'&depth=1&post_type=events'); ?>
</ul> -->



	<?php $args = array(
		'show_option_all'    => '',
		'orderby'            => 'name',
		'order'              => 'ASC',
		'style'              => 'list',
		'show_count'         => 0,
		'hide_empty'         => 0,
		'use_desc_for_title' => 1,
		'child_of'           => 0,
		'feed'               => '',
		'feed_type'          => '',
		'feed_image'         => '',
		'exclude'            => '',
		'exclude_tree'       => '',
		'include'            => '',
		'hierarchical'       => 1,
		'title_li'           => __( '' ),
		'show_option_none'   => __('No '),
		'number'             => null,
		'echo'               => 1,
		'depth'              => 0,
		'current_category'   => 0,
		'pad_counts'         => 0,
		'taxonomy'           => 'event-categories',
		'walker'             => null
		); ?>

		<ul class="submenu-children">
			<?php wp_list_categories( $args ); ?>
		</ul>

	</nav>
</aside>


	<?php get_template_part('sidebar'); ?>
