


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
			
    <?php 

include_once '../login2/conexionLogin.php';

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
<body class="home page page-template page-template-template-portfolio page-template-template-portfolio-php">
<div id="page">
	<div class="container">
		<header id="masthead" class="site-header">
		<div class="site-branding">
			<h1 class="site-title"><a href="index.php" rel="home">Space Dust!</a></h1>
			<h2 class="site-description">Trayendote el infinito...</h2>
			<a><?php echo'Bienvenido '.$_SESSION['admin']; ?></a>
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
				<?php
			/* Aqui cito al documento db_integradore, este basicamente solo es para que me traiga los datos
			para establecer conexion con la base de datos, se que antes lo hicimos, pero esta forma requeria que la conexion 
			estuviera en una variable, la cual se llama $con, talvez haya manera mas facil, pero esta funciono, con esto pude
			llamar de forma segura la id de la pagina seleccionada y de sus datos*/
			
            include_once "db_integradore.php";
			$con=mysqli_connect($host,$user,$pass,$db);
			


		
		//-- #masthead -->
	
		$id= mysqli_real_escape_string($con,$_REQUEST['id']??'');
		$queryProducto="SELECT id,nombre,imagen,precio,descripcion,stock FROM articulos where id='$id'; ";
		$resProducto=mysqli_query($con,$queryProducto);
		$rowProducto=mysqli_fetch_assoc($resProducto);		
	?>

	



		
			<div id="content" class="site-content" >
				<div class="Articulacion">
					<main id="main" class="site-main">
					
					<form class="portfolio hentry" action="ProcesaModificate.php" method="post" enctype="multipart/form-data">
					<header class="entry-header">
					<div class="entry-thumbnail">
						<img width="800" height="533" src="data:image/png;base64,<?php echo base64_encode($rowProducto['imagen']);?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="p1"/>
					</div>
					
					<br>
					
					<input type="file" REQUIRED name="imagen" size="50"/>
					<br>
					<input type="hidden" class="" value="<?php echo $rowProducto['id'];?>" name= "id"/>
					<br>
					<input type="text" class="entry-title" value="<?php echo $rowProducto['nombre'];?>"name="nombre">
					<br><br>
					<input class="" type ="text" value="<?php echo $rowProducto['precio'];?>$" name="precio">
					
					</header>
					<div class="entry-content">
						<p>
						<input class="" type ="text" value="<?php echo $rowProducto['descripcion'];?>" name="descripcion" size="80">
						</p>
						
					</div>
					<input type="submit" value="Modificar" class=""> 
	</form>
					
					
					
					
					</main>
					<!-- #main -->
				</div>
				<!-- #primary -->
				
				<div id="primary" class="column third">
						
						<div class="done">								
							Your message has been sent. Thank you!
						</div>

				</div>
	
			</div>
		<!-- #content -->
	</div>
	<br>
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
<script src='js/validate.js'></script>
</body>
</html>
<?php

$pdo= null;
$gsent= null;

?>