<?php get_header(); ?>

<main id="primary" class="site-main">
	<section id="zawartosc-wpisu" class="default-post-wrapper default-page-wrapper">
		<div class="container">
			<article>
				<h1 class="default-page-header-title"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</article>
		</div>
	</section>
</main><!-- #main -->

<?php get_footer();