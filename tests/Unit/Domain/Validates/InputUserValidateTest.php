<?php

namespace Tests\Unit\Domain\Validates;

use PHPUnit\Framework\TestCase;

use App\Domain\Validates\Users\InputCommonUserValidate;
use App\Domain\Validates\Users\InputStoreUserValidate;

class InputUserValidateTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_input_request_common_user()
    {
        $attributes = array(
            "nome_completo" => "Victor", "email" => "victorNaoExiste@gmail.com",
            "senha" => "12345", "cpf" => "011-101-023-01"
        );
        $inputCommonUser =new InputCommonUserValidate();
        $this->assertEmpty($inputCommonUser->validate($attributes));
        
        $this->expectException(\App\Exceptions\BusinessException::class);
        $attributes = array(
             "email" => "victorNaoExiste@gmail.com",
            "senha" => "12345", "cpf" => "011-101-023-01"
        );
        $inputCommonUser->validate($attributes);
        $this->expectException(\App\Exceptions\BusinessException::class);
        $attributes = array(
            "nome_completo" => "Victor", 
            "senha" => "12345", "cpf" => "011-101-023-01"
        );
        $inputCommonUser->validate($attributes);
        $this->expectException(\App\Exceptions\BusinessException::class);
        $attributes = array(
            "nome_completo" => "Victor", "email" => "victorNaoExiste@gmail.com",
            "cpf" => "011-101-023-01"
        );
        $inputCommonUser->validate($attributes);
        $this->expectException(\App\Exceptions\BusinessException::class);
        $attributes = array(
            "nome_completo" => "Victor", "email" => "victorNaoExiste@gmail.com",
            "senha" => "12345", 
        );
        $inputCommonUser->validate($attributes);
        
        
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_input_request_store_user()
    {
        $attributes = array(
            "nome_completo" => "Victor", "email" => "victorNaoExiste@gmail.com",
            "senha" => "12345", "cnpj" => "011-101-023-01"
        );
        $inputStoreUser =new InputStoreUserValidate();
        $this->assertEmpty($inputStoreUser->validate($attributes));
        
        $this->expectException(\App\Exceptions\BusinessException::class);
        $attributes = array(
             "email" => "victorNaoExiste@gmail.com",
            "senha" => "12345", "cnpj" => "011-101-023-01"
        );
        $inputStoreUser->validate($attributes);
        $this->expectException(\App\Exceptions\BusinessException::class);
        $attributes = array(
            "nome_completo" => "Victor", 
            "senha" => "12345", "cnpj" => "011-101-023-01"
        );
        $inputStoreUser->validate($attributes);
        $this->expectException(\App\Exceptions\BusinessException::class);
        $attributes = array(
            "nome_completo" => "Victor", "email" => "victorNaoExiste@gmail.com",
            "cnpj" => "011-101-023-01"
        );
        $inputStoreUser->validate($attributes);
        $this->expectException(\App\Exceptions\BusinessException::class);
        $attributes = array(
            "nome_completo" => "Victor", "email" => "victorNaoExiste@gmail.com",
            "senha" => "12345", 
        );
        $inputStoreUser->validate($attributes);
        
    }
}
