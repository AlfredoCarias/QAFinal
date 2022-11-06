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
			<form action='' method='post'>
				<label>Selecciona en qué orden quieres ver los contactos:</label>
				<br><select name="orden">
					<option value="id" selected>Selecciona una opción</option>
					<option value="nombre">Nombre</option>
					<option value="apellidos">Apellidos</option>
					<option value="poblacion">Población</option>
					<option value="pais">País</option>
				</select><br>
				<input type="submit" name="ordenar" value="Ordenar"/><br>
			</form>
		</nav>
		<section id="section">
			<article>
				<div class="header">
					<h1>LISTA DE CONTACTOS:</h1>
				</div>
				<hr><br>
				<div class="content">
					<table border="1" align="center">
						<tr class="th">
							<td>Nombre</td><td>Apellidos</td><td>Teléfono movil</td><td>Teléfono fijo</td><td>Acciones</td>
						</tr>
						<?php
							if(isset($_POST['ordenar'])){
								$orden=$_POST['orden'];
								require('includes/config.php');
								try{
									$sql=$db->prepare('SELECT id,nombre,apellidos,telemovil,telefijo,poblacion,pais FROM contactos ORDER BY '.$orden);
									$sql->execute();
									while($row=$sql->fetch()){
										echo "<tr>
											<td>".$row['nombre']."</td><td>".$row['apellidos']."</td><td>".$row['telemovil']."</td><td>".$row['telefijo']."</td><td><button><a href='contacto.php?id=".$row['id']."'>Mostrar</a></button></td>
										</tr>";
									}
								}catch(PDOException $e){
									echo $e->getMessage();
								}
							}
						?>
					</table><br>
					<form action='' method='post'>
						<input type="submit" name="crear" value="Nuevo contacto"/>
					</form>
					<?php
						if(isset($_POST['crear'])){
							header("location:nuevo.php");
						}
					?>
				</div>
				<br><hr>
			</article>
		</section>
		
	</body>
</html>