@extends('layouts.app')
@section('content')

<h1>新規タスク記入ページ</h1>

<div class="row">
   <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-8 col-md-offset-2 col-lg-offset-3 col-lg-6">
    {!! Form::model($task, ['route' => 'tasks.store']) !!}
     
     <div class="form-group">
        {!! Form::label('status', 'status:') !!}
        {!! Form::text('status', null, ['class' => 'form-control']) !!}
     </div>
        
     <div class="form-group"> 
        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content', null, ['class' => 'form-control']) !!}
     </div>
        {!! Form::submit('記入', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
    </div>
</div>

@endsection