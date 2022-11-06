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
			<input type="submit" name="cambiar" value="Modificar datos"/><br>
			<input type="submit" name="borrar" value="Eliminar contacto"/>
		</nav>
		<section id="section">
			<article>
				<div class="header">
					<h1>DATOS DEL CONTACTO:</h1>
				</div>
				<hr><br>
				<div class="content">
					<form action='' method='post'>
						<?php
							$id=$_GET['id'];
							require('includes/config.php');
							try{
								$sql=$db->prepare('SELECT id,nombre,apellidos,telemovil,telefijo,teletrabajo,emailprivado,emailtrabajo,direccion,poblacion,codpostal,region,pais,fechanac,foto FROM contactos where id="'.$id.'"');
								$sql->execute();
								while($row=$sql->fetch()){
									echo "<table border='1' align='center'>
										<tr><td class='th'>Nombre</td><td>".$row['nombre']."</td></tr>
										<tr><td class='th'>Apellidos</td><td>".$row['apellidos']."</td></tr>
										<tr><td class='th'>Teléfono movil</td><td>".$row['telemovil']."</td></tr>
										<tr><td class='th'>Teléfono fijo</td><td>".$row['telefijo']."</td></tr>
										<tr><td class='th'>Teléfono trabajo</td><td>".$row['teletrabajo']."</td></tr>
										<tr><td class='th'>Email privado</td><td>".$row['emailprivado']."</td></tr>
										<tr><td class='th'>Email trabajo</td><td>".$row['emailtrabajo']."</td></tr>
										<tr><td class='th'>Dirección</td><td>".$row['direccion']."</td></tr>
										<tr><td class='th'>Población</td><td>".$row['poblacion']."</td></tr>
										<tr><td class='th'>Código postal</td><td>".$row['codpostal']."</td></tr>
										<tr><td class='th'>Región</td><td>".$row['region']."</td></tr>
										<tr><td class='th'>País</td><td>".$row['pais']."</td></tr>
										<tr><td class='th'>Fecha de nacimiento</td><td>".$row['fechanac']."</td></tr>
										<tr><td class='th'>Fotografía</td><td>".$row['foto']."</td></tr>
									</table>";
								}
							}catch(PDOException $e){
								echo $e->getMessage();
							}
							if(isset($_POST['borrar'])){
								header('Location:borrar.php?id='.$id);
							}
							if(isset($_POST['cambiar'])){
								header('Location:modificar.php?id='.$id);
							}
						?>
					</form>
				</div>
				<br><hr>
			</article>
		</section>
		
	</body>
</html>