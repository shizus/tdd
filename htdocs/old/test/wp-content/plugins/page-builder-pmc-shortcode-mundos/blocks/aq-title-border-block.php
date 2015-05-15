<?php
/** "News" block 
 * 
 * Optional to use horizontal lines/images
**/
class AQ_Title_Border_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Block start',
			'size' => 'span3'
		);
		
		//create the block
		parent::__construct('aq_title_border_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'title' => '',
			'descriptiontext' => '',
			'id' => '',
			'title_color' => '#fff'
		);
		

		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		
		?>
		<p class="description note">
			<?php _e('Use this block to create title with border.', 'framework') ?>
		</p>
		<p class="description ">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>	
		<p class="description ">
			<label for="<?php echo $this->get_field_id('descriptiontext') ?>">
				Description
				<?php echo aq_field_input('descriptiontext', $block_id, $descriptiontext, $size = 'full') ?>
			</label>
		</p>	
		<p class="description ">
			<label for="<?php echo $this->get_field_id('id') ?>">
				Id for menu
				<?php echo aq_field_input('id', $block_id, $id, $size = 'full') ?>
			</label>
		</p>
		<div class="description ">
			<label for="<?php echo $this->get_field_id('title_color') ?>">
				Title color<br/>
				<?php echo aq_field_color_picker('title_color', $block_id, $title_color, $defaults['title_color']) ?>
			</label>
			
		</div>
	
	
		<?php
		
	}
	
	function block($instance) {
			$defaults = array(
			'title' => '',
			'descriptiontext' => '',
			'id' => ''
		);
		

		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);

		$text = '<div class="border-block" id="'.$id.'">
				<div class="title-block-wrap"><h2 style="color:'.$title_color.'" class="titleborderh2">'. $title .'</h2>';
		if($title){ $text .= '<div class="titleborderOut"><div class="titleborder"></div></div>';}
		$text .= '<div class="titletext">'. wpautop(do_shortcode(htmlspecialchars_decode($descriptiontext))) .' </div>';
				
		echo $text;
	
}}