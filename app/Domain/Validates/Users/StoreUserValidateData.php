<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Domain\Validates\Users;

use App\Domain\EntityInterfaces\IStoreUser;
use App\Domain\EntityInterfaces\IUser;


/**
 * Description of StoreUserValidateData
 *
 * @author victorcanario
 */
class StoreUserValidateData {
    //put your code here
    public static function exists(IUser $user, IStoreUser $storeUser): bool {
        if(UserValidateData::exists($user)){
            return true;
        }
        return $storeUser->cnpjExists();
    }
    
}
