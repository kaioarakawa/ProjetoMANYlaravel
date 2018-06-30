<?php

namespace App\Http\Controllers;

use App\User;
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
        $users = User::all();

        return view('users/index', ['users' => $users]);
    }

    public function create() 
    {
        return view('users/new');
    }

    public function all($name)
    {
        $users = User::where('name', 'like', "$name%")->get();

        return new JsonResponse($users);
    }

    public function store(Request $request) 
    {
        $u = new User;
        $u->name = $request->input('name');
        $u->email = $request->input('email');
        $u->CPF = $request->input('CPF');
        $u->RG = $request->input('RG');
        $u->state = $request->input('state');
        $u->city = $request->input('city');
        $u->street = $request->input('street');
        $u->numberHouse = $request->input('numberHouse');
        $u->numberTel = $request->input('numberTel');
        if ($u->save()) {
            \Session::flash('status', 'Aluno cadastrado com sucesso.');
            return redirect('/users');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao cadastrado o Aluno.');
            return view('users.new');
        }
    }

    public function edit($id) {
        $users = User::findOrFail($id);

        return view('users.edit', ['users' => $users]);
    }

    public function delete($id) {
        $users = User::findOrFail($id);

        return view('users.delete', ['users' => $users]); 
    }

    public function updateAdmin(Request $request, $id) {
        $u = User::findOrFail($id);
        $u->isAdmin = $request->input('isAdmin');

        if ($u->save()) {
            \Session::flash('status', 'Usuario atualizado com sucesso.');
            return redirect('/users');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o Usuario.');
            return view('users.edit', ['users' => $u]);
        }
    }

    public function update(Request $request, $id) {
        $u = User::findOrFail($id);
        $u->name = $request->input('name');
        $u->email = $request->input('email');
        $u->CPF = $request->input('CPF');
        $u->RG = $request->input('RG');
        $u->state = $request->input('state');
        $u->city = $request->input('city');
        $u->street = $request->input('street');
        $u->numberHouse = $request->input('numberHouse');
        $u->numberTel = $request->input('numberTel');
        

        if ($u->save()) {
            \Session::flash('status', 'Usuario atualizado com sucesso.');
            return redirect('/users');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o Usuario.');
            return view('users.edit', ['users' => $u]);
        }
    }

    public function destroy($id) {
        $u = User::findOrFail($id);
        $u->delete();

        \Session::flash('status', 'Usuario excluído com sucesso.');
        return redirect('/users');
    }
}
