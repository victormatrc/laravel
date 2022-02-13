<?php

namespace App\Domain\Validates\Users;

use App\Domain\Validates\AbstractInputValidate;
/**
 * Description of InputCommonUserValidate
 *
 * @author victorcanario
 */
class InputCommonUserValidate extends AbstractInputValidate {
   
    public  $requiredFields = ["nome_completo", "email", "senha", "cpf"]; 
    

    public function setCommonUser(){
        
    }

    
}
