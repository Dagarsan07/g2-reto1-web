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
    // inicio de sesion y llama a conectarse con la bbdd
    session_start(); 
    include "conexion.php";

    // si los campos estan rellenados
    if (isset($_POST['correo']) && isset($_POST['contrasena'])) {

        // funcion validar
        function validate($data){
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }
    
        $email = validate($_POST['correo']);
        $pass = validate($_POST['contrasena']);
        
        // si los campos estan vacios
        if (empty($email)) {
            header("Location: login.php?error=El_correo_es_obligatorio");
            exit();
            
        }
        else if(empty($pass)){
            header("Location: login.php?error=La_contraseña_es_obligatoria");
            exit();
        }
        // si los campos no estan vacios comprueba si son validos
        else{

            // solicita los datos de las credenciales introducidas
            $sql = "SELECT * FROM usuario WHERE correo='". $email ."' AND contrasena='". $pass ."';";
            $stmt = $miPDO->query($sql);
            $stmt ->execute();
           
            // si encuentra un resultado (el usuario correcto)
            if ($row = $stmt->fetch()) {
                if ($row['correo'] === $email && $row['contrasena'] === $pass) {
               
                    // echo "Logged in!";
                    $_SESSION['correo'] = $row['correo'];
                    $_SESSION['nombre'] = $row['nombre'];
                    $_SESSION['apellido'] = $row['apellido'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: inicio.php");
                    exit();
               
                }
                else{
                    header("Location: login.php?error=Usuario_o_contraseña_incorrectos");
                    exit();
                }
            }
            else{
                header("Location: login.php?error=Usuario_o_contraseña_incorrectos");
                exit();
            }
        }
    }
?>

