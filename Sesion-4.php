<?php

function show($message) {
    echo "<p>$message</p>";
}

abstract class Unit {

    protected $hp = 40;
    protected $alive = true;
    protected $name;

    public function setHp($points) {
        $this->hp = $points;
        show("{$this->name} ahora tiene {$this->hp} puntos de vida");
    }

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
        $this->setHp($this->hp - $damage);
        if ($this->hp <= 0) {
            $this->dier();
        }
    }

    public function dier() {
        show("{$this->name} muere");
    }

}

class Soldier extends Unit {

    protected $damage = 40;

    public function attack(Unit $opponent) {
        show("{$this->name} corta a {$opponent->getName()} en dos");
        $opponent->takeDamage($this->damage);
    }

    /*
     * Reemplazamos el metodo takeDamage y le pasamos
     * la mitad de daño.
     */

    public function takeDamage($damage) {
        return parent::takeDamage($damage / 2);
    }

}

class Archer extends Unit {

    protected $damage = 20;

    public function attack(Unit $opponent) {
        show("{$this->name} dispara una flecha a {$opponent->getName()}");
        /*
         * Cuando atacamos llamamos al metodo takeDamage que tiene como 
         * argumento los puntos y realiza la resta es decir 40 puntos del
         * oponente menos 20 queda en 20.
         */
        $opponent->takeDamage($this->damage);
    }

    public function takeDamage($damage) {
        if (rand(0, 1) == 1) {
            return parent::takeDamage($damage);
        }
    }

}

$ramm = new Soldier('Ramm');
$silence = new Archer('Silence');
//$silence->move('el norte');
$silence->attack($ramm);
$silence->attack($ramm);
$ramm->attack($silence);
