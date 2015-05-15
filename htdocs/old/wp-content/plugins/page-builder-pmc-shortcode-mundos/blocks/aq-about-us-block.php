<?php
/** A simple text block **/
if(!class_exists('AQ_About_Us_Block')) {
class AQ_About_Us_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'About Us',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('aq_about_us_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'title_big' => '',
			'title_small' => '',			
			'left_text' => '',
			'right_text' => '',		
			'img' => '',	
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>	
		<p class="description half">
			<label for="<?php echo $this->get_field_id('title_small') ?>">
				Small title
				<?php echo aq_field_input('title_small', $block_id, $title_small, $size = 'full') ?>
			</label>
		</p>
		<p class="description half last">
			<label for="<?php echo $this->get_field_id('title_big') ?>">
				Big title
				<?php echo aq_field_input('title_big', $block_id, $title_big, $size = 'full') ?>
			</label>
		</p>		
		<p class="description">
			<label for="<?php echo $this->get_field_id('left_text') ?>">
				Left text
				<?php echo aq_field_textarea('left_text', $block_id, $left_text, $size = 'full pmc-editor') ?>				
			</label>
		</p>
		<p class="description">
			<label for="<?php echo $this->get_field_id('right_text') ?>">
				Content
				<?php echo aq_field_textarea('right_text', $block_id, $right_text, $size = 'full pmc-editor') ?>				
			</label>
		</p>	
		<p class="description half">
			<label for="<?php echo $this->get_field_id('img') ?>">
				Upload an image<br/>
				<?php echo aq_field_upload('img', $block_id, $img) ?>
			</label>
			<?php if($img) { ?>
			<div class="screenshot">
				<img src="<?php echo $img ?>" />
			</div>
			<?php } ?>
		</p>		
		<?php
	}
	
	function block($instance) {
		extract($instance);
		?>
		<div class="about-us-block" >
			<div class="about-us-block-left-title">
				<p><?php echo $title_small ?></p><span><?php echo $title_big ?></span>
			</div>
			<div class="about-us-block-left-text">
				<?php echo wpautop(do_shortcode(htmlspecialchars_decode($left_text))); ?>
			</div>
			<div class="about-us-block-image">
				<img src = "<?php echo $img ?>" alt = "<?php echo $title ?>" >
			</div>			
			<div class="about-us-block-right-text">
				<?php echo wpautop(do_shortcode(htmlspecialchars_decode($right_text))); ?>
			</div>			
			<div class="about-us-block-right-title">
				<?php echo $title_small ?><span><?php echo $title_big ?></span>
			</div>			
		</div>
		<?php
	}
	
	function update($new_instance, $old_instance) {
		return $new_instance;
	}
	
}
}