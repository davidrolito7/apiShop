<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
   
    public function index()
    {
        return Cliente::all();
    }

   
    public function store(Request $request)
    {
        $request->validate([
         'usuario'=>'required',
         'nombre'=>'required',
         'correo'=>'required',
         'contrasena'=>'required'
       
        ]);
        $cliente = new Cliente;
        $cliente->usuario = $request->usuario;
        $cliente->nombre = $request->nombre;
        $cliente->correo = $request->correo;
        $cliente->contrasena = $request->contrasena;
        $cliente->save();

        return $cliente;
    }

   
    public function show(Cliente $cliente)
    {
        return $cliente;
    }

    
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'usuario'=>'required',
            'nombre'=>'required',
            'correo'=>'required',
            'contrasena'=>'required'
          
           ]);
           $cliente->usuario = $request->usuario;
           $cliente->nombre = $request->nombre;
           $cliente->correo = $request->correo;
           $cliente->contrasena = $request->contrasena;
           $cliente->update();
   
           return $cliente;
        
    }

   
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if(is_null($cliente))
        {
            return response()->json('No se pudo realizar correctamente la operacion',404);
        }


        $cliente->delete();
        return response()->noContent();
    }
}
