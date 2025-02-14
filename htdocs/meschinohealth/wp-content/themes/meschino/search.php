<?php
/**
 * Search results page
 * 
 * Please see /external/bootstrap-utilities.php for info on MhWp::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Bootstrap 3.3.7
 * @autor 		Meschino Health
 */echo "testese"; exit;
?>
<?php MhWp::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): ?>
<div class="content">
<h1><?php echo __('Search Results for', 'wp_meschino'); ?> '<?php echo get_search_query(); ?>'</h1>	
<ul class="media-list">
	<?php while ( have_posts() ) : the_post(); ?>
	<li class="media">
		<div class="media-body">
		 <h2 class="media-heading"><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link(__('Leave a Comment', 'wp_meschino'), __('1 Comment', 'wp_meschino'), __('% Comments', 'wp_meschino')); ?>
			<?php the_content(); ?>
		</div>
	</li>
	<?php endwhile; ?>
</ul>
</div>
<?php else: ?>
<h1><?php echo __('No results found for', 'wp_meschino'); ?> '<?php echo get_search_query(); ?>'</h1>
<?php endif; ?>

<?php MhWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
