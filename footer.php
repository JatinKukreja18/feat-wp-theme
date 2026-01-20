<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nowform_x_Feat
 */

?>
 <footer class="feat-footer">
        <ul>
            <li class="grey mb10">Models</li>
            <li><a href="/models?gender=boys">Boys</a></li>
            <li><a href="/models?gender=girls">Girls</a></li>
            <li><a href="/models?gender=queer">Queer</a></li>
        </ul>
        <ul>
            <li class="grey mb10">Talent</li>
            <li><a href="<?php echo  home_url( '/' ).'talent?talent_type=art-design'; ?>">Art + Design</a></li>
            <li><a href="<?php echo  home_url( '/' ).'talent?talent_type=hair-makeup'; ?>">Hair + Makeup</a></li>
            <li><a href="<?php echo  home_url( '/' ).'talent?talent_type=image'; ?>">Image</a></li>
            <li><a href="<?php echo  home_url( '/' ).'talent?talent_type=style'; ?>">Style</a></li>
            <li><a href="<?php echo  home_url( '/' ).'talent?talent_type=video'; ?>">Video</a></li>
        </ul>
        <ul>
            <li class="grey mb10">Projects</li>
            <li><a href="<?php echo  home_url( '/' ).'projects?project-type=casting'; ?>">Casting</a></li>
            <li><a href="<?php echo  home_url( '/' ).'projects?project_type=feat-campaigns'; ?>">Digital Campaigns</a></li>
            <li><a href="<?php echo  home_url( '/' ).'projects?project_type=recruitment'; ?>">Recruitment</a></li>
        </ul>
        <ul>
            <li class="grey mb10">Contact</li>
            <li><a href='<?php echo  home_url( '/' ).'contact'; ?>'>Enquire now</a></li>
            <li class="mb10"><a href="<?php echo  home_url( '/' ).'contact-model'; ?>">Become a model</a></li>
            <li class="grey desk-only"><a href="<?php echo  home_url( '/' ).'about'; ?>">About</a></li>
        </ul>
        <ul class="mob-only">
            <li class="grey mb10">About</li>
        </ul>
        <ul class="ml-auto">
            <li class="mb10 grey">Follow us on </li>
            <li class="social-icons">
                <a href="https://www.instagram.com/featartists" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/insta.svg" alt=""></a>
                <a href="https://featartists.tumblr.com/" target="_blank" > <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tumblr.svg" alt=""></a>
                <a href="https://www.youtube.com/channel/UCboY68pBA2OxgFk2dttin0g" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/youtube.svg" alt=""></a>
            </li>
        </ul>
    </footer>

	<footer id="colophon" class="site-footer" style="display:none">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'nowform-x-feat' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'nowform-x-feat' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'nowform-x-feat' ), 'nowform-x-feat', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
		var isTouchDevice = false;
		$(document).ready(function(){
			$(".wpcf7 .form-control").focus(function(){
				$(this).parent().parent().addClass('active');
			}).blur(function(){
				var cval = $(this).val()
				if(cval.length < 1) {$(this).parent().parent().removeClass('active');}
			})
			$('.upload-group .wpcf7-form-control-wrap').append('<div class="preview"></div>')
			$('.upload-group input').on('change', function(el){
				// alert('fd');
				if (this.files && this.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						// $('#divid').html('<img src="'+e.target.result+'">');
						$(el.target.parentElement).find('.preview').html('<span class="preview-close" onClick="closePreview(this)"></span><img src="'+e.target.result+'"/>');
						$(el.target.parentElement).find('.preview').addClass('active');
					}
					console.log(this.files[0]);
					reader.readAsDataURL(this.files[0]);
				}
			});
			
			if($('.back-to-top').length){
				$(window).on('scroll',function(){
					// console.log(window.pageOffsetY);
					// console.log(window.innerHeight);
					if(window.pageYOffset > window.innerHeight ){
						$('.back-to-top').addClass('active')
					}else{
						$('.back-to-top').removeClass('active')
					}
				})	
				$('.back-to-top').on('click',function(){
					console.log(this);
					$("body").stop().animate({ scrollTop: 0}, 1000);
					$("html").stop().animate({ scrollTop: 0}, 1000);
				})
			}
			$(document).on('touchend',function(){
				if(!isTouchDevice){
					isTouchDevice = true;
					setupTouchFeature();
				}
				console.log(isTouchDevice);
			})
		})
		function closePreview(el){
			$(el.parentElement.parentElement).find('input').val();
			$(el.parentElement).removeClass('active')
			$(el.parentElement).html('')
		}

		function setupTouchFeature(){
			$('.wp-block-jknf-blocks-portfolio > a').css('pointer-events','none');
			$('.wp-block-jknf-blocks-portfolio').on('touchstart',function(){
				if(!$(this).hasClass("active")){
					$('.wp-block-jknf-blocks-portfolio.active').removeClass('active');
					$(this).addClass('active')
				}
				$('.wp-block-jknf-blocks-portfolio:not(".active") > a').css('pointer-events','none');
				setTimeout(() => {					
					$(this).find('a').css('pointer-events','all');
				}, 320);
			})
		}
</script>
</body>
</html>
