<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    const ID_CONSULTA = 'id_consulta';
    const DATA = 'data';
    const HORA = 'hora';
    const PARTICULAR = 'particular';

    /**
     * Constante usada para a recuperação em outras tabelas.
     */
    const TAB_CONSULTA = 'consulta';

    /**
     * @var string
     */
    protected $table = self::TAB_CONSULTA;

    /**
     * @var string
     */
    protected $primaryKey = self::ID_CONSULTA;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::ID_CONSULTA,
        self::DATA ,
        self::HORA ,
        self::PARTICULAR
    ];
}
