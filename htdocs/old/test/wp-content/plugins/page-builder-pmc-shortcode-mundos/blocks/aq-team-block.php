<?php
/** A simple rich textarea block **/
class AQ_Team_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Team block',
			'size' => 'span3',
		);
		
		//create the block
		parent::__construct('aq_team_block', $block_options);
		function socialLinkTeam($facebook,$twitter,$vimeo,$dribble,$email) {
			$social = '';
			global $pmc_data; 
			if(function_exists( 'translation_builder' )){
				if($facebook != '')
				$social .= '<a target="_blank" class="facebooklink" href="'.$facebook.'" title="'.translation_builder('translation_facebook', 'Facebook').'"></a>';            
				if($twitter != '')
				$social .= '<a target="_blank" class="twitterlink" href="'.$twitter.'" title="'.translation_builder('translation_twitter', 'Twitter').'"></a>';  
				if($vimeo != '') 
				$social .= '<a target="_blank" class="vimeo" href="'.$vimeo.'" title="'.translation_builder('translation_twitter', 'Vimeo').'"></a>';  
				if($dribble != '')
				$social .= '<a target="_blank" class="dribble" href="'.$dribble.'" title="'.translation_builder('translation_dribble', 'Dribble').'"></a>';  
				if($email != '') 
				$social .= '<a target="_blank" class="emaillink" href="mailto:'.$email.'" title="'.translation_builder('translation_email', 'Send us Email').'"></a>';
			}
			return $social;
		}
	}
	
function form($instance) {
	
	// default key/values array
	$defaults = array(
		'title' 	=> '', // the name of the member
		'position'	=> '', // job position
		'avatar'	=> '', // profile picture
		'bio'		=> '', // a little info about the member
		'url'		=> '', // website URL
		'twitter' 	=> '', // twitter URL
		'facebook'	=> '', // facebook URL
		'vimeo'	=> '', // vimeo URL
		'dribble'	=> '', // dribble URL
		'mail'	=> '', // mail URL			
	
	);

	// set default values (if not yet defined)
	$instance = wp_parse_args($instance, $defaults);

	// import each array key as variable with defined values
	extract($instance); ?>
	
	
	<p class="description half">
		<label for="<?php echo $this->get_field_id('title') ?>">
			Member Name (required)<br/>
			<?php echo aq_field_input('title', $block_id, $title) ?>
		</label>
	</p>

	<p class="description half last">
		<label for="<?php echo $this->get_field_id('position') ?>">
			Position(required)<br/>
			<?php echo aq_field_input('position', $block_id, $position) ?>
		</label>
	</p>

	<div class="description">
		<label for="<?php echo $this->get_field_id('avatar') ?>">
			Upload an image<br/>
			<?php echo aq_field_upload('avatar', $block_id, $avatar) ?>
		</label>
		<?php if($avatar) { ?>
		<div class="screenshot">
			<img src="<?php echo $avatar ?>" />
		</div>
		<?php } ?>
	</div>
	

	<p class="description">
		<label for="<?php echo $this->get_field_id('bio') ?>">
			Member info
			<?php echo aq_field_textarea('bio', $block_id, $bio, $size = 'full') ?>
		</label>
	</p>

	<p class="description half">
		<label for="<?php echo $this->get_field_id('twitter') ?>">
			Twitter URL<br/>
			<?php echo aq_field_input('twitter', $block_id, $twitter) ?>
		</label>
	</p>

	<p class="description half last">
		<label for="<?php echo $this->get_field_id('facebook') ?>">
			FAcebook URL<br/>
			<?php echo aq_field_input('facebook', $block_id, $facebook) ?>
		</label>
	</p>

	<p class="description half">
		<label for="<?php echo $this->get_field_id('linkedin') ?>">
			Linkedin URL<br/>
			<?php echo aq_field_input('linkedin', $block_id, $linkedin) ?>
		</label>
	</p>

	<p class="description half last">
		<label for="<?php echo $this->get_field_id('google') ?>">
			Google URL<br/>
			<?php echo aq_field_input('google', $block_id, $google) ?>
		</label>
	</p>
	
	<p class="description half last">
		<label for="<?php echo $this->get_field_id('dribble') ?>">
			Dribble URL<br/>
			<?php echo aq_field_input('dribble', $block_id, $dribble) ?>
		</label>
	</p>

	<p class="description half last">
		<label for="<?php echo $this->get_field_id('vimeo') ?>">
			Vimeo URL<br/>
			<?php echo aq_field_input('vimeo', $block_id, $vimeo) ?>
		</label>
	</p>

	<p class="description half last">
		<label for="<?php echo $this->get_field_id('mail') ?>">
			Mail URL<br/>
			<?php echo aq_field_input('mail', $block_id, $mail) ?>
		</label>
	</p>	
	<?php

	
}
	
	function block($instance) {
		
	
		// default key/values array
		$defaults = array(
			'title' 	=> '', // the name of the member
			'position'	=> '', // job position
			'avatar'	=> '', // profile picture
			'bio'		=> '', // a little info about the member
			'url'		=> '', // website URL
			'twitter' 	=> '', // twitter URL
			'facebook'	=> '', // facebook URL
			'vimeo'	=> '', // vimeo URL
			'dribble'	=> '', // dribble URL
			'mail'	=> '', // mail URL				
		);

		// set default values (if not yet defined)
		$instance = wp_parse_args($instance, $defaults);

		// import each array key as variable with defined values
		extract($instance);




			$text = '<div class="team-wrapper"><div class="team">
					
					<div class="image"><img src="'. $avatar .'"></div>
					
					<div class="title">'. strip_tags($title) .'</div>

					<div class="role">'. strip_tags($position) .'</div>
					
					<p class="description">'. $bio .'</p>

					<div class="social">'. socialLinkTeam($facebook,$twitter,$vimeo,$dribble,$mail) .'</div>


			</div></div>';
			
			echo wpautop(do_shortcode(htmlspecialchars_decode($text))); 
	}
	
}