@extends('app')
@section('content')
    @if (session()->has('success'))
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endif
    <form method="get" action="/" class="tools p-3">
        <div class="search">
            <label>
                <h5>Wyszukaj:</h5>
                <input type="text" class="form-control" name="phrase" value="{{ $phrase }}">
            </label>
        </div>
        <div class="sort">
            <h4>Sortuj po:</h4>
            <label>
                Tytule:
                <input name="sort_by" type="radio" value="title" @if($sortBy == 'title') checked @endif>
            </label>
            <label class="sort__label"> Dacie:
                <input name="sort_by" type="radio" value="created_at" @if($sortBy == 'created_at') checked @endif>
            </label>
        </div>
        <div>
            <h4>
                Kierunek sortowania:
            </h4>
            <label class="sort__label"> Rosnąco:
                <input name="sort_order" type="radio" value="asc" class="sort__radio" @if($sortOrder == 'asc') checked @endif>
            </label>
            <label class="sort__label"> Malejąco:
                <input name="sort_order" type="radio" value="desc" class="sort__radio" @if($sortOrder == 'desc') checked @endif>
            </label>
        </div>
        <div class="sort">
            <h4>
                Rozmiar paczki:
            </h4>
            <label class="sort__label">1
                <input type="radio" name="page_size" value=1 class="sort__radio" @if($pageSize == '1') checked @endif>
            </label>
            <label class="sort__label">5
                <input type="radio" name="page_size" value=5 class="sort__radio" @if($pageSize == '5') checked @endif>
            </label>
            <label class="sort__label">10
                <input type="radio" name="page_size" value=10 class="sort__radio" @if($pageSize == '10') checked @endif>
            </label>
            <label class="sort__label">25
                <input type="radio" name="page_size" value=25 class="sort__radio" @if($pageSize == '25') checked @endif>
            </label>
        </div>
        <input type="submit" class="btn btn-primary" value="Wyślij">
    </form>

    <table class="table mt-3" cellpadding="0" cellspacing="0" border="0">
        <thead class="bg-primary text-white text-uppercase">
        <tr class="table__main-tr">
            <th>Lp</th>
            <th>tytuł</th>
            <th>data</th>
            <th>opcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $task)
           <tr>
            <th> {{ $loop->iteration }} </th>
                <th> {{ $task->title }}</th>
                <th> {{ $task->created_at }} </th>
                <th>
            <a class="d-inline-block" href="{{ route('show', ['task' => $task]) }}">
            <button class="btn btn-primary mr-1 mb-1">Szczegóły</button>
            </a>
                    <form class="d-inline-block" action="{{ route('destroy', ['task' => $task]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-primary" onclick="return confirm('Jesteś pewien?')">Usuń</button>
                    </form>
            </th></tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination w-50 mx-auto mt-5">
        {{$tasks->links("pagination::bootstrap-4")}}
    </div>
@endsection
