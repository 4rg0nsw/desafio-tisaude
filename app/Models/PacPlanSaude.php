<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacPlanSaude extends Model
{
    use HasFactory;

    const ID_PAC_PLANO = 'id_pac_plano';
    const NR_CONTRATO = 'nr_contrato';
    const ID_PLANO_SAUDE = 'id_plano_saude';
    const ID_PACIENTE = 'id_paciente';
    

    /**
     * Constante usada para a recuperação em outras tabelas.
     */
    const TAB_PAC_PLAN_CONS = 'pac_plan_cons';

    /**
     * @var string
     */
    protected $table = self::TAB_PAC_PLAN_CONS;

    /**
     * @var string
     */
    protected $primaryKey = self::ID_PAC_PLANO;

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
        self::ID_PAC_PLANO,
        self::NR_CONTRATO,
        self::ID_PLANO_SAUDE, 
        self::ID_PACIENTE,         
    ];
}
