<?php /* Template Name: Plugins */ get_header(); 

// ACF vars
$plugins_list = get_field('wtyczka');
$txt_after = get_field('end_txt_plugins', false);

?>

<main id="primary" class="site-main">
	<section id="zawartosc-strony" class="default-page-wrapper">
		<div class="container">

			<h1 class="default-page-header-title"><?php the_title(); ?></h1>

			<article id="intro"><?php the_content(); ?></article>

			<?php if ($plugins_list) : ?>
			<div class="plugins-grid">

				<?php foreach ($plugins_list as $plugin) : 

				// vars
				$p_image = $plugin['obraz_wtyczki'];
				$p_url = $plugin['url_wtyczki'];
				$p_name = $plugin['nazwa_wtyczki'];
				$p_desc = $plugin['opis_wtyczki'];
				$p_addon = $plugin['rozszerzenie_wtyczki'];

				?>

				<?php if (wp_is_mobile()) : ?>

				<div class="hentry">
					<a href="<?php echo $p_url; ?>" target="_blank" rel="nofollow noopener noreferrer" class="mobile-plugin-title"><div class="plugin-showcase">
					<?php echo wp_get_attachment_image($p_image, 'full', false, ['class'=>'plugin-banner']); ?>
					  <p class="plugin-showcase-title"><?php echo $p_name; ?></p>
					  <?php if($p_addon): ?>
						<div class='bonus'><?php _e('Rozszerzenie do wtyczki','w3wg3'); ?></div>
						<?php endif; ?>
					</div></a>
					
					<?php echo apply_filters('the_content', $p_desc); ?>
					<hr style="margin: 30px 0;">
				</div>	

				<?php else : ?>

				<div class="hentry">
					<div class="plugin-showcase">
					<?php echo wp_get_attachment_image($p_image, 'full', false, ['class'=>'plugin-banner']); ?>
					  <p class="plugin-showcase-title"><a href="<?php echo $p_url; ?>" target="_blank" rel="nofollow noopener noreferrer"><?php echo $p_name; ?></a></p>
					  <?php if($p_addon): ?>
						<div class='bonus'><?php _e('Rozszerzenie do wtyczki','w3wg3'); ?></div>
						<?php endif; ?>
					  </div>
					  <?php echo apply_filters('the_content', $p_desc); ?>
					  <hr style="margin: 30px 0;">
				</div>

				<?php endif; ?>

				<?php endforeach; ?>

			</div>
			<?php endif; ?>

			<article id="tekst-wyjsciowy"><?php echo apply_filters('the_content', $txt_after); ?></article>

		</div>
	</section>

</main><!-- #main -->

<?php
get_footer();