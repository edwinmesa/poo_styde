<?php
namespace Styde\Armors;
use Styde\Armor;
use Styde\Armor;
class CursedArmor implements Armor{
       public function absorbDamage(Attack $attack) {
        return $attack->getDamage() * 2;
    }
}
