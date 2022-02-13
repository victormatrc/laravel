<?php

namespace Tests\Unit\Domain\Validates;

use PHPUnit\Framework\TestCase;
use App\Domain\Validates\PayTransfers\PayTransferValidateData;

class PayTransferValidateDataTest extends TestCase
{
    
    protected  $payer;
    /**
     * @before
     */
    public function setupPayer(): void
    {
        
        $this->payer = new \App\Models\Entity\User();
        $this->payer->wallet = new \App\Models\Entity\Wallet();
        $this->payer->wallet->setBalance(0.10);
//        $payer->wallet->setBalance(-0.10);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_has_money_to_pay()
    {
        $this->payer->wallet->setBalance(0.10);
        $this->assertEmpty(PayTransferValidateData::hasMoneyInWallet($this->payer));
        $this->expectException(\App\Exceptions\BusinessTransferException::class);
        $this->payer->wallet->setBalance(-0.10);
        PayTransferValidateData::hasMoneyInWallet($this->payer);
        
    }
    
    public function test_type_user_can_transfer(){
        $this->payer->commonUser = new \App\Models\Entity\CommonUser();
//        dd(PayTransferValidateData::isPayerCommonUser($this->payer));
        $this->assertEmpty(PayTransferValidateData::isPayerCommonUser($this->payer));
        
        $this->expectException(\App\Exceptions\BusinessTransferException::class);
        $this->payer->commonUser = new \App\Models\Entity\StoreUser();
        PayTransferValidateData::isPayerCommonUser($this->payer);
        
        $this->expectException(\App\Exceptions\BusinessTransferException::class);
        $this->payer->storeUser = new \App\Models\Entity\StoreUser();
        $this->payer->commonUser = null;
        PayTransferValidateData::isPayerCommonUser($this->payer);
    }
    
    public function test_payer_and_payee_exists(){
        $this->assertEmpty(PayTransferValidateData::existsPayerAndPayee(
                $this->payer, $this->payer));
        
        $this->expectException(\App\Exceptions\BusinessTransferException::class);
        PayTransferValidateData::existsPayerAndPayee($this->payer, null);
        
        $this->expectException(\App\Exceptions\BusinessTransferException::class);
        PayTransferValidateData::existsPayerAndPayee(null, $this->payer);
    }
}
