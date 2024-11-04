<?php
function p2hc_register_admin_js()
{
    // Register the script like this for a plugin:
    wp_register_script( 'chosen', SCPW_PLUGIN_URL.'/js/chosen_v1.6.2/chosen.jquery.min.js', array('jquery'), SCPW_PLUGIN_VERSION, 'all' );
    wp_register_script( 'p2hc-category-posts',SCPW_PLUGIN_URL.'/js/simple-category-posts-widget.js', array('jquery'), SCPW_PLUGIN_VERSION, 'all' );
        // or
    //plugins_url( '/../js/chosen_v1.6.2/chosen.jquery.min.js', __FILE__ )
    // // Register the script like this for a theme:
    // wp_register_script( 'custom-script', get_template_directory_uri() . '/js/custom-script.js', array( 'jquery' ) );

    // creating taxonomies & terms object 
    $args = array('public'   => true, '_builtin' => true);
    $output = 'objects'; 
    $tax_terms = [];
    $taxonomies = get_taxonomies($args,$output);
    foreach ( $taxonomies as $taxonomy ) {
        if($taxonomy->name!='post_format'){
            $terms = get_terms( $taxonomy->name, array(
                'hide_empty' => true,
                'orderby' => 'name'
            ));
            foreach ( $terms as $term ) {
                $tax_terms[$taxonomy->name][$term->name] = $term->term_id;
            }
        }
    }


    wp_localize_script( 'p2hc-category-posts', 'taxTerms', $tax_terms );

    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'chosen' );
    wp_enqueue_script( 'p2hc-category-posts' );
}
add_action( 'admin_enqueue_scripts', 'p2hc_register_admin_js' );
//add_action( 'wp_enqueue_scripts', 'p2hc_register_js' );


function p2hc_register_admin_css()
{
    // Register the style like this for a plugin:
    wp_register_style( 'chosen', SCPW_PLUGIN_URL . '/js/chosen_v1.6.2/chosen.min.css', array(), SCPW_PLUGIN_VERSION, 'all' );
    // or
    // // Register the style like this for a theme:
    // wp_register_style( 'custom-style', SCPW_PLUGIN_URL . '/css/custom-style.css', array(), '20120208', 'all' );
 
    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style( 'chosen' );
}
add_action( 'admin_enqueue_scripts', 'p2hc_register_admin_css' );


// Frontend
function p2hc_register_frontend_css(){
    wp_register_style( 'p2hc-category-posts', SCPW_PLUGIN_URL . '/css/p2hc-category-posts.css', array(), SCPW_PLUGIN_VERSION, 'all' );
    wp_enqueue_style( 'p2hc-category-posts' );
}


add_action( 'wp_enqueue_scripts', 'p2hc_register_frontend_css' );

?>