@extends('layouts.app')

@section('content')

    <h1>進捗編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($advance, ['route' => ['advances.update', $advance->id], 'method' => 'put']) !!}
        
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
        
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>

@endsection