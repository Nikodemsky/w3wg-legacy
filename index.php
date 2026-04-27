<?php get_header(); ?>

<main id="primary" class="site-main">

	<div class="container">

		<div id="kategorie" class="categories-list row row-wrap stack-between row-blogtop">

			<ul class="leftcol-catlist" role="navigation">
				<?php wp_list_categories(array('title_li' => '','order' => 'DESC', 'use_desc_for_title' => 1)); ?>	
			</ul>

			<h1 class="blogtitle"><?php _e('Blog','w3wg3'); ?></h1>

		</div>

		<div id="lista-wpisow" class="blogposts-grid">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 

			// vars
			$cat = get_the_category();
			$first_cat = $cat[0]->name;
			$url = get_the_permalink();
			$date = get_the_date('d.m.Y');

			?>

				<a 
				rel="next" 
				class="post-fullblock"
				title="<?php _e('Przekierowanie do wpisu blogowego z treścią','w3wg3'); ?>"
				aria-label="<?php _e('Link przekierowujący do wpisu z treścią','w3wg3'); ?>"
				href="<?php echo $url; ?>">

					<div class="single-blogpost-onlist">
						<aside>

							<div class="sbo-top-meta">
								<h3 class="sbo-title"><?php the_title(); ?></h3>
								<span class="catname-sbo"><?php echo $first_cat; ?></span>
							</div>

							<time aria-label="<?php _e('Data publikacji wpisu','w3wg3'); ?>"><?php echo $date; ?></time>

						</aside>
					</div>
			
				</a>

			<?php endwhile; else : endif; ?>

		</div>

		<div class="post-navi"><?php wp_pagenavi(); ?></div>

	</div>

</main><!-- #main -->

<?php
get_footer();