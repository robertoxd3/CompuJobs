<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Oferta
 *
 * @property $id
 * @property $titulo
 * @property $cargo
 * @property $anios_experiencia
 * @property $rango salarial
 * @property $id_empresa
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Oferta extends Model
{
    protected $table = 'oferta';

    static $rules = [
        'titulo' => 'required',
        'cargo' => 'required',
        'anios_experiencia' => 'required',
        'rango_salarial' => 'required',
        // 'id_empresa' => 'required',
    ];

    protected $perPage = 20;

    public $timestamps = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo', 'cargo', 'anios_experiencia', 'rango salarial', 'id_empresa', 'rango_salarial'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_empresa');
    }
}
