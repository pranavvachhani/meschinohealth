<?php /* Template Name: Dr. James Meschino Article Template */ ?>



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

<div class="container">

	<div class="dr-article content">

		<div class="row">

			<div class="col-sm-3">

				<?php echo do_shortcode( '[searchandfilter id="1517"]' ); ?>					

			</div>

			<div class="col-sm-9">

			<div class="article-directory-desp">

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<h2 class="page-title"><?php the_title(); ?></h2>

					<?php the_content(); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; ?>

			</div>

			<!-- Featured Article -->

			<?php 

			// args

			$args = array(

				'numberposts'	=> 10,

				'post_type'		=> 'article',

				'meta_key'		=> 'featured_artices',

				'meta_value'	=> 'Yes' 

			);

			// query

			$the_query = new WP_Query( $args ); ?>

				<?php if( $the_query->have_posts() ): ?>

				<div class="article-block featured-article">

					<h3>Featured Article</h3>

					<ul>

					<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

						

								<li>

									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

								</li>

							

					<?php endwhile; ?>

					</ul>

				</div>	

				<?php endif; ?>

			<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

			<!-- Popular Video Article -->

			<?php 

			// args

			$args = array(

				'numberposts'	=> 10,

				'post_type'		=> 'article',

				'meta_key'		=> 'popular_video_articles',

				'meta_value'	=> 'Yes' 

			);

			// query

			$the_query = new WP_Query( $args ); ?>

				<?php if( $the_query->have_posts() ): ?>

				<div class="article-block popular-video-article">

					<h3>Popular Video Article</h3>

					<ul>

					<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

						

								<li>

									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

								</li>

								

					<?php endwhile; ?>

					</ul>

				</div>		

				<?php endif; ?>

			<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

			

			<div class="article-block recent-post">

				<h3>Recent Posts</h3>

				<ul>

				<?php

				    $recent_posts = wp_get_recent_posts(array('post_type'=>'article', 'numberposts' => 100,'order' => 'ASC'));

				    foreach( $recent_posts as $recent ){

				        echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';

				    }

				?>

				</ul>

			</div>

			</div>

		</div>

	</div>

</div>

<?php MhWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>