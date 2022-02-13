<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Entity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Domain\EntityInterfaces\IPayTransfer;
/**
 * Description of PayTransfer
 *
 * @author victorcanario
 */
class PayTransfer extends Model implements IPayTransfer{
    use HasFactory;
    protected $table = 'pay_transfers';
    protected $fillable = [
        'value',
        'payer_id',
        'payee_id'
    ];
    
    public function payer() 
    {
        return $this->belongsTo(User::class);
    }
    
    public function payee() 
    {
        return $this->belongsTo(User::class);
    }
    
    public function getPayerId() {
        return $this->payer_id??null;
    }
    public function getPayeeId() {
        return $this->payee_id??null;
    }
    
    protected function getTotalMoneyPayed() :float{
        return DB::table('pay_transfers')->where('payer_id', '=', $this->getPayerId())
                ->sum('value');
    }
    
    protected function getTotalMoneyReceived() :float{
        return DB::table('pay_transfers')->where('payee_id', '=', $this->getPayerId())
                ->sum('value');
    }
    
    public function getMoneyInPayerWallet(): float{
        return $this->getTotalMoneyReceived() - $this->getTotalMoneyPayed();
    }
    
    public function getValue() :float {
        return $this->value??0;
    }
    
    
    public function insert(IPayTransfer $payTransfer): IPayTransfer{
        $payTransfer->save();
        return $payTransfer;
    }
    
}
