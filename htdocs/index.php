git<?php
include('MySQL.php');
$MySQL = MySQL::getInstance();
$sql = 'SELECT portfolio_items.*, portfolio_categorias.tipo_proyecto FROM portfolio_items INNER JOIN portfolio_categorias ON portfolio_categorias.id = portfolio_items.categoria_id';
$MySQL->setQuery($sql);
$items = $MySQL->loadObjectList();

function listarCategorias($id){
$MySQL = MySQL::getInstance();
	$sql = 'SELECT portfolio_categorias.* FROM portfolio_item_categoria INNER JOIN portfolio_categorias ON portfolio_categorias.id = portfolio_item_categoria.categoria_id WHERE item_id = '.$id;
	$MySQL->setQuery($sql);
	$categorias = $MySQL->loadObjectList();
	$listCat = array();
	foreach($categorias as $categoria){
		$listCat[] = $categoria->slug;
	}
	return implode(' ',$listCat);
}
function traerFoto($id){
$MySQL = MySQL::getInstance();
	$sql = 'SELECT * FROM portfolio_item_image WHERE item_id = '.$id.' ORDER BY `order` ASC LIMIT 1';
	$MySQL->setQuery($sql);
	$foto = $MySQL->loadObject();
	return $foto->image;
}
?>
<!DOCTYPE html>
<html lang="en-US" class="no-js" >
<!-- start -->
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="format-detection" content="telephone=no">

	<!-- set faviocn-->
		
	<!-- set title of the page -->
	<title>
	Taller de Dise�o | desarrollo &amp; producci�n	</title>
		
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="icon" type="image/png" href="uploads/2014/05/favicon.png">

		
	<!-- add google analytics code -->
		<meta name="robots" content="index, follow">
<link rel='stylesheet' id='rs-captions-css'  href='revslider/rs-plugin/css/dynamic-captions.css?rev=4.1.4&#038;ver=3.8.4' type='text/css' media='all' />
<link rel='stylesheet' id='rs-plugin-static-css'  href='revslider/rs-plugin/css/static-captions.css?rev=4.1.4&#038;ver=3.8.4' type='text/css' media='all' />
<link rel='stylesheet' id='googleFont-css'  href='http://fonts.googleapis.com/css?family=Oswald' type='text/css' media='all' />
<link rel='stylesheet' id='googleFontbody-css'  href='http://fonts.googleapis.com/css?family=Yanone%20Kaffeesatz:300' type='text/css' media='all' />

<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel="stylesheet" type="text/css" media="all" />
<link href="http://fonts.googleapis.com/css?family=Dancing+Script:700" rel="stylesheet" type="text/css" media="all" />
<link href="http://fonts.googleapis.com/css?family=Michroma" rel="stylesheet" type="text/css" media="all" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet" type="text/css" media="all" />


<link rel='stylesheet' id='font-awesome_pms-css'  href='css/font-awesome.css' type='text/css' media='all' />
<link rel='stylesheet' id='rs-settings-css'  href='revslider/rs-plugin/css/settings.css?rev=4.1.4&#038;ver=3.8.4' type='text/css' media='all' />
<link rel='stylesheet' id='aqpb-view-css-css'  href='css/aqpb-view.css?ver=1413246697' type='text/css' media='all' />
<link rel='stylesheet' id='contact-form-7-css'  href='css/styles-cf7.css' type='text/css' media='all' />
<link rel='stylesheet' id='ui_style-css'  href='css/jquery-ui-1.10.3.custom.min.css?ver=3.8.4' type='text/css' media='all' />
<link rel='stylesheet' id='shortcode-css'  href='css/shortcode_styles.css?ver=3.8.4' type='text/css' media='all' />
<link rel='stylesheet' id='prettyp-css'  href='css/prettyPhoto.css?ver=3.8.4' type='text/css' media='all' />
<link rel='stylesheet' id='animated-css-css'  href='css/animate.min.css?ver=3.8.4' type='text/css' media='all' />
<link rel='stylesheet' id='main-css'  href='css/style.css?ver=3.8.4' type='text/css' media='all' />
<link rel='stylesheet' id='options-css'  href='css/options.css?ver=3.8.4' type='text/css' media='all' />

<script type='text/javascript' src='js/jquery/jquery-1.11.0.min.js'></script>
<script type='text/javascript' src='js/jquery/jquery-migrate.min.js?ver=1.2.1'></script>
<script type='text/javascript' src='js/jquery-ui-1.10.3.custom.min.js?ver=3.8.4'></script>
<script type='text/javascript' src='js/jquery.themepunch.plugins.min.js?rev=4.1.4&#038;ver=3.8.4'></script>
<script type='text/javascript' src='js/jquery.themepunch.revolution.min.js?rev=4.1.4&#038;ver=3.8.4'></script>

<script src="js/jquery.cycle.all.js"></script>	

<link rel="stylesheet" type="text/css" href="css/font/MyFontsWebfontsKit.css"/>
</head>		
<!-- start body -->
<body class="home page page-id-7694 page-template page-template-template-fullwidth-php">
	<!-- start header -->
	<header>
		<div id="headerwrap" >
			<!-- logo and main menu -->
			<div id="header">		
				<div id="logo">
					<a href="."><img src="uploads/2014/05/logo.png" alt="Taller de Dise�o - desarrollo &amp; producci�n" /></a>
				</div>
				<!-- respoonsive menu main-->
				<div class="respMenu noscroll">
					<select name="url_list" class="event-type-selector-dropdown" onchange="gotosite(this)"><option value="" selected="selected" disabled="disabled">Seleccione...</option><option  value="#about">NOSOTROS</option>
<option  value="#concepto">POR QU� TDD</option>
<option  value="#metodologia">METODOLOG�A </option>
<option  value="#servicios">SERVICIOS</option>
<option  value="#portfolio">PORTFOLIO </option>
<option  value="#news">NOVEDADES</option>
<option  value="#contact">CONTACTO</option>
</select>	
				</div>	
				<!-- main menu -->
				<div class="pagenav">
										<div class="pagenav home"> <ul id="menu-menu-principal-3" class="menu"><li id="menu-item-8833-7769" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#about"><strong>NOSOTROS</strong></a></li>
<li id="menu-item-9152-7786" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#concepto"><strong>POR QU� TDD</strong></a></li>
<li id="menu-item-4218-7752" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#metodologia"><strong>METODOLOG�A</strong></a></li>
<li id="menu-item-3257-7787" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#servicios"><strong>SERVICIOS</strong></a></li>
<li id="menu-item-4997-7788" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#portfolio"><strong>PORTFOLIO</strong></a></li>
<li id="menu-item-7147-7789" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#news"><strong>NOVEDADES</strong></a></li>
<li id="menu-item-6391-7790" class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#contact"><strong>CONTACTO</strong></a></li>
</ul>					</div> 
				</div>	
			</div>
		</div>			
	</header>
	
	
	<div class="usercontent"><div id="aq-template-wrapper-8219" class="aq-template-wrapper aq_row"><div id="aq-block-8219-1" class="aq-block aq-block-aq_slider_block_revolutionslider aq_span12 aq-first cf"><!-- START REVOLUTION SLIDER 4.1.4 fullwidth mode -->
<div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="max-height:800px;height:800px;">
	<div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;max-height:800px;height:800px;">
<ul>	<!-- SLIDE  -->
	<li data-transition="fade" data-slotamount="7" data-masterspeed="900" data-delay="7000" >
		<!-- MAIN IMAGE -->
		<img src="images/dummy.png"  alt="01_home_6" data-lazyload="images/slider/home_01.jpg" data-bgposition="center top" data-bgfit="contain" data-bgrepeat="no-repeat">
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		<div class="tp-caption big_title_framed sft"
			data-x="center" data-hoffset="0"
			data-y="80" 
			data-speed="1500"
			data-start="1500"
			data-easing="easeOutBack"
			data-endspeed="300"
			style="z-index: 2">TALLER DE DISE�O
		</div>

		<!-- LAYER NR. 2 -->
		<div class="tp-caption handwriting sft"
			data-x="center" data-hoffset="0"
			data-y="227" 
			data-speed="1500"
			data-start="2500"
			data-easing="easeOutBack"
			data-endspeed="300"
			style="z-index: 3">Stand, Pop & Retail
		</div>

		<!-- LAYER NR. 3 -->
		<div class="tp-caption sft"
			data-x="center" data-hoffset="0"
			data-y="295" 
			data-speed="1500"
			data-start="2800"
			data-easing="easeOutBack"
			data-endspeed="300"
			style="z-index: 4"><img src="uploads/2013/12/line-separator-slideshow.png" alt="">
		</div>

		<!-- LAYER NR. 4 -->
		<div class="tp-caption black_bg sfl"
			data-x="center" data-hoffset="0"
			data-y="370" 
			data-speed="1500"
			data-start="3800"
			data-easing="easeOutBack"
			data-endspeed="300"
			style="z-index: 5">CREAMOS ESPACIOS E IDEAS
		</div>

		<!-- LAYER NR. 5 -->
		<div class="tp-caption sub_bg_black sfr"
			data-x="center" data-hoffset="0"
			data-y="445" 
			data-speed="1500"
			data-start="4000"
			data-easing="easeOutBack"
			data-endspeed="300"
			style="z-index: 6">LIGADOS AL CONCEPTO DE UNA MARCA
		</div>

		<!-- LAYER NR. 6 -->
		<div class="tp-caption mundus_button tp-fade fadeout"
			data-x="center" data-hoffset="0"
			data-y="580" 
			data-speed="1000"
			data-start="4400"
			data-easing="easeInCirc"
			data-endspeed="300"
			style="z-index: 7"><a href = "#about">M�S SOBRE NOSOTROS</a>
		</div>
	</li>
	<!-- SLIDE  -->
	<li data-transition="fade" data-slotamount="7" data-masterspeed="900" >
		<!-- MAIN IMAGE -->
		<img src="images/dummy.png"  alt="01_home_1a" data-lazyload="images/slider/home_02.jpg" data-bgposition="center top" data-bgfit="contain" data-bgrepeat="no-repeat">
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		<div class="tp-caption big_title_framed_2 sft"
			data-x="center" data-hoffset="0"
			data-y="80" 
			data-speed="1200"
			data-start="1500"
			data-easing="easeOutBack"
			data-endspeed="300"
			style="z-index: 2">EXPERIENCIA
		</div>

		<!-- LAYER NR. 2 -->
		<div class="tp-caption black_bg_2 sfl"
			data-x="center" data-hoffset="0"
			data-y="370" 
			data-speed="1200"
			data-start="2500"
			data-easing="easeOutBack"
			data-endspeed="300"
			style="z-index: 3">CONTAMOS CON<br>
MAS DE 30.000 m�<br>
DE STANDS CONSTRUIDOS
		</div>
	</li>
	<!-- SLIDE  -->
	<li data-transition="fade" data-slotamount="7" data-masterspeed="900" >
		<!-- MAIN IMAGE -->
		<img src="images/dummy.png"  alt="01_home_5" data-lazyload="images/slider/home_03.jpg" data-bgposition="center top" data-bgfit="contain" data-bgrepeat="no-repeat">
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		<div class="tp-caption big_title_framed_2 sft"
			data-x="center" data-hoffset="0"
			data-y="80" 
			data-speed="1200"
			data-start="500"
			data-easing="easeOutBack"
			data-endspeed="300"
			style="z-index: 2">DESARROLLO
		</div>

		<!-- LAYER NR. 2 -->
		<div class="tp-caption black_bg_2 sfl"
			data-x="center" data-hoffset="0"
			data-y="370" 
			data-speed="1200"
			data-start="900"
			data-easing="easeOutBack"
			data-endspeed="300"
			style="z-index: 3">DETECTAMOS NECESIDADES<br>
GENERAMOS IDEAS<br>
MATERIALIZAMOS PROYECTOS
		</div>
	</li>
	<!-- SLIDE  -->
	<li data-transition="fade" data-slotamount="7" data-masterspeed="900" >
		<!-- MAIN IMAGE -->
		<img src="images/dummy.png"  alt="01_home_4" data-lazyload="images/slider/home_04.jpg" data-bgposition="center top" data-bgfit="contain" data-bgrepeat="no-repeat">
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		<div class="tp-caption big_title_framed_2 sft"
			data-x="center" data-hoffset="0"
			data-y="80" 
			data-speed="800"
			data-start="500"
			data-easing="easeOutBack"
			data-endspeed="300"
			style="z-index: 2">RESPALDO
		</div>

		<!-- LAYER NR. 2 -->
		<div class="tp-caption black_bg_2 sfl"
			data-x="center" data-hoffset="0"
			data-y="370" 
			data-speed="1200"
			data-start="900"
			data-easing="easeOutBack"
			data-endspeed="300"
			style="z-index: 3">BRINDAMOS INTERRELACI�N<br>
PERMANENTE EN CADA<br>
INSTANCIA DEL PROCESO
		</div>
	</li>
	<!-- SLIDE  -->
	<li data-transition="fade" data-slotamount="7" data-masterspeed="900" >
		<!-- MAIN IMAGE -->
		<img src="images/dummy.png"  alt="01_home_2" data-lazyload="images/slider/home_05.jpg" data-bgposition="center top" data-bgfit="contain" data-bgrepeat="no-repeat">
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		<div class="tp-caption big_title_framed_2 sft"
			data-x="center" data-hoffset="0"
			data-y="80" 
			data-speed="800"
			data-start="500"
			data-easing="easeOutBack"
			data-endspeed="300"
			style="z-index: 2">SOLUCIONES
		</div>

		<!-- LAYER NR. 2 -->
		<div class="tp-caption black_bg_2 sfl"
			data-x="center" data-hoffset="0"
			data-y="370" 
			data-speed="1200"
			data-start="900"
			data-easing="easeOutBack"
			data-endspeed="300"
			style="z-index: 3">PROVEEMOS LAS <br>
HERRAMIENTAS ADECUADAS<br>
PARA OBTENER RESULTADOS
		</div>
	</li>
</ul>
<div class="tp-bannertimer tp-bottom"></div>	</div>
</div>			
			<script type="text/javascript">

				var tpj=jQuery;				
				tpj.noConflict();				
				var revapi1;
				
				tpj(document).ready(function() {
								
				if(tpj('#rev_slider_1_1').revolution == undefined)
					revslider_showDoubleJqueryError('#rev_slider_1_1');
				else
				   revapi1 = tpj('#rev_slider_1_1').show().revolution(
					{
						dottedOverlay:"none",
						delay:5000,
						startwidth:2000,
						startheight:800,
						hideThumbs:200,
						
						thumbWidth:100,
						thumbHeight:50,
						thumbAmount:5,
						
						navigationType:"bullet",
						navigationArrows:"none",
						navigationStyle:"round",
						
						touchenabled:"on",
						onHoverStop:"on",
						
						navigationHAlign:"center",
						navigationVAlign:"bottom",
						navigationHOffset:0,
						navigationVOffset:50,

						soloArrowLeftHalign:"left",
						soloArrowLeftValign:"center",
						soloArrowLeftHOffset:20,
						soloArrowLeftVOffset:0,

						soloArrowRightHalign:"right",
						soloArrowRightValign:"center",
						soloArrowRightHOffset:20,
						soloArrowRightVOffset:0,
								
						shadow:0,
						fullWidth:"on",
						fullScreen:"off",

						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,

						
						shuffle:"off",
						
						autoHeight:"on",						
						forceFullWidth:"on",						
												
												
						hideThumbsOnMobile:"off",
						hideBulletsOnMobile:"off",
						hideArrowsOnMobile:"off",
						hideThumbsUnderResolution:0,
						
						hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						startWithSlide:0,
						videoJsPath:"revslider/rs-plugin/videojs/",
						fullScreenOffsetContainer: "#header"	
					});
				
				});	//ready
				
			</script>
			
			<!-- END REVOLUTION SLIDER --></div><div id="aq-block-8219-2" class="aq-block aq-block-aq_start_content_block aq_span12 aq-first cf"><div class="mainwrap" style="background:#fff url();background-size: cover;border-top:1px solid #ededed;padding:0px 0 0px 0;">
<div class="main clearfix">
<div class="content fullwidth">
</div><div id="aq-block-8219-3" class="aq-block aq-block-aq_clear_block aq_span12 aq-first cf"><div class="cf" style="height:80px; background:#fff"></div></div><div id="aq-block-8219-4" class="aq-block aq-block-aq_quote_title_block aq_span12 aq-first cf">		<div class="infotextwrap" id="about">
			
			<div class="infotext">
			<div class="infotext-before"></div>
			<div class="infotext-title">
				<h2 style="color:#ffffff">MATERIALIZAMOS NUESTRAS IDEAS</h2>
				<div class="infotext-title-small" style="color:#ffffff"></div>
			</div>
			<div class="infotext-after"></div>
			</div>
		</div>
		</div><div id="aq-block-8219-5" class="aq-block aq-block-aq_richtext_block aq_span12 aq-first cf"><h4 class="aq-block-title">NOSOTROS</h4><p>Somos un grupo de profesionales del dise&ntilde;o que, con la idea de materializar nuestras propias ideas, creamos el Taller en 1998. Desde nuestros inicios buscamos siempre una reproducci&oacute;n fiel y de calidad sobre cada proyecto, que nos permitiera fiabilidad y una fidelidad proyecto-constructiva en cada trabajo. Nuestro&nbsp;<em>Taller de dise&ntilde;o</em>&nbsp;nos permite satisfacer la demanda creciente de los diversos clientes y adaptarnos a los acontecimientos del mercado. Por ello, para nuestro trabajo nos basamos en la calidad, credibilidad y confiabilidad como puntos de referencia.</p>
<p>Gracias a nuestra gran experiencia, nos convertimos en especialistas del desarrollo y producci&oacute;n de espacios creativos y funcionales,&nbsp;<strong>transformando las ideas en soluciones de marketing</strong>. Para lograr esto, contamos con personal altamente calificado para resolver y ejecutar instalaciones en diversas situaciones, en todo el pa&iacute;s, con procedimientos exclusivos.</p>
</div><div id="aq-block-8219-6" class="aq-block aq-block-aq_end_content_block aq_span12 aq-first cf">		</div></div>
					</div></div><div id="aq-block-8219-7" class="aq-block aq-block-aq_clear_block aq_span12 aq-first cf"><div class="cf" style="height:70px; background:#fff"></div></div><div id="aq-block-8219-8" class="aq-block aq-block-aq_start_content_block aq_span12 aq-first cf"><div class="mainwrap" style="background:#0089cf url();background-size: cover;border-top:1px solid #ededed;padding:px 0 px 0;">
<div class="main clearfix">
<div class="content fullwidth">
</div><div id="aq-block-8219-9" class="aq-block aq-block-aq_title_border_block aq_span12 aq-first cf"><div class="border-block" id="concepto">
				<div class="title-block-wrap"><h2 style="color:#fff" class="titleborderh2">�POR QU� TALLER DE DISE�O?</h2><div class="titleborderOut"><div class="titleborder"></div></div><div class="titletext"><p><span>�QU� NOS DIFERENCIA?</span>NUESTRO TRABAJO SE BASA EN EL CONCEPTO DE LAS 3 �C�</p>
 </div></div><div id="aq-block-8219-10" class="aq-block aq-block-aq_featured_block aq_span4 aq-first cf">			<div class="featured-block" style="background:#0089cf; ">
			
				<div class="featured-block-title" > <h5 class="feature-title " >CALIDAD</h5> </div>
				
				<div class="featured-block-text"><p>EN CADA DETALLE DEL TRABAJO</p>
</div>
			
			</div>
						
			</div><div id="aq-block-8219-11" class="aq-block aq-block-aq_featured_block aq_span4  cf">			<div class="featured-block" style="background:#0089cf; ">
			
				<div class="featured-block-title" > <h5 class="feature-title " >CREDIBILIDAD</h5> </div>
				
				<div class="featured-block-text"><p>AVALADA POR NUESTRA EXPERIENCIA</p>
</div>
			
			</div>
						
			</div><div id="aq-block-8219-12" class="aq-block aq-block-aq_featured_block aq_span4  cf">			<div class="featured-block" style="background:#0089cf; ">
			
				<div class="featured-block-title" > <h5 class="feature-title " >CONFIABILIDAD</h5> </div>
				
				<div class="featured-block-text"><p>DESDE EL PRIMER CONTACTO</p>
</div>
			
			</div>
						
			</div><div id="aq-block-8219-13" class="aq-block aq-block-aq_clear_block aq_span12 aq-first cf"></div><div id="aq-block-8219-14" class="aq-block aq-block-aq_richtext_block aq_span12 aq-first cf"><p>A trav&eacute;s de la fidelidad proyecto-constructiva hemos conseguido materializar dise&ntilde;os audaces que nos posiciona como una empresa de <strong>referencia creativa</strong> en el mercado de la arquitectura publicitaria. Logramos llevar adelante este concepto en los m&aacute;s de 30.000 m2 de stands constru&iacute;dos.</p>
<p>Sabemos que las oportunidades no son infinitas y deben aprovecharse al m&aacute;ximo, por eso cada evento y cada cliente es &uacute;nico, logrando nuestro &eacute;xito como consecuencia del &eacute;xito de cada uno de ellos.</p>
</div><div id="aq-block-8219-15" class="aq-block aq-block-aq_title_border_block_end aq_span12 aq-first cf"></div></div></div><div id="aq-block-8219-16" class="aq-block aq-block-aq_clear_block aq_span12 aq-first cf"><div class="cf" style="height:100px; background:#0089cf"></div></div><div id="aq-block-8219-17" class="aq-block aq-block-aq_end_content_block aq_span12 aq-first cf">		</div></div>
					</div></div><div id="aq-block-8219-18" class="aq-block aq-block-aq_start_content_block aq_span12 aq-first cf"><div class="mainwrap" style="background:#fff url();background-size: cover;border-top:1px solid #ededed;padding:0px 0 0px 0;">
<div class="main clearfix">
<div class="content fullwidth">
</div><div id="aq-block-8219-19" class="aq-block aq-block-aq_title_border_block aq_span12 aq-first cf"><div class="border-block" id="metodologia">
				<div class="title-block-wrap"><h2 style="color:#0071bb" class="titleborderh2">METODOLOG�A</h2><div class="titleborderOut"><div class="titleborder"></div></div><div class="titletext"> </div></div><div id="aq-block-8219-20" class="aq-block aq-block-aq_column_block aq_span4 aq-first cf"><div id="aq-block-8219-21" class="aq-block aq-block-aq_features_block aq_span4 aq-first cf"><div class = "featuredIcon"><i class="icon-chat circle icon-3x"></i></div> &nbsp;<h3 class="feature-title">1. CONTACTO</h3><p>Desde el primer contacto brindamos una atenci�n personalizada para involucrarnos y poder adoptar como nuestro el objetivo del cliente. Esto facilita la captaci�n de las necesidades de exhibici�n y valores a transmitir de la empresa.</p>
</div></div><div id="aq-block-8219-22" class="aq-block aq-block-aq_column_block aq_span4  cf"><div id="aq-block-8219-23" class="aq-block aq-block-aq_features_block aq_span4 aq-first cf"><div class = "featuredIcon"><i class="icon-design circle icon-3x"></i></div> &nbsp;<h3 class="feature-title">2. DISE�O</h3><p>Con todo el material captado y teniendo en cuenta la viabilidad y los costos del proyecto, generamos los partidos de dise�o que dar�n lugar a diferentes propuestas. Las mismas se someten siempre a un  desarrollo formal-funcional y de imagen, naciendo los modelos 3d de calidad foto-real�stica.</p>
</div></div><div id="aq-block-8219-24" class="aq-block aq-block-aq_column_block aq_span4  cf"><div id="aq-block-8219-25" class="aq-block aq-block-aq_features_block aq_span4 aq-first cf"><div class = "featuredIcon"><i class="icon-papers circle icon-3x"></i></div> &nbsp;<h3 class="feature-title">3. PROYECTO</h3><p>Enviamos la propuesta mediante im�genes de fotorrealismo, junto con la cotizaci�n detallada (tanto en sus partes como servicios a brindar), haciendo de nuestra propuesta la m�s ajustada a la necesidad del cliente, evitando de esta manera cualquier sorpresa futura.</p>
</div></div><div id="aq-block-8219-26" class="aq-block aq-block-aq_clear_block aq_span12 aq-first cf"></div><div id="aq-block-8219-27" class="aq-block aq-block-aq_column_block aq_span4 aq-first cf"><div id="aq-block-8219-28" class="aq-block aq-block-aq_features_block aq_span4 aq-first cf"><div class = "featuredIcon"><i class="icon-adjust circle icon-3x"></i></div> &nbsp;<h3 class="feature-title">4. AJUSTES</h3><p>Se estudian detalles referentes a la aplicaci�n de marca, grafica general e iluminaci�n. Se establecen tiempos de producci�n y entrega, logrando as� una satisfacci�n total del cliente.</p>
</div></div><div id="aq-block-8219-29" class="aq-block aq-block-aq_column_block aq_span4  cf"><div id="aq-block-8219-30" class="aq-block aq-block-aq_features_block aq_span4 aq-first cf"><div class = "featuredIcon"><i class="icon-tools circle icon-3x"></i></div> &nbsp;<h3 class="feature-title">5. FABRICACI�N</h3><p>Una vez definido los �ltimos detalles del proyecto se genera la documentaci�n para que nuestro equipo de taller realice la fabricaci�n en estrecha interrelaci�n con el sector de dise�o, garantizando la fidelidad entre proyecto y producto.</p>
</div></div><div id="aq-block-8219-31" class="aq-block aq-block-aq_column_block aq_span4  cf"><div id="aq-block-8219-32" class="aq-block aq-block-aq_features_block aq_span4 aq-first cf"><div class = "featuredIcon"><i class="icon-circle circle icon-3x"></i></div> &nbsp;<h3 class="feature-title">6. ENTREGA</h3><p>Ajustadas a la necesidades de nuestros clientes, en tiempo y forma. Nuestras entregas contemplan el embalado del material y log�stica de transporte, para entregas de producto con o sin instalaci�n.</p>
</div></div><div id="aq-block-8219-33" class="aq-block aq-block-aq_clear_block aq_span12 aq-first cf"></div><div id="aq-block-8219-34" class="aq-block aq-block-aq_title_border_block_end aq_span12 aq-first cf"></div></div></div><div id="aq-block-8219-35" class="aq-block aq-block-aq_end_content_block aq_span12 aq-first cf">		</div></div>
					</div></div><div id="aq-block-8219-36" class="aq-block aq-block-aq_start_content_block aq_span12 aq-first cf"><div class="mainwrap" style="background:#0089cf url();background-size: cover;border-top:1px solid #ededed;padding:0px 0 0px 0;">
<div class="main clearfix">
<div class="content fullwidth">
</div><div id="aq-block-8219-37" class="aq-block aq-block-aq_title_border_block aq_span12 aq-first cf"><div class="border-block" id="servicios">
				<div class="title-block-wrap"><h2 style="color:#fff" class="titleborderh2">SERVICIOS</h2><div class="titleborderOut"><div class="titleborder"></div></div><div class="titletext"> </div></div><div id="aq-block-8219-38" class="aq-block aq-block-aq_column_block aq_span3 aq-first cf"><div id="aq-block-8219-39" class="aq-block aq-block-aq_features_block aq_span4 aq-first cf"><div class = "featuredIcon"><i class="icon-design white icon-3x"></i></div> &nbsp;<h3 class="feature-title">DISE�O</h3><p>Creamos formas y espacios, ligados al concepto de un producto y de una marca, otorgando pertenencia, singularidad y pregnancia. Lo logramos en stands para exposiciones, exhibidores, pop-puntos de venta, showrooms, locales comerciales, y muebles para oficina, vivienda y retail.</p>
</div></div><div id="aq-block-8219-40" class="aq-block aq-block-aq_column_block aq_span3  cf"><div id="aq-block-8219-41" class="aq-block aq-block-aq_features_block aq_span4 aq-first cf"><div class = "featuredIcon"><i class="icon-construction white icon-3x"></i></div> &nbsp;<h3 class="feature-title">CONSTRUCCI�N</h3><p>Elaboraci�n de documentaci�n para la generaci�n de piezas a medida en nuestro propio taller, a trav�s de procesos y tecnolog�a que contemplan tanto la fabricaci�n de piezas �nicas como en serie. Teniendo como resultado terminaci�n de productos de rasgos distintivos.</p>
</div></div><div id="aq-block-8219-42" class="aq-block aq-block-aq_column_block aq_span3  cf"><div id="aq-block-8219-43" class="aq-block aq-block-aq_features_block aq_span4 aq-first cf"><div class = "featuredIcon"><i class="icon-setup white icon-3x"></i></div> &nbsp;<h3 class="feature-title">INSTALACI�N</h3><p>Nuestra estructura y personal calificado nos permite trabajar fuera de nuestra f�brica, generando estrategias y planificaci�n que eliminan los imprevistos y reducen los tiempos de ejecuci�n.</p>
</div></div><div id="aq-block-8219-44" class="aq-block aq-block-aq_column_block aq_span3  cf"><div id="aq-block-8219-45" class="aq-block aq-block-aq_features_block aq_span4 aq-first cf"><div class = "featuredIcon"><i class="icon-routed white icon-3x"></i></div> &nbsp;<h3 class="feature-title">RUTEADO</h3><p>Cortamos, tallamos y perforamos sobre maderas, aglomerados, terciados, multilaminados, OSB, melamina, acr�licos y pl�sticos, en 2D y 3D, sobre piezas �nicas o en serie, en base a archivos o planos recibidos.</p>
</div></div><div id="aq-block-8219-46" class="aq-block aq-block-aq_clear_block aq_span12 aq-first cf"></div><div id="aq-block-8219-47" class="aq-block aq-block-aq_title_border_block_end aq_span12 aq-first cf"></div></div></div><div id="aq-block-8219-48" class="aq-block aq-block-aq_end_content_block aq_span12 aq-first cf">		</div></div>
					</div></div><div id="aq-block-8219-49" class="aq-block aq-block-aq_start_content_block aq_span12 aq-first cf"><div class="mainwrap" style="background:#ffffff url();background-size: cover;border-top:1px solid #ededed;padding:0px 0 10px 0;">
<div class="main clearfix">
<div class="content fullwidth">
</div><div id="aq-block-8219-50" class="aq-block aq-block-aq_title_border_block aq_span12 aq-first cf"><div class="border-block" id="portfolio">
				<div class="title-block-wrap"><h2 style="color:#0071bb" class="titleborderh2">PORTFOLIO</h2><div class="titleborderOut"><div class="titleborder"></div></div></div>
 
 <div id="aq-block-8219-51" class="aq-block aq-block-aq_portfolio_block aq_span12 aq-first cf">			
	<div id = "showpost-portfolio">
		<div class="showpostload"><div class="loading"></div></div>
		<div class = "closehomeshow-portfolio port closeajax"><i class="icon-remove"></i></div>
		<div class="showpostpostcontent">
		</div>
	</div>		
	
				<div class="titletext"><p>HAGA CLICK SOBRE UNA CATEGOR�A O SOBRE UN TRABAJO PARA VER EL DETALLE DEL MISMO</p>
 </div>
				<div id="portfolio_block">
					<div id="remove" class="portfolioremove" data-option-key="filter">
						<h2>
						<a class="catlink" href="#filter" data-option-value=".ultimos">Ver �ltimos <span> </span></a>
						<a class="catlink" href="#filter" data-option-value="*">Ver Todos <span> </span></a>
						<a class="catlink" href="#filter" data-option-value=".hasta15mts2" >hasta 15 mts2 <span class="aftersortingword"> </span></a>
						<a class="catlink" href="#filter" data-option-value=".hasta40mts2" >hasta 40 mts2 <span class="aftersortingword"> </span></a>
						<a class="catlink" href="#filter" data-option-value=".hasta80mts2" >hasta 80 mts2 <span class="aftersortingword"> </span></a>
						<a class="catlink" href="#filter" data-option-value=".localescomercialesexhibidores" >locales comerciales &amp; exhibidores <span class="aftersortingword"> </span></a>
						<a class="catlink" href="#filter" data-option-value=".megastand" >mega stand <span class="aftersortingword"> </span></a>
						</h2>
					</div>
				</div>
										
	<div class="homerecent">
	<div class="homerecentInner">
	<div class="portfolio">	
		<div id="portitems4">
		<?php foreach($items as $item){ 
			$categorias = listarCategorias($item->id);
			$imagen = traerFoto($item->id);
		?>
			<div class="one_fourth item4 <?php echo $categorias; ?>" data-category="<?php echo $categorias; ?>" >
				<div class="click" id="portfolio_<?php echo $item->id; ?>">
					<div class="recentimage">
						<div class="overdefult">
							</div>			
								<div class="image">
									<div class="loading"></div>
										<img class="portfolio-home-image" src="portfolio/thumbs/<?php echo $item->id.'/'.$imagen; ?>" alt="<?php echo $item->nombre; ?>" width="280">
								</div>
							</div>
													
							<div class="recentdescription">
								<h3><?php echo $item->nombre; ?></h3>
								<div class="home-portfolio-categories"><a href="portfoliocategory" rel="tag"><?php echo $item->tipo_proyecto; ?></a></div>
							</div>
							
				</div>
			</div>				
		<?php } ?>
		</div>
	</div>
	</div>
	</div>
							
						

			
  <script>
    jQuery(function(){
      
      var $container = jQuery('#portitems4');

      $container.isotope({
        itemSelector : '.item4'
				,filter : '.ultimos'
		      });
      
	  var $relTag = jQuery('.home-portfolio-categories a');
	  
	  $relTag.removeAttr('href');
      
      var $optionSets = jQuery('#remove'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = jQuery(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('#remove');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }
        
        return false;
      });

      
    });
  </script>

</div><div id="aq-block-8219-52" class="aq-block aq-block-aq_title_border_block_end aq_span12 aq-first cf"></div></div></div><div id="aq-block-8219-53" class="aq-block aq-block-aq_end_content_block aq_span12 aq-first cf">		</div></div>
					</div></div><div id="aq-block-8219-54" class="aq-block aq-block-aq_clear_block aq_span12 aq-first cf"></div><div id="aq-block-8219-55" class="aq-block aq-block-aq_start_content_block aq_span12 aq-first cf"><div class="mainwrap" style="background:#f7f7f7 url(images/bg/02b.jpg);background-size: contain; background-position: center; background-repeat: no-repeat;border-top:1px solid #ededed;padding:0px 0 110px 0;">
<div class="main clearfix">
<div class="content fullwidth">
</div><div id="aq-block-8219-56" class="aq-block aq-block-aq_title_border_block aq_span12 aq-first cf"><div class="border-block" id="clients">
				<div class="title-block-wrap"><h2 style="color:#fff" class="titleborderh2"></h2><div class="titletext"> </div></div><div id="aq-block-8219-57" class="aq-block aq-block-aq_testimonial_block aq_span12 aq-first cf">			<script type="text/javascript">
				jQuery(document).ready(function(){	  
				// Slider
				var $slider = jQuery(".slides-testimonials").bxSlider({
					controls: true,
					displaySlideQty: 1,
					default: 6000,
					pause: 10000,
					speed:1000,
					auto:true,
					easing : "ease-in-out",
					prevText : "<i class='icon-chevron-left icon-1x'></i> ",
					nextText : "<i class='icon-chevron-right icon-1x'></i> ",
					pager :false
				});
				 });
			</script>				
			<div id="testimonials_99" class="testimonials cf">
				<ul class="slides-testimonials">
				
										
						<li class="testimonial ">
						<div class="testimonial-before"></div>
							<div class="testimonial-description">
								<div class="testimonial-texts">
									<p><i class="icon-quote-left"></i>UNA TRAYECTORIA DE CALIDAD, HONESTIDAD Y 
SERIEDAD NOS PERMITE HACER REALIDAD DISE�OS 
DE GRAN ORIGINALIDAD Y ALTO IMPACTO VISUAL<i class="icon-quote-right"></i></p>
								</div>
								
								<div class="testimonial-author">
									<span class="author">Taller de Dise�o</span>								</div>
							</div>	
						<div class="testimonial-after"></div>
						</li>

												
						<li class="testimonial hide">
						<div class="testimonial-before"></div>
							<div class="testimonial-description">
								<div class="testimonial-texts">
									<p><i class="icon-quote-left"></i>CADA EVENTO Y CADA CLIENTE ES �NICO. 
LOGRAMOS NUESTRO �XITO COMO CONSECUENCIA
DEL �XITO DE CADA UNO DE ELLOS<i class="icon-quote-right"></i></p>
								</div>
								
								<div class="testimonial-author">
									<span class="author">Taller de Dise�o</span>								</div>
							</div>	
						<div class="testimonial-after"></div>
						</li>

										
				</ul>

				
			</div>
			
			</div><div id="aq-block-8219-58" class="aq-block aq-block-aq_title_border_block_end aq_span12 aq-first cf"></div></div></div><div id="aq-block-8219-59" class="aq-block aq-block-aq_end_content_block aq_span12 aq-first cf">		</div></div>
					</div></div><div id="aq-block-8219-60" class="aq-block aq-block-aq_start_content_block aq_span12 aq-first cf"><div class="mainwrap" style="background:#fff url();background-size: cover;border-top:1px solid #ededed;padding:0px 0 0px 0;">
<div class="main clearfix">
<div class="content fullwidth">
</div><div id="aq-block-8219-61" class="aq-block aq-block-aq_clear_block aq_span12 aq-first cf"><div class="cf" style="height:20px; background:#fff"></div></div><div id="aq-block-8219-62" class="aq-block aq-block-aq_title_border_block aq_span12 aq-first cf"><div class="border-block" id="news">
				<div class="title-block-wrap"><h2 style="color:#0080c8" class="titleborderh2">NOVEDADES</h2><div class="titleborderOut"><div class="titleborder"></div></div><div class="titletext"><p>PR�XIMAMENTE PODR� ENCONTRAR LOS PROYECTOS EN LOS QUE ESTAMOS TRABAJANDO</p>
 </div></div><div id="aq-block-8219-63" class="aq-block aq-block-aq_clear_block aq_span12 aq-first cf"><div class="cf" style="height:80px; background:#fff"></div></div><div id="aq-block-8219-64" class="aq-block aq-block-aq_end_content_block aq_span12 aq-first cf">		</div></div>
					</div></div><div id="aq-block-8219-65" class="aq-block aq-block-aq_title_border_block_end aq_span12 aq-first cf"></div></div></div><div id="aq-block-8219-66" class="aq-block aq-block-aq_start_content_block aq_span12 aq-first cf"><div class="mainwrap" style="background:#f7f7f7 url(uploads/2014/06/contacto.jpg);background-size: cover;border-top:1px solid #ededed;padding:0px 0 0px 0;">
<div class="main clearfix">
<div class="content fullwidth">
</div><div id="aq-block-8219-67" class="aq-block aq-block-aq_title_border_block aq_span12 aq-first cf"><div class="border-block" id="contact">
				<div class="title-block-wrap"><h2 style="color:#ffffff" class="titleborderh2">CONTACTO</h2><div class="titleborderOut"><div class="titleborder"></div></div><div class="titletext"><div style="color:#fff";>SI DESEA, PUEDE CONTACTARSE CON NOSOTROS COMPLETANDO EL FORMULARIO<br>O ESCRIBI�NDOS UN MAIL QUE A LA BREVEDAD NOS PONDREMOS EN CONTACTO.<br>MUCHAS GRACIAS.</div>
 </div></div><div id="aq-block-8219-68" class="aq-block aq-block-aq_contact_block aq_span7 aq-first cf"><div class="wpcf7" id="wpcf7-f4-p7694-o1"><form action="background.php?sendMail=1" method="post" class="wpcf7-form" novalidate>
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="4" />
<input type="hidden" name="_wpcf7_version" value="3.5.3" />
<input type="hidden" name="_wpcf7_locale" value="en_US" />
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f4-p7694-o1" />
<input type="hidden" name="_wpnonce" value="4f2c4cf2c1" />
</div>
<p>Nombre (requerido)<br />
    <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" /></span> </p>
<p>Mail (requerido)<br />
    <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" /></span> </p>
<p>Tel�fono<br />
    <span class="wpcf7-form-control-wrap your-phone"><input type="text" name="your-phone" value="" size="40" class="wpcf7-form-control wpcf7-text" /></span> </p>
<p>Su mensaje (requerido)<br />
    <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true"></textarea></span> </p>
<p><input type="submit" value="ENVIAR" class="wpcf7-form-control wpcf7-submit" /></p>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div></div><div id="aq-block-8219-69" class="aq-block aq-block-aq_widgets_block aq_span5  cf"><div class="widget widget_text">			<div class="textwidget"><div class="iconContact address">Bahia Blanca 2364 (C1417ASF), CABA</div>
<div class="iconContact phone">(54 11) 4648-1504</div>
<div class="iconContact phone">(54 11) 4648-1505 </div>
<div class="iconContact email">info@tddstands.com.ar</div></div>
		</div></div><div id="aq-block-8219-70" class="aq-block aq-block-aq_title_border_block_end aq_span12 aq-first cf"></div></div></div><div id="aq-block-8219-71" class="aq-block aq-block-aq_end_content_block aq_span12 aq-first cf">		</div></div>
					</div></div></div>
</div>
	
<!-- footer-->
<footer>
	<div id="footer">
		<!-- social icons in footer -->
		<div class = "footer-social">
					</div>
		<!-- main footer part-->
		<div id="footerinside">
			<div class="footer_widget">
				<!-- footer widget 1-->
				<div class="footer_widget1">
									
				</div>	
				<!-- footer widget 2-->
				<div class="footer_widget2">	
					<div class="widget widget_nav_menu"><div class="menu-menu-principal-container"><ul id="menu-menu-principal-4" class="menu"><li id="menu-item-7769" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7769"><a href="#about">NOSOTROS</a></li>
<li id="menu-item-7786" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7786"><a href="#concepto">POR QU� TDD</a></li>
<li id="menu-item-7752" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7752"><a href="#metodologia">METODOLOG�A</a></li>
<li id="menu-item-7787" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7787"><a href="#servicios">SERVICIOS</a></li>
<li id="menu-item-7788" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7788"><a href="#portfolio">PORTFOLIO</a></li>
<li id="menu-item-7789" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7789"><a href="#news">NOVEDADES</a></li>
<li id="menu-item-7790" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7790"><a href="#contact">CONTACTO</a></li>
</ul></div></div>				</div>	
				<!-- footer widget 3-->
				<div class="footer_widget3 last">	
					<div class="totop"><div class="gototop"><div class="arrowgototop"></div></div></div>
				</div>
			</div>
		</div>
		<!-- footer bar at the bootom-->
		<div id="footerbwrap">
			<div id="footerb">
				<div class="lowerfooter">
				<div class="copyright">	
					<strong>TALLER DE DISE�O</strong> / 2014 / Todos los derechos reservados / <a href="http://diazmonnier.com/" target="_blank"><span>Design by DIAZ MONNIER</span></a>				</div>
				</div>
			</div>
		</div>

	</div>
</footer>	
<script type="text/javascript" > jQuery(document).ready(function(){jQuery("a[rel^='lightbox']").prettyPhoto({theme:'light_rounded',show_title: true, deeplinking:false,callback:function(){scroll_menu()}});  });</script>

<script>	
	jQuery(document).ready(function(){	
		jQuery('.searchform #s').val('Search...');
		
		jQuery('.searchform #s').focus(function() {
			jQuery('.searchform #s').val('');
		});
		
		jQuery('.searchform #s').focusout(function() {
			jQuery('.searchform #s').val('Search...');
		});	
		
	});	</script>

<script type='text/javascript' src='js/aqpb-view.js?ver=1413246697'></script>
<script type='text/javascript' src='js/jquery.form.min.js?ver=3.44.0-2013.09.15'></script>
<script type='text/javascript' src='js/scripts.js?ver=3.5.3'></script>
<script type='text/javascript' src='js/custom.js'></script>
<script type='text/javascript' src='js/jquery.prettyPhoto.js?ver=1'></script>
<script type='text/javascript' src='js/jquery.easing.1.3.js?ver=1'></script>
<script type='text/javascript' src='js/jquery.cycle.all.min.js?ver=1'></script>
<script type='text/javascript' src='js/gistfile_pmc.js?ver=1'></script>
<script type='text/javascript' src='js/jquery.nicescroll.min.js?ver=1'></script>
<script type='text/javascript' src='js/jquery.isotope.min.js'></script>
<script type="text/javascript" src="js/jquery.anythingslider.js?ver=1"></script>
<script type='text/javascript' src='js/jquery.bxslider.js?ver=1'></script>
</body>
</html>


<!-- WP Fastest Cache file was created in 1.8195910453796 seconds, on 14-10-14 0:31:38 -->