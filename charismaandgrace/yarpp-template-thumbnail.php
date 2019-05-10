<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
<?php if (have_posts()):?>
<section class="our-picks">

	<div class="container">
		<h2 class="title">Related Posts</h2>
		<div class="our-picks-content">
			
			<div class="row">
				<?php while (have_posts()) : the_post(); ?>
					<?php if (has_post_thumbnail()):?>
						<div class="col-xs-12 col-sm-6 col-md-3">
							<?php
								if (has_post_thumbnail( $post->ID ) ):
									$productImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium-small' ) ;
								endif;
							?> 
							<a target="_blank" href="<?php the_field('product_url'); ?>">
								<div class="featured-product">
							        <div class="featured-product-thumb" style="background-image: url(<?php echo $productImage[0]; ?>)">
									</div><!--end frontpgpicks-item-->
									<h4 class="featured-product-title"><?php the_title(); ?></h4>
								</div><!--end frontpgpicks-item"-->
							</a>
							<?php $postImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium-small' ) ; ?>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"></a>
						</div>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>			
		</div><!--end our-picks-content-->
	</div><!--end container-->

</section><!--end our-picks-->
<?php endif; ?>
