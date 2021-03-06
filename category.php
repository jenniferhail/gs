<?php
/**
 * Template for displaying Category Archive pages
 *
 * @package Gildersleeve
 */

get_header(); ?>

		<header class="page-header">
			<?php if (is_category('articles')) : ?>
				<h1 class="headline"><?php the_field( 'headline', 10 ); ?></h1>
			<?php elseif (is_category('press')) : ?>
				<h1 class="headline"><?php the_field( 'headline', 14 ); ?></h1>
			<?php else : ?>
			<?php endif; ?>
		</header>

		<section id="primary">

			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php get_template_part( 'inc/pagination' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'gildersleeve' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'gildersleeve' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
