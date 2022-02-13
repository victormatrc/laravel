<?php

namespace App\UserCases;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Domain\EntityInterfaces\IUser;
use App\Domain\EntityInterfaces\ICommonUser;
use App\Domain\EntityInterfaces\IStoreUser;

use App\Domain\Validates\Users\CommonUserValidateData;
use App\Domain\Validates\Users\StoreUserValidateData;
use App\Domain\Validates\Users\InputCommonUserValidate;
use App\Domain\Validates\Users\InputStoreUserValidate;
/**
 * Description of CreateCommonUser
 *
 * @author victorcanario
 */
class CreateUser {
    //put your code here
    
    public static function createCommonUser(IUser $user, ICommonUser $commonUser){
        if(CommonUserValidateData::exists($user, $commonUser)){
            \App\Exceptions\BusinessException::handleExceptionUniqueKey();
        }
        return $commonUser::insert($user, $commonUser);
    }
    
    public static function createStoreUser(IUser $user, IStoreUser $storeUser){
        if(StoreUserValidateData::exists($user, $storeUser)){
            \App\Exceptions\BusinessException::handleExceptionUniqueKey();
        }
        return $storeUser::insert($user, $storeUser);
    }
    
    public static function createUser(array $attributes, IUser $user, 
            ICommonUser $commonUser, IStoreUser $storeUser){
        
        if(isset($attributes['cpf']) && !empty($attributes['cpf'])){
            (new InputCommonUserValidate())->validate($attributes);
            return self::createCommonUser($user, $commonUser);
        }
        (new InputStoreUserValidate())->validate($attributes);
        return self::createStoreUser($user, $storeUser);
    }
}
