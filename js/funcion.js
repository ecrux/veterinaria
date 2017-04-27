/**
* Autor : Edwar Cruz
* Fecha : 28/02/2017
* Este sera mi archivo de funciones js
*

*/
console.log('Edwar');



/**
* Esta función me permite tomar los valores de un select multiples
* @return text      retornara los valores selecionados en mi select.
*/
function al_dar_clic_en_listaa()
{
    var lista = document.getElementById( "select" );
    var contenedor_salida = document.getElementById( "contenedor-salida" );
    var salida = "";
    var retornar="";
    var conteo = 0;

    console.log( "Total de elementos de la lista: " + lista.length );

    for( var i = 0; i < lista.length; i ++ )
    {
        //console.log( lista.item( i ).value );

        if( lista.item( i ).selected )
        {
            if (salida == "") 
            {
                salida += /*salida + "&nbsp;&nbsp; t1.id_sintoma = " + */lista.item( i ).value;
            }else{
                salida += /*salida + "&nbsp;&nbsp; t1.id_sintoma = " + */","+lista.item( i ).value;
            }
            //if( conteo > 0 ) salida += "&nbsp;&nbsp; OR ";
            /*console.log( "Seleccionado " );*/
            conteo ++;
        }
    }   

    //salida += " ) <br>";
    console.log(retornar);
    contenedor_salida.value = salida;
    //verificar(retornar);
    document.getElementById( "contenedorsalida" ).innerHtml= retornar;
}


/**********************************************************************************************/
/************** ::::::::::::::::::INCIO DE MI ANGULAR::::::::::::::::::************************/
var acumuladorApp = angular.module( 'App', [] );
        
        acumuladorApp.controller( "App-Ctrl",
            
            //[ "$scope",  //Originalmente solo se minificaba el scope.
            [ "$scope", "$http", //Esto es para minificar, pero interfiere con lo de php, hay que minificar las otras variables.
             
                function( $scope, $http )
                {
            
                    $scope.cargar_datos_php = function()
                    {
                        var cad2 = $scope.datos.texto2;
                        console.log("Funcionando");
                        if( cad2.length > 0 )
                        {
                            //Aquí se hace el llamado a un php con conexión a MySQL.
                            $http.get( 'llamado-php.php?cadena=' + cad2 ).success
                            (
                                function( response ) 
                                { 
                                    console.log( 'response' );
                                    $scope.campos = response.records;            
                                }
                            );   
                        }                    
                    };
                }
            ] //Si se minifica, se deben minificar todas las llamadas inyecciones, de lo contrario mejor no minifique nada.
        );

/**********************************************************************************************/
/************** ::::::::::::::::::FIN DE MI ANGULAR::::::::::::::::::************************/