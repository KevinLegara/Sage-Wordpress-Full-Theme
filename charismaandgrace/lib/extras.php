<?php



namespace Roots\Sage\Extras;



use Roots\Sage\Setup;



use \WP_Widget;



/**

 * Add <body> classes

 */

function body_class($classes) {

  // Add page slug if it doesn't exist

  if (is_single() || is_page() && !is_front_page()) {

    if (!in_array(basename(get_permalink()), $classes)) {

      $classes[] = basename(get_permalink());

    }

  }



  // Add class if sidebar is active

  if (Setup\display_sidebar()) {

    $classes[] = 'sidebar-primary';

  }



  return $classes;

}

add_filter('body_class', __NAMESPACE__ . '\\body_class');



/**

 * Clean up the_excerpt()

 */

function excerpt_more() {

  return ' &hellip; <a class="post-read-more" href="' . get_permalink() . '">' . __('Read More »', 'sage') . '</a>';

}

add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');





if( function_exists('acf_add_options_page') ) {

  

  acf_add_options_page(array('page_title' => 'Theme Options'));

  

}







/**

 * Widgets

 */



/*** About Me Widget ***/



class aboutme_widget extends WP_Widget {



  function __construct() {

    parent::__construct(

    // Base ID of your widget

    'aboutme_widget', 



    // Widget name will appear in UI

    __('About Me', 'aboutme_widget_domain'), 



    // Widget description

    array( 'description' => __( 'Charisma & Grace About Me widget', 'aboutme_widget_domain' ), ) 

    );

  }



  // Creating widget front-end

  // This is where the action happens

  public function widget( $args, $instance ) {

    $title = apply_filters( 'widget_title', $instance['title'] );

    // before and after widget arguments are defined by themes

    echo $args['before_widget'];

    if ( ! empty( $title ) )

    echo $args['before_title'] . $title . $args['after_title'];



    $widget_id = $args['widget_id'];



    //acf fields

    $image = get_field('about_me_image', 'widget_' . $widget_id);

    $content = get_field('about_me_content', 'widget_' . $widget_id);



    echo '<img class="about-me-img img-fluid img-circle" src="'.$image['url'].'" alt="'.$image['alt'].'" title="'.$image['title'].'"/>';

    echo '<div class="details">'.$content.'</div>';



    // This is where you run the code and display the output

   // echo __( 'Hello, World!', 'wpb_widget_domain' );

    echo $args['after_widget'];

  }

      

  // Widget Backend 

  public function form( $instance ) {

    if ( isset( $instance[ 'title' ] ) ) {

      $title = $instance[ 'title' ];

    }

    else {

      $title = __( 'About Me', 'aboutme_widget_domain' );

    }

    // Widget admin form

    ?>

    <p>

    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 

    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

    </p>

    <?php 

  }

    

  // Updating widget replacing old instances with new

  public function update( $new_instance, $old_instance ) {

      $instance = array();

      $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    return $instance;

  }

} // Class wpb_widget ends here



// Register and load the widget

function aboutme_load_widget() {

  register_widget( __NAMESPACE__ . '\\aboutme_widget' );

}

add_action( 'widgets_init', __NAMESPACE__ . '\\aboutme_load_widget' );





/*** Social Media Links Widget ****/

class socialmedia_widget extends WP_Widget {



  function __construct() {

    parent::__construct(

    // Base ID of your widget

    'socialmedia_widget', 



    // Widget name will appear in UI

    __('Social Media Links', 'socialmedia_widget_domain'), 



    // Widget description

    array( 'description' => __( 'Charisma & Grace Social Media Links widget', 'socialmedia_widget_domain' ), ) 

    );

  }



  // Creating widget front-end

  // This is where the action happens

  public function widget( $args, $instance ) {

    $title = apply_filters( 'widget_title', $instance['title'] );

    // before and after widget arguments are defined by themes

    echo $args['before_widget'];

    if ( ! empty( $title ) )

    echo $args['before_title'] . $title . $args['after_title'];



    $widget_id = $args['widget_id'];



    //values are taken from Theme Options

    echo '<div class="details">

            <ul class="social-icons">';



    if (get_field('instagram','option') == '') {

      echo '';

    }else{

      echo '<li><a href="'.get_field('instagram','option').'" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>';

    }



    if (get_field('twitter','option') == '') {

      echo '';

    }else{

      echo '<li><a href="'.get_field('twitter','option').'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';

    }



    if (get_field('pinterest','option') == '') {

      echo '';

    }else{

      echo '<li><a href="'.get_field('pinterest','option').'" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>';

    }



    if (get_field('facebook','option') == '') {

      echo '';

    }else{

      echo '<li><a href="'.get_field('facebook','option').'" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';

    }



    if (get_field('email','option') == '') {

      echo '';

    }else{

      echo '<li><a href="mailto:'.get_field('email','option').'" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>';

    }



    echo '</ul><!--end social-icons-->

          </div>';







    // This is where you run the code and display the output

   // echo __( 'Hello, World!', 'wpb_widget_domain' );

    echo $args['after_widget'];

  }

      

  // Widget Backend 

  public function form( $instance ) {

    if ( isset( $instance[ 'title' ] ) ) {

      $title = $instance[ 'title' ];

    }

    else {

      $title = __( 'Social Media Links', 'socialmedia_widget_domain' );

    }

    // Widget admin form

    ?>

    <p>

    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 

    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

    </p>

    <p>

      To edit values of social media links, click <a href="<?php echo get_site_url().'/wp-admin/admin.php?page=acf-options-theme-options'; ?>">here</a>

    </p>

    <?php 

  }

    

  // Updating widget replacing old instances with new

  public function update( $new_instance, $old_instance ) {

      $instance = array();

      $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    return $instance;

  }

} // Class wpb_widget ends here



// Register and load the widget

function socialmedia_load_widget() {

  register_widget( __NAMESPACE__ . '\\socialmedia_widget' );

}

add_action( 'widgets_init', __NAMESPACE__ . '\\socialmedia_load_widget' );





function ccbe_login_logo() { 

 $logo = get_field('website_logo','option');

 ?>

    <style type="text/css">

        #login h1 a, .login h1 a {

            background-image: url(<?php echo $logo['url']; ?>);

            background-size: contain;

            width: auto;

        }

        

    </style>

<?php }

add_action( 'login_enqueue_scripts', __NAMESPACE__ . '\\ccbe_login_logo' );



function ccbe_login_logo_url() {

    return home_url();

}

add_filter( 'login_headerurl', __NAMESPACE__ . '\\ccbe_login_logo_url' );



function ccbe_login_logo_url_title() {

    return get_bloginfo('name');

}

add_filter( 'login_headertitle', __NAMESPACE__ . '\\ccbe_login_logo_url_title' );



/**

 * Disable Pro plugins update

 *   

 */

function disable_plugin_update( $value ) {

  if ( (isset($value) && (is_object($value) ))) {

   if (isset($value->response['advanced-custom-fields-pro/acf.php']) ) {

    unset( $value->response['advanced-custom-fields-pro/acf.php'] );

   }

  }

  return $value;

 }

add_filter( 'site_transient_update_plugins', __NAMESPACE__ . '\\disable_plugin_update' );





// posts per page in category pages

function change_tax_num_of_cat_posts( $wp_query ) {  

    if( is_tax('product_category') && $wp_query->is_main_query()) {

        $wp_query->set('posts_per_page', 9);

    }

}

add_action('pre_get_posts', __NAMESPACE__ . '\\change_tax_num_of_cat_posts' );



