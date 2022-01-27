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

  if( have_rows('home_banner') ):

    while( have_rows('home_banner') ): the_row();

        $img = get_sub_field('img');
        $tit = get_sub_field('tit');
        $subt = get_sub_field('subt');
        $limit = get_sub_field('limit');
        $text = get_sub_field('text');


?>

<div class="container-md">
  <div class="row mb-4">
    <div class="col px-0 px-md-3 lbs-banner-wrap">
      <div class="lbs-banner bg-img d-flex flex-column justify-content-center align-items-center" style="background-image: url('<?php echo esc_url( $img); ?>'); min-height: 600px;">


        <div class="copy-wrap w-100 h-100 d-flex justify-content-center align-items-center flex-column">
          <h2 class="h1 title mb-3 text-uppercase">
            <?php echo esc_html($tit); ?>
          </h2>
          <div class="break mb-3"></div>
          <p class="h2 mb-4 subt text-capitalize">
            <?php echo esc_html($subt); ?>
          </p>
        </div>


      </div>
      <div class="lbs-banner-text py-3 px-4 bg-white">
        <p><?php echo lbs_readmore( $text , $limit ); ?></p>
      </div>

    </div>
  </div>
</div>


<?php endwhile; endif; ?>
  