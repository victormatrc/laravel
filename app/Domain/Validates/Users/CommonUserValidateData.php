<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Domain\Validates\Users;

use App\Domain\EntityInterfaces\IUser;
use App\Domain\EntityInterfaces\ICommonUser;
/**
 * Description of CommonUserValidate
 *
 * @author victorcanario
 */
class CommonUserValidateData  {
    
    //put your code here
    

    public static function exists(IUser $user, ICommonUser $commonUser): bool {
        if(UserValidateData::exists($user)){
            return true;
        }
        return $commonUser->cpfExists();
    }
    
    
}
