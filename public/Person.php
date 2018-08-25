<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person
 *
 * @author andredw
 */
class Person {
    //put your code here
    protected $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    public function name() {
        return $this->name;
    }
}

$duilio = new Person('Duilio');
$ramon = new Person('Edwin');
