<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function edit(User $usuario) {
        return view('users.edit', ['usuario' => $usuario]);
    }

    public function update(Request $request, User $usuario) {
    
        $request->validate([
            'name' => 'required',
            'name_completo' => 'nullable',
            'email' => 'required',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'img' => 'nullable|image', 
        ]);

        if ($request->hasFile('img')) {

            if ($usuario->img && $usuario->img !== '/storage/img/persona-default.jpg') {
                Storage::disk('public')->delete($usuario->img);
            }

            $nombre = $usuario->id.'.'.$request->file('img')->getClientOriginalExtension();
            $img = $request->file('img')->storeAs('img/usuarios', $nombre, 'public');
            $usuario->img = '/storage/img/usuarios/'.$nombre;

        } elseif (!$request->hasFile('img') && $usuario->img !== '/storage/img/persona-default.jpg') {
            $usuario->img = '/storage/img/persona-default.jpg';
        }
        
        $usuario->save();
        $usuario->update($request->input());
    
        return redirect()->route('proveedores.index')->with('status', 'proveedor modificado exitosamente');
    }


    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

}