<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Domain\Validates;

/**
 * Description of AbstractInputValidate
 *
 * @author victorcanario
 */
abstract class AbstractInputValidate {
    
    
    /**
     * Verify data send is correctly.
     * @param array $attributes
     */
    public function validate(array $attributes) :void{
        
        foreach($this->requiredFields as $field){
            if(!in_array($field, array_keys($attributes))){
                \App\Exceptions\BusinessException::handleExceptionFieldNotBeNull(
                            "Expected fields: " . 
                            implode(", ", $this->requiredFields ). "."
                        );
            }
            
            if(empty(trim($attributes[$field]))){
                \App\Exceptions\BusinessException::handleExceptionFieldNotBeNull(
                            "Expected fields: " . 
                            implode(", ", $this->requiredFields). "."
                        );
            }
        }
    }
    
    
}
