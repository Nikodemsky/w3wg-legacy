<?php get_header(); ?>

<main id="primary" class="site-main">
	<section id="zawartosc-strony" class="default-page-wrapper">
		<div class="container">
			<!-- Nie moj kod matrixa! Pochodzi z codepena: https://codepen.io/yaclive/pen/EayLYO -->
			<canvas id="matrix-light" class="matrix-hidden"></canvas>
			<canvas id="matrix-dark"></canvas>
			<aside>
				<h1 class="default-page-header-title"><?php _e('Błąd 404: Nie znaleziono','w3wg3'); ?></h1>
				<div class="error-addon">
					<p><?php _e('Strona, której szukasz została usunięta, przeniesiona lub jest tymczasowo niedostępna.','w3wg3'); ?></p>
				</div>
				<div class="error-btn"><a href="https://w3wg.com" rel="nofollow" class="big-title-btn" title="przekierowanie do bloga"><?php _e('Wróć do strony głównej','w3wg3'); ?></a></div>
			</aside>
		</div>
	</section>

</main><!-- #main -->

<?php
get_footer();