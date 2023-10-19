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



    return $salida; //Retorna la operación

}



?>