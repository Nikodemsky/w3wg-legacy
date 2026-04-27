<?php get_header(); /* Template name: Home v2 */ 

// Globals
$theme_dir = get_stylesheet_directory_uri();

// ACF vars
$claim_txt = get_field('claim_txt');
$projects = get_field('projects_list');
$whoami_txt = get_field('whoiam_txt');
$hobby_txt = get_field('hobby_txt');

$whatido_header = get_field('whatido_header');
$whatido_txt = get_field('whatido_txt');

?>

<main id="primary" class="site-main">

	<!-- Claim -->

	<section id="sekcja-wstepu" class="wg-claim-header">
		<div class="home-container">
			<div class="claim-wrapper">

				<div class="top-part-spacer" aria-hidden="true"></div>

				<div class="middle-part">
					<aside class="intro"><?php echo $claim_txt; ?></aside>
				</div>

				<div class="bottom-part-learn-more">
					<a href="#omnie-i-projekty" onclick="smoothScrollToId('omnie-i-projekty', 500, 30); return false;" class="bordered-simple-btn" rel="nofollow" title="<?php _e('Dowiedz się więcej o mnie','w3wg3'); ?>"><?php _e('Dowiedz się więcej','w3wg3'); ?></a>
				</div>

			</div>
		</div>
	</section>

	<!-- More -->

	<section id="omnie-i-projekty" class="more-info-wrapper">
		<div class="home-container-mid">
			<div class="row row-wrap stack-between row-more-home">

				<!-- Projects -->

				<div class="col-half">

					<span class="home-section-title"><?php _e('Przykładowe projekty','w3wg3'); ?></span>

					<div class="accordions-home-wrapper">

						<?php $acc_i=0; foreach ($projects as $p) : $acc_i++;

						$name = $p['sp_name'];
						$url = $p['sp_url'];
						$desc = $p['sp_desc']; ?>

						<div class="accordion">

							<div 
							class="accordion__intro" 
							role="button" 
							tabindex="0"
							id="accordion-nr-<?php echo $acc_i; ?>"
							aria-expanded="false" 
							aria-controls="accordion-content-<?php echo $acc_i; ?>">
								<?php echo $name; ?>
							</div>

							<div class="accordion__content" id="accordion-content-<?php echo $acc_i; ?>" aria-labelledby="accordion-nr-<?php echo $acc_i; ?>">
								<span class="project-desc"><?php echo $desc; ?></span>
								<a 
								href="<?php echo $url; ?>" 
								target="_blank" 
								rel="nofollow" 
								class="project-url"
								title="<?php _e('Przekierowanie na zewnętrzną witrynę.','w3wg3'); ?>"
								aria-label="<?php _e('Przekierowanie na zewnętrzną witrynę zaimplementowanego projektu - link otwiera się w nowej zakładce','w3wg3'); ?>"><?php echo $url; ?></a>
							</div>
						</div>

						<?php endforeach; ?>

					</div>

				</div>

				<!-- About me and my hobbies -->

				<div class="col-half">

					<div class="about-me-wrapper" role="region" aria-label="<?php _e('Sekcja opisowa mówiąca więcej o mnie.','w3wg3'); ?>">
						<h2 class="home-section-title"><?php _e('Kim jestem','w3wg3'); ?></h2>
						<article><?php echo $whoami_txt; ?></article>
					</div>

					<div class="myhobby-wrapper" role="region" aria-label="<?php _e('Sekcja opisowa mówiąca więcej o moich zainteresowaniach.','w3wg3'); ?>">
						<h3 class="home-section-title"><?php _e('Co robię w wolnym czasie','w3wg3'); ?></h3>
						<article><?php echo $hobby_txt; ?></article>
					</div>

				</div>

			</div>
		</div>

		<?php /* if (is_user_logged_in()) : ?>
		<?php if ($whatido_header && $whatido_txt) : ?>
			<details>
				<summary><?php echo $whatido_header; ?></summary>
				<div class="what-i-do" id="co-robie-uslugi"><?php echo $whatido_txt; ?></div>
			</details>
		<?php endif; ?>
		<?php endif; */ ?>

		<a href="#co-dalej" onclick="smoothScrollToId('co-dalej', 500, 30); return false;"  class="bordered-simple-btn" rel="nofollow" title="<?php _e('Przekierowanie do nawigacji','w3wg3'); ?>"><?php _e('Co dalej?','w3wg3'); ?></a>
	</section>

	<!-- Home bottom navigation -->

	<section id="co-dalej" class="home-bottom-nav-wrapper">
		<div class="home-container-mid">
			<div class="row row-wrap stack-between row-home-btm-nav">
				<div class="col-half">
					<a role="heading" href="mailto:&#105;&#110;&#102;&#111;&#64;&#119;&#51;&#119;&#103;&#46;&#99;&#111;&#109;" class="big-title-btn" title="<?php _e('Kontakt ze mną','w3wg3'); ?>"><?php _e('Skontaktuj się','w3wg3'); ?></a>
				</div>
				<div class="col-half">
					<a role="heading" href="<?php if (get_locale() == 'en_US') : echo get_page_link(4720); else : echo get_page_link(3545); endif; ?>" class="big-title-btn" title="<?php _e('Przekierowanie do bloga','w3wg3'); ?>" rel="next"><?php _e('Przejdź do bloga','w3wg3'); ?></a>
				</div>
			</div>
		</div>
	</section>

</main><!-- #main -->

<?php
get_footer();