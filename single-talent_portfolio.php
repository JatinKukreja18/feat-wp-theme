<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nowform_x_Feat
 */

get_header();
?>

	<main id="primary" class="site-main single-portfolio-page">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-portfolio', 'page' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
	<script>
	$(document).ready(function(){
		$(window).on('scroll',function(){
			if(window.innerWidth > 767){
				var offset = window.pageYOffset + window.innerHeight;
				if(offset >= document.querySelector('.entry-footer').offsetTop){
					console.log('make it rel');
					const margins = window.innerHeight - 60 - document.querySelector('.left-half article').offsetHeight - document.querySelector('header').offsetHeight;
					console.log(margins);
					document.querySelector('.left-half article').style.marginBottom = margins + 'px';
					document.querySelector('.left-half').classList.add('rel')
				}else{
					document.querySelector('.left-half').classList.remove('rel')
				}
			}
		})
	})
	</script>
<?php
get_footer();
