<?php
/**
 * Template Name: About Page
 *
 * @package Gildersleeve
 */

get_header(); ?>

<section id="primary" class="full-width" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<h1 class="headline"><?php the_field( "headline" ); ?></h1>
	
		<?php get_template_part( 'content', 'page' ); ?>	
	
	<?php endwhile; // end of the loop. ?>

	<?php
	// The Query
	query_posts( array ( 'category_name' => 'partners', 'posts_per_page' => -1 ) ); ?>

	<?php
	// The Loop
	while ( have_posts() ) : the_post(); ?>

		<div class="partners">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'medium' ); } ?>
	    	<h4><?php the_title(); ?></h4>
	    	<?php the_content(); ?>
	    </div>
	    
	<?php endwhile; ?>

	<?php
	// Reset Query
	wp_reset_query();
	?>	

</section><!-- #primary -->

<?php get_footer(); ?>