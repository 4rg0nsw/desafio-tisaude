<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsPac extends Model
{
    use HasFactory;

    const ID_CONST_PAC = 'id_const_pac';
    const ID_PACIENTE = 'id_paciente';
    const ID_CONSULTA = 'id_consulta';
    

    /**
     * Constante usada para a recuperação em outras tabelas.
     */
    const TAB_CONST_PAC = 'const_pac';

    /**
     * @var string
     */
    protected $table = self::TAB_CONST_PAC;

    /**
     * @var string
     */
    protected $primaryKey = self::ID_CONST_PAC;

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
        self::ID_PACIENTE,
        self::ID_CONSULTA 
    ];
}
