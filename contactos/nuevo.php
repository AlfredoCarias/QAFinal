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
					<h1>NUEVO CONTACTO:</h1>
				</div>
				<hr><br>
				<div class="content">
					<form action="" method="post" enctype="multipart/form-data">
						<table border="0" align="center">
							<tr><td class="left"><label>Introduce el nombre:*</label></td>
							<td class="right"><input type="text" required name="nombre" placeholder="Nombre"/></td></tr>
							<tr><td class="left"><label>Introduce los apellidos:*</label></td>
							<td class="right"><input type="text" required name="apellidos" placeholder="Apellidos"/></td></tr>
							<tr><td class="left"><label>Introduce el teléfono móvil:*</label></td>
							<td class="right"><input type="number" required name="telemovil" placeholder="Teléfono móvil"/></td></tr>
							<tr><td class="left"><label>Introduce el teléfono fijo:*</label></td>
							<td class="right"><input type="number" required name="telefijo" placeholder="Teléfono fijo"/></td></tr>
							<tr><td class="left"><label>Introduce el teléfono del trabajo:</label></td>
							<td class="right"><input type="number" name="teletrabajo" placeholder="Teléfono trabajo"/></td></tr>
							<tr><td class="left"><label>Introduce el email privado:*</label></td>
							<td class="right"><input type="email" required name="emailprivado" placeholder="Email privado"/></td></tr>
							<tr><td class="left"><label>Introduce el email del trabajo:</label></td>
							<td class="right"><input type="email" name="emailtrabajo" placeholder="Email trabajo"/></td></tr>
							<tr><td class="left"><label>Introduce la dirección:*</label></td>
							<td class="right"><input type="text" required name="direccion" placeholder="Dirección"/></td></tr>
							<tr><td class="left"><label>Introduce la población:*</label></td>
							<td class="right"><input type="text" required name="poblacion" placeholder="Población"/></td></tr>
							<tr><td class="left"><label>Introduce el código postal:*</label></td>
							<td class="right"><input type="number" required name="codpostal" placeholder="Código postal"/></td></tr>
							<tr><td class="left"><label>Introduce la región:*</label></td>
							<td class="right"><input type="text" required name="region" placeholder="Región"/></td></tr>
							<tr><td class="left"><label>Introduce el país:*</label></td>
							<td class="right"><input type="text" required name="pais" placeholder="País"/></td></tr>
							<tr><td class="left"><label>Introduce la fecha de nacimiento:*</label></td>
							<td class="right"><input type="date" required name="fechanac"/></td></tr>
							<tr><td class="left"><label>Introduce la fotografía:</label></td>
							<td class="right"><input type="file" name="foto" accept=".jpg,.png,.gif"/></td></tr>
							<tr><td><input type="submit" name="crear" value="Crear Contacto"/>&nbsp;</td>
							<td>&nbsp;<input type="reset" name="cancelar" value="Cancelar"/></td></tr>
						</table>
					</form>
				</div>
				<br><hr>
			</article>
		</section>
		<?php
			if(isset($_POST["crear"])){
				$nombre=$_POST["nombre"];
				$apellidos=$_POST["apellidos"];
				$telemovil=$_POST["telemovil"];
				$telefijo=$_POST["telefijo"];
				$teletrabajo=$_POST["teletrabajo"];
				$emailprivado=$_POST["emailprivado"];
				$emailtrabajo=$_POST["emailtrabajo"];
				$direccion=$_POST['direccion'];
				$poblacion=$_POST["poblacion"];
				$codpostal=$_POST['codpostal'];
				$region=$_POST["region"];
				$pais=$_POST["pais"];
				$fechanac=$_POST["fechanac"];
				$foto=$_FILES['foto']['name'];
				try{
					$sql=$db->prepare('INSERT INTO contactos 
					(nombre,apellidos,telemovil,telefijo,teletrabajo,emailprivado,emailtrabajo,direccion,poblacion,codpostal,region,pais,fechanac,foto) VALUES 
					(:nombre,:apellidos,:telemovil,:telefijo,:teletrabajo,:emailprivado,:emailtrabajo,:direccion,:poblacion,:codpostal,:region,:pais,:fechanac,:foto)');
					$sql->execute(array(
						':nombre'=>$nombre,
						':apellidos'=>$apellidos,
						':telemovil'=>$telemovil,
						':telefijo'=>$telefijo,
						':teletrabajo'=>$teletrabajo,
						':emailprivado'=>$emailprivado,
						':emailtrabajo'=>$emailtrabajo,
						':direccion'=>$direccion,
						':poblacion'=>$poblacion,
						':codpostal'=>$codpostal,
						':region'=>$region,
						':pais'=>$pais,
						':fechanac'=>$fechanac,
						':foto'=>$foto
					));
					echo "Contacto creado!";
					exit;
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}
			if(isset($_POST["cancelar"])){
				header("location:index.php");
			}
		?>
		<footer id="footer">
			<p>&copy; 2019 Charly Utrilla</p>
		</footer>
	</body>
</html>