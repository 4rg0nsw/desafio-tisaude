<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsProc extends Model
{
    use HasFactory;

    const ID_CONST_PROC = 'id_const_proc';
    const ID_PROCEDIMENTO = 'id_procedimento';
    const ID_CONSULTA = 'id_consulta';
    

    /**
     * Constante usada para a recuperação em outras tabelas.
     */
    const TAB_CONST_PROC = 'const_proc';

    /**
     * @var string
     */
    protected $table = self::TAB_CONST_PROC;

    /**
     * @var string
     */
    protected $primaryKey = self::ID_CONST_PROC;

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
        self::ID_PROCEDIMENTO,
        self::ID_CONSULTA 
    ];
}
