<?php

//Se incluye el archivo funciones
include('funciones.php');

// Se invoca la función consultar
echo consulta()."<br>";

// Se invoca la función calculo_v2
echo calculo_v2() . "<br>";

// Se invoca la función calculo_v3
echo calculo_v3() . "<br>";

// Se invoca la función contar_usuarios
echo contar_usuarios() . "<br>";

// Se invoca la función insertar_usuarios
//echo insertar_usuarios('oscar', 'oscar', 'oscar@gmail.com', '123');

// Se invoca la función borrar_usuarios
//echo borrar_usuarios('diana');

// Se invoca la función actualizar_usuarios
echo actualizar_usuarios('diana', 'https://twitter.com/dianaprograma');
?>