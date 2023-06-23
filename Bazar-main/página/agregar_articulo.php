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
			<h1 class="site-title"><a href="index.php" rel="home">Agregar artículo!</a></h1>
			<h2 class="site-description">Agrega un artículo espacial..</h2>
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
		
	<?php
//Agregar
include_once "db_integradore.php";
$con=mysqli_connect($host,$user,$pass,$db);
include_once "../login2/conexionLogin.php";
if($_POST){
    $Nombre =$_POST['nombre'];
//	$Nimagen = $_FILES['imagen']['name'];
  //  $Imagen = $_FILES['imagen']['temp_name'];
	//$Timagen= $_FILES['imagen']['size'];
    $Precio = $_POST['precio'];
	$Descripcion = $_POST['descripcion'];
	$Stock = $_POST['stock'];
	$imagenM = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

/*	$ruta = "Img-aritculos";

	$ruta = $ruta."/".$Nimagen;
	
	move_uploaded_file($Imagen,$ruta);

	$ImagenO =fopen($rura , $Imagen, r);
	$conIm = fread($ImagenO,$Timagen);
	//fclose = ($ImagenO);
*/


$insertar = "INSERT INTO articulos SET nombre='$Nombre',imagen='$imagenM',precio='$Precio',descripcion='$Descripcion'";
$resultado =mysqli_query($con,$insertar);



 //   $sql_agregar = 'INSERT INTO articulos(nombre,imagen,precio,descripcion,stock) VALUES (?,?,?,?,?)';
//    $sentencia_agregar = $pdo->prepare($sql_agregar);
//    $sentencia_agregar->execute(array($Nombre,$imagenM,$Precio,$Descripcion,$Stock));

	//$query=mysql_query("insert into articulos values ('''".$Nombre."','".$ruta."',)");

   // $sentencia_agregar = null;
    //$pdo = null;
    header('location:index.php');}

	


?>
 <div class="col-md-6">
            <?php if(!$_GET): ?>
                
                <h2>Agregar elementos</h2>
                <form method="POST" enctype="multipart/form-data">
					<div>Nombre del artículo</div>
                    <input type="text" class="form-control mt-3" name="nombre" size="50" placehoder="nombre">
					<div>Precio</div>
                    <input  type="text" class="form-control mt-3" name="precio" placehoder="precio">
					<div>Descripción</div>
                    <input  type="text" class="form-control mt-3 " size="120" name="descripcion" placehoder="descripcion">
					<div>Stock</div>
					<input type="text" class="form-control mt-3" name="stock" placehoder="Stock">
					<div>Imagen</div>
					<input type="file" REQUIRED class="form-control mt-3" name="imagen"/>
                    <button class="btn btn-dark mt-3">Agregar</button>
                </form>
                
				<?php endif ?>

 	</div>
	 </div>   	
 <br>      
          
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