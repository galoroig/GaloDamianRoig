<?php
$datos = file_get_contents('https://pokeapi.co/api/v2/pokemon?limit=10');
$datos = json_decode($datos);

class TipoFuego{
    public $nombre;
    public $tipos = [];
    public function __construct($nombre,$tipo1,$tipo2 = null){
        $this -> nombre = $nombre;
        $this -> tipos = [$tipo1,$tipo2];
    }
    public function mostrar(){
        echo "<p><b>Nombre:</b> {$this -> nombre} <b>de tipo</b> {$this -> tipos[0]} {$this -> tipos[1]}</p>";
    }
}
foreach($datos -> results as $pokemon){
    $poke = file_get_contents($pokemon -> url);
    $poke = json_decode($poke);
        if(count($poke -> types) > 1){
            if(($poke -> types[0] -> type -> name != 'fire') && ($poke -> types[1] -> type -> name != 'fire')){
                continue;
            }
            $pokeFuego = new TipoFuego($pokemon -> name,$poke -> types[0] -> type -> name,$poke -> types[1] -> type -> name);
            $pokeFuego -> mostrar();
        } else {
            if($poke -> types[0] -> type -> name != 'fire'){
                continue;
            }
            $pokeFuego = new TipoFuego($pokemon -> name,$poke -> types[0] -> type -> name);
            $pokeFuego -> mostrar();
        }
}
?>