<?php if(get_field('yco_page_hero_image')): ?>
  <section class="section-title-breadcrumbs section-title-background-image breadcrumbs pt-3 pt-lg-5 bg-yco-light" style="background-image: url(<?php echo wp_get_attachment_image_src(get_field('yco_page_hero_image'), 'full')[0]; ?>);">
  <div class="container pt-lg-4">
<div class="d-flex justify-content-center align-items-center text-white  pt-lg-3 pb-lg-5">
  <?php the_title('<h1 class="h1 text-shadow">' , '</h1>'); ?>
  
</div>

</div>
<div class="bg-blur">
  <div class="container">
<div class="d-flex justify-content-center justify-content-lg-end py-lg-2">
<?php if (function_exists('bootstrap_breadcrumb')) bootstrap_breadcrumb(); ?>
</div>
</div>
</div>
</section>
<?php else: ?>
<section class="section-title-breadcrumbs breadcrumbs py-3 py-lg-5 bg-yco-light">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <?php the_title('<h1 class="h2">' , '</h1>'); ?>
        
        <?php if (function_exists('bootstrap_breadcrumb')) bootstrap_breadcrumb(); ?>
      </div>
    </div>
  </section>
<?php endif; ?>