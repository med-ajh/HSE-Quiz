@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>{{ __('Create New Question') }}</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="text">{{ __('Question Text') }}</label>
            <input type="text" name="text" id="text" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">{{ __('Question Image (Optional)') }}</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <h5>{{ __('Answers') }}</h5>

        @for($i = 0; $i < 3; $i++)
            <div class="form-group">
                <label for="answer_{{ $i }}">{{ __('Answer') }} {{ $i + 1 }}</label>
                <input type="text" name="answers[{{ $i }}][text]" id="answer_{{ $i }}" class="form-control" required>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="answers[{{ $i }}][is_correct]" value="1" >
                    <label class="form-check-label">{{ __('Correct Answer') }}</label>
                </div>
            </div>
        @endfor

        <button type="submit" class="btn btn-primary">{{ __('Save Question') }}</button>
    </form>
</div>
@endsection
