<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::orderBy('id')->get();
        return view('admin.usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = $request->all();
        $usuario['password'] = Hash::make($usuario['password']);

        User::create($request->all());

        return view('admin.usuario');
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
        // $usuario = User::findOrFail($id);

        // return view('admin.usuario.edit', compact('usuario'));

        $usuario = User::where('id', $id)->first();
dump($usuario);
        return view('admin.usuario.edit', [
            'id' =>  $usuario->id,
            'username' =>  $usuario->username,
            'name' => $usuario->name,
            'email' => $usuario->email,
            'rfid' => $usuario->rfid,
            'code' => $usuario->code,
            'admin' => $usuario->admin
        ]);
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
        $data = $request->all();
        $usuario = User::find($id);

        $usuario->password = $data['password'] != null ? Hash::make($data['password']): $usuario->password;
        $usuario->username = $data['username'];
        $usuario->name = $data['name'];
        $usuario->email = $data['email'];
        $usuario->rfid = $data['rfid'];
        $usuario->code = $data['code'];
        $usuario->admin = $data['admin'] === 'true' ? true: false;

        $usuario->save();

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('admin/users');
    }

    /**
     * Enable/Disable the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $usuario = User::find($id);

        return view('admin.usuario.index');
    }

}