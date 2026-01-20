<?php
/**
* Template Name: Front Page Template
* @package NowForm_Elegance
*
* The template for displaying all stories as an image grid.
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package NowForm_Elegance
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main ">
			<div class="section-wrapper"> 
					<section class="section active " id="slide-1">
						<div class="feat-home-banner">
                            <div class="feat-home-banner-image">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/Homepage-option-1---Sabyasachi.jpg" alt="" srcset="" style="z-index:1">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/Homepage-option-2---Sabyasachi.jpg" alt="" srcset="">
                                
                            </div>
							<div class="feat-home-banner-content">
								<div class="tag">FEATURED</div>
								<div class="feat-banner-slide-content">
									<div class="slide-number">
										<span>1</span>
										/
										<span>5</span>
									</div>
									<h1 onmouseover="runImageSlideshow(1)" onmouseout="stopImageSlideshow()">
                                    Sabyasachi Campaign  Photographed by Farhan Hussain, Hair by Mitesh Rajani. feat. Sana
                                    </h1>
									<a onmouseover="runImageSlideshow(1)"  onmouseout="stopImageSlideshow()">
										Explore
									</a>
										<!-- href="<php echo get_permalink($post->ID)?>"> -->
								</div>
							</div>
						</div>
					</section>
                    <section class="section " id="slide-2">
						<div class="feat-home-banner full">
                            <div class="feat-home-banner-image">
                                <video autoplay nocontrols preload="meta"  loop="loop" muted="" playsinline="" src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/spt16x9.mp4" alt="" srcset="" style="z-index:1">
                                <!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/Homepage-option-2---Sabyasachi.jpg" alt="" srcset=""> -->
                               
                            </div>
							<div class="feat-home-banner-content">
								<div class="tag">FEATURED</div>
								<div class="feat-banner-slide-content">
									<div class="slide-number">
										<span>2</span>
										/
										<span>5</span>
									</div>
									<h1 >
                                    SatyaPaul Campaign Film by Tenzin Tsundue Phunkang, Styled by Nikhil D. feat. Anugraha
                                </h1>
									<a >
										Explore
									</a>
										<!-- href="<php echo get_permalink($post->ID)?>"> -->
								</div>
							</div>
						</div>
					</section>
                    <section class="section " id="slide-3">
						<div class="feat-home-banner ">
                            <div class="feat-home-banner-image">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/cl2.jpg" alt="" srcset="" style="z-index:1">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/cl1.jpg" alt="" srcset="">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/cl3.jpg" alt="" srcset="">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/cl4.jpg" alt="" srcset="">
                             
                            </div>
							<div class="feat-home-banner-content">
								<div class="tag">FEATURED</div>
								<div class="feat-banner-slide-content">
									<div class="slide-number">
										<span>3</span>
										/
										<span>5</span>
									</div>
									<h1 onmouseover="runImageSlideshow(3)" onmouseout="stopImageSlideshow()">
                                        Climate Activist Garima Thakur photographed by Dolly Devi for Nike Journal. Art Direction by Dolly Devi & Production by Feat. Artists
                                    </h1>
									<a onmouseover="runImageSlideshow(3)"  onmouseout="stopImageSlideshow()">
										Explore
									</a>
										<!-- href="<php echo get_permalink($post->ID)?>"> -->
								</div>
							</div>
						</div>
					</section>
                    <section class="section " id="slide-4">
						<div class="feat-home-banner gray-box">
                            <div class="feat-home-banner-image">
                                <div class="feat-aspect-container">
                                    <div class="aspect-4-3">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/Homepage_Vogue_Cover_Shruti_Haima.jpg" alt="" srcset="" style="z-index:1">                 
                                    </div>
                                </div>
                            </div>
							<div class="feat-home-banner-content">
								<div class="tag">FEATURED</div>
								<div class="feat-banner-slide-content">
									<div class="slide-number">
										<span>4</span>
										/
										<span>5</span>
									</div>
									<h1 onmouseover="runImageSlideshow(4)" onmouseout="stopImageSlideshow()">
                                        Vogue India Cover Photographed by Bikramjit Bose, Beauty by Mitesh Rajani feat. Shruti & Haima
                                    </h1>
									<a onmouseover="runImageSlideshow(4)"  onmouseout="stopImageSlideshow()">
										Explore
									</a>
										<!-- href="<php echo get_permalink($post->ID)?>"> -->
								</div>
							</div>
						</div>
					</section>
                    <section class="section " id="slide-5">
						<div class="feat-home-banner gray-box">
                            <div class="feat-home-banner-image">
                                <div class="feat-aspect-container">
                                    <div class="aspect-4-3">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/Homepage_Nandini x Supriya Lele.jpg" alt="" srcset="" style="z-index:1">                 
                                    </div>
                                </div>
                            </div>
							<div class="feat-home-banner-content">
								<div class="tag">FEATURED</div>
								<div class="feat-banner-slide-content">
									<div class="slide-number">
										<span>5</span>
										/
										<span>5</span>
									</div>
									<h1 onmouseover="runImageSlideshow(4)" onmouseout="stopImageSlideshow()">
                                        Supriya Lele Campaign feat. Nandini
                                    </h1>
									<a onmouseover="runImageSlideshow(4)"  onmouseout="stopImageSlideshow()">
										Explore
									</a>
										<!-- href="<php echo get_permalink($post->ID)?>"> -->
								</div>
							</div>
						</div>
					</section>
			
			</div>
			<div class="static-interceptor"></div>
			<section class="models-talent-section"> 
				<div class="models-talent-section-half">
					<!-- <a class="models-talent-link" href="./images/Models.jpg"></a> -->
					<div class="aspect-1-1 ">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/Models.jpg"/>
					</div>
					<h1>Models</h1>
				</div>	
				<div class="models-talent-section-half">
					<!-- <a class="models-talent-link" href="<hp echo get_permalink($postModels->ID)?>"></a> -->
					<div class="aspect-1-1 ">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/homepage/Talents.jpg"/>
					</div>
					<h1>Talents</h1>
				</div>
			</section>
            <section class="home-enquiry gray-box feat-home-banner"> 
                <div class="left">
                    <h3><b>Reach out to us with your enquiry</b></h3>
                    <button class="feat-button">Write to us</button>
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
	</div><!-- #primary -->
	<script>
        lastScrollTop = 0
        
        $(window).on('beforeunload', function() {
            $(window).scrollTop(0);
        });
        $(document).ready(function(){
            var allVideosPlayed = false;
            
            $(this).scrollTop(0);
            function resetPage(){
                console.log('here');
                window.scrollTo(0,0)
                $(window).css('overflow','hidden');
                $('body,html').css('overflow','hidden');
            }
            resetPage();
            const wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';
            // window.addEventListener('DOMMouseScroll', throttle(this.scrollHandler, 500));
            

           
            
            window.addEventListener(wheelEvent,scrollHandler);
            window.addEventListener('scroll', scrollHandler);
            window.addEventListener('keydown', keyDownHandler);

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
                e.preventDefault();
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
                        if($('.section-wrapper .section:not(.active)').length > 0){
                            $('.section-wrapper .section:not(.active)').first().addClass('active')
                        }
                        else{
                            document.querySelector('body').style.overflow = 'auto';
                            document.querySelector('html').style.overflow = 'auto';
                            console.log('scroll to interceptor');
                            $("html").stop().animate({ scrollTop: $('.static-interceptor').offset().top }, 1000);
                            $("body").stop().animate({ scrollTop: $('.static-interceptor').offset().top }, 1000);
                        }
                    }
                    else if(direction === 'up'){
                            
                            if($('.section-wrapper .section.active').length >1){
                                $('.section-wrapper .section.active').last().removeClass('active')
                            }
                        //     $("html, body").animate({ scrollTop: $('section:not(.active)').first().offset().top - $(window).height() }, 300,function(){
                        //         console.log('animation stopped');
                            
                        //     });
                        //     $('html, body').css('overflow','hidden')
                        //     setTimeout(function() {
                        //         $('html, body').css('overflow','auto')
                        //     }, 1000);
                        }
                }
            }
        })


        


        var imgTimer;
        function stopImageSlideshow(id){
            clearInterval(imgTimer)
        }
        function runImageSlideshow(id){
            const length = $('#slide-'+id + ' .feat-home-banner-image img').length;
            count = 1;
            imgTimer = setInterval(function(){
                if(count===length){
                    count = 0;
                    // $('#slide-'+id + ' .feat-home-banner-image img').css('z-index','0');
                    // $('#slide-'+id + ' .feat-home-banner-image img')[0].style.zIndex = 1;
                    
                }
                $('#slide-'+id + ' .feat-home-banner-image img').css('z-index','0');
                $('#slide-'+id + ' .feat-home-banner-image img')[count].style.zIndex = 1;
                count +=1;
            
            },500)
        }
    </script>
<?php
get_footer();
