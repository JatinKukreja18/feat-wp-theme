<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nowform_x_Feat
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="<?php echo get_template_directory_uri().'/js/swipeEvents.js'?>" integrity="" ></script>
	
    
</head>

<body <?php body_class(); ?>>


<div id="wptime-plugin-preloader"></div>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'nowform-x-feat' ); ?></a>
	<?php 
	// $headerTheme = get_field('header_theme',$post->ID);
	if(is_singular() && !is_front_page()) {
		$class = '';
		// if($headerTheme == 'light'){
			$logoPathWhite = get_template_directory_uri().'/images/feat-logo-white.png'; 
		// }else{
			$logoPath = get_template_directory_uri().'/images/feat-logo.png'; 
		// }
		$title = get_the_title();
		if(get_post_type() === 'talent_portfolio'){
			$ownerObj = get_field('owner',$post->ID);
			$title = get_the_title($ownerObj);
			// var_dump($ownerObj);
			
			$talentBack = get_permalink($ownerObj);
			// var_dump($talentBack);
			$tpterms = wp_get_post_terms($ownerObj,'talent_type');
			$currentTalentType = $tpterms;
		}
	}
	else{
		$class = '';
		$logoPath = get_template_directory_uri().'/images/feat_artists-logo.png';
		$logoPathWhite = get_template_directory_uri().'/images/feat_artists-logo-white.png'; 
		$title = ''; 
	}
	 if ((get_queried_object()->taxonomy && get_queried_object()->taxonomy === 'gender'|| get_post_type() === 'models') && !is_singular()) { 
		$modelsTerms = get_terms( array(
			'taxonomy' => 'gender',
			'hide_empty' => false,
		));
		$modelsTags = get_terms( array(
			'taxonomy' => 'post_tag',
			'hide_empty' => false,
		));
	 }else if(get_post_type() === 'models' && is_singular()){
		 $currentModelGender = wp_get_post_terms($post->ID,'gender');
	}
	// var_dump(get_queried_object()->taxonomy);
	if ( (get_queried_object() && get_queried_object()->taxonomy === 'talent_type' || get_post_type() === 'talents') && !is_singular()) { 
		$talentsTerms = get_terms( array(
			'taxonomy' => 'talent_type',
			'hide_empty' => false,
		));
	 }
	if ( (get_queried_object() && get_queried_object()->taxonomy === 'project_type' || get_post_type() === 'projects') && !is_singular()) { 
		$projectsTerms = get_terms( array(
			'taxonomy' => 'project_type',
			'hide_empty' => false,
		));
	 }else if(get_post_type() === 'projects' && is_singular()){
		$currentProjectsTerms = wp_get_post_terms($post->ID,'project_type');
   }
	//  if(get_post_type() === 'talent_portfolio' && is_singular()){
	// 	 $currentTalentType = wp_get_post_terms($post->ID,'type');
	// }
	if(!is_front_page() && !is_home()){
		$headerClass = ' is-white';
	}
	
	?>
	<header class="<?php echo $class.$headerClass?> <?php echo $headerTheme?>" >
		
		<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo $logoPath;?>" alt="">
		</a>
		<a class="logo-white" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo $logoPathWhite;?>" alt="">
		</a>
		
         <h1 class="page-name"><?php echo $title ?></h1>

		<ul class="breadcrumb">
			<?php
			// Check if any term exists
				if ( ! empty( $modelsTerms ) && is_array( $modelsTerms ) ) {
					// add links for each category
					?>
					
						<select onChange="changedModels(this)" id="models-gender" class="gender-dropdown">
							<?php
						foreach ( $modelsTerms as $term ) { ?>
							<option value="<?php echo $term->slug; ?>" >
								<?php echo $term->name; ?>
							</option><?php
						}
						?>
						</select>
					<?php 
				}
				if ( ! empty( $modelsTags ) && is_array( $modelsTags ) ) {
					// add links for each category
					?>
						<ul class="tag-list">
							<?php
						foreach ( $modelsTags as $term ) { ?>
							<li data-tag="<?php echo $term->slug; ?>">
								<a onClick="filterByTag('<?php echo $term->slug; ?>',this)" ><?php echo $term->name; ?></a>
							</li>
							<?php
						}
						?>
						</ul>
					<?php 
				}
			?>
			<?php
			// Check if any term exists
				if ( ! empty( $talentsTerms ) && is_array( $talentsTerms ) ) {
					// add links for each category
					?>
					
						<select onChange="changedTalents(this)" id="talents-type" class="type-dropdown">
							<?php
						foreach ( $talentsTerms as $term ) { ?>
							<option value="<?php echo $term->slug; ?>" >
								<?php echo $term->name; ?>
							</option><?php
						}
						?>
						</select>
					<?php 
				}
			?>
			
			<?php
			// Check if any term exists
				if ( ! empty( $projectsTerms ) && is_array( $projectsTerms ) ) {
					// add links for each category
					?>
					
						<select onChange="changedProjects(this)" id="project-type" class="projects-type-dropdown">
							<?php
						foreach ( $projectsTerms as $term ) { ?>
							<option value="<?php echo $term->slug; ?>" >
								<?php echo $term->name; ?>
							</option><?php
						}
						?>
						</select>
					<?php 
				}
			?>
		</ul>
		<?php
				if(!empty($currentProjectsTerms)){
					?>
					<ul class="breadcrumb internal-model">
						<li >
							<a >
								<?php echo 'Projects';?>
							</a>
						</li>
						<li class="">
							<img src="<?php echo get_template_directory_uri().'/images/chevron.svg'?>" alt="" srcset="">
						</li>
						<li class="active">
							<a href=<?php echo home_url( '/' ).'/projects/'.'?project_type='.$currentProjectsTerms[0]->slug ?>>
								<?php echo $currentProjectsTerms[0]->name;?>
							</a>
						</li>
						
					</ul>
					<?php
				}
			?>
		<?php
				if(!empty($currentModelGender)){
					?>
					<ul class="breadcrumb internal-model">
						<li>
							<a href=<?php echo home_url( '/' ).'/models/'.'?gender='.$currentModelGender[0]->slug ?>>
								<?php echo $currentModelGender[0]->name;?>
							</a>
						</li>
						<li class="">
							<img src="<?php echo get_template_directory_uri().'/images/chevron.svg'?>" alt="" srcset="">
						</li>
						<li class="active">
							<a href="#">
								<?php echo $title;?>
							</a>
						</li>
					</ul>
					<?php
				}
			?>
		<?php
			// var_dump($currentTalentType);
			if(!empty($currentTalentType)){
				?>
				<ul class="breadcrumb internal-model">
					<li>
						<a href=<?php echo home_url( '/' ).'/talents/'.'?talent_type='.$currentTalentType[0]->slug ?>>
							<?php echo $currentTalentType[0]->name;?>
						</a>
					</li>
					<li class="">
						<img src="<?php echo get_template_directory_uri().'/images/chevron.svg'?>" alt="" srcset="">
					</li>
					<li class="active">
						<a href="#">
							<?php echo $title;?>
						</a>
					</li>
				</ul>
				<?php
			}
		?>
        <a class="hamburger-icon" onClick="toggleOverlay()">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="9" viewBox="0 0 16 9">
				<g fill="none" fill-rule="evenodd" stroke-linecap="square">
					<g stroke="currentColor">
						<g>
							<path d="M13.816.5L.184.5M13.816 8.5L.184 8.5" transform="translate(-1401 -37) translate(1402 37)"/>
						</g>
					</g>
				</g>
			</svg>

		</a>
		<?php if ( get_post_type() === 'models' && is_singular()) {?>
		<a class="back-icon model-back-link" onClick="goBack('<?php echo home_url( '/' ).'/models/'?>')">
			<img src="<?php echo get_template_directory_uri().'/images/chevron.svg'?>" alt="">
			<span>Back</span>
		</a>
		<?php } ?>
		<?php if ( get_post_type() === 'talent_portfolio' && is_singular()) {?>
		<a class="back-icon model-back-link" onClick="goBack('<?php echo $talentBack?>')">
			<img src="<?php echo get_template_directory_uri().'/images/chevron.svg'?>" alt="">
			<span>Back</span>
		</a>
		<?php } ?>
		<?php if ( get_post_type() === 'projects' && is_singular()) {?>
		<a class="back-icon project-back-link" onClick="goBack('<?php echo '/projects'?>')">
			<img src="<?php echo get_template_directory_uri().'/images/chevron.svg'?>" alt="">
			<span>Back</span>
		</a>
		<?php } ?>
    </header>
	<div class="overlay " id="overlay">
		<div class="overlay-background"></div>
        <span class="hamburger-back" onClick="toggleBackToParent()">
			<svg xmlns="http://www.w3.org/2000/svg" width="12" height="20" viewBox="0 0 12 20">
				<g fill="none" fill-rule="evenodd" stroke-linecap="square">
					<g stroke="currentColor">
						<path d="M11 50L21 60 31 50" transform="translate(-15 -45) rotate(90 21 55)"/>
					</g>
				</g>
			</svg>
			</span>
		<span class="toggle-close" onClick="toggleOverlay()">
			<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
				<g fill="none" fill-rule="evenodd" stroke-linecap="square">
					<g stroke="currentColor">
						<g>
							<path d="M20 0L0 20M20 20L0 0" transform="translate(-1347 -44) translate(1348 45)"/>
						</g>
					</g>
				</g>
			</svg>

		</span>
        <nav class="overlay-menu">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
            <!-- <ul class="nav-parent">
                <li onClick="toggleChildMenu(this,'#415742')">
					<a href="#">Models</a>
					<ul class="nav-parent-child">
						<li>
							<a href="/models?gender=all">ALL</a>
							<div class="menu-image">
								<div class="aspect-1-1">
									<img src="<?php echo get_template_directory_uri().'/images/menu/all.jpg'?>"/>
								</div>
							</div>
						</li>
						<li>
							<a href="/models?gender=boys">Boys</a>
							<div class="menu-image">
								<div class="aspect-1-1">
									<img src="<?php echo get_template_directory_uri().'/images/menu/boys.jpg'?>"/>
								</div>
							</div>
						</li>
						<li>
							<a href="/models?gender=girls">Girls</a>
							<div class="menu-image">
								<div class="aspect-1-1">
									<img src="<?php echo get_template_directory_uri().'/images/menu/girls.jpeg'?>"/>
								</div>
							</div>
						</li>
						<li>
							<a href="/models?gender=queer">Queer</a>
							<div class="menu-image">
								<div class="aspect-1-1">
									<img src="<?php echo get_template_directory_uri().'/images/menu/queer.png'?>"/>
								</div>
							</div>
						</li>
					</ul>
				</li>
                <li onClick="toggleChildMenu(this,'#5657e6')">
					<a href="#">Talents</a>
					<ul class="nav-parent-child">
						<li>
							<a href="/talents?talent_type=art-design">Art + Design</a>
							<div class="menu-image">
								<div class="aspect-1-1">
									<img src="<?php echo get_template_directory_uri().'/images/homepage/cl1.jpg'?>"/>
								</div>
							</div>
						</li>
						<li>
							<a href="/talents?talent_type=hair-makeup">Hair + Makeup</a>
							<div class="menu-image">
								<div class="aspect-1-1">
									<img src="<?php echo get_template_directory_uri().'/images/homepage/cl2.jpg'?>"/>
								</div>
							</div>
						</li>
						<li>
							<a href="/talents?talent_type=image">Image</a>
							<div class="menu-image">
								<div class="aspect-1-1">
									<img src="<?php echo get_template_directory_uri().'/images/homepage/cl3.jpg'?>"/>
								</div>
							</div>
						</li>
						<li>
							<a href="/talents?talent_type=style">Style</a>
							<div class="menu-image">
								<div class="aspect-1-1">
									<img src="<?php echo get_template_directory_uri().'/images/homepage/cl4.jpg'?>"/>
								</div>
							</div>
						</li>
						<li>
							<a href="/talents?talent_type=video">Video</a>
							<div class="menu-image">
								<div class="aspect-1-1">
									<img src="<?php echo get_template_directory_uri().'/images/homepage/cl1.jpg'?>"/>
								</div>
							</div>
						</li>
						
					</ul>
				</li>
                <li  onClick="toggleChildMenu(this,'#ac5c44')">
					<a href="#">Projects</a>
					<ul class="nav-parent-child">
						<li>
							<a href="<?php echo  home_url( '/' ).'projects/casting'; ?>">Casting</a>
							<div class="menu-image">
								<div class="aspect-1-1">
									<img src="<?php echo get_template_directory_uri().'/images/homepage/cl3.jpg'?>"/>
								</div>
							</div>
						</li>
						<li>
							<a href="<?php echo  home_url( '/' ).'projects/digitalcampaigns'; ?>">Digital Campaigns</a>
							<div class="menu-image">
								<div class="aspect-1-1">
									<img src="<?php echo get_template_directory_uri().'/images/homepage/cl3.jpg'?>"/>
								</div>
							</div>
						</li>
						<li>
							<a href="<?php echo  home_url( '/' ).'projects/recruitment'; ?>">Recruitment</a>
							<div class="menu-image">
								<div class="aspect-1-1">
									<img src="<?php echo get_template_directory_uri().'/images/homepage/cl3.jpg'?>"/>
								</div>
							</div>
						</li>
					</ul>
				</li>
                <li><a href="<?php echo  home_url( '/' ).'contact'; ?>">Contact</a></li>
                <li><a href="<?php echo  home_url( '/' ).'about'; ?>">About</a></li>
                <li><a id="search-toggle" onClick="toggleSearchOverlay()">Search</a></li>

            </ul> -->
        </nav>
		<div class="search-container" >
			<span class="toggle-close" onClick="toggleOverlay();toggleSearchOverlay();">
				<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
					<g fill="none" fill-rule="evenodd" stroke-linecap="square">
						<g stroke="currentColor">
							<g>
								<path d="M20 0L0 20M20 20L0 0" transform="translate(-1347 -44) translate(1348 45)"/>
							</g>
						</g>
					</g>
				</svg>

			</span>
			<span class="toggle-search-back" onClick="toggleSearchOverlay()">
				<svg xmlns="http://www.w3.org/2000/svg" width="12" height="20" viewBox="0 0 12 20">
					<g fill="none" fill-rule="evenodd" stroke-linecap="square">
						<g stroke="#000">
							<path d="M11 50L21 60 31 50" transform="translate(-15 -45) rotate(90 21 55)"/>
						</g>
					</g>
				</svg>

			</span>
			<div class="search-box-wrapper">
				<?php echo do_shortcode('[wpdreams_ajaxsearchlite]')?>
			</div>
		</div>
    </div>
	<header id="masthead" class="site-header" style="display:none" >
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$nowform_x_feat_description = get_bloginfo( 'description', 'display' );
			if ( $nowform_x_feat_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $nowform_x_feat_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'nowform-x-feat' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header>
	<script>
		var modelsDefaultValue = 'all';
		function getColor(type){
			switch (type) {
				case "models":
					return '#415742';

				case "talent":
					return '#5657e6';
				case "projects":
					return '#ac5c44';
				default:
					return '#ffffff';
			}
		}
		$('.overlay-menu .menu-item').on('mouseover',function(){
			$('.overlay-menu .menu-item').removeClass('hovered');
			$(this).addClass('hovered')
			var bgcolor = getColor($(this).find('a').html().toLowerCase());
			$('.overlay-menu .sub-menu').removeClass('show');
			$(this).find('.sub-menu').addClass('show');
			$('.overlay-background').css('background-color',bgcolor);
			$('.overlay').css('background-color',bgcolor);
			if(bgcolor!=='#ffffff'){
				$('.overlay').addClass('is-colored')
			}else{
				$('.overlay').removeClass('is-colored')
			}
			if($(this).find('.sub-menu').length){
				$('.overlay-menu').addClass('has-child-selected');
				$('.overlay').addClass('is-child-open')
			}else{
				$('.overlay').removeClass('is-child-open')

			}
		})
		// $('.overlay-menu .menu-item:not(.menu-item-has-children)').on('mouseover',function(){
		// 	var bgcolor = getColor($(this).find('a').html().toLowerCase());
		// 	$('.overlay-menu .sub-menu').removeClass('show');
		// 	$(this).find('.sub-menu').addClass('show');
		// 	$('.overlay-background').css('background-color',bgcolor);
		// 	$('.overlay').css('background-color',bgcolor);
		// 	$('.overlay-menu').addClass('has-child-selected');
		// 	if(bgcolor){
		// 		$('.overlay').addClass('is-colored')
		// 	}else{
		// 		$('.overlay').removeClass('is-colored')
		// 	}
		// })
		function toggleChildMenu(el,color){
			$('.nav-parent-child').removeClass('show');
			$(el).find('.nav-parent-child').addClass('show');
			$('.overlay-background').css('background-color',color)
			$('.overlay-menu').addClass('has-child-selected');
			if(color){
				$('.overlay').addClass('is-colored')
			}else{
				$('.overlay').removeClass('is-colored')
			}
		}
		function toggleOverlay(){
			$('#overlay').toggleClass('open');	
			$('body').toggleClass('ham-opened');	
			$('html').toggleClass('ham-opened');
			$('#overlay').removeClass('is-colored');	
			$('.overlay-background').css('background-color','#fff');
			$('.sub-menu').removeClass('show')
			$('.menu-item').removeClass('hovered')
			document.querySelector('#ajaxsearchliteres1').style.display = 'none';
			document.querySelector('#ajaxsearchlite1 input.orig').value = '';
		}
		$('.search-toggle').on('click',toggleSearchOverlay);
		function toggleSearchOverlay(){
			document.querySelector('#ajaxsearchliteres1').style.display = 'none';
			document.querySelector('#ajaxsearchlite1 input.orig').value = '';
			$('.search-container').toggleClass('open')	
		}
		function toggleBackToParent(){
			$('.overlay-menu').removeClass('has-child-selected');
			$('.overlay-background').css('background-color','#fff');
			$('.nav-parent-child').removeClass('show');
			$('.sub-menu').removeClass('show');
			$('.overlay').removeClass('is-colored')
			$('.overlay').removeClass('is-child-open')
		}
		// change model filter
		function changedModels(selected){
			let params = new URLSearchParams(window.location.search);
			// urlSearchParams.set('tag',tag);
			console.log(params);
			params.set('gender',selected.value);
			window.location.search = '?' + params.toString();
		}
		// change talent filter
		function changedTalents(selected){
			console.log(selected);
			let params = new URLSearchParams(window.location.search);
			// urlSearchParams.set('tag',tag);
			console.log(params);
			params.set('talent_type',selected.value);
			window.location.search = '?' + params.toString();
		}
		function changedProjects(selected){
			console.log(selected);
			let params = new URLSearchParams(window.location.search);
			// urlSearchParams.set('tag',tag);
			console.log(params);
			params.set('project_type',selected.value);
			window.location.search = '?' + params.toString();
		}
		function filterByTag(tag,el){
			let params = new URLSearchParams(window.location.search);
			// urlSearchParams.set('tag',tag);
			console.log(params);
			params.set('tag',tag);
			window.location.search = '?' + params.toString();

			$('.tag-list li a').removeClass('active');
			el.classList.add('active');
			
		}
		function goBack(link){
			if(document.referrer.includes('models')){
				window.history.back();
			}else{
				window.location.href = link;
			}
		}
		// custom select
		/*
		Reference: http://jsfiddle.net/BB3JK/47/
		*/

		$('select').each(function(){
			var $this = $(this), numberOfOptions = $(this).children('option').length;
		
			$this.addClass('select-hidden'); 
			$this.wrap('<div class="select ' + this.classList[0] + '"></div>');
			$this.after('<div class="select-styled"></div>');

			var $styledSelect = $this.next('div.select-styled');
			$styledSelect.text($this.children('option').eq(0).text());
		
			var $list = $('<ul />', {
				'class': 'select-options'
			}).insertAfter($styledSelect);
		
			for (var i = 0; i < numberOfOptions; i++) {
				$('<li />', {
					text: $this.children('option').eq(i).text(),
					rel: $this.children('option').eq(i).val()
				}).appendTo($list);
			}
		
			var $listItems = $list.children('li');
		
			$styledSelect.click(function(e) {
				e.stopPropagation();
				console.log(this);
				$('div.select-styled.active').not(this).each(function(){
					$(this).removeClass('active').next('ul.select-options').hide();
				});
				$(this).toggleClass('active').next('ul.select-options').toggle();
			});
		
			$listItems.click(function(e) {
				e.stopPropagation();
				$styledSelect.text($(this).text()).removeClass('active');
				$this.val($(this).attr('rel'));
				$list.hide();
				if($('#models-gender').length) {$('#models-gender').trigger('change')}
				if($('#talents-type').length) {$('#talents-type').trigger('change')}
				if($('#project-type').length) {$('#project-type').trigger('change')}
				//console.log($this.val());
			});
		
			$(document).click(function() {
				$styledSelect.removeClass('active');
				$list.hide();
			});
			
			
		});
		// custom changes for on load
		$(document).ready(function(){
			document.querySelector('input.orig').type = 'text';
			// models select
			var $modelsSelectStyled = $('#models-gender + .select-styled');
			// talents select
			var $talentsSelectStyled = $('#talents-type + .select-styled');
			// projects select
			var $projectsSelectStyled = $('#project-type + .select-styled');

			if(window.location.search){
				var urlSearchParams = new URLSearchParams(window.location.search);
				var params = Object.fromEntries(urlSearchParams.entries());
				if(params.gender){
					$("#models-gender").val(params.gender);
					console.log(document.querySelector('li[rel="' + params.gender + '"]').classList.add('active'));
					$modelsSelectStyled.text(document.querySelector('li[rel="' + params.gender + '"]').innerText.replace('\n','').replaceAll('\t',''));
					$modelsSelectStyled.text(document.querySelector('li[rel="' + params.gender + '"]').innerText.replace('\n','').replaceAll('\t',''));
				}else{
					if(document.querySelector('li[rel="all"]')) {
						document.querySelector('li[rel="all"]').classList.add('active')
					}
				}
				if(params.tag){
					console.log($('.tag-list li[data-tag="all"] a'));
					$('.tag-list li[data-tag="'+params.tag+'"] a').addClass('active');
				}
				if(params.talent_type){
					$("#talents-type").val(params.talent_type);
					console.log(document.querySelector('li[rel="' + params.talent_type + '"]').classList.add('active'));
					$talentsSelectStyled.text(document.querySelector('li[rel="' + params.talent_type + '"]').innerText.replace('\n','').replaceAll('\t',''));
					$talentsSelectStyled.text(document.querySelector('li[rel="' + params.talent_type + '"]').innerText.replace('\n','').replaceAll('\t',''));
				}else{
					console.log($("#talents-type").val())
				}
				if(params.project_type){
					$("#project-type").val(params.project_type);
					document.querySelector('li[rel="' + params.project_type + '"]').classList.add('active');
					$projectsSelectStyled.text(document.querySelector('li[rel="' + params.project_type + '"]').innerText.replace('\n','').replaceAll('\t',''));
					$projectsSelectStyled.text(document.querySelector('li[rel="' + params.project_type + '"]').innerText.replace('\n','').replaceAll('\t',''));
				}
			}else{
					$('.tag-list li[data-tag="all"] a').addClass('active');
					if(document.querySelector('li[rel="all"]')) {
						document.querySelector('li[rel="all"]').classList.add('active')
					}
			}

			// // hide select options
			// if(window.innerWidth < 768){
			// 	$('.select-options').css('display','none')
			// }
		})
	</script>
