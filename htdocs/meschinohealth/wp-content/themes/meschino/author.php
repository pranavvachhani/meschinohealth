<?php
/**
 * The template for displaying Author Archive pages
 *
 * Please see /external/bootstrap-utilities.php for info on MhWp::get_template_parts() 
 *
 * @package 	WordPres6
 * @subpackage 	Bootstrap 3.3.7
 * @autor 		Meschino Health
 */
?>
<?php MhWp::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): the_post(); ?>

<h1><?php echo __('Author Archives:', 'wp_meschino'); ?> <?php echo get_the_author() ; ?></h1>

<?php if ( get_the_author_meta( 'description' ) ) : ?>
<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
<h2><?php echo __('About', 'wp_meschino'); ?> <?php echo get_the_author() ; ?></h2>
<?php the_author_meta( 'description' ); ?>
<?php endif; ?>
<ul class="media-list">
    <?php rewind_posts(); while ( have_posts() ) : the_post(); ?>
    <li class="media">
        <div class="media-body">
            <h2 class="media-heading"><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link(__('Leave a Comment', 'wp_meschino'), __('1 Comment', 'wp_meschino'), __('% Comments', 'wp_meschino')); ?>
			<?php the_content(); ?>
        </div>
    </li>
    <?php endwhile; ?>
</ul>

<?php else: ?>
<h2><?php echo __('No posts to display for', 'wp_meschino'); ?> <?php echo get_the_author() ; ?></h2>	
<?php endif; ?>

<?php MhWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
