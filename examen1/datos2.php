<?php
    //Crea el comjunto de datos que seran presentados en la grafica
    $politico = array("Agrupación Política","Gay","Trans");
    $mes1 = array("Septiembre",45,25);
    $mes2 = array("Octubre",41,28);
    $mes3 = array("Noviembre",37,34);
    $mes4 = array("Diciembre",30,30);

    echo json_encode(array($politico,$mes1,$mes2,$mes3,$mes4));
?>