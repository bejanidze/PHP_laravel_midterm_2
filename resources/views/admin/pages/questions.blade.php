@extends('admin.layouts.app')

@section('content')
    <a class="btn btn-primary" href="/admin/questions/{{$quiz->id}}/create">Add Question</a>
    <table data-toggle="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($quiz->questions as $question)
        <tr>
            <td>{{ $question->id }}</td>
            <td>{{ $question->description }}</td>
            <td>{{ $question->answers()->where('is_correct',1)->first()->answer }}</td>
            <td>{{ $question->created_at }}</td>
            <td><a class="btn btn-primary">View</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
