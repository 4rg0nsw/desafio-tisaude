<?php

namespace App\Http\Controllers;

use App\Models\Procedimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProcedimentoController extends Controller
{

    private $procedimento;

    public function __construct(Procedimento $procedimento)
    {
        $this->procedimento = $procedimento;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->procedimento->all();
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
            'proc_nome' => 'required|string|max:250',
            'proc_valor' => 'required|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $procedimento = Procedimento::create([
            'proc_nome' => $request->proc_nome,
            'proc_valor' => $request->proc_valor,
        ]);

        return response()->json(['message' => 'Procedimento cadastrado com sucesso!', 'data' => $procedimento], 201);
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
            return $this->procedimento->find($id);
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
            'proc_nome' => 'required|string|max:250',
            'proc_valor' => 'required|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        
        if($this->procedimento->find(intval($id))){

            $procedimento = Procedimento::where('id_procedimento', $id)->update([
                'proc_nome' => $request->proc_nome,
                'proc_valor' => $request->proc_valor,
            ]);
            
            return response()->json(['message' => 'procedimento alterado com sucesso!', 'data' => $procedimento], 200);
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
        if($this->procedimento->find(intval($id))){

            $procedimento = Procedimento::where('id_procedimento', $id)->delete();

            return response()->json(['message' => 'Médico deletado com sucesso!', 'data' => $procedimento], 200);

        };

        return response()->json(['error' => 'Procedimento não encontrado!', 'data' => $id], 400);

    }
}
