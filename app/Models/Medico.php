<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    const ID_MEDICO = 'id_medico';
    const MED_NOME = 'med_nome';
    const MED_CRM = 'med_crm';
    

    /**
     * Constante usada para a recuperação em outras tabelas.
     */
    const TAB_MEDICO= 'medico';

    /**
     * @var string
     */
    protected $table = self::TAB_MEDICO;

    /**
     * @var string
     */
    protected $primaryKey = self::ID_MEDICO;

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
        self::MED_NOME,
        self::MED_CRM 
        
    ];

    public function especialidade(){
        return $this->hasMany(MedEspec::class, self::ID_MEDICO, self::ID_MEDICO);
    }

    public function medEspec() {
        return $this->belongsTo(MedEspec::class);
    }
}
