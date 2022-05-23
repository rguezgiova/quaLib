<?php
require_once("ControladorProfesor.php");

$listaAlumnos = [];
$listaClases = [];
$tamPag = 20;

$listaAlumnos = ControladorProfesor::listar($tamPag);

require_once("../Vista/vistaProfesor.php");