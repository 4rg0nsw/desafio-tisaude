<?php

namespace App\Http\Controllers;

use App\Models\PlanoSaude;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanoSaudeController extends Controller
{

    private $planosaude;

    public function __construct(PlanoSaude $planosaude)
    {
        $this->planosaude = $planosaude;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->planosaude->all();
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
            'plano_descricao' => 'required|string|max:250',
            'plano_telefone' => 'required|max:11',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $planosaude = PlanoSaude::create([
            'plano_descricao' => $request->plano_descricao,
            'plano_telefone' => $request->plano_telefone,
        ]);

        return response()->json(['message' => 'PLano de Saúde cadastrado com sucesso!', 'data' => $planosaude], 201);

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
            return $this->planosaude->find($id);
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
            'plano_descricao' => 'required|string|max:250',
            'plano_telefone' => 'required|max:11',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        if($this->planosaude->find(intval($id))){

            $planosaude = PlanoSaude::where('id_plano_saude', $id)->update([
                'plano_descricao' => $request->plano_descricao,
                'plano_telefone' => $request->plano_telefone,
            ]);
            return response()->json(['message' => 'Médico alterado com sucesso!', 'data' => $planosaude], 200);
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
        //
    }
}
