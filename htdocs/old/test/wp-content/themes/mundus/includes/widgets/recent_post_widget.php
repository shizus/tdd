<?php
/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'recent_post_widget' );

function pmc_recent_excerpt_length( $length ) {
	return 10;
}
		
add_filter( 'excerpt_length', 'pmc_recent_excerpt_length', 999 );

/* Function that registers our widget. */
function recent_post_widget() {
	register_widget( 'recent_posts' );
}

class recent_posts extends WP_Widget {
	function recent_posts() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'recent_posts', 'description' => 'Displays the post image and title.'.'wp-mundus' );



		/* Create the widget. */
		$this->WP_Widget( 'recent_posts-widget', __('Mundus - Premium Recent Posts', 'wp-mundus'), $widget_ops, '' );
	}

	function widget( $args, $instance ) {
		global $pmc_data;
		extract( $args );

		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );


		// to sure the number of posts displayed isn't negative or more than 10
		if ( !$number = (int) $instance['number'] )
			$number = 5;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 10 )
			$number = 10;
		
		//the query that will get post from a specific category. 
		//Wr slug the category because you actualy need the slug and not the name
		$pc = new WP_Query(array('orderby'=>'date','post_type' => 'post' , 'showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1 ,'tax_query' => array(
                    array(
                        'taxonomy' => 'post_format',
                        'field' => 'slug',
                        'terms' => array('post-format-link'),
                        'operator' => 'NOT IN'
                    )
                )));
		
		//display the posts title as a link
		if ($pc->have_posts()) : 
			echo $before_widget; 
		
				if ( $title ) echo $before_title . $title . $after_title; 
		?>
		

		
		<?php  while ($pc->have_posts()) : $pc->the_post();  ?>

			
		<div class="widgett">		
    <?php
			$image=$comment_0=$comment_1=$comment_2= '';
			if ( has_post_thumbnail() ){
				$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'widget', false);
				$image = $image[0];}	
		
		
	?>			<div class="imgholder">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
						<?php if (has_post_thumbnail( get_the_ID() )) echo '<img src = '.$image.' alt = "'.esc_attr(get_the_title() ? get_the_title() : get_the_ID()).'"  > ' ;?>	
					</a>
				</div>
				<div class="wttitle"><h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php $title = the_title('','',FALSE);  echo substr($title, 0, 40);  ?></a></h4></div>
		</div>	

			
		<?php endwhile; ?>

		

		
		
	<?php
			wp_reset_query();  // Restore global post data stomped by the_post().
			endif;

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = $new_instance['number'];
		
		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Recent Posts', 'number' => 5);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'wp-mundus') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of posts to show:', 'wp-mundus') ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
			<br /><small>(at most 10)</small>
		</p>

		<?php
	}

	function slug($string)
	{
		$slug = trim($string);
		$slug= preg_replace('/[^a-zA-Z0-9 -]/','', $slug); // only take alphanumerical characters, but keep the spaces and dashes too...
		$slug= str_replace(' ','-', $slug); // replace spaces by dashes
		$slug= strtolower($slug); // make it lowercase
		return $slug;
	}

}

?>