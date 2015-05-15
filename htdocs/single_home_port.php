<?php
include('MySQL.php');
$MySQL = MySQL::getInstance();
$id = $_POST['id'];
$sql = 'SELECT portfolio_items.*, portfolio_categorias.tipo_proyecto FROM portfolio_items INNER JOIN portfolio_categorias ON portfolio_categorias.id = portfolio_items.categoria_id WHERE portfolio_items.id = '.$id;
$MySQL->setQuery($sql);
$item = $MySQL->loadObject();

$sql = 'SELECT * FROM portfolio_item_image WHERE item_id = '.$id;
$MySQL->setQuery($sql);
$fotos = $MySQL->loadObjectList();
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
	
		
	<div class="content fullwidth">

		<div class="blogpost postcontent port" >
			<div class="projectdetails">	
						<div class="blogsingleimage">	
								<div id="sliderHome" class="slider">
													
														<?php
											$i = 0;
											foreach($fotos as $foto) { ?>
													<div class="panel">
														<img class="check" src="portfolio/<?php echo $item->id.'/'.$foto->image; ?>">				
																
													</div>
														
														<?php
													$i++; } ?>						
								
								</div>
								<?php if($i > 1){ ?>
								<div class="prevbutton slidebackward port"><i class="icon-angle-left"></i></div>
								<div class="nextbutton slideforward port"><i class="icon-angle-right"></i></div>
								<?php } ?>
															  						
						</div>	
						
					<div class="bottomborder"></div>
			</div>
			<div class="projectdescription">
				<div class="datecomment">
					<p><i class="icon-customer"></i>CLIENTE:<span class="author port"> <?php echo $item->cliente; ?></span><br></p>
						
				</div>	
						
				<div class="posttext"> 
					<div>
					<p>
					<?php if($item->expo!=''){ ?><i class="icon-expo"></i>EXPO: <span><?php echo $item->expo; ?></span><br><?php } ?>
					<?php if($item->lugar!=''){ ?><i class="icon-place"></i>LUGAR: <span><?php echo $item->lugar; ?></span><br><?php } ?>
					<?php if($item->categoria_id>0){ ?><i class="icon-proyect"></i>PROYECTO: <span><?php echo $item->tipo_proyecto; ?></span><br><?php } ?>
					</p>
						
					</div>	
				</div>	
				
				<div class="single-portfolio-skils">
					<ul>
					<?php if($item->disenio==1){ ?><li><i class="icon-ok-sign"></i>DISEÑO</li><?php } ?>
					<?php if($item->construccion==1){ ?><li><i class="icon-ok-sign"></i>CONSTRUCCIÓN</li><?php } ?>
					<?php if($item->instalacion==1){ ?><li><i class="icon-ok-sign"></i>INSTALACIÓN</li><?php } ?>
					</ul>				</div>		
			</div>
				
		</div>						
	</div>	

	
					
		

	</div>

</div>
	
