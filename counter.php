<?php
// Ścieżka do pliku z licznikiem
$counterFile = 'counter.txt';

// Odczytaj aktualną wartość licznika
$counter = (int) file_get_contents($counterFile);

// Zwiększ licznik o 1
$counter++;

// Zapisz nową wartość licznika do pliku
file_put_contents($counterFile, $counter);

?>