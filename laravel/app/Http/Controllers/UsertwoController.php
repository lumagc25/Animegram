<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsertwoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Muestra todos los usuarios
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Muestra el formulario o la vista para crear el usuario y los envia a store
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Guarda los datos enviados del formulario para crear usuario
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Muestra el usuario en especifico
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
    //Muestra el formulario para editar al usuario y los envia al metodo update
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('user.config', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Despues de haber rellenado el formulario de edit, este actualiza en la base de datos
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            //Tanto el nick como el email es unico y propio de casa usuario
            'nick' => 'required|string|max:255|unique:users,nick,'. $id,
            'email' => 'required|string|max:255|unique:users,email,'. $id,
        ]);
        User::whereId($id)->update($validatedData);

        return redirect()->route('users.edit')->with(['message' => 'Tus datos han sido actualizados']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Elimina un usuario en especifico
    public function destroy($id)
    {
        //
    }
}