@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Todos os Cursos
                    <a href="/courses/create" class="float-right btn btn-success">Novo Curso</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>    
                            <th>ID</th>
                            <th>Curso</th>
                            <th>Ementa</th>
                            <th>Quantidade de Alunos</th>
                            <th>Ações</th>
                        </tr>
                        @foreach($courses as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->nameCourse }}</td>
                                <td>{{ $c->ementa }}</td>
                                <td>{{ $c->qtnStudents }}</td>
                                <td>
                                    <a href="/courses/{{ $c->id }}/edit" class="btn btn-warning">Editar</a>
                                    <a href="/courses/{{ $c->id }}/delete" class="btn btn-danger">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
