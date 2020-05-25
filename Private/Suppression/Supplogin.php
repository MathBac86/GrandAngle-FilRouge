<?php
$idl=$_GET['idl'];
    require_once '../connectbdd.php';

    $reqsu ="DELETE FROM users WHERE ID =".$idl."";
    $repsu = $bdd->query($reqsu);

    header('location: ../GestionLogin.php');
    exit();


?>
