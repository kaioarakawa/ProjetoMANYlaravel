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
        $c->nameCourse = $request->input('nameCourse');
        $c->Ementa = $request->input('ementa');
        $c->qtnStudents = $request->input('qtnStudents');

        if ($c->save()) {
            \Session::flash('status', 'Curso criado com sucesso.');
            return redirect('/courses');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar o Curso.');
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
        $c->nameCourse = $request->input('nameCourse');
        $c->Ementa = $request->input('ementa');
        $c->qtnStudents = $request->input('qtnStudents');

        
        if ($c->save()) {
            \Session::flash('status', 'Curso atualizado com sucesso.');
            return redirect('/courses');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o Curso.');
            return view('courses.edit', ['courses' => $c]);
        }
    }

    public function destroy($id) {
        $c = Courses::findOrFail($id);
        $c->delete();

        \Session::flash('status', 'Curso excluído com sucesso.');
        return redirect('/courses');
    }
}
