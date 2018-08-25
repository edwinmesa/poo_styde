<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BasicBow
 *
 * @author andredw
 */

namespace Styde\Weapons;

use Styde\Weapon;
//use Styde\Unit;

class FireBow extends Weapon {

    //put your code here
    protected $damage = 30;
    protected $magical = true; 
//    protected $description ;
    
//    public function getDescription(Unit $attacker, Unit $opponent) {
//        return "{$attacker->getName()} dispara una flecha a {$opponent->getName()}";
//    }

}
