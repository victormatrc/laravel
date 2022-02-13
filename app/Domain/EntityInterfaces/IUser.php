<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Domain\EntityInterfaces;

/**
 * Description of IUserRepository
 *
 * @author victorcanario
 */
interface IUser {
    //put your code here
    
    public function emailExists(): bool;
    
    public function getEmail(): string;
    
    public function getNomeCompleto(): string;
    
    public function getSenha(): string;
    
    public static function findById(int $id);
    
    public function insert(IUser $user, IWallet $wallet): IUser;
    
//    
}
