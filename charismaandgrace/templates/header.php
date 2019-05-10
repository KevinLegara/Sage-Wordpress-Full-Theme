<header class="pgheader">
  <div class="container top-navbar">
    <div class="row">
      <div class="col-xs-12 col-sm-5 social-icons-wrapper">
        <ul class="social-icons">
          <?php if (get_field('instagram','option') == '') {
            echo "";
          }else{
            ?>
            <li><a href="<?php the_field('instagram','option'); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <?php
          } 
          ?>
          <?php if (get_field('twitter','option') == '') {
            echo "";
          }else{
            ?>
            <li><a href="<?php the_field('twitter','option'); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <?php
          } 
          ?>
          <?php if (get_field('pinterest','option') == '') {
            echo "";
          }else{
            ?>
            <li><a href="<?php the_field('pinterest','option'); ?>" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
            <?php
          } 
          ?>
          <?php if (get_field('facebook','option') == '') {
            echo "";
          }else{
            ?>
            <li><a href="<?php the_field('facebook','option'); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <?php
          } 
          ?>
          <?php if (get_field('email','option') == '') {
            echo "";
          }else{
            ?>
            <li><a href="mailto:<?php the_field('email','option'); ?>" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
            <?php
          } 
          ?>
        </ul><!--end social-icons-->
      </div><!--end col-md-6-->
      <div class="col-xs-12 col-sm-7 search-box-wrapper">
        <div class="search-box pull-right">
          <form action="/" method="get">
              <label for="search">Search</label>
              <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
              <button type="submit" class="search-btn">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
          </form>
        </div><!--end search-box-->
        <div class="clearfix"></div>
      </div><!--end col-md-6-->
    </div>
  </div>
  <div class="header-nav">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4 logo-wrapper">
          <div class="logo">
            <?php $websiteLogo = get_field('website_logo','option'); ?>
            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo $websiteLogo['url'] ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="img-fluid" /></a>
          </div>
        </div><!--end col-md-4-->
        <div class="col-xs-12 col-md-8 tagline-wrapper">
          <div class="tagline">
            <h2><?php echo get_bloginfo('description','display'); ?></h2>
          </div>
          <nav class="navbar header-navbar">
            <a class="navbar-brand hidden-md-up" href="<?php echo esc_url(home_url('/')); ?>">MENU</a>
            <button class="navbar-toggler hidden-md-up pull-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              &#9776;
            </button>
            <div class="clearfix"></div>
            <div class="collapse navbar-toggleable-sm" id="navbarCollapse">
                <?php
                if (has_nav_menu('primary_navigation')) :
                  wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'pull-md-right nav navbar-nav']);
                endif;
                ?>
            </div>
          </nav>
        </div><!--end col-md-8-->
      </div>
    </div><!--end container-->
  </div>
</header><!--end pgheader-->