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

	<main id="primary" class="site-main single-project-page">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-project', 'page' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
	<script>
	// $(document).ready(function(){
	// 	$(window).on('scroll',function(){
	// 		if(window.innerWidth > 767){
	// 			var offset = window.pageYOffset + window.innerHeight - document.querySelector('.entry-footer').offsetHeight;
	// 			if(offset >= document.querySelector('.entry-footer').offsetTop - 33){
	// 				console.log('make it rel');
	// 				document.querySelector('.left-half').classList.add('rel')
	// 			}else{
	// 				document.querySelector('.left-half').classList.remove('rel')
	// 			}
	// 		}
	// 	})
	// })
	</script>
	<span class="back-to-top"><img src="<?php echo get_template_directory_uri().'/images/chevron.svg'?>" alt="" srcset=""></span>
<?php
get_footer();
