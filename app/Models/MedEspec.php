<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedEspec extends Model
{
    use HasFactory;

    const ID_MED_ESPEC = 'id_med_espec';
    const ID_MEDICO = 'id_medico';
    const ID_ESPECIALIDADE = 'id_especialidade';
    
    /**
     * Constante usada para a recuperação em outras tabelas.
     */
    const TAB_MED_ESPEC= 'med_espec';

    /**
     * @var string
     */
    protected $table = self::TAB_MED_ESPEC;

    /**
     * @var string
     */
    protected $primaryKey = self::ID_MED_ESPEC;

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
        self::ID_MEDICO,
        self::ID_ESPECIALIDADE,
    ];

    public function medico(){
        return $this->hasMany(Medico::class);
    }
}
