<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package YachtClubOlbia
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'yachtclubolbia' ); ?></a>

	<header class="fixed-top">
    <nav class="navbar navbar-expand d-none d-lg-flex bg-white">
      <div class="container">

	  
		<?php
            wp_nav_menu(array(
                'theme_location' => 'top-menu',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto mb-2 mb-lg-0 %2$s">%3$s</ul>',
                'depth' => 1,
                'walker' => new WP_Bootstrap_Navwalker()
            ));
            ?>

        <!--ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Scuola di Vela</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Eventi</a>
          </li>
        </ul-->
        <a href="#login" class="btn btn-outline-primary btn-yachtclubolbia-icon btn-border-radius-lg">Area soci <i class="yachtclubolbia-icon icon-login"></i></a>


      </div>
    </nav>

    <nav class="navbar navbar-dark navbar-expand-lg navbar-main-yco bg-primary">
      <div class="container">
        <a class="navbar-brand" href="<?php echo get_home_url(); ?> "><span class="yachtclubolbia-logo"></span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

		<?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto mb-2 mb-lg-0 %2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new WP_Bootstrap_Navwalker()
            ));
            ?>

			
          <!--ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Scuola di Vela</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Eventi</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Club
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Modulistica</a></li>
                <li><a class="dropdown-item" href="#">Eventi</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>

          </ul-->

        </div>
      </div>
    </nav>
  </header>