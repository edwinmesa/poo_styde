<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Styde;
class HtmlLogger implements Logger {

    public  function info($message) {
        echo "<p>$message</p>";
    }

}
