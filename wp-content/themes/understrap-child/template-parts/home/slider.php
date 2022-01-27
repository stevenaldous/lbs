<?php
/**
 * The home slider section
 *
 * @package UnderStrap
 */
?>
<?php
/**
 * The home grid section
 *
 * @package UnderStrap
 */

  if( have_rows('home_slider') ):

    $num = get_field('home_number');
?>

<div class="container-md">
  <div class="row mb-4">
    <div class="col px-0 px-md-3">
      <!-- Slider main container -->
      <div id="mbsaHomeSlider" class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <?php while( have_rows('home_slider') ): the_row(); if( get_row_index() <= $num ):

            $img = get_sub_field('img');
            $tit = get_sub_field('tit');
            $subt = get_sub_field('subt');
            $link = get_sub_field('link');

            // link variables
            if($link){
              $lu = $link['url'];
              $lt = $link['title'];
              $lx = $link['target'] ? $link['target'] : '_self';
            };
        
          ?>
          <!-- Slides -->
          <div class="swiper-slide">
            <div class="slide-inner bg-img d-flex justify-content-center align-items-center flex-column" style="background-image: url('<?php echo esc_url( $img); ?>'); min-height: 600px;">
                <div class="copy-wrap w-100 h-100 d-flex justify-content-center align-items-center flex-column">
                  <h2 class="h1 title mb-3 text-uppercase">
                    <?php echo esc_html($tit); ?>
                  </h2>
                  <div class="break mb-3"></div>
                  <p class="h2 mb-4 subt text-capitalize">
                    <?php echo esc_html($subt); ?>
                  </p>
                  <?php if($link): ?>
                  <a class="btn btn-primary " href="<?php echo esc_url($lu) ?>"  target="<?php echo $lx; ?>">
                    <?php echo esc_html($lt); ?>
                  </a>
                <?php endif; ?>
                </div>
            </div>
          </div>
          <?php endif; endwhile; ?>

        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev pl-3"></div>
        <div class="swiper-button-next pr-3"></div>

        <!-- If we need scrollbar -->

      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
jQuery(document).ready(function($) {
      // enable slider

  var homeSwiper = new Swiper('#mbsaHomeSlider', {
    // Optional parameters
    loop: true,
    // speed: 2000,
    autoplay: {
     delay: 5000,
   },


    // fade effect
    effect: 'fade',
    fadeEffect: {
      crossFade: true
    },

  

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
});


  </script>


<?php endif; ?>
  