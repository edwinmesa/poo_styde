<?php

abstract class Unit {

    protected $hp = 40;
    protected $alive = true;
    protected $name;

    public function getHp() {
        return $this->hp;
    }

    public function getName() {
        return $this->name;
    }

    public function __construct($name) {
        $this->name = $name;
    }

    public function move($direction) {
        show("{$this->name} camina hacia $direction");
    }

    abstract public function attack(Unit $opponent);

    public function takeDamage($damage) {
        $this->hp = $this->hp - $this->absorbDamage($damage);
        show("{$this->name} ahora tiene {$this->hp} puntos de vida");
        if ($this->hp <= 0) {
            $this->dier();
        }
    }

    protected function absorbDamage($damage) {
        return $damage;
    }

    public function dier() {
        show("{$this->name} muere");
        exit();
    }

}