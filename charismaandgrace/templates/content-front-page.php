<div class="container">

	<div class="content-wrapper row">

		<div class="col-xs-12 col-sm-12 col-md-9">

			<div class="latest-posts">

				<h1 class="page-title">Latest Posts</h2>

				<?php

				//echo do_shortcode('[ajax_load_more post_type="post" repeater="products-loop" posts_per_page="5" transition="fade" button_label="View More Posts"]');

				$paged = (get_query_var('page')) ? get_query_var('page') : 1;

				$args = array( 'posty_type'=>'post', 'paged'=> $paged, 'posts_per_page' => 5 );

				$loop = new WP_QUERY($args);

				?>

				<div class="infinite-wrap">

					<?php while($loop->have_posts()) : $loop->the_post(); ?>

						<div class="entry row infinite-item">

							<div class="entry-thumbnail col-xs-12 col-md-5">

						    	<a href="<?php the_permalink(); ?>">

						        	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'list-thumbnail-size' ) ; ?>

						        	<div class="feat-img" style="<?php echo $image?'background-image: url('.$image[0].')':'background-color: #eebfbf'; ?>">

						            	

						        	</div>

						   		</a>

						   	</div><!--end col-md-6-->

						    <div class="entry-details col-xs-12 col-md-7">

						    	<?php $category = get_the_category(); ?>

						    	<?php $catName = $category[0]->name; ?>

						    	<?php $categoryId = get_cat_ID( $catName ); ?>

						    	<?php $categoryLink = get_category_link( $categoryId ); ?>

						    	

						    	<a href="<?php echo $categoryLink; ?>" ><h6 class="cat-name"><?php echo $catName; ?></h6> </a>

						        <hr class="cat-separator"/>

						    	<h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

						        <div class="post-content">

						        	<p><?php the_excerpt(); ?></p>

						      	</div>

						    </div><!--end col-md-6-->

							<div class="clearfix"></div>

						</div><!--end entry-->

					<?php endwhile; ?>

					

				</div>

				<?php 

					wp_pagenavi(array('query'=>$loop));

					wp_reset_postdata(); 

				?>

			</div>

		</div>

		<div class="col-xs-12 col-sm-12 col-md-3 page-sidebar">

			<?php dynamic_sidebar('sidebar-primary'); ?>	

		</div>

	</div>

</div>



<section class="our-picks">

	<div class="container">

		<h2 class="title">My Picks</h2>

		<div class="our-picks-content">

		<?php

			$posts = get_posts(array(

				'post_type' => 'products',

				'meta_query' => array(

					array(

						'key' => 'featured_product',

						'compare' => '==',

						'value' => '1'

					)

				),

				'order' => 'ASC'

			));

			if( $posts ): ?>

			<div class="row">

				<?php foreach( $posts as $post ):

					$productImage = false;

					if (has_post_thumbnail( $post->ID ) ):

						$productImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium-small' ) ;

					endif; 

					?>

					<div class="col-xs-12 col-sm-6 col-md-3">

						<a target="_blank" href="<?php the_field('product_url'); ?>">

							<div class="featured-product">

						        <div class="featured-product-thumb" style="background-image: url(<?php echo $productImage[0]; ?>)">

								</div><!--end frontpgpicks-item-->

								<h4 class="featured-product-title"><?php the_title(); ?></h4>

							</div><!--end frontpgpicks-item"-->

						</a>

					</div>

				<?php endforeach; ?>

				<div class="clearfix"></div>

			<?php wp_reset_postdata(); ?>

			</div>

			<?php endif; ?>

			

		</div><!--end our-picks-content-->

	</div><!--end container-->

</section><!--end our-picks-->