<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Styde\Armors;
Use Styde\Attack;
use Styde\Armor;
/**
 * Description of MissingArmor
 *
 * @author andredw
 */
class MissingArmor extends Armor{
    //put your code here
    public function absorbDamage(Attack $attack) {
        return $attack->getDamage();
    }
    
}
