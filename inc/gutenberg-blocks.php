<?php

add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
    //register_block_type( __DIR__ . '/blocks/testimonial' );
    register_block_type( get_template_directory() . '/blocks/testimonial' );
    register_block_type( get_template_directory() . '/blocks/last-posts-slider' );
}



