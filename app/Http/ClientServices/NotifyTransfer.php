<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\ClientServices;

/**
 * Description of NotifyTransfer
 *
 * @author victorcanario
 */
class NotifyTransfer {
    //put your code here
    const uriNotifyTransfer = "http://o4d9z.mocklab.io/notify";
    
    public static function notifyTransferReceived(string $email):bool{
        $response = file_get_contents(self::uriNotifyTransfer);
        if(empty($response)){
            return false;
        }
        $objResponse = json_decode($response);
        if($objResponse->message != "Success"){
            return false;
        }
        return true;
    } 
}
