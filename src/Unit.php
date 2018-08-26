<?php

namespace Styde;

class Unit {

//    const PROJECT = 'Styde';
    const MAX_DAMAGE = 100;

    protected $hp = 40;
    protected $alive = true;
    protected $name;
    protected $armor;
    protected $weapon;
    protected $logger;

    public function getHp() {
        return $this->hp;
    }

    public function getName() {
        return $this->name;
    }

    public function __construct($name, Weapon $weapon) {
        $this->name = $name;
        $this->weapon = $weapon;
        $this->armor = new Armors\MissingArmor();
    }

    public static function createSoldier() {
        $soldier = new Unit('Ramm', new Weapons\BasicSword);
        $soldier->setArmor(new Armors\SilverArmor());

        return $soldier;
    }

    public function setWeapon(Weapon $weapon) {
        $this->weapon = $weapon;
        return $this;
    }

    public function setArmor(Armor $armor = null) {
        $this->armor = $armor;
        return $this;
    }

    public function setShield() {
        return $this;
    }

    public function move($direction) {
        Log::info("{$this->name} camina hacia $direction");
    }

    public function attack(Unit $opponent) {
//        if(!$this->weapon){
//            throw new Exception("La unidad no tiene armas");
//        }
        $attack = $this->weapon->createAttack();

        Log::info($attack->getDescription($this, $opponent));
        $opponent->takeDamage($attack);
    }

    public function takeDamage(Attack $attack) {

        $this->setHp(
                $this->armor->absorbDamage($attack)
                );
        Log::info("{$this->name} ahora tiene {$this->hp} puntos de vida");
        if ($this->hp <= 0) {
            $this->dier();
        }
    }

    protected function setHp($damage) {
        if ($damage > static::MAX_DAMAGE) {
            $damage = static::MAX_DAMAGE;
        }
        $this->hp = $this->hp - $damage;
    }

//    protected function absorbDamage($damage) {
//        return $damage;
//    }

    public function dier() {
        HtmlLogger::info("{$this->name} muere");
        exit();
    }

//    protected function absorbDamage(Attack $attack) {
////        if ($this->armor) {
//            return $this->armor->absorbDamage($attack);
////        }
////        return $attack->getDamage();
//    }
}
