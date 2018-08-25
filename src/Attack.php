<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Styde;

/**
 * Description of Attack
 *
 * @author andredw
 */
class Attack {
    //put your code here
    protected $damage;
    protected $magical;
    protected $description;
    public function __construct($damage, $magical, $description) {
        $this->damage = $damage;
        $this->magical = $magical;
        //LLave $key
        $this->description = $description;
    }
    
    public function getDescription(Unit $attacker, Unit $opponent) {
       return Traslator::get($this->description, [
            ':unit'=> $attacker->getName(),
            ':opponent'=>$opponent->getName(),
        ]);
//        return str_replace(
//                [':unit',':opponent'],
//                [$attacker->getName(),$opponent->getName()],
//                $this->description
//                );
    }
    
    public function getDamage() {
        return $this->damage;
    }
    
    public function isMagical() {
        return $this->magical;
    }
    
    public function isPhysical() {
        return !$this->magical;
    }
}
