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
    protected  $name;
    protected static $database = 'mysql';
    public  $table = 'people';
    
    public function __construct($name) {
        $this->name = $name;
    }
    public  function name() {
        return $this->name;
    }
    
    public function save() {
        echo "<p>Saving {$this->name} in the table ". $this->table."</p>";
    }
}

//exit(Person::name());

//Person::$table = 'Personas';

$ramon = new Person('Rammon');
$ramon->table = 'Personas';
$ramon->save();

$duilio = new Person('Duilio');
$duilio->save();

$ramon->name();
$duilio->name();

echo "<p>{$duilio->name()}</p>";
echo "<p>{$ramon->name()}</p>";