<?php
require_once("configuracion/Database.php");
require_once("model/libro.php");

class LibroController {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Muestra todos los libros
    public function index() {
        $query = "SELECT * FROM libros";  // Suponiendo que la tabla en la BD se llama 'libros'
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $rowset = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require("view/todosRegistros.php");
    }

    // Muestra un libro específico por ID
    public function verRegistro($id) {
    $query = "SELECT * FROM libros WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC); // Asegúrate de usar FETCH_ASSOC

    if ($row) {
        require("view/unRegistro.php");
    } else {
        echo "El libro con ID $id no existe.";
    }
}
public function verVariosLibros($cantidad) {
    $query = "SELECT * FROM libros LIMIT :cantidad";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
    $stmt->execute();
    $rowset = $stmt->fetchAll(PDO::FETCH_ASSOC); // O FETCH_OBJ si prefieres objetos

    require("view/variosRegistros.php");
}

}
?>
