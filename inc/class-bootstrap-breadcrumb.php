<?php

/**
 * 
 * @version 1.0
 *
 * @author ajulien
 * @link https://github.com/ajulien-fr/bootstrap_breadcrumb/blob/master/bootstrap-breadcrumb.php
 * 
 * I just update for schema.org compatibility 
 */


/**
 * Retrieve category parents.
 * @param  int $id Category ID.
 * @param  array $visited Optional. Already linked to categories to prevent duplicates.
 * @return string|WP_Error A list of category parents on success, WP_Error on failure.
 */
function custom_get_category_parents($id, $visited = array(), $taxonomy = 'category')
{

    $chain = '';
    $sep = '';
    //$sep = '<i class="las la-angle-right"></i>'; // (Line Awesome Font)
    $position = 1;
    $parent = get_term($id, $taxonomy);

    if (is_wp_error($parent))
        return $parent;

    $name = $parent->name;

    if ($parent->parent && ($parent->parent != $parent->term_id) && !in_array($parent->parent, $visited)) {
        $visited[] = $parent->parent;
        $chain .= custom_get_category_parents($parent->parent, $visited);
    }

    $chain .= '<li itemscope itemtype="https://schema.org/ListItem" class="breadcrumb-item"><a href="' . esc_url(get_category_link($parent->term_id)) . '" itemprop="item">' . $sep . '<span itemprop="name">' . $name . '</span></a>' .  '</span><meta itemprop="position" content="' . $position++ . '" /></li>';

    return $chain;
}

/**
 * Breadcrumb Function]
 * @return [string] [breadcrumb output]
 */
function bootstrap_breadcrumb()
{
    global $post;
    //$schema_link = 'http://data-vocabulary.org/Breadcrumb'; (discontinued by Google in favor of schema.org)
    $schema_link = 'https://schema.org/ListItem';
    //$html = '<nav aria-label="breadcrumb" class="small text-muted mb-5"><ol class="breadcrumb">'; (custom HTML edits)
    //$html = '<ol class="breadcrumb">';
    //$html = '<ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">';
    $html = '<ol class="breadcrumb mb-0" itemscope itemtype="https://schema.org/BreadcrumbList">'; // CTV Theme
    $sep = '';

    //$sep = '<i class="las la-angle-right"></i>'; // (Line Awesome Font)
    $position = 1;
    if ((is_front_page()) && (is_home())) {
        $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item active" aria-current="page"><span itemprop="name"><i class="fa fa-home"></i> ' . __('Home', 'ctv-immobiliare') .  '</span><meta itemprop="position" content="' . $position++ . '" /></li>';
    } elseif (is_front_page()) {
        // static homepage
        $html .= '<li itemscope itemtype="' . $schema_link . '" class="breadcrumb-item active" aria-current="page"><span itemprop="title"><i class="fa fa-home"></i> ' . __('Home', 'ctv-immobiliare') . '</span></li>';
    } elseif (is_home()) {
        // blog page
        $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item"><a href="' . esc_url(home_url('/')) . '" itemprop="item"><span itemprop="name"><i class="fa fa-home"></i> ' . __('Home', 'ctv-immobiliare') . '</span></a><meta itemprop="position" content="' . $position++ . '" /></li>';
        
        $html .= '<li itemscope itemtype="' . $schema_link . '" class="breadcrumb-item active" aria-current="page"><span itemprop="title">' . __('Blog', 'ctv-immobiliare') . '</span></li>';
    } else {
        $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item"><a href="' . esc_url(home_url('/')) . '" itemprop="item"><span itemprop="name"><i class="fa fa-home"></i> ' . __('Home', 'ctv-immobiliare') . '</span></a><meta itemprop="position" content="' . $position++ . '" /></li>';

        if (is_attachment()) {
            $parent = get_post($post->post_parent);
            $categories = get_the_category($parent->ID);

            if ($categories[0]) {
                $html .= custom_get_category_parents($categories[0]);
            }

            $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item"><a href="' . esc_url(get_permalink($parent)) . '" itemprop="item">' . $sep . '<span itemprop="name">' . $parent->post_title . '</span></a><meta itemprop="position" content="' . $position++ . '" /></li>';
            $html .= $sep;
            $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item active" aria-current="page">' . $sep . '<span itemprop="name">' . get_the_title() . '</span><meta itemprop="position" content="' . $position++ . '" /></li>';
        }
        if (get_page_by_path('blog')) {
            if (!is_page()) {
                $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item"><a href="' . get_permalink(get_page_by_path('blog')) . '" itemprop="item">' . $sep . '<span itemprop="name">' . __('Blog', 'ctv-immobiliare') . '</span></a><meta itemprop="position" content="' . $position++ . '" /></li>';
            }
        }

        if (is_category()) {
            $category = get_category(get_query_var('cat'));

            if ($category->parent != 0) {
                $html .= custom_get_category_parents($category->parent);
            }

            $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item active" aria-current="page">' . $sep . '<span itemprop="name">' . single_cat_title('', false) .  '</span><meta itemprop="position" content="' . $position++ . '" /></li>';
        } elseif (is_page() && !is_front_page()) {
            $parent_id = $post->post_parent;
            $parent_pages = array();

            while ($parent_id) {
                $page = get_page($parent_id);
                $parent_pages[] = $page;
                $parent_id = $page->post_parent;
            }

            $parent_pages = array_reverse($parent_pages);

            if (!empty($parent_pages)) {
                foreach ($parent_pages as $parent) {
                    $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item"><a href="' . esc_url(get_permalink($parent->ID)) . '" itemprop="item">' . $sep . '<span itemprop="name">' . get_the_title($parent->ID) . '</span></a><meta itemprop="position" content="' . $position++ . '" /></li>';
                }
            }

            $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item active" aria-current="page">' . $sep . '<span itemprop="name">' . get_the_title() .  '</span><meta itemprop="position" content="' . $position++ . '" /></li>';
        } elseif (is_singular('post')) {
            $categories = get_the_category();

            if ($categories[0]) {
                $html .= custom_get_category_parents($categories[0]);
            }

            $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item active" aria-current="page">' . $sep . '<span itemprop="name">' . get_the_title() .  '</span><meta itemprop="position" content="' . $position++ . '" /></li>';
        } elseif (is_tag()) {
            $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item active" aria-current="page">' . $sep . '<span itemprop="name">' . single_tag_title('', false) .  '</span><meta itemprop="position" content="' . $position++ . '" /></li>';
        } elseif (is_day()) {
            $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item"><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '" itemprop="item">' . $sep . '<span itemprop="name">' . get_the_time('Y') . '</span></a><meta itemprop="position" content="' . $position++ . '" /></li>';
            $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item"><a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '" itemprop="item">' . $sep . '<span itemprop="name">' . get_the_time('m') . '</span></a><meta itemprop="position" content="' . $position++ . '" /></li>';
            $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item active" aria-current="page">' . $sep . '<span itemprop="name">' . get_the_time('d') .  '</span><meta itemprop="position" content="' . $position++ . '" /></li>';
        } elseif (is_month()) {
            $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item"><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '" itemprop="item">' . get_the_time('Y') . '</a></li>';
            $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item active" aria-current="page">' . $sep . '<span itemprop="name">' . get_the_time('F') .  '</span><meta itemprop="position" content="' . $position++ . '" /></li>';
        } elseif (is_year()) {
            $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item active" aria-current="page">' . $sep . '<span itemprop="name">' . get_the_time('Y') .  '</span><meta itemprop="position" content="' . $position++ . '" /></li>';
        } elseif (is_author()) {
            $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item active" aria-current="page">' . $sep . '<span itemprop="name">' . get_the_author() .  '</span><meta itemprop="position" content="' . $position++ . '" /></li>';
        } elseif (is_search()) {
        } elseif (is_404()) {
        } elseif (is_singular('service')) {
            //$offercategories = get_the_terms( get_the_ID(), 'property_type' );

            /*if ( $offercategories[0] ) {
                $html .= custom_get_category_parents($offercategories[0], 'property_type');
            }*/

            $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item active" aria-current="page">' . $sep . '<span itemprop="name">' . get_the_title() .  '</span><meta itemprop="position" content="' . $position++ . '" /></li>';
        } elseif (is_singular('properties')) {
            $property_types = get_the_terms(get_the_ID(), 'property_type');

            if ($property_types[0]) {
                $html .= custom_get_category_parents($property_types[0], 'property_type');
            }

            $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item active" aria-current="page">' . $sep . '<span itemprop="name">' . get_the_title() .  '</span><meta itemprop="position" content="' . $position++ . '" /></li>';
        }

        /* EXAMPLE: ADD YOUR CPT ON BREADCRUMB STRUCTURE
          elseif ( is_singular('MY_CPT') ) {
            $offercategories = get_the_terms( get_the_ID(), 'MY_CPT_TAX' );
 
            if ( $my_cpt_categories[0] ) {
                $html .= custom_get_category_parents($my_cpt_categories[0], 'MY_CPT_TAX');
            }
            
            $html .= '<li itemprop="itemListElement" itemscope itemtype="' . $schema_link . '" class="breadcrumb-item active" aria-current="page">' . $sep . '<span itemprop="name">' . get_the_title() .  '</span><meta itemprop="position" content="' . $position++ .'" /></li>';
        }
        */
    }

    //  $html .= '</ol></nav>';
    $html .= '</ol>';

    echo $html;
}