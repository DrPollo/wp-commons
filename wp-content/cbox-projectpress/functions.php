<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

require_once( 'engine/includes/custom.php' );
define( 'INFINITY_DEV_MODE', true ); // DEVELOPER MODE

function projectpress_admin_bar_remove() {
        global $wp_admin_bar;
        /* Remove their stuff */
		$wp_admin_bar->remove_menu('wp-logo');
		$wp_admin_bar->remove_menu('comments');
		$wp_admin_bar->remove_menu('updates');
		$wp_admin_bar->remove_menu('edit');
		$wp_admin_bar->remove_menu('site-name');
		$wp_admin_bar->remove_menu('bp-login');
		$wp_admin_bar->remove_menu('new-content');
	}
add_action('wp_before_admin_bar_render', 'projectpress_admin_bar_remove', 0);

function remove_group_creation_steps() {
  global $bp;
  //unset( $bp->groups->group_creation_steps['group-invites'] );
  unset( $bp->groups->group_creation_steps['forum'] );
  unset( $bp->groups->group_creation_steps['forum']->slug );
  unset( $bp->groups->group_creation_steps['docs'] );
  unset( $bp->groups->group_creation_steps['docs']->slug );
  //unset( $bp->groups->group_creation_steps['group-settings'] );
}
add_action( 'bp_before_create_group_content_template', 'remove_group_creation_steps', 99999 );
add_action( 'init', 'remove_group_creation_steps', 99999 );


function projectpress_scripts() {
$stylesheet_dir = get_stylesheet_directory_uri();
	wp_enqueue_style( 'chosen-css', $stylesheet_dir . '/chosen/chosen.min.css' );
	wp_enqueue_script( 'chosen', $stylesheet_dir . '/chosen/chosen.jquery.min.js', array(), '1.0.0', true );
	if( is_front_page() || ('project' == get_post_type() && is_singular())): // parallax template in homepage
		wp_enqueue_style( 'grid-css', $stylesheet_dir . '/parallax/grid.css' );
		wp_enqueue_style( 'normalize-css', $stylesheet_dir . '/parallax/normalize.css' );
		wp_enqueue_style( 'parallax-style-css', $stylesheet_dir . '/parallax/style.css' );
		wp_enqueue_script( 'easing', $stylesheet_dir . '/parallax/jquery.easing.1.3.js', array(), '1.3', true );
		wp_enqueue_script( 'stellar', $stylesheet_dir . '/parallax/jquery.stellar.min.js', array(), '1.0.0', true );
		wp_enqueue_script( 'scripts', $stylesheet_dir . '/parallax/scripts.js', array(), '1.0.0', true );
		wp_enqueue_script( 'waypoints', $stylesheet_dir . '/parallax/waypoints.min.js', array(), '1.0.0', true );
	endif;
	if( is_page('groups') ):
		wp_enqueue_script( 'bxslider-4', $stylesheet_dir . '/bxslider-4/jquery.bxslider.min.js', array(), '1.0.0', true );
		wp_enqueue_style( 'bxslider-4-css', $stylesheet_dir . '/bxslider-4/jquery.bxslider.css' );
	endif;
	// #riqua temp: inserito qui il form per la mappa
	if( is_page('invia-la-tua-idea') || is_page('modifica-la-tua-idea') ):
					wp_enqueue_script( 'wpgeo' );
					wp_enqueue_script( 'googlemaps3' );
					wp_enqueue_script( 'wpgeo_frontend_post_googlemaps3', $stylesheet_dir . '/wp-geo/admin-post.js', array(), '1.0.0', true );
					//wp_enqueue_script( 'wpgeo_admin_post_googlemaps3' );
					wp_enqueue_style( 'wpgeo' );
	endif;
}

add_action( 'wp_enqueue_scripts', 'projectpress_scripts' );

function projectpress_init_js() {
//wp_enqueue_style( 'chosen-css', get_stylesheet_directory() . 'chosen/chosen.min.css' );
//wp_enqueue_script( 'chosen', get_stylesheet_directory() . '/chosen/chosen.jquery.min.js', array(), '1.0.0', true );
	if ( !wp_script_is( 'jquery' ) )
		wp_enqueue_script( 'jquery' );

	if ( !wp_script_is( 'jquery', 'done' ) )
		wp_print_scripts( 'jquery' );
?>
	<script type="text/javascript">
		jQuery("#field_2").chosen();
		<?php if( is_page('groups') ): ?>
		jQuery('.bxslider').bxSlider({auto: true, autoControls: true, controls:false});
		<?php endif; ?>
	</script>

	
<?php
}
add_action( 'wp_footer', 'projectpress_init_js', 100 );

class HackTweets_Widget extends WP_Widget {

	function HackTweets_Widget() {
		$widget_ops = array( 'description' => __( 'Displays a random HackTweet.'  ), 'classname' => 'hacktweets_widget' );
		$this->WP_Widget( 'hacktweets_widget', __( 'HackTweet' ), $widget_ops );
	}

	function widget( $args, $instance ) {
    	extract( $args );

    	$title = ( $instance['title'] != '' ) ? esc_attr( $instance['title'] ) : __( 'hackTweet: 140 characters to introduce #hackUniTO','responsive' );

		echo $before_widget;
		echo $before_title . $title . $after_title;

		$hacktweet = new WP_Query( array( 'post_type' => 'hacktweet', 'post_status' => 'publish', 'orderby' => 'rand', 'showposts' => 1 ) );

		if ( $hacktweet->have_posts() ) : while ( $hacktweet->have_posts() ) : $hacktweet->the_post();
			echo '<div class="claim-widget">';
			the_content();
			echo '</div>';
		endwhile; endif;
		
		echo '<a href="https://twitter.com/intent/tweet?text='.urlencode(get_the_content()).'" class="twitter-hashtag-button" data-lang="it">Condividi su Twitter</a>';
		echo '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
		if(is_user_logged_in()):
			echo '<a class="button" href="'.bloginfo('url').'/hackerare-comunicazione/" title="Inserisci il tuo HackTweet">'.__( "Write your hackTweet", "responsive" ).'</a>';
		endif;
		echo $after_widget;
	}

	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : __( 'HackTweets' );
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<?php
 	}

	function update( $new_instance, $old_instance ){
		$instance          = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
}

// register widget
function register_hacktweet_widget() {
    register_widget( 'HackTweets_Widget' );
}
add_action( 'widgets_init', 'register_hacktweet_widget' );


add_action( 'init', 'ste_register_hacktweet', 0 );
function ste_register_hacktweet() {
    $args = array(
        'public' => true,
        'query_var' => 'hacktweet',
        'rewrite' => array(
            'slug' => 'hacktweets',
            'with_front' => false
        ),
        'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'revisions'
        ),
        'labels' => array(
            'name' => 'HackTweets',
            'singular_name' => 'HackTweet',
            'add_new' => 'Add New HackTweet',
            'add_new_item' => 'Add New HackTweet',
            'edit_item' => 'Edit HackTweet',
            'new_item' => 'New HackTweet',
            'view_item' => 'View HackTweet',
            'search_items' => 'Search HackTweet',
            'not_found' => 'No hacktweets found',
            'not_found_in_trash' => 'No hacktweets found in Trash',
        ),
    );
    register_post_type( 'hacktweet', $args );
}
// add_action( 'wp_head',    'chosen_init_js', 100 );
function my_bp_activity_is_favorite($activity_id) {
global $bp, $activities_template;
return apply_filters( 'bp_get_activity_is_favorite', in_array( $activity_id, (array)$activities_template->my_favs ) );
}

function my_bp_activity_favorite_link($activity_id) {
global $activities_template;
echo apply_filters( 'bp_get_activity_favorite_link', wp_nonce_url( site_url( BP_ACTIVITY_SLUG . '/favorite/' . $activity_id . '/' ), 'mark_favorite' ) );
}

function my_bp_activity_unfavorite_link($activity_id) {
global $activities_template;
echo apply_filters( 'bp_get_activity_unfavorite_link', wp_nonce_url( site_url( BP_ACTIVITY_SLUG . '/unfavorite/' . $activity_id . '/' ), 'unmark_favorite' ) );
}


/*add deadline*/
function counter_deadline(){
					$date = strtotime("Jan 30, 2014 11:00 AM");
					$remaining = $date - time();				
					$days_remaining = floor($remaining / 86400);
					$giorni = str_split($days_remaining);
					return $days_remaining;
}
			
function deadline_adminbar( $wp_admin_bar) {
	$wp_admin_bar->add_menu( array(
		'id'    => 'logo-hackunito',
		'title' => '<img src="'.get_stylesheet_directory_uri().'/images/hackunito2-logo.png" />',
		'href'  => get_bloginfo('url'),	
		'meta'  => array(
			'title' => '#hackUniTO',			
		),
	));
		$wp_admin_bar->add_node( array(
		'id'    => 'deadline',
		'parent' => 'top-secondary',
		'title' => __( "Call Deadline", "infinity_text_domain" ).'<span id="ncountdown">'.counter_deadline().'</span>',
		'meta'  => array(
			'title' => __( "Call Deadline", "infinity_text_domain" ),			
		),

	));
}
add_action( 'admin_bar_menu', 'deadline_adminbar');

// POST TO POST PLUGIN
function projects_types() {
	p2p_register_connection_type( array(
		'name' => 'project_to_post',
		'from' => 'post',
		'to' => 'project'
	) );
}
add_action( 'p2p_init', 'projects_types' );

