<?php

    /**
     * Autor: Camilo Figueroa ( Crivera )
     *
     */
    
    class GraficosValidador
    {
        /**
         * Constructor de la clase. Inicializa variables.
         */
        public function GraficosValidador()
        {
            
        }
        
        /**
         * Este m�todo se encarga de colocar el html b�sico en el resultado del an�lisis.
         * @param       texto           el título que llevará el html.
         * @param       texto           el contenido que deberá llevar el html.
         * @return      texto           todo el contenido html de la página.
         */
        public function colocar_html( $titulo, $contenido )
        {
            $salida = "";
            
            $salida .= "<html>";
            $salida .= "     <head>";
            $salida .= "         <title>$titulo</title>";
            $salida .= "     </head>";
            $salida .= "     <body>";
            $salida .= $contenido;
            //$salida .= $this->colocar_lista( $this-> );
            $salida .= "     </body>";
            $salida .= "</html>";
            
            return $salida;
        }

        /**
        * Coloca el contenido del archivo en una lista línea a línea.
        * @param        arreglo         un vector que contiene cada línea del archivo.
        * @return       texto           texto que representa una lista en html.
        */
        public function colocar_lista( $arreglo_lineas )
        {
            $salida = "";
            $i = 0;
            
            //Verificamos que el archivo no esté vacío y que el vector de líneas contenga elementos.
            //if( count( $arreglo_lineas ) > 0 )
            //{

                $salida .= "<select>";

                for( $i = 0; $i < count( $arreglo_lineas ); $i ++ )
                {
                    $salida .= "<option>".$arreglo_lineas[ $i ]."</option>";
                }

                $salida .= "</select>";
            //}           

            return $salida;
        }
    }