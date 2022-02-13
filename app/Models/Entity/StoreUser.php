<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\EntityInterfaces\IStoreUser;
use App\Domain\EntityInterfaces\IUser;

class StoreUser extends Model implements IStoreUser
{
    use HasFactory;
    protected $table = 'store_users';
    
    protected $fillable = [
        'cnpj'
    ];
    
    public function cnpjExists(): bool {
        return self::where('cnpj', $this->getCnpj())->exists();
    }

    public function getCnpj(): string {
        return isset($this->cnpj)?$this->cnpj:"";
    }

    public static function insert(IUser $user, IStoreUser $storeUser): IStoreUser {
        try{
            \Illuminate\Support\Facades\DB::beginTransaction();
            $user = $user->insert($user, new Wallet());
            $storeUser->user_id = $user->id;
            $storeUser->save(); 
            \Illuminate\Support\Facades\DB::commit();
            return $storeUser;
        }catch(\Exception $e){
            \Illuminate\Support\Facades\DB::rollBack();
            error_log($e->getTraceAsString());
            error_log($e->getMessage());
            \App\Exceptions\BusinessException::handleExceptionFieldNotBeNull();
           
        }
    }

    
//    public function exists
}
