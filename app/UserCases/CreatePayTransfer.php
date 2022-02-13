<?php

namespace App\UserCases;

use App\Domain\EntityInterfaces\IPayTransfer;
use App\Domain\EntityInterfaces\IUser;
use App\Domain\Validates\PayTransfers\PayTransferValidateData;
use App\Domain\Validates\PayTransfers\InputPayTransferValidate;
/**
 * Description of CreatePayTransfer
 *
 * @author victorcanario
 */
class CreatePayTransfer {
    //put your code here
    public static function createPayTransfer(array $attributes, IPayTransfer $payTransfer,IUser $user){
        (new InputPayTransferValidate())->validate($attributes);
        $payer = $user::findById($payTransfer->getPayerId());
        $payee = $user::findById($payTransfer->getPayeeId());
        $payer->wallet->setBalance(
                $payer->wallet->getBalance() - $payTransfer->getValue());
        $payer->wallet->update();
            
        PayTransferValidateData::isAllowedPayerTransfer($payTransfer, $payer, $payee);
        \App\Http\ClientServices\AuthorizeTransfer::isAuthorizedTransfer();
        $newPayTransfer = $payTransfer->insert($payTransfer);
        $payee->wallet->setBalance(
                $payee->wallet->getBalance() + $payTransfer->getValue());
        $payee->wallet->update();
        \App\Http\ClientServices\NotifyTransfer::notifyTransferReceived($payee->getEmail());
        return $newPayTransfer;
    }
}
