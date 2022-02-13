<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\EntityInterfaces\ICommonUser;
use App\Domain\EntityInterfaces\IUser;

class CommonUser extends Model implements ICommonUser
{
    use HasFactory;
    protected $table = 'common_users';
    
    
    protected $fillable = [
        'cpf',
        'user_id'
    ];
    
    public function user() : IUser
    {
        return $this->belongsTo(User::class);
    }
    
    public function getCpf(): string {
        return $this->cpf??"";
    }
    
    public function cpfExists():bool{
        return self::where('cpf', $this->getCpf())->exists();
    }
    
    public static function insert(IUser $user, ICommonUser $commonUser) : ICommonUser {
        try{
            \Illuminate\Support\Facades\DB::beginTransaction();
            $user = $user->insert($user, new Wallet());
            $commonUser->user_id = $user->id;
            $commonUser->save();
            \Illuminate\Support\Facades\DB::commit();
            return $commonUser;
        }catch(\Exception $e){
            \Illuminate\Support\Facades\DB::rollBack();
            error_log($e->getTraceAsString());
            error_log($e->getMessage());
            \App\Exceptions\BusinessException::handleExceptionFieldNotBeNull();
           
        }
    }
}
