<?php get_header();?>


<main id="primary" class="site-main">

	<?php
	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) :
			?>
            <header>
                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>
		<?php
		endif;

		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/*
			 * Include the Post-Type-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content.php', get_post_type() );

		endwhile;

		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content-none.php', 'none' );

	endif;
	?>

</main><!-- #main -->


<section class="newsletter-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-7">
                <h4>Subscribe And Tell Us Real Story About Your Journey</h4>
            </div>
            <div class="col-sm-8 col-md-5 col-sm-offset-2 col-md-offset-0">
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email">
                    <button class="nl-send-btn">subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>


<section class="footer-top-section spad">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 footer-top-content">
                <div class="section-title title-left">
                    <h2>Contact Us</h2>
                </div>
                <h3>New York, USA</h3>
                <p>207 Park Avenue New York, NY 90210</p>
                <p><span>Email:</span> <a href="../../cdn-cgi/l/email-protection" class="__cf_email__"
                                          data-cfemail="670e0901082704080b08150b0e054904080a">[email&#160;protected]</a>
                </p>
                <h4>Phone:</h4>
                <h5>+1 (409) 987–4567</h5>
            </div>
        </div>
    </div>

    <div class="map-area" id="map-canvas"></div>
</section>

<?php get_footer();?>
