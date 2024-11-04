<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
	 * @package 	WordPress
	 * @subpackage 	Bootstrap 3.3.7
	 * @autor 		Meschino Health
	 */
	
    
    /* ========================================================================================================================
	
	Add language support to theme
	
	======================================================================================================================== */
	add_action('after_setup_theme', 'my_theme_setup');
	function my_theme_setup(){
		load_theme_textdomain('wp_meschino', get_template_directory() . '/language');
	}
	


	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/bootstrap-utilities.php' );
	require_once( 'external/wp_bootstrap_navwalker.php' );
	
	/* ========================================================================================================================
	
	Add html 5 support to wordpress elements
	
	======================================================================================================================== */
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	
	//register_nav_menus(array('primary' => 'Primary Navigation'));
	// Add Your Menu Locations
	function register_my_menus() {
	  register_nav_menus(
	    array(  
	    	'primary' => __( 'Primary Navigation' ), 
	    	'secondary' => __( 'Secondary Navigation' )
	    )
	  );
	} 
	add_action( 'init', 'register_my_menus' );
	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'meschinohealth_style_script_init' );

	add_filter( 'body_class', array( 'MhWp', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonomies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function meschinohealth_style_script_init() {
		
		wp_register_script('bootstrap', get_template_directory_uri(). '/js/bootstrap.min.js', array( 'jquery' ));
		wp_enqueue_script('bootstrap');
		
		wp_register_script('slick', get_template_directory_uri(). '/js/slick/slick.min.js', array( 'jquery' ));
		wp_enqueue_script('slick');

		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery', 'bootstrap' ));
		wp_enqueue_script( 'site' );

		wp_register_script( 'custom', get_template_directory_uri().'/js/custom.js', array( 'jquery' ));
		wp_enqueue_script( 'custom' );
		
		wp_register_style( 'bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.css');
		wp_enqueue_style( 'bootstrap' );

		wp_register_style( 'font-awesome', get_stylesheet_directory_uri().'/css/font-awesome.min.css');
		wp_enqueue_style( 'font-awesome' );

		wp_register_style( 'slick', get_stylesheet_directory_uri().'/js/slick/slick.css');
		wp_enqueue_style( 'slick' );

		wp_register_style( 'slick', get_stylesheet_directory_uri().'/js/slick/slick-theme.css');
		wp_enqueue_style( 'slick' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css');
		wp_enqueue_style( 'screen' );

		wp_register_style( 'temporarily', get_stylesheet_directory_uri().'/style-sp.css');
		wp_enqueue_style( 'temporarily' );
	}
	// remove wp version param from any enqueued scripts
	function vc_remove_wp_ver_css_js( $src ) {
	    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
	        $src = remove_query_arg( 'ver', $src );
	    return $src;
	}
	add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
	add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
	/* ========================================================================================================================
	
	Widget
	
	======================================================================================================================== */
	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function bootstrap_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Top Sidebar', 'meschino' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'meschino' ),
			'before_widget' => '<section id="%1$s" class="social-widget nav navbar-nav navbar-right">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer', 'meschino' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'meschino' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => __( 'Subscribe', 'meschino' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'meschino' ),
			'before_widget' => '<section id="%1$s" class="subscribe-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => __( 'video Subscribe', 'meschino' ),
			'id'            => 'sidebar-4',
			'description'   => __( 'Add widgets here to appear in your footer.', 'meschino' ),
			'before_widget' => '<section id="%1$s" class="subscribe-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => __( 'video gallery Widget', 'meschino' ),
			'id'            => 'sidebar-5',
			'description'   => __( 'Add widgets here to appear in your footer.', 'meschino' ),
			'before_widget' => '<section id="%1$s" class="video-gallery-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
	add_action( 'widgets_init', 'bootstrap_widgets_init' );
	/* ========================================================================================================================
	
	Security & cleanup wp admin
	
	======================================================================================================================== */
	
	//remove wp version
	function theme_remove_version() {
	return '';
	}
	
	add_filter('the_generator', 'theme_remove_version');
	
	//remove default footer text
	function remove_footer_admin () {
        echo "";
    }
     
    add_filter('admin_footer_text', 'remove_footer_admin');
	
	//remove wordpress logo from adminbar
	function wp_logo_admin_bar_remove() {
        global $wp_admin_bar;

        /* Remove their stuff */
        $wp_admin_bar->remove_menu('wp-logo');
	}
	
	add_action('wp_before_admin_bar_render', 'wp_logo_admin_bar_remove', 0);
	

	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function bootstrap_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>
		<li class="media">
			<div class="media-left">
				<?php echo get_avatar( $comment ); ?>
			</div>
			<div class="media-body">
				<h4 class="media-heading"><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</div>
		<?php endif;
	}





add_action( 'init', 'codex_articles_init' );
/**
 * Register a Articles post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_articles_init() {
	$labels = array(
		'name'               => _x( 'Articles', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Article', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Articles', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Article', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Article', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Article', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Article', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Article', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Article', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Articles', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Articles', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Articles:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'article' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'article', $args );
}


// hook into the init action and call create_article_taxonomies when it fires
add_action( 'init', 'create_article_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "article"
function create_article_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Categorie', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Categories', 'textdomain' ),
		'all_items'         => __( 'All Categories', 'textdomain' ),
		'parent_item'       => __( 'Parent Categorie', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Categorie:', 'textdomain' ),
		'edit_item'         => __( 'Edit Categorie', 'textdomain' ),
		'update_item'       => __( 'Update Categorie', 'textdomain' ),
		'add_new_item'      => __( 'Add New Categorie', 'textdomain' ),
		'new_item_name'     => __( 'New Categorie Name', 'textdomain' ),
		'menu_name'         => __( 'Categories', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'categorie' ),
	);

	register_taxonomy( 'categorie', array( 'article' ), $args );

	// Add new taxonomy, make it hierarchical (like conditions)
	$labels = array(
		'name'                       => _x( 'Conditions', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Condition', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Conditions', 'textdomain' ),
		'popular_items'              => __( 'Popular Conditions', 'textdomain' ),
		'all_items'                  => __( 'All Conditions', 'textdomain' ),
		'parent_item'                => __( 'Parent Condition', 'textdomain' ),
		'parent_item_colon'          => __( 'Parent Condition:', 'textdomain' ),
		'edit_item'                  => __( 'Edit Condition', 'textdomain' ),
		'update_item'                => __( 'Update Condition', 'textdomain' ),
		'add_new_item'               => __( 'Add New Condition', 'textdomain' ),
		'new_item_name'              => __( 'New Condition Name', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate Conditions with commas', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or remove Conditions', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Conditions', 'textdomain' ),
		'not_found'                  => __( 'No Conditions found.', 'textdomain' ),
		'menu_name'                  => __( 'Conditions', 'textdomain' ),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'condition' ),
	);

	register_taxonomy( 'condition', 'article', $args );

	// Add new taxonomy, make it hierarchical (like age-genders)
	$labels = array(
		'name'                       => _x( 'Genders', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Gender', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Genders', 'textdomain' ),
		'popular_items'              => __( 'Popular Genders', 'textdomain' ),
		'all_items'                  => __( 'All Genders', 'textdomain' ),
		'parent_item'                => __( 'Parent Gender', 'textdomain' ),
		'parent_item_colon'          => __( 'Parent Gender:', 'textdomain' ),
		'edit_item'                  => __( 'Edit Gender', 'textdomain' ),
		'update_item'                => __( 'Update Gender', 'textdomain' ),
		'add_new_item'               => __( 'Add New Gender', 'textdomain' ),
		'new_item_name'              => __( 'New Gender Name', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate Genders with commas', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or remove Genders', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Genders', 'textdomain' ),
		'not_found'                  => __( 'No Genders found.', 'textdomain' ),
		'menu_name'                  => __( 'Genders', 'textdomain' ),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'gender' ),
	);

	register_taxonomy( 'gender', 'article', $args );
}


add_action( 'init', 'codex_videogallery_init' );
/**
 * Register a Video Gallery post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_videogallery_init() {
	$labels = array(
		'name'               => _x( 'Video Gallery', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Video', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Video Gallery', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Video', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Video', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Video', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Video', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Video', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Video', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Video Gallery', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Video Gallery', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Video Gallery:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'videogallery' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'videogallery', $args );
}

add_action( 'init', 'codex_nutritionmedicine_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_nutritionmedicine_init() {
	$labels = array(
		'name'               => _x( 'Nutrition Natural Medicine', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Nutrition Medicine', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Nutrition Natural Medicine', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Nutrition Medicine', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Nutrition Medicine', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Nutrition Medicine', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Nutrition Medicine', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Nutrition Medicine', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Nutrition Medicine', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Nutrition Medicine', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Nutrition Medicine', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Nutrition Medicine:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'nutritionmedicine' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'nutritionmedicine', $args );
}



function is_already_submitted($formName, $fieldName, $fieldValue) {
    require_once(ABSPATH . 'wp-content/plugins/contact-form-7-to-database-extension/CFDBFormIterator.php');
    $exp = new CFDBFormIterator();
    $atts = array();
    $atts['show'] = $fieldName;
    $atts['filter'] = "$fieldName=$fieldValue";
    $atts['unbuffered'] = 'true';
    $exp->export($formName, $atts);
    $found = false;
    while ($row = $exp->nextRow()) {
        $found = true;
    }
    return $found;
}
 
function my_validate_email($result, $tag) {
    $formName = 'By Condition Subscribers Popup'; // Change to name of the form containing this field
    $fieldName = 'your-email'; // Change to your form's unique field name
    $errorMessage = 'Email has already been submitted'; // Change to your error message
    $name = $tag['name'];
    if ($name == $fieldName) {
        if (is_already_submitted($formName, $fieldName, $_POST[$name])) {
            $result->invalidate($tag, $errorMessage);
        }
    }
    return $result;
}
 
// use the next line if your field is a **required email** field on your form
add_filter('wpcf7_validate_email*', 'my_validate_email', 10, 2);
// use the next line if your field is an **email** field not required on your form
add_filter('wpcf7_validate_email', 'my_validate_email', 10, 2);
 
// use the next line if your field is a **required text** field
add_filter('wpcf7_validate_text*', 'my_validate_email', 10, 2);
// use the next line if your field is a **text** field field not required on your form 
add_filter('wpcf7_validate_text', 'my_validate_email', 10, 2);


function php_execute($html){
if(strpos($html,"<"."?php")!==false){ ob_start(); eval("?".">".$html);
$html=ob_get_contents();
ob_end_clean();
}
return $html;
}
add_filter('widget_text','php_execute',100);