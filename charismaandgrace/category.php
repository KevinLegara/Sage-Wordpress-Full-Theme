
<?php get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/banner', 'category'); ?>
<div class="container category-posts">
	<div class="content-wrapper row">
		<div class="col-xs-12 col-sm-12 col-md-9">
			<div class="cat-page-title">
				<h1>
				<?php 
					echo single_cat_title("", false);
				?>
				</h1>
				<hr class="cat-separator" />
			</div>
			<?php if (!have_posts()) : ?>
			  <div class="alert alert-warning">
			    <?php _e('Sorry, no results were found.', 'sage'); ?>
			  </div>
			  <?php get_search_form(); ?>
			<?php endif; ?>
			<div class="infinite-wrap">
			<?php while (have_posts()) : the_post(); ?>
			  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
			<?php endwhile; ?>
			<?php wp_pagenavi(); ?>
			<?php //the_posts_navigation(); ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 page-sidebar">
			<?php dynamic_sidebar('sidebar-primary'); ?>	
		</div>
	</div>
</div>

<div class="dwhite-section"></div>