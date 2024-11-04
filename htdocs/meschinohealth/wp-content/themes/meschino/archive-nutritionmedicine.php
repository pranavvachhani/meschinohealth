<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Please see /external/bootstrap-utilities.php for info on MhWp::get_template_parts() 
 *
 * @package 	WordPress
 * @subpackage 	Bootstrap 3.3.7
 * @autor 		Meschino Health
 */
?>
<?php MhWp::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php if(function_exists('bcn_display')) {
				    bcn_display();
				} ?>		
			</div>
		</div>
	</div>
</div>
<!-- Inner Page Banner Section -->
<?php 
	$banner_tle = get_field( "banner_title" );
	$banner_img = get_field( "banner_image" );
 ?>
<?php if( $banner_tle || $banner_img ) { ?> 
<div class="innerpagebanner" style="background-image: url(<?php the_field('banner_image'); ?>);">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h3><?php the_field('banner_title'); ?></h3>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<div class="container">
	<div class="content">
		<div class="video-gallery">
			<h2 class="page-title"><?php the_title(); ?></h2>
			<!-- Video Gallery List -->
			<?php 
			// args
			$args = array(
				'posts_per_page' => 1000,
				'post_type'		=> 'nutritionmedicine'
			);
			// query
			$the_query = new WP_Query( $args ); ?>
				<ul class="item-list">
				<?php if( $the_query->have_posts() ): ?>
					<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<li>
							<a href="<?php the_permalink(); ?>">
								<?php
									$youtube_add_video_url = get_field( "nutrition_natural_medicine_video_url" ); 
									$youtubeurl = explode("/", $youtube_add_video_url);
									$youtube = end($youtubeurl);
									$youtubecrop = substr($youtube, 8);
								?>
								<?php if( $youtube_add_video_url ) { ?>
									<span class="image-wrap"><img src="//img.youtube.com/vi/<?php echo $youtubecrop; ?>/mqdefault.jpg" alt=""></span>
								<?php } ?>
								<span class="image-caption"><?php the_title(); ?></span>
							</a>
						</li>	
					<?php endwhile; ?>
				<?php endif; ?>
				</ul>
			<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
		</div>
	</div>
</div>
<?php MhWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>