@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Todos os Cursos
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
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
                        {{-- {{dd($users)}}
                        {{dd($courses1)}} --}}
                        @foreach($courses1 as $c1) 
                            @foreach($users as $user)
                                @if(!$user->courses)                    
                                    @foreach($user->courses as $c)
                                        
                                        @if($c->pivot->courses_id == $c1->id) 
                                            <tr>
                                                <td>{{ $c1->id }}</td>
                                                <td>{{ $c1->nameCourse }}</td>
                                                <td>{{ $c1->ementa }}</td>
                                                <td>{{ $c1->qtnStudents }}</td>
                                                <td>
                                                    <a href="{{$c->id}}/userre" class="btn btn-warning">Inscrever-se</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td>{{ $c1->id }}</td>
                                        <td>{{ $c1->nameCourse }}</td>
                                        <td>{{ $c1->ementa }}</td>
                                        <td>{{ $c1->qtnStudents }}</td>
                                        <td>
                                            <a href="{{$c->id}}/userre" class="btn btn-warning">Inscrever-se</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
