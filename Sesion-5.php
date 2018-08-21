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
        show("{$this->name} ataca con la espada a {$opponent->getName()}");
        $opponent->takeDamage($this->damage);
    }
    /*
     * Accedemos al metodo padre de Unit y le aplicamos el daño
     * que infringe el oponente en esta caso el arquero 20/2 = 10
     * Este seria el daño y se resta del puntaje 40-10 = 30
     */
    public function takeDamage($damage) {
        return parent::takeDamage($damage / 2);
    }

}

class Archer extends Unit {

    protected $damage = 20;

    public function attack(Unit $opponent) {
        show("{$this->name} dispara una flecha a {$opponent->getName()}");

        $opponent->takeDamage($this->damage);
    }
    /*
     * Accedemos al metodo padre de Unit y le aplicamos el daño
     * que infringe el oponente en esta caso el soldado que son 40
     * Este seria el daño y se resta del puntaje 40-40 = 0, pero
     * el arquero puede esquivar este ataque
     */
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
