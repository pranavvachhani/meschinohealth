<?php
/**
 * The Template for displaying all single posts
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
<!-- Inner Page Banner Section End-->
<!-- Subscribe to Dr. Meschino's  Free Newsletters Section -->
<?php dynamic_sidebar( 'sidebar-3' ); ?>

<div class="modal fade in" id="video-sub-Modal">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Sign Up Dr. Meschino’s Newsletters</h4>
	    	</div>
			<div class="modal-body">
                <?php dynamic_sidebar( 'sidebar-4' ); ?>
	    	</div>
	  	</div>
	</div>
</div>
<!-- Subscribe to Dr. Meschino's  Free Newsletters Section End -->
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="content">
				<?php array( 'posts_per_page' => '-1', 'post_type' => 'article' ,'post_status' => 'publish', 'orderby' => 'date', 'order' => 'ASC') ?>				
				<h2 class="page-title"><?php the_title(); ?></h2>
				<?php 
					$youtube_add_video_url = get_field( "youtube_add_video_url" ); 
					$youtubeurl = explode("/", $youtube_add_video_url);
					$youtube = end($youtubeurl);
					$youtubecrop = substr($youtube, 8);
				?>
				
				<?php if( $youtube_add_video_url ) { ?> 
					<div class="post-video-url">
						<iframe width="853" height="480" src="https://www.youtube.com/embed/<?php echo $youtubecrop; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
					</div>
				<?php } ?>
				<?php the_content(); ?>
				<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
					<h3><?php echo __('About', 'wp_meschino'); ?> <?php echo get_the_author() ; ?></h3>
				<?php the_author_meta( 'description' ); ?>
				<?php endif; ?>
				<?php //comments_template( '', true ); ?>
			</div>
		</div>
	</div>
</div>
<?php endwhile; ?>

<?php MhWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
