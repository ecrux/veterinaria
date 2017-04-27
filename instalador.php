
<!--
	Autor: Camilo Figueroa ( Crivera )
	Modificado por : Edwar Cruz 
	Primer formulario para la instalación de un aplicativo, aunque el aplicativo en sí no existe, solo se mostrará el proceso de instalación.
-->

<!DOCTYPE html>
<html ng-app="App">
	<head>
		<script src="js/angular.min.js"></script>
		<script type="text/javascript" src="js/funcion.js">	</script>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<title>
			Mi veterinaria | Instalador
		</title>
	</head>
	<body id="todo">

		<div class="container" >
		<!-- Encabezado -->
			<header >
				<div class="row">
					<div class="col-xs-12 col-md-3"></div>
					<div class="col-xs-12 col-md-2">
						<a href="index.php"><center><img width="100%"  src="img/tite.png"></center></a>
					</div>
					<div class="col-xs-12 col-md-1"><div id="line">|</div></div>
					<div class="col-xs-12 col-md-3">
							<h5><b>Mi Veterinaria </b> <br>
							San José del Guaviare <br>
							Edwar Esteban Cruz Hernandez <br>
							2017</h5>
					</div>
					<div class="col-xs-12 col-md-2"></div>
					<div class="col-xs-12 col-md-1" style="text-align: button;"></div>
				</div>
				<div id="encabezado"></div>
			</header>

			<br>
			<!-- Cuerpo -->
			<div class="row">
				<div class="col-xs-12 col-md-3"></div>	
				<div class="col-xs-12 col-md-6 well">
					A continuaci&oacute;n se proceder&aacute; a instalar un aplicativo, el cual permite observar dicho proceso al detalle. 
					Sin embargo requiere de que la <strong>base de datos</strong> sea creada con anterioridad. <br><br>
					<!-- Formulario para los parametros de la instalación de bd -->
						<form action="instalando.php" method="_get">
							<div class="row">
								<div class="col-xs-12 col-md-2"></div>	
								<div class="col-xs-12 col-md-8">
									<div class="input-group mb-2 mr-sm-2 mb-sm-0">
								    	<div class="input-group-addon">@</div>
								    	<input type="text" class="form-control" name="servidor" placeholder="Servidor" required>
								  	</div>
								</div>
								<div class="col-xs-12 col-md-2"></div>
							</div>
						  	<br>
						  	<div class="row">
								<div class="col-xs-12 col-md-2"></div>	
								<div class="col-xs-12 col-md-8">
								  	<div class="input-group mb-2 mr-sm-2 mb-sm-0">
								    	<div class="input-group-addon"><b>U</b></div>
								    	<input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
								  	</div>
								</div>
								<div class="col-xs-12 col-md-2"></div>	
							</div>
						  	<br>
						  	<div class="row">
								<div class="col-xs-12 col-md-2"></div>	
								<div class="col-xs-12 col-md-8">
								  	<div class="input-group mb-2 mr-sm-2 mb-sm-0">
								    	<div class="input-group-addon"><b>#</b></div>
								    	<input type="text" class="form-control" name="contrasena" placeholder="Password" >
								  	</div>
						  		</div>
								<div class="col-xs-12 col-md-2"></div>	
							</div>
						  	<br>
						  	<div class="row">
								<div class="col-xs-12 col-md-2"></div>	
								<div class="col-xs-12 col-md-8">
									<div class="input-group mb-2 mr-sm-2 mb-sm-0">
								    	<div class="input-group-addon"><b>B</b></div>
								    	<input type="text" class="form-control" name="bd" placeholder="Base de datos" required>
								  	</div>
								</div>
								<div class="col-xs-12 col-md-2"></div>	
							</div>
						  	<br>
						  	<button type="submit" class="btn btn-primary">Enviar</button>
						</form>
					
				</div>	
				<div class="col-xs-12 col-md-3"></div>	
			</div>


		</div>
	</body>

</html>