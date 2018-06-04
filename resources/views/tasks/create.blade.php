@extends('layouts.app')
@section('content')

<h1>新規タスク記入ページ</h1>

    {!! Form::model($task, ['route' => 'tasks.store']) !!}

        {!! Form::label('status', 'status:') !!}
        {!! Form::text('status') !!}

        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('記入') !!}

    {!! Form::close() !!}


@endsection