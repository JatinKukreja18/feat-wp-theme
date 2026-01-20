<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nowform_x_Feat
 */

get_header();
?>

	<main id="primary" class="site-main top-spaced projects-page">

     <section class="container-fluid">
		<div class="row">
		<script>
			var urlSearchParams = new URLSearchParams(window.location.search);
				var params = Object.fromEntries(urlSearchParams.entries());
			console.log(params);
			var filteredTag = ''
			var filteredProjects = ''
			// if(params.tag){
			// 	filteredTag= params.tag
			// }
			if(params.project_type){
				filteredProjects= params.project_type
			}
		</script>
		<?php
		$filteredProjects = sanitize_text_field( get_query_var( 'project_type' ) );
		// $filteredTag = sanitize_text_field( get_query_var( 'tag' ) );
		$args = array(
			'post_type'=> 'projects',
			'orderby'    => 'title',
			'project_type'=>$filteredProjects,
			'post_status' => 'publish',
			'order'    => 'ASC',
			'posts_per_page' => -1 // this will retrive all the post that is published 
			);
		$result = new WP_Query( $args );
		if ( $result->have_posts() ) :


			/* Start the Loop */
			while ( $result->have_posts() ) :
				$result->the_post();

                ?>
                 <?php 
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-projects', get_post_type() );

			endwhile;

			// the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'no-projects' );

		endif;
		?>
		</div>
        </section>
		<section class="collaborate-section gray-box feat-home-banner "> 
                <div class="left">
                    <h3 class="mb20"><b>Want to collaborate with us?</b></h3>
					<h3 class="mb50">Lorem ipsum dolor sit amet consecteur adipiscing</h3>
                    <a href='mailto:models@feat-artists.com' target="_blank">Get in touch</a>
                </div>
                <div class="right ">
                                <div class="feat-aspect-container">
                                    <div class="aspect-1-1">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/collaborate.png" alt="" srcset="" style="z-index:1">                 
                                    </div>
                                </div>
                            </div>
                <!-- <div class="right feat-home-banner-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/Homepage_Nandini x Supriya Lele.jpg">
                </div> -->
			</section>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
