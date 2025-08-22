<?php
$api = file_get_contents('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin,ethereum&vs_currencies=usd');
$datos = json_decode($api);

class CryptoMoneda{
    public $nombre;
    public $precio;
    public function __construct($nombre,$precio){
        $this -> nombre = $nombre;
        $this -> precio = $precio;
    }
    public function mostrar(){
        echo "<p>{$this -> nombre} = {$this -> precio} USD<p>";
    }
}
foreach($datos as $moneda => $precio){
    $crypto = new CryptoMoneda ($moneda,$precio -> usd);
    $crypto -> mostrar();
}
?>