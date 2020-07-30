	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo producto</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_producto" name="guardar_producto">
			<div id="resultados_ajax_productos"></div>
			  <div class="form-group">
				<label for="codigo" class="col-sm-3 control-label">Código</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código del producto" required>
				</div>
			  </div>
			  
			  
			   <div class="form-group">
				<label for="codigo_barra" class="col-sm-3 control-label">Codigo De Barra</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="codigobarra" name="codigobarra" placeholder="Código De Barra del Producto" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" required maxlength="255" ></textarea>
				  
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="fabricante" class="col-sm-3 control-label">Fabricante</label>
				<div class="col-sm-8">
					<select class='form-control' name='fabricante' id='fabricante' required>
						<option value="">Selecciona un Fabricante</option>
							<?php 
							$query_fabricante=mysqli_query($con,"select * from fabricante order by nombre_fabricante");
							while($rw=mysqli_fetch_array($query_fabricante))	{
								?>
							<option value="<?php echo $rw['id_fabricante'];?>"><?php echo $rw['nombre_fabricante'];?></option>			
								<?php
							}
							?>
					</select>			  
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Descripcion</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion del producto" required maxlength="255" ></textarea>
				  
				</div>
			  </div>
			  
			<div class="form-group">
				<label for="precio" class="col-sm-3 control-label">Precio</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio de venta del producto" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
				</div>
			</div>
			
			<div class="form-group">
				<label for="stock" class="col-sm-3 control-label">Stock</label>
				<div class="col-sm-8">
				  <input type="number" min="0" class="form-control" id="stock" name="stock" placeholder="Inventario inicial" required  maxlength="8">
				</div>
			</div>
			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>