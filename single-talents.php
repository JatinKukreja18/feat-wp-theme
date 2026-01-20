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

	<main id="primary" class="site-main single-talents-page">
		<?php
		while ( have_posts() ) :
			the_post();

			?>
<!-- 
				<div class="talent-banner">
					<php if ( has_post_thumbnail() ) { ?>
						<figure class="talent-banner-image">
							<php echo get_the_post_thumbnail(); >
						</figure>
					<php }>
				</div> -->


			<?php

			get_template_part( 'template-parts/content-talent', 'page' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
	<span class="back-to-top"><img src="<?php echo get_template_directory_uri().'/images/chevron.svg'?>" alt="" srcset=""></span>
	<script>
	$(document).ready(function(){
		if(window.getComputedStyle(document.querySelector('.wp-block-jknf-blocks-featured-portfolio .portfolio-banner-title')).color == 'rgb(255, 255, 255)'){
			document.querySelector('header').classList.add('light')
		}else{
			document.querySelector('header').classList.remove('light')
		}	

		$(window).on('scroll',function(){
			if($('.wp-block-jknf-blocks-featured-portfolio').length){
				if(window.pageYOffset > document.querySelector('.wp-block-jknf-blocks-portfolios').offsetTop){
					document.querySelector('header').classList.remove('light');
				}else{
					if(window.getComputedStyle(document.querySelector('.wp-block-jknf-blocks-featured-portfolio .portfolio-banner-title')).color == 'rgb(255, 255, 255)'){
						document.querySelector('header').classList.add('light')
					}
				}
			}
			if(window.innerWidth > 767){
				var offset = window.pageYOffset + window.innerHeight;
				if(offset >= document.querySelector('.feat-footer').offsetTop){
					console.log('make it abs');
					document.querySelector('.talent-sticky-details').classList.add('abs')
				}else{
					document.querySelector('.talent-sticky-details').classList.remove('abs')
				}
			}
		})
	
	})
	</script>
<?php
get_footer();
