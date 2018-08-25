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
    protected static $name = 'Invitado';
    
    public function __construct($name) {
        static::$name = $name;
    }
    public static function name() {
        return static::$name;
    }
}

exit(Person::name());

$duilio = new Person('Duilio');
$ramon = new Person('Edwin');

$ramon->name();
$duilio->name();

echo "<p>{$duilio->name()}</p>";
echo "<p>{$ramon->name()}</p>";