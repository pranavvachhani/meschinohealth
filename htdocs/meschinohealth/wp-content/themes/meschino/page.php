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
<?php if ( is_page( 'thankyou' )) { } else { ?>
    
    <?php dynamic_sidebar( 'sidebar-3' ); ?>
    
<?php } ?>
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

				<?php /*

				<h2 class="page-title"><?php the_title(); ?></h2>

				<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link(__('Leave a Comment', 'wp_meschino'), __('1 Comment', 'wp_meschino'), __('% Comments', 'wp_meschino')); ?> 

				*/?>

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

