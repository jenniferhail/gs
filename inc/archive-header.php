<?php 
/**
 * Archive header
 *
 * @package Gildersleeve
 */
?>
<header class="archive-header">
	<h2 class="archive-title">
		<?php
			// Formatting based on the Underscores theme
			// https://github.com/Automattic/_s/blob/master/archive.php
			if ( is_category() ) :
				single_cat_title();

			elseif ( is_tag() ) :
				single_tag_title();

			elseif ( is_author() ) :
				printf( __( 'Author: %s', 'gildersleeve' ), '<span class="vcard">' . get_the_author() . '</span>' );

			elseif ( is_day() ) :
				printf( __( 'Day: %s', 'gildersleeve' ), '<span>' . get_the_date() . '</span>' );

			elseif ( is_month() ) :
				printf( __( 'Month: %s', 'gildersleeve' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'gildersleeve' ) ) . '</span>' );

			elseif ( is_year() ) :
				printf( __( 'Year: %s', '_s' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'gildersleeve' ) ) . '</span>' );
			else :
				_e( 'Archives', 'gildersleeve' );

			endif;
		?>
	</h2>
</header><!-- .page-header -->
