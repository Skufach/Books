@extends('basic')

@section('title', 'Редактировать автора')

@section('content')

    <a href="{{URL::to('author/')}}" class="btn btn-info mt-3">Назад</a>

    {!! Form::model($author, array('route' => array('author.update', $author->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
    {{csrf_field()}}
    <div class="container">
        <div class="form-group">

            <div class="col-md-4">
                {{ Form::label('name', 'Имя')}}
            </div>

            <div class="col-md-8">
                {{ Form::text('name',  null, ['class' => 'form-control'])}}
            </div>
        </div>

        <div class="form-group">

            <div class="col-md-4">
                {{ Form::label('last_name', 'Фамилия')}}
            </div>

            <div class="col-md-8">
                {{ Form::text('last_name', null, ['class' => 'form-control'])}}
            </div>
        </div>

        <div class="form-group">

            <div class="col-md-4">
                {{ Form::label('second_name', 'Отчество')}}
            </div>

            <div class="col-md-8">
                {{ Form::text('second_name', null, ['class' => 'form-control'])}}
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                {{ Form::submit('Изменить автора', ['class' => 'btn btn-primary'])}}
            </div>
        </div>

    </div>


    {!! Form::close() !!}
@endsection