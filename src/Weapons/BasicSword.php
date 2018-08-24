<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Styde\Weapons;

/**
 * Description of BasicSword
 *
 * @author andredw
 */

namespace Styde\Weapons;

use Styde\Weapon;
use Styde\Unit;
class BasicSword extends Weapon {

    //put your code here
    protected $damage = 40;
    protected $description = ':unit ataca con la espada a :opponent';
//    public function getDescription(Unit $attacker,Unit $opponent) {
//        return "{$attacker->getName()} ataca con la espada a {$opponent->getName()}";
//    }

}
