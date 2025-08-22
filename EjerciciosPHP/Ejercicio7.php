<?php
$api1 = file_get_contents("https://wttr.in/BuenosAires?format=j1");
$BsAs = json_decode($api1);
$api2 = file_get_contents("https://wttr.in/C%C3%B3rdoba+Argentina?format=j1");
$cordoba = json_decode($api2);

class Ciudad{
    public $tempBsAs;
    public $tempCordoba;
    public function __construct($tempBsAs,$tempCordoba){
        $this -> tempBsAs = $tempBsAs;
        $this -> tempCordoba = $tempCordoba;
    }
    public function compararTemperatura(){
        if ($this -> tempBsAs > $this -> tempCordoba) {
            echo "<p>La temperatura es mayor en Buenos Aires, con {$this -> tempBsAs} °C</p>";
        }
        else if ($this -> tempCordoba > $this -> tempBsAs) {
            echo "<p>La temperatura es mayor en Cordoba, con {$this -> tempCordoba} °C</p>";
        }
        else {
            echo "<p>Las temperaturas son iguales con {$this -> tempCordoba}</p>";
        }
    }
}

    $tempBsAs = ($BsAs -> current_condition[0] -> temp_C);
    $tempCordoba = ($cordoba -> current_condition[0] -> temp_C);
    $valor = new ciudad($tempBsAs,$tempCordoba);
    $valor -> compararTemperatura();
?>