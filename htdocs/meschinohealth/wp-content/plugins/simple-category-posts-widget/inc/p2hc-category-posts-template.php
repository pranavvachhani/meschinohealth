<?php $popular_post = get_field( "popular_post" ); ?>
<?php if( $popular_post == 1) { ?>
    <li class="wp-cpl">
        <?php if($disable_featured_image == 'false'){ ?>
            <span class="date-stamp"><?php the_time('d'); ?><span class="month"><?php the_time('M'); ?></span></span>
            <figure class="image">
                <a href="<?php the_permalink(); ?>">
                  <img src="<?php echo $thumbnail['0']; ?>" alt="<?php the_title(); ?>">
                </a>
                <!-- <span class="categories-label"><?php the_category( $separator=',' ); ?></span> -->
            </figure>
        <?php } ?>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <?php if($disable_excerpt == 'false'){ ?>
            <?php the_excerpt(); ?>
        <?php } ?>
    </li>
<?php } ?>  
<?php /*<article class="p2hc-post">
    <?php if($disable_featured_image == 'false'){ ?>
    <span class="date-stamp"><?php the_time('d'); ?><span class="month"><?php the_time('M'); ?></span></span>
    <figure class="image">
        <a href="<?php the_permalink(); ?>">
          <img src="<?php echo $thumbnail['0']; ?>" alt="<?php the_title(); ?>">
        </a>
        <!-- <span class="categories-label"><?php the_category( $separator=',' ); ?></span> -->
    </figure>
    <?php } ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php if($disable_excerpt == 'false'){ ?>
        <?php the_excerpt(); ?>
    <?php } ?>
</article> <?php */?>
