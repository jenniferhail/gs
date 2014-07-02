<?php
/**
 * Template Name: Full Width Page
 *
 * @package Gildersleeve
 */

get_header(); ?>

<section id="primary" class="full-width" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<h1 class="headline"><?php the_field( "headline" ); ?></h1>
	
		<?php get_template_part( 'content', 'page' ); ?>
	
	<?php endwhile; // end of the loop. ?>

</section><!-- #primary -->

<?php get_footer(); ?>