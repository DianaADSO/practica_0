<?php

//Función para consultar
function consulta(){
    $salida = 0; // Inicializa la variable

    //Conexión con la base de datos
    $conexion = mysqli_connect('localhost', 'root', 'root', 'db_proyecto_ddm');
    $sql      = "SELECT 2 + 1 "; //Sql para sumar
    $sql     .= " as 'Suma'"; //sql para poner el alias al anterior sql
    $resultado = $conexion->query($sql); //Resultado de ejecutar el query

    //Recorre el recordset
    while($fila = mysqli_fetch_assoc($resultado)){

        //Acumula   
        $salida += $fila['Suma']; 
    }


    $conexion->close(); //Cerrar conexion
    return $salida; //Retorna la operación

}


//Función para consultar1
function consulta1()
{
    $salida = 0; // Inicializa la variable

    //Conexión con la base de datos
    $conexion = mysqli_connect('localhost', 'root', 'root', 'db_proyecto_ddm');
    $sql      = "SELECT 10 as 'n1', "; //Sql para publicar una columna con un número
    $sql     .= " 20 as 'n2'"; //sql concatenado
    $resultado = $conexion->query($sql); //Resultado de ejecutar el query

    //Recorre el recordset
    while ($fila = mysqli_fetch_assoc($resultado)) {

        //Acumula   
        $n1  = $fila['n1']; //Recibe el valor de la columna n1
        $n2  = $fila['n2']; //Recibe el valor de la columna n2
        $salida += $n1 + $n2; // Suma los valores de n1 y n2
    }


    $conexion->close(); //Cerrar conexion
    return $salida; //Retorna la operación

}


?>