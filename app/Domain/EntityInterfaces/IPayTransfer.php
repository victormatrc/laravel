<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Domain\EntityInterfaces;

/**
 *
 * @author victorcanario
 */
interface IPayTransfer {
    //put your code here
    
    public function getPayerId() ;
    public function getPayeeId() ;
    
    public function getValue(): float;
    
    public function insert(IPayTransfer $payTransfer): IPayTransfer;
}
