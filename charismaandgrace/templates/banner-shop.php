<?php $shopContent= new WP_Query(	array(		'post_type' => 'page',		'page_id' => 98		)	);if ( $shopContent->have_posts() ) {	while ( $shopContent->have_posts() ) {		$shopContent->the_post(); ?>		<div class="jumbotron page-banner" style="background-image:url(<?php the_field('banner_background_image'); ?>)">			<div class="container banner-container">				<div class="banner-content-wrap pull-right">					<div class="banner-content">						<h1><?php the_title(); ?></h1>						<?php the_field('banner_content'); ?>					</div>				</div>			</div>		</div>		<div class="dwhite-section"></div>	<?php	}}else{	while ( $shopContent->have_posts() ) {		$shopContent->the_post(); ?>		<div class="jumbotron page-banner" style="background-image:url(<?php the_field('banner_background_image'); ?>)">			<div class="container banner-container">				<div class="banner-content-wrap pull-right">					<div class="banner-content">						<h1><?php the_title(); ?></h1>						<?php the_field('banner_content'); ?>					</div>				</div>			</div>		</div>		<div class="dwhite-section"></div>	<?php	}}wp_reset_postdata();?>