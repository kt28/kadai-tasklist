@extends('layouts.app')

@section('content')

    <h1>進捗新規作成ページ</h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form::model($advance, ['route' => 'advances.store']) !!}
            {!! Form::hidden('id', $task_id) !!}
            
                <div class="form-group">
                    {!! Form::label('date', '日時:') !!}
                    {!! Form::text('date', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('progress', '進捗:') !!}
                    {!! Form::text('progress', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('summary', '概要:') !!}
                    {!! Form::text('summary', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
                
            {!! Form::close() !!}
        </div>
    </div>

@endsection