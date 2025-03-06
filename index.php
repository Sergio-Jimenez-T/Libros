<?php
require_once("controller/LibroController.php");

$controller = new LibroController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'ver') {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $controller->verRegistro($id);
    } elseif ($action === 'verVarios') {
        $cantidad = isset($_GET['cantidad']) ? intval($_GET['cantidad']) : 5;
        $controller->verVariosLibros($cantidad);
    } else {
        $controller->index(); // Muestra todos los libros
    }
} else {
    $controller->index(); // Página principal
}
?>
