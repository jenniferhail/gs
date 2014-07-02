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

		<div class="bio-left">
			<?php if( get_field('image_bio_one') ): ?>
	 			<img src="<?php the_field('image_bio_one'); ?>" class="desaturate bio" />
			<?php endif; ?>

			<?php if( get_field('image_one_caption') ): ?>
				<p><?php the_field( "image_one_caption" ) ?></p>
			<?php endif; ?>
		</div>
		<div class="bio-right">
			<?php if( get_field('image_bio_two') ): ?>
	 			<img src="<?php the_field('image_bio_two'); ?>" class="desaturate bio" />
			<?php endif; ?>

			<?php if( get_field('image_two_caption') ): ?>
				<p><?php the_field( "image_two_caption" ) ?></p>
			<?php endif; ?>
		</div>
		<div class="clear"></div>		
	
	<?php endwhile; // end of the loop. ?>

</section><!-- #primary -->

<?php get_footer(); ?>