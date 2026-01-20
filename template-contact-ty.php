<?php
/**
 * Template Name: Contact Thank You Page
 */

get_header();
?>

	<main id="primary" class="site-main ">

		<?php
		while ( have_posts() ) :
			the_post();

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nowform_x_Feat
 */

?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('container-fluid'); ?>>

				<div class="row">
					<div class="col-lg-4 col-sm-6">	
						<div class="entry-content contact-content">
							<h4 class="mb20"><strong>Thank you for writing to us!</strong></h4>
							<p>We’ve received your message and will get back to you soon to follow up on your enquiry</p>
							<a class="btn primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to home</a>
						</div><!-- .entry-content -->
					</div>
					<div class="col-lg-8 col-sm-6">
						<div class="contact-banner">
							<?php nowform_x_feat_post_thumbnail(); ?>
						</div>
					</div>
				</div>
			</article><!-- #post-<?php the_ID(); ?> -->
<?php

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
