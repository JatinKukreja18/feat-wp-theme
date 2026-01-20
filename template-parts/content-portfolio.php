<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nowform_x_Feat
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		
		<section class=" portfolio-interior full">
        <div class="left-half">
          <article>
            <div class="portfolio-social">
				<!-- feat.portfoliosname  -->
				<h5 class="mb20">
					<?php echo get_the_title();?>
				</h5>
                <?php if (!empty(get_field("client"))){?>
					<span class="feat-text">
						Client: <b><?php echo get_field("client") ?></b>
					</span>
				<?php } ?>
				<?php if (!empty(get_field("year"))){?>
					<span  class="feat-text">
						; Year: <b><?php echo get_field("year") ?></b>
					</span>
				<?php } ?>
            </div>
            <div class="portfolio-stats"> 
				<?php if (!empty(get_field("year"))){?>
					<p>
						<?php echo get_field("description") ?>
					</p>
				<?php } ?>
            </div>
			
           
          </article>
        </div>
        <div class="right-half">
          	<article>
			  <?php the_content(); ?>
			</article>
        </div>
      </section>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
