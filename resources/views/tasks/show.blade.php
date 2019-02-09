@extends('layouts.app')

@section('content')

    <h1>{{ $task->content }} のタスク詳細ページ</h1>
    
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $task->id }}</td>
        </tr>
        <tr>
            <th>ステータス</th>
            <td>{{ $task->status }}</td>
        </tr>
        <tr>
            <th>タスク</th>
            <td>{{ $task->content }}</td>
        </tr>
    </table>
    <div style="display: inline">
        {!! link_to_route('tasks.edit', 'タスクの編集', ['id' => $task->id], ['class' => 'btn btn-secondary']) !!}
        
        {!! link_to_route('tasks.copy', 'タスクのコピー', ['id' => $task->id], ['class' => 'btn btn-success']) !!}
    
        {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    
        {!! link_to_route('advances.create', '進捗の追加', ['id' => $task->id], ['class' => 'btn btn-primary']) !!}
    </div>
    
    <h1>進捗</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>完了</td>
                    <td>日時</td>
                    <td>進捗</td>
                    <td>概要</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($advances as $advance)
               
                <tr>
                    <td>{{ $advance->confirmed }}</td>
                    <td>{{ $advance->date }}</td>
                    <td>{{ $advance->progress }}</td>
                    <td>{{ $advance->summary }}</td>
                    <td style="display: inline-block">
                        {!! link_to_route('advances.edit', '編集', ['id' => $advance->id], ['class' => 'btn btn-secondary']) !!}
                        {!! Form::model($advance, ['route' => ['advances.destroy', $advance->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection