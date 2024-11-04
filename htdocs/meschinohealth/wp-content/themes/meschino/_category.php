<?php
/**
 * The template for displaying Category Archive pages
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
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="content">
				<?php if ( have_posts() ): ?>
					<h1><?php echo __('Category Archive:', 'wp_meschino'); ?> <?php echo single_cat_title( '', false ); ?></h1>
					<ul class="media-list">
						<?php while ( have_posts() ) : the_post(); ?>
						<li class="media">
							
					        <a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
							
						</li>
						<?php endwhile; ?>
					</ul>
				<?php else: ?>
					<h1><?php echo __('No posts to display in', 'wp_meschino'); ?> <?php echo single_cat_title( '', false ); ?></h1>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php MhWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
