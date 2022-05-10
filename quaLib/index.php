<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="assests/css/main.css" rel="stylesheet" />
    <title>Login</title>
</head>
<?php
session_start();
if (isset($_POST['dni']) || isset($_POST['password'])) {
    $dni = $_POST['dni'];
    $password = $_POST['password'];
    $passwordCifrado = password_hash($password, PASSWORD_DEFAULT);
    $passwordVerify= password_verify($password, $passwordCifrado);
    [$host, $usuario, $passworddb, $bd] = ['localhost', 'staff', 'adminadmin123456', 'quaLib'];
    $conexion = new PDO("mysql:host=$host;dbname=$bd;charset=utf8", $usuario, $passworddb);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM profesores WHERE dni ='$dni'";
    $resultado = $conexion->query($sql);
    if ($resultado->fetch(PDO::FETCH_ASSOC) != null && $passwordVerify = true) {
        $_SESSION['dni'] = $dni;
        header("Location: Controlador/init.php");
    } else {
        echo 'El DNI o contraseña es incorrecto, vuelve a intentarlo.<br/>';
    }
} else {
    ?>
<body>
    <div class="main">
        <p class="sign" align="center">Sign in</p>
        <form class="form1" method="post" enctype="multipart/form-data">
            <input class="un" type="text" name="dni" align="center" placeholder="Username">
            <input class="pass" type="password" name="password" align="center" placeholder="Password">
            <button class="submit" align="center">Sign in</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php
}
?>