<?php
$api = file_get_contents('https://wttr.in/Gualeguaychu?format=j1');
$datos = json_decode($api);
//echo $api;
class Clima{
    public $clima;
    public $temperatura;
    public function __construct($clima,$temperatura){
        $this -> clima = $clima;
        $this -> temperatura = $temperatura;
    }
    public function mostrar(){
        echo "</p>clima: {$this -> clima}<p>";
        echo "</p>temperatura: {$this -> temperatura}<p>";
    }
}


foreach($datos -> current_condition as $tiempo){
  $astro = new Clima($tiempo -> weatherDesc[0] -> value,$tiempo -> temp_C);
  $astro -> mostrar();
}
?>