<?php
/**
 * Template Name: Contact Model Page Template
 */

get_header();
?>

	<main id="primary" class="site-main contact-model-page">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'contact-model' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		<div id='divid'></div>
	</main><!-- #main -->

	
<?php
// get_sidebar();
get_footer();
