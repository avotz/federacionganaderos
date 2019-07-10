<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fedeganaderos
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
	<link href="<?php echo get_template_directory_uri(); ?>/fonts/css/fontawesome.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/fonts/css/brands.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/fonts/css/solid.css" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="top">
		<div class="inner">
			<div class="top-container">
				<div class="top-contact">

					<a href="<?php echo esc_url( home_url( '/contactenos' ) ); ?>">Acerca de nosotros</a>
					<a href="<?php echo esc_url( home_url( '/contactenos' ) ); ?>">Contácte un asesor</a>
				</div>
				<div class="top-account">
					<!-- <a href="#">Mi Cuenta</a> -->
					
				</div>
			</div>
			
			
		</div>
	</div>
	<header class="header">
		
			<div class="inner">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="FG" /></a>
				
				<?php
					wp_nav_menu( array(
						'theme_location' => 'header',
						'menu_id'        => 'header-menu',
						'container' => 'nav',
						'container_class' => 'header-menu',
						'container_id' => '',
						'menu_class' => 'header-menu-ul',
					) );
					?>
					<!-- <nav class="header-menu">
						<ul class="header-menu-ul">
								<li class="header-menu-item">
									<a href="./" class="header-menu-link">Productos</a>
								</li>
								<li class="header-menu-item">
									<a href="#" class="header-menu-link">Repuestos</a>
								</li>
								<li class="header-menu-item">
									<a href="#" class="header-menu-link anchor">Financiamiento</a>
								</li>
								
								
								
							</ul>
					</nav> -->
				<button id="btn-menu" class="header-btn-menu">
					<i class="fas fa-bars"></i>
				</button>
				<div class="cart">
					<a href="<?php echo esc_url( home_url( '/contactenos' ) ); ?>"><i class="fas fa-envelope"></i></a>
				</div>
			</div>
		
	 	
		
	</header>


