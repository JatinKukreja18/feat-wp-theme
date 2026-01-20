<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nowform_x_Feat
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('project-interior-main'); ?>>

	<div class="entry-content">

		
		<section class=" project-interior full">
			<div class="project-banner">
					<?php if ( has_post_thumbnail() ) { ?>
						<figure class="project-banner-image">
							<?php echo get_the_post_thumbnail(); ?>
						</figure>
					<?php }?>
				</div>
			<div class="container-fluid project-content">
				<div class="row">
					<div class="col-12">
						<?php the_content(); ?>
					</div>
					<div class="col-md-6">
					<article>
							<div class="project-details">
								<a class="back-icon project-back-page-link " onClick="goBack('<?php echo home_url( '/' ).'/projects/'?>')">
									<img class="avoid" src="<?php echo get_template_directory_uri().'/images/chevron.svg'?>" alt="">
									<span>Back</span>
								</a>
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
							<div class="project-stats"> 
								<?php if (!empty(get_field("year"))){?>
									<p>
										<?php echo get_field("description") ?>
									</p>
								<?php } ?>
							</div>
							
						
						</article>
					</div>
				</div>
			</div>
      </section>
	</div><!-- .entry-content -->
	<div class="projects-overlay">
		<!-- <div class="featured-video" >
			<div id="player" data-plyr-provider="youtube" data-plyr-embed-id="RqcjBLMaWCg"></div>
		</div> -->
		<div class="project-image-carousel" id="project-image-carousel">
			<div class="project-image-wrapper" id="project-image-wrapper"></div>
			<div class="p-c-extra-wrapper">
				<span class="p-c-arrow p-c-left" onClick="changeSlideImage(0)"></span>
				<p class="p-c-count">
					<span class="current">0</span> of <span class="total">0</span>
				</p>
				<span class="p-c-arrow p-c-right" onClick="changeSlideImage(1)" ></span>
			</div>
		</div>
		<span class="p-c-close" onClick="toggleImageOverlay()"></span>
		
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>
		
		<script>
		const player = new Plyr('#player');
		</script>
<script>
	$(document).ready(function(){
		const allProjectImages = document.querySelectorAll('.project-interior img:not(.avoid)');
		let carouselImages = '';
		document.querySelector('.p-c-count .total').innerText = allProjectImages.length;
		for(let i=0;i<allProjectImages.length;i++){
			const currentImage = allProjectImages[i];
			currentImage.dataset.gridSlideIndex = i;
			if(currentImage.dataset.fullUrl){
				// if(i==0){
					carouselImages += `<img src='${currentImage.dataset.fullUrl}' id="c-media-${i}" data-slide-index="${i}" class="c-media"/>`;
				// }else{
				// 	carouselImages += `<img src='${currentImage.dataset.fullUrl}' id="c-media-${i}" data-slide-index="${i}" class="c-media"/>`;
				// }
			}
			// else if(currentImage.dataset.src.includes('youtube')){
			// 	// carouselImages += `<img src='${currentImage.dataset.src}' id="c-media-${i}" data-slide-index="${i}"/>`;
			// 	const yid= currentImage.dataset.src.substring(currentImage.dataset.src.indexOf('vi/')+3,currentImage.dataset.src.indexOf('0.') - 1);
				
			// 	var templateUrl = '<?= get_bloginfo("template_url"); ?>';
			// 	carouselImages += `<div id="c-media-${i}" class="c-media" data-slide-index="${i}"> 
			// 						<img src="${templateUrl+'/images/size-helper.png'}" class="size-helper"/>
			// 						<div id="c-plyr-${i}" data-plyr-provider="youtube" data-plyr-embed-id="${yid}" ></div> </div>`
				
			// }
			else if(currentImage.nextSibling && currentImage.nextSibling.tagName === 'FIGCAPTION'){
				const temp = currentImage.nextSibling.innerText.split('-')
				
				// const yid= currentImage.dataset.src.substring(currentImage.dataset.src.indexOf('vi/')+3,currentImage.dataset.src.indexOf('0.') - 1);
				
				var templateUrl = '<?= get_bloginfo("template_url"); ?>';
				carouselImages += `<div id="c-media-${i}" class="c-media" data-slide-index="${i}"> 
									<img src="${templateUrl+'/images/size-helper.png'}" class="size-helper"/>
									<div id="c-plyr-${i}" data-plyr-provider="${temp[0]}" data-plyr-embed-id="${temp[1]}" ></div> </div>`
				
			}
			else if(currentImage.dataset.src){
				carouselImages += `<img src='${currentImage.dataset.src}' id="c-media-${i}" data-slide-index="${i}" class="c-media"/>`;
			}
		}
	
		$('#project-image-wrapper').append(carouselImages);
		$('.project-interior img:not(.avoid)').on('click',function(el){
			// console.log(el);
			document.querySelector('.p-c-count .current').innerText = parseInt(this.dataset.gridSlideIndex) + 1;
			console.log(this.dataset.gridSlideIndex)
			toggleImageOverlay(parseInt(this.dataset.gridSlideIndex));
		});
		var swipeTimer = 0;
		var swipeStart = 0;
		$('.project-image-wrapper').on('touchmove',function(e){
			console.log(swipeTimer);
			if(swipeTimer > 0){
				clearTimeout(swipeTimer);
			}
			swipeTimer = setTimeout(() => {
				touchEnded(e)
			}, 500);
		})
		function touchEnded(obj){
			const swipeOffset = swipeStart - obj.touches[0].clientX ;
			console.log(swipeOffset);
			if(swipeOffset > 30){
				console.log('move right');
				changeSlideImage(1);
			}
			else if(swipeOffset < -30){
				console.log("move left");
				changeSlideImage(0);
			}
		}
		$('.project-image-wrapper').on('touchstart',function(e){
			swipeStart = e.touches[0].clientX
		})
	})
	function toggleImageOverlay(e){
		
		if(document.querySelector('.c-media.active')) {
			if(window['plyr_'+ document.querySelector('.c-media.active').dataset.slideIndex]){
				window['plyr_'+ document.querySelector('.c-media.active').dataset.slideIndex].pause();
			}
			document.querySelector('.c-media.active').classList.remove('active')
		};
		$('.projects-overlay').toggleClass('opened')
		if(e || e == 0){
			// setTimeout(function() {
				// console.log(e);/
				document.querySelector('#c-media-'+ e).classList.add('active');
				if(document.querySelector('.project-image-wrapper .c-media.active > div')){
					initiateWpPlyr(e)
				}
			// }, 200);
		}
	}
	function changeSlideImage(dir){
		let nextIndex = 0;
		const currentIndex = parseInt(document.querySelector('.project-image-wrapper .c-media.active').dataset.slideIndex);
		// console.log(window['plyr_'+ currentIndex]);
		
		if(window['plyr_'+ currentIndex]){
			window['plyr_'+ currentIndex].pause();
		}
		if(dir){
			if(currentIndex+1<document.querySelectorAll('.project-image-wrapper .c-media').length){
			 nextIndex = currentIndex + 1;
			}else{
				nextIndex = 0;
			}
		}else{
			if(currentIndex!=0){
			 nextIndex = currentIndex - 1;
			}else{
				nextIndex = document.querySelectorAll('.project-image-wrapper .c-media').length - 1;
			}
		}
		document.querySelector('.project-image-wrapper .c-media.active').classList.remove('active')
		document.querySelector('.project-image-wrapper #c-media-' + nextIndex).classList.add('active')
		// if(document.querySelector('.project-image-wrapper .c-media.active' + nextIndex).dataset)
		if(document.querySelector('.project-image-wrapper .c-media.active > div')){
			initiateWpPlyr(nextIndex)
		}
		document.querySelector('.p-c-count .current').innerText = nextIndex +1;
	}
	function initiateWpPlyr(pointer){
		
			const embedId = document.querySelector('.project-image-wrapper .c-media.active > div').dataset.plyrEmbedId;
			if(embedId){
				window['plyr_'+ pointer] = new Plyr('#c-plyr-'+pointer);
				window['plyr_'+ pointer].on('ready', event => {
					// window['plyr_'+ pointer].play();
					console.log(this);
				});

				// setTimeout(() => {
				// 	window['plyr_'+ pointer].play();
				// }, 1000);
				
			}else if(document.querySelector('.project-image-wrapper .c-media.active > div').classList.contains('plyr')){
				window['plyr_'+ pointer].play();
			}
		
	}
</script>