<?php
/**
 * 
 * Template Name: Home Page Template
 */

get_header();
?>

	<main id="primary" class="site-main top-spaced">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			

		endwhile; // End of the loop.
		?>
		<div class="static-interceptor"></div>
			 <section class="models-talent-section"> 
				<div class="models-talent-section-half">
					<a class="models-talent-link" href="<?php echo  home_url( '/' ).'models'; ?>"></a>
					<div class="aspect-1-1 ">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/Homepage_Nandini x Supriya Lele.jpg"/>
					</div>
					<h1>
                        Models
                    </h1>
				</div>	
				<div class="models-talent-section-half">
					<a class="models-talent-link" href="<?php echo  home_url( '/' ).'talents'; ?>"></a>
					<div class="aspect-1-1 ">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/Talents.jpg"/>
					</div>
					<h1>Talents</h1>
				</div>
			</section> 
            <section class="home-enquiry gray-box feat-home-banner"> 
                <div class="left">
                    <h3><b>Reach out to us with your enquiry</b></h3>
                    <a href='mailto:models@feat-artists.com' target="_blank">Write to us</a>
                </div>
                <div class="right feat-home-banner-image">
                                <div class="feat-aspect-container">
                                    <div class="aspect-3-4">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/enquiry.jpg" alt="" srcset="" style="z-index:1">                 
                                    </div>
                                </div>
                            </div>
                <!-- <div class="right feat-home-banner-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/Homepage_Nandini x Supriya Lele.jpg">
                </div> -->
			</section>
	</main><!-- #main -->
	<script>
		$(document).ready(function(){
            var allVideosPlayed = false;
            $(document).on("swipe.up", (e) => {
			console.log(e);
			});

			$('.wp-block-jknf-blocks-home-banner').first().addClass('active')
			const allSlides = document.querySelectorAll('.wp-block-jknf-blocks-home-banner');

			for (let i = 0; i < allSlides.length; i++) {
				const element = allSlides[i];
				$(element).find('.slide-current').html(i+1)
				$(element).find('.slide-total').html(allSlides.length)
			}

            $(this).scrollTop(0);
            function resetPage(){
                console.log('here');
                window.scrollTo(0,0)
                $(window).css('overflow','hidden');
                $('body,html').css('overflow','hidden');
            }
            const wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';
            // window.addEventListener('DOMMouseScroll', throttle(this.scrollHandler, 500));
            

           
            
            window.addEventListener(wheelEvent,scrollHandler);
            window.addEventListener('scroll', scrollHandler);
            window.addEventListener('keydown', keyDownHandler);
			$(document).on('swipe', (e) => {
                console.log('swipe' + e.detail.dir); 
				var a = {deltaY:-1};
				// scrollHandler(a);
            });
            document.addEventListener('swiped-down', (e) => {
                console.log('swipe' + e.detail.dir); 
				var a = {deltaY:-1};
				scrollHandler(a);
            });
            document.addEventListener('swiped-up', (e) => {
                console.log('swipe' + e.detail.dir);
				var a = {deltaY:1};
				scrollHandler(a);

				
            });
            var scrollTimer = -1;
            var isWheeling = false;
            var isAnimating = false;
            function scrollHandler(e){

                if(!allVideosPlayed){
                    var allVideoEls = document.querySelectorAll('video');
                    for(var i=0; i<allVideoEls.length;i++){
                        if(allVideoEls[i].currentTime <= 0){
                            allVideoEls[i].play();   
                        }
                    }
                    allVideosPlayed = true;
                }
                if(isWheeling === false){
                    handleDirection(e);
                }
                if (scrollTimer != -1){
                    clearTimeout(scrollTimer);
                    isWheeling = true;
                }

                scrollTimer = window.setTimeout(function(){
                    isWheeling = false;
                }, 100);
                
                if((window.pageYOffset < $('.static-interceptor').offset().top )&& (e.deltaY<0) && !isAnimating){
                    console.log('scroll to top');
                    isAnimating = true
                    $("html").stop().animate({ scrollTop: 0}, 1000,function(){
                        isAnimating = false;
                    })
                    $("body").stop().animate({ scrollTop: 0}, 1000,function(){
                        isAnimating = false;
                    })
                }
            }

            var extraDuplicate = false
            function handleDirection(e){
                if(extraDuplicate){
                    return false;
                }
                extraDuplicate = true
                setTimeout(() => {
                    extraDuplicate = false
                }, 100);
                if(e.deltaY > 0){
                    // console.log('down');
                    changeActiveSlide('down')
                }else{
                    changeActiveSlide('up')
                    // console.log('up');
                }
            } 
            function keyDownHandler(e){
                // e.preventDefault();
                // const { scrollThroughCarousel } = this.props;
                switch (e.key) {
                    case 'ArrowUp':
                        console.log('up');
                        changeActiveSlide('up')
                        break;
                    case 'PageUp':
                        console.log('up');

                        changeActiveSlide('up')
                        break;
                    case 'ArrowDown':
                        console.log('down');
                         changeActiveSlide('down')
                        break;
                    case 'PageDown':
                        console.log('down');
                         changeActiveSlide('down')
                        break;
                    default:
                        break;
                }
            }        
            // directions
            // if($(window).scrollTop() > lastScrollTop){
            //     goingDown = true;
            // }else{
            //     goingDown = false;
            // }
            // lastScrollTop = $(window).scrollTop();
            
            function changeActiveSlide(direction){
                console.log(direction);
                if(window.pageYOffset < 30){
                    $('html').css('overflow','hidden')
                    $('body').css('overflow','hidden')
                    if(direction === 'down'){
                        // $("html, body").animate({ scrollTop: $('section:not(.active)').first().offset().top }, 500);
                        if($('.section-wrapper .wp-block-jknf-blocks-home-banner:not(.active)').length > 0){
                            $('.section-wrapper .wp-block-jknf-blocks-home-banner:not(.active)').first().addClass('active')
                        }
                        else{
                            document.querySelector('body').style.overflow = 'auto';
                            document.querySelector('html').style.overflow = 'auto';
                            console.log('scroll to interceptor');
                            $("html").stop().animate({ scrollTop: $('.static-interceptor').offset().top }, 1000);
                            $("body").stop().animate({ scrollTop: $('.static-interceptor').offset().top }, 1000);
                        }
						setTimeout(() => {							
							if(window.getComputedStyle(document.querySelectorAll('.wp-block-jknf-blocks-home-banner.active .home-banner-title')[document.querySelectorAll('.wp-block-jknf-blocks-home-banner.active .home-banner-title').length-1]).color == 'rgb(255, 255, 255)'){
								document.querySelector('header').classList.add('light')
							}else{
								document.querySelector('header').classList.remove('light')
							}
						}, 800);
                    }
                    else if(direction === 'up'){
                            const totalBanners = $('.section-wrapper .wp-block-jknf-blocks-home-banner').length;
                            const activeBanners = $('.section-wrapper .wp-block-jknf-blocks-home-banner.active').length;
                            if( activeBanners>1 && activeBanners != totalBanners){
                                $('.section-wrapper .wp-block-jknf-blocks-home-banner.active').last().removeClass('active')
                            }
                        //     $("html, body").animate({ scrollTop: $('section:not(.active)').first().offset().top - $(window).height() }, 300,function(){
                        //         console.log('animation stopped');
                            
                        //     });
                        //     $('html, body').css('overflow','hidden')
                        //     setTimeout(function() {
                        //         $('html, body').css('overflow','auto')
                        //     }, 1000);
						if(window.getComputedStyle(document.querySelectorAll('.wp-block-jknf-blocks-home-banner.active .home-banner-title')[document.querySelectorAll('.wp-block-jknf-blocks-home-banner.active .home-banner-title').length-1]).color == 'rgb(255, 255, 255)'){
							document.querySelector('header').classList.add('light')
						}else{
							document.querySelector('header').classList.remove('light')
						}
                        }
                }
            }
			$('.home-banner-title').on('mouseover',function(){
				if(document.querySelectorAll('.wp-block-jknf-blocks-home-banner.active:last-child .feat-home-banner-image img').length>1){
					runImageSlideshow()
					console.log('runSlideShow');
				}
			})
			$('.home-banner-title').on('mouseleave',function(){
				console.log('stopSlideShow');
					stopImageSlideshow();
				
			})
            resetPage();
        })

		var imgTimer;
		var count = 0;
        function stopImageSlideshow(id){
            clearInterval(imgTimer)
        }
        function runImageSlideshow(id){
            const length = $('.wp-block-jknf-blocks-home-banner.active:last-child .feat-home-banner-image img').length;
            imgTimer = setInterval(function(){
                if(count===length -1){
                    count = 0;
                    
                }
				console.log(count);
                $('.wp-block-jknf-blocks-home-banner.active:last-child .feat-home-banner-image img').css('z-index','0');
                $('.wp-block-jknf-blocks-home-banner.active:last-child .feat-home-banner-image img')[count].style.zIndex = 1;
                count +=1;
            
            },1000)
        }
	</script>
<?php
// get_sidebar();
get_footer();
