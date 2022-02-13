<?php

namespace App\Domain\Validates\PayTransfers;

use App\Domain\Validates\AbstractInputValidate;
/**
 * Description of InputStoreUserValidate
 *
 * @author victorcanario
 */
class InputPayTransferValidate  extends AbstractInputValidate {
    //put your code here
    
    public  $requiredFields = ["value", "payer_id", "payee_id"];
    
}
