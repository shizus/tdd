<?php
/** بسم الله الرحمن الرحيم **

Plugin Name: Aqua Page Builder and PremiumCoding Shortcodes - Mudos Theme
Plugin URI: http://premiumcoding.com
Description: Easily create custom page templates with intuitive drag-and-drop interface. Requires PHP5 and WP3.5. Use this plugin with PremiumCoding themes for shortcode support.
Version: 3.0
Author: Syamil MJ - Modified by PremiumCoding
Author URI: http://aquagraphite.com

*/
 
/**
 * Copyright (c) 2013 Syamil MJ. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

//definitions
if(!defined('AQPB_VERSION')) define( 'AQPB_VERSION', '1.1.0' );
if(!defined('AQPB_PATH')) define( 'AQPB_PATH', plugin_dir_path(__FILE__) );
if(!defined('AQPB_DIR')) define( 'AQPB_DIR', plugin_dir_url(__FILE__) );

//required functions & classes
require_once(AQPB_PATH . 'functions/aqpb_config.php');
require_once(AQPB_PATH . 'functions/aqpb_blocks.php');
require_once(AQPB_PATH . 'classes/class-aq-page-builder.php');
require_once(AQPB_PATH . 'classes/class-aq-block.php');
require_once(AQPB_PATH . 'functions/aqpb_functions.php');
require_once(AQPB_PATH . 'blocks/aq-about-us-block.php');
require_once(AQPB_PATH . 'blocks/aq-column-block.php');
require_once(AQPB_PATH . 'blocks/aq-clear-block.php');
require_once(AQPB_PATH . 'blocks/aq-widgets-block.php');
require_once(AQPB_PATH . 'blocks/aq-alert-block.php');
require_once(AQPB_PATH . 'blocks/aq-tabs-block.php');
require_once(AQPB_PATH . 'blocks/aq-richtext-block.php'); 
require_once(AQPB_PATH . 'blocks/aq-team-block.php');
require_once(AQPB_PATH . 'blocks/aq-advertise-block.php');
require_once(AQPB_PATH . 'blocks/aq-port-block.php');
require_once(AQPB_PATH . 'blocks/aq-title-border-block.php');
require_once(AQPB_PATH . 'blocks/aq-title-border-block-end.php');
require_once(AQPB_PATH . 'blocks/aq-top-wraper-title-block.php');
require_once(AQPB_PATH . 'blocks/aq-end-content-block.php');
require_once(AQPB_PATH . 'blocks/aq-start-content-block.php');
require_once(AQPB_PATH . 'blocks/aq-googlemap-block.php');
require_once(AQPB_PATH . 'blocks/aq-testimonial-block.php');
require_once(AQPB_PATH . 'blocks/aq-pricetable-block.php');
require_once(AQPB_PATH . 'blocks/aq-contact-block.php');
require_once(AQPB_PATH . 'blocks/aq-twitter-block.php');
require_once(AQPB_PATH . 'blocks/aq-features-block.php');
require_once(AQPB_PATH . 'blocks/aq-featured-block.php');
require_once(AQPB_PATH . 'blocks/aq-quote-title-block.php');
require_once(AQPB_PATH . 'blocks/aq-faq-block.php');
require_once(AQPB_PATH . 'blocks/aq-slider-RevSlider-block.php');
require_once(AQPB_PATH . 'blocks/aq-posts-full-width-block.php');
require_once(AQPB_PATH . 'blocks/aq-portfolio-block.php');



//register default blocks
aq_register_block('AQ_Start_Content_Block');
aq_register_block('AQ_End_Content_Block');
aq_register_block('AQ_Slider_Block_revolutionSlider');
aq_register_block('AQ_Quote_Title_Block');
aq_register_block('AQ_Top_Wrapper_Title_Block');
aq_register_block('AQ_Title_Border_Block');
aq_register_block('AQ_Title_Border_Block_end');
aq_register_block('AQ_About_Us_Block');
aq_register_block('AQ_Richtext_Block');
aq_register_block('AQ_Column_Block');
aq_register_block('AQ_Clear_Block');
aq_register_block('AQ_Widgets_Block');
aq_register_block('AQ_Alert_Block');
aq_register_block('AQ_Tabs_Block');
aq_register_block('AQ_Team_Block');
aq_register_block('AQ_Advertise_Block');
aq_register_block('AQ_Port_Block_Feed');
aq_register_block('AQ_Portfolio_Block');
aq_register_block('AQ_Posts_Full_Width_Block');
aq_register_block('AQ_Faqs_Block');
aq_register_block('AQ_Testimonial_Block');
aq_register_block('AQ_Googlemap_Block');
aq_register_block('AQ_Pricetable_Block');
aq_register_block('AQ_Contact_Block');
aq_register_block('AQ_Twitter_Block');
aq_register_block('AQ_Features_Block');
aq_register_block('AQ_Featured_Block');


//fire up page builder
$aqpb_config = aq_page_builder_config();
$aq_page_builder = new AQ_Page_Builder($aqpb_config);
if(!is_network_admin()) $aq_page_builder->init();

/*PremiumCoding Shortcodes*/

if(!defined('PMC_PATH')) define( 'PMC_PATH', plugin_dir_path(__FILE__) );
if(!defined('PMC_DIR')) define( 'PMC_DIR', plugin_dir_url(__FILE__) );



function pmc_plugin_scripts() {
	wp_enqueue_script('pmc_tabs', PMC_DIR . 'assets/js/jquery-ui-1.10.3.custom.min.js', '' ,'' ,false);   
	wp_enqueue_script('pmc_custom_short', PMC_DIR . 'assets/js/custom.js', '' ,'' ,true);   
	wp_enqueue_style('ui_style', PMC_DIR .'assets/css/jquery-ui-1.10.3.custom.min.css', 'style');
	wp_enqueue_style('shortcode', PMC_DIR .'assets/css/shortcode_styles.css', 'style');
}

add_action( 'wp_enqueue_scripts', 'pmc_plugin_scripts' ); 

if(is_admin()){
	function pmc_plugin_admin_scripts() {
		wp_enqueue_script('pmc_editor', PMC_DIR . 'assets/js/tinymce/tinymce.min.js', '' ,'' ,false);  
		wp_enqueue_script('pmc_call_editor', PMC_DIR . 'assets/js/custom_editor.js', '' ,'' ,true);
	}
	add_action( 'admin_enqueue_scripts', 'pmc_plugin_admin_scripts' ); 
	}
		
function fl_shortcode_button() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;

	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "fl_add_shortcode_tinymce_plugin");
		add_filter('mce_buttons', 'fl_register_shortcode_button');
	}
}


function fl_register_shortcode_button($buttons) {
	array_push($buttons, "|", "flshortcodes");
	return $buttons;
}

/**
 * Load the TinyMCE plugin: shortcode_plugin.js
 */
function fl_add_shortcode_tinymce_plugin($plugin_array) {
   $plugin_array['flshortcodes'] = PMC_DIR .'assets/js/shortcode_plugin.js';
   return $plugin_array;
}

function fl_refresh_mce($ver) {
  $ver += 3;
  return $ver;
}

add_filter( 'tiny_mce_version', 'fl_refresh_mce');
add_action( 'init', 'fl_shortcode_button' );

/*audio player*/
function wp_audio_player_head() {
	global $pmc_data;	
	
	echo '<script type="text/javascript" src="'.PMC_DIR .'assets/js/audio-player.js"></script>';
	echo '<script type="text/javascript">';
	echo 'AudioPlayer.setup("'.PMC_DIR .'assets/js/player.swf", {';
	echo 'width: 800,animation:"no", bg:"2a2b2c",leftbg:"1e1e20", rightbg:"1e1e20", volslider:"'.removeChar($pmc_data['mainColor']).'", voltrack:"ffffff", lefticon:"ffffff",righticon:"ffffff",skip:"ffffff", loader:"'.removeChar($pmc_data['mainColor']).'",
		 righticonhover:"ffffff", rightbghover:"'.removeChar($pmc_data['mainColor']).'", text:"1e1e20", border:"1e1e20"';
	echo '});</script>';
}
add_action('wp_head','wp_audio_player_head');

function wp_audio_player($atts) {
extract(shortcode_atts(array(
    'no' => rand(0,999),
    'file' => 'http://'
  ), $atts));
	$postmeta = get_post_custom(get_the_id());
	$title = 'Sample title';
	if(isset($postmeta["audio_product_title"][0]))
		$title = $postmeta["audio_product_title"][0];
	if(isset($postmeta["audio_post_title"][0]))
		$title = $postmeta["audio_post_title"][0];	
		
	return '<script type="text/javascript">AudioPlayer.embed("audioplayer_'.$no.'", {soundFile: "'.$file.'",titles: "'.$title.'"});</script><p id="audioplayer_'.$no.'">
			<audio controls="controls">
			<source src="'.$file.'" type="audio/mpeg" />
			Your browser does not support the audio tag.
			</audio>
			</p>';
}
add_shortcode('audio', 'wp_audio_player');

function removeChar($char){
	$char = explode('#',$char);
	return $char[1];
}

//question
function shortcode_question($atts, $content=null){
return '<div class="question"><span class="img"></span><h3>'.$content.'</h3></div>';	
}
add_shortcode('question', 'shortcode_question');

//success
function shortcode_success($atts, $content=null){
return '<div class="success"><span class="img"></span><h3>'.$content.'</h3></div>';	
}
add_shortcode('success', 'shortcode_success');

//info
function shortcode_info($atts, $content=null){
return '<div class="info"><span class="img"></span><h3>'.$content.'</h3></div>';	
}
add_shortcode('info', 'shortcode_info');

//error
function shortcode_error($atts, $content=null){
return '<div class="error"><span class="img"></span><h3>'.$content.'</h3></div>';
}
add_shortcode('error', 'shortcode_error');

//full
function shortcode_full($atts, $content = null){
return '<div class="full">' . do_shortcode($content) . '</div>';
}
add_shortcode('full', 'shortcode_full');

//half
function shortcode_half($atts, $content = null){
return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('half', 'shortcode_half');

//half last
function shortcode_half_last($atts, $content = null){
return '<div class="one_half last">' . do_shortcode($content) . '</div>';
}
add_shortcode('half_last', 'shortcode_half_last');

//one third
function shortcode_onethird($atts, $content=null){
return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'shortcode_onethird');

//one third last
function shortcode_onethird_last($atts, $content=null){
return '<div class="one_third last">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third_last', 'shortcode_onethird_last');

//one fourth
function shortcode_onefourth($atts, $content=null){
return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'shortcode_onefourth');

//one fourth last
function shortcode_onefourth_last($atts, $content=null){
return '<div class="one_fourth last">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth_last', 'shortcode_onefourth_last');

//two thirds
function shortcode_twothirds($atts, $content=null){
return '<div class="two_thirds">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_thirds', 'shortcode_twothirds');

//three fourths
function shortcode_threefourths($atts, $content=null){
return '<div class="three_fourths">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourths', 'shortcode_threefourths');

//three fourths last 
function shortcode_threefourths_last($atts, $content=null){
return '<div class="three_fourths last">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourths_last', 'shortcode_threefourths_last');

//one fifth 
function shortcode_onefifth($atts, $content=null){
return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'shortcode_onefifth');

//one fifth  last 
function shortcode_onefifth_last($atts, $content=null){
return '<div class="one_fifth last">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth_last', 'shortcode_onefifth_last');

//four fifths  
function shortcode_fourfifths($atts, $content=null){
return '<div class="four_fifths">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifths', 'shortcode_fourfifths');

//four fifths last
function shortcode_fourfifths_last($atts, $content=null){
return '<div class="four_fifths last">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifths_last', 'shortcode_fourfifths_last');

//break
function shortcode_break($atts, $content=null){
return '<div class="break clearfix">&nbsp;</div>';
}
add_shortcode('break', 'shortcode_break');

//divider
function shortcode_divider($atts, $content=null){
return '<div class="divider clearfix">&nbsp;</div>';
}
add_shortcode('divider', 'shortcode_divider');

//divider top
function shortcode_dividertop( $atts, $content = null ) {
return '<div class="totop"><div class="gototop"></div></div>';
}
add_shortcode('dividertop', 'shortcode_dividertop');

//ribbon red
function shortcode_ribbon_red($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
return '<div class="ribbon"><div class="ribbon_left_red"></div><div class="ribbon_center_red"><a href ="'.$url.'">' .do_shortcode($content). '</a></div><div class="ribbon_right_red"></div></div>';
}
add_shortcode('ribbon_red', 'shortcode_ribbon_red');

//ribbon blue
function shortcode_ribbon_blue($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
return '<div class="ribbon"><div class="ribbon_left_blue"></div><div class="ribbon_center_blue"><a href ="'.$url.'">' .do_shortcode($content). '</a></div><div class="ribbon_right_blue"></div></div>';
}
add_shortcode('ribbon_blue', 'shortcode_ribbon_blue');

//ribbon yellow
function shortcode_ribbon_yellow($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
return '<div class="ribbon"><div class="ribbon_left_yellow"></div><div class="ribbon_center_yellow"><a href ="'.$url.'">' .do_shortcode($content). '</a></div><div class="ribbon_right_yellow"></div></div>';
}
add_shortcode('ribbon_yellow', 'shortcode_ribbon_yellow');

//ribbon green
function shortcode_ribbon_green($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
return '<div class="ribbon"><div class="ribbon_left_green"></div><div class="ribbon_center_green"><a href ="'.$url.'">' .do_shortcode($content). '</a></div><div class="ribbon_right_green"></div></div>';
}
add_shortcode('ribbon_green', 'shortcode_ribbon_green');

//ribbon green
function shortcode_ribbon_white($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
return '<div class="ribbon"><div class="ribbon_left_white"></div><div class="ribbon_center_white"><a href ="'.$url.'">' .do_shortcode($content). '</a></div><div class="ribbon_right_white"></div></div>';
}
add_shortcode('ribbon_white', 'shortcode_ribbon_white');

//high light dark
function shortcode_highlight_black($atts, $content=null){
return '<span class="black" >' .$content. '</span>';
}
add_shortcode('highlight_black', 'shortcode_highlight_black');


//high light yellow
function shortcode_highlight_yellow($atts, $content=null){
return '<span class="yellow" >' .$content. '</span>';
}
add_shortcode('highlight_yellow', 'shortcode_highlight_yellow');


//high light blue
function shortcode_highlight_blue($atts, $content=null){
return '<span class="blue" >' .$content. '</span>';
}
add_shortcode('highlight_blue', 'shortcode_highlight_blue');


//high light green
function shortcode_highlight_green($atts, $content=null){
return '<span class="green" >' .$content. '</span>';
}
add_shortcode('highlight_green', 'shortcode_highlight_green');


//list arrow
function shortcode_list_arrow($atts, $content=null){
return '<ul class="arrow" >' .$content. '</ul>';
}
add_shortcode('list_arrow', 'shortcode_list_arrow');

//list arrow point
function shortcode_list_arrow_point($atts, $content=null){
return '<ul class="arrow_point" >' .$content. '</ul>';
}
add_shortcode('list_arrow_point', 'shortcode_list_arrow_point');

//list circle
function shortcode_list_circle($atts, $content=null){
return '<ul class="circle" >' .$content. '</ul>';
}
add_shortcode('list_circle', 'shortcode_list_circle');


//list tick
function shortcode_list_tick($atts, $content=null){
return '<ul class="ticklist" >' .$content. '</ul>';
}
add_shortcode('list_tick', 'shortcode_list_tick');

//list comment
function shortcode_list_comment($atts, $content=null){
return '<ul class="commentlistshort" >' .$content. '</ul>';
}
add_shortcode('list_comment', 'shortcode_list_comment');

//list mail
function shortcode_list_mail($atts, $content=null){
return '<ul class="maillist" >' .$content. '</ul>';
}
add_shortcode('list_mail', 'shortcode_list_mail');

//list plus
function shortcode_list_plus($atts, $content=null){
return '<ul class="pluslist" >' .$content. '</ul>';
}
add_shortcode('list_plus', 'shortcode_list_plus');

//list ribbon
function shortcode_list_ribbon($atts, $content=null){
return '<ul class="ribbonlist" >' .$content. '</ul>';
}
add_shortcode('list_ribbon', 'shortcode_list_ribbon');

//list settings
function shortcode_list_settings($atts, $content=null){
return '<ul class="settingslist" >' .$content. '</ul>';
}
add_shortcode('list_settings', 'shortcode_list_settings');

//list star
function shortcode_list_star($atts, $content=null){
return '<ul class="starlist" >' .$content. '</ul>';
}
add_shortcode('list_star', 'shortcode_list_star');

//list image
function shortcode_list_image($atts, $content=null){
return '<ul class="imagelist" >' .$content. '</ul>';
}
add_shortcode('list_image', 'shortcode_list_image');

//list link
function shortcode_list_link($atts, $content=null){
return '<ul class="linklist" >' .$content. '</ul>';
}
add_shortcode('list_link', 'shortcode_list_link');

//text
function shortcode_slogan ($atts, $content=null){
return '<span class="slogan" >' . do_shortcode($content) . '</span>';
}
add_shortcode('slogan', 'shortcode_slogan');

//dropcap
function shortcode_dropcap($atts, $content=null) {
return '<div class="dropcap">' .$content. '</div>';
}
add_shortcode('dropcap', 'shortcode_dropcap');

//button dark
function shortcode_button_dark($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"iconlink" =>''
	), $atts));
	$image = '';
	if($iconlink == '')
		$image = '';
	else
		$image = '<div class="iconbutton"><img src="'.$iconlink.'" /></div>';
return '<div class="buttonshort"><div class="buttondark">'.$image.'<div class="buttonleft"><a href="'.$url.'">'.do_shortcode($content).'</a></div></div></div>';
}
add_shortcode('button_dark', 'shortcode_button_dark');

//button blue
function shortcode_button_blue($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"iconlink" =>''
	), $atts));
	$image = '';
	if($iconlink == '')
		$image = '';
	else
		$image = '<div class="iconbutton"><img src="'.$iconlink.'" /></div>';
return '<div class="buttonshort"><div class="buttonblue">'.$image.'<div class="buttonleft"><a href="'.$url.'">'.do_shortcode($content).'</a></div></div></div>';
}
add_shortcode('button_blue', 'shortcode_button_blue');

//button green
function shortcode_button_green($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"iconlink" =>''
	), $atts));
	$image = '';
	if($iconlink == '')
		$image = '';
	else
		$image = '<div class="iconbutton"><img src="'.$iconlink.'" /></div>';
return '<div class="buttonshort"><div class="buttongreen">'.$image.'<div class="buttonleft"><a href="'.$url.'">'.do_shortcode($content).'</a></div></div></div>';
}
add_shortcode('button_green', 'shortcode_button_green');

//button pink
function shortcode_button_pink($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"iconlink" =>''
	), $atts));
	$image = '';
	if($iconlink == '')
		$image = '';
	else
		$image = '<div class="iconbutton"><img src="'.$iconlink.'" /></div>';
return '<div class="buttonshort"><div class="buttonpink">'.$image.'<div class="buttonleft"><a href="'.$url.'">'.do_shortcode($content).'</a></div></div></div>';
}
add_shortcode('button_pink', 'shortcode_button_pink');

//button yellow
function shortcode_button_yellow($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"iconlink" =>''
	), $atts));
	$image = '';
	if($iconlink == '')
		$image = '';
	else
		$image = '<div class="iconbutton"><img src="'.$iconlink.'" /></div>';
return '<div class="buttonshort"><div class="buttonyellow">'.$image.'<div class="buttonleft"><a href="'.$url.'">'.do_shortcode($content).'</a></div></div></div>';
}
add_shortcode('button_yellow', 'shortcode_button_yellow');

//button orange
function shortcode_button_orange($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"iconlink" =>''
	), $atts));
	$image = '';
	if($iconlink == '')
		$image = '';
	else
		$image = '<div class="iconbutton"><img src="'.$iconlink.'" /></div>';
return '<div class="buttonshort"><div class="buttonorange">'.$image.'<div class="buttonleft"><a href="'.$url.'">'.do_shortcode($content).'</a></div></div></div>';
}
add_shortcode('button_orange', 'shortcode_button_orange');

//button orange modern
function shortcode_button_orange_modern($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"iconlink" =>''
	), $atts));
	$image = '';
	if($iconlink == '')
		$image = '';
	else
		$image = '<div class="iconbutton"><img src="'.$iconlink.'" /></div>';
return '<div class="buttonshort"><div class="buttonorange_modern">'.$image.'<div class="buttonleft"><a href="'.$url.'">'.do_shortcode($content).'</a></div></div></div>';
}
add_shortcode('button_orange_modern', 'shortcode_button_orange_modern');

//button red
function shortcode_button_red($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"iconlink" =>''
	), $atts));
	$image = '';
	if($iconlink == '')
		$image = '';
	else
		$image = '<div class="iconbutton"><img src="'.$iconlink.'" /></div>';
return '<div class="buttonshort"><div class="buttonred">'.$image.'<div class="buttonleft"><a href="'.$url.'">'.do_shortcode($content).'</a></div></div></div>';
}
add_shortcode('button_red', 'shortcode_button_red');


//button dark modern
function shortcode_button_dark_modern($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"iconlink" =>''
	), $atts));
	$image = '';
	if($iconlink == '')
		$image = '';
	else
		$image = '<div class="iconbutton"><img src="'.$iconlink.'" /></div>';
return '<div class="buttonshort"><div class="buttondark_modern">'.$image.'<div class="buttonleft"><a href="'.$url.'">'.do_shortcode($content).'</a></div></div></div>';
}
add_shortcode('button_dark_modern', 'shortcode_button_dark_modern');

//button blue
function shortcode_button_blue_modern($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"iconlink" =>''
	), $atts));
	$image = '';
	if($iconlink == '')
		$image = '';
	else
		$image = '<div class="iconbutton"><img src="'.$iconlink.'" /></div>';
return '<div class="buttonshort"><div class="buttonblue_modern">'.$image.'<div class="buttonleft"><a href="'.$url.'">'.do_shortcode($content).'</a></div></div></div>';
}
add_shortcode('button_blue_modern', 'shortcode_button_blue_modern');

//button green
function shortcode_button_green_modern($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"iconlink" =>''
	), $atts));
	$image = '';
	if($iconlink == '')
		$image = '';
	else
		$image = '<div class="iconbutton"><img src="'.$iconlink.'" /></div>';
return '<div class="buttonshort"><div class="buttongreen_modern">'.$image.'<div class="buttonleft"><a href="'.$url.'">'.do_shortcode($content).'</a></div></div></div>';
}
add_shortcode('button_green_modern', 'shortcode_button_green_modern');

//button pink
function shortcode_button_pink_modern($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"iconlink" =>''
	), $atts));
	$image = '';
	if($iconlink == '')
		$image = '';
	else
		$image = '<div class="iconbutton"><img src="'.$iconlink.'" /></div>';
return '<div class="buttonshort"><div class="buttonpink_modern">'.$image.'<div class="buttonleft"><a href="'.$url.'">'.do_shortcode($content).'</a></div></div></div>';
}
add_shortcode('button_pink_modern', 'shortcode_button_pink_modern');

//button yellow
function shortcode_button_yellow_modern($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"iconlink" =>''
	), $atts));
	$image = '';
	if($iconlink == '')
		$image = '';
	else
		$image = '<div class="iconbutton"><img src="'.$iconlink.'" /></div>';
return '<div class="buttonshort"><div class="buttonyellow_modern">'.$image.'<div class="buttonleft"><a href="'.$url.'">'.do_shortcode($content).'</a></div></div></div>';
}
add_shortcode('button_yellow_modern', 'shortcode_button_yellow_modern');

//button grey
function shortcode_button_grey_modern($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"iconlink" =>''
	), $atts));
	$image = '';
	if($iconlink == '')
		$image = '';
	else
		$image = '<div class="iconbutton"><img src="'.$iconlink.'" /></div>';
return '<div class="buttonshort"><div class="buttongrey_modern">'.$image.'<div class="buttonleft"><a href="'.$url.'">'.do_shortcode($content).'</a></div></div></div>';
}
add_shortcode('button_grey_modern', 'shortcode_button_grey_modern');

//button red
function shortcode_button_red_modern($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"iconlink" =>''
	), $atts));
	$image = '';
	if($iconlink == '')
		$image = '';
	else
		$image = '<div class="iconbutton"><img src="'.$iconlink.'" /></div>';
return '<div class="buttonshort"><div class="buttonred_modern">'.$image.'<div class="buttonleft"><a href="'.$url.'">'.do_shortcode($content).'</a></div></div></div>';
}
add_shortcode('button_red_modern', 'shortcode_button_red_modern');

//button buy
function shortcode_button_purche($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"bottom_text"=>''
	), $atts));
return '<div class="button_purche"><a href="'.$url.'"><div class="button_purche_left"></div><div class="button_purche_right"><div class="button_purche_right_top">'.do_shortcode($content).'</div><div class="button_purche_right_bottom">'.$bottom_text.'</div></div></a></div>';
}
add_shortcode('button_purche', 'shortcode_button_purche');

//button download
function shortcode_button_download($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"bottom_text"=>''
	), $atts));
return '<div class="button_download"><a href="'.$url.'"><div class="button_download_left"></div><div class="button_download_right"><div class="button_download_right_top">'.do_shortcode($content).'</div><div class="button_download_right_bottom">'.$bottom_text.'</div></div></a></div>';
}
add_shortcode('button_download', 'shortcode_button_download');

//button search
function shortcode_button_search_c($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"bottom_text"=>''
	), $atts));
return '<div class="button_search"><a href="'.$url.'"><div class="button_search_left"></div><div class="button_search_right"><div class="button_search_right_top">'.do_shortcode($content).'</div><div class="button_search_right_bottom">'.$bottom_text.'</div></div></a></div>';
}
add_shortcode('button_search_c', 'shortcode_button_search_c');//linefunction shortcode_line($atts, $content = null) {return '<div class="infotextBorderSingle short"></div>';}add_shortcode('line', 'shortcode_line');

//progressbar
function shortcode_progressbar($atts, $content = null) {
	extract(shortcode_atts(array(
		"progress" => '',
		"color"=>''
	), $atts));

return '<h4>'.do_shortcode($content).'</h4><div class="progressbar ui-widget ui-widget-content ui-corner-all">
   <div style="width: '.$progress.'%; background-color:'.$color.'" class="ui-progressbar-value ui-widget-header ui-corner-left"></div>
</div>';
}
add_shortcode('progressbar', 'shortcode_progressbar');

//toggle
function shortcode_toggle($atts, $content = null){
	extract(shortcode_atts(array(
		'title' => ''
	), $atts));
return '<div class="block"><h2 class="trigger">'.$title.'</h2>
<div class="toggle_container">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('toggle', 'shortcode_toggle');

//pull quote
function shortcode_pullquote( $atts, $content = null ) {
return '<blockquote class="pullquote">' . $content . '</blockquote>';
}
add_shortcode('pull', 'shortcode_pullquote');

//push quote
function shortcode_pushquote( $atts, $content = null ) {
return '<blockquote class="pushquote">' . $content . '</blockquote>';
}
add_shortcode('push', 'shortcode_pushquote');

add_filter('widget_text', 'do_shortcode');
//button search


//accordion
add_shortcode( 'accordion', 'short_accordions' );
function short_accordions( $atts, $content ){
$GLOBALS['atab_count'] = 0;

do_shortcode( $content );
$content = '';
if( is_array( $GLOBALS['atabs'] ) ){
foreach( $GLOBALS['atabs'] as $tab ){
$content .= '<h3>'.$tab['title'].'</h3>';
$content .= '<div><p>'.$tab['content'].'</p></div>';
}
$return = '<div class="accordion">'.$content.'</div>'."\n";
}
return $return;
}

add_shortcode( 'atab', 'short_accordion' );
function short_accordion( $atts, $content ){
extract(shortcode_atts(array(
'title' => 'Tab %d'
), $atts));

$x = $GLOBALS['atab_count'];
$GLOBALS['atabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['atab_count'] ), 'content' =>  $content );

$GLOBALS['atab_count']++;
}

//nivo thumb


add_shortcode( 'nivot', 'short_nivost' );
function short_nivost( $atts, $content ){
wp_enqueue_script('pmc_nivo');
$GLOBALS['nttab_count'] = 0;
global $pmc_data; 
do_shortcode( $content );
$content = '';
if( is_array( $GLOBALS['nttabs'] ) ){
foreach( $GLOBALS['nttabs'] as $tab ){
if($tab['link'] != '')
$content .= '<a href="'.$tab['link'] .'"><img class="hideimage" alt="'. pmc_stripText($tab['title']) .'" style="height:'.$tab['height'].'px;width:'.$tab['width'].'px" src="'. $tab['imageurl'] .'"  rel="'. $tab['imageurl'] .'"></a>';
else
$content .= '<img alt="'. pmc_stripText($tab['title']) .'" class="hideimage" style="height:'.$tab['height'].'px;width:'.$tab['width'].'px" src="'. $tab['imageurl'] .'" title="'. pmc_stripText($tab['title']) .'" rel="'. $tab['imageurl'] .'">';


}
$return = "<script>jQuery(document).ready(function () {jQuery('#nslidert').nivoSlider({
		effect:'".$pmc_data['effect'] ."', // Specify sets like: 'fold,fade,sliceDown'
        slices:". $pmc_data['slices'] .", // For slice animations
        boxCols: ". $pmc_data['boxcols'] .", // For box animations
        boxRows: ". $pmc_data['boxrows'] .", // For box animations
        animSpeed:". $pmc_data['anispeed'] .", // Slide transition speed
        pauseTime:". $pmc_data['pausetime'].", // How long each slide will show
        startSlide:0, // Set starting Slide (0 index)
        directionNav:false, // Next & Prev navigation
        directionNavHide:true, // Only show on hover
		controlNav:true, // 1,2,3... navigation
		pauseOnHover:false,
		controlNavThumbs: true,
		controlNavThumbsFromRel: true,
		controlNavThumbsSearch: '',
		controlNavThumbsReplace: '',
		captionOpacity:1    });});	</script><div id='nslidert' class='nivoSlidert' style='height:".$tab['height']."px;width:".$tab['width']."px;margin-bottom:10px;margin-left:0;'>".$content."</div>";

}
return $return;
}

add_shortcode( 'nttab', 'short_nivot' );
function short_nivot( $atts, $content ){
extract(shortcode_atts(array(
'title' => 'Tab %d',
'imageurl' => '',
'link' => '',
'width' => '600',
'height' => '300'
), $atts));

$x = $GLOBALS['nttab_count'];
$GLOBALS['nttabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['nttab_count'] ) ,'imageurl' => sprintf( $imageurl, $GLOBALS['nttab_count'] ),'link' => sprintf( $link, $GLOBALS['nttab_count'] ),'width' => sprintf( $width, $GLOBALS['nttab_count'] ),'height' => sprintf( $height, $GLOBALS['nttab_count'] ),'content' =>  $content );

$GLOBALS['nttab_count']++;
}

//nivo


add_shortcode( 'nivo', 'short_nivos' );
function short_nivos( $atts, $content ){
$GLOBALS['ntab_count'] = 0;
global $pmc_data; 
do_shortcode( $content );
$content = '';
if( is_array( $GLOBALS['ntabs'] ) ){
foreach( $GLOBALS['ntabs'] as $tab ){
if($tab['link'] != '')
$content .= '<a href="'.$tab['link'] .'"><img alt="'. pmc_stripText($tab['title']) .'" style="height:'.$tab['height'].'px;width:'.$tab['width'].'px" src="'. $tab['imageurl'] .'" ></a>';
else
$content .= '<img alt="'. pmc_stripText($tab['title']) .'" style="height:'.$tab['height'].'px;width:'.$tab['width'].'px" src="'. $tab['imageurl'] .'">';


}
$return = "<script>jQuery(document).ready(function () {jQuery('.nivoSlider').nivoSlider({effect:'".$pmc_data['effect'] ."', // Specify sets like: 'fold,fade,sliceDown'slices:". $pmc_data['slices'] .", // For slice animations
        boxCols: ". $pmc_data['boxcols'] .", // For box animations
        boxRows: ". $pmc_data['boxrows'] .", // For box animations
        animSpeed:". $pmc_data['anispeed'] .", // Slide transition speed
        pauseTime:". $pmc_data['pausetime'].", // How long each slide will show
        startSlide:0, // Set starting Slide (0 index)
        directionNav:true, // Next & Prev navigation
        directionNavHide:true, // Only show on hover
		controlNav:false, // 1,2,3... navigation
		pauseOnHover:false,
		captionOpacity:1 });});	</script><div id='nslider' class='nivoSlider' style='height:".$tab['height']."px;width:".$tab['width']."px;margin-bottom:10px;margin-left:0;'>".$content."</div>";

}
return $return;
}

add_shortcode( 'ntab', 'short_nivo' );
function short_nivo( $atts, $content ){
wp_enqueue_script('pmc_nivo');
extract(shortcode_atts(array(
'title' => 'Tab %d',
'imageurl' => '',
'link' => '',
'width' => '600',
'height' => '300'
), $atts));

$x = $GLOBALS['ntab_count'];
$GLOBALS['ntabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['ntab_count'] ) ,'imageurl' => sprintf( $imageurl, $GLOBALS['ntab_count'] ),'link' => sprintf( $link, $GLOBALS['ntab_count'] ),'width' => sprintf( $width, $GLOBALS['ntab_count'] ),'height' => sprintf( $height, $GLOBALS['ntab_count'] ),'content' =>  $content );

$GLOBALS['ntab_count']++;
}

//tabs
add_shortcode( 'tabgroup', 'fl_tabs' );
function fl_tabs( $atts, $content ){
$GLOBALS['tab_count'] = 0;

do_shortcode( $content );

if( is_array( $GLOBALS['tabs'] ) ){+$i=0;
foreach( $GLOBALS['tabs'] as $tab ){
$tabs[] = '<li><a href="#fragment-'.$i.'">'.$tab['title'].'</a></li>';
$panes[] = '<div class="pane" id="fragment-'.$i.'"><h3>'.$tab['title'].'</h3>'.$tab['content'].'</div>';$i++;
}
$return = "\n".'<!-- the tabs --><div class="tabwrap tabsonly"><ul class="tabsshort">'.implode( "\n", $tabs ).'</ul>'."\n".'<!-- tab "panes" --><div class="panes">'.implode( "\n", $panes ).'</div></div>'."\n";
}
return $return;
}

add_shortcode( 'tab', 'fl_tab' );
function fl_tab( $atts, $content ){
extract(shortcode_atts(array(
'title' => 'Tab %d'
), $atts));

$x = $GLOBALS['tab_count'];
$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );

$GLOBALS['tab_count']++;
}

/*-----------------------------------------------------------------------------------*/
/* Google Maps Shortcode
/*-----------------------------------------------------------------------------------*/

function get_map_coordinates($address, $force_refresh = false) {

    $address_hash = md5( $address );

    $coordinates = get_transient( $address_hash );

    if ($force_refresh || $coordinates === false) {

    	$args       = array( 'address' => urlencode( $address ), 'sensor' => 'false' );
    	$url        = add_query_arg( $args, 'http://maps.googleapis.com/maps/api/geocode/json' );
     	$response 	= wp_remote_get( $url );

     	if( is_wp_error( $response ) )
     		return;

     	$pmc_data = wp_remote_retrieve_body( $response );

     	if( is_wp_error( $pmc_data ) )
     		return;

		if ( $response['response']['code'] == 200 ) {

			$pmc_data = json_decode( $pmc_data );

			if ( $pmc_data->status === 'OK' ) {

			  	$coordinates = $pmc_data->results[0]->geometry->location;

			  	$cache_value['lat'] 	= $coordinates->lat;
			  	$cache_value['lng'] 	= $coordinates->lng;
			  	$cache_value['address'] = (string) $pmc_data->results[0]->formatted_address;

			  	// cache coordinates for 3 months
			  	set_transient($address_hash, $cache_value, 3600*24*30*3);
			  	$pmc_data = $cache_value;

			} elseif ( $pmc_data->status === 'ZERO_RESULTS' ) {
			  	return __( 'No location found for the entered address.', 'pw-maps' );
			} elseif( $pmc_data->status === 'INVALID_REQUEST' ) {
			   	return __( 'Invalid request. Did you enter an address?', 'pw-maps' );
			} else {
				return __( 'Something went wrong while retrieving your map, please ensure you have entered the short code correctly.', 'pw-maps' );
			}

		} else {
		 	return __( 'Unable to contact Google API service.', 'pw-maps' );
		}

    } else {
       // return cached results
       $pmc_data = $coordinates;
    }

    return $pmc_data;
}


?>
