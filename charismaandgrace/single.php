<div class="container single-post">
	<div class="content-wrapper row">
		<div class="col-xs-12 col-sm-12 col-md-9">
			<?php get_template_part('templates/content-single', get_post_type()); ?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 page-sidebar">
			<?php dynamic_sidebar('sidebar-primary'); ?>	
		</div>
	</div>
</div>
<?php related_posts(); ?>
<div class="dwhite-section"></div>