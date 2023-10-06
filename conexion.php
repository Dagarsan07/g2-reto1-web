<?php
try {

    // variables de conexion
    $usuarioDB = "root";
    $contasenaDB = "";
    $hostDB = "127.0.0.1";
    $nombreDB = "reto1";

    // arranca la conexion a la BBDD
    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO ($hostPDO, $usuarioDB , $contasenaDB);
    // si es exitosa la conexion
    echo "Conexion exitosa con la base de datos <br>";

}
catch (PDOException $e) {
    echo "No se ha podido conectar con la BD<br>";
    echo $e -> getMessage();
    exit;
}
?>