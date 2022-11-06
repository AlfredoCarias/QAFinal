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
					<h1>MODIFICAR CONTACTO:</h1>
				</div>
				<hr><br>
				<div class="content">
					<?php
						$id=$_GET['id'];
						require('includes/config.php');
						try{
							$sql=$db->prepare('SELECT id,nombre,apellidos,telemovil,telefijo,teletrabajo,emailprivado,emailtrabajo,direccion,poblacion,codpostal,region,pais,fechanac,foto FROM contactos WHERE id=:id');
							$sql->execute(array(
								':id'=>$id
							));
							$row=$sql->fetch();
						}catch(PDOException $e){
							echo $e->getMessage();
						}
					?>
					<form action="" method="post" enctype="multipart/form-data">
						<table border="0" align="center">
							<tr><td class="left"><label>Introduce el nombre:*</label></td>
							<td class="right"><input type="text" required name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce los apellidos:*</label></td>
							<td class="right"><input type="text" required name="apellidos" placeholder="Apellidos" value="<?php echo $row['apellidos']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce el teléfono móvil:*</label></td>
							<td class="right"><input type="number" required name="telemovil" placeholder="Teléfono móvil" value="<?php echo $row['telemovil']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce el teléfono fijo:*</label></td>
							<td class="right"><input type="number" required name="telefijo" placeholder="Teléfono fijo" value="<?php echo $row['telefijo']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce el teléfono del trabajo:</label></td>
							<td class="right"><input type="number" name="teletrabajo" placeholder="Teléfono trabajo" value="<?php echo $row['teletrabajo']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce el email privado:*</label></td>
							<td class="right"><input type="email" required name="emailprivado" placeholder="Email privado" value="<?php echo $row['emailprivado']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce el email del trabajo:</label></td>
							<td class="right"><input type="email" name="emailtrabajo" placeholder="Email trabajo" value="<?php echo $row['emailtrabajo']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce la dirección:*</label></td>
							<td class="right"><input type="text" required name="direccion" placeholder="Dirección" value="<?php echo $row['direccion']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce la población:*</label></td>
							<td class="right"><input type="text" required name="poblacion" placeholder="Población" value="<?php echo $row['poblacion']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce el código postal:*</label></td>
							<td class="right"><input type="number" required name="codpostal" placeholder="Código postal" value="<?php echo $row['codpostal']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce la región:*</label></td>
							<td class="right"><input type="text" required name="region" placeholder="Región" value="<?php echo $row['region']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce el país:*</label></td>
							<td class="right"><input type="text" required name="pais" placeholder="País" value="<?php echo $row['pais']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce la fecha de nacimiento:*</label></td>
							<td class="right"><input type="date" required name="fechanac" value="<?php echo $row['fechanac']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce la fotografía:</label></td>
							<td class="right"><input type="text" placeholder="Foto" name="foto" value="<?php echo $row['foto']; ?>" readonly />
							<input type="file" name="foto1" accept=".jpg,.png,.gif" value=""/></td></tr>
							<tr><td><input type="submit" name="cambiar" value="Modificar"/>&nbsp;</td>
							<td>&nbsp;<input type="reset" name="cancelar" value="Cancelar"/></td></tr>
						</table>
					</form>
				</div>
				<br><hr>
			</article>
		</section>
		<?php
			if(isset($_POST["cambiar"])){
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
				$foto=$_FILES['foto1']['name'];
				try{
					$sql=$db->prepare('UPDATE contactos SET
					nombre="'.$nombre.'",
					apellidos="'.$apellidos.'",
					telemovil="'.$telemovil.'",
					telefijo="'.$telefijo.'",
					teletrabajo="'.$teletrabajo.'",
					emailprivado="'.$emailprivado.'",
					emailtrabajo="'.$emailtrabajo.'",
					direccion="'.$direccion.'",
					poblacion="'.$poblacion.'",
					codpostal="'.$codpostal.'",
					region="'.$region.'",
					pais="'.$pais.'",
					fechanac="'.$fechanac.'",
					foto="'.$foto.'"
					WHERE id=:id');
					$sql->execute(array(
						':id'=>$id
					));
					header("refresh:0;");
					echo "<script>alert('Contacto modificado!');</script>";
					exit;
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}
			if(isset($_POST["cancelar"])){
				header("location:contacto.php");
			}
		?>

	</body>
</html>