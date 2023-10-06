<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="test.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:100,200,300,400,500,600,700,800,900|PT+Sans+Narrow:100,200,300,400,500,600,700,800,900|PT+Sans+Narrow:700,800,|PT+Sans:100,200,300,400,500,600,700,800,900|Array:100,200,300,400,500,600,700,800,900|Special+Elite:100,200,300,400,500,600,700,800,900|Playfair+Display:100,200,300,400,500,600,700,800,900">
</head>
<style>
    
    /* Global */
    img {
        width: 200px;
        height: auto;
    }

    #frame-imagen {
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    /* Movil */
    @media screen and (max-width: 576px) {
        #login-margin {
            margin-top: 15%;
        }
    }

    /* Tablet */
    @media screen and (min-width: 576px) and (max-width: 960px) {
        #login-margin {
            margin-top: 10%;
        }
    }

    /* Desktop */
    @media screen and (min-width: 960px) {
        #login-margin {
            margin-top: 5%;
        }
    }
</style>
<body>
    <div class="container-fluid">
        <div class="row row-cols-12" id="login-margin">
            <div class="col-sm-2 col-lg-3 col-xxl-4"></div>
            <div class="col-sm-8 col-lg-6 col-xxl-4">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6" id="frame-imagen">
                            <a href=""><img src="img/Logo_reto.png" alt="Txurdi logo"></a>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
                <div class="col-12">
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="email" class="form-control" id="" name="correo">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="" name="contrasena">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Entrar" class="btn btn-primary">
                            <a class="btn btn-success">Registrarse</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-2 col-lg-3 col-xxl-4"></div>
        </div>
    </div>

</body>
</html>

<?php

    $correo = $_POST["correo"];
    $contasena = $_POST["contrasena"];

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