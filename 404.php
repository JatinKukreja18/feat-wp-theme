<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Nowform_x_Feat
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="no-results not-found">
			<div class="page-content">
				<h3 >We will be live shortly</h3>
				<button class="feat-button" style="margin-top:60px" onClick="window.location.href='<?php echo home_url( '/' )?>'">Back to home</button>
			</div><!-- .page-content -->
		</section>
	</main><!-- #main -->

<?php
get_footer();
