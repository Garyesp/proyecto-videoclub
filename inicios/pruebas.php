<?php
require_once __DIR__ . '/Dwes/autoload.php'; // apunta a la carpeta Dwes

use Dwes\ProyectoVideoclub\Videoclub;
use Dwes\ProyectoVideoclub\Cliente;
use Dwes\ProyectoVideoclub\CintaVideo;
use Dwes\ProyectoVideoclub\Dvd;
use Dwes\ProyectoVideoclub\Juego;

// crear objetos
$vc = new Videoclub("Mi Videoclub");
$vc->incluirSocio("Juan")
   ->incluirCintaVideo("Titanic", 10, 195)
   ->incluirDvd("Matrix", 15, "Español/Inglés", "16:9");

// listar productos y socios
$vc->listarProductos();
$vc->listarSocios();
