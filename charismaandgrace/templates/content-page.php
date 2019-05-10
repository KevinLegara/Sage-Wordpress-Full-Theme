<?php use Roots\Sage\Titles; ?>
<div class="container">
	<div class="content-wrapper row">
		<div class="col-xs-12 col-sm-12 col-md-9 page-content">
			<div class="page-header">
			  <h1 class="page-title"><?= Titles\title(); ?></h1>
			</div>
			<?php the_content(); ?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 page-sidebar">
			<?php dynamic_sidebar('sidebar-primary'); ?>	
		</div>
	</div>
</div>