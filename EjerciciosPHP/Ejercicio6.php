<?php
$api = file_get_contents('https://rickandmortyapi.com/api/character');
$datos = json_decode($api);

class Personaje{
    public $nombre;
    public $raza;
    public $estado;
    public function __construct($nombre,$raza,$estado){
        $this -> nombre = $nombre;
        $this -> raza = $raza;
        $this -> estado = $estado;
    }
    public function mostrar(){
        echo "<p><b>Nombre: </b>{$this -> nombre} <b>Raza: </b>{$this -> raza} <b>Estado: </b>{$this -> estado}</p>";
    }
}
foreach($datos -> results as $personaje){
    if ($personaje -> status != "Alive" || $personaje -> species != "Human"){
        continue;
    }
        $pj = new Personaje($personaje -> name,$personaje -> species,$personaje -> status);
        $pj -> mostrar();
}
?>
