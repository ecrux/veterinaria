<!-- 

	Autor : Edwar Cruz 
	Esta seria mi página principal de mi proyecto, es el archivo en el cual puedo realizar consultas de síntomas.
	
 -->
<?php 
include 'Operaciones.php';
$mi_obj = New Operaciones; ?>
<!DOCTYPE html>
<html ng-app="App">
	<head>
		<script src="js/angular.min.js"></script>
		<script type="text/javascript" src="js/funcion.js">	</script>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<title>
			Mi veterinaria
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
					<div class="col-xs-12 col-md-1" style="text-align: button;">
						<a href="ayuda.php"><img id="ayuda" alt="Ayuda" src="img/ayuda.png"></a>
					</div>
				</div>
				<div id="encabezado"></div>
			</header>

			<div class="row">
				
				<div ng-controller="App-Ctrl">
					<div class="col-xs-12 col-md-4">
						<main class="well">	
							<center><h2><ol><b>Sintomas</b></ol></h2></center>
							<?php echo $mi_obj->leer_campo('tb_sintomas'); ?>
							<input type="hidden" ng-model="sintoma" name="sintoma" id="contenedor-salida">
						</main>	
					</div>

					<div class="col-xs-12 col-md-8">	
						<div class="row well"></div>

						<aside>
							<div ng-repeat="x in campos">
								<div class="row">
									
									<div class="col-xs-12 col-md-4">
										<center><img width="60%" src="{{ x.Img }}"></center>
									</div>

									<div class="col-xs-12 col-md-8">
						           		<br><b>Enfermedad: {{ x.Enfermedad }}</b> <br>
						            	La cantidad de sintomas seleccionados en esta enfermedad son : {{ x.Conteo_S }}<br>
						            	La cantidad de sintomas total en esta enfermedad son : {{ x.Conteo_T }}		
						            	<br> <b style="color:#1ABC9C"> {{ x.Enfermedad_igual}}</b>
									</div>

						        </div>
					    	</div> 
						</aside>	

					</div>
				</div>	

			</div>


		</div>
		<script type="text/javascript" src="js/angular.js">	</script>
		
	</body>
</html>
