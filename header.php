<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); 
	
	$theme_dir = get_stylesheet_directory_uri();
	$current_post_id = get_queried_object_id(); 
	
	?>

	<!-- Google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

	<!-- Schema markup for posts -->
	<?php if (is_singular('post') && (get_field('schema_posttype') == 'article')) : ?>
	<script type="application/ld+json">
	{
	"@context": "https://schema.org",
	"@type": "Article",
	"headline": "<?php echo single_post_title(); ?>",
	"description": "<?php echo the_seo_framework()->get_description(); ?>",
	"image": "<?php echo get_the_post_thumbnail_url( '', 'full' ); ?>",  
	"author": {
		"@type": "Organization",
		"name": "Wojciech Górski",
		"url": "https://w3wg.com"
	},  
	"publisher": {
		"@type": "Organization",
		"name": "W3WG Wojciech Górski",
		"logo": {
		"@type": "ImageObject",
		"url": "https://w3wg.com/wp-content/themes/wgv3/assets/svg/w3wg-logo-white.svg"
		}
	},
	"datePublished": "<?php echo get_the_date('d.m.Y'); ?>",
	"dateModified": "<?php echo the_modified_date('d.m.Y'); ?>"
	}
	</script>
	<?php endif; ?>

</head>

<?php if (is_singular('post') && get_field('prismjs_check', $current_post_id)) : ?>
<body <?php body_class('match-braces line-numbers'); ?> data-prismjs-copy="Skopiuj" data-prismjs-copy-error="Wciśnij Ctrl+C, aby skopiować kod" data-prismjs-copy-success="Skopiowano!">
<?php else : ?>
<body <?php body_class(); ?>>
<?php endif; ?>

<?php wp_body_open(); ?>

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Przejdź do zawartości', 'w3wg3' ); ?></a>

	<?php if (!is_page_template('template-homev2.php')) : ?>
	<header id="gora" class="site-header">
		<div class="container">
			<div class="row row-wrap stack-between row-header">

				<a href="<?php echo get_home_url(); ?>" class="logo-href"><svg data-src="<?php echo $theme_dir; ?>/assets/svg/w3wg-logo-white.svg" width="160" height="45" class="custom-logo logo-svg"></svg></a>

				<nav id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id' => 'primary-menu',
					)); ?>
				</nav><!-- #site-navigation -->

			</div>
		</div>
	</header><!-- #masthead -->
	<?php endif; ?>