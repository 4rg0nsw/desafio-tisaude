<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsMed extends Model
{
    use HasFactory;

    const ID_CONS_MED = 'id_cons_med';
    const ID_MEDICO = 'id_medico';
    const ID_CONSULTA = 'id_consulta';
    

    /**
     * Constante usada para a recuperação em outras tabelas.
     */
    const TAB_CONS_MED = 'cons_med';

    /**
     * @var string
     */
    protected $table = self::TAB_CONS_MED;

    /**
     * @var string
     */
    protected $primaryKey = self::ID_CONS_MED;

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
        self::ID_CONSULTA 
    ];
}
