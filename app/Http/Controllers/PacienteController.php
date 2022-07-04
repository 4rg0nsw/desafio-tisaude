<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class PacienteController extends Controller
{
    private $paciente;

    public function __construct(Paciente $paciente)
    {
        $this->paciente = $paciente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->paciente->all();
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
            'pac_nome' => 'required|string|max:250',
            'pac_telefone' => 'required|max:15',
            'pac_data_nascimento' => 'required|string|max:10',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        
        $paciente = Paciente::create([
            'pac_nome' => $request->pac_nome,
            'pac_telefone' => $request->pac_telefone,
            'pac_data_nascimento' => Carbon::parse($request->pac_data_nascimento)->format('Y-m-d'),
        ]);

        return response()->json(['message' => 'Médico cadastrado com sucesso!', 'data' => $paciente], 201);
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
            return $this->paciente->find($id);
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
            'pac_nome' => 'required|string|max:250',
            'pac_telefone' => 'required|max:15',
            'pac_data_nascimento' => 'required|string|max:10',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        if($this->paciente->find(intval($id))){
            //dd('asdfasdfasdf', Carbon::parse($request->pac_data_nascimento)->format('Y-m-d'));
            $paciente = Paciente::where('id_paciente', $id)->update([
                'pac_nome' => $request->pac_nome,
                'pac_telefone' => $request->pac_telefone,
                'pac_data_nascimento' => Carbon::parse($request->pac_data_nascimento)->format('Y-m-d'),
            ]);
            return response()->json(['message' => 'Médico alterado com sucesso!', 'data' => $paciente], 200);
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
        if($this->paciente->find(intval($id))){

            $paciente = Paciente::where('id_paciente', $id)->delete();

            return response()->json(['message' => 'Paciente deletado com sucesso!', 'data' => $paciente], 200);
        };
    }
}
