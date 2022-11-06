<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Trabajo
 *
 * @property $id
 * @property $nombre_trabajo
 * @property $id_user
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Seguido extends Model
{

    protected $table = 'seguido';

    static $rules = [
        'id_user' => 'required',
        'id_usuario_seguido' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_usuario_seguido', 'id_user'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }

    public function userSeguido()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usuario_seguido');
    }
}
