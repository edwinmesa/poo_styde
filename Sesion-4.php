<?php
function show($message) {
    echo "<p>$message</p>";
}

abstract class Unit {

    protected $alive = true;
    protected $name;
    
    public function getName() {
        return $this->name;
    }

    public function __construct($name) {
        $this->name = $name;
    }

    public function move($direction) {
        show ("{$this->name} camina hacia $direction");
    }

    abstract public function attack($opponent);
    
    public function dier() {
        show("{$this->name} muere");
    }
}

class Soldier extends Unit {

    public function attack($opponent) {
        show("{$this->name} corta a $opponent en dos");
    }

}

class Archer extends Unit {

    public function attack($opponent) {
        show("{$this->name} dispara una flecha a {$opponent->getName()}");
        $opponent->dier();
    }

}
$ramm = new Soldier('Ramm');
$silence = new Archer('Silence');
//$silence->move('el norte');
$silence->attack($ramm);
