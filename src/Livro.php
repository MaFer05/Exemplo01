<?php
namespace Exemplo01;

class Livro implements \JsonSerializable {
    private $titulo;
    private $genero;

    public function setTitulo($titulo) {
        if ($titulo != "")
            $this->titulo = $titulo;
    }
    public function getTitulo() {
        return $this->titulo;
    }

    public function setGenero($genero) {
        if ($genero != "")
            $this->genero = $genero;
    }
    public function getGenero() {
        return $this->genero;
    }

    public function jsonSerialize() {
        return [
            'titulo' => $this->getTitulo(),
            'tgenero' => $this->getGenero()
        ];
    }

    public function __contruct($titulo = "", $genero = "") {
        $this->setTitulo($titulo);
        $this->setGenero($genero);
    }
}