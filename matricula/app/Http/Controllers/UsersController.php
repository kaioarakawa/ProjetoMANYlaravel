<?php

namespace App\Http\Controllers;

use App\User;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }

    public function index()
    {
        $students = Students::all();

        return view('students/index', ['students' => $students]);
    }

    public function create() 
    {
        return view('students/new');
    }

    public function all($name)
    {
        $users = User::where('name', 'like', "$name%")->get();

        return new JsonResponse($users);
    }

    public function store(Request $request) 
    {
        $s = new Students;
        $s->Nome_Aluno = $request->input('Nome_Aluno');
        $s->CPF = $request->input('CPF');
        $s->RG = $request->input('RG');
        $s->Estado = $request->input('Estado');
        $s->Cidade = $request->input('Cidade');
        $s->Rua = $request->input('Rua');
        $s->Numero = $request->input('Numero');
        $s->Celular = $request->input('Celular');
        if ($s->save()) {
            \Session::flash('status', 'Estado criado com sucesso.');
            return redirect('/students');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar o estado.');
            return view('students.new');
        }
    }

    public function edit($id) {
        $students = Students::findOrFail($id);

        return view('students.edit', ['students' => $students]);
    }

    public function delete($id) {
        $students = Students::findOrFail($id);

        return view('students.delete', ['students' => $students]); 
    }

    public function update(Request $request, $id) {
        $s = new Students;
        $s->Nome_Aluno = $request->input('Nome_Aluno');
        $s->CPF = $request->input('CPF');
        $s->RG = $request->input('RG');
        $s->Estado = $request->input('Estado');
        $s->Cidade = $request->input('Cidade');
        $s->Rua = $request->input('Rua');
        $s->Numero = $request->input('Numero');
        $s->Celular = $request->input('Celular');
        
        if ($p->save()) {
            \Session::flash('status', 'Estado atualizado com sucesso.');
            return redirect('/students');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o Estado.');
            return view('students.edit', ['students' => $s]);
        }
    }

    public function destroy($id) {
        $s = Students::findOrFail($id);
        $s->delete();

        \Session::flash('status', 'Estado excluído com sucesso.');
        return redirect('/students');
    }
}
