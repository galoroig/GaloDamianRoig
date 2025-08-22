<?php
$api = file_get_contents('http://api.open-notify.org/astros.json');
$datos = json_decode($api);
//echo $api;
class astronauta{
    public $nombre;
    public $nave;
    public function __construct($nombre,$nave){
        $this -> nombre = $nombre;
        $this -> nave = $nave;
    }
    public function mostrar(){
        echo "nombre: {$this -> nombre}";
        echo "nave: {$this -> nave}";
    }
}
foreach($datos -> people as $persona){
  $astro = new astronauta($persona -> name,$persona ->craft);
  $astro -> mostrar();
}
?>