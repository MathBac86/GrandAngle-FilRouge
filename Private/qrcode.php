<?php

require_once "connectbdd.php";
require_once 'phpqrcode/qrlib.php';

$path = 'img/flashcode/';
$idOeuvre = $_GET['ido'];
$qrcode = uniqid().".png";
$file = $path.$qrcode;
$text = "http://matbac.alwaysdata.net/www/GrandAngle/oeuvre.php?idOeuvre=".$idOeuvre."";
// $text = "http://10.22.0.33/isfac/FilRouge/oeuvre.php?idOeuvre=".$idOeuvre."";

QRcode::png($text, $file, 'L', 10, 1);

$bdd->query("UPDATE oeuvre
SET Flashcode = '$qrcode'
WHERE IdOeuvre = $idOeuvre");

header('Location: Flashcode.php');

?>
