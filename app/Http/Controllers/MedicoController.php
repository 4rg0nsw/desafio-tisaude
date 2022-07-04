<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use App\Models\MedEspec;
use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MedicoController extends Controller
{

    private $medico;
    private $especialidade;
    private $medEspec;


    public function __construct(Medico $medico, Especialidade $especialidade, MedEspec $medEspec)
    {
        $this->medico = $medico;
        $this->especialidade = $especialidade;
        $this->medEspec = $medEspec;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->medico->all();
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
            'med_nome' => 'required|string|max:50',
            'med_crm' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $especialidade = $this->especialidade->find($request->id_especialidade)->first();

        $medico = Medico::create([
            'med_nome' => $request->med_nome,
            'med_crm' => $request->med_crm,
        ]);

        $med_esp = $this->medEspec::create([
            'id_especialidade' => $especialidade->id_especialidade,
            'id_medico' => $medico->id_medico,
        ]);

        return response()->json(['message' => 'Médico cadastrado com sucesso!', 'data' => $med_esp], 201);

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
            return $this->medico->find($id);
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
            'med_nome' => 'required|string|max:50',
            'med_crm' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        if($this->medico->find(intval($id))){

            Medico::where('id_medico', $id)->update([
                'med_nome' => $request->med_nome,
                'med_crm' => $request->med_crm,
            ]);

            $med_esp = $this->medEspec::where('id_medico', $id)->update([
                'id_especialidade' => $request->id_especialidade,
                'id_medico' => $id,
            ]);

            return response()->json(['message' => 'Médico alterado com sucesso!', 'data' => $med_esp], 200);
        };

        return response()->json(['error' => 'Os dados não puderam ser alterados!', 'data' => $request->all()], 500);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->medico->find(intval($id))){

            $medico = Medico::where('id_medico', $id)->delete();

            return response()->json(['message' => 'Médico deletado com sucesso!', 'data' => $medico], 200);
        };
    }
}
