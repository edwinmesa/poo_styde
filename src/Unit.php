<?php

namespace Styde;

use Exception;

class Unit {

    protected $hp = 40;
    protected $alive = true;
    protected $name;
    protected $armor;
    protected $weapon;

    public function getHp() {
        return $this->hp;
    }

    public function getName() {
        return $this->name;
    }

    public function __construct($name, Weapon $weapon) {
        $this->name = $name;
        $this->weapon = $weapon;
    }
    
    public function setWeapon(Weapon $weapon) {
        $this->weapon = $weapon;
    }

    public function setArmor(Armor $armor = null) {
        $this->armor = $armor;
    }

    public function move($direction) {
        show("{$this->name} camina hacia $direction");
    }

    public function attack(Unit $opponent) {
//        if(!$this->weapon){
//            throw new Exception("La unidad no tiene armas");
//        }
       show($this->weapon->getDescription($this, $opponent));
        $opponent->takeDamage($this->weapon->getDamage());
    }

    public function takeDamage($damage) {
        $this->hp = $this->hp - $this->absorbDamage($damage);
        show("{$this->name} ahora tiene {$this->hp} puntos de vida");
        if ($this->hp <= 0) {
            $this->dier();
        }
    }

//    protected function absorbDamage($damage) {
//        return $damage;
//    }

    public function dier() {
        show("{$this->name} muere");
        exit();
    }

    protected function absorbDamage($damage) {
        if ($this->armor) {
            $damage = $this->armor->absorbDamage($damage);
        }
        return $damage;
    }

}
