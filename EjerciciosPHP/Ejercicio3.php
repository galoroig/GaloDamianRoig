<?php
$api = file_get_contents('https://api.exchangerate-api.com/v4/latest/USD');
$datos = json_decode($api);

class Moneda{
    public $monedas = [];
    public $valores = [];
    public function __construct($monedas,$valores){
        $this -> monedas = $monedas;
        $this -> valores = $valores;
    }
    public function mostrar(){
        foreach ($this -> monedas as $indice => $nombre){
            echo "</p>{$nombre}: {$this -> valores[$indice]}<p>";
        }
    }
}
$contador = 0;
foreach($datos -> rates as $nombre => $valor){
    $valores = new Moneda([$nombre],[$valor]);
    $valores -> mostrar();
    $contador++;
    if ($contador >= 6) {
        break;
    }
}
?>