@extends('basic')

@section('title', 'Авторы')


@section('content')

    <h6 class="p-3"> Список авторов</h6>

    <a href="{{URL::to('author/create')}}" class="btn btn-primary">Добавить автора</a>

    <a href="{{URL::to('book/')}}" class="btn btn-info">Книги</a>



    <table class="table table-dark mt-2">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Имя</th>
            <th scope="col">Отчество</th>
            <th scope="col">Количество книг</th>
            <th></th>
            <th></th>

        </tr>
        </thead>

        <tbody>
        @foreach($authors as $a)
            <tr>
                <th scope="row">{{$a->id}}</th>
                <td>{{$a->last_name}}</td>
                <td>{{$a->name}}</td>
                <td>{{$a->second_name}}</td>
                <td>{{$a->books_number}}</td>
                <td><a href="{{URL::to('author/' . $a->id) . '/edit'}}" class="btn btn-warning">Редактировать</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['author.destroy', $a->id]]) !!}
                    {!! Form::submit('Удалить автора', ['class' => 'btn btn-danger'])!!}
                    {!! Form::close() !!}

                </td>
            </tr>

        @endforeach
        </tbody>
    </table>


@endsection