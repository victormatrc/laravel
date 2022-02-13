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
interface IStoreUser {
    //put your code here
    
    
    public function getCnpj(): string;
    
    public function cnpjExists(): bool;
    
    public static function insert(IUser $user, IStoreUser $storeUser ) : IStoreUser; 
}
