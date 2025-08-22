<form method="get">
    <input type="text" name="especie" placeholder="Especie">
    <input type="text" name="estado" placeholder="Estado">
    <button type="submit">buscar</button>
    <p>Especies: Human,Alien</p>
    <p>Estado: Alive,Dead,unknown</p>
</form>
<?php
if(isset($_GET["especie"]) && isset($_GET["estado"])){
    $especie = $_GET["especie"];
    $estado = $_GET["estado"];
}
$datos = file_get_contents('https://rickandmortyapi.com/api/character');
$datos = json_decode($datos);

class Buscador{
    public $nombre;
    public function __construct($nombre){
        $this -> nombre = $nombre;
    }
    
    public function mostrar(){
        echo "<p><b>Nombre: </b>{$this -> nombre}</p>";
    }
}

if(isset($_GET["especie"]) && isset($_GET["estado"])){
    foreach($datos -> results as $personaje){
        if (($personaje -> status != $estado) && ($personaje -> species != $especie)) {
            continue;
        }
        $pj = new Buscador($personaje -> name);
        $pj -> mostrar();
    }
}
?>
