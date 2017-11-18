<?php
/**
 * Created by PhpStorm.
 * User: Alexandra
 * Date: 17/11/2017
 * Time: 17:00
 */
session_start();

require_once "vendor/autoload.php";

Use controller\tir;
Use controller\Ballon;



/*
require_once "interfaces/Iaffichable.php";
require_once "classes/Ballon.php";
require_once "classes/Tir.php";*/

$ballon = new Ballon("ballon", 100, 30);
$tir = new Tir();
$tir->initscore();

$ballon->image("b.png");
$tir->ajouter($ballon);



if (!isset($_GET["idtir"])) {  // 1er tir
    echo $tir->afficherbtndepart();
}
else if($_GET["pret"]==0){ // Tirer
    $chiffreRand=$tir->tirer();

    if (($chiffreRand>25) and ($chiffreRand<75)){
        echo " buuuuuuuuut </br>";
        echo $tir->ajouterPoint();
    }
    else{
        echo "perdu</br>";
    }
    echo $tir->afficherbtnTirer();
}
else{    //Préparation du tir
    echo $tir->afficherbtnPrepare();
}

echo $tir->afficherscore();
echo $ballon->afficherBallon();
echo $tir->affichermessage();
