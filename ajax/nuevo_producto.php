<?php
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombre'])){
			$errors[] = "Nombre del producto vacío";
        } else if (empty($_POST['codigo'])) {
           $errors[] = "Código vacío";
		   } else if (empty($_POST['codigobarra'])) {
           $errors[] = "Codigo de barra vacío";
	    } else if (empty($_POST['fabricante'])) {
           $errors[] = "fabricante vacio";
		} else if (empty($_POST['descripcion'])) {
           $errors[] = "Descripcion  vacío";
		} else if ($_POST['stock']==""){
			$errors[] = "Stock del producto vacío";
		} else if (empty($_POST['precio'])){
			$errors[] = "Precio de venta vacío";
	    } else if (empty($_POST['nombre'])){
			$errors[] = "Nombre del producto vacío";
		} else if (
			!empty($_POST['nombre']) &&
			!empty($_POST['codigo']) &&
			!empty($_POST['codigobarra']) &&
			!empty($_POST['fabricante']) &&
			!empty($_POST['descripcion']) &&
			$_POST['stock']!="" &&
			!empty($_POST['precio'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		include("../funciones.php");
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["codigo"],ENT_QUOTES)));
		$codigo_barra=mysqli_real_escape_string($con,(strip_tags($_POST["codigobarra"],ENT_QUOTES)));
		$id_fabricante=mysqli_real_escape_string($con,(strip_tags($_POST["fabricante"],ENT_QUOTES)));
		$descripcion=mysqli_real_escape_string($con,(strip_tags($_POST["descripcion"],ENT_QUOTES)));
		$stock=intval($_POST['stock']);
		
		$precio_venta=floatval($_POST['precio']);
		$date_added=date("Y-m-d H:i:s");
		
		$sql="INSERT INTO products (nombre_producto, codigo_producto, codigo_barra, id_fabricante, descripcion, date_added, precio_producto, stock) VALUES ('$nombre','$codigo','$codigo_barra','$id_fabricante','$descripcion','$date_added','$precio_venta', '$stock')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Producto ha sido ingresado satisfactoriamente.";
				$id_producto=get_row('products','id_producto', 'codigo_producto', $codigo);
				//$user_id=$_SESSION['user_id'];
				//$firstname=$_SESSION['firstname'];
				//$nota="$firstname agregó $stock producto(s) al inventario";
				echo guardar_historial($id_producto,$date_added,$codigo,$stock);
				
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>