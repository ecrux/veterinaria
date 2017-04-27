	<?php 
/**
* Autor : Edwar Cruz
* Fecha : 07/02/2017}
* Descripión: Este archivo contiene la clase graficos la cual me permite imprimir datos de una tabla.
*/


	include 'Base_datos.php';
	class Graficos extends Base_datos
	{
		
		//Constructor de mi clase


		/**
		* Esta funció me permite mostrar los resultados en una tabla y todos los campos los puedo definir 
		* ademas de poderle agregar un diseño con bootstrap.
		* @param 	int 	Este me dira si es resultados de tabla o de img (0,1)
		* @param 	Int 	Este número me pernite que el for tome los valores en el vector $campos
		* @param 	array 	Este es el arrayque trae el emcabezado para la tabla.
		* @param 	text 	Este es el resultado del sql.
		* @param 	text 	Este es la clase que lleva mi emcabezado.
		* @return 	text 	Me retorna una tabla con diseño de bootstap 
		*/

		function mostrar_resultados($num_campo,$campos, $class, $tabla, $campos_bd, $condicion=null )
		{
			$resultado= $this->consultar_tabla($tabla, $campos_bd, $condicion);
			$salida="";			
				$salida.= "<table class='table'><tr> ";//Pinta un tabla 
				for ($i=0; $i <= $num_campo ; $i++) { //inica desde 0 para el array
					$salida.= "<td class='$class'><b>".$campos[$i]."</b></td>"; //Pinta cada registro del array 
				}
				$salida.="</tr>";
				while ($row=mysqli_fetch_array($resultado)) //Iniciamos el bluce
				{
					$salida.="<tr>";//Se crea el otro tr para los otros resultados 
					for ($i=0; $i < mysqli_num_fields($resultado)  ; $i++) { //imprimimos la camtidad columnas las culaes la trae con la funcion num_fields predefinidas en la variable resultado
						$salida .="<td>". $row[$i] . "</td>" ;//Imprimimos el row

					}
					$salida.="</tr>";
				}
				$salida.="</table>";	
			return $salida;
		}

		/**
		* Esta funció me permite mostrar imagenes que tenga dentro de una base de datos.
		* @param 	text 	Ingreso el nombre de la tabla a seleccional 
		* @param 	text 	los campos a seleccionar
		* @param 	text 	Una condición poede ser ópcional 
		* @return 	text 	Me retorna una tabla con diseño de bootstap 
		*/
		function mostrar_imagen($tabla, $campos_bd, $condicion=null)
		{
			$salida="";
			$resultado= $this->consultar_tabla($tabla, $campos_bd, $condicion);//Realiza una consulta a la base de datos y trae un resultado 
			$salida.= mysqli_num_rows($resultado); //imprime el número de colomnas obtenidas
			while ($row=mysqli_fetch_array($resultado)) 
			{
				$salida.=$this->colocar_imagen($row[1], '20%' , $row[2], $row[3],'img'.$row[0]);//Imprimo la imagen con los debidos prametros.
				//echo $row['url_imagen'];
			}
			return $salida;
		}
	

	//echo $mi_obj->colocar_imagen('../ejer1/img/car.png','15%','IMAGEN','Todod este');

	}



 ?>