<?php
    include("connect.php");

    $conexion = conectarBD("ffib");
    $bd =  seleccionarBD($conexion, "ffib");
    
    $nom = $_GET['Nom'];
    $ape = $_GET['Cognom'];
    $domicili = $_GET['Domicili'];
    $email = $_GET['Email'];

    echo "Nom: " . $nom . "<br>";
    echo "Cognom: " . $ape . "<br>";    
    echo "Domicili: " . $domicili . "<br>";
    echo "Email: " . $email . "<br>";

    $insertar = "INSERT INTO entrenador (nom, apellidos, domicilio, emailPrincipal) VALUES ('$nom', '$ape', '$domicili', '$email')";

    if (mysqli_query($conexion, $insertar)) {
        echo "Nou registre creat correctament.";
    } else {
        echo "Error: " . $insertar . "<br>" . mysqli_error($conexion);
    }

    tancarBD($conexion);
?>