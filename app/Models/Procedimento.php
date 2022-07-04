<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    use HasFactory;

    const ID_PROCEDIMENTO = 'id_procedimento';
    const PROC_NOME = 'proc_nome';
    const PROC_VALOR = 'proc_valor';
    

    /**
     * Constante usada para a recuperação em outras tabelas.
     */
    const TAB_PROCEDIMENTO = 'procedimento';

    /**
     * @var string
     */
    protected $table = self::TAB_PROCEDIMENTO;

    /**
     * @var string
     */
    protected $primaryKey = self::ID_PROCEDIMENTO;

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
        self::PROC_NOME,
        self::PROC_VALOR 
    ];
}
