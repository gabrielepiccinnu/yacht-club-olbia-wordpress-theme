<?php 

/**
 * Template name: Homepage
 */

 get_header(); ?>

 
<?php get_template_part( 'template-parts/content', 'homepage-slider' ); ?>



<!-- DUMMY CONTENT -->

<div class="container py-5">
  <div class="row align-items-center">
    <div class="col-md-5 pe-lg-5">
      <p class="section-pretitle mb-2">Yacht Club Olbia</p>
      <h2 class="h1 mb-5">Scuola di Vela</h2>
      <p>La scuola vela racchiude il vero scopo dello Yacht Club Olbia.</p>
      <p>Il primo obiettivo che il Club si prefigge è proprio quello di permettere a chiunque lo desideri di saper andar per mare … a vela!</p>
      <p></p>Corollario nobile di questo progetto è diffondere lo sport della vela e della cultura del mare, con le sue regole, per poterlo meglio affrontare nel rispetto dei valori etici e delle sane abitudini di vita legate allo sport, ma anche con la necessaria conoscenza degli elementi che ci circondano e con la fantasia nel trovare una strada sempre diversa, cercando di migliorarsi.<p></p>
      <p>Non sono secondari il rispetto dei regolamenti e degli avversari e la conoscenza dei propri limiti che possono offrire un determinante supporto all’educazione e allo sviluppo della persona</p>
      <p></p>
    </div>
    <div class="col-md-7">
      <img src="<?php echo get_template_directory_uri(); ?> /img/scuola-vela.jpg" class="img-fluid" alt="">

    </div>
  </div>
</div>


<!-- DUMMY CONTENT -->

<section>
<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'homepage' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
</section>



<?php get_footer(); ?>