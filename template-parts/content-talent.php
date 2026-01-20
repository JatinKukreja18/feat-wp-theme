<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nowform_x_Feat
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('talent-interior-main'); ?>>

	<div class="entry-content ">		
			<div class="">
				<section class=" talents-interior">
						<article>
							<div class="talent-detail-container">

								<div class="talent-sticky-details">
									<?php if(!empty(get_field("about"))){?>
										<div class="talent-about">
											<?php echo get_field("about") ?>
										</div>
										<a style="cursor:pointer" onmouseover="aboutToggle()" onmouseleave="aboutToggle()">
											About
											<img src="<?php echo get_template_directory_uri().'/images/icon-about.svg'?>">
										</a>
									<?php } ?>
						
									<?php if (!empty(get_field("instagram"))){?>
										<a href="<?php echo get_field("instagram") ?>" target="_blank" >
											Instagram 
											<img src="<?php echo get_template_directory_uri().'/images/insta-link.svg'?>">
										</a>
									<?php } ?>
									<a href="mailto:talent@feat-artists.com">
										Bookings and enquiries
										<img src="<?php echo get_template_directory_uri().'/images/icon-bookings.svg'?>">
									</a>
									<ul class="talent-tags">
										<?php 
										$allTags = get_terms( array( 'post_types' => 'talent_portfolio', 'taxonomy' => 'portfolio_tag' ) );
										foreach ( $allTags as $tag ) { ?>
											<li value="<?php echo $tag->slug; ?>" class="tag-links " id="<?php echo $tag->term_id?>" onclick="filterPortfolios(this)">
												<?php echo $tag->name; ?> 
											</li>
										<?php
										}
										?>
									</ul>
								</div>
							</div>
						<?php the_content(); ?>
						</article>
				</section>
				<div class="container-fluid talent-detail-container">

			<!-- <div class="row">
					<div class="col-md-4">
						
					</div>
				</div> -->
			<!-- </div> -->
			</div>
	</div><!-- .entry-content -->

	<script>
		$(document).ready(function(){

			setupTags();
			
		})
		function setupTags(){
			const allTags = document.querySelectorAll('.tag-links');
			for (let i = 0; i < allTags.length; i++) {
				const element = allTags[i];
				console.log(element.id);
				if(!document.querySelector('.tag-' + element.id)){
					element.style.display = 'none';
				}
			}
		}
		function filterPortfolios(el){
			el.classList.toggle('active')
			filterPortfolioImages();
		}
		function filterPortfolioImages(){
			if($('.tag-links.active').length){
				const allActiveTags = $('.tag-links.active');
				$('.wp-block-jknf-blocks-portfolio').fadeOut();
				for (let i = 0; i < allActiveTags.length; i++) {
					const el = allActiveTags[i];
					$('.tag-'+el.id).fadeIn();
					
				}
			}else{
				$('.wp-block-jknf-blocks-portfolio').fadeIn();
			}
			// $('.tag-'+el.id).fadeToggle();

		}
		function aboutToggle(){
			$('.talent-about').toggleClass('active');
		}
	</script>
	
</article><!-- #post-<?php the_ID(); ?> -->
