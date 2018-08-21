<?php

function show($message) {
    echo "<p>$message</p>";
}

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
    /*
     * Se declara el takeDamage en la clase unidad este realiza
     * el calculo de los puntos, toma los puntos por defecto en este 
     * caso 40 puntos y hace el llamado al metodo absorbDamage. Para el 
     * soldado si tiene armadura le reduce de lo contrario toma por default.
     * Para el arquero lo toma sin esquivar y le aplica todo el daño y muere
     */

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

class Soldier extends Unit {

    protected $damage = 40;
    protected $armor;

    public function __construct($name) {
        parent::__construct($name);
    }
    /*
     * Este setArmor crea una aramdura para el 
     * sooldado
     */
    public function setArmor(Armor $armor = null) {
        $this->armor = $armor;
    }

    public function attack(Unit $opponent) {
        show("{$this->name} ataca con la espada a {$opponent->getName()}");
        $opponent->takeDamage($this->damage);
    }

    protected function absorbDamage($damage) {
        if ($this->armor) {
            /*
             * Si el soldado tiene una armadura entonces el daño es igual
             * al declarada en la clase armadura es decir la mitad del daño.
             * pues esta la obsorbe. a traves de la inyeccion de dependencias
             * o la inyeccion de objetos en el constructor
             */
            $damage = $this->armor->absorbDamage($damage);
        }

        return $damage;
    }

}

class Archer extends Unit {

    protected $damage = 20;

    public function attack(Unit $opponent) {
        show("{$this->name} dispara una flecha a {$opponent->getName()}");

        $opponent->takeDamage($this->damage);
    }

}
/*
 * Creacion de interfaces, esto con el fin de emplear el metodo
 * absorbDamage en varias clases de armaduras para soldados y 
 * hasta arqueros. Si inyectamos esta clase en otras clases se 
 * obliga a implementar los metodos.
 */
interface Armor {

    public function absorbDamage($damage);
}

class BronzeArmor implements Armor{

    public function absorbDamage($damage) {
        return $damage / 2;
    }

}
class SilverArmor implements Armor{
    public function absorbDamage($damage) {
        return $damage / 3;
    }
}

class CursedArmor implements Armor{
       public function absorbDamage($damage) {
        return $damage * 2;
    }
}

$armor = new BronzeArmor();
$ramm = new Soldier('Ramm');
$silence = new Archer('Silence');
//$silence->move('el norte');
$silence->attack($ramm);
/*
 * Polimorfismo.
 */
$ramm->setArmor(new CursedArmor);
$silence->attack($ramm);
$ramm->attack($silence);
