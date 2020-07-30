	<?php
		if (isset($title))
		{
	?>
<nav class="navbar navbar-default ">
  <div class="container-fluid">
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">INVENTARIO</a>
    </div>

    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php if (isset($active_productos)){echo $active_productos;}?>"><a href="stock.php"><i class='glyphicon glyphicon-barcode'></i> Inventario</a></li>
		<li class="<?php if (isset($active_fabricante)){echo $active_fabricante;}?>"><a href="fabricante.php"><i class='glyphicon glyphicon-tags'></i> Fabricante</a></li>
       </ul>
      
    </div>
  </div>
</nav>
	<?php
		}
	?>