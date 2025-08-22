<?php
$url = 'https://api.quotable.io/random';
$citas = [];

for ($i = 0; $i < 5; $i++) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "PHP");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response);
    if ($data) {
        $citas[] = $data;
    }
}

class Cita{
    public $frase;
    public $autor;
    public function __construct($frase,$autor){
        $this -> frase = $frase;
        $this -> autor = $autor;
    }

    public function mostrar(){
        echo "<p> <b>Frase: </b>{$this -> frase}</p>";
        echo "<p> <b>Autor: </b>{$this -> autor}</p>";
    }
}

foreach($citas as $info){
    $contenido = new Cita($info -> content,$info -> author);
    $contenido -> mostrar();
}
?>