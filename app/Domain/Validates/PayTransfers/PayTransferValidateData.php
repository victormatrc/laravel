<?php
namespace App\Domain\Validates\PayTransfers;

use App\Domain\EntityInterfaces\IPayTransfer;
use App\Domain\EntityInterfaces\IUser;
use App\Domain\EntityInterfaces\ICommonUser;
/**
 * Description of PayTransferValidateData
 *
 * @author victorcanario
 */
class PayTransferValidateData {
    //put your code here
    
    public static function hasMoneyInWallet(IUser $payer) :void{
        if($payer->wallet->balance < 0.00){
            \App\Exceptions\BusinessTransferException::handleExcptionNotHaveMoney();
        }
    }
    
    public static function isPayerCommonUser(IUser $payer){
        if(!($payer->commonUser instanceof ICommonUser)){
            \App\Exceptions\BusinessTransferException::handleExcptionPayerNotAllowed();
        }
    }
    
    public static function existsPayerAndPayee(IUser $payer = null,IUser $payee = null){
        if(empty($payer) || empty($payee)){
            \App\Exceptions\BusinessTransferException::handleExcptionPayerNotFound();
        }
    }
    
    public static function isAllowedPayerTransfer(IPayTransfer $payTransfer,
            IUser $payer, IUser $payee){
        self::existsPayerAndPayee($payer, $payee);
        self::isPayerCommonUser($payer);
        self::hasMoneyInWallet($payer);
    }
}
