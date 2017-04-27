/**
* Edwar Cruz
*/
//console.log( "Funcionando" );
console.log('Edwar');


/**
* Función que me permite tomar los valores de un select multiple y me 
* @return text  retorna los valores de los option seleccionados
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
        console.log( lista.item( i ).value );

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
    retornar =  " SELECT COUNT(*) FROM tb_relacion t5 ";
    retornar += " WHERE t5.id_sintoma in (" + salida+ ")";
    //salida += " AND   t2.id_enfermedad = t3.t2.id_enfermedad <br>";
    //salida += " AND ( <br>";


    //salida += " ) <br>";
    console.log(retornar);
    contenedor_salida.value = retornar;
}


function al_dar_clic_en_lista()
{
    var lista = document.getElementById( "lista-opciones" );
    var contenedor_salida = document.getElementById( "contenedor-salida" );
    var salida = "";
    var conteo = 0;

    salida =  " SELECT * FROM tb_enfermedades t3, tb_sintomas_enfermedades t2, tb_sintomas t1 <br>";
    salida += " WHERE t1.id_sintoma = t2.id_sintoma <br>";
    salida += " AND   t2.id_enfermedad = t3.t2.id_enfermedad <br>";
    salida += " AND ( <br>";

    console.log( "Total de elementos de la lista: " + lista.length );

    for( var i = 0; i < lista.length; i ++ )
    {
        console.log( lista.item( i ).value );

        if( lista.item( i ).selected )
        {
            if( conteo > 0 ) salida += "&nbsp;&nbsp; OR ";
            salida = salida + "&nbsp;&nbsp; t1.id_sintoma = " + lista.item( i ).value + " <br>";
            console.log( "Seleccionado " );
            conteo ++;
        }
    }   

    salida += " ) <br>";

    contenedor_salida.innerHTML = salida;
}