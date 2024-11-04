<?php
/**
 * Example Widget Class
 */
class simple_category_posts_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
        'p2hc_widget', 

        // Widget name will appear in UI
        __('Category Posts Widget', 'p2hc_widget_posts'), 

        // Widget description
        array( 'description' => __( 'List posts in selected category/taxonomy.', 'p2hc_widget_posts' ), ) 
        );
    }

    function post_type_dropdown($selected_post_type){
        $args = array(
            'public' => true
        );
        $output = 'objects';
        $post_types = get_post_types( $args, $output );
        printf( '<select name="%s" class="p2hc-posttype">', $this->get_field_name('p2hc_post_type') );
        foreach ( $post_types as $post_type ) {
            if(!in_array($post_type->name, ['attachment','page','revision','nav_menu_item','custom_css','customize_changeset'])){
                $is_selected = ($selected_post_type==$post_type->name) ? ' selected' : '';
                printf( '<option value="%s"%s>%s</option>', esc_attr( $post_type->name ),$is_selected, esc_html( $post_type->label ) );
            }
        }
        print( '</select>' );

    }

    function taxonomy_dropdown($selected_taxonomy) {
    	$args = array(
		  'public'   => true,
		  '_builtin' => true
		);
		$output = 'objects'; 
		$taxonomies = get_taxonomies($args,$output);
		// var_dump($selected_taxonomy);
		// var_dump($taxonomies);
		if ( $taxonomies ) {
			printf( '<select name="%s" class="p2hc-taxonomy">', $this->get_field_name('p2hc_taxonomy') );
			
			foreach ( $taxonomies as $taxonomy ) {
				$is_selected = ($selected_taxonomy==$taxonomy->name) ? ' selected' : '';
				if($taxonomy->name!='post_format'){
					printf( '<option value="%s"%s>%s</option>', esc_attr( $taxonomy->name ),$is_selected, esc_html( $taxonomy->label ) );
				}
			}
			print( '</select>' );
		}
	}

    function widget($args, $instance) {	
        //http://php.net/manual/en/function.extract.php
        extract( $args, EXTR_SKIP );
        apply_filters('widget_title', $instance['title']);
        $title = $instance['title'];
        $no = empty($instance['no']) ? '5' : $instance['no'];
        $p2hc_post_type = $instance['p2hc_post_type'];
        $p2hc_taxonomy = $instance['p2hc_taxonomy'];
        $categories 	= $instance['p2hc_categories'];
        $disable_featured_image = $instance[ 'disable_featured_image' ] ? 'true' : 'false';
        $disable_excerpt = $instance[ 'disable_excerpt' ] ? 'true' : 'false';
        ?>
        <?php echo $before_widget; ?>
        <?php if ( $title )  echo $before_title . $title . $after_title; ?>
        <?php echo '<ul class="wp-cpl-theme-no">'; ?>
        <?php 
        $args = array(
            'post_type' => $p2hc_post_type,
            'posts_per_page'  => $no,
            'tax_query' => array(
                array(
                    'taxonomy' => $p2hc_taxonomy,
                    'field'    => 'term_id',
                    'terms'    => $categories,
                ),
            ),
        );
        $the_query = new WP_Query( $args );
        // var_dump($the_query->request);
        if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); 
            $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );  
            $template_file = get_template_directory() . '/inc/p2hc-category-posts-template.php';
            if (!file_exists($template_file)) {
                $template_file = SCPW_PLUGIN_PATH . '/inc/p2hc-category-posts-template.php';
            }
            include($template_file);
        endwhile; endif; wp_reset_query(); 
        echo '</ul>';
        echo $after_widget; 
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['no'] = strip_tags($new_instance['no']);
        $instance['p2hc_post_type'] = strip_tags($new_instance['p2hc_post_type']);
        $instance['p2hc_taxonomy'] = strip_tags($new_instance['p2hc_taxonomy']);
		$instance['p2hc_categories'] =  $new_instance['p2hc_categories'];
        $instance['disable_featured_image'] = $new_instance['disable_featured_image'];
        $instance['disable_excerpt'] =  $new_instance['disable_excerpt'];
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
        // var_dump($instance);
        $defaults = array(
            'title' => 'Featured Posts',
            'p2hc_post_type' => 'post',
            'p2hc_taxonomy' => 'category',
            'p2hc_categories' => '',
            'disable_featured_image' => '',
            'disable_excerpt' => '',
            'no' => '5'
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

 
        $title = strip_tags($instance['title']);
        $no = strip_tags($instance['no']);
        $p2hc_post_type = $instance['p2hc_post_type'];
        $p2hc_taxonomy = $instance['p2hc_taxonomy'];
        $categories	= isset($instance['p2hc_categories']) ? $instance['p2hc_categories'] : array();
        $disable_featured_image = strip_tags($instance['disable_featured_image']);
        $disable_excerpt = strip_tags($instance['disable_excerpt']);

        ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('no'); ?>">No. of posts:
            <input class="widefat" id="<?php echo $this->get_field_id('no'); ?>" name="<?php echo $this->get_field_name('no'); ?>" type="text" value="<?php echo $no; ?>" />
          </label>  
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('p2hc_post_type'); ?>"><?php _e('Select Post Type:'); ?></label><br/>
            <?php $this->post_type_dropdown($p2hc_post_type); ?> 
        </p>
        <p>
        	<label for="<?php echo $this->get_field_id('p2hc_taxonomy'); ?>"><?php _e('Select Category Type:'); ?></label><br/>
        	<?php $this->taxonomy_dropdown($p2hc_taxonomy); ?> 
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('p2hc_categories'); ?>"><?php _e('Select Categories:'); ?></label> 
          <?php
              $args = array(
                'show_option_all'    => '',
                'show_option_none'   => '',
                'option_none_value'  => '-1',
                'orderby'            => 'ID',
                'order'              => 'ASC',
                'show_count'         => 0,
                'hide_empty'         => 1,
                'child_of'           => 0,
                'exclude'            => '',
                'include'            => '',
                'echo'               => 0,
                'selected'           => 0,
                'hierarchical'       => 0,
                'name'               => $this->get_field_name('p2hc_categories').'[]',
                'id'                 => '',
                'class'              => 'p2hc-terms postform chosen-select-deselect',
                'depth'              => 0,
                'tab_index'          => 0,
                'taxonomy'           => $p2hc_taxonomy, #$taxonomy,
                'hide_if_empty'      => false,
                'value_field'      => 'term_id',
              ); 
              $dropdown = wp_dropdown_categories( $args );

              // dropdown into an MultiSelect
              $dropdown = str_replace('id=', 'data-placeholder="Select Categories..." multiple="multiple"  id=', $dropdown);

              // Display saved values
              if (is_array($categories)) {
                  foreach ($categories as $key => $post_term) {
                      $dropdown = str_replace(' value="' . $post_term . '"', ' value="' . $post_term . '" selected="selected"', $dropdown);
                  }
              }

              echo $dropdown;

            ?>

        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'disable_featured_image' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'disable_featured_image' ); ?>" name="<?php echo $this->get_field_name( 'disable_featured_image' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'disable_featured_image' ); ?>">Disable Featured Image</label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'disable_excerpt' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'disable_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'disable_excerpt' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'disable_excerpt' ); ?>">Disable Excerpt</label>
        </p>
        <?php 
    }
 
 
} // end class simple_category_posts_widget

// register Foo_Widget widget
function register_simple_category_posts_widget() {
    register_widget( 'simple_category_posts_widget' );
}
add_action( 'widgets_init', 'register_simple_category_posts_widget' );
?>