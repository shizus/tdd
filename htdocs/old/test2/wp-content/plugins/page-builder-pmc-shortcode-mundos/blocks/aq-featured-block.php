<?php
/** Features Block 
 * A simple block that output the "features" HTML */
if(!class_exists('AQ_Featured_Circles_Bloc')) {
	class AQ_Featured_Block extends AQ_Block {
		
		function __construct() {
			$block_options = array(
				'name' => 'Featured Block',
				'size' => 'span2'
			);
			
			parent::__construct('aq_featured_block', $block_options);
		}
		
		function form($instance) {
			$defaults = array(
				'title' => '',				
				'text' => '',
				'color' => '#F5F6F1',
				'link' => 'http://premiumcoding.com',
				'numbers' => 0,
				'step' => 1
			
			);
			
			$textcolor_option = array(
				'light'  => 'Light (white)',
				'dark'  => 'Theme main color',
				
			);				
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title<br/>
					<?php echo aq_field_input('title', $block_id, $title) ?>
				</label>
			</p>	
			<p class="description half">
				<label for="<?php echo $this->get_field_id('numbers') ?>">
					<?php echo aq_field_checkbox('numbers', $block_id, $numbers); ?>
					Roll the title (only for numbers)?
				</label>
			</p>	
		
			<p class="color">
				<label for="<?php echo $this->get_field_id('color') ?>">
					Select circle color
					<?php echo aq_field_color_picker('color', $block_id, $color, $size = 'full') ?>
				</label>
			</p>	
			<p class="description">
				<label for="<?php echo $this->get_field_id('link') ?>">
					Link<br/>
					<?php echo aq_field_input('link', $block_id, $link) ?>
				</label>
			</p>				
			<p class="description">
				<label for="<?php echo $this->get_field_id('text') ?>">
					Feature text
					<?php echo aq_field_textarea('text', $block_id, $text, $size = 'full') ?>
				</label>
			</p>
			
			<?php
			
		}
		
		function block($instance) {
			$defaults = array(
				'title' => '',				
				'text' => '',
				'color' => '#F5F6F1',
				'link' => 'http://premiumcoding.com'
			
			);
						
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			$rand = rand(1,100);
			if($link != ''){?>
				<a href="<?php echo $link ?>">
			<?php } ?>
			<div class="featured-block" style="background:<?php echo $color;?>; ">
			
				<div class="featured-block-title" ><?php if($title) {?> <h5 class="feature-title <?php if($numbers == 1) { echo ' number-animate';} ?>" <?php if($numbers == 1) { echo 'id="number-'.$rand.'"';} ?>><?php echo strip_tags($title) ?></h5> <?php } ?></div>
				
				<div class="featured-block-text"><?php echo wpautop(do_shortcode(htmlspecialchars_decode($text))); ?></div>
			
			</div>
			<?php if($link != ''){?>
				</a>
			<?php } ?>			
			<?php
			
		}
		
	}
}

