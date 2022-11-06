<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Publicacion
 *
 * @property $id
 * @property $contenido
 * @property $id_user
 * @property $id_usuario_seguido
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Publicacion extends Model
{

    protected $table = 'publicacion';

    static $rules = [
        'contenido' => 'required',
        // 'id_user' => 'required',
        // 'id_usuario_seguido' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['contenido', 'id_user', 'id_usuario_seguido'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userSeguido()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usuario_seguido');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
