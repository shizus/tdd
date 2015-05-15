<?php


/*portfolio loop*/
function pmc_portfolio($portSize, $item, $post = 'port' ,$number = 0,$cat = '',$port_ajax){
	wp_enqueue_script('pmc_isotope');
	wp_enqueue_script('pmc_any');
	wp_enqueue_script('pmc_any_fx');
	wp_enqueue_script('pmc_any_video');			
	global $pmc_data; 
	$categport = '';
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	if($number != 0)
		$showposts = $number;
			

	$postT = $pmc_data['port_slug'];
	$postC = 'portfoliocategory';

		
	if($cat != ''){	
			$args = array(
			'tax_query' => array(array('taxonomy' => $postC,'field' => 'id','terms' => $cat)),
			'showposts'     => $showposts,
			'post_type' => $postT,
			'paged'    => $paged
			);
		}
	else{
			$args = array(
			'showposts'     => $showposts,
			'post_type' => $postT,
			'paged'    => $paged
			);
		}

	query_posts( $args );

	
	$currentindex = $linkPost = '';
	$currentindex = '';
	$count = 1;
	$countitem = 1;?>
	<div class="homerecent">
	<div class="homerecentInner">
	<div id = "showpost-<?php echo $pmc_data['port_slug'] ?>">
		<div class="showpostload"><div class="loading"></div></div>
		<div class = "closehomeshow-<?php echo $pmc_data['port_slug'] ?> port closeajax"><i class="icon-remove"></i></div>
		<div class="showpostpostcontent"></div>
	</div>	
	<div class="portfolio">	
		<div id="portitems4">
			<?php
			while ( have_posts() ) : the_post();
				if($post == 'post')
					$postmeta = get_post_custom(get_the_ID()); 
				$do_not_duplicate = get_the_ID(); 
				if ( has_post_thumbnail() ){
					$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'homePort', false);
					$image = $image[0];
					
					$imagefull = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
					$imagefull = $imagefull[0];			
					}
				$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', false);
				$entrycategory = get_the_term_list( get_the_ID(), $postC, '', ',', '' );
				$catstring = $entrycategory;
				$catstring = strip_tags($catstring);
				$catidlist = explode(",", $catstring);
				$catlist = '';
				for($i = 0; $i < sizeof($catidlist); ++$i){
					$catidlist[$i].=$currentindex;
					$find =     array("&", "/", " ","amp;","&#38;");
					$replace  = array("", "", "", "","");			
					$catlist .= str_replace($find,$replace,$catidlist[$i]). ' ';
					
				}

				$categoryIn = get_the_term_list( get_the_ID(), $postC, '', ', ', '' );	
				$category = explode(',',$categoryIn);	
				if ( has_post_format( 'link' , get_the_ID()) and $post == 'post') {
					if(isset($postmeta["link_post_url"][0] )) $linkPost = $postmeta["link_post_url"][0];
					}
				else{
					if (function_exists('icl_object_id')) 
						$linkPost = get_permalink(icl_object_id(get_the_ID(), $pmc_data['port_slug'], true, true));
					else 
						$linkPost = get_permalink();
				}		

				
				if($count != 4){
					echo '<div class="one_fourth item'.$item.' '.$catlist .'" data-category="'. $catlist.'" >';
				}
				else{
					echo '<div class="one_fourth last item'.$item.' '.$catlist .'" data-category="'. $catlist.'" >';
					$count = 0;
				}
				
				?>
						<?php if ($port_ajax == 'true'){ ?>
						<div class="click" id="<?php echo $pmc_data['port_slug'] ?>_<?php echo get_the_id() ?>">
						<?php } ?>
							<?php if ($port_ajax != 'true'){ ?>
							<?php if (isset($imagefull)){ ?>
								<a href = "<?php echo $imagefull ?>" title="<?php echo esc_attr(  get_the_title(get_the_id()) ) ?>" rel="lightbox" >
							<?php }} ?>	
							<div class="recentimage">
									<div class="overdefult">
									</div>			
								<div class="image">
									<div class="loading"></div>
									<?php if (isset($image)){ ?>
										<img class="portfolio-home-image" src="<?php echo $image ?>" alt="<?php the_title(); ?>">
									<?php } else  { ?>	
										<img class="portfolio-home-image" src="<?php echo get_template_directory_uri() ?>/images/placeholder-portfolio-home.png" alt="<?php the_title(); ?>">
									<?php } ?>	
								</div>
							</div>
							<?php if ($port_ajax != 'true'){ ?>
								</a>
							<?php } ?>						
							<div class="recentdescription">
								<h3><?php $title = the_title('','',FALSE);  echo substr($title, 0, 23);  if(strlen($title) > 23) echo '...'?></h3>
								<div class="home-portfolio-categories"><?php echo get_the_term_list( get_the_ID(), 'portfoliocategory', '', ', ', '' ); ?></div>
							</div>
						<?php if ($port_ajax == 'true'){ ?>	
						</div>
						<?php } ?>
					</div>
				<?php 
				$count++;		

				

			endwhile; 	?>
			</div>
		</div>
	</div>
	</div>
	<?php
}


/* function for portfolio block*/
function pmc_portBlock($title,$number_post,$rowsB,$categories,$port_ajax,$id){
	wp_enqueue_script('pmc_bxSlider');		
	global $pmc_data;
	if(isset($pmc_data['home_recent_number_post'])){
		$showpost = $pmc_data['home_recent_number_post'] ;}
	else{
		$showpost = 3;}
		
	if($number_post){
		$showpost = $number_post  ;}		

	if($title) {
		$title = $title;
	}
	else {
		$title = pmc_stripText($pmc_data['translation_port']);
	}
		
	if(isset($pmc_data['home_recent_number_display']))
		$rows = $pmc_data['home_recent_number_display'];
	else
		$rows = 3;
		
	if($rowsB){
		$rows = $rowsB;
	}	
	
	if($categories)
		$categories = $categories;
	else
		$categories='';
		


		$pc = new WP_Query(array('post_type' => $pmc_data['port_slug'],
                'tax_query' => array( 
                     array (
                      'taxonomy' => 'portfoliocategory',
                      'field' => 'id',
                      'terms' => $categories
                     ), 
                 ),
                'posts_per_page' => $number_post)
             );
?>

	<script type="text/javascript">


		jQuery(document).ready(function(){	  


		// Slider
		var $slider = jQuery('#sliderAdvertisePort').bxSlider({
			controls: true,
			displaySlideQty: 1,
			default: 1000,
			easing : 'easeInOutQuint',
			prevText : '',
			nextText : '',
			pager :false
			
		});



		 });
	</script>
	
<?php 	if ($pc->have_posts()) :
	wp_enqueue_script('pmc_any');
	wp_enqueue_script('pmc_any_fx');
	wp_enqueue_script('pmc_any_video');	?>
<div class="homerecent">
	<div class="homerecentInner">
	<div id = "showpost-<?php echo $pmc_data['port_slug'] ?>">
		<div class="showpostload"><div class="loading"></div></div>
		<div class = "closehomeshow-<?php echo $pmc_data['port_slug'] ?> port closeajax"><i class="icon-remove"></i></div>
		<div class="showpostpostcontent"></div>
	</div>	
	<div class="titlebordrtext"><h2 id = "<?php echo $id ?>" class="titleborderh2"><?php echo $title ?></h2></div>	
	<div class="titleborderOut"><div class="titleborder"></div></div>	
	<ul id="sliderAdvertisePort" class="sliderAdvertisePort">
		<?php
		$currentindex = '';
		$count = 1;
		$countitem = 1;
		$type = $pmc_data['port_slug'];
		?>
		<?php  while ($pc->have_posts()) : $pc->the_post();
		if($countitem == 1){
			echo '<li>';}			
		$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'homePort', false);	
		$catType= 'portfoliocategory';
		
		//category
		$categoryIn = get_the_term_list( get_the_ID(), $catType, '', ', ', '' );	
		$category = explode(',',$categoryIn);	
		//end category			
		if ( has_post_thumbnail() ){
			$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'homePort', false);
			$image = $image[0];
			
			$imagefull = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
			$imagefull = $imagefull[0];			
			}

	
		if($count != 4){
			echo '<div class="one_fourth" >';
		}
		else{
			echo '<div class="one_fourth last" >';
			$count = 0;
		}
		
		?>
				<?php if ($port_ajax == 'true'){ ?>
				<div class="click" id="<?php echo $type ?>_<?php echo get_the_id() ?>">
				<?php } ?>
					<?php if ($port_ajax != 'true'){ ?>
					<?php if (isset($imagefull)){ ?>
						<a href = "<?php echo $imagefull ?>" title="<?php echo esc_attr(  get_the_title(get_the_id()) ) ?>" rel="lightbox" >
					<?php }} ?>	
					<div class="recentimage">
							<div class="overdefult">
							</div>			
						<div class="image">
							<div class="loading"></div>
							<?php if (isset($image)){ ?>
								<img class="portfolio-home-image" src="<?php echo $image ?>" alt="<?php the_title(); ?>">
							<?php } else  { ?>	
								<img class="portfolio-home-image" src="<?php echo get_template_directory_uri() ?>/images/placeholder-portfolio-home.png" alt="<?php the_title(); ?>">
							<?php } ?>	
						</div>
					</div>
					<?php if ($port_ajax != 'true'){ ?>
						</a>
					<?php } ?>						
					<div class="recentdescription">
						<h3><?php $title = the_title('','',FALSE);  echo substr($title, 0, 23);  if(strlen($title) > 23) echo '...'?></h3>
						<div class="home-portfolio-categories"><?php echo get_the_term_list( get_the_ID(), 'portfoliocategory', '', ', ', '' ); ?></div>
					</div>
				<?php if ($port_ajax == 'true'){ ?>	
				</div>
				<?php } ?>
			</div>
		<?php 
		$count++;
		
		 if($countitem == $rows){ 
			$countitem = 0; ?>
			</li>
		<?php } 
		$countitem++;
		endwhile; 
		wp_reset_query(); ?>
		</ul>
	</div>
</div>
<?php  endif; ?>

<div class="clear"></div>

<?php

}

/* function for advertise block */
function pmc_advertiseBlock($title){

	global $pmc_data; 
	wp_enqueue_script('pmc_bxSlider');		
	if($title) {
		$title = $title;
	}
	else {
		$title = '';
	}	
	?>
	<script type="text/javascript">


		jQuery(document).ready(function(){	  


		<?php if(count($pmc_data['advertiseimage'])> 5) { ?>
		// Slider
		var $slider = jQuery('.sliderAdvertise').bxSlider({
			maxSlides:5,
			minSlides:1,
			moveSlides:1,
			prevText : '',
			nextText : '',
			auto : true,
			easing : 'easeInOutQuint',
			pause : 4000,
			pager :false,
			controls: true,
		});

		<?php } ?> 

		 });
	</script>
	
	<div class="advertise">
		<div class="advertiseInner">
			<?php if($title != '') { ?>
			<div class="titlebordrtext"><h2 class="titleborderh2"><?php echo $title ?></h2></div>	
			<div class="titleborderOut"><div class="titleborder"></div></div>
			<?php } ?>
			<?php 
			if(isset($pmc_data['advertiseimage'])){
				$slides = $pmc_data['advertiseimage']; ?>
				<ul class="sliderAdvertise">
				<?php foreach ($slides as $slide) {  ?>
					<li>
					<?php
					  if($slide['url'] != '') :
							   
						 if($slide['link'] != '') : ?>
						   <a href="<?php echo $slide['link']; ?>"><img src="<?php echo $slide['url']; ?>" alt="<?php echo $slide['title'] ?>" /></a>
						<?php else: ?>
							<img src="<?php echo $slide['url']; ?>" alt="<?php echo $slide['title'] ?>"/>
						<?php endif; ?>
								
					<?php endif; ?>
					</li>
				<?php } ?>
				</ul>
			<?php } ?>	
		</div>
	</div>
	<?php
}

?>