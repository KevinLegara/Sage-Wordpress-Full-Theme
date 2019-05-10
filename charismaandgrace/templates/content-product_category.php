<div class="container">
	<div class="content-wrapper shop-wrapper row" id="shop-wrapper">
		<div class="col-xs-12 col-sm-12 col-md-9">
			<div class="products-wrap">
					<div class="row infinite-wrap">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-xs-12 col-md-4 infinite-item">
							<?php if (has_post_thumbnail() ):
								$productImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' ) ;
								?>
								<div class="product">
									<div class="product-thumb" style="background-image: url(<?php echo $productImage[0]; ?>)">
									</div><!--end frontpgpicks-item-->
									<h4 class="product-title"><?php the_title(); ?></h4>
									<a target="_blank" href="<?php the_field('product_url'); ?>" class="btn product-buy-btn">Buy</a>
								</div><!--end frontpgpicks-item"-->
							<?php endif; ?> 
						</div>
					<?php endwhile; ?>
					</div>
				
				<?php 
						wp_pagenavi();
					?>
			</div>
		</div>
		<?php get_template_part('templates/sidebar', 'shop'); ?>
	</div>
</div>

<div class="dwhite-section"></div>