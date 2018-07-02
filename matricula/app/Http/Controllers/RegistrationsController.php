<?php

namespace App\Http\Controllers;

use App\User;
use App\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class RegistrationsController extends Controller
{
    public function allcourses(){
        $users = User::with('courses')->get();

        if (Gate::allows('admin-only', auth()->user())) {
            
            return view('courses/registration/allcourses', ['users' => $users]);
        }else {
            \Session::flash('error', 'Voce não tem permissão para entrar nessa pagina.');
            return view('home');
        }

    }

    public function authtorizeStudent(Request $request,$idCourse,$idUser){
        $op=1;
        $courses = Courses::find($idCourse);


        $user = User::find($idUser)->courses()->updateExistingPivot($idCourse,['authorized' => 1]);
        

        
        if (Gate::allows('admin-only', auth()->user())) {
            \Session::flash('status', 'O Estudante foi autorizado!');
            $users = User::with('courses')->get();
            return view('courses/registration/allcourses', ['users' => $users]);
        }else {
            \Session::flash('error', 'Voce não tem permissão para entrar nessa pagina.');
            return view('home');
        }
    }
    
    public function index()
    {
        $courses = Courses::all();
        $users = User::with('courses')->get();
            return view('/courses/user/list', ['courses1' => $courses,'users' => $users]);
       
    }


    public function adminre($idCourse,$idUser){
        $courses = Courses::find($idCourse);
        $courses->user->attach($idUser);
        
    } 

    public function userre($id){
        $courses = Courses::find($id);
        $courses->user()->attach(Auth::id());
        
    } 


    public function userde($id){
        $courses = Courses::find($id);
        $courses->user()->detach(Auth::user());
        
    } 

    public function mycurses(){
        $users = User::find(Auth::user())->courses;
        
    }  
}
