<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $dui
 * @property $nit
 * @property $genero
 * @property $pais
 * @property $direccion
 * @property $telefono
 * @property $email
 * @property $tipo_usuario
 * @property $email_verified_at
 * @property $password
 * @property $id_categoria
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Capacitacion[] $capacitacion
 * @property Categoria $Categoria
 * @property Habilidad[] $habilidads
 * @property Idioma[] $idiomas
 * @property Ofertum[] $ofertas
 * @property Publicacion[] $publicacion
 * @property Publicacion[] $publicacion
 * @property Seguido[] $seguidos
 * @property Seguido[] $seguidos
 * @property Trabajo[] $trabajos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    static $rules = [
        'name' => 'required',
        'password' => 'required',
        'documento_unico' => 'required',
        'direccion' => 'required',
        'telefono' => 'required',
        'email' => 'required',
        'genero' => 'required',
        'foto' => 'required',
        'tipo_usuario' => 'required',
        'id_categoria' => 'required',
    ];

    protected $perPage = 20;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'documento_unico', 'genero', 'direccion', 'password', 'telefono', 'email', 'tipo_usuario', 'id_categoria', 'foto'];


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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function capacitacion()
    {
        return $this->hasMany('App\Models\Capacitacion', 'id_user', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'id_categoria');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function habilidads()
    {
        return $this->hasMany('App\Models\Habilidad', 'id_user', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function idiomas()
    {
        return $this->hasMany('App\Models\Idioma', 'id_user', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ofertas()
    {
        return $this->hasMany('App\Models\Ofertum', 'id_empresa', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function publicacion()
    {
        return $this->hasMany('App\Models\Publicacion', 'id_user', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seguidos()
    {
        return $this->hasMany('App\Models\Seguido', 'id_user', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trabajos()
    {
        return $this->hasMany('App\Models\Trabajo', 'id_user', 'id');
    }
}
