<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>">
        <img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>"> 
      </a>
    </div>
	<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">

    <?php dynamic_sidebar( 'sidebar-1' ); ?>
		
    <div class="navbar-right navbar-wrap secondary-nav">
      <h3>Natural Health Solutions</h3>
      <?php
        wp_nav_menu( array(
          'menu'              => 'Secondary Navigation',
          'theme_location'    => 'secondary',
          'depth'             => 2,
          'container'         => false,
          'menu_class'        => 'nav navbar-nav navbar-right',
          'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
          'walker'            => new wp_bootstrap_navwalker())
        );
      ?>
    </div>

    <div class="navbar-right navbar-wrap primary-nav">
      <h3>Dr. James Meschino</h3>
      <?php
        wp_nav_menu( array(
          'menu'              => 'Primary Navigation',
          'theme_location'    => 'primary',
          'depth'             => 2,
          'container'         => false,
          'menu_class'        => 'nav navbar-nav',
          'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
          'walker'            => new wp_bootstrap_navwalker())
        );
      ?>
    </div>

		<?php //get_search_form(); ?>
	</div>
  </div>
</nav>