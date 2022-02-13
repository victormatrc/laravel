<?php
namespace App\Http\ClientServices;

/**
 * Description of AuthorizeTransfer
 *
 * @author victorcanario
 */
class AuthorizeTransfer {
    
    const uriAuthorizeTransfer = "https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6";
    //put your code here
    
    public static function isAuthorizedTransfer():void{
        $response = file_get_contents(self::uriAuthorizeTransfer);
        if(empty($response)){
            \App\Exceptions\BusinessException::handleExceptionDenied();
        }
        $objResponse = json_decode($response);
        if($objResponse->message != "Autorizado"){
            \App\Exceptions\BusinessException::handleExceptionDenied();
        }
        
        
    }
}
