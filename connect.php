<?php
// CONEXIO A LA BASE DE DATOS
    function conectarBD($nomBD){

        $conexion = new mysqli("localhost", "root", "") or die ("No se ha podido conectar al servidor de Base de datos");
        return $conexion;   
    }



    function seleccionarBD($conexion, $nomBD){
        return mysqli_select_db($conexion, $nomBD) or die ("No se ha podido seleccionar la base de datos $nomBD");
    }

   function tancarBD($conexion){
       mysqli_close($conexion);
    
   }
?>