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
interface ICommonUser {
    //put your code here
    
    public function getCpf(): string;
    
    public function cpfExists(): bool;
    
    public static function insert(IUser $user, ICommonUser $commonUser ) : ICommonUser; 
    
}
