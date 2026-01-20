<?php
/**
 * 
 * Template Name: Home Full Page Template
 */

get_header();
?>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri().'/js/fullPage/dist/fullpage.css'?>" />

<!-- This following line is optional. Only necessary if you use the option css3:false and you want to use other easing effects rather than "easeInOutCubic". -->
<script src="<?php echo get_template_directory_uri().'/js/fullPage/vendors/easings.min.js'?>"></script>


<!-- This following line is only necessary in the case of using the option `scrollOverflow:true` -->
<script type="text/javascript" src="<?php echo get_template_directory_uri().'/js/fullPage/vendors/scrolloverflow.min.js'?>"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri().'/js/fullPage/dist/fullpage.js'?>"></script>

	<main id="primary" class="site-main">
        <div id="fullpage" class="fp-wrapper">
            <!-- <div class="section">

			</div>
            <div class="section">

			</div>
            <div class="section">

			</div> -->
        
		<?php
		while ( have_posts() ) :
			the_post();

			// get_template_part( 'template-parts/content', 'page' );
			echo get_the_content();
			

		endwhile; // End of the loop.
		?> 
		<!-- <div class="static-interceptor"></div> -->
<div class="section">
            <?php
            $leftCard = get_field('left_card',$post->ID);
            $rightCard = get_field('right_card',$post->ID);
			$enquirySection = get_field('enquiry_section',$post->ID);
            ?>
             <section class="models-talent-section">
                <div class="models-talent-section-half">
                    <a class="models-talent-link" href="<?php echo $leftCard['card_link']; ?>"></a>
                    <div class="aspect-1-1 ">
                        <img src="<?php echo esc_url( $leftCard['card_image'] ); ?>" alt="<?php echo esc_attr( $leftCard['card_title']); ?>" />

                    </div>
                    <h1>
                        <?php echo $leftCard['card_title']; ?>
                    </h1>
                </div>
                <div class="models-talent-section-half">
                    <a class="models-talent-link" href="<?php echo $rightCard['card_link']; ?>"></a>
                    <div class="aspect-1-1 ">
                    <img src="<?php echo esc_url( $rightCard['card_image'] ); ?>" alt="<?php echo esc_attr( $rightCard['card_title']); ?>" />
                    </div>
                    <h1>
                        <?php echo $rightCard['card_title']; ?>
                    </h1>
                </div>
            </section>
        </div>
		<div class="section">

			<section class="home-enquiry gray-box feat-home-banner"> 
				<div class="left">
					<h1><b><?php echo $enquirySection['title']; ?></b></h1>
					<a href='<?php echo $enquirySection['link']; ?>'> <?php echo $enquirySection['link_text']; ?></a>
				</div>
				<div class="right feat-home-banner-image">
								<div class="feat-aspect-container">
									<div class="aspect-3-4">
										<img src="<?php echo $enquirySection['image']['url']; ?>" alt="" srcset="" style="z-index:1">                 
									</div>
								</div>
							</div>
				<!-- <div class="right feat-home-banner-image">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/Homepage_Nandini x Supriya Lele.jpg">
				</div> -->
			</section>

			</div>
		<div class="section fp-auto-height">
			<?php get_footer();?>
			</div>
		</div>
	</main><!-- #main -->
<script>
    // new fullpage('#fullpage', {
	// //options here
    //     autoScrolling:true,
    //     scrollHorizontally: true
    // });

    // //methods
    // fullpage_api.setAllowScrolling(false);
    $(document).ready(function() {
		$('.wp-block-jknf-blocks-home-banner').addClass('section')
		$('#fullpage').fullpage({
			//options here
			// licenseKey: 'YOUR KEY HERE',
			autoScrolling:true,
			scrollOverflow:true,
			onLeave: function(section, destination, direction){
				console.log(destination.item);
				console.log(direction);
				stopImageSlideshow();
				if(direction=='down'){
					setTimeout(() => {							
						if($(destination.item).find('.home-banner-title')[0]){
							assignColor($(destination.item).find('.home-banner-title')[0])
						}
					}, 500);
				}else{
					if($(destination.item).find('.home-banner-title')[0]){
						assignColor($(destination.item).find('.home-banner-title')[0])
					}
				}
				if($(destination.item).find('video').length){
					$(destination.item).find('video')[0].play();
				}
				// if($(destination.item).find('img').length > 1){
				// 	runImageSlideshow($(destination.item).find('img'))
				// }
				// $('.feat-home-banner-image video')[0].play()
			},
			afterLoad: function(origin, destination, direction){
				if($(destination.item).find('.home-banner-title')[0]){
					assignColor($(destination.item).find('.home-banner-title')[0])
				}
				if($(destination.item).find('img').length > 1){
					runImageSlideshow()
				}
			}
			// scrollHorizontally: true
		});
		//methods
		// $.fn.fullpage.setAllowScrolling(false);

		const allSlides = document.querySelectorAll('.wp-block-jknf-blocks-home-banner');

		for (let i = 0; i < allSlides.length; i++) {
			const element = allSlides[i];
			$(element).find('.slide-current').html(i+1)
			$(element).find('.slide-total').html(allSlides.length)
		}


		// slideshow slide
		// $('.home-banner-title').on('mouseover',function(){
		// 	console.log(imgTimer);
		// 	if(!imgTimer){
		// 		if(document.querySelectorAll('.wp-block-jknf-blocks-home-banner.active .feat-home-banner-image img').length>1){
		// 			runImageSlideshow()
		// 			console.log('runSlideShow');
		// 		}
		// 	}
		// })
		// $('.home-banner-title').on('mouseleave',function(){
		// 	console.log(imgTimer);

		// 	console.log('stopSlideShow');
		// 		stopImageSlideshow();
			
		// })
		// $('.home-banner-title a').on('mouseleave',function(){
		// 	console.log(imgTimer);

		// 	console.log('stopSlideShow');
		// 		stopImageSlideshow();
			
		// })

		// PAUSE SLIDESHOW ON HOVER ON IMAGES
		$('.feat-home-banner-image img').on('mouseover',function(){
			console.log(imgTimer);
			console.log('stopSlideShow');
			stopImageSlideshow();
		})
		$('.feat-home-banner-image img').on('mouseleave',function(){
			console.log(imgTimer);
			if(!imgTimer){
				if(document.querySelectorAll('.wp-block-jknf-blocks-home-banner.active .feat-home-banner-image img').length>1){
					runImageSlideshow()
					console.log('runSlideShow');
				}
			}
		})
	});
	function assignColor(el){
		if(window.getComputedStyle(el).color == 'rgb(255, 255, 255)'){
			document.querySelector('header').classList.add('light')
		}else{
			document.querySelector('header').classList.remove('light')
		}
	}


	// for running images
	var imgTimer;
	function stopImageSlideshow(id){
		console.log(imgTimer);
		if(document.querySelectorAll('.wp-block-jknf-blocks-home-banner.active .feat-home-banner-image img')[0]){
			document.querySelectorAll('.wp-block-jknf-blocks-home-banner.active .feat-home-banner-image img')[0].style.zIndex = '1';
		}
		clearInterval(imgTimer)
		imgTimer=0;
	}
	function runImageSlideshow(AllImages){
		
		let allImages = document.querySelectorAll('.wp-block-jknf-blocks-home-banner.active .feat-home-banner-image img')
		// if(AllImages){
		// 	allImages = AllImages;
		// }
		const length = allImages.length;
		count = 1;
		imgTimer = setInterval(function(){
			if(count===length){
				count = 1;
				// $('#slide-'+id + ' .feat-home-banner-image img').css('z-index','0');
				// $('#slide-'+id + ' .feat-home-banner-image img')[0].style.zIndex = 1;
				
			}
			$('.wp-block-jknf-blocks-home-banner.active .feat-home-banner-image img').css('z-index','0');
			allImages[count].style.zIndex = '1';
			count +=1;
		
		},500)
	}
	
    </script>   
<?php
// get_sidebar();

