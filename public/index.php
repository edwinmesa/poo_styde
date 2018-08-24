<?php
namespace Styde;
require '../vendor/autoload.php';

$ramm = new Unit('Ramm',new Weapons\BasicSword);
$ramm->setArmor(new Armors\BronzeArmor());
$silence = new Unit('Silence', new Weapons\CrossBow());
$silence->attack($ramm);
$silence->attack($ramm);
$ramm->attack($silence);
