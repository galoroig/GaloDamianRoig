<?php
$datos = file_get_contents('https://restcountries.com/v3.1/all?fields=name,population');
$datos = json_decode($datos);

class Pais{
    public $nombre;
    public $poblacion;
    public function __construct($nombre,$poblacion){
        $this -> nombre = $nombre;
        $this -> poblacion = $poblacion;
    }

    public function mostrar(){
        echo "<p><b>Nombre: </b>{$this -> nombre} <b>Poblacion: </b>{$this -> poblacion}</p>";
    }
}

foreach($datos as $pais){
    $info = new Pais($pais -> name -> common,$pais -> population);
    $informacion[] = $info;
}

usort($informacion, fn($a,$b) => $b -> poblacion <=> $a -> poblacion);

$top = 0;

foreach($informacion as $i){
    $i -> mostrar();
    if($top == 4){
        break;
    }
    $top++;
}
?>