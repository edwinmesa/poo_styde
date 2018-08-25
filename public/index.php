<?php

namespace Styde;

require '../vendor/autoload.php';
Traslator::set([
    'BasicBowAttack' => ':unit dispara una flecha a :opponent',
    'BasicSwordAttack' => ':unit ataca con la espada a :opponent',
    'CrossBowAttack' => ':unit dispara una flecha a :opponent',
    'FireBowAttack' => ':unit dispara una flecha de fuego a :opponent',
]);

$ramm = new Unit('Ramm', new Weapons\BasicSword);
$ramm->setArmor(new Armors\SilverArmor());
$silence = new Unit('Silence', new Weapons\FireBow);
$silence->attack($ramm);
$silence->attack($ramm);
$ramm->attack($silence);
