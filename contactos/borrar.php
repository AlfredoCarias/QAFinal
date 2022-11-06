<?php
	require('includes/config.php');
	header('Content-Type:text/html;charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<title>CONTACTOS</title>
		<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
	</head>
	<body>
		<header id="header">
			<a href="index.php">
				<img id="logo" width="100%" height="100%" src="images/header.jpg" alt="Header"/>
			</a>
		</header>
		<nav>
		</nav>
		<section id="section">
			<article>
				<div class="header">
					<h1>ELIMINAR CONTACTO:</h1>
				</div>
				<hr><br>
				<div class="content">
					<form action="" method="post">
						<label>¿Realmente desea eliminar este contacto?:</label><br><br>
						<input type="submit" name="borrar" value="Borrar Contacto"/>&nbsp;
							&nbsp;<input type="reset" name="cancelar" value="Cancelar"/>
					</form>
					<?php
						$id=$_GET['id'];
						if(isset($_POST['borrar'])){
							require('includes/config.php');
							try{
								$sql=$db->prepare('DELETE FROM contactos WHERE id='.$id.'');
								$sql->execute(array('id'=>$id));
								echo "Contacto eliminado!";
								echo "<p><a href='index.php'>Volver atras</a></p>";
							}catch(PDOException $e){
								echo $e->getMessage();
							}
						}
						if(isset($_POST["cancelar"])){
							header("location:contacto.php");
						}
					?>
				</div>
				<br><hr>
			</article>
		</section>
	
	</body>
</html>