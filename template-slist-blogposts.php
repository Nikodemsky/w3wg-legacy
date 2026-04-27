<?php /* Template Name: Standard List */ get_header(); 

// ACF vars
$list = get_field('positions_list');
$welcome_txt = get_field('welcome_txt');
$end_txt = get_field('end_txt');

?>

<main id="primary" class="site-main">
	<section id="zawartosc-strony" class="default-page-wrapper">
		<div class="container">

			<h1 class="default-page-header-title"><?php the_title(); ?></h1>
			<?php if ($welcome_txt) : echo '<article id="intro">'.$welcome_txt.'</article>'; endif; ?>

			<?php if ($list) : ?>
			<div class="list-grid">

				<?php foreach ($list as $sl) : 

				// vars
				$title = $sl['single_title'];
				$url = $sl['single_url'];
				$img = $sl['single_img'];
				$desc = $sl['single_desc'];

				?>

				<div class="sl">

					<p style="margin:15px 0" class="slv2-title"><img aria-hidden="true" src="https://w3wg.com/wp-content/uploads/2019/03/gold-star2.svg" alt="oznaczenie wpisu listy" width="18" height="17" role="img" /> 
						<?php if ($url) : ?><a target="_blank" href="<?php echo $url; ?>" style="text-decoration:none;color:#fff" rel="noopener noreferrer"><?php endif; ?>
						<strong><?php echo $title; ?></strong>
						<?php if ($url) : ?></a><?php endif; ?>
					</p>

					<?php 
						if ($img) : echo wp_get_attachment_image( $img, 'full' ); endif;
						if ($desc) : echo '<aside>'.$desc.'</aside>'; endif; 
					?>

					<hr style="background-color: #ffffff4f;margin-top:2em;">

				</div>

				<?php endforeach; ?>

			</div>
			<?php endif; ?>

			<?php if ($end_txt) : echo '<article id="tekst-wyjsciowy">'.$end_txt.'</article>'; endif; ?>

		</div>
	</section>

</main><!-- #main -->

<?php
get_footer();