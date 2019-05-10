<?php 
	$queried_object = get_queried_object(); 
	$taxonomy = $queried_object->taxonomy;
	$term_id = $queried_object->term_id;  
?>


		<div class="jumbotron page-banner" style="background-image:url(<?php the_field('banner_background_image', $taxonomy . '_' . $term_id); ?>)">
			<div class="container banner-container">
				<div class="banner-content-wrap pull-right">
					<div class="banner-content">
						<h1><?php echo $queried_object->name; ?></h1>
						<?php the_field('banner_content', $taxonomy . '_' . $term_id); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="dwhite-section"></div>