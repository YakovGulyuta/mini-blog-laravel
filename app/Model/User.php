<?php

namespace App\Model;

use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserLoginRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;


/**
 * @method static create(array $request)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     *
     */
    public const ROLE_USER = 0;
    /**
     *
     */
    public const ROLE_ADMIN = 1;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return mixed
     */
    public static function register(string $name, string $email, string $password)
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'is_admin' => self::ROLE_USER,
        ]);
    }

    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public static function login(string $email, string $password)
    {
        return Auth::attempt([
            'email' => $email,
            'password' => $password
        ]);
    }
}
