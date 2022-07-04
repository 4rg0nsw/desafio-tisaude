<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;

    const ID_ESPECIALIDADE = 'id_especialidade';
    const ESPEC_NOME = 'espec_nome';
    

    /**
     * Constante usada para a recuperação em outras tabelas.
     */
    const TAB_MEDICO= 'especialidade';

    /**
     * @var string
     */
    protected $table = self::TAB_MEDICO;

    /**
     * @var string
     */
    protected $primaryKey = self::ID_ESPECIALIDADE;

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
        self::ID_ESPECIALIDADE,
        self::ESPEC_NOME   
    ];
}
