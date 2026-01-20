<?php
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
				<?php
				the_content();
		
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nowform-x-feat' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
		</div>
		<div class="col-lg-8 col-sm-6">
		<div class="contact-banner">
				<?php nowform_x_feat_post_thumbnail(); ?>
			</div>
		</div>
	</div>

<script>
	$(document).ready(function(){
		$('.contact-content .frm_form_field input, .contact-content .frm_form_field textarea').on('keyup',function(el){
			if(el.target.value.length > 0){
				el.target.parentElement.classList.add('dirty')
			}
			if(document.querySelector('.frm-show-form').checkValidity() && $('.frm_error').length == 0){
				$('.contact-content .frm_button_submit').prop('disabled',false);
			}else{
				$('.contact-content .frm_button_submit').prop('disabled','disabled');	
			}
		})
		$('.contact-content .frm_form_field input,.contact-content .frm_form_field textarea').on('focus',function(el){
			el.target.parentElement.classList.add('touched')
		})
		$('.contact-content .frm_form_field select').parent().addClass('touched')
		$('.contact-content .frm_form_field input,.contact-content .frm_form_field textarea').on('blur',function(el){
			if(el.target.value.length == 0){
				el.target.parentElement.classList.remove('touched')
			}
		})
		$('.contact-content .frm_button_submit').prop('disabled','disabled');

		if(document.querySelectorAll('select option')){
			if(document.querySelectorAll('select option')[1].value== "General"){
				document.querySelectorAll('select option')[1].value = "infofeatartists@gmail.com";
			}
			if(document.querySelectorAll('select option')[2].value== "Talents"){
				document.querySelectorAll('select option')[2].value = "talent@feat-artists.com";
			}
			if(document.querySelectorAll('select option')[3].value== "Models"){
				document.querySelectorAll('select option')[3].value = "models@feat-artists.com";
			}
		}
	})
</script>
</article><!-- #post-<?php the_ID(); ?> -->
