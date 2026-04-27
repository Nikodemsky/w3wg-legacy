<?php if (!is_page_template('template-homev2.php')) : $current_url = get_the_permalink(); ?>
<footer id="colophon" class="site-footer">
	<div class="container">

		<?php if (is_singular('post')) : $theme_dir = get_stylesheet_directory_uri(); ?>
		<div class="row row-wrap stack-between row-above-footer post-addons">

			<div class="share-post" aria-hidden="true" data-nosnippet>

				<span class="shareon"><?php _e('Podziel się na:','w3wg3'); ?></span>

				<a data-sharer="facebook" data-url="<?php echo $current_url; ?>" rel="nofollow" class="single-share" href="#!"><svg data-src="<?php echo $theme_dir; ?>/assets/svg/sm-share2/fb.svg" width="25" height="25"></svg></a>
				<a data-sharer="linkedin" data-url="<?php echo $current_url; ?>" rel="nofollow" class="single-share" href="#!"><svg data-src="<?php echo $theme_dir; ?>/assets/svg/sm-share2/lin.svg" width="25" height="25"></svg></a>
				<a data-sharer="twitter" data-url="<?php echo $current_url; ?>" rel="nofollow" class="single-share" href="#!"><svg data-src="<?php echo $theme_dir; ?>/assets/svg/sm-share2/x.svg" width="25" height="25"></svg></a>
				<a data-sharer="bluesky" data-url="<?php echo $current_url; ?>" rel="nofollow" class="single-share" href="#!"><svg data-src="<?php echo $theme_dir; ?>/assets/svg/sm-share2/bluesky.svg" width="25" height="25"></svg></a>
				<a data-sharer="threads" data-url="<?php echo $current_url; ?>" rel="nofollow" class="single-share" href="#!"><svg data-src="<?php echo $theme_dir; ?>/assets/svg/sm-share2/threads.svg" width="25" height="25"></svg></a>
				<a data-sharer="reddit" data-url="<?php echo $current_url; ?>" rel="nofollow" class="single-share" href="#!"><svg data-src="<?php echo $theme_dir; ?>/assets/svg/sm-share2/reddit.svg" width="25" height="25"></svg></a>

			</div>

			<a href="#gora" onclick="smoothScrollToId('gora', 500, 30); return false;" rel="nofollow" class="totop" aria-hidden="true" data-nosnippet><svg data-src="<?php echo $theme_dir; ?>/assets/svg/goup.svg" width="17" height="20"></svg></a>

			<div class="post-date">		
				<?php if ( get_the_modified_time( 'U' ) > get_the_time( 'U' ) ) { ?>				
					<?php _e('Aktualizacja:','w3wg3'); ?> <?php the_modified_date('j F Y'); ?>				
					<?php } else { ?>		
					<?php echo get_the_time('j F Y'); ?>
				<?php } ?>				
			</div>

		</div>
		<?php endif; ?>

		<div class="row row-wrap stack-between row-footer">
			<div class="footer-info">© W3WG Wojciech Górski <?php echo date("Y"); ?></div> 
			<div class="rightcol-links" aria-hidden="true" data-nosnippet>
				<a rel="privacy-policy" href="<?php if (get_locale() == 'en_US') : echo get_page_link(4632); else : echo get_privacy_policy_url(); endif; ?>"><?php _e('Polityka prywatności','w3wg3'); ?></a>
				<?php /* <span>&#8226;</span>
				<a rel="nofollow" href="<?php echo get_page_link(3734); ?>"><?php _e('Ustawienia prywatnosci','w3wg3'); ?></a> */ ?>
			</div>
		</div>

	</div>
</footer><!-- #colophon -->
<?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); $theme_dir = get_stylesheet_directory_uri(); ?>

<ul class="sm-external">
	<li><a href="https://github.com/Nikodemsky" rel="me" target="_blank"><svg data-src="<?php echo $theme_dir; ?>/assets/svg/sm-href/github.svg" width="20" height="25"></svg></a></li>
	<li><a href="https://www.linkedin.com/in/wg-w3wg/" rel="me" target="_blank"><svg data-src="<?php echo $theme_dir; ?>/assets/svg/sm-href/linkedin.svg" width="20" height="25"></svg></a></li>
</ul>

<?php echo do_shortcode( '[bogo]' ); ?>

<div id="przelacznik-dark-light-mode" class="style-switcher" role="navigation">
	<span id="light-mode" role="button" tabindex="-1"><?php _e('Jasny','w3wg3'); ?></span>
	<span aria-hidden="true">/</span>
	<span id="dark-mode" class="current" role="button"  tabindex="-1"><?php _e('Ciemny','w3wg3'); ?></span>
</div>

<?php if (current_user_can('manage_options')) : ?>
<button id="przelacznik-rozmiaru-fonta" class="wcag-font-change font-bigger">
	A<span>A</span>+
</button>
<?php endif; ?>

</body>
</html>