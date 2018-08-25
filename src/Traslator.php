<?php

namespace Styde;

class Traslator {

    protected static $messages = [   
    ];
    
    public static function set(array $messages){
        return static::$messages = $messages;
    }

        public static function get($key, array $params = array()) {
        //Comprobamos que el mensaje exista, sino existe retorno una llave
        if (!static::has($key)) {
            return "[$key]";
        }

        return static::replaceParams(static::$messages[$key],$params);
    }

    //metodo que acepta la llave del mensaje
    public static function has($key) {
        return isset(static::$messages[$key]);
    }
    //Metodo que recibe un mensaje y reemplaza los parametros del mensaje
    public static function replaceParams($message, array $params) {
        foreach ($params as $key => $value) {
            $message = str_replace($key, $value, $message);
        }

        return $message;
    }

}
