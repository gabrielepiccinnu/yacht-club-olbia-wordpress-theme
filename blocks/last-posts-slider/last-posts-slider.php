<?php
/**
 * Last Posts Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'last-posts-slider-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text             = get_field( 'testimonial' ) ?: 'Your testimonial here...';
$author           = get_field( 'author' ) ?: 'Author name';
$author_role      = get_field( 'role' ) ?: 'Author role';
$image            = get_field( 'image' ) ?: 295;
$background_color = get_field( 'background_color' );
$text_color       = get_field( 'text_color' );

// Build a valid style attribute for background and text colors.
$styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
$style  = implode( '; ', $styles );

?>
 

<section class="overflow-hidden py-3 py-lg-5">
<div class="container">

<h2 class="h1 text-center text-primary mb-5">Ultime News</h2>




  <!-- Swiper -->
  <div class="swiper ycoLastPostsSwiper  py-3 py-lg-5">
    <div class="swiper-wrapper">
    <?php
	$recent_posts = wp_get_recent_posts(array(
		'numberposts' => 6, // Number of recent posts thumbnails to display
		'post_status' => 'publish' // Show only the published posts
	));
	foreach( $recent_posts as $post_item ) : ?>
      <div class="swiper-slide">
        
      <div class="card border-0 rounded-0 shadow">
  <?php echo get_the_post_thumbnail($post_item['ID'], 'yco-post-slide-thumbnail', array ("class" => "img-fluid card-img-top rounded-0")); ?>

  <div class="card-body p-lg-5 bg-card-gradient">
    <h5 class="h4 card-title text-primary"><?php echo $post_item['post_title'] ?></h5>
    <p class="card-text mb-5"> <?php echo get_the_excerpt($post_item['ID']) ?></p>
    <div class="text-end">
    <a href="<?php echo esc_url( get_permalink( $post_item['ID'] ) ); ?>" class="btn btn-outline-primary stretched-link"><?php _e('Read more', 'yachtclubolbia'); ?></a>
    </div>
  </div>
</div>



      
     
      
      </div>
      <?php endforeach; ?>
    </div>
    <div class="swiper-pagination d-none"></div>
  </div>
  </div>
  </section>

<?php 


function ycoLastPostsSwiper() {


echo
  '<script>
    document.addEventListener("DOMContentLoaded", function(event) { 
    var swiper = new Swiper(".ycoLastPostsSwiper", {
        slidesPerView: 1.2,
        spaceBetween: 30,
        breakpoints: {
         
          576: {
            slidesPerView: 1.5,
            spaceBetween: 30,
          },
 
          992: {
            slidesPerView: 2.5,
            spaceBetween: 30,
          },
          1440: {
            slidesPerView: 3.5,
            spaceBetween: 30,
          },
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
    });
  </script>';
}

add_action( 'wp_footer', 'ycoLastPostsSwiper' );
