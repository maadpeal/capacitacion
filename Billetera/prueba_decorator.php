<?php

include './BilleteraEnPesos.php';
include './programa_secreto.php';
include 'decorator.php';
include 'decorator10.php';
include 'decorator20.php';
include 'decorator50.php';
include 'decorator100.php';
include 'decorator200.php';
include 'decorator500.php';
include 'mostrar.php';

$Billetera = new BilleteraEnPesos();

// $miBilletera = ... DECORAR LA BILLETERA ...
$mostrar = new MostrarTotales();
//$mostrar->mostrarEstadistica();

$decorator = new Decorator($Billetera, $mostrar);

$decorator10 = new Decorator10($decorator, $mostrar);

$decorator20 = new Decorator20($decorator10, $mostrar);

$decorator50 = new Decorator50($decorator20, $mostrar);

$decorator100 = new Decorator100($decorator50, $mostrar);

$decorator200 = new Decorator200($decorator100, $mostrar);

$decorator500 = new Decorator500($decorator200, $mostrar);

$decorator500 = programa_secreto($decorator500);

$decorator500->mostrarEstadistica('all');
//preguntar git