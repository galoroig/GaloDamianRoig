<?php
$api = file_get_contents('https://api.agify.io/?name=michael');
$datos = json_decode($api);

class Persona{
    public $nombre;
    public $edad;
    public function __construct($nombre,$edad){
        $this -> nombre = $nombre;
        $this -> edad = $edad;
    }
    public function mostrar(){
        echo "Nombre: {$this -> nombre} Edad: {$this -> edad}";
    }
}
$nombre = $datos -> name;
$edad = $datos ->age;
$persona = new Persona($nombre,$edad);
$persona -> mostrar();
?>