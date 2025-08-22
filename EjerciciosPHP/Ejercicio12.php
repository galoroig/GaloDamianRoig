<?php
$datos = file_get_contents('https://wttr.in/Gualeguaychu?format=j1');
$datos = json_decode($datos);

class Pronostico{
    public $temperatura;
    public $estado;
    public $fecha;
    public function __construct($temperatura,$estado,$fecha){
        $this -> temperatura = $temperatura;
        $this -> estado = $estado;
        $this -> fecha = $fecha;
    }
    public function mostrar(){
        echo "<p><b>Fecha: </b>{$this -> fecha}</p>";
        echo "<p><b>Temperatura: </b>°{$this -> temperatura}</p>";
        echo "<p><b>Estado: </b>{$this -> estado}</p>";
        echo "<br></br>";
    }
}
foreach($datos -> weather as $clima){
    $tiempo = new Pronostico($clima -> avgtempC,$clima -> hourly[4] -> weatherDesc[0] -> value,$clima -> date);
    $tiempo -> mostrar();
}
?>