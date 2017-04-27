<?php
    /**
     * Este php me permite usar el poder del php con un ejemplo de la tecnología AngularJS...
     * incluso desde el administrador de este sitio.
     */
    include 'Operaciones.php';
    $mi_obj = New Operaciones;
    if( isset( $_GET[ 'cadena' ] ) )
    {     
        //include( "config.php" );
        
        /*Esta conexión se realiza para la prueba con angularjs*/
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        include 'config.php';
        $conn = new mysqli( $servidor, $usuario, $password, $bd );
        $conteo ="";
        //Se busca principalmente por alias.
       	$outp="";
			$sql="";
			$sql.=  "SELECT url, enfermedad , COUNT(t1.id_enfermedad) as conteo_sintomas , ";
		    $sql.= " (SELECT COUNT(t4.id_enfermedad) conteo_total ";
		    $sql.= " FROM tb_relacion t4 ";
		    $sql.= "  where t1.id_enfermedad = t4.id_enfermedad ";
		    $sql.= " GROUP BY id_enfermedad) as conteo_total  ";
		    $sql.= " FROM tb_relacion t1, tb_enfermedades t2 ";
		    $sql.= " WHERE t1.id_enfermedad = t2.id_enfermedad AND id_sintoma in (".$_GET['cadena'] .") ";
		    $sql.= " GROUP BY t1.id_enfermedad";
        //echo $sql;
        //LA tabla que se cree debe tener la tabla aquí requerida, y los campos requeridos abajo.
        $result = $conn->query( $sql );
        
        $outp = "";

	        while ($rs = mysqli_fetch_assoc($result))
	        {
				//if ($rs['conteo_sintomas'] >= $conteo) {
					$conteo= $rs['conteo_sintomas'];
	            	//Mucho cuidado con esta sintaxis, hay una gran probabilidad de fallo con cualquier elemento que falte.
		            if ($outp != "") {$outp .= ",";}
		            $outp .= '{"Img":"' . $rs['url']  . '",';
		            $outp .= '"Enfermedad":"'.$rs["enfermedad"].'",';            // <-- La tabla MySQL debe tener este campo.
		            $outp .= '"Conteo_S":"'.$rs["conteo_sintomas"].'",';         // <-- La tabla MySQL debe tener este campo.
		            $outp .= '"Conteo_T":"'.$rs["conteo_total"].'",';     // <-- La tabla MySQL debe tener este campo.
		            if ($rs["conteo_sintomas"]==$rs["conteo_total"]) {
		            	$outp .= '"Enfermedad_igual" : " Posee esta enfermedad "}';
		            }else{
		            	$outp.= '"Enfermedad_igual" : "No posee todos los sintomas, pero tiene algunos" }' ;
		            }
		        //}

	        }
        
        $outp ='{"records":['.$outp.']}';
        $conn->close();
        
        echo($outp);
    
    }/*Fin de mi condición ---END!!
    Edwar Cruz*/
    else if (isset($_GET['busqueda'])) {
    	/*Esta conexión se realiza para la prueba con angularjs*/
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        include 'config.php';
        $conn = new mysqli( $servidor, $usuario, $password, $bd );
        $buscar = utf8_decode($_GET['busqueda']);
        //echo $buscar.length
		
		$buscar = explode(',',$buscar);
		//echo $buscar[0];*/

		
        //Se busca principalmente por alias.
       	$outp="";
			$sql = " SELECT * FROM tb_ayuda WHERE ";
			for ($i=0; $i < count($buscar) ; $i++) { 
				$sql.= " ayuda LIKE '%".$buscar[$i] ."%'  ";
				$sql.= " or texto LIKE '%".$buscar[$i] ."%'";
				$sql.= " or palabras_claves LIKE '%".$buscar[$i] ."%'";
				if ($i < (count($buscar)-1) ) $sql .= " or ";
			}
		//echo $sql;
        //LA tabla que se cree debe tener la tabla aquí requerida, y los campos requeridos abajo.
        $result = $conn->query( $sql );
        
        $outp = "";

	        while ($rs = mysqli_fetch_assoc($result))
	        {
				
					//$conteo= $rs['conteo_sintomas'];
	            	//Mucho cuidado con esta sintaxis, hay una gran probabilidad de fallo con cualquier elemento que falte.
		            if ($outp != "") {$outp .= ",";}
		            $outp .= '{"Img":"' . $rs['url']  . '",';
		            $outp .= '"Id":"'.utf8_encode($rs["id_ayuda"]).'",';            // <-- La tabla MySQL debe tener este campo.
		            $outp .= '"Nombre":"'.utf8_decode($rs["ayuda"]).'",';            // <-- La tabla MySQL debe tener este campo.
		            $outp .= '"Texto":"'.utf8_decode($rs["texto"]).'"}';         // <-- La tabla MySQL debe tener este campo.

	        }
        
        $outp ='{"records":['.$outp.']}';
        $conn->close();
        
        echo($outp);
    }

?> 