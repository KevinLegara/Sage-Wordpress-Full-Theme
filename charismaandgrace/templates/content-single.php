<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <?php 
          $category = get_the_category();
          $categoryLink = get_category_link( $category[0]->term_id );
        ?>
      <div class="cat-name"> 
        <a href="<?php echo $categoryLink; ?>"><?php echo $category[0]->name; ?></a>
        <hr class="cat-separator" />
      </div>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
      
    </header>
    <ul class="social-icons">
          <?php
          // Get current page URL 
          $crunchifyURL = urlencode(get_permalink());
       
          // Get current page title
          $crunchifyTitle = str_replace( ' ', '%20', get_the_title());
          
          // Get Post Thumbnail for pinterest
          $crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
       
          // Construct sharing URL without using any script
          $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL;
          // $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
          $facebookURL = 'http://www.facebook.com/sharer.php?u='.$crunchifyURL;
          $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;

          ?>
          <li><a href="<?php echo $twitterURL; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li><a href="<?php echo $pinterestURL; ?>" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
          <li><a class="facebook customer share" href="<?php echo $facebookURL; ?>" title="Facebook share" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
    </ul><!--end social-icons-->
    <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>