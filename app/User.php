<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','type', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param string $token
     * @return array
     */
    public function sendPasswordResetNotification($token)
    {
        $reset = $this->notify(new ResetPasswordNotification($token));
        DB::table('password_resets')->where('email', $this->email)->update(['token' => $token]);
        if ($reset) {
            return ['erro' => false, 'message' => 'Email enviado!'];
        }
        return [
            'erro' => true,
            'message' => 'Usuário bloqueado!'
        ];
    }
}
