<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courses;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        
    }

    public function index()
    {
        $courses = Courses::all();

        return view('courses/index', ['courses' => $courses]);
    }

    public function create() 
    {
        return view('courses/new');
    }

    public function store(Request $request) 
    {
        $c = new Courses;
        $c->Nome_Aluno = $request->input('Nome_Curso');
        $c->Ementa = $request->input('Ementa');
        $c->Qtn_Aluno = $request->input('Qtn_Aluno');

        if ($c->save()) {
            \Session::flash('status', 'Estado criado com sucesso.');
            return redirect('/courses');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar o estado.');
            return view('courses.new');
        }
    }

    public function edit($id) {
        $courses = Courses::findOrFail($id);

        return view('courses.edit', ['courses' => $courses]);
    }

    public function delete($id) {
        $courses = Courses::findOrFail($id);

        return view('courses.delete', ['courses' => $courses]); 
    }

    public function update(Request $request, $id) {
        $c = Courses::findOrFail($id);
        $c->Nome_Aluno = $request->input('Nome_Curso');
        $c->Ementa = $request->input('Ementa');
        $c->Qtn_Aluno = $request->input('Qtn_Aluno');
        
        if ($p->save()) {
            \Session::flash('status', 'Estado atualizado com sucesso.');
            return redirect('/courses');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o Estado.');
            return view('courses.edit', ['courses' => $c]);
        }
    }

    public function destroy($id) {
        $s = Courses::findOrFail($id);
        $s->delete();

        \Session::flash('status', 'Estado excluído com sucesso.');
        return redirect('/courses');
    }
}
