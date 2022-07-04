<?php

namespace App\Http\Controllers;

use App\Models\{
    ConsMed,
    ConsPac,
    ConsProc,
    Consulta,
    Medico,
    PacPlanSaude,
    PlanoSaude,


};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsultaController extends Controller
{
    private $consulta;
    private $medico;
    private $consMed;
    private $consProc;
    private $consPac;
    private $planoSaude;
    private $pacPlanSaude;


    public function __construct(Consulta $consulta, 
        Medico $medico,
        ConsMed $consMed, 
        ConsProc $consProc, 
        ConsPac $consPac, 
        PlanoSaude $planoSaude,
        PacPlanSaude $pacPlanSaude)
    {
        $this->consulta = $consulta;
        $this->medico = $medico;
        $this->consMed = $consMed;
        $this->consProc = $consProc;
        $this->consPac = $consPac;
        $this->planoSaude = $planoSaude;
        $this->pacPlanSaude = $pacPlanSaude;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->consulta->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'data' => 'required|string|max:20',
            'hora' => 'required|string|max:5',
            'particular' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $medico = $this->medico->find($request->id_medico)->first();

        $consulta = Consulta::create([
            'data' => Carbon::parse($request->data)->format('Y-m-d'),
            'hora' => $request->hora,
            'particular' => $request->particular,
        ]);

        $this->consMed::create([
            'id_medico' => $medico->id_medico,
            'id_consulta' => $consulta->id_consulta,
        ]);

        $this->consProc::create([
            'id_procedimento' => $request->id_procedimento,
            'id_consulta' => $consulta->id_consulta,
        ]);

        $this->consPac::create([
            'id_paciente' => $request->id_paciente,
            'id_consulta' => $consulta->id_consulta,
        ]);

        $planoSaude = $request->id_plano_saude != "" ? $this->planoSaude->find(intval($request->id_plano_saude)): 0;

        $this->pacPlanSaude::create([
            'nr_contrato' => rand(),
            'id_plano_saude' => $request->particular == 0 ? $planoSaude->id_plano_saude : null,
            'id_consulta' => $consulta->id_consulta,
        ]);
        
        return response()->json(['message' => 'Consulta cadastrada com sucesso!', 'data' => $consulta], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            return $this->consulta->find($id);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'data' => 'required|string|max:20',
            'hora' => 'required|string|max:5',
            'particular' => 'required|max:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        if($this->consulta->find(intval($id))){

            $consulta = Consulta::where('id_consulta', intval($id))->update([
                'data' => Carbon::parse($request->data)->format('Y-m-d'),
                'hora' => $request->hora,
                'particular' => $request->particular,
            ]);

            $this->consMed::where('id_consulta', intval($id))->update([
                'id_medico' => $request->id_medico,
                'id_consulta' => $id,
            ]);

            $this->consProc::where('id_consulta', intval($id))->update([
                'id_procedimento' => $request->id_procedimento,
                'id_consulta' => $id,
            ]);

            $this->consPac::where('id_consulta', intval($id))->update([
                'id_paciente' => $request->id_paciente,
                'id_consulta' => intval($id),
            ]);

            if(isset($request->id_plano_saude) && strlen($request->id_plano_saude) > 0){
                $planoSaude = $this->planoSaude->find(intval($request->id_plano_saude));
                dd($planoSaude);

                $this->planoSuade::where('id_consulta', intval($id))->update([
                    'id_paciente' => $request->id_paciente,
                    'id_consulta' => intval($id),
                ]);
            }


            return response()->json(['message' => 'Consulta alterada com sucesso!', 'data' => $consulta], 200);

        };


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->consulta->find(intval($id))){

            $consulta = Consulta::where('id_consulta', $id)->delete();

            return response()->json(['message' => 'Médico deletado com sucesso!', 'data' => $consulta], 200);
        };
    }
}
