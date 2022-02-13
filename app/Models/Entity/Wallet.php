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
use App\Domain\EntityInterfaces\IWallet;
/**
 * Description of Wallet
 *
 * @author victorcanario
 */
class Wallet extends Model implements IWallet{
    use HasFactory;
    protected $table = 'wallets';
    protected $fillable = [
        'banlace',
        'user_id',
    ];
    public function getBalance(): float {
        return $this->balance??0;
    }

    public function setBalance(float $value): void {
        $this->balance = $value;
    }


    
}
