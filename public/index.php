<?php
namespace Styde;
require './src/helpers.php';
/*
 * Con esta funcion de PHP lo que hacemos es validar 
 * que se carguen todas las clases de src, para evitar
 * que el codigo se duplique, tanto 'requiere'
 */
spl_autoload_register(function ($className) {
    if (strpos($className, 'Styde\\') === 0) {
        $className = str_replace('Styde\\', '', $className);
        if (file_exists("src/$className.php")) {
            require "src/$className.php";
        }
    }
//    exit($className);    
});

$armor = new BronzeArmor();
$ramm = new Soldier('Ramm');
$silence = new Archer('Silence');
$silence->attack($ramm);
$ramm->setArmor(new CursedArmor);
$silence->attack($ramm);
$ramm->attack($silence);
