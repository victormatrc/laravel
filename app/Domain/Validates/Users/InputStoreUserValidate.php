<?php

namespace App\Domain\Validates\Users;

use App\Domain\Validates\AbstractInputValidate;
/**
 * Description of InputStoreUserValidate
 *
 * @author victorcanario
 */
class InputStoreUserValidate  extends AbstractInputValidate {
    //put your code here
    
    public  $requiredFields = ["nome_completo", "email", "senha", "cnpj"];
    
}
