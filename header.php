<?php session_start(); ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?><?php echo get_bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script> 
	<![endif]--> 
	<?php wp_head(); ?>
	
	<?php // add css files here // ?>
	<!--build:css style.css -->
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/style.css?version=<?php echo time(); ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/js/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
	<!--endbuild-->
	
	<?php // add js files here // ?> 
	<!--build:js js/scripts.min.js -->
	<script src="<?php echo get_bloginfo('template_url'); ?>/js/fancybox/source/jquery.fancybox.pack.js"></script>
	<script src="<?php echo get_bloginfo('template_url'); ?>/js/bxslider/jquery.bxslider.min.js"></script>
	<script src="<?php echo get_bloginfo('template_url'); ?>/js/flowtype.js"></script>
	<script src="<?php echo get_bloginfo('template_url'); ?>/js/jquery.mousewheel.js"></script>
	<script src="<?php echo get_bloginfo('template_url'); ?>/js/jquery.easing.1.3.js"></script>
	<script src="<?php echo get_bloginfo('template_url'); ?>/js/jqueryscripts.js"></script>
   	<!--endbuild-->
</head>
<body>
	<div class="outer-nav">
		<div class="inner-nav">
			<p>new new new</p>
			<?php
			if(get_field('harworth_logo_type','option') == "blue"){
				echo "<a class=\"project-by harworth-blue\" href=\"" . get_field('harworth_logo_url','option') . "\" target=\"_blank\">";
				echo "<div class=\"text\">A project by</div>";
				echo "<img src=\"" . get_bloginfo('template_url') . "/images/harworth-white.png\" />";
				echo "<div class=\"clear\"></div>";
				echo "</a>";
			}
			if(get_field('harworth_logo_type','option') == "white"){
				echo "<a class=\"project-by harworth-white\" href=\"" . get_field('harworth_logo_url','option') . "\" target=\"_blank\">";
				echo "<div class=\"text\">A project by</div>";
				echo "<img src=\"" . get_bloginfo('template_url') . "/images/harworth-blue.png\" />";
				echo "<div class=\"clear\"></div>";
				echo "</a>";
			}
			?>
			
			<!--<div class="nav">
				<div class="menu-toggle">
					<div id="nav-icon">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
				<div class="clear"></div>
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'nav-menu' ) ); ?>
				<div class="clear"></div>
			</div>-->
		
		</div>
	</div>
	
	<div class="outer-header" style="background-color: <?php echo get_field('header_color','option'); ?>">
		<div class="header">
			<div class="logo">
				<?php
					$logo = get_field('site_logo','option');
					$logo = $logo['url'];
					echo "<a href=\"" . get_bloginfo('url') . "\"><img src=\"" . $logo . "\" /></a>";
				?>
			</div>
			
			
			<div class="clear"></div>
		</div>
	</div>
	
	
	
	
	
			
	
	
	
	
	
	
