@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Autorização de Alunos
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
                            <th>Curso</th>
                            <th>Quantidade de Alunos</th>
                            <th>Ementa</th>
                            <th>Estado atual da matricula</th>
                            <th>Ações</th>
                        </tr>
                        <tr>
                        @foreach($courses as $course)                     
                                    <tr>    
                                        <td>{{ $course->nameCourse }}</td>
                                        <td>{{ $course->qtnStudents }}</td> 
                                        <td>{{ $course->ementa }}</td> 
                                        @if ($course->pivot->authorized == 1)
                                            <td> Autorizado </td>
                                        @else 
                                            <td> Em espera </td>
                                        @endif
                                        <td><a href="{{$course->id}}/userde" class="btn btn-success">Deletar Matricula</a></td>  
                                    </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
