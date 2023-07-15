<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', ['usuarios' => $usuarios]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

      $hash = PASSWORD_HASH($request->password, PASSWORD_DEFAULT);

        Usuario::create([
            'Nome' => $request->name,
            'E-mail' => $request->email,
            'Senha' => $hash,
            'Data de Nascimento' => $request->date
        ]);

        return response()->json([
            'Nome' => $request->name,
            'E-mail' => $request->email,
            'Senha' => $hash,
            'Data de Nascimento' => $request->date
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show', ['usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $hash = PASSWORD_HASH($request->password, PASSWORD_DEFAULT);

        $usuario = Usuario::findOrFail($id);

        $usuario->update([
            'Nome' => $request->name,
            'E-mail' => $request->email,
            'Senha' => $hash,
            'Data de Nascimento' => $request->date
        ]);

        return response()->json([
            'Nome' => $request->name,
            'E-mail' => $request->email,
            'Senha' => $hash,
            'Data de Nascimento' => $request->date
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(string $id) {
        $usuario = Usuario::findOrFail($id);

        return view('usuarios.index', ['usuario' => $usuario]);
    }

    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);

        $usuario->delete();

        return response()->json($usuario);
    }
}
