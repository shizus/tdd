
<?php get_header(); ?>
<!-- top bar with breadcrumb --><div class = "outerpagewrap">
	<div class="pagewrap">
		<div class="pagecontent">
			<div class="pagecontentContent">
				<p><?php echo pmc_breadcrumb(); ?></p>
			</div>
		</div>

	</div>
</div>   
<!-- main content start -->
<div class="mainwrap">
	<div class="main clearfix">
		<div class="content fullwidth">
			<div class="postcontent">
				<div class="posttext">
					<h1><?php the_title() ?></h1>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="usercontent"><?php the_content(); ?></div>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>