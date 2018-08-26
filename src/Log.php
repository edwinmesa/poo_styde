<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Styde;

/**
 * Description of Log
 *
 * @author andredw
 */
class Log {
    //put your code here
    protected static $logger;
    public function setLogger(Logger $logger) {
        static::$logger = $logger;
    }
    public static function info($message){
        static::$logger->info($message);
    }
    
}
