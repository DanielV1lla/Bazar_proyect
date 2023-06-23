<?php
include_once '../login2/conexionLogin.php';
session_start();

if(isset($_SESSION['admin'])): ?>


<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../login2/MisatoGoth.png"/>
<title>Moschino | Minimalist Free HTML Portfolio by WowThemes.net</title>
<link rel='stylesheet' href='css/woocommerce-layout.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/woocommerce-smallscreen.css' type='text/css' media='only screen and (max-width: 768px)'/>
<link rel='stylesheet' href='css/woocommerce.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/font-awesome.min.css' type='text/css' media='all'/>
<link rel='stylesheet' href='style.css' type='text/css' media='all'/>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500,700%7CHerr+Von+Muellerhoff:400,500,700%7CQuattrocento+Sans:400,500,700' type='text/css' media='all'/>
<link rel='stylesheet' href='css/easy-responsive-shortcodes.css' type='text/css' media='all'/>
</head>
<body class="home page page-template page-template-template-portfolio page-template-template-portfolio-php">
<div id="page">
	<div class="container">
		<header id="masthead" class="site-header">
		<div class="site-branding">
			<h1 class="site-title"><a href="index.php" rel="home">About</a></h1>
			<h2 class="site-description">Contáctate con los creadores</h2>
			<li><a><?php echo'Bienvenido '.$_SESSION['admin']; ?></a></li>
		</div>
		<nav id="site-navigation" class="main-navigation">
		<button class="menu-toggle">Menu</button>
		<a class="skip-link screen-reader-text" href="#content">Skip to content</a>
		<div class="menu-menu-1-container">
			<ul id="menu-menu-1" class="menu">
				<li><a href="index.php">INICIO</a></li>
				<li><a href="about.php">Sobre Nosotros</a></li>
				<li><a href="agregar_articulo.php">Agregar articulo</a>
				<li><a href="cerrar.php"> Cerrar sesión</a></li>
				<?php else:
       			 header('Location:../login2/login.html');
				?>
				<?php endif; ?>
			<!--	<li><a href="blog.html">Blog</a></li>
				<li><a href="elements.html">Elements</a></li>
				<li><a href="#">Pages</a>
				<ul class="sub-menu">
					<li><a href="portfolio-item.html">Portfolio Item</a></li>
					<li><a href="blog-single.html">Blog Article</a></li>
					<li><a href="shop-single.html">Shop Item</a></li>
					<li><a href="portfolio-category.html">Portfolio Category</a></li>
				</ul>
				</li>
				<li><a href="contact.html">Contact</a></li>
			</ul>-->
		</div>
		</nav>
		</header>
		<!-- #masthead -->
		<div id="content" class="site-content">
			<div id="primary" class="content-area column full">
				<main id="main" class="site-main">
				
				<article class="hentry">
				<header class="entry-header">
				<h1 class="entry-title">Sobre el equipo</h1>	
				</header>
				<!-- .entry-header -->

				<div class="entry-content">
				<p><img style="border:10px solid #f4f5f6" src="../página/Imagenes-aboutus/Gb.jpg" alt="bg5" width="200" class="alignright"></p>
				
				<p><img style="border:10px solid #f4f5f6" src="../página/Imagenes-aboutus/YO.jpg" alt="bg5" width="200" class="alignright"></p>
				<p><img style="border:10px solid #f4f5f6" src="../página/Imagenes-aboutus/cr7.jpg" alt="bg5" width="200" class="alignright"></p>
				<p>Cristian Eduardo Hernández López</p>
				<p>Eduardo Daniel Dávila Villa</p>
				<p>Carlos Gizeh Becerra Cobián</p>
				<h2 style="font-family: 'Herr Von Muellerhoff';color:#caa;font-weight:300;">Página hecha por nosotros...</h2>
				</div><!-- .entry-content -->
				</article>
				
				</main>
				<!-- #main -->
			</div>
			<!-- #primary -->
		</div>
		<!-- #content -->
	</div>
	<!-- .container -->
	<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="site-info">
			<h1 style="font-family: 'Herr Von Muellerhoff';color: #ccc;font-weight:300;text-align: center;margin-bottom:0;margin-top:0;line-height:1.4;font-size: 46px;">Moschino</h1>
			 <a target="blank" href="https://www.wowthemes.net/">&copy; Moschino - Free HTML Template by WowThemes.net</a>
		</div>
	</div>	
	</footer>
	<a href="#top" class="smoothup" title="Back to top"><span class="genericon genericon-collapse"></span></a>
</div>
<!-- #page -->
<script src='js/jquery.js'></script>
<script src='js/plugins.js'></script>
<script src='js/scripts.js'></script>
<script src='js/masonry.pkgd.min.js'></script>
</body>
</html>
<?php

$pdo= null;
$gsent= null;

?>
