<?php 
$home_carousel = get_field('home_carousel');
 ?>

<div class="loop owl-carousel owl-theme owl-center owl-loaded" id="blog-slider">

<?php 
  foreach ($home_carousel as $datas) {
    ?>
        <div class="item" style="<?php echo 'background-image: url('.$datas['banner_image'].')'; ?>">

          <div class="blog-slide">

            <div class="blog-slide-content">

                <h3 class="blog-cat"><?php echo $datas['banner_title']; ?></h3>

                <hr class="cat-separator" />

                <h2 class="blog-title"><?php echo $datas['banner_second_title']; ?></h2>

                <div class="blog-btn"><a class="btn" href="<?php echo $datas['banner_button_url']; ?>"><?php echo $datas['banner_button_text']; ?></a></div>
                <?php //the_permalink(); ?>
            </div>

          </div>

        </div>
    <?php
  }
?>

</div>