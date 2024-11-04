<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2015 Designs & Code
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */
?>
<div class="found-article">
	Found <?php echo $query->found_posts; ?> Results
</div>
<div class="article-block">
<?php if ( $query->have_posts() ) {	?>
	<ul>
		<?php while ($query->have_posts()) { $query->the_post(); ?>
			<li class="item <?php the_field('video_article'); ?>">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</li>
		<?php } ?>
<?php } else { 	echo "No Results Found"; ?>
	</ul>
<?php } ?>
</div>