<?php
/**
* Template Name: Backup Front Page Template
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
				<?php 
					$sections = get_field('active_sections');

					foreach ( $sections as $key=>$section ):
						// var_dump($section);
						// var_dump($section->ID);
						$ID = $section->ID;
						// post_title
						// echo $ID;
						$style = get_field('banner_style',$ID);
						$url= wp_get_attachment_url( get_post_thumbnail_id($ID) );
					?>     
					<section class="section <?php if($key == 0) echo 'active'?>" id="slide-1">
						<div class="feat-home-banner <?php if($style == 'Boxed'){ echo 'gray-box';}?> <?php if($style == 'Full'){ echo 'full';}?>">
							<?php if($style == 'Boxed'){
									?>
									<div class="feat-home-banner-image">
										<div class="feat-aspect-container">
											<div class="aspect-4-3">
												<img src="<?php echo $url?>" alt="" srcset="" style="z-index:1">
												<!-- <img src="./img/img1.png" alt="" srcset="">
												<img src="./img/img5.jpeg" alt="" srcset="">
												<img src="./img/img6.jpeg" alt="" srcset=""> -->
											</div>
										</div>
									</div>
							<?php } ?>
							<?php if($style == 'Full'){
									?>
									<div class="feat-home-banner-image">
												<img src="<?php echo $url?>" alt="" srcset="" style="z-index:1">
									</div>
							<?php } ?>
							<?php if($style == 'Default'){
									?>
									<div class="feat-home-banner-image">
										<img src="<?php echo $url?>" alt="" srcset="" style="z-index:1">
										<!-- <img src="./img/img1.png" alt="" srcset="">
										<img src="./img/img5.jpeg" alt="" srcset="">
										<img src="./img/img6.jpeg" alt="" srcset=""> -->
									</div>
							<?php } ?>
							<div class="feat-home-banner-content">
								<div class="tag">FEATURED</div>
								<div class="feat-banner-slide-content">
									<div class="slide-number">
										<span><?php echo $key + 1 ?></span>
										/
										<span><?php echo count($sections)?></span>
									</div>
									<h1 onmouseover="runImageSlideshow(1)" onmouseout="stopImageSlideshow()">Dolly Devi Photographs Indian Artists For Vogue India</h1>
									<a 
										onmouseover="runImageSlideshow(1)" 
										onmouseout="stopImageSlideshow()" 
										href="<?php echo get_permalink($post->ID)?>">
										Explore
									</a>
								</div>
							</div>
						</div>
					</section>
					<?php endforeach; ?>
					<?php

				?>
			
			</div>
			<div class="static-interceptor"></div>
			<section class="models-talent-section"> 
				<div class="models-talent-section-half">
					<?php 
						$postModels = get_page_by_path('/models');
						$modelurl= wp_get_attachment_url( get_post_thumbnail_id($postModels->ID) );
					?>
					<a class="models-talent-link" href="<?php echo get_permalink($postModels->ID)?>"></a>
					<div class="aspect-1-1 ">
						<img src="<?php echo $modelurl?>"/>
					</div>
					<h1><?php echo $postModels->post_title?></h1>
				</div>	
				<div class="models-talent-section-half">
					<?php 
						$postModels = get_page_by_path('/talent');
						$modelurl= wp_get_attachment_url( get_post_thumbnail_id($postModels->ID) );
					?>
					<a class="models-talent-link" href="<?php echo get_permalink($postModels->ID)?>"></a>
					<div class="aspect-1-1 ">
						<img src="<?php echo $modelurl?>"/>
					</div>
					<h1><?php echo $postModels->post_title?></h1>
				</div>
			</section>
            <section class="home-enquiry"> 
                <div class="left">
                    <h3><b>Reach out to us with your enquiry</b></h3>
                    <button class="feat-button">Write to us</button>
                </div>
                <div class="right">
                <img src="https://feat.local/wp-content/uploads/2021/06/square3.png">
                </div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
	<script>
        lastScrollTop = 0
        
        $(window).on('beforeunload', function() {
            $(window).scrollTop(0);
        });
        $(document).ready(function(){
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
                    $("html, body").stop().animate({ scrollTop: 0}, 1000,function(){
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
                    $('html, body').css('overflow','hidden')
                    if(direction === 'down'){
                        // $("html, body").animate({ scrollTop: $('section:not(.active)').first().offset().top }, 500);
                        if($('.section-wrapper .section:not(.active)').length > 0){
                            $('.section-wrapper .section:not(.active)').first().addClass('active')
                        }
                        else{
                            document.querySelector('body').style.overflow = 'auto';
                            document.querySelector('html').style.overflow = 'auto';
                            console.log('scroll to interceptor');
                            $("html, body").stop().animate({ scrollTop: $('.static-interceptor').offset().top }, 1000);
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
