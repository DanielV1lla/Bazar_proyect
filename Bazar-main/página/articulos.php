<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">


<div id="content" class="site-content">
			<div id="primary" class="content-area column full">
				<main id="main" class="site-main">
				<div class="grid portfoliogrid">

				<!--- Codigo que arregla lo del header... --->

				<?php 

				if(!$_GET){
					header('Location:index.php?pagina=1');
				}
				//Con esto se arregla el que el usuario le ponga que quiera ir a una pagina que nosotros no tenemos.
				if($_GET['pagina']>$paginas || $_GET['pagina']<= 0 ){
					header('Location:index.php?pagina=1');
				}
				
				//En esta parte se configura la manera dinamica en la que queremo que nuestra pagina muestre los articulos
				//iniciar porque en el Limit, debemos poner esa variable, pues iniciaria desde ese articulo por asi decirlo
				$iniciar = ($_GET['pagina']-1)*$NumArticlesPerPage;

				//En esta parte se configura el limite de los articulos que queremos mostrar
				//Teniendo la variable iniciar, la ponemos en el limite como inicar y tambien narticulos, que seria el numero de articulos que queremos mostrar
				//todo esto para que sea de forma dinamica...
				$sql_articulos = 'SELECT * FROM articulos LIMIT :inicar , :narticulos';
				$sentencia_articulos = $pdo->prepare($sql_articulos);
				//En esta parte se convierte el int en string 
				$sentencia_articulos->bindParam(':inicar', $iniciar, PDO::PARAM_INT);
				$sentencia_articulos->bindParam(':narticulos', $NumArticlesPerPage, PDO::PARAM_INT);
				$sentencia_articulos->execute();

        		$resultado_articulos = $sentencia_articulos->fetchALL();
				?>


				<!-- intento de Nombre de descripcion de articulo -->
					<!-- El foreach saca de $resultados_articulos, los datos necesarios, pues en esa se configuro el limite que queremos mostrar, 
						articulo es una variable que nace aquí y la podemos llamar como queramos -->
					<?php foreach ($resultado_articulos as $articulo): ?>
					<article class="hentry">
					<header class="entry-header">
					<div class="entry-thumbnail">
						<a href="index.php?modulo=detallearticulo&id=<?php echo $articulo['id']?>"><img width="100" src="data:image/png;base64,<?php echo base64_encode($articulo['imagen']);?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="p1"/></a>
					</div>
					<h2 class="entry-title"><a href="index.php?modulo=detallearticulo&id=<?php echo $articulo['id']?>" rel="bookmark"><?php echo $articulo['nombre']?></a></h2>
					</header>
					<!-- Button Trash -->
					<div class="position-relative">
						<a href="eliminateArti.php?ID=<?php echo $articulo['id'] ?>" class="position-absolute bottom-0 end-0">
							<i class="fas fa-trash"></i>
						</a>
					</article>
					<?php endforeach ?>
					
					
				
					
				</div>
				<!-- .grid -->
				
				<nav class="pagination">
				<a class="next page-numbers" href="index.php?pagina=<?php echo $_GET["pagina"]-1?>">Anterior «</a>
			
				<!-- Aquí se hace todo el proceso de hacer que la pagina tenga pestañas, el for hace que el numero de las paginas se repita
					las veces que en nuestra variable pagina diga, y de ahí sacamos el que la pagina nos redirija al numero de pagina seleccionada-->
				<?php for($i=0;$i<$paginas;$i++):?>
				<a class="page-numbers <?php echo $_GET['pagina']==$i+1 ? 'current' : '' ?>" href="index.php?pagina=<?php echo $i+1;?>"><?php echo $i+1;?></a>
				<?php endfor ?>

				<!--- el codigo php dentro del class, se supone que sirve para desabilitar el que el usuario pueda ir mas alla de lo que permite la paginacion--->
				<a class="next page-numbers <?php echo $_GET['pagina']>=$paginas? 'disabled' : ''?>" href="index.php?pagina=<?php echo $_GET['pagina']+1?>">Next »</a>
				</nav>
				<br/>
				
				</main>
				<!-- #main -->
			</div>
			<!-- #primary -->
		</div>