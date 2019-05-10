<div class="col-xs-12 col-md-4">
    test
    <?php if (has_post_thumbnail() ):
        $productImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' ) ;
        ?>
        <div class="product">
            <div class="product-thumb" style="background-image: url(<?php echo $productImage[0]; ?>)"></div><!--end frontpgpicks-item-->
            <h4 class="product-title">test<?php the_title(); ?></h4>
            <a target="_blank" href="<?php the_field('product_url'); ?>" class="btn product-buy-btn">Buy</a>
        </div><!--end frontpgpicks-item"-->
     <?php endif; ?> 
</div>