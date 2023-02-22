

<?php
$i = 0;
/* Start the Loop */
while ( have_posts() ) :
	?>
	


	<?php 
	the_post();

	
	/*
	 * Include the Post-Type-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
	 */
	//get_template_part( 'template-parts/content', get_post_type() );

	?>

<?php if ($i == 0) { ?>
				<!-- Blog item START -->
				<div class="col-md-6 col-lg-4">
				<div class="card bg-transparent">
					<!-- Image -->
					<div class="position-relative">
						<img src="assets/images/blog/07.jpg" class="card-img" alt="">
						<?php  
						the_post_thumbnail('thumbnail', ['class' => 'img-fluid card-img', 'title' => 'Feature image']); ?>
						<!-- Badge -->
						<div class="card-img-overlay p-3">
							<a href="#" class="badge text-bg-warning mb-2">History</a>
						</div>
					</div>

					<!-- Card body -->
					<div class="card-body p-3 pb-0">
						<!-- Title -->
						<h5 class="card-title mt-2"><a href="blog-detail.html">7 common mistakes everyone makes while traveling</a></h5>
						<h6 class="fw-light mb-0">By <a href="#">Joan Wallace</a></h6>
					</div>
				</div>
			</div>
			<!-- Blog item END -->

			<?php } else { ?>

			<!-- Blog item START -->
			<div class="col-md-6 col-lg-4">
				<div class="card bg-light p-3">
					<div class="card-body">
						<!-- Badge -->
						<a href="<?php the_permalink(); ?>"  class="badge text-white bg-primary mb-2">Research</a>
						<!-- Title -->
						<h5 class="card-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?> </a></h5>
						<p><?php the_excerpt(); ?></p>
					</div>
				</div>
			</div>
			<!-- Blog item END -->
			<?php } ?>
	<?php
	
$i++;
endwhile;

?>

<div class="row g-4 d-none">


</div>

<div class="row g-4 d-none">
			<!-- Blog item START -->
			<div class="col-md-6 col-lg-4">
				<div class="card bg-transparent">
					<!-- Image -->
					<div class="position-relative">
						<img src="assets/images/blog/07.jpg" class="card-img" alt="">
						<!-- Badge -->
						<div class="card-img-overlay p-3">
							<a href="#" class="badge text-bg-warning mb-2">History</a>
						</div>
					</div>

					<!-- Card body -->
					<div class="card-body p-3 pb-0">
						<!-- Title -->
						<h5 class="card-title mt-2"><a href="blog-detail.html">7 common mistakes everyone makes while traveling</a></h5>
						<h6 class="fw-light mb-0">By <a href="#">Joan Wallace</a></h6>
					</div>
				</div>
			</div>
			<!-- Blog item END -->



			<!-- Blog item START -->
			<div class="col-md-6 col-lg-4">
				<div class="card bg-transparent">
					<!-- Image -->
					<div class="position-relative">
						<img src="assets/images/blog/11.jpg" class="card-img" alt="">
						<!-- Badge -->
						<div class="card-img-overlay p-3">
							<a href="#" class="badge text-bg-danger mb-2">Business</a>
						</div>
					</div>

					<!-- Card body -->
					<div class="card-body p-3 pb-0">
						<!-- Title -->
						<h5 class="card-title"><a href="blog-detail.html">Best Twitter accounts for learning about investment</a></h5>
						<h6 class="fw-light mb-0">By <a href="#">Carolyn Ortiz</a></h6>
					</div>
				</div>
			</div>
			<!-- Blog item END -->

			<!-- Blog item START -->
			<div class="col-md-6 col-lg-4">
				<div class="card h-100 bg-transparent">
					<!-- Card image -->
					<div class="card-img-top rounded overflow-hidden position-relative hover-overlay-top">
						<div class="ratio ratio-4x3 bg-dark">
							<iframe src="https://player.vimeo.com/video/167434033?title=0&amp;byline=0&amp;portrait=0" allowfullscreen=""></iframe>
						</div>
					</div>
					<!-- Card Body -->
					<div class="card-body p-3 pb-0">
						<!-- badge -->
						<a href="#" class="badge text-bg-info mb-2">Technology</a>
						<!-- Title -->
						<h5 class="card-title"><a href="blog-detail.html">10 things you need to know about Booking</a></h5>
						<h6 class="fw-light mb-0">By <a href="#">Amanda Reed</a></h6>
					</div>
				</div>
			</div>
			<!-- Blog item END -->

			<!-- Blog item START -->
			<div class="col-md-6 col-lg-4">
				<div class="card bg-transparent">
					<!-- Image -->
					<div class="position-relative">
						<img src="assets/images/blog/09.jpg" class="card-img" alt="">
						<!-- Badge -->
						<div class="card-img-overlay p-3">
							<a href="#" class="badge text-bg-dark mb-2">Adventure</a>
						</div>
					</div>

					<!-- Card body -->
					<div class="card-body p-3 pb-0">
						<!-- Title -->
						<h5 class="card-title"><a href="blog-detail.html">Never underestimate the influence of social media</a></h5>
						<h6 class="fw-light mb-0">By <a href="#">Bryan Knight</a></h6>
					</div>
				</div>
			</div>
			<!-- Blog item END -->

			<!-- Blog item START -->
			<div class="col-md-6 col-lg-4">
				<div class="card bg-transparent">
					<!-- Image -->
					<div class="position-relative">
						<img src="assets/images/blog/12.jpg" class="card-img" alt="">
						<!-- Badge -->
						<div class="card-img-overlay p-3">
							<a href="#" class="badge text-bg-success mb-2">Hotel Service</a>
						</div>
					</div>

					<!-- Card body -->
					<div class="card-body p-3 pb-0">
						<!-- Title -->
						<h5 class="card-title"><a href="blog-detail.html">This is why this year will be the year of startups</a></h5>
						<h6 class="fw-light mb-0">By <a href="#">Carolyn Ortiz</a></h6>
					</div>
				</div>
			</div>
			<!-- Blog item END -->
		</div>