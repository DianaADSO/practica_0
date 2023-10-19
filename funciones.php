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
function calculo_v2()
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

//Función para consultar1
function calculo_v3()
{
    $salida = 0; // Inicializa la variable

    //Conexión con la base de datos
    $conexion = mysqli_connect('localhost', 'root', 'root', 'db_proyecto_ddm');
    $sql      = "SELECT 21 as 'edad'"; //Sql para publicar una columna con un número
    $resultado = $conexion->query($sql); //Resultado de ejecutar el query

    //Recorre el recordset
    while ($fila = mysqli_fetch_assoc($resultado)) {

        $salida = $fila['edad'];

        //Valida si es mayor de edad
        if($fila > 18){

            $salida = "Es mayor de edad". " " . "con " . " " . $salida. " ". "años."; // Envia mensaje afirmativo
        }else{

            $salida = "No es mayor de edad" . " " . "con " . " " . $salida . " " . "años."; // Envia mensaje negativo
        }

    }


    $conexion->close(); //Cerrar conexion
    return $salida; //Retorna la operación

}


//funcion para contar_usuarios
function contar_usuarios(){

    $salida = 0; // Inicializa la variable

    //Conexión con la base de datos
    $conexion = mysqli_connect('localhost', 'root', 'root', 'db_proyecto_ddm');
    $sql      = "SELECT count(*) as 'Conteo de usuarios' from tb_usuarios"; //Sql para publicar una columna con un número
    $resultado = $conexion->query($sql); //Resultado de ejecutar el query

    //Recorre el recordset
    while ($fila = mysqli_fetch_assoc($resultado)) {

        $salida = "Cantidad de usuarios:". " ". $fila['Conteo de usuarios']; //Recibe el valor de la columna Conteo de usuarios

    }




    $conexion->close(); //Cerrar conexion
    return $salida; //Retorna la operación
}


//funcion para contar_usuarios
function insertar_usuarios($nombres, $usuario, $email, $clave)
{

    $salida = " "; // Inicializa la variable

    //Conexión con la base de datos
    $conexion = mysqli_connect('localhost', 'root', 'root', 'db_proyecto_ddm');
    $sql      = "INSERT INTO `db_proyecto_ddm`.`tb_usuarios` (`nombres`, `usuario`, `email`, `clave`) "; //Sql para publicar una columna con un número
    $sql     .="VALUES ('$nombres', '$usuario', '$email','$clave' )"; //sql ingresa valores concatenando
    $resultado = $conexion->query($sql); //Resultado de ejecutar el query

  
    //si encuentra un valor en la columna
    if ($conexion->affected_rows > 0) {

        //echo "Grabado grabado hola";
        $salida = 1;
    } else {

        //echo "Error error";
        $salida = 0;
    }

    $conexion->close();//Cerrar conexion

    return $salida;//Retorna la operación
}


//funcion para contar_usuarios
function borrar_usuarios( $usuario)
{

    $salida = "";

    //Conexión con la base de datos
    $connexion = new mysqli('localhost', 'root', 'root', 'db_proyecto_ddm');
    $consulta  = "DELETE FROM `db_proyecto_ddm`.`tb_usuarios` WHERE (`usuario` = '$usuario')"; //Sql para borrar usuario
    $resultado = $connexion->query($consulta);//Resultado de ejecutar el query
 

        //validación si el resultado es verdadero
        if ($resultado == true) {

            $salida = "Tus datos han sido eliminado de la base"; // Envia mensaje afirmativo
        } else {

            $salida = "Vuelve a intentarlo"; // Envia mensaje negativo
        }
    return $salida;//Retorna la operación
    }


//funcion para contar_usuarios
function actualizar_usuarios($usuario, $sitio)
{

    $salida = "";

    //Conexión con la base de datos
    $connexion = new mysqli('localhost', 'root', 'root', 'db_proyecto_ddm');
    $consulta  = "UPDATE tb_usuarios set sitio = '$sitio' where usuario = '$usuario'"; //Sql para borrar usuario
    $resultado = $connexion->query($consulta); //Resultado de ejecutar el query


    //validación si el resultado es verdadero
    if ($resultado == true) {

        $salida = "Se ha agregado tu sitio:" . " " .$sitio; // Envia mensaje afirmativo
    } else {

        $salida = "No se ha agregado tu sitio"; // Envia mensaje negativo
    }
    return $salida; //Retorna la operación
}



//funcion para mostrar_sitio
function mostrar_sitio($usuario)
{

    $salida = " "; // Inicializa la variable

    //Conexión con la base de datos
    $conexion = mysqli_connect('localhost', 'root', 'root', 'db_proyecto_ddm');
    $sql      = "SELECT sitio from tb_usuarios where usuario = '$usuario'"; //Sql para mostrar el sitio del usuario 
    $resultado = $conexion->query($sql); //Resultado de ejecutar el query

    //Recorre el recordset
    while ($fila = mysqli_fetch_assoc($resultado)) {

        $salida .= "El sitio" . " " . "de". " " . $usuario . " " . "es:" . " " . "<a href='".$fila['sitio']."'>"; //Recibe el valor de la columna sitio y genera un enlace
        $salida .= "Ve a mi sitio"; //concatena el enlace
        $salida .= " </a>";//concatena el enlace

    }




    $conexion->close(); //Cerrar conexion
    return $salida; //Retorna la operación
}




?>