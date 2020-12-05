@extends('admin.layouts.app')

@section('content')
    <div class="container">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif
        <form action="{{ route('admin.quests.store',$quiz->id) }}" method="POST">
            @csrf
            <h3>Question</h3>
            <div class="form-group row">
                <label for="question" class="col-sm-2 col-form-label">Question</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="question" name="description" value="">
                </div>
            </div>
            <h4>Answers</h4>
            <div class="form-group row">
                <label for="question" class="col-sm-2 col-form-label">Answer 1</label>
                <div class="col-sm-8">
                    <input type="text"  class="form-control" id="question" name="answer[]" value="">
                </div>
                <div class="col-sm-2">
                    <input type="radio" name="correct" value="0">
                </div>
            </div>
            <div class="form-group row">
                <label for="question" class="col-sm-2 col-form-label">Answer 2</label>
                <div class="col-sm-8">
                    <input type="text"  class="form-control" id="question" name="answer[]" value="">
                </div>
                <div class="col-sm-2">
                    <input type="radio" name="correct" value="1">
                </div>
            </div>
            <div class="form-group row">
                <label for="question" class="col-sm-2 col-form-label">Answer 3</label>
                <div class="col-sm-8">
                    <input type="text"  class="form-control" id="question" name="answer[]" value="">
                </div>
                <div class="col-sm-2">
                    <input type="radio" name="correct" value="2">
                </div>
            </div>
            <div class="form-group row">
                <label for="question" class="col-sm-2 col-form-label">Answer 4</label>
                <div class="col-sm-8">
                    <input type="text"  class="form-control" id="question" name="answer[]" value="">
                </div>
                <div class="col-sm-2">
                    <input type="radio" name="correct" value="3">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>

@endsection

