<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Styde;

/**
 * Description of Weapon
 *
 * @author andredw
 */
abstract class Weapon {

    //put your code here
    protected $damage = 0;
    protected $magical = false;
    protected $description = ':unit ataca a :opponent';

    public function createAttack() {
        return new Attack($this->damage, $this->magical, $this->description);
    }
    
//    abstract function getDescription(Unit $attacker,Unit $opponent);

}
