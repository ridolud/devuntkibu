<?php
// add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
// function theme_enqueue_styles() {
//     wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

// }

add_action( 'init', 'create_post_type_faq' );
add_action( 'init', 'create_post_type_download' );

add_filter('manage_users_columns' , 'add_extra_user_column');

function add_extra_user_column($columns) {
    d($columns);

    $columns['user_points'] = 'User Points';
    return $columns;
}

function create_post_type() {
  register_post_type( 'faq',
    array(
      'labels' => array(
        'name' => __( 'FAQs' ),
        'singular_name' => __( 'FAQ' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}

function create_post_type_faq() {
  register_post_type( 'faq',
    array(
      'labels' => array(
        'name' => __( 'FAQs' ),
        'singular_name' => __( 'FAQ' )
      ),
      'capability_type' =>  'post',
      'public' => true,
      'has_archive' => true,
    )
  );
}

function create_post_type_download() {
  register_post_type( 'download',
    array(
      'labels' => array(
        'name' => __( 'Downloads' ),
        'singular_name' => __( 'Download' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}

function search_on_title_content($str){
    global $wpdb;
    $mypostids_title = $wpdb->get_col("select ID from $wpdb->posts where LOWER(post_content) LIKE LOWER('%".$str."%')");
    $mypostids_content = $wpdb->get_col("select ID from $wpdb->posts where LOWER(post_title) LIKE LOWER('%".$str."%')");
    // d(array_merge($mypostids_title, $mypostids_content));
    return array_merge($mypostids_title, $mypostids_content);
}

register_nav_menus( array(
	'footer' => __( 'Footer Menu', 'dettol-wunderman' ),
	'artikel_tips_filter' => __('Tips + Artikel Filter', 'dettol-wunderman')
) );

add_filter('get_avatar','change_avatar_css');

function change_avatar_css($class) {
	$class = str_replace("class='avatar", "class='circle ", $class) ;
	return $class;
}

function get_top_bid_timestamp($pid) {
    global $wpdb;
    $sql = $wpdb->prepare("SELECT timestamp FROM wp_auction_log WHERE post_id = %d AND status = %s", $pid, 'top-bidder');
    $result = $wpdb->get_var($sql);

    if($result == NULL) {
        $result = date("Y-m-d");
    }
    return $result;
}

/**
 * Proper way to enqueue scripts and styles
 */
function dettol_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/slick.css');
	if ( is_page('tips-artikel') || is_category() || is_page_template('unduh.php') ) {
        // wp_enqueue_style( 'salvatore', get_stylesheet_directory_uri() . '/assets/salvatore.css');
        // wp_enqueue_script( 'salvatore', get_stylesheet_directory_uri() . '/assets/javascripts/salvatore.js', array('jquery'), '1.0.0', true );
        wp_register_script('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js', array('jquery'));
        wp_enqueue_script('jquery-ui');

      	wp_register_script('isotope', get_stylesheet_directory_uri() . '/assets/javascripts/jquery.isotope.min.js', array('jquery'));
      	wp_enqueue_script('isotope');

        wp_register_script('isotope', get_stylesheet_directory_uri() . '/assets/javascripts/jquery.isotope.min.js', array('jquery'));
        wp_enqueue_script('isotope');

        wp_register_script('infinite_scroll', get_stylesheet_directory_uri() . '/assets/javascripts/jquery.infinitescroll.min.js', array('jquery'));
        wp_enqueue_script('infinite_scroll');

        wp_register_script('tutorial_script', get_stylesheet_directory_uri() . '/assets/javascripts/tutorial.js', array('jquery', 'isotope', 'infinite_scroll'));
        wp_enqueue_script('tutorial_script');

        wp_register_style('tutorial_style', get_stylesheet_directory_uri() . '/assets/stylesheets/tutorial.css');
        wp_enqueue_style('tutorial_style');

        wp_register_script('selectpicker', get_stylesheet_directory_uri() . '/assets/javascripts/bootstrap-select.min.js', array('jquery'));
        wp_enqueue_script('selectpicker');

        wp_register_style('selectpicker_style', get_stylesheet_directory_uri() . '/assets/stylesheets/bootstrap-select.min.css');
        wp_enqueue_style('selectpicker_style');
	}
    if ( is_page_template('reedem.php') ) {
        wp_register_script('selectpicker', get_stylesheet_directory_uri() . '/assets/javascripts/bootstrap-select.min.js', array('jquery'));
        wp_enqueue_script('selectpicker');

        wp_register_style('selectpicker_style', get_stylesheet_directory_uri() . '/assets/stylesheets/bootstrap-select.min.css');
        wp_enqueue_style('selectpicker_style');
    }
    wp_register_style( 'dettol', get_stylesheet_uri(), array( 'selectpicker_style' ));
    wp_enqueue_style( 'dettol' );
}


add_action( 'wp_enqueue_scripts', 'dettol_scripts');

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

function most_popular($id) {
	$posts = new WP_Query( array( 'posts_per_page' => 1, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC', 'post__not_in' => array($id)  ) );
	return $posts;
}

function latest_article() {

}

/*
 * Get Gravatar image URL
 * URL: http://wpsites.org/?p=10444
 */
function get_avatar_url( $id_or_email, $args = null ) {
    $original_args = $args;
    $args = wp_parse_args( $args, array(
        'size'           => 1000,
        'default'        => get_option( 'avatar_default', 'mystery' ),
        'force_default'  => false,
        'rating'         => get_option( 'avatar_rating' ),
        'scheme'         => null,
        'processed_args' => null, // if used, should be a reference
    ) );
    if ( is_numeric( $args['size'] ) ) {
        $args['size'] = absint( $args['size'] );
        if ( !$args['size'] ) {
            $args['size'] = 90;
        }
    } else {
        $args['size'] = 90;
    }
    if ( empty( $args['default'] ) ) {
        $args['default'] = 'mystery';
    }
    switch ( $args['default'] ) {
    case 'mm' :
    case 'mystery' :
    case 'mysteryman' :
        $args['default'] = 'mm';
        break;
    case 'gravatar_default' :
        $args['default'] = false;
        break;
    }
    $args['force_default'] = (bool) $args['force_default'];
    $args['rating'] = strtolower( $args['rating'] );
    $args['found_avatar'] = false;
    $url = apply_filters_ref_array( 'pre_get_avatar_url', array( null, $id_or_email, &$args, $original_args ) );
    if ( !is_null( $url ) ) {
        $return = apply_filters_ref_array( 'get_avatar_url', array( $url, $id_or_email, &$args, $original_args ) );
        $args['processed_args'] = $args;
        unset( $args['processed_args']['processed_args'] );
        return $return;
    }
    $email_hash = '';
    $user = $email = false;
    if ( is_numeric( $id_or_email ) ) {
        $user = get_user_by( 'id', absint( $id_or_email ) );
    } elseif ( is_string( $id_or_email ) ) {
        if ( strpos( $id_or_email, '@md5.gravatar.com' ) ) {
            // md5 hash
                list( $email_hash ) = explode( '@', $id_or_email );
        } else {
            // email address
            $email = $id_or_email;
        }
    } elseif ( is_object( $id_or_email ) ) {
        if ( isset( $id_or_email->comment_ID ) ) {
            // Comment Object
            // No avatar for pingbacks or trackbacks
            $allowed_comment_types = apply_filters( 'get_avatar_comment_types', array( 'comment' ) );
            if ( ! empty( $id_or_email->comment_type ) && ! in_array( $id_or_email->comment_type, (array) $allowed_comment_types ) ) {
                $args['processed_args'] = $args;
                unset( $args['processed_args']['processed_args'] );
                return false;
            }
            if ( ! empty( $id_or_email->user_id ) ) {
                $user = get_user_by( 'id', (int) $id_or_email->user_id );
            }
            if ( ( !$user || is_wp_error( $user ) ) && ! empty( $id_or_email->comment_author_email ) ) {
                $email = $id_or_email->comment_author_email;
            }
        } elseif ( ! empty( $id_or_email->user_login ) ) {
            // User Object
            $user = $id_or_email;
        } elseif ( ! empty( $id_or_email->post_author ) ) {
            // Post Object
            $user = get_user_by( 'id', (int) $id_or_email->post_author );
        }
    }

    if ( !$email_hash ) {
        if ( $user ) {
            $email = $user->user_email;
        }
        if ( $email ) {
            $email_hash = md5( strtolower( trim( $email ) ) );
        }
    }
    if ( $email_hash ) {
        $args['found_avatar'] = true;
    }
    $url_args = array(
        's' => $args['size'],
        'd' => $args['default'],
        'f' => $args['force_default'] ? 'y' : false,
        'r' => $args['rating'],
    );
    $url = sprintf( 'http://%d.gravatar.com/avatar/%s', hexdec( $email_hash[0] ) % 3, $email_hash );
    $url = add_query_arg(
        rawurlencode_deep( array_filter( $url_args ) ),
        set_url_scheme( $url, $args['scheme'] )
    );
    $return = apply_filters_ref_array( 'get_avatar_url', array( $url, $id_or_email, &$args, $original_args ) );
    $args['processed_args'] = $args;
    unset( $args['processed_args']['processed_args'] );
    return $return;
}

function get_the_excerpt_by_id($id=false) {
    global $post;

    $old_post = $post;
    if ($id != $post->ID) {
        $post = get_page($id);
    }

    if (!$excerpt = trim($post->post_excerpt)) {
        $excerpt = $post->post_content;
        $excerpt = strip_shortcodes( $excerpt );
        $excerpt = apply_filters('the_content', $excerpt);
        $excerpt = str_replace(']]>', ']]&gt;', $excerpt);
        $excerpt = strip_tags($excerpt);
        $excerpt_length = apply_filters('excerpt_length', 55);
        $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');

        $words = preg_split("/[\n\r\t ]+/", $excerpt, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
        if ( count($words) > $excerpt_length ) {
            array_pop($words);
            $excerpt = implode(' ', $words);
            $excerpt = $excerpt . $excerpt_more;
        } else {
            $excerpt = implode(' ', $words);
        }
    }

    $post = $old_post;

    return $excerpt;
}

add_action('wp_dashboard_setup', 'user_report_dashboard_widget');

function user_report_dashboard_widget() {
  wp_add_dashboard_widget(
      'user_report_dashboard_widget',
      'User Registration Report',
      'user_report_dashboard_widget_function'
  );
}

function user_report_dashboard_widget_function() {
  $months = array();
  echo "<table class='table table-striped'>";
  echo "<thead>";
  echo "<tr>";
  echo "<td><strong>Month / Year</strong></td>";
  echo "<td><strong>Total</strong></td>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  for ($i = 1; $i <= 12; $i++) {
    $months[$i]["start"] = date("Y-m-d", strtotime( date( 'Y-m-01' )." -$i months"));
    $months[$i]["end"] = date("Y-m-d", strtotime( date( 'Y-m-31' )." -$i months"));
    $months[$i]["result"] = count_user_between($months[$i]["start"], $months[$i]["end"]);
    echo "<tr>";
    echo "<td>";
    echo __(date("M - Y", strtotime( date( 'Y-m-01' )." -$i months"))."&nbsp;&nbsp;&nbsp;");
    echo "</td>";
    echo "<td>";
    echo __($months[$i]["result"]);
    echo "</td>";
    echo "</tr>";

  }
  echo "</tbody>";
  echo "</table>";

  // d($months);
}

function count_user_between($start, $finish) {
  $count = 0;

  global $wpdb;
  $sql = $wpdb->prepare("select count(*) as result from wp_users where `wp_users`.`user_registered` BETWEEN %s and %s", $start, $finish);
  $record = $wpdb->get_results($sql);
  return $record[0]->result;
}

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    .table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 20px;
}
.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid #dddddd;
}
.table > thead > tr > th {
  vertical-align: bottom;
  border-bottom: 2px solid #dddddd;
}
.table > caption + thead > tr:first-child > th,
.table > colgroup + thead > tr:first-child > th,
.table > thead:first-child > tr:first-child > th,
.table > caption + thead > tr:first-child > td,
.table > colgroup + thead > tr:first-child > td,
.table > thead:first-child > tr:first-child > td {
  border-top: 0;
}
.table > tbody + tbody {
  border-top: 2px solid #dddddd;
}
.table .table {
  background-color: #ffffff;
}
.table-condensed > thead > tr > th,
.table-condensed > tbody > tr > th,
.table-condensed > tfoot > tr > th,
.table-condensed > thead > tr > td,
.table-condensed > tbody > tr > td,
.table-condensed > tfoot > tr > td {
  padding: 5px;
}
.table-bordered {
  border: 1px solid #dddddd;
}
.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
  border: 1px solid #dddddd;
}
.table-bordered > thead > tr > th,
.table-bordered > thead > tr > td {
  border-bottom-width: 2px;
}
.table-striped > tbody > tr:nth-of-type(odd) {
  background-color: #f9f9f9;
}
.table-hover > tbody > tr:hover {
  background-color: #f5f5f5;
}
table col[class*="col-"] {
  position: static;
  float: none;
  display: table-column;
}
table td[class*="col-"],
table th[class*="col-"] {
  position: static;
  float: none;
  display: table-cell;
}
.table > thead > tr > td.active,
.table > tbody > tr > td.active,
.table > tfoot > tr > td.active,
.table > thead > tr > th.active,
.table > tbody > tr > th.active,
.table > tfoot > tr > th.active,
.table > thead > tr.active > td,
.table > tbody > tr.active > td,
.table > tfoot > tr.active > td,
.table > thead > tr.active > th,
.table > tbody > tr.active > th,
.table > tfoot > tr.active > th {
  background-color: #f5f5f5;
}
.table-hover > tbody > tr > td.active:hover,
.table-hover > tbody > tr > th.active:hover,
.table-hover > tbody > tr.active:hover > td,
.table-hover > tbody > tr:hover > .active,
.table-hover > tbody > tr.active:hover > th {
  background-color: #e8e8e8;
}
.table > thead > tr > td.success,
.table > tbody > tr > td.success,
.table > tfoot > tr > td.success,
.table > thead > tr > th.success,
.table > tbody > tr > th.success,
.table > tfoot > tr > th.success,
.table > thead > tr.success > td,
.table > tbody > tr.success > td,
.table > tfoot > tr.success > td,
.table > thead > tr.success > th,
.table > tbody > tr.success > th,
.table > tfoot > tr.success > th {
  background-color: #dff0d8;
}
.table-hover > tbody > tr > td.success:hover,
.table-hover > tbody > tr > th.success:hover,
.table-hover > tbody > tr.success:hover > td,
.table-hover > tbody > tr:hover > .success,
.table-hover > tbody > tr.success:hover > th {
  background-color: #d0e9c6;
}
.table > thead > tr > td.info,
.table > tbody > tr > td.info,
.table > tfoot > tr > td.info,
.table > thead > tr > th.info,
.table > tbody > tr > th.info,
.table > tfoot > tr > th.info,
.table > thead > tr.info > td,
.table > tbody > tr.info > td,
.table > tfoot > tr.info > td,
.table > thead > tr.info > th,
.table > tbody > tr.info > th,
.table > tfoot > tr.info > th {
  background-color: #d9edf7;
}
.table-hover > tbody > tr > td.info:hover,
.table-hover > tbody > tr > th.info:hover,
.table-hover > tbody > tr.info:hover > td,
.table-hover > tbody > tr:hover > .info,
.table-hover > tbody > tr.info:hover > th {
  background-color: #c4e3f3;
}
.table > thead > tr > td.warning,
.table > tbody > tr > td.warning,
.table > tfoot > tr > td.warning,
.table > thead > tr > th.warning,
.table > tbody > tr > th.warning,
.table > tfoot > tr > th.warning,
.table > thead > tr.warning > td,
.table > tbody > tr.warning > td,
.table > tfoot > tr.warning > td,
.table > thead > tr.warning > th,
.table > tbody > tr.warning > th,
.table > tfoot > tr.warning > th {
  background-color: #fcf8e3;
}
.table-hover > tbody > tr > td.warning:hover,
.table-hover > tbody > tr > th.warning:hover,
.table-hover > tbody > tr.warning:hover > td,
.table-hover > tbody > tr:hover > .warning,
.table-hover > tbody > tr.warning:hover > th {
  background-color: #faf2cc;
}
.table > thead > tr > td.danger,
.table > tbody > tr > td.danger,
.table > tfoot > tr > td.danger,
.table > thead > tr > th.danger,
.table > tbody > tr > th.danger,
.table > tfoot > tr > th.danger,
.table > thead > tr.danger > td,
.table > tbody > tr.danger > td,
.table > tfoot > tr.danger > td,
.table > thead > tr.danger > th,
.table > tbody > tr.danger > th,
.table > tfoot > tr.danger > th {
  background-color: #f2dede;
}
.table-hover > tbody > tr > td.danger:hover,
.table-hover > tbody > tr > th.danger:hover,
.table-hover > tbody > tr.danger:hover > td,
.table-hover > tbody > tr:hover > .danger,
.table-hover > tbody > tr.danger:hover > th {
  background-color: #ebcccc;
}
.table-responsive {
  overflow-x: auto;
  min-height: 0.01%;
}
@media screen and (max-width: 767px) {
  .table-responsive {
    width: 100%;
    margin-bottom: 15px;
    overflow-y: hidden;
    -ms-overflow-style: -ms-autohiding-scrollbar;
    border: 1px solid #dddddd;
  }
  .table-responsive > .table {
    margin-bottom: 0;
  }
  .table-responsive > .table > thead > tr > th,
  .table-responsive > .table > tbody > tr > th,
  .table-responsive > .table > tfoot > tr > th,
  .table-responsive > .table > thead > tr > td,
  .table-responsive > .table > tbody > tr > td,
  .table-responsive > .table > tfoot > tr > td {
    white-space: nowrap;
  }
  .table-responsive > .table-bordered {
    border: 0;
  }
  .table-responsive > .table-bordered > thead > tr > th:first-child,
  .table-responsive > .table-bordered > tbody > tr > th:first-child,
  .table-responsive > .table-bordered > tfoot > tr > th:first-child,
  .table-responsive > .table-bordered > thead > tr > td:first-child,
  .table-responsive > .table-bordered > tbody > tr > td:first-child,
  .table-responsive > .table-bordered > tfoot > tr > td:first-child {
    border-left: 0;
  }
  .table-responsive > .table-bordered > thead > tr > th:last-child,
  .table-responsive > .table-bordered > tbody > tr > th:last-child,
  .table-responsive > .table-bordered > tfoot > tr > th:last-child,
  .table-responsive > .table-bordered > thead > tr > td:last-child,
  .table-responsive > .table-bordered > tbody > tr > td:last-child,
  .table-responsive > .table-bordered > tfoot > tr > td:last-child {
    border-right: 0;
  }
  .table-responsive > .table-bordered > tbody > tr:last-child > th,
  .table-responsive > .table-bordered > tfoot > tr:last-child > th,
  .table-responsive > .table-bordered > tbody > tr:last-child > td,
  .table-responsive > .table-bordered > tfoot > tr:last-child > td {
    border-bottom: 0;
  }
}
.clearfix:before,
.clearfix:after {
  content: " ";
  display: table;
}
.clearfix:after {
  clear: both;
}
.center-block {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.pull-right {
  float: right !important;
}
.pull-left {
  float: left !important;
}
.hide {
  display: none !important;
}
.show {
  display: block !important;
}
.invisible {
  visibility: hidden;
}
.text-hide {
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}
.hidden {
  display: none !important;
}
.affix {
  position: fixed;
}

  </style>';
}

//Remove all update notifications
/* function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');*/

// Begin of membatasi tampilan list post
function posts_for_current_author($query) {
	global $pagenow;

	if( 'edit.php' != $pagenow || !$query->is_admin )
	    return $query;

	if( !current_user_can( 'edit_others_posts' ) ) {
		global $user_ID;
		$query->set('author', $user_ID );
	}
	return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');
//End of membatasi tampilan list post

//Begin of UntukIbu Social Sharing Button
/** function untukibu_social_sharing_buttons($content) {
	global $post;
	if(is_singular() || is_home()){

		// Get current page URL
		$untukibuURL = urlencode(get_permalink());

		// Get current page title
		$untukibuTitle = str_replace( ' ', '%20', get_the_title());

		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$untukibuTitle.'&amp;url='.$untukibuURL.'&amp;via=Untukibu';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$untukibuURL;
		$googleURL = 'https://plus.google.com/share?url='.$untukibuURL;
		$whatsappURL = 'whatsapp://send?text='.$untukibuTitle . ' ' . $untukibuURL;

		// Add sharing button at the end of page/page content
		$content .= '<div class="untukibu-social">';
		$content .= '<a class="untukibu-link untukibu-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
		$content .= '<a class="untukibu-link untukibu-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
		$content .= '<a class="untukibu-link untukibu-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
		$content .= '<a class="untukibu-link untukibu-whatsapp" href="'.$whatsappURL.'" target="_blank">WhatsApp</a>';
		$content .= '</div>';

		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
add_filter( 'the_content', 'untukibu_social_sharing_buttons');
//End of UntukIbu Social Sharing Button **/

?>
