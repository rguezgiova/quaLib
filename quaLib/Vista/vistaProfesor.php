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
                        <th scope="col">Asignatura</th>
                        <th scope="col">Nota</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($listaAlumnos as $alumno) {
                    ?>
                    <tr id="<?=$alumno->id?>">
                        <td><input type="number" name="id" value="<?=$alumno->id?>" style="width:100px;"></td>
                        <td><input type="text" name="nombre" value="<?=$alumno->nombre?>" style="width:120px;"></td>
                        <td><input type="text" name="apellidos" value="<?=$alumno->apellidos?>" style="width:350px;"></td>
                        <td><input type="text" name="asignatura" value="<?=$alumno->asignatura?>" style="width:120px;"></td>
                        <td><input type="number" name="nota" value="<?=$alumno->nota?>" style="width:100px;"></td>
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
                        <th scope="col">Asignatura</th>
                        <th scope="col">Nota</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="insertar">
                        <td><input type="number" name="id" maxlength="5" style="height: 100%"></td>
                        <td><input type="text" name="nombre" maxlength="120" style="height: 100%"></td>
                        <td><input type="text" name="apellidos" maxlength="120" style="height: 100%"></td>
                        <td><input type="text" name="asignatura" maxlength="50" style="height: 100%"></td>
                        <td><input type="number" name="nota" maxlength="2" style="height: 100%"></td>
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
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Identificador</th>
                        <th scope="col">Nota</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="number" name="id" style="height: 100%"></td>
                        <td><input type="number" name="nota" maxlength="120" style="height: 100%"></td>
                        <td><button class="btn btn-primary" onclick="insertar();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                </svg> Añadir nota
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
