<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entity;
use App\UserCases\CreateUser;


class UserController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store() :\Illuminate\Http\JsonResponse
    {
        try{
            $attributes = (array) json_decode(request()->getContent());
            
            return response()->json(
                    CreateUser::createUser(
                            $attributes, 
                            new \App\Models\Entity\User($attributes),
                            new \App\Models\Entity\CommonUser($attributes),
                            new \App\Models\Entity\StoreUser($attributes)
                            ));
        } catch (\App\Exceptions\BusinessException $e){
            return response()->json(array("error"=>$e->getMessage()), $e->getCode());
        }
    }

    
}
