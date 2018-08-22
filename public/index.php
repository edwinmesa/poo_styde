<?php
namespace Styde;
require './src/helpers.php';
/*
 * Con esta funcion de PHP lo que hacemos es validar 
 * que se carguen todas las clases de src, para evitar
 * que el codigo se duplique, tanto 'requiere'
 */


$armor = new BronzeArmor();
$ramm = new Soldier('Ramm');
$silence = new Archer('Silence');
$silence->attack($ramm);
$ramm->setArmor(new CursedArmor);
$silence->attack($ramm);
$ramm->attack($silence);
