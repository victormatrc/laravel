<?php

namespace Tests\Unit\Domain\Validates;

use PHPUnit\Framework\TestCase;
use App\Domain\Validates\PayTransfers\InputPayTransferValidate;

class InputPayTransferValidateTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_input_request_pay_transfer()
    {
        $attributes = array(
            "payer_id" => 1,
            "payee_id" => 2,
            "value" => 100
        );
        $inputPayTransfer = new InputPayTransferValidate();
        $inputPayTransfer->validate($attributes);
        $this->assertEmpty($inputPayTransfer->validate($attributes));
        
        
        $this->expectException(\App\Exceptions\BusinessException::class);
        $attributes = array(
            "payer_id" => 1,
            "payee_id" => 2
        );
        $inputPayTransfer->validate($attributes);
        
        $this->expectException(\App\Exceptions\BusinessException::class);
        $attributes = array(
            "payee_id" => 2,
            "value" => 100
        );
        $inputPayTransfer->validate($attributes);
        
        $this->expectException(\App\Exceptions\BusinessException::class);
        $attributes = array(
            "payer_id" => 1,
            "value" => 100
        );
        $inputPayTransfer->validate($attributes);
        
        $this->expectException(\App\Exceptions\BusinessException::class);
        $attributes = array();
        $inputPayTransfer->validate($attributes);
    }
}
