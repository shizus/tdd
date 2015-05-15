<?php get_header(); ?>

<!-- top bar with breadcrumb -->
<div class = "outerpagewrap">
	<div class="pagewrap">
		<div class="pagecontent">
			<div class="pagecontentContent">
				<p><?php echo pmc_breadcrumb(); ?></p>
			</div>
		</div>

	</div>
</div> 
<!-- main content start -->			
<div id="mainwrap">
	<div id="main" class="clearfix">
		<div class="content fullwidth errorpage">
			<div class="postcontent">
				<h2><?php echo pmc_translation('errorpagetitle','OOOPS! 404'); ?></h2>
				<div class="posttext">
					<?php echo pmc_translation('errorpage','Sorry, but the page you are looking for has not been found.<br/>Try checking the URL for errors, then hit refresh.</br>Or you can simply click the icon below and go home:)'); ?>
				</div>
				<div class="homeIcon"><a href="<?php echo home_url(); ?>"></a></div>
			</div>							
		</div>
	</div>
</div>

<?php get_footer(); ?>