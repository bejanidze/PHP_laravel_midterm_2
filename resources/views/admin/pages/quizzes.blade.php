@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#form">
            Add Quiz
        </button>
    </div>

    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Add QUIZ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/addQuiz" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Quiz Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table data-toggle="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Quizzes</th>
            <th>Question</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($quizzes as $quiz)
            <tr>
                <td>{{ $quiz->id }}</td>
                <td>{{ $quiz->title }}</td>
                <td>{{ $quiz->questions()->count() }}</td>
                <td>{{ $quiz->created_at }}</td>
                <td><a class="btn btn-primary" href="/admin/questions/{{$quiz->id}}">View</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
