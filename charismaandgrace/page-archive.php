<?php 
/*
Template Name: Archives
*/
?>
<?php get_template_part('templates/page', 'header'); ?>
<div class="container archive-lists">
	<div class="content-wrapper row">
		<div class="col-xs-12 col-sm-12 col-md-9">
			<div class="page-title">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</div>
		
			<?php get_search_form(); ?>
			<div class="archive-list-wrapper">
				<h2>By Month</h2>
				<hr class="cat-separator" />
				<ul class="archive-months archive-list">
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
				<div class="clearfix"></div>
			</div>
			
			<div class="archive-list-wrapper">
				<h2>Categories</h2>
				<hr class="cat-separator" />
				<ul class="archive-categories archive-list">
					 <?php wp_list_categories(array('title_li'=> '')); ?>
				</ul>
				<div class="clearfix"></div>
			</div>

			<div class="tags-wrapper archive-list-wrapper">
				<h2>Tags</h2>
				<hr class="cat-separator" />
				<?php wp_tag_cloud(array('smallest' => 10)); ?>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 page-sidebar">
			<?php dynamic_sidebar('sidebar-primary'); ?>	
		</div>
	</div>
</div>

<div class="dwhite-section"></div>
