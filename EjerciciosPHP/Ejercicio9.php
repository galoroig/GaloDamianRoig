<?php
$api = file_get_contents('https://api.le-systeme-solaire.net/rest/bodies/');
$datos = json_decode($api);

class CuerpoCeleste{
    public $nombre;
    public $masa;
    public function __construct($nombre,$masa){
        $this -> nombre = $nombre;
        $this -> masa = $masa;
    }


    public function mostrar($mayor){
        echo "<p>El planeta N°{$mayor} en tamaño es: {$this -> nombre} con una masa de: {$this -> masa}</p>";
    }
}
foreach($datos -> bodies as $planetas){
    if ($planetas -> isPlanet === false) {
        continue;
    }
    $planeta = new CuerpoCeleste($planetas -> englishName,$planetas -> meanRadius);
    $planet[] = $planeta;
}
usort($planet, fn($a,$b) => $b -> masa <=> $a -> masa);

$mayor = 1;

foreach($planet as $p){
    $p -> mostrar($mayor);
    $mayor++;
    if ($mayor === 4){
        break;
    }
}
?>