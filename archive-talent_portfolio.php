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

	<main id="primary" class="site-main top-spaced talents-page">

     <section class="container-fluid">
		<div class="row">
		<script>
			var urlSearchParams = new URLSearchParams(window.location.search);
				var params = Object.fromEntries(urlSearchParams.entries());
			console.log(params);
			// var filteredTag = ''
			var filteredType = ''
			// if(params.tag){
			// 	filteredTag= params.tag
			// }
			if(params.type){
				filteredType= params.type
			}
		</script>
		<?php
		// $filteredType = sanitize_text_field( get_query_var( 'talent_type' ) );
		$args = array(
			'post_type'=> 'talent_portfolio',
			'orderby'    => 'title',
			// 'talent_type'=>$filteredType,
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
				get_template_part( 'template-parts/content-talent-portfolio', get_post_type() );

			endwhile;

			// the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'no-models' );

		endif;
		?>
		</div>
        </section>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
