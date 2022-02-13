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
interface IWallet {
    //put your code here
   
    public function getBalance(): float;
    public function setBalance(float $value): void;
    
    public function update();
    
}
