
<?php 

include_once '../login2/conexionLogin.php';

//session_start();

//------------------------------Apartado de llamar datos de la base de datos

$sql_read = 'SELECT * FROM articulos';
$gsent = $pdo->prepare($sql_read);
$gsent->execute();
$result= $gsent->fetchall();



// Articles
$NumArticlesPerPage = 5;
$TotalArticles = $gsent->rowcount();
$paginas = $TotalArticles/$NumArticlesPerPage;
$paginas = ceil($paginas);




//Esto es un comentario de prueba




?>



<!DOCTYPE html>
<html lang="en-US">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../login2/MisatoGoth.png"/>
<?php

session_start();

if(isset($_SESSION['admin'])) : ?>
    
 
<title>Space Dust</title>
<link rel='stylesheet' href='css/woocommerce-layout.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/woocommerce-smallscreen.css' type='text/css' media='only screen and (max-width: 768px)'/>
<link rel='stylesheet' href='css/woocommerce.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/font-awesome.min.css' type='text/css' media='all'/>
<link rel='stylesheet' href='style.css' type='text/css' media='all'/>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500,700%7CHerr+Von+Muellerhoff:400,500,700%7CQuattrocento+Sans:400,500,700' type='text/css' media='all'/>
<link rel='stylesheet' href='css/easy-responsive-shortcodes.css' type='text/css' media='all'/>

</head>
<body class="home page page-template page-template-template-portfolio page-template-template-portfolio-php margin auto">
<div id="page">
	<div class="container">
		<header id="masthead" class="site-header">
		<div class="site-branding">
			<h1 class="site-title"><a href="index.php" rel="home">Space Dust!</a></h1>
			<h2 class="site-description">Trayendote el infinito...</h2>
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
				</nav>
				</header>

			<!--	<li><a href="blog.html">Blog</a></li> 
				<li><a href="elements.html">Elementos</a></li>
				<li><a href="#">Paginas</a>
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
			<!-- Intento de llamar a los elementos del articulo -->
			
			
		<div class="Articulacion">
			
			<?php
			/* cree una variable llamada modulo, me sirve para poder guardar la posibilidad de que se vaya a varios modulos
			// en esta situacion cree el modulo detallearticulo, que en caso de que se resiva de esa forma lo llevara al
			//achivo detalleArticulo.php
			Acto seguido tube que crear otro modulo llamado articulos, esto debido a que si no lo hacia el codigo se mezclaba 
			y saltaban errores, todo lo referente a los articulos y su paginacion ahora estan en el archivo articulos.php*/
			$modulo=$_REQUEST['modulo']??'';
			if($modulo=="articulos" || $modulo==''){
				include_once "articulos.php";
			}
			if($modulo=="detallearticulo"){
				include_once "detalleArticulo.php";}
			
			?>
		</div>

		
		
		<!-- #masthead -->
	
	<!-- .container -->
	<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="site-info">
			<h1 style="font-family: 'Herr Von Muellerhoff';color: #ccc;font-weight:300;text-align: center;margin-bottom:0;margin-top:0;line-height:1.4;font-size: 46px;">Moschino</h1>
			 <a target="blank" href="https://www.wowthemes.net/">&copy; Moschino - Free HTML Template by WowThemes.net</a>

			 <a target="blank" href=""> </a>
	
	
	
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
