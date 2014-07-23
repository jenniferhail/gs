<?php
/**
 * Home Page
 *
 * @package Gildersleeve
 */

get_header(); ?>

<section id="primary" class="full-width home" role="main">

	<?php while ( have_posts() ) : the_post(); ?>
		
		<?php if( get_field('headline') ): ?>
			<h1 class="headline"><?php the_field( "headline" ); ?></h1>
		<?php endif; ?>
		
		<div id="grid">

			<div class="item left">
				<?php if( get_field('image_one') ): ?>
					<img src="<?php the_field('image_one'); ?>" class="image_one" />
				<?php endif; ?>
			</div>

			<div class="item right">
				<?php if( get_field('image_two') ): ?>
					<img src="<?php the_field('image_two'); ?>" class="image_two" />
				<?php endif; ?>
			</div>

			<div class="item right textbox"><?php the_content(); ?></div>

			<div class="item wide">
				<?php if( get_field('image_three') ): ?>
					<img src="<?php the_field('image_three'); ?>" class="image_three" />
				<?php endif; ?>
			</div>

			<div class="item left">
				<?php if( get_field('image_four') ): ?>
					<img src="<?php the_field('image_four'); ?>" class="image_four" />
				<?php endif; ?>
			</div>

			<div class="item right">
				<?php if( get_field('image_five') ): ?>
					<img src="<?php the_field('image_five'); ?>" class="image_five" />
				<?php endif; ?>
			</div>

			<div class="clear"></div>

		</div>

	<?php endwhile; // end of the loop. ?>

</section><!-- #primary -->

<?php get_footer(); ?>