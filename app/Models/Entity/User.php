<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Domain\EntityInterfaces\IUser;
use App\Domain\EntityInterfaces\IWallet;

class User  extends Authenticatable implements IUser
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome_completo',
        'email',
        'senha'
    ];

   
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function commonUser(){
        return $this->hasOne(CommonUser::class);
    }
    
    public function storeUser(){
        return $this->hasOne(StoreUser::class);
    }
    
    public function wallet(){
        return $this->hasOne(Wallet::class);
    }
    
    public function emailExists(): bool {
        return User::where('email', $this->getEmail())->exists();
    }
    public static function findById(int $id) {
        return User::find($id);
    }

    public function getEmail(): string {
        return isset($this->email)?$this->email:"";
    }

    public function getNomeCompleto(): string {
        return isset($this->nome_completo)?$this->nome_completo:"";
    }

    public function getSenha(): string {
            return isset($this->senha)?$this->senha:"";
    }
    
    public function insert(IUser $user, IWallet $wallet): IUser {
        $user->save();
        $wallet->user_id = $user->id;
        $wallet->balance = 0;
        $wallet->save();
        return $user;
    }

}
