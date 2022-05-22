<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Listado de alumnos</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="../src/img/quaLib_logo.png" alt="Logo QUALIB" width="200px">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Clases</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                    foreach ($listaClases as $clase => $valor) {
                    ?>
                    <li><a href="#"><?=$valor?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </li>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-11">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Identificador</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Nota 1er parcial</th>
                        <th scope="col">Nota 2do parcial</th>
                        <th scope="col">Nota 3er parcial</th>
                        <th scope="col">Nota media</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($listaAlumnos as $alumno) {
                    ?>
                    <tr id="<?=$alumno->id?>">
                        <td><input type="number" name="id" maxlength="7" value="<?=$alumno->id?>" style="width:100px;"></td>
                        <td><input type="text" name="nombre" maxlength="120" value="<?=$alumno->nombre?>" style="width:120px;"></td>
                        <td><input type="text" name="apellidos" maxlength="120" value="<?=$alumno->apellidos?>" style="width:350px;"></td>
                        <td><input type="text" name="curso" maxlength="3" value="<?=$alumno->curso?>" style="width:100px;"></td>
                        <td><input type="number" name="parcial1" maxlength="3" id="parcial1_<?=$alumno->id?>" value="<?=$alumno->parcial1?>" style="width:100px;"></td>
                        <td><input type="number" name="parcial2" maxlength="3" id="parcial2_<?=$alumno->id?>" value="<?=$alumno->parcial2?>" style="width:100px;"></td>
                        <td><input type="number" name="parcial3" maxlength="3" id="parcial3_<?=$alumno->id?>" value="<?=$alumno->parcial3?>" style="width:100px;"></td>
                        <td><input type="number" name="nota" id="nota_<?=$alumno->id?>" value="<?=$alumno->calcularNota()?>" style="width:100px;"></td>
                        <td>
                            <button type="button" class="btn btn-warning" id="modificar_<?=$alumno->id?>" onclick="modificar('<?=$alumno->id?>')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                                    <path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"></path>
                                </svg>Modificar
                            </button>
                            <button type="button" class="btn btn-danger" onclick="eliminar('<?=$alumno->id?>')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                                    <path fill-rule="evenodd" d="M6.5 1.75a.25.25 0 01.25-.25h2.5a.25.25 0 01.25.25V3h-3V1.75zm4.5 0V3h2.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75zM4.496 6.675a.75.75 0 10-1.492.15l.66 6.6A1.75 1.75 0 005.405 15h5.19c.9 0 1.652-.681 1.741-1.576l.66-6.6a.75.75 0 00-1.492-.149l-.66 6.6a.25.25 0 01-.249.225h-5.19a.25.25 0 01-.249-.225l-.66-6.6z"></path>
                                </svg>Eliminar
                            </button>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Identificador</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Nota 1er parcial</th>
                        <th scope="col">Nota 2do parcial</th>
                        <th scope="col">Nota 3er parcial</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="insertar">
                        <td><input type="number" name="id" maxlength="5" style="height: 100%"></td>
                        <td><input type="text" name="nombre" maxlength="120" style="height: 100%"></td>
                        <td><input type="text" name="apellidos" maxlength="120" style="height: 100%"></td>
                        <td><input type="text" name="curso" maxlength="50" style="height: 100%"></td>
                        <td><input type="number" name="parcial1" maxlength="2" style="height: 100%"></td>
                        <td><input type="number" name="parcial2" maxlength="2" style="height: 100%"></td>
                        <td><input type="number" name="parcial3" maxlength="2" style="height: 100%"></td>
                        <td><button class="btn btn-primary" onclick="insertar();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                </svg> Añadir alumno
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../Vista/vistaProfesor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
