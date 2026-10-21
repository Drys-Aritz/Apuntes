<?php
for ($numero = 2; $numero <= 50; $numero++) {
    $esPrimo = true;
    for ($divisor = 2; $divisor < $numero; $divisor++){
        if ($numero % $divisor == 0){
            $esPrimo = false;
        }
    }
    if ($esPrimo == true) {
        echo "$numero<br>";
    }
}
?>