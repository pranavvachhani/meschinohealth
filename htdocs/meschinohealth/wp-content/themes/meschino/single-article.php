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

<?php $terms = get_the_terms( $post->ID , 'condition' ); 

	$items = array();

	foreach ( $terms as $term ) {

	  $items[] = $term->name;

	}

?>

<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">

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



<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">Subscribe to <?php echo $items[0]; ?> Newsletters</h4>

      </div>

      <?php echo do_shortcode( '[contact-form-7 id="1690" title="By Condition Subscribers Popup"]' ); ?>

    </div>

  </div>

</div>

<script>
	jQuery(document).ready(function($) {
		jQuery(".subscri-btn").click(function(event) {
			jQuery("#wpcf7-f1690-o1").find("input[name='conditions-name']").val("<?php echo $items[0]; ?>");	
		});
	});
</script>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="container">

	<div class="row">

		<div class="col-sm-12">

			<div class="content">


				<?php if (!empty($items)) { ?>

				<div class="subscribe-page">

					<div class="subscribe-box">

						<p class="subscri-ico">Subscribe to 

							<span class="condition-name"><?php echo $items[0]; ?></span>   

			                 Newsletters

            			</p>

						<a class="subscri-btn" data-toggle="modal" data-target="#myModal" href="#">Subscribe Now</a>

					</div>

				</div>
				
				<?php } ?>

				<?php array( 'posts_per_page' => '-1', 'post_type' => 'article' ,'post_status' => 'publish', 'orderby' => 'date', 'order' => 'ASC') ?>				

				<h1 class="page-title"><?php the_title(); ?></h1>

				

				<?php $post_video_url = get_field( "post_video_url" ); ?>

				

				<?php if( $post_video_url ) { ?> 

					<div class="post-video-url">

						<iframe width="853" height="480" src="<?php echo the_field('post_video_url'); ?>?rel=0" frameborder="0" allowfullscreen></iframe>

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

