<?php

add_action( 'after_setup_theme', 'pmc_mundus_theme_setup' );

function pmc_mundus_theme_setup() {

	/*woocommerce support*/
	add_theme_support('woocommerce'); // so they don't advertise their themes :)

	/*post formats support*/
	add_theme_support( 'post-formats', array( 'link', 'gallery', 'video' , 'audio') );

	/*feed support*/
	add_theme_support( 'automatic-feed-links' );

	/*post thumb support*/
	add_theme_support( 'post-thumbnails' ); // this enable thumbnails and stuffs

	/*setting thumb size*/
	add_image_size( 'gallery', 95,95, true );
	add_image_size( 'port2',230,150, true );
	add_image_size( 'advertise', 235,130, true );
	add_image_size( 'homeProduct', 280 ,180, true );
	add_image_size( 'homePort', 280 ,220, true );
	add_image_size( 'shop', 280 ,180, true );
	add_image_size( 'widget', 270,140, true );
	add_image_size( 'postBlock', 380,190, true );
	add_image_size( 'productBig', 720,600, true );
	add_image_size( 'productSmall', 132,85, true );
	add_image_size( 'blog', 800, 390, true );
	add_image_size( 'port3', 270,270, true );
	add_image_size( 'port4', 260,160, true );
	add_image_size( 'related', 180,90, true );
	add_image_size( 'homepost', 1180,490, true );

	/*register custom menus*/
	register_nav_menus(array(

			'main-menu' => 'Main Menu',
			
			'single-menu' => 'Single page menu',

			'footer-menu' => 'Footer Menu',

			'resp_menu' => 'Responsive Menu',	

			'resp-single-menu' => 'Responsive Single page menu',
			
			'scroll_menu' => 'Scroll Menu'	,		
			
			'top_menu' => 'Top Menu'			
	));
	
    register_sidebar(array(
        'id' => 'sidebar',
        'name' => 'Sidebar Widget',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		    		
	
    register_sidebar(array(
        'id' => 'homepost',
        'name' => 'Home post Widget',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		 

    register_sidebar(array(
        'id' => 'contact',
        'name' => 'Contact Widget',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    
    register_sidebar(array(
        'id' => 'footer1',
        'name' => 'Footer Widget 1',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'id' => 'footer2',
        'name' => 'Footer Widget 2',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

	// Responsive walker menu
	class Walker_Responsive_Menu extends Walker_Nav_Menu {
		function start_lvl( &$output, $depth = 0, $args = array() ){
		  $indent = str_repeat("\t", $depth); // don't output children opening tag (`<ul>`)
		}

		function end_lvl( &$output, $depth = 0, $args = array() ) {
		  $indent = str_repeat("\t", $depth); // don't output children closing tag
		}
		
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $wp_query;		
			$item_output = $attributes = $prepend ='';
			// Create a visual indent in the list if we have a child item.
			$visual_indent = ( $depth ) ? str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $depth) : '';

			// Load the item URL
			$attributes .= ! empty( $item->url ) ? ' value="'   . esc_attr( $item->url ) .'"' : '';

			// If we have hierarchy for the item, add the indent, if not, leave it out.
			// Loop through and output each menu item as this.
			if($depth != 0) {
				$item_output .= '<option ' . $attributes .'>'. $visual_indent . $item->title. '</option>';
			} else {
				$item_output .= '<option ' . $attributes .'>'.$prepend.$item->title.'</option>';
			}


			// Make the output happen.
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	// Main walker menu	
	class description_walker extends Walker_Nav_Menu
	{
		  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			   global $wp_query;
			   $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			   $class_names = $value = '';
			   $classes = empty( $item->classes ) ? array() : (array) $item->classes;
			   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			   $class_names = ' class="'. esc_attr( $class_names ) . '"';
			   $output .= $indent . '<li id="menu-item-'.rand(0,9999).'-'. $item->ID . '"' . $value . $class_names .'>';
			   $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			   $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			   $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			   $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			   $prepend = '<strong>';
			   $append = '</strong>';
			   if($depth != 0)
			   {
					$append = $prepend = "";
			   }
				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
				$item_output .= $args->link_after;
				$item_output .= '</a>';	
				$item_output .= $args->after;
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

}



/*-----------------------------------------------------------------------------------*/
// Options Framework
/*-----------------------------------------------------------------------------------*/


// Paths to admin functions
define('MY_TEXTDOMAIN', 'wp-mundus');
load_theme_textdomain( 'wp-mundus', get_template_directory() . '/languages' );
load_theme_textdomain( 'woocommerce', get_template_directory() . '/languages' );
define('ADMIN_PATH', get_stylesheet_directory() . '/admin/');
define('BOX_PATH', get_stylesheet_directory() . '/includes/boxes/');
define('ADMIN_DIR', get_template_directory_uri() . '/admin/');
define('LAYOUT_PATH', ADMIN_PATH . '/layouts/');

// You can mess with these 2 if you wish.
$themedata = wp_get_theme(get_stylesheet_directory() . '/style.css');
define('THEMENAME', $themedata['Name']);
define('OPTIONS', 'of_options_mundus_pmc'); // Name of the database row where your options are stored

if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	//Call action that sets
	add_action('admin_head','pmc_options');
}

/* import theme options */
function pmc_options()	{


		
	if (!get_option('of_options_mundus_pmc')){
	
		$pmc_data = 'YTo5Njp7czoxNDoic2hvd3Jlc3BvbnNpdmUiO3M6MToiMSI7czo5OiJwb3J0X3NsdWciO3M6OToicG9ydGZvbGlvIjtzOjE0OiJhZHZlcnRpc2VpbWFnZSI7YTo2OntpOjE7YTo0OntzOjU6Im9yZGVyIjtzOjE6IjEiO3M6NToidGl0bGUiO3M6OToiU3BvbnNvciAxIjtzOjM6InVybCI7czo4MjoiaHR0cDovL2J1bGxzeS5wcmVtaXVtY29kaW5nLmNvbS93cC1jb250ZW50L3VwbG9hZHMvMjAxMy8wOC9zcG9uc29yLXBsYWNlaG9sZGVyLnBuZyI7czo0OiJsaW5rIjtzOjI0OiJodHRwOi8vcHJlbWl1bWNvZGluZy5jb20iO31pOjI7YTo0OntzOjU6Im9yZGVyIjtzOjE6IjIiO3M6NToidGl0bGUiO3M6OToiU3BvbnNvciA2IjtzOjM6InVybCI7czo4MjoiaHR0cDovL2J1bGxzeS5wcmVtaXVtY29kaW5nLmNvbS93cC1jb250ZW50L3VwbG9hZHMvMjAxMy8wOC9zcG9uc29yLXBsYWNlaG9sZGVyLnBuZyI7czo0OiJsaW5rIjtzOjI0OiJodHRwOi8vcHJlbWl1bWNvZGluZy5jb20iO31pOjM7YTo0OntzOjU6Im9yZGVyIjtzOjE6IjMiO3M6NToidGl0bGUiO3M6OToiU3BvbnNvciA0IjtzOjM6InVybCI7czo4MjoiaHR0cDovL2J1bGxzeS5wcmVtaXVtY29kaW5nLmNvbS93cC1jb250ZW50L3VwbG9hZHMvMjAxMy8wOC9zcG9uc29yLXBsYWNlaG9sZGVyLnBuZyI7czo0OiJsaW5rIjtzOjI0OiJodHRwOi8vcHJlbWl1bWNvZGluZy5jb20iO31pOjQ7YTo0OntzOjU6Im9yZGVyIjtzOjE6IjQiO3M6NToidGl0bGUiO3M6OToiU3BvbnNvciAyIjtzOjM6InVybCI7czo4MjoiaHR0cDovL2J1bGxzeS5wcmVtaXVtY29kaW5nLmNvbS93cC1jb250ZW50L3VwbG9hZHMvMjAxMy8wOC9zcG9uc29yLXBsYWNlaG9sZGVyLnBuZyI7czo0OiJsaW5rIjtzOjI0OiJodHRwOi8vcHJlbWl1bWNvZGluZy5jb20iO31pOjU7YTo0OntzOjU6Im9yZGVyIjtzOjE6IjUiO3M6NToidGl0bGUiO3M6OToiU3BvbnNvciAzIjtzOjM6InVybCI7czo4MjoiaHR0cDovL2J1bGxzeS5wcmVtaXVtY29kaW5nLmNvbS93cC1jb250ZW50L3VwbG9hZHMvMjAxMy8wOC9zcG9uc29yLXBsYWNlaG9sZGVyLnBuZyI7czo0OiJsaW5rIjtzOjI0OiJodHRwOi8vcHJlbWl1bWNvZGluZy5jb20iO31pOjY7YTo0OntzOjU6Im9yZGVyIjtzOjE6IjYiO3M6NToidGl0bGUiO3M6OToiU3BvbnNvciA1IjtzOjM6InVybCI7czo4MjoiaHR0cDovL2J1bGxzeS5wcmVtaXVtY29kaW5nLmNvbS93cC1jb250ZW50L3VwbG9hZHMvMjAxMy8wOC9zcG9uc29yLXBsYWNlaG9sZGVyLnBuZyI7czo0OiJsaW5rIjtzOjI0OiJodHRwOi8vcHJlbWl1bWNvZGluZy5jb20iO319czo0OiJsb2dvIjtzOjc0OiJodHRwOi8vbXVuZHVzLnByZW1pdW1jb2RpbmcuY29tL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDEzLzEyL211bmR1cy1sb2dvLnBuZyI7czoxMzoiaGVhZGVyX2hlaWdodCI7czoyOiI5NCI7czoxNToibG9nb190b3BfbWFyZ2luIjtzOjI6IjE2IjtzOjE1OiJtZW51X3RvcF9tYXJnaW4iO3M6MjoiMzQiO3M6NzoiZmF2aWNvbiI7czo3MDoiaHR0cDovL211bmR1cy5wcmVtaXVtY29kaW5nLmNvbS93cC1jb250ZW50L3VwbG9hZHMvMjAxMy8xMi9mYXZpY29uLnBuZyI7czoxNjoiZ29vZ2xlX2FuYWx5dGljcyI7czowOiIiO3M6OToibWFpbkNvbG9yIjtzOjc6IiMyNUE0RDYiO3M6MTQ6ImdyYWRpZW50X2NvbG9yIjtzOjc6IiMwQjg1QjUiO3M6ODoiYm94Q29sb3IiO3M6NzoiI2RkZGRkZCI7czoxNToiU2hhZG93Q29sb3JGb250IjtzOjc6IiMwMDAwMDAiO3M6MjM6IlNoYWRvd09wYWNpdHR5Q29sb3JGb250IjtzOjE6IjAiO3M6MjE6ImJvZHlfYmFja2dyb3VuZF9jb2xvciI7czo3OiIjZmZmZmZmIjtzOjE4OiJib2R5X2JnX3Byb3BlcnRpZXMiO3M6MTA6InJlcGVhdCAwIDAiO3M6MjM6ImJhY2tncm91bmRfaW1hZ2VfaGVhZGVyIjtzOjE6IjEiO3M6MjM6ImhlYWRlcl9iYWNrZ3JvdW5kX2NvbG9yIjtzOjc6IiMxRjFGMUYiO3M6MjA6ImhlYWRlcl9iZ19wcm9wZXJ0aWVzIjtzOjEwOiJyZXBlYXQgMCAwIjtzOjEyOiJjdXN0b21fc3R5bGUiO3M6MDoiIjtzOjk6ImJvZHlfZm9udCI7YTozOntzOjQ6InNpemUiO3M6NDoiMThweCI7czo1OiJjb2xvciI7czo3OiIjMzQzNDM0IjtzOjQ6ImZhY2UiO3M6MTE6Ik9wZW4lMjBTYW5zIjt9czoxMjoiaGVhZGluZ19mb250IjthOjI6e3M6NDoiZmFjZSI7czo2OiJPc3dhbGQiO3M6NToic3R5bGUiO3M6Njoibm9ybWFsIjt9czo5OiJtZW51X2ZvbnQiO3M6NjoiT3N3YWxkIjtzOjE0OiJib2R5X2JveF9jb2xlciI7czo3OiIjZmZmZmZmIjtzOjE1OiJib2R5X2xpbmtfY29sZXIiO3M6NDoiIzMzMyI7czoxNToibWVudV90ZXh0X2NvbG9yIjtzOjQ6IiMzMzMiO3M6MTU6ImhlYWRpbmdfZm9udF9oMSI7YToyOntzOjQ6InNpemUiO3M6NDoiNDBweCI7czo1OiJjb2xvciI7czo3OiIjMzMzMzMzIjt9czoxNToiaGVhZGluZ19mb250X2gyIjthOjI6e3M6NDoic2l6ZSI7czo0OiIzNnB4IjtzOjU6ImNvbG9yIjtzOjc6IiMzMzMzMzMiO31zOjE1OiJoZWFkaW5nX2ZvbnRfaDMiO2E6Mjp7czo0OiJzaXplIjtzOjQ6IjE4cHgiO3M6NToiY29sb3IiO3M6NzoiIzMzMzMzMyI7fXM6MTU6ImhlYWRpbmdfZm9udF9oNCI7YToyOntzOjQ6InNpemUiO3M6NDoiMThweCI7czo1OiJjb2xvciI7czo3OiIjMzMzMzMzIjt9czoxNToiaGVhZGluZ19mb250X2g1IjthOjI6e3M6NDoic2l6ZSI7czo0OiIxN3B4IjtzOjU6ImNvbG9yIjtzOjc6IiMzMzMzMzMiO31zOjE1OiJoZWFkaW5nX2ZvbnRfaDYiO2E6Mjp7czo0OiJzaXplIjtzOjQ6IjE2cHgiO3M6NToiY29sb3IiO3M6NzoiIzMzMzMzMyI7fXM6MTI6InR3aXR0ZXJfc2hvdyI7czoxOiIxIjtzOjc6InR3aXR0ZXIiO3M6MzM6Imh0dHBzOi8vdHdpdHRlci5jb20vcHJlbWl1bWNvZGluZyI7czoxMzoiZmFjZWJvb2tfc2hvdyI7czoxOiIxIjtzOjg6ImZhY2Vib29rIjtzOjM4OiJodHRwczovL3d3dy5mYWNlYm9vay5jb20vUHJlbWl1bUNvZGluZyI7czo5OiJkaWdnX3Nob3ciO3M6MToiMSI7czo0OiJkaWdnIjtzOjI1OiJodHRwOi8vcHJlbWl1bWNvZGluZy5jb20vIjtzOjg6InJzc19zaG93IjtzOjE6IjEiO3M6MzoicnNzIjtzOjI1OiJodHRwOi8vcHJlbWl1bWNvZGluZy5jb20vIjtzOjExOiJmbGlja3Jfc2hvdyI7czoxOiIxIjtzOjY6ImZsaWNrciI7czoyNToiaHR0cDovL3ByZW1pdW1jb2RpbmcuY29tLyI7czoxMzoibGlua2VkaW5fc2hvdyI7czoxOiIxIjtzOjg6ImxpbmtlZGluIjtzOjI1OiJodHRwOi8vcHJlbWl1bWNvZGluZy5jb20vIjtzOjEyOiJkcmliYmxlX3Nob3ciO3M6MToiMSI7czo3OiJkcmliYmxlIjtzOjI3OiJodHRwOi8vZHJpYmJibGUuY29tL2dsaml2ZWMiO3M6MTQ6InBpbnRlcmVzdF9zaG93IjtzOjE6IjEiO3M6OToicGludGVyZXN0IjtzOjQwOiJodHRwOi8vd3d3LnBpbnRlcmVzdC5jb20vZ2xqaXZlYy9ib2FyZHMvIjtzOjE0OiJlcnJvcnBhZ2V0aXRsZSI7czoxMDoiT09PUFMhIDQwNCI7czoxNzoiZXJyb3JwYWdlc3VidGl0bGUiO3M6NjU6IlNlZW1zIGxpa2UgeW91IHN0dW1ibGVkIGF0IHNvbWV0aGluZyB0aGF0IGRvZXNuXFxcJ3QgcmVhbGx5IGV4aXN0IjtzOjk6ImVycm9ycGFnZSI7czozMjY6IlNvcnJ5LCBidXQgdGhlIHBhZ2UgeW91IGFyZSBsb29raW5nIGZvciBoYXMgbm90IGJlZW4gZm91bmQuPGJyLz5UcnkgY2hlY2tpbmcgdGhlIFVSTCBmb3IgZXJyb3JzLCB0aGVuIGhpdCByZWZyZXNoLjwvYnI+T3IgeW91IGNhbiBzaW1wbHkgY2xpY2sgdGhlIGljb24gYmVsb3cgYW5kIGdvIGhvbWU6KQ0KPGJyPjxicj4NCjxhIGhyZWYgPSBcImh0dHA6Ly9idWxsc3kucHJlbWl1bWNvZGluZy5jb20vXCI+PGltZyBzcmMgPSBcImh0dHA6Ly9idWxsc3kucHJlbWl1bWNvZGluZy5jb20vd3AtY29udGVudC91cGxvYWRzLzIwMTMvMDgvaG9tZUhvdXNlSWNvbi5wbmdcIj48L2E+IjtzOjk6ImNvcHlyaWdodCI7czoxMDQ6Ik11bmR1cyBAMjAxMyBEZXNpZ25lZCBieSA8YSBocmVmID0gXCJodHRwOi8vcHJlbWl1bWNvZGluZy5jb20vXCI+UHJlbWl1bUNvZGluZzwvYT4gfCBBbGwgUmlnaHRzIFJlc2VydmVkIjtzOjIzOiJ0cmFuc2xhdGlvbl9zb2NpYWx0aXRsZSI7czoxNzoiU29jaWFsaXplIHdpdGggdXMiO3M6MTk6InRyYW5zbGF0aW9uX3R3aXR0ZXIiO3M6NzoiVHdpdHRlciI7czoyMDoidHJhbnNsYXRpb25fZmFjZWJvb2siO3M6ODoiRmFjZWJvb2siO3M6MTY6InRyYW5zbGF0aW9uX2RpZ2ciO3M6NDoiRGlnZyI7czoxNToidHJhbnNsYXRpb25fcnNzIjtzOjM6IlJTUyI7czoxODoidHJhbnNsYXRpb25fZmxpY2tyIjtzOjY6IkZsaWNrciI7czoyMDoidHJhbnNsYXRpb25fbGlua2VkaW4iO3M6ODoiTGlua2VkaW4iO3M6MTk6InRyYW5zbGF0aW9uX2RyaWJibGUiO3M6NzoiRHJpYmJsZSI7czoyMToidHJhbnNsYXRpb25fcGludGVyZXN0IjtzOjA6IiI7czoxNzoidHJhbnNsYXRpb25fZW1haWwiO3M6MTM6IlNlbmQgdXMgRW1haWwiO3M6MTY6InRyYW5zbGF0aW9uX3Bvc3QiO3M6MTY6Ik91ciBsYXRlc3QgcG9zdHMiO3M6MjQ6InRyYW5zbGF0aW9uX2VudGVyX3NlYXJjaCI7czo5OiJTZWFyY2guLi4iO3M6MTY6InRyYW5zbGF0aW9uX3BvcnQiO3M6MTU6IlJFQ0VOVCBQUk9KRUNUUyI7czoyMzoidHJhbnNsYXRpb25fcmVsYXRlZHBvc3QiO3M6MTM6IlJlbGF0ZWQgUG9zdHMiO3M6Mjc6InRyYW5zbGF0aW9uX2FkdmVydGlzZV90aXRsZSI7czoxNjoiT3VyIE1ham9yIEJyYW5kcyI7czoyNDoidHJhbnNsYXRpb25fbW9yZWxpbmtibG9nIjtzOjk6IlJlYWQgbW9yZSI7czoyNDoidHJhbnNsYXRpb25fbW9yZWxpbmtwb3J0IjtzOjE1OiJSZWFkIG1vcmUgYWJvdXQiO3M6MjQ6InBvcnRfcHJvamVjdF9kZXNjcmlwdGlvbiI7czoyMDoiUHJvamVjdCBEZXNjcmlwdGlvbjoiO3M6MjA6InBvcnRfcHJvamVjdF9kZXRhaWxzIjtzOjE2OiJQcm9qZWN0IGRldGFpbHM6IjtzOjE2OiJwb3J0X3Byb2plY3RfdXJsIjtzOjEyOiJQcm9qZWN0IFVSTDoiO3M6MjE6InBvcnRfcHJvamVjdF9kZXNpZ25lciI7czoxNzoiUHJvamVjdCBkZXNpZ25lcjoiO3M6MTc6InBvcnRfcHJvamVjdF9kYXRlIjtzOjI3OiJQcm9qZWN0IERhdGUgb2YgY29tcGxldGlvbjoiO3M6MTk6InBvcnRfcHJvamVjdF9jbGllbnQiO3M6MTU6IlByb2plY3QgQ2xpZW50OiI7czoxODoicG9ydF9wcm9qZWN0X3NoYXJlIjtzOjE3OiJTaGFyZSB0aGUgcHJvamVjdCI7czoyMDoicG9ydF9wcm9qZWN0X3JlbGF0ZWQiO3M6MTY6IlJlbGF0ZWQgUHJvamVjdHMiO3M6MTU6InRyYW5zbGF0aW9uX2FsbCI7czo4OiJTaG93IGFsbCI7czoxNDoidHJhbnNsYXRpb25fYnkiO3M6OToiUG9zdGVkIGJ5IjtzOjIwOiJ0cmFuc2xhdGlvbl9jb21tZW50cyI7czo4OiJDb21tZW50cyI7czoyMjoidHJhbnNsYXRpb25fc2hhcmVfcG9zdCI7czoxNToiU2hhcmUgdGhpcyBQb3N0IjtzOjI3OiJ0cmFuc2xhdGlvbl9yZWNlbnRfY29tbWVudHMiO3M6MTU6IlJlY2VudCBDb21tZW50cyI7czozMjoidHJhbnNsYXRpb25fY29tbWVudF9sZWF2ZV9yZXBsYXkiO3M6MTU6IkxlYXZlIGEgQ29tbWVudCI7czozNToidHJhbnNsYXRpb25fY29tbWVudF9sZWF2ZV9yZXBsYXlfdG8iO3M6MTY6IkxlYXZlIGEgUmVwbHkgdG8iO3M6Mzk6InRyYW5zbGF0aW9uX2NvbW1lbnRfbGVhdmVfcmVwbGF5X2NhbmNsZSI7czoxMjoiQ2FuY2VsIFJlcGx5IjtzOjI0OiJ0cmFuc2xhdGlvbl9jb21tZW50X25hbWUiO3M6NDoiTmFtZSI7czoyNDoidHJhbnNsYXRpb25fY29tbWVudF9tYWlsIjtzOjQ6Ik1haWwiO3M6Mjc6InRyYW5zbGF0aW9uX2NvbW1lbnRfd2Vic2l0ZSI7czo3OiJXZWJzaXRlIjtzOjI4OiJ0cmFuc2xhdGlvbl9jb21tZW50X3JlcXVpcmVkIjtzOjg6InJlcXVpcmVkIjtzOjI2OiJ0cmFuc2xhdGlvbl9jb21tZW50X2Nsb3NlZCI7czoyMDoiQ29tbWVudHMgYXJlIGNsb3NlZC4iO3M6MzE6InRyYW5zbGF0aW9uX2NvbW1lbnRfbm9fcmVzcG9uY2UiO3M6MTA6Ik5vIFJlcGxpZXMiO3M6MzE6InRyYW5zbGF0aW9uX2NvbW1lbnRfb25lX2NvbW1lbnQiO3M6OToiT25lIFJlcGx5IjtzOjMxOiJ0cmFuc2xhdGlvbl9jb21tZW50X21heF9jb21tZW50IjtzOjc6IlJlcGxpZXMiO3M6MTY6ImJhY2tncm91bmRfaW1hZ2UiO3M6MDoiIjtzOjc6ImJvZHlfYmciO3M6MDoiIjtzOjk6ImhlYWRlcl9iZyI7czowOiIiO30=';
		$pmc_data = unserialize(base64_decode($pmc_data)); //100% safe - ignore theme check nag
		update_option('of_options_mundus_pmc', $pmc_data);
		
	}
	//delete_option(OPTIONS);
	
}

// Build Options
$root =  get_template_directory() .'/';
$admin =  get_template_directory() . '/admin/';

require_once ($admin . 'theme-options.php');   // Options panel settings and custom settings
require_once ($admin . 'admin-interface.php');  // Admin Interfaces
require_once ($admin . 'admin-functions.php');  // Theme actions based on options settings
require_once ($admin . 'medialibrary-uploader.php'); // Media Library Uploader


$includes =  get_template_directory() . '/includes/';
$widget_includes =  get_template_directory() . '/includes/widgets/';

/* include custom widgets */
require_once ($widget_includes . 'recent_post_widget.php'); 
require_once ($widget_includes . 'popular_post_widget.php');


/* include scripts */
function pmc_scripts() {
	global $pmc_data;
	/*scripts*/
	wp_enqueue_script('pmc_customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'),true,true);  	      
	wp_enqueue_script('pmc_prettyphoto_n', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'),true,true);
	wp_enqueue_script('pmc_easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'),true,true);
	wp_enqueue_script('pmc_cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', array('jquery'),true,true);
	wp_register_script('pmc_any', get_template_directory_uri() . '/js/jquery.anythingslider.js', array('jquery'),true,true);
	wp_register_script('pmc_isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array('jquery'),true,true);  		
	wp_register_script('pmc_news', get_template_directory_uri() . '/js/jquery.li-scroller.1.0.js', array('jquery'),true,true);  
	wp_enqueue_script('pmc_gistfile', get_template_directory_uri() . '/js/gistfile_pmc.js', array('jquery') ,true,true);  
	wp_register_script('pmc_bxSlider', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery') ,true,true);  			
	wp_register_script('pmc_iosslider', get_template_directory_uri() . '/js/jquery.iosslider.min.js', array('jquery') ,true,true);  
	wp_enqueue_script('pmc_scroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array('jquery') ,true,true); 
	wp_register_script('googlemap', 'http://maps.google.com/maps/api/js?sensor=false', array('jquery'), '', true);			
	/*style*/
	wp_enqueue_style( 'main', get_stylesheet_uri(), 'style');
	wp_enqueue_style( 'prettyp', get_template_directory_uri() . '/css/prettyPhoto.css', 'style');
	if(isset($pmc_data['heading_font'])){			
	if($pmc_data['heading_font']['face'] != 'verdana' and $pmc_data['heading_font']['face'] != 'trebuchet' and $pmc_data['heading_font']['face'] != 'georgia' and $pmc_data['heading_font']['face'] != 'Helvetica Neue' and $pmc_data['heading_font']['face'] != 'times,tahoma') {				
	wp_enqueue_style('googleFont', 'http://fonts.googleapis.com/css?family='.$pmc_data['heading_font']['face'] ,'',NULL);				}				}
	if(isset($pmc_data['body_font'])){			
	if(($pmc_data['body_font']['face'] != 'verdana') and ($pmc_data['body_font']['face'] != 'trebuchet') and ($pmc_data['body_font']['face'] != 'georgia') and ($pmc_data['body_font']['face'] != 'Helvetica Neue') and ($pmc_data['body_font']['face'] != 'times,tahoma')) {	
	wp_enqueue_style('googleFontbody', 'http://fonts.googleapis.com/css?family='.$pmc_data['body_font']['face'] ,'',NULL);			}						}		
	wp_enqueue_style('font-awesome_pms', get_template_directory_uri() . '/css/font-awesome.css' ,'',NULL);
	wp_enqueue_style('options',  get_stylesheet_directory_uri() . '/css/options.css', 'style');		
	wp_enqueue_style('animated-css',  get_stylesheet_directory_uri() . '/css/animate.min.css', 'style');			

}

add_action( 'wp_enqueue_scripts', 'pmc_scripts' ); 

// Other theme options
require_once ($includes . 'custom_functions.php');

/* custom breadcrumb */
function pmc_breadcrumb() {
	global $pmc_data;
	$breadcrumb = '';
	if (!is_home()) {
		$breadcrumb .= '<a href="';
		$breadcrumb .=  home_url();
		$breadcrumb .=  '">';
		$breadcrumb .= get_bloginfo('name');
		$breadcrumb .=  "</a> &#187; ";
		if (is_single()) {
			if (is_single()) {
				$name = '';
				if(!get_query_var($pmc_data['port_slug'])){
					$category = get_the_category(); +
					$category_id = get_cat_ID($category[0]->cat_name);
					$category_link = get_category_link($category_id);					
					$name = '<a href="'. esc_url( $category_link ).'">'.$category[0]->cat_name .'</a>';
				}
				else{
					$taxonomy = 'portfoliocategory';
					$category = get_terms($taxonomy);				
					$name = '<a href="'. get_term_link($category[0]->slug, 'portfoliocategory').'">'.$category[0]->name .'</a>';					
				}
				
				$breadcrumb .= $name .' &#187; '. get_the_title();
			}	
		} elseif (is_page()) {
			$breadcrumb .=  get_the_title();
		}
		elseif(get_query_var('portfoliocategory')){
			$term = get_term_by('slug', get_query_var('portfoliocategory'), 'portfoliocategory'); $name = $term->name; 
			$breadcrumb .=  $name;
		}	
		else if(get_query_var('tag')){
			$tag = get_query_var('tag');
			$tag = str_replace('-',' ',$tag);
			$breadcrumb .=  $tag;
		}
		else if(get_query_var('s')){
			the_search_query();				
		} 
		else if(get_query_var('cat')){
			$cat = get_query_var('cat');
			$cat = get_category($cat);
			$breadcrumb .=  $cat->name;
		}
		else if(get_query_var('m')){
			$breadcrumb .=  __('Archive','wp-mundus');
		}	
	
		else{
			$breadcrumb .=  'Home';
		}
	}
	return $breadcrumb ;
}

/* social share links */
function pmc_socialLinkSingle() {
	$social = '';
	$social ='<div class="addthis_toolbox"><div class="custom_images">';
	global $pmc_data; 
	if($pmc_data['facebook_show'] == 1)
	$social .= '<a class="addthis_button_facebook" title="'.pmc_translation('translation_facebook', 'Facebook').'"></a>';            
	if($pmc_data['twitter_show'] == 1)
	$social .= '<a class="addthis_button_twitter" title="'.pmc_translation('translation_twitter', 'Twitter').'"></a>';  
	$social .='<a class="addthis_button_more"></a></div><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f3049381724ac5b"></script>';	
	$social .= '</div>'; 
	echo $social;
}

/* links to social profile */
function pmc_socialLink() {
	$social = '';
	global $pmc_data; 
	if(isset($pmc_data['twitter_show']) == 1)
	$social .= '<a target="_blank" class="twitterlink bottom" href="'.$pmc_data['twitter'].'" title="'.pmc_translation('translation_twitter', 'Twitter').'"></a>';	
	if(isset($pmc_data['facebook_show']) == 1)
	$social .= '<a target="_blank" class="facebooklink bottom" href="'.$pmc_data['facebook'].'" title="'.pmc_translation('translation_facebook', 'Facebook').'"></a>'; 
	if(isset($pmc_data['digg_show']) == 1) 
	$social .= '<a target="_blank" class="digg bottom" href="'.$pmc_data['digg'].'" title="'.pmc_translation('translation_digg', 'Digg').'"></a>';	
	if(isset($pmc_data['rss_show']) == 1)
	$social .= '<a target="_blank" class="rss bottom" href="'.$pmc_data['rss'].'" title="'.pmc_translation('translation_rss', 'RSS').'"></a>';   
	if(isset($pmc_data['flickr_show']) == 1) 
	$social .= '<a target="_blank" class="flickr bottom" href="'.$pmc_data['flickr'].'" title="'.pmc_translation('translation_flickr', 'Flicker').'"></a>';  	
	if(isset($pmc_data['linkedin_show']) == 1) 
	$social .= '<a target="_blank" class="linkedin bottom" href="'.$pmc_data['linkedin'].'" title="'.pmc_translation('translation_linkedin', 'Linkedin').'"></a>';
	if(isset($pmc_data['dribble_show']) == 1) 
	$social .= '<a target="_blank" class="dribble bottom" href="'.$pmc_data['dribble'].'" title="'.pmc_translation('translation_dribble', 'Drible').'"></a>';	
	if(isset($pmc_data['pinterest_show']) == 1) 
	$social .= '<a target="_blank" class="pinterest bottom" href="'.$pmc_data['pinterest'].'" title="'.pmc_translation('translation_pinterest', 'Pinterest').'"></a>';		
	echo $social;
}

/*translation function*/
function pmc_translation($theme_name, $translation_name){
	global $pmc_data;
	
	$string = pmc_stripText($pmc_data[$theme_name]); 

	return $string;

}
add_filter('the_content', 'pmc_addlightbox');

/* add lightbox to images*/
function pmc_addlightbox($content)
{	global $post;
	$pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
  	$replacement = '<a$1href=$2$3.$4$5 rel="lightbox[%LIGHTID%]"$6>';
    $content = preg_replace($pattern, $replacement, $content);
	if(isset($post->ID))
		$content = str_replace("%LIGHTID%", $post->ID, $content);
    return $content;
}

/* remove double // char */
function pmc_stripText($string) 
{ 
    return str_replace("\\",'',$string);
} 


/* custom short content */
function shortcontent($start, $end, $new, $source, $lenght){
	$countopen = $countclose = 0;
	$text = strip_tags(preg_replace('/<h(.*)>(.*)<\/h(.*)>.*/iU', '', $source), '<b><strong>');
	$text = str_replace( '<strong>' , '<b>', $text );
	$text = str_replace( '</strong>' , '</b>', $text );
	$text = preg_replace('#\[video\](.*)\[\/video\]#si', '', $text);
	$text = preg_replace('#\[pmc_link\](.*)\[\/pmc_link\]#si', '', $text);
	$text = preg_replace('/\[[^\]]*\]/', $new, $text); 
	$text = substr(preg_replace('/\s[\s]+/','',$text),0,$lenght);
	$countopen = substr_count($text, '<b>');
	$countclose = substr_count($text, '</b>');
	if ($countopen > $countclose)
		return $text.'</b>';
	else
		return $text;
}



/* custom post type -- portfolio */
register_taxonomy("portfoliocategory", array($pmc_data['port_slug']), array("hierarchical" => true, "label" => "Portfolio Categories", "singular_label" => "Portfolio Category", "rewrite" => true));
add_action('init', 'pmc_create_portfolio');

function pmc_create_portfolio() {
	global $pmc_data;
	$portfolio_args = array(
		'label' => 'Portfolio',
		'singular_label' => 'Portfolio',
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,
		'supports' => array('title', 'editor', 'thumbnail', 'author', 'comments', 'excerpt')
	);
	register_post_type($pmc_data['port_slug'],$portfolio_args);
}

add_action("admin_init", "pmc_add_portfolio");
add_action('save_post', 'pmc_update_portfolio_data');

function pmc_add_portfolio(){
	global $pmc_data;
	add_meta_box("portfolio_details", "Portfolio Entry Options", "pmc_portfolio_options", $pmc_data['port_slug'], "normal", "high");
}

function pmc_update_portfolio_data(){
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if($post){
		if( isset($_POST["author"]) ) {
			update_post_meta($post->ID, "author", $_POST["author"]);
		}
		if( isset($_POST["date"]) ) {
			update_post_meta($post->ID, "date", $_POST["date"]);
		}
		if( isset($_POST["detail_active"]) ) {
			update_post_meta($post->ID, "detail_active", $_POST["detail_active"]);
		}else{
			update_post_meta($post->ID, "detail_active", 0);
		}
		if( isset($_POST["website_url"]) ) {
			update_post_meta($post->ID, "website_url", $_POST["website_url"]);
		}
		if( isset($_POST["status"]) ) {
			update_post_meta($post->ID, "status", $_POST["status"]);
		}		
		if( isset($_POST["customer"]) ) {
			update_post_meta($post->ID, "customer", $_POST["customer"]);
		}			
		if( isset($_POST["skils"]) ) {
			update_post_meta($post->ID, "skils", $_POST["skils"]);
		}			

	}
}

function pmc_portfolio_options(){
	global $post;
	$pmc_data = get_post_custom($post->ID);
	if (isset($pmc_data["author"][0])){
		$author = $pmc_data["author"][0];
	}else{
		$author = "";
	}
	if (isset($pmc_data["date"][0])){
		$date = $pmc_data["date"][0];
	}else{
		$date = "";
	}
	if (isset($pmc_data["status"][0])){
		$status = $pmc_data["status"][0];
	}else{
		$status = "";
	}	
	if (isset($pmc_data["detail_active"][0])){
		$detail_active = $pmc_data["detail_active"][0];
	}else{
		$detail_active = 0;
		$pmc_data["detail_active"][0] = 0;
	}
	if (isset($pmc_data["website_url"][0])){
		$website_url = $pmc_data["website_url"][0];
	}else{
		$website_url = "";
	}
	
	if (isset($pmc_data["customer"][0])){
		$customer = $pmc_data["customer"][0];
	}else{
		$customer = "";
	}	 

	if (isset($pmc_data["skils"][0])){
		$skils = $pmc_data["skils"][0];
	}else{
		$skils = "";
	}	 	
	?>
    <div id="portfolio-options">
        <table cellpadding="15" cellspacing="15">
        	<tr>
                <td colspan="2"><strong>Portfolio Overview Options:</strong></td>
            </tr>
            <tr>
                <td><label>Link to Detail Page: <i style="color: #999999;">(Do you want a project detail page?)</i></label></td><td><input type="checkbox" name="detail_active" value="1" <?php if( isset($detail_active)){ checked( '1', $pmc_data["detail_active"][0] ); } ?> /></td>	
            </tr>
            <tr>
            	<td><label>Project Link: <i style="color: #999999;">(The URL of your project)</i></label></td><td><input name="website_url" style="width:50%" value="<?php echo $website_url; ?>" /></td>
            </tr>
            <tr>
            	<td><label>Project Author: <i style="color: #999999;">(The URL of your project)</i></label></td><td><input name="author" style="width:50%" value="<?php echo $author; ?>" /></td>
            </tr>
            <tr>
            	<td><label>Project date: <i style="color: #999999;">(Date of project)</i></label></td><td><input name="date" style="width:50%" value="<?php echo $date; ?>" /></td>
            </tr>	
            <tr>
            	<td><label>Customer: <i style="color: #999999;">(Customer of project)</i></label></td><td><input name="customer" style="width:50%" value="<?php echo $customer; ?>" /></td>
            </tr>				
            <tr>
            	<td><label>Project status: <i style="color: #999999;">(Status of project)</i></label></td><td><input name="status" style="width:50%" value="<?php echo $status; ?>" /></td>
            </tr>	
            <tr>
            	<td><label>Required skils: <i style="color: #999999;">(each skill into new line)</i></label></td><td><textarea name="skils" style="width:50%; height:300px;" /><?php echo $skils; ?></textarea></td>
            </tr>				
        </table>
    </div>
      
<?php
}	
	
add_action('save_post', 'update_post_type');
add_action("admin_init", "add_post_type");


/* get category name */
function pmc_getcatname($catID,$posttype){
		if($catID != 0){
		$cat_obj = get_term($catID, $posttype);
		$cat_name = '';
		$cat_name = $cat_obj->name;
		return $cat_name;
		}
	}

	
/* custom post types */	
function add_post_type(){
	add_meta_box("slider_categories", "Post type", "post_type", "post", "normal", "high");
	
}	


function post_type(){
	global $post;
	$pmc_data = get_post_custom($post->ID);
	if (isset($pmc_data["slider_category"][0])){
		$slider_category = $pmc_data["slider_category"][0];
	}else{
		$slider_category = "";
	}
	if (isset($pmc_data["video_post_url"][0])){
		$video_post_url = $pmc_data["video_post_url"][0];
	}else{
		$video_post_url = "";
	}	
	if (isset($pmc_data["video_active_post"][0])){
		$video_active_post = $pmc_data["video_active_post"][0];
	}else{
		$video_active_post = 0;
		$pmc_data["video_active_post"][0] = 0;
	}	
	
	if (isset($pmc_data["link_post_url"][0])){
		$link_post_url = $pmc_data["link_post_url"][0];
	}else{
		$link_post_url = "";
	}	
	
	if (isset($pmc_data["audio_post_url"][0])){
		$audio_post_url = $pmc_data["audio_post_url"][0];
	}else{
		$audio_post_url = "";
	}	

	if (isset($pmc_data["audio_post_title"][0])){
		$audio_post_title = $pmc_data["audio_post_title"][0];
	}else{
		$audio_post_title = "";
	}	
	
	if (isset($pmc_data["selectv"][0])){
		$selectv = $pmc_data["selectv"][0];
	}else{
		$selectv = "";
	}	
	
	

?>
    <div id="portfolio-category-options">
        <table cellpadding="15" cellspacing="15">
	
            <tr class="videoonly" style="border-bottom:1px solid #000;">
            	<td style="border-bottom:1px solid #000;width:100%;"><label>Video URL(*required) - add if you select video post: <i style="color: #999999;">
				<br>Link should look for Youtube: http://www.youtube.com/watch?v=WhBoR_tgXCI - So ID is WhBoR_tgXCI
				<br>Link should look for Vimeo: http://vimeo.com/29017795 so ID is 29017795 <br></i></label><br><input name="video_post_url" value="<?php echo $video_post_url; ?>" />
            	<br><br>
            	<label>Select video: <br/><i style="color: #999999;">
				<select name="selectv">
				<?php if ($selectv == 'vimeo') {?>
				  <option value="vimeo" selected>Vimeo</option>
				 <?php } else {?>
				  <option value="vimeo">Vimeo</option>						
				 <?php }?>	
				<?php if ($selectv == 'youtube') {?>				 
				  <option value="youtube" selected>YouTube</option>
				 <?php } else {?>
				  <option value="youtube">YouTube</option>						
				 <?php }?>					  
				</select>
	
            </td>	
				
			</tr>
						
            <tr class="linkonly" >
			
            	<td style="border-bottom:1px solid #000;width:100%;"><label>Link URL - add if you select link post : <i style="color: #999999;"></i></label><br><input name="link_post_url" style="width:50%" value="<?php echo $link_post_url; ?>" /></td>
            </tr>				

            <tr class="audioonly">
            	<td style="border-bottom:1px solid #000;width:100%;"><label>Audio URL - add if you select audio post: <i style="color: #999999;"></i></label><br><input name="audio_post_url" style="width:50%" value="<?php echo $audio_post_url; ?>" /></td>
            </tr>
            <tr class="audioonly">
            	<td style="border-bottom:1px solid #000;width:100%;"><label>Audio title - add if you select audio post: <i style="color: #999999;"></i></label><br><input name="audio_post_title" style="width:50%" value="<?php echo $audio_post_title; ?>" /></td>
            </tr>			
			
        </table>

    </div>
	
      
<?php


	
}


function update_post_type(){
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if($post){
		if( isset($_POST["slider_category"]) ) {
			update_post_meta($post->ID, "slider_category", $_POST["slider_category"]);
		}	
		if( isset($_POST["video_post_url"]) ) {
			update_post_meta($post->ID, "video_post_url", $_POST["video_post_url"]);
		}	
		if( isset($_POST["video_active_post"]) ) {
			update_post_meta($post->ID, "video_active_post", $_POST["video_active_post"]);
		}else{
			update_post_meta($post->ID, "video_active_post", 0);
		}		
		if( isset($_POST["link_post_url"]) ) {
			update_post_meta($post->ID, "link_post_url", $_POST["link_post_url"]);
		}	
		if( isset($_POST["audio_post_url"]) ) {
			update_post_meta($post->ID, "audio_post_url", $_POST["audio_post_url"]);
		}		
		if( isset($_POST["audio_post_title"]) ) {
			update_post_meta($post->ID, "audio_post_title", $_POST["audio_post_title"]);
		}					
		if( isset($_POST["selectv"]) ) {
			update_post_meta($post->ID, "selectv", $_POST["selectv"]);
		}			
	}
	
	
	
}




if( !function_exists( 'mundus_fallback_menu' ) )
{
	/**
	 * Create a navigation out of pages if the user didnt create a menu in the backend
	 *
	 */
	function mundus_fallback_menu()
	{
		$current = "";
		if (is_front_page()){$current = "class='current-menu-item'";} 
		
		
		echo "<div class='fallback_menu'>";
		echo "<ul class='mundus_fallback menu'>";
		echo "<li $current><a href='".get_bloginfo('url')."'>Home</a></li>";
		wp_list_pages('title_li=&sort_column=menu_order');
		echo "</ul></div>";
	}
}



/* close bold tags*/
function pmc_closeTagsReturn($string){
	$output  = '';
	$open = $close = 0;
	$open = substr_count($string , '<strong>');
	$close = substr_count($string , '</strong>');
	if($open > $close )	
		$output .='</strong>'; 
	return $output;
}


add_filter( 'the_category', 'add_nofollow_cat' );  

function add_nofollow_cat( $text ) { 
	$text = str_replace('rel="category tag"', "", $text); 
	return $text; 
}

/* get image from post */
function pmc_getImage($image){
	if ( has_post_thumbnail() ){
		the_post_thumbnail($image);
		}
	else
		echo '<img src ="'.get_template_directory_uri() . '/images/placeholder-580.png" alt="'.the_title('','',FALSE).'" >';
							
}

function pmc_add_this_script_footer(){ 
	global $pmc_data;
	$search = pmc_stripText($pmc_data['translation_enter_search']); 

?>
<script>	
	jQuery(document).ready(function(){	
		jQuery('.searchform #s').val('<?php echo $search ?>');
		
		jQuery('.searchform #s').focus(function() {
			jQuery('.searchform #s').val('');
		});
		
		jQuery('.searchform #s').focusout(function() {
			jQuery('.searchform #s').val('<?php echo $search ?>');
		});	
		
	});	</script>

<?php  }


add_action('wp_footer', 'pmc_add_this_script_footer'); 	

if ( ! isset( $content_width ) ) $content_width = 800;
?>