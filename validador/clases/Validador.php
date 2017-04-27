<?php

    /**
     * Autor: Camilo Figueroa ( Crivera )
     *
     */
    
    class Validador
    {

        public $g_contenido_lineas_archivo;
        private $g_arreglo_informe = []; //Este es el vector de la auditoría.

        /**
         * Constructor de la clase. Inicializa variables.
         */
        public function Validador()
        {
            //Carga los principales elementos a evaluar.
            //En la seguna casilla del vector se cargarán los contadores.
            array_push( $this->g_arreglo_informe, array( "&lt;html", 0 ) );
            array_push( $this->g_arreglo_informe, array( "&lt;/html", 0 ) );
            array_push( $this->g_arreglo_informe, array( "&lt;head", 0 ) );
            array_push( $this->g_arreglo_informe, array( "&lt;/head", 0 ) );
            array_push( $this->g_arreglo_informe, array( "&lt;title", 0 ) );
            array_push( $this->g_arreglo_informe, array( "&lt;/title", 0 ) );
            array_push( $this->g_arreglo_informe, array( "&lt;body", 0 ) );
            array_push( $this->g_arreglo_informe, array( "&lt;/body", 0 ) );
            array_push( $this->g_arreglo_informe, array( "&lt;script", 0 ) );
            array_push( $this->g_arreglo_informe, array( "&lt;/script", 0 ) );
            array_push( $this->g_arreglo_informe, array( "&lt;div", 0 ) );
            array_push( $this->g_arreglo_informe, array( "&lt;/div", 0 ) );
            array_push( $this->g_arreglo_informe, array( "&lt;?php", 0 ) );
            array_push( $this->g_arreglo_informe, array( "?&gt;", 0 ) );
            array_push( $this->g_arreglo_informe, array( "{", 0 ) );
            array_push( $this->g_arreglo_informe, array( "}", 0 ) );
            array_push( $this->g_arreglo_informe, array( "(", 0 ) );
            array_push( $this->g_arreglo_informe, array( ")", 0 ) );
        }
        
        /**
         * Se encarga de abrir un archivo, retorna el texto y almacena linea a linea en un vector
         * todo el contenido de ese lemento.
         * @param       texto       nobre del archivo a abrir.
         * @return      texto       retorna en un texto todo el contenido del archivo.
         */
        public function abrir_archivo( $nombre )
        {
            $salida = "";
            $tmp_cad = "";
            $i = 0;
            
            $archivo = fopen( $nombre, "r" );
            
            while( !feof( $archivo )  )
            {
                $tmp_cad = fgets( $archivo ); //Concatenamos cada linea del archivo.
                
                //Esta linea agrega cambia algunos caracteres para que se puedan ver.
                $tmp_cad = $this->remplazar_caracteres( $tmp_cad );

                $this->g_contenido_lineas_archivo[ $i ] = $tmp_cad; //Captura las líneas en un vector.
                $this->realizar_reconocimiento_tokens( $tmp_cad );
                //echo $g_contenido_lineas_archivo[ $i ];
                $tmp_cad .= "<br>";
                $salida .= $tmp_cad;
                $i ++;
            }
            
            fclose( $archivo );
            
            return $salida;            
        }

        /**
        * Esta función remplaza algunos caracteres por otros.
        * Con solo los caracteres como vienen del archivo no es suficiente, el menor que
        * y mayor que no se mostrarían a no ser que se cambien por sus respectivos equivalentes
        * codificados.
        * @param        texto       El texto al cual se le van a remplazar caracteres.
        * @return       texto       El texto que se retorna con los caracteres remplazados.
        */
        private function remplazar_caracteres( $texto_original )
        {
            $salida = "".$texto_original;

            $salida = str_replace( "<", "&lt;", $salida );
            $salida = str_replace( ">", "&gt;", $salida );
            
            //Esto no está funcionando.
            $salida = str_replace( "á", "&aacute;", $salida );
            $salida = str_replace( "é", "&eacute;", $salida );
            $salida = str_replace( "í", "&iacute;", $salida );
            $salida = str_replace( "ó", "&oacute;", $salida );
            $salida = str_replace( "ú", "&uacute;", $salida );

            return $salida;
        }

        /**
        * Esta función se encarga de realizar un reconocimiento de los tokens.
        * @param        texto       
        */
        private function realizar_reconocimiento_tokens( $texto_original )
        {            
            $tmp_cad = str_replace( " ", "", $texto_original );

            //echo "---- ".str_replace( " ", "", $tmp_cad );

            for( $i = 0; $i < count( $this->g_arreglo_informe ); $i ++ )
            {
                if( strpos( $tmp_cad, $this->g_arreglo_informe[ $i ][ 0 ] ) !== false )  
                {
                    $this->g_arreglo_informe[ $i ][ 1 ] ++;
                    //echo " ok";
                }
            }

            //echo "<br>";

            //return $salida;
        }

        /**
        * Retorna el informe de hallazgos para la auditoría del código.
        * @return       texto       el informe de auditoría.
        */
        public function retornar_informe()
        {
            $salida = "";

            for( $i = 0; $i < count( $this->g_arreglo_informe ); $i ++ )
            {
                $salida .= $this->g_arreglo_informe[ $i ][ 0 ]." ";
                $salida .= "<strong>".$this->g_arreglo_informe[ $i ][ 1 ]."</strong>";
                $salida .= "<br>";
            }

            return $salida;
        } 
    }