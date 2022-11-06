<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Habilidad
 *
 * @property $id
 * @property $nombre_habilidad
 * @property $descripcion
 * @property $puntaje
 * @property $id_user
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Habilidad extends Model
{
    protected $table = 'habilidad';

    static $rules = [
        'nombre_habilidad' => 'required',
        'descripcion' => 'required',
        // 'puntaje' => 'required',
        // 'id_user' => 'required',
    ];

    protected $perPage = 20;

    public $timestamps = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_habilidad', 'descripcion', 'puntaje', 'id_user'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
