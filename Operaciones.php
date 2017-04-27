<?php 
/**
	Este sera mi archivo de clases en php.
	Autor : Edwar Cruz
	Fecha : 06/02/2017
*/
	

	/*
		Mi clase operaciones contiene los objetos 
	*/
	include 'Graficos.php';
	class Operaciones extends Graficos
	{
		public $imagen;
		
		//Contructor de mi clase
		


		/**
		* Este método me permitirá colocar títulos, podiendo agregarlos desde el html
		* @param 	text 	Ingresa el titulo que se dese que muestre en nuestra página web.
		* @return 	text 	Retorna el titulo dentro de las etiquetas title.
		*/
		function colocar_titulo($titulo)
		{
			return "<title>". $titulo ."</title>";

		}

		
		/**
		* Este método me permite colocar un nombre y darle una determinación.
		* @param 	text 	Ingresa el titulo que se dese que muestre en nuestra página web.
		* @return 	text 	Retorna el titulo dentro de las etiquetas title.
		*/
		function colocar_nombre($nombre, $complento)
		{
			$salida="<b>".$nombre."</b><br>";
			return $salida . $complento;
		}

		
		/**
		* Este método me permitirá colocar imagenes.
		* @param 	text 	Ingresa la url de mi imagen o el src.
		* @param 	text 	Ingresa el tamaño de mi imagen.
		* @param 	text 	Ingreso un titulo si lo deseo puede ser null
		* @param 	text 	Ingreso un complemento o texto de apoyo a mi imagen, puede ser null
		* @param 	text 	Le coloco el identificador a mi imagen puede ser null
		* @return 	img 	Retorna una imagen con las caracteristicas anteriores.
		*/
		function colocar_imagen($url, $size, $titulo_img=null, $complememto_img=null, $id=null)
		{
			$salida="<img id='$id' width='$size' src='$url'>";
			if ($titulo_img== null) $salida.="<br> <h3><b> $titulo_img </b> </h3";
			if ($complememto_img== null) $salida.="<br> <h4> $complememto_img </h4>";
			//$this->imagen=$salida;
			return $salida;
		}

		//Esta función me permitira colocar un subtitulo
		function subtitulo()
		{
			return "Hola mundo";
		}

		/**
		* Este método permite que obtenga el subtitulo y agragarle el tamaño que desee.
		* @param 	text 	Le cambio el tamaño a mi texto simplemente es la etiqueta <h1></h1> modifica el número.
		* @return 	text 	Retorna un subtitulo al tamaño que desee
		*/
		function agrandar_texto($tam) 
		{
			$salida="<h$tam>". $this->subtitulo() . "</h$tam>"; //agrego el tamaño en las etiquetas <h> y obtengo la función subtitulo.
			return $salida;
		}


		/**
		* Este método me permite cambiarle el color a mi subtítulo ya definido, ademas puedo modificar el tamaño.
		* @param 	text 	Ingreso el color que desee visualizar en mi titulo
		* @param 	text 	Ingreso el tamaño que deseo colocarle.
		* @return 	text 	Me retornara subtitulo de un color diferente y tamaño que desee
		*/
		function cambiar_color($color,$tam)
		{
			$salida="<div style='color:$color'>" . $this->agrandar_texto($tam)."</div>";
			return $salida;
		}


		/**
		* Este método es el estilo de bootstap, son las regillas 'col' a las cuales les puedo definir el tamaño en xs, md y el estilo
		* Esta funcion me pertite colocar imagenes con class de bootstrap dentro de un row y un col
		* esta va a otra y retorna una imagen, la cual la acondiciona con el bootstrap.
		* @param 	text 	Ingreso el tamaño del col en xs
		* @param 	text 	Ingreso el tamaño del col en md
		* @param 	text 	Ingreso la url de la imagen.
		* @param 	text 	Ingreso el tamaño de la imagen preferiblemente en %
		* @param 	text 	Ingreso un titulo a mi imagen.
		* @param 	text 	Ingreso un complemento o texto de apoyo a mi imagen.
		* @param 	text 	Ingreso 1 o 0 para activar el wel del row si es 1 lo activo si es 0 no lo coloca.
		* @return 	text 	Me retornara subtitulo de un color diferente y tamaño que desee
		*/
		function col($xs, $md, $url, $size, $titulo_img, $complemento_img, $well)
		{
			$salida="";
			$salida.="<div class='col-xs-$xs col-md-$md";
			if ($well==1) $salida.=" well ' >";
			if ($well==0) $salida.="' >";
			$salida.= $this->colocar_imagen($url, $size, $titulo_img, $complemento_img) . "</div>";
			return $salida;
		}

		/**
		* Este método es para añadir un row de bootstrap en mis archivos
		* @param 	text 	Ingreso el conterido para ubicarlo dentro de un row
		* @return 	text 	retorna un row con el contenido que se ingreso.
		*/
		function row($contenido)
		{
			$salida="<div class='row'>";
			$salida.=$contenido;
			$salida.="</div>";
			return $salida;
		}

	}



 ?>