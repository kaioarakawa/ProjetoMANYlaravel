@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <img src="/uploads/avatars/{{ $users->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                    <h2>{{ $users->name }}'s Profile</h2>
                    <form enctype="multipart/form-data" action="/home" method="POST">
                        <div class="custom-file">
                            <label class="custom-file-label" for="customFile">Update Profile Image</label>
                            <input type="file" name="avatar" class="custom-file-input" id="customFile">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <div class="container">
                        <table class="table">
                            <tr>    
                                <td><strong>ID:</strong> {{ $users->id }}</td>
                                <td><strong>Nome:</strong> {{ $users->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong> {{ $users->email }}</td>
                                <td></td>
                            </tr>
                            <tr>    
                                <td><strong>RG:</strong> {{ $users->RG }}</td>
                                <td><strong>CPF:</strong> {{ $users->CPF }}</td>
                            </tr>
                            <tr>    
                                <td><strong>Numero da Casa:</strong> {{ $users->numberHouse }}</td>
                                <td><strong>Numero de Telefone:</strong> {{ $users->numberTel }}</td>
                            </tr>
                            <tr>    
                                <td><strong>Estado:</strong> {{ $users->state }}</td>
                                <td><strong>Cidade:</strong> {{ $users->city }}</td>
                            </tr>       
                            <tr>
                                <td><strong>Rua:</strong> {{ $users->street }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <table class="table">
                            <tr>
                                <td><a href="/home/upperfl" class="btn btn-warning">Editar</a></td>
                                <td><a href="/users/admin/{{ $users->id }}/delete" class="btn btn-danger">Excluir</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
