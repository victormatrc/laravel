<?php

namespace App\Domain\Validates\Users;

use App\Domain\EntityInterfaces\IUser;
/**
 * Description of UserValidateData
 * Class responsável por validar dados do usuário
 * @author victorcanario
 */
class UserValidateData {
    //put your code here
    public static function exists(IUser $user) :bool {
        return $user->emailExists();
    }
    
    public static function hasFieldNull(IUser $user): bool {
        if(empty(trim($user->getEmail()))){
           return true; 
        }else if(empty(trim($user->getSenha()))){
            return true;
        }else if(empty(trim($user->getNomeCompleto()))){
            return true;
        }
        return false;
    }
    
}
