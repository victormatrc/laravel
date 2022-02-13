<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Exceptions;

/**
 * Description of BusinessTransferException
 *
 * @author victorcanario
 */
class BusinessTransferException extends \Exception {
    public function __construct(string $message, int $httpStatus)
    {
        parent::__construct($message, $httpStatus, null);
    }
    
    public static function handleExcptionPayerNotAllowed(): void{
        throw new \App\Exceptions\BusinessTransferException("Payer not allowed.", 403);
    }
    
    public static function handleExcptionPayerNotFound(): void{
        throw new \App\Exceptions\BusinessTransferException("Payer not found.", 404);
    }
    
    public static function handleExcptionNotHaveMoney(): void{
        throw new \App\Exceptions\BusinessTransferException("Payer don't have enough money.", 400);
    }
    
}
