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

		
		<section class=" model-interior full">
        <div class="left-half">
          <article>
            <div class="model-social">
				<!-- feat.modelsname  -->
				
                <a  href="<?php echo get_field("composite_card") ?>" target="_blank" download="<?php echo 'feat-'.$post->post_title?>" >Composite Card <img src="<?php echo get_template_directory_uri().'/images/download.svg'?>"></a>
                <?php if (!empty(get_field("instagram"))){?>
					<a href="<?php echo get_field("instagram") ?>" target="_blank" class="ml20">
						Instagram 
						<img src="<?php echo get_template_directory_uri().'/images/insta-link.svg'?>">
					</a>
				<?php } ?>
            </div>
            <div class="model-stats"> 
				<?php $features = get_field_object("features")['sub_fields'];
						foreach ( $features as $name => $field ):
							$name = $field['name'];
				?>     
						
						<?php echo $field['label']; ?>
						<b><?php echo  get_field('features')[$field['name']]?></b>
							
						<?php endforeach; ?>
            </div>
			
           <!-- <?php echo get_the_title(); ?> -->
          </article>
        </div>
        <div class="right-half">
          	<article>
			  <?php the_content(); ?>
			</article>
        </div>
      </section>
	</div><!-- .entry-content -->

	<!-- <footer class="entry-footer">
		<php nowform_x_feat_entry_footer(); ?>
	</footer>.entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
