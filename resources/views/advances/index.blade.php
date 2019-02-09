@extends('layouts.app')

@section('content')

    <h1>進捗</h1>

    
        <table class="table table-striped">
            <tbody>
                @foreach ($advances as $advance)
                <tr>
                    <td>{{ $advance->date }}</td>
                    <td>{{ $advance->progress }}</td>
                    <td>{{ $advance->summary }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    


@endsection