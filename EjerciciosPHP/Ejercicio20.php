<?php
$datos = file_get_contents('https://wttr.in/Gualeguaychu?format=j1');
$clima = json_decode($datos);

$url = 'https://api.quotable.io/random';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, "PHP");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);
$frase = json_decode($response);

$url = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd';
$options = [
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: PHP\r\n"
    ]
];
$context = stream_context_create($options);
$datos_json = file_get_contents($url, false, $context);
$crypto = json_decode($datos_json);
if (!$crypto) {
    die("Error: no se pudo obtener la información de la API.");
}

class Dashboard{
    public $clima;
    public $temperatura;
    public $frase;
    public $precio;
    public function __construct($clima,$temperatura,$frase,$precio){
        $this -> clima = $clima;
        $this -> temperatura = $temperatura;
        $this -> frase = $frase;
        $this -> precio = $precio;
    }

    public function mostrar(){
        echo "<p><b>Clima: </b>{$this -> clima}<b> Temperatura: {$this -> temperatura}</b></p>";
        echo "<p>{$this -> frase}</p>";
        echo "<p><b>Bitcoin: </b>{$this -> precio} USD</p>";
    }
}

$dashBoard = new Dashboard($clima -> current_condition[0] -> weatherDesc[0] -> value,$clima -> current_condition[0] -> temp_C,$frase -> content,$crypto[0] -> current_price);
$dashBoard -> mostrar();
?>