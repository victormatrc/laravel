<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Exceptions;

/**
 * Description of BusinessException
 *
 * @author victorcanario
 */
class BusinessException extends \Exception {
    public function __construct(string $message, int $httpStatus)
    {
        parent::__construct($message, $httpStatus, null);
    }
    
    /**
     * 
     * @param string $dataExpected
     * @throws \App\Exceptions\BusinessException
     */
    public static function handleExceptionFieldNotBeNull(string $dataExpected = ""):void{
        throw new \App\Exceptions\BusinessException("Expected data not sent or null. ".$dataExpected, 400);
    }
    
    public static function handleExceptionUniqueKey():void{
        throw new \App\Exceptions\BusinessException("Data already exists.", 409);
    }
    
    public static function handleExceptionDenied():void{
        throw new \App\Exceptions\BusinessException("The authorize service has deneied this operation. ", 403);
    }
}
