<?php
header('Content-Type: text/html; charset=utf-8');
	ob_start();

	define('AWP_AJAXED', true);

	define('AWP_ID', $id);



    $root = dirname(dirname(dirname(dirname(__FILE__))));

      if (file_exists($root.'/wp-load.php')) {

          // WP 2.6

          require_once($root.'/wp-load.php');




      } else {

          // Before 2.6

          require_once($root.'/wp-config.php');


				



      }





	ob_end_clean();

	global $wpdb;

	$pc = new WP_Query(array('p' => $_POST['id'] ,'post_type'=>$_POST['type'])); 
	

	?>

<script type="text/javascript">
jQuery(document).ready(function(){
	    jQuery('#sliderHome').anythingSlider({
		hashTags : false,
		expand		: true,
		autoPlay	: true,
		resizeContents  : false,
		pauseOnHover    : true,
		buildArrows     : false,
		buildNavigation : false,
		delay		: 5000,
		resumeDelay	: 0,
		animationTime	: 500,
		delayBeforeAnimate:0,	
		easing : 'easeInOutQuint'/*,
		onSlideBegin    : function(e, slider) {
				jQuery('.nextbutton').fadeOut();
				jQuery('.prevbutton').fadeOut();
		
		},
		onSlideComplete    : function(slider) {
			jQuery('.nextbutton').fadeIn();
			jQuery('.prevbutton').fadeIn();
		
		}	*/	
	    })

	    /*
	    jQuery('.blogsingleimage').hover(function() {
		jQuery(".slideforward").stop(true, true).fadeIn();
		jQuery(".slidebackward").stop(true, true).fadeIn();
	    }, function() {
		jQuery(".slideforward").fadeOut();
		jQuery(".slidebackward").fadeOut();
	    });
		*/
	    jQuery(".slideforward").click(function(){
		jQuery('#sliderHome').data('AnythingSlider').goForward();
	    });
	    jQuery(".slidebackward").click(function(){
		jQuery('#sliderHome').data('AnythingSlider').goBack();
	    });  
	});
	
</script>		

<div class="mainwrap">
	<div class="main clearfix portsingle home">
	
	<?php if ($pc -> have_posts()) : while ($pc ->have_posts()) : $pc ->the_post(); ?>
	<?php  $portfolio = get_post_custom($post->ID); ?>

	<div class="content fullwidth">

		<div class="blogpost postcontent port" >
			<div class="projectdetails">	
						<div class="blogsingleimage">	
						<?php 
							$args = array(
								'post_type' => 'attachment',
								'numberposts' => null,
								'post_status' => null,
								'post_parent' => $post->ID,
								'orderby' => 'menu_order ID',
							);
							$attachments = get_posts($args);
							if ($attachments) {?>
								<div id="sliderHome" class="slider">
										<?php
											$i = 0;
											foreach ($attachments as $attachment) {
												//echo apply_filters('the_title', $attachment->post_title);
												$image =  wp_get_attachment_image_src( $attachment->ID, 'sinbgleport' ); ?>	
													<div>
														<img class="check" src="<?php echo $image[0] ?>" />				
																
													</div>
													
													<?php 
													$i++;
													} ?>
							
									
								</div>
								<?php if($i > 1){ ?>
								<div class="prevbutton slidebackward port"><i class="icon-angle-left"></i></div>
								<div class="nextbutton slideforward port"><i class="icon-angle-right"></i></div>
								<?php } ?>
							  <?php } else { ?>
								<a href="<?php echo $image ?>" rel="lightbox[port]" title="<?php the_title(); ?>"><?php pmc_getImage('sinbgleport'); ?></a>
							  <?php } ?>
						
						</div>	
						
					<div class="bottomborder"></div>
			</div>
			<div class="projectdescription">
				<div class="datecomment">
					<p><!--
						<?php if($portfolio['detail_active'][0]) {
							if($portfolio['detail_active'][0]) { ?>
							  <i class=" icon-link"></i><?php echo pmc_translation('port_project_url','Project URL: '); ?> <span class="link"><a target="_blank" href="http://<?php echo $portfolio['website_url'][0] ?>" title="project url"><?php echo $portfolio['website_url'][0] ?></a></span>  </br>
						<?php } else { ?>
							   <i class=" icon-link"></i><?php echo pmc_translation('port_project_url','Project URL: ');  ?> <span class="link"><a title="project url"><?php echo $portfolio['website_url'][0] ?></a></span> 
						<?php }  ?>	
						<?php } ?>
						<?php if($portfolio['author'][0] !='') {?>
							<i class="icon-user"></i><?php echo pmc_translation('port_project_designer','Project designer: ');  ?><span class="authorp port"><?php echo $portfolio['author'][0] ?></span><br>
						<?php } ?>
						<?php if($portfolio['date'][0] !='') {?>
							<i class="icon-calendar"></i><?php echo pmc_translation('port_project_date','Date of completion: ');  ?><span class="posted-date port"><?php echo $portfolio['date'][0] ?></span><br>
						<?php } ?>-->
						<?php if($portfolio['customer'][0] !='') {?>
							<i class="icon-customer"></i>CLIENTE:<span class="author port"> <?php echo $portfolio['customer'][0] ?></span><br>
						<?php } ?>								
					</p>
						
				</div>	
						
				<div class="posttext"> 
					<div>
					<p>
					<?php if($portfolio['website_url'][0] !='') {?><i class="icon-expo"></i>EXPO: <span><?php echo $portfolio['website_url'][0] ?></span><br><?php }?>
					<?php if($portfolio['author'][0] !='') {?><i class="icon-place"></i>LUGAR: <span><?php echo $portfolio['author'][0] ?></span><br><?php }?>
					<?php if($portfolio['status'][0] !='') {?><i class="icon-proyect"></i>PROYECTO: <span><?php echo $portfolio['status'][0] ?></span><br><?php }?>
					</p>
					<?php  the_content(); ?>	
					</div>	
				</div>	
				
				<div class="single-portfolio-skils">
					<?php
					if(isset($portfolio['skils'][0])){
					echo '<ul>';
					foreach(explode("\n", $portfolio['skils'][0]) as $line) {
						echo '<li><i class="icon-ok-sign"></i>'.$line.'</li>';
					} 
					echo '</ul>';
					}?>
				</div>		
			</div>
				
		</div>						
	</div>	

	
					
	<?php endwhile; endif; ?>
	

	</div>

</div>
	
<script type="text/javascript" charset="utf-8">
 jQuery(document).ready(function(){
    jQuery("a[rel^='lightbox']").prettyPhoto({theme:'light_rounded',overlay_gallery: false,show_title: false});
  });
</script>