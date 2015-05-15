<?php
/** "News" block 
 * 
 * Optional to use horizontal lines/images
**/
class AQ_Title_Border_Block_End extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Block end',
			'size' => 'span3'
		);
		
		//create the block
		parent::__construct('aq_title_border_block_end', $block_options);
	}
	
	function form($instance) {
		
		
	}
	
	function block($instance) {
		echo '</div></div>';
	
}}