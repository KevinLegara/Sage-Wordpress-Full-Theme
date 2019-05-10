<div class="col-xs-12 col-sm-12 col-md-3 shop-sidebar page-sidebar">

			<div class="shop-sidebar-title">View Products</div>

			<div class="shop-categories">

				<ul class="category-links">

					<li class="product-cat<?php echo !$term?' active':''; ?>"><a href="<?php echo get_home_url().'/shop'.'#shop-wrapper'; ?>">All</a></li>

				

				<?php 



					$args = array(

				    'number'     => $number,

				    'orderby'    => 'title',

				    'order'      => 'ASC',

				    'hide_empty' => $hide_empty,

				    'include'    => $ids

				);

				$product_categories = get_terms( 'product_category', $args );

				$count = count($product_categories);

				if ( $count > 0 ){

				    foreach ( $product_categories as $product_category ) {

				    	

				    	?>

				    	<li class="product-cat<?php echo get_queried_object()->term_id==$product_category->term_id?' active':'';?>"><a href="<?php echo get_term_link( $product_category ); ?>"><?php echo $product_category->name; ?></a></li>

				    	<?php

				    }

				}



				 ?>

				

				</ul>

			</div>

		</div>;