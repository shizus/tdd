<?php
/** Features Block 
 * A simple block that output the "features" HTML */
if(!class_exists('AQ_Features_Block')) {
	class AQ_Features_Block extends AQ_Block {
		
		function __construct() {
			$block_options = array(
				'name' => 'Features',
				'size' => 'span4'
			);
			
			parent::__construct('aq_features_block', $block_options);
		}
		
		function form($instance) {
			$defaults = array(
				'title' => '',
				'icon' => 'icon-file',
				'text' => '',
				'link' => '',
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
			<p class="description">
				<label for="<?php echo $this->get_field_id('icon') ?>">
					Awesome Icon Class - <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">refer here</a><br/>
					<?php echo aq_field_input('icon', $block_id, $icon) ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('text') ?>">
					Feature text
					<?php echo aq_field_textarea('text', $block_id, $text, $size = 'full') ?>
				</label>
			</p>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('link') ?>">
					Feature link
					<?php echo aq_field_input('link', $block_id, $link) ?>
				</label>
			</p>			
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			
			wp_enqueue_style('font-awesome');
			
			if($icon) $icon = '<div class = "featuredIcon"><i class="'.$icon.' icon-3x"></i></div> &nbsp;';
			
			if($title) echo $icon.'<h3 class="feature-title">'.strip_tags($title). '</h3>';
			
			echo wpautop(do_shortcode(htmlspecialchars_decode($text)));
			
			if($link) echo '<a href="'.$link.'">Read more</a>';
			
		}
		
	}
}

