<?php 
$term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
?>


<div class="container">


	<div class="content-wrapper shop-wrapper row HEHEHE" id="shop-wrapper">


		<div class="col-xs-12 col-sm-12 col-md-9">

			<div class="products-wrap">

				<h3>NO PRODUCTS IN THIS CATEGORY YET.</h3>

			</div>


		</div>


		<div class="col-xs-12 col-sm-12 col-md-3 shop-sidebar page-sidebar">


			<div class="shop-sidebar-title">View Products</div>


			<div class="shop-categories">


				<ul class="category-links">


					<li class="product-cat<?php echo !$term?' active':''; ?>"><a href="<?php echo get_home_url().'/shop'.'#shop-wrapper'; ?>">All</a></li>


				<?php


					$terms = get_terms( 'product_category', ['hide_empty' => false]);


					if (! is_wp_error( $terms ) ){


						foreach ($terms as $cat) {


							$termLink = get_term_link( $cat );?>


							<li class="product-cat<?php echo $term->slug==$cat->slug?' active':'';?>"><a href="<?php echo $termLink.'#shop-wrapper'; ?>"><?php echo $cat->name; ?></a></li>


						<?php 


						}


					}


				?>


				</ul>


			</div>


		</div>


	</div>


</div>





<div class="dwhite-section"></div>