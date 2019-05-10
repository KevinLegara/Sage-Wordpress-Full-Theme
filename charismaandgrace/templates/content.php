<div class="infinite-item">
  <article <?php post_class(); ?> >
    <header>
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <ul class="social-icons">
          <?php
          // Get current page URL 
          $crunchifyURL = urlencode(get_permalink());
       
          // Get current page title
          $crunchifyTitle = str_replace( ' ', '%20', get_the_title());
          
          // Get Post Thumbnail for pinterest
          $crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
       
          // Construct sharing URL without using any script
          $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL;
          $facebookURL = 'http://www.facebook.com/sharer.php?u='.$crunchifyURL;
          $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
          ?>
          <li><a href="<?php echo $twitterURL; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li><a href="<?php echo $pinterestURL; ?>" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
          <li><a class="facebook customer share" href="<?php echo $facebookURL; ?>" title="Facebook share" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
    </ul><!--end social-icons-->
    <div class="entry-featured-image">
    	<?php $productImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium-large' ) ; ?>
  	<img src="<?php echo $productImage[0];?>" class="img-fluid"/>
    </div>
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div>
  </article>
</div>
