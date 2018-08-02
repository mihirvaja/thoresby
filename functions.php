<?php

function thoresby_scripts_styles() {

	// Loads jQuery.	
	wp_enqueue_script('jquery');
	

}
add_action( 'wp_enqueue_scripts', 'thoresby_scripts_styles' );




// register the main navigation
function register_my_menus() {
	register_nav_menus(
		array(
			'main-menu' => __('Main Menu')
		)
	);
}
add_action( 'init', 'register_my_menus' );




//add featured post functionality to the theme
add_theme_support( 'post-thumbnails' );





// custom post excerpt for news feeds and custom post type feeds
function my_custom_excerpt($id, $limit){
	$post = get_post($id);
	$content = $post->post_content;
	$content = strip_tags($content, "<a>");
	$content = preg_replace('#<a.*?>.*?</a>#i', '', $content); 
	$length = strlen($content);
	if($length > $limit){
		$content = substr($content, 0, $limit);
		$pos = strrchr($content, " ");
		$pos2 = strrpos($content, $pos);
		$content = substr($content, 0, $pos2);
		$content .= " ...";	
	}

	return $content;
}

function add_google_map($lat, $lng, $zoom, $width, $height, $style, $marker, $div, $api) {
	if($api == "true"){
		$output = "<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyD0QIxSUJi-Qo9xZ7ILiwN0jed14IIAp74&v=3.exp&sensor=false\"></script>\n";
	}else{
		$output = "";
	}
	$output .= "								<script language=\"javascript\">\n";
	$output .= "											google.maps.visualRefresh = true;\n";
	$output .= "											var map;\n";
	if($style){
		$output .= "											var styles = $style;\n";
	}	
	$output .= "											function initialize() {\n";
	$output .= "												var myLatlng = new google.maps.LatLng(" . $lat . "," . $lng . ");\n";
	$output .= "													var mapOptions = {\n";
	$output .= "													zoom: " . $zoom . ",\n";
	$output .= "													center: myLatlng,\n";
	$output .= "													disableDefaultUI: true,\n";
	$output .= "													panControl: false,\n";
	$output .= "													zoomControl: false,\n";
	$output .= "													scaleControl: false,\n";
	$output .= "													mapTypeControl: true,\n";
	 
	if($style){
		$output .= "													styles: styles,\n";
	}
	$output .= "												}\n";
	$output .= "												var map = new google.maps.Map(document.getElementById('" . $div . "'), mapOptions);\n";
	$output .= "												var marker = new google.maps.Marker({\n";
	$output .= "													position: myLatlng,\n";
	$output .= "													map: map,\n";
	if($marker){
		$output .= "												icon: \"$marker\",";
	}
	$output .= "												});\n";
	$output .= "											}\n";
	$output .= "											google.maps.event.addDomListener(window, 'load', initialize);\n";
	$output .= "											</script>\n";
	$output .= "											<div id=\"" . $div . "\" style=\"width: " . $width . "px; height: " . $height . "px;\"></div>		\n";		
	return $output;	
}



// Add Shortcode
function google_map_short( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'width' => '600',
			'height' => '300',
			'zoom' => '12',
			'lat' => '52.635434',
			'lng' => '-1.1327464'
		), $atts )
	);

	// Code
$output = "<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyDw8xgODko74kZY3KCCUHP5rle-pIUEBjw&v=3.exp&sensor=false\"></script>\n";
	$output .= "								<script language=\"javascript\">\n";
	$output .= "											google.maps.visualRefresh = true;\n";
	$output .= "											var map;\n";
	$output .= "											function initialize() {\n";
	$output .= "												var myLatlng = new google.maps.LatLng(" . $lat . "," . $lng . ");\n";
	$output .= "													var mapOptions = {\n";
	$output .= "													zoom: " . $zoom . ",\n";
	$output .= "													center: myLatlng,\n";
	$output .= "													disableDefaultUI: true,\n";
	$output .= "													panControl: true,\n";
	$output .= "													zoomControl: true,\n";
	$output .= "													scaleControl: false,\n";
	$output .= "													mapTypeControl: true,\n";
	$output .= "												}\n";
	$output .= "												var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);\n";
	$output .= "												var marker = new google.maps.Marker({\n";
	$output .= "													position: myLatlng,\n";
	$output .= "													map: map\n";
	$output .= "												});\n";
	$output .= "											}\n";
	$output .= "											google.maps.event.addDomListener(window, 'load', initialize);\n";
	$output .= "											</script>\n";
	$output .= "											<div id=\"map-canvas\" style=\"width: " . $width . "px; height: " . $height . "px;\"></div>		\n";		
	return $output;	
}
add_shortcode( 'GoogleMap', 'google_map_short' );


// Play a youtube video using vid code and width/height parameters
function play_YouTube_Video ($code) {
	$video = "<div class=\"video-container2\"><iframe src=\"https://www.youtube-nocookie.com/embed/" . $code . "?fs=1&amp;rel=0&amp;vq=large\" frameborder=\"0\" allowfullscreen></iframe></div>";
	return $video;
}

// Add Shortcode
function play_YouTube_Video_short( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'code' => ''
		), $atts )
	);

	// Code
	$output = "<div class=\"video-container\"><iframe src=\"https://www.youtube-nocookie.com/embed/" . $code . "?fs=1&amp;rel=0&amp;vq=large\" frameborder=\"0\" allowfullscreen></iframe></div>";
	return $output;
}
add_shortcode( 'YouTubeVideo', 'play_YouTube_Video_short' );


// Add Shortcode
function play_Vimeo_Video_short( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'code' => '',
		), $atts )
	);

	// Code
	$output = "<div class=\"video-container\"><iframe src=\"//player.vimeo.com/video/" . $code . "\"  frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>";
	return $output;
}
add_shortcode( 'VimeoVideo', 'play_Vimeo_Video_short' );





// add a filter to pushYoast plugin meta box to the bottom in the admin area
add_filter( 'wpseo_metabox_prio', function() { return 'low';}); 



// set up options page, title, order etc
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
	acf_add_options_sub_page('General'); 
	acf_add_options_sub_page('Footer');
	
}

if( function_exists('acf_set_options_page_title') )
{
   	acf_set_options_page_title('Site Options');
}


function hex2rgb( $colour ) {
        if ( $colour[0] == '#' ) {
                $colour = substr( $colour, 1 );
        }
        if ( strlen( $colour ) == 6 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
        } elseif ( strlen( $colour ) == 3 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
        } else {
                return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        return $r . "," . $g . "," . $b;
}


function custom_menu_order( $menu_ord ) {  
    
    if (!$menu_ord) return true;  
    
    // vars
    $menu = 'acf-options-general';
    
    // remove from current menu
    $menu_ord = array_diff($menu_ord, array( $menu ));
    
    // append after index.php [0]
    array_splice( $menu_ord, 8, 0, array( $menu ) ); 
	    
    // return
    return $menu_ord;
}  

add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');


function remove_parent_classes($class)
{
  // check for current page classes, return false if they exist.
	return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor'  || $class == 'current-menu-item') ? FALSE : TRUE;
}

function add_class_to_wp_nav_menu($classes)
{

	
	
     switch (get_post_type())
     {
     	/*case 'event':
     		// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
     		$classes = array_filter($classes, "remove_parent_classes");

     		// add the current page class to a specific menu item (replace ###).
     		if (in_array('menu-item-63', $classes))
     		{
     		   $classes[] = 'current_page_parent';
         }
     	 break;*/
		 
		 
     	
      // add more cases if necessary and/or a default
     }
	 
	 if(is_author()){
		$classes = array_filter($classes, "remove_parent_classes");
	}
	if(is_search()){
		$classes = array_filter($classes, "remove_parent_classes");
	}
	if(is_404()){
		$classes = array_filter($classes, "remove_parent_classes");
	}
	 
	return $classes;
}
add_filter('nav_menu_css_class', 'add_class_to_wp_nav_menu');



