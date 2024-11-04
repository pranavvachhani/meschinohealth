<?php /* Template Name: Dr. James Meschino Article Result Template */ ?>



<?php MhWp::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

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

<div class="container article-result-wrap">

	<div class="row">

		<div class="col-sm-3">

			<div class="article-left-column">

				<?php echo do_shortcode( '[searchandfilter id="1517"]' ); ?>					

			</div>

		</div>

		<div class="col-sm-9">

			<div class="article-directory-desp">

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<h2 class="page-title"><?php the_title(); ?></h2>

					<?php the_content(); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; ?>

			</div>

			<div class="article-tabs">

				<?php  $paged = get_query_var( 'paged', 1 );  ?>

				<?php //echo (int) $paged; ?>

				<?php if(isset($_GET['_sft_categorie'])) { 	?>

					<a href="javascript:void(0)" class="article-only">Articles</a>

					<a href="javascript:void(0)" class="video-only">Video Articles</a>

					<a href="javascript:void(0)" class="view-all">View all Article</a>

				<?php } ?>

				<?php if(isset($_GET['_sft_condition'])) { 	?>

					<a href="javascript:void(0)" class="article-only">Articles</a>

					<a href="javascript:void(0)" class="video-only">Video Articles</a>

					<a href="javascript:void(0)" class="view-all">View all Article</a>

				<?php } ?>

				<?php if(isset($_GET['_sft_gender'])) { 	?>

					<a href="javascript:void(0)" class="article-only">Articles</a>

					<a href="javascript:void(0)" class="video-only">Video Articles</a>

					<a href="javascript:void(0)" class="view-all">View all Article</a>

				<?php } ?>

				<?php if(isset($_GET['_sf_s'])) { 	?>

					<a href="javascript:void(0)" class="article-only">Articles</a>

					<a href="javascript:void(0)" class="video-only">Video Articles</a>

					<a href="javascript:void(0)" class="view-all">View all Article</a>

				<?php } ?>

			</div>

			<div class="article-results">

				<?php echo do_shortcode( '[searchandfilter id="1517" show="results"]' ); ?>

			</div>

		</div>

	</div>

</div>

<?php MhWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>