<div id="ycoHomeSlider" class="carousel slide mb-lg-5" data-bs-ride="carousel">
  <?php if (have_rows('yco_homepage_slider_repeater')) :
    $carousel_indicators = '<div class="carousel-indicators">';
    $i = 0;

  ?>
    <div class="carousel-inner">
      <?php while (have_rows('yco_homepage_slider_repeater')) : the_row();
        $yco_homepage_slide_image = get_sub_field('yco_homepage_slide_image');
      ?>
        <div class="carousel-item<?php if ($i == 0) echo ' active'; ?> ">
          <?php echo wp_get_attachment_image($yco_homepage_slide_image, 'full',"", array("class" => "img-fluid")); ?>
          
          <div class="container">
            <div class="carousel-caption text-start">
              <span class="h1 display-5"><?php the_sub_field('yco_homepage_slide_title'); ?></span>
              <p><?php the_sub_field('yco_homepage_slide_content'); ?></p>
              <?php if (get_sub_field('yco_homepage_slide_link')) : ?>
                <p><a class="btn btn-lg btn-primary" href="<?php the_sub_field('yco_homepage_slide_link'); ?>"><?php _e('Read more', 'yachtclubolbia'); ?></a></p>
              <?php endif; ?>
            </div>
          </div>

        </div>


        <?php

        $carousel_indicators .= '<button type="button" data-bs-target="#ycoHomeSlider" data-bs-slide-to="' . $i . '" aria-label="Slide ' . $i . '" ';
        if ($i == 0) $carousel_indicators .= ' class="active" aria-current="true"';
        $carousel_indicators .= '></button>';

        $i++; ?>
      <?php endwhile;

      echo $carousel_indicators;

      ?>
    </div>
    <div class="yco-static-strip">
      <div class="container">
    <span class="yco-static-logo"></span>
    </div>
    </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#ycoHomeSlider" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#ycoHomeSlider" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  <?php endif; ?>
</div>