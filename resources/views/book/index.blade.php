@extends('basic')

@section('title', 'Книги')


@section('content')

    <h6 class="p-3"> Список Книг</h6>

    <a href="{{URL::to('book/create')}}" class="btn btn-primary">Новая книга</a>

    <a href="{{URL::to('author/')}}" class="btn btn-info">Авторы</a>

    <table class="table table-dark mt-2">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Название</th>
            <th scope="col">Стоимость</th>
            <th scope="col">Авторы</th>
            <th></th>
            <th></th>

        </tr>
        </thead>

        <tbody>
        @foreach($books as $b)

            <tr>
                <th scope="row">{{$b->id}}</th>
                <td>{{$b->book_name}}</td>
                <td>{{$b->price}}</td>
                <td>{{$b->authors()->pluck('last_name')->implode(', ')}}</td>
                <td><a href="{{URL::to('book/' . $b->id) . '/edit'}}" class="btn btn-warning">Редактировать</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['book.destroy', $b->id]]) !!}
                    {!! Form::submit('Удалить книгу', ['class' => 'btn btn-danger'])!!}
                    {!! Form::close() !!}

                </td>
            </tr>

        @endforeach
        </tbody>
    </table>


@endsection