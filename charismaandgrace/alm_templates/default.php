<div class="entry row">
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