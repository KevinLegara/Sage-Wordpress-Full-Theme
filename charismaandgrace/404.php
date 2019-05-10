<?php get_template_part('templates/page', 'header'); ?>
<div class="container archive-lists">
	<div class="content-wrapper row">
		<div class="col-xs-12 col-sm-12 col-md-9">
			<div class="alert alert-warning">
			  <?php _e('Sorry, but the page you were trying to view does not exist.', 'sage'); ?>
			</div>

			<?php get_search_form(); ?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 page-sidebar">
			<?php dynamic_sidebar('sidebar-primary'); ?>	
		</div>
	</div>
</div>

<div class="dwhite-section"></div>

