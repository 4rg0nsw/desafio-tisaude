<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoSaude extends Model
{
    use HasFactory;

    const ID_PLANO_SAUDE = 'id_plano_saude';
    const PLANO_DESCRICAO = 'plano_descricao';
    const PLANO_COD = 'plano_cod';
    const PLANO_TELEFONE = 'plano_telefone';

    /**
     * Constante usada para a recuperação em outras tabelas.
     */
    const TAB_PLANO_SAUDE = 'plano_saude';

    /**
     * @var string
     */
    protected $table = self::TAB_PLANO_SAUDE;

    /**
     * @var string
     */
    protected $primaryKey = self::ID_PLANO_SAUDE;

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
        self::ID_PLANO_SAUDE,
        self::PLANO_DESCRICAO ,
        self::PLANO_COD,
        self::PLANO_TELEFONE,
    ];
}
