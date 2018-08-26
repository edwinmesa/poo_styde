<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Styde;

/**
 * Description of FileLogger
 *
 * @author andredw
 */
class FileLogger implements Logger{
    //put your code here
    public  function info($message){
        file_put_contents(
                __DIR__.'/../storage/log.txt',
                '('.date('Y-m-d H:i:s').')'.$message."\n",
                FILE_APPEND              
                );
    }
}
