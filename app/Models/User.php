<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    const ID_USER = 'id_user';
    const NOM_USER = 'nom_user';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';

    /**
     * Constante usada para a recuperação em outras tabelas.
     */
    const TAB_USERS = 'users';


    /**
     * @var string
     */
    protected $table = self::TAB_USERS;

    /**
     * @var string
     */
    protected $primaryKey = self::ID_USER;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::NOM_USER,
        self::EMAIL,
        self::PASSWORD,
        self::CREATED_AT,
        self::UPDATED_AT
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
    ];

     /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
