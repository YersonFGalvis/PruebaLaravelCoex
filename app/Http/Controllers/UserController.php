<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validar
    $validatedData = $this->validate($request, [
        'nombre' => 'required|string',
        'foto' => 'string',
        'estado' => 'required|max:4',
        'created_by' => 'integer|max:1',
        'update_by' => 'integer|max:1',
    ]);

    

    $user = new User();

    $user->nombre   = $request->nombre;
    $user->foto     =  $request->foto;
    $user->estado   =  $request->estado;
    $user->created_by   = $request->created_by;
    $user->updated_by   =  $request->updated_by;

    $res = $user->save();

    if ($res) {
        return response()->json(['message' => 'usuario creado'], 201);
    }
    return response()->json(['message' => 'Error al crear usuario'], 500);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $user = User::findOrFail($id);

        $user->nombre   = $request->nombre;
        $user->foto     =  $request->foto;
        $user->estado   =  $request->estado;
        $user->created_by   = $request->created_by;
        $user->updated_by   =  $request->updated_by;

        $res = $user->save();

    if ($res) {
        return response()->json(['message' => 'usuario actualizado'], 201);
    }
    return response()->json(['message' => 'Error al actualizar usuario'], 500);
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    $user = User::findOrFail($id);
    if($user)
       $user->delete(); 
    else
        return response()->json(error);
    return response()->json(null); 
    }

}
