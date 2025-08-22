<?php
$url = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd';

$options = [
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: PHP\r\n"
    ]
];

$context = stream_context_create($options);
$datos_json = file_get_contents($url, false, $context);
$datos = json_decode($datos_json);

if (!$datos) {
    die("Error: no se pudo obtener la información de la API.");
}

class Crypto{
    public $nombre;
    public $precio;
    public function __construct($nombre,$precio){
        $this -> nombre = $nombre;
        $this -> precio = $precio;
    }
    
    public function mostrar(){
        echo "<p><b>Nombre: </b>{$this -> nombre} <b>Precio: </b>{$this -> precio}</p>";
    }
}

foreach($datos as $monedas){
    $cash = new Crypto($monedas -> name,$monedas -> current_price);
    $crypto[] = $cash;
}
usort($crypto, fn($a,$b) => $b -> precio <=> $a -> precio);

$top = 1;

foreach($crypto as $c){
    $c -> mostrar();
    $top++;
    if ($top == 6) {
        break;
    }
}
?>