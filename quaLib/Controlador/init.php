<?php
require_once("ControladorProfesor.php");

$listaAlumnos = [];
$listaClases = [];
$numPag = 1;
$tamPag = 10;
$ultPag = ceil(ControladorProfesor::numAlumnos() / $tamPag);

$listaAlumnos = ControladorProfesor::listar($numPag, $tamPag);
$listaClases = ControladorProfesor::getClases();

if(isset($_GET['pag']) && $_GET['pag'] <= $ultPag && $_GET['pag'] >= 1) {
    $numPag = intval($_GET['pag']);
    $listaAlumnos = ControladorProfesor::listar($numPag, $tamPag);
}

require_once("../Vista/vistaProfesor.php");