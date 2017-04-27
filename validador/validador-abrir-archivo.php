<?php

    /**
     * Autor: Camilo Figueroa ( Crivera )
     *
     */
    
    include( "clases/GraficosValidador.php" );
    $obj_graficos_validador = new GraficosValidador();
    
    include( "clases/Validador.php" );
    $obj_validador = new Validador();
    
    if( isset( $_GET[ 'nombre_archivo' ] ) )
    {
        $g_nombre_archivo = $_GET[ 'nombre_archivo' ];
        $contenido_archivo = $obj_validador->abrir_archivo( $g_nombre_archivo );
        //$contenido_archivo .= $obj_graficos_validador->colocar_lista( $obj_validador->g_contenido_lineas_archivo ); 
        $contenido_archivo .= $obj_validador->retornar_informe();

        echo $obj_graficos_validador->colocar_html( "Validador de sitio web.", $contenido_archivo );
    }