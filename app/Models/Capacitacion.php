<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Capacitacion
 *
 * @property $id
 * @property $nombre_capacitacion
 * @property $id_user
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Capacitacion extends Model
{

    protected $table = 'capacitacion';

    static $rules = [
        'nombre_capacitacion' => 'required',
        'id_user' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_capacitacion', 'id_user'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
