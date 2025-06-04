<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Notifications\ResetPasswordNotification;


class User extends Authenticatable implements CanResetPasswordContract
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
//     public function sendPasswordResetNotification($token): void
// {
//     $url = 'http://localhost:8000/reset-password?token=' . $token . '&email=' . urlencode($this->email);

//     $this->notify(new ResetPasswordNotification($url));
// }
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function umkm()
    {
        return $this->hasOne(Umkm::class, 'users_id');
    }
        public function pesanan()
    {
        return $this->hasmany(Pesanan::class, 'users_id');
    }
    public function aduan()
    {
        return $this->hasMany(Aduan::class, 'users_id');
    }
//     public function sendPasswordResetNotification($token): void
// {
//     $url = url("/reset-password?token={$token}&email=" . urlencode($this->email));
//     $this->notify(new ResetPasswordNotification($url));
// }

}
