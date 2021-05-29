@extends('app')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="jumbotron">
        <h1 class="font-weight-normal mb-3">Tytuł Notatki: <span class="font-weight-bold">{{ $task->title }}</h1>
        <p class="lead mb-3">Data utworzenia: <span class="font-weight-bold"> {{ $task->created_at }} </span></p>
        <p class="lead">Data ostatniej edycji: <span class="font-weight-bold"> {{ $task->updated_at }} </span></p>
        <hr class="my-4">
        <h3>Opis:</h3>
        <p>{{ $task->description }}</p>
        <a class="btn btn-outline-primary btn" href="{{ route('edit', ['task'=> $task]) }}" role="button">Edycja</a>
        <a class="btn btn-primary btn ml-2" href="{{ route('index') }}" role="button">Powrót</a>
    </div>
@endsection
