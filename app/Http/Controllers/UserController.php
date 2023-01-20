<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index() {

        return view('create', [
            'title' => 'Create',
        ]);
    }

    public function create(Request $request) {

        $request->status ? $request['status'] : $request['status'] = '0';

        $validated = $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'status' => '',
            'email' => 'required|email',
            'telefone' => 'required',
        ]);

        Aluno::create($validated);

        return back()->with('message', 'Aluno(a) cadastrado com sucesso!');
    }

    public function edit($id) {
        
        $edit = Aluno::find($id);

        return view('edit', [
            'title' => 'Editar Aluno',
            'val' => $edit
        ]);
    }

    public function store(Request $request, $id) {

        $request->status ? $request['status'] = '1' : $request['status'] = '0';

        $validated = $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'status' => '',
            'email' => 'required|email',
            'telefone' => 'required',
        ]);

        $resp = Aluno::where('id', '=', $id)->update($validated);

        if (!$resp) return back()->with('message', 'Não foi possível editar o aluno(a)!');
        
        return redirect()->route('home')->with('message', 'Aluno(a) atualizado com sucesso!');

    }

    public function delete(Aluno $id){

        $id->delete();
        return redirect()->route('home');
    }
}
