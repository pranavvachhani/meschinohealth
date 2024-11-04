<?php /* Template Name: Home Page Template */ ?>

<?php MhWp::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<!-- Banner Slider -->
<?php if( have_rows('slide') ): ?>
<div class="slides">
	<?php while( have_rows('slide') ): the_row(); 
        // vars
        $slideType = get_sub_field('slider_type');
		$image = get_sub_field('slide_images');
		$content = get_sub_field('slide_caption');
		$mobileimage = get_sub_field('slide_mobile_view');
		$slidelink = get_sub_field('slide_link');
	?>
		<div>
            <div class="container-fluid" style="padding: 0">
                <?php if($slideType == "with Content"): ?>                    
                        <div class="newstyle-slider-caption">
                            <div class="col-left">
                                <?php echo $content; ?>
                            </div>
                            <div class="col-right">
								<?php if($slidelink): ?>
									<a href="<?php echo $slidelink; ?>" target="_blank">
										<img src="<?php echo $image; ?>" alt="" />
									</a>
								<?php else: ?>
									<img src="<?php echo $image; ?>" alt="" />
								<?php endif; ?>
                            </div>
                        </div>
                <?php endif;?>
                <?php if($slideType == "Image only"): ?>
                    <div class="image-only">
						<?php if($slidelink): ?>
						<a href="<?php echo $slidelink; ?>" target="_blank">
							<picture>
								<source media="(min-width:768px)" srcset="<?php echo $image; ?>">
								<img src="<?php echo $mobileimage; ?>" alt="" />
	                        </picture>
						</a>
						<?php else: ?>
                        <picture>
                            <source media="(min-width:768px)" srcset="<?php echo $image; ?>">
                            <img src="<?php echo $mobileimage; ?>" alt="" />
                        </picture>
						<?php endif; ?>
                    </div>
                <?php endif;?>
            </div>
		</div>
	<?php endwhile; ?>
</div>
<?php endif; ?>
<!-- Banner Slider End -->
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
<!-- About Dr.James Meschino Section -->
<div class="video-wrap">
	<div class="container">
		<div class="row">
			<?php 
				$html_video = get_field( "html_video_url" ); 
				$youtube_video = get_field( "youtube_video_url" ); 
			?>
			<?php if( $html_video || $youtube_video != "" ){ ?>
				<div class="<?php if( $youtube_video || $html_video ) { echo "col-sm-12 col-md-7 col-lg-7"; } else { echo "hidden"; } ?>">
					<div class="video-frame">
					<?php if( get_field('html_video_url') ): ?>
						<video width="400" controls>
						  <source src="<?php the_field('html_video_url'); ?>" type="video/mp4">
						</video>
					<?php endif; ?>

					<?php if( get_field('youtube_video_url') ): ?>
						<iframe width="560" height="315" src="<?php the_field('youtube_video_url'); ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
					<?php endif; ?>
					</div>
				</div>
			<?php } ?>
			

			<?php $video_content = get_field( "video_content" ); ?>
			<?php if( $video_content ) { ?> 
				<div class="<?php if( $youtube_video || $html_video ) { echo "col-sm-12 col-md-5 col-lg-5"; } else { echo "col-sm-12"; } ?>">
					<div class="video-content">
						<?php the_field('video_content'); ?>
					</div>
				</div>
			<?php } ?>		

		</div>
	</div>
</div>
<!-- About Dr.James Meschino Section End -->
<?php MhWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>