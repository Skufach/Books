@extends('basic')

@section('title', 'Редактировать автора')

@section('content')
    {!! Form::model($book, array('route' => array('book.update', $book->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
    {{csrf_field()}}
    <div class="container">

        <div class="form-group">

            <div class="col-md-4">
                {{ Form::label('book_name', 'Название')}}
            </div>

            <div class="col-md-8">
                {{ Form::text('book_name', null, ['class' => 'form-control'])}}
            </div>
        </div>

        <div class="form-group">

            <div class="col-md-4">
                {{ Form::label('price', 'Стоимость')}}
            </div>

            <div class="col-md-8">
                {{ Form::number('price', null, ['class' => 'form-control'])}}
            </div>
        </div>


        <div class="form-group">

            <div class="col-md-4">
                <label for="authors_book[]">Авторы</label>
            </div>

            <div class="col-md-8">
                <select name="authors_book[]" multiple style="width: 300px;">
                    @foreach($authors as $a)
                        <option value="{{$a->id}}">{{$a->last_name . ' ' . $a->name . ' ' . $a->second_name}}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                {{ Form::submit('Изменить книгу', ['class' => 'btn btn-primary'])}}
            </div>
        </div>

    </div>


    {!! Form::close() !!}
@endsection