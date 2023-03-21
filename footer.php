<?php

/**

 * The template for displaying the footer

 *

 * Contains the closing of the #content div and all content after.

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package YachtClubOlbia

 */



?>



 


<?php 

if(!is_page_template('contacts.php')) get_template_part( 'template-parts/content', 'page-contactus' );

?>

<footer class="yco-footer-pattern d-flex flex-column justify-content-end">

  

  <div class="container">

	<p></p>

  </div>

  <div class="container">

	<small class="text-muted">

		&copy; <?php echo date('Y'); ?> - Yacht Club Olbia Associazione Sportiva Dilettantistica - Tutti i diritti riservati 

	</small>

	  

  </div>

</footer>



<?php wp_footer(); ?>



</body>

</html>

