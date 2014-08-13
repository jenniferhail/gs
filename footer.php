<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Gildersleeve
 */
?>

	</div><!-- #main -->

</div><!-- #page -->
<footer id="colophon" role="contentinfo">

	<div id="secondary-footer" class="widget-area" role="complementary">
		<?php dynamic_sidebar('footer-1'); ?>
	</div><!-- #secondary .widget-area -->

</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>