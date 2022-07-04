<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    const ID_PACIENTE = 'id_paciente';
    const PAC_NOME = 'pac_nome';
    const PAC_TELEFONE = 'pac_telefone';
    const PAC_DATA_NASCIMENTO = 'pac_data_nascimento';
    

    /**
     * Constante usada para a recuperação em outras tabelas.
     */
    const TAB_PACIENTE = 'paciente';

    /**
     * @var string
     */
    protected $table = self::TAB_PACIENTE;

    /**
     * @var string
     */
    protected $primaryKey = self::ID_PACIENTE;

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
        self::PAC_NOME ,
        self::PAC_TELEFONE,
        self::PAC_DATA_NASCIMENTO,
    ];
}
