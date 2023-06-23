<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
			
			
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

	





		<div id="content " class="site-content  ">
			<div id="primary" class="content-area column two-thirds single-portfolio">
				<main id="main" class="site-main">
				
				<article class="portfolio hentry">
				<header class="entry-header">
				<div class="entry-thumbnail">
					<img width="800" height="533" src="data:image/png;base64,<?php echo base64_encode($rowProducto['imagen']);?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="p1"/>
				</div>
		
				
				
				<?php 


				?>
				
				<h1 class="entry-title"><?php echo $rowProducto['nombre']?></h1>
				<h5 class=""><?php echo $rowProducto['precio']?>$</h5>
				
				</header>
				<div class="entry-content">
					<p>
					<?php echo $rowProducto['descripcion']?>
					</p>
					
				</div>
				</article>
				
				
				
				
				</main>
				<!-- #main -->
			</div>
			<!-- #primary -->
			
			<div id="primary" class="column third">
					<div class="d-flex align-items-center ">
						<div class="d-flex flex-column">
							<h3 class="widget-title">¿Qué desea hacer?</h3> 
							
							<button type="button"  href = "youtube.com" class="btn btn-secondary btn-lg">Realizar Compra </button> 
							<a  class="btn btn-warning btn-lg"href ="ModifyArticle.php?id=<?php echo $rowProducto["id"]; ?>">Modificar articulo</a>
							
						</div>
					</div>
				</div>
					<div class="done">								
						Your message has been sent. Thank you!
					</div>

			</div>
		
		</div>
		<!-- #content -->
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
