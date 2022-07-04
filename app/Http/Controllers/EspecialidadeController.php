<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EspecialidadeController extends Controller
{

    private $especialidade;

    public function __construct(Especialidade $especialidade)
    {
        $this->especialidade = $especialidade;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->especialidade->all();
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
            'espec_nome' => 'required|string|max:150',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $especialidade = Especialidade::create([
            'espec_nome' => $request->espec_nome,
        ]);

        return response()->json(['message' => 'Especialidade cadastrada com sucesso!', 'data' => $especialidade], 201);

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
            return $this->especialidade->find($id);
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
            'espec_nome' => 'required|string|max:150',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        if($this->especialidade->find(intval($id))){

            $especialidade = Especialidade::where('id_especialidade', $id)->update([
                'espec_nome' => $request->espec_nome,
            ]);
        };

        return response()->json(['message' => 'Especialidade alterado com sucesso!', 'data' => $especialidade], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->especialidade->find(intval($id))){

            $especialidade = Especialidade::where('id_especialidade', $id)->delete();

            return response()->json(['message' => 'Médico deletado com sucesso!', 'data' => $especialidade], 200);

        };
    }
}
