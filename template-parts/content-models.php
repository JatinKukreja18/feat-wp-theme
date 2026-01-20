<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nowform_x_Feat
 */

?>

<div class="col-lg-4 col-sm-6 col-xs-12" style="line-height:0">
<div class="models-column">
	<?php
	$url= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$metad= wp_get_attachment_metadata( get_post_thumbnail_id($post->ID) );
	if($url){
	?>
	<img src="<?php echo $url?>" alt="" srcset="" 
		width="<?php echo $metad['width']?>"
		height="<?php echo $metad['height']?>">
	<?php
		} else{?>

	<img src="" alt="" srcset="" style="height:100%">
		<?php }?>
	<a href="<?php echo get_permalink($post->ID)?>" class="models-column-content">
		<h2 class="uppercase"><?php echo get_the_title()?></h2>	
	</a>
</div>
</div>
<script>
	$(document).ready(function(){
		$('.models-column').on('mouseover',function(){
			console.log(this.classList)
		})
	})
</script>
<!-- #post-<?php the_ID(); ?> -->
