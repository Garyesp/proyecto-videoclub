<?php
// registramos una funcion de autoload que php llamara automaticamente
// cada vez que hagamos "new clase()" y la clase aun no este cargada
spl_autoload_register(function ($class) {

    // prefijo de nuestro namespace raiz
    $prefix = 'Dwes\\ProyectoVideoclub\\';

    // carpeta base donde estan nuestras clases
    $base_dir = __DIR__ . '/';

    // longitud del prefijo para compararlo con la clase que se esta intentando cargar
    $len = strlen($prefix);

    // si la clase no empieza con nuestro namespace la ignoramos
    if (strncmp($prefix, $class, $len) !== 0) return;

    // obtenemos la parte de la clase relativa al namespace
    $relative_class = substr($class, $len);

    // convertimos la estructura de namespace a la ruta de archivo
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // si el archivo existe lo incluimos
    if (file_exists($file)) require_once $file;
});
