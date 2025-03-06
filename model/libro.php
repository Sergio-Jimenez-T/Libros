<?php
class Libro {
    public $id;
    public $titulo;
    public $autor;
    public $editorial;

    public function __construct($id, $titulo, $autor, $editorial) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editorial = $editorial;
    }
}
?>
