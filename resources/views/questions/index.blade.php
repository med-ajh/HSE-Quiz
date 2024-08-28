@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>{{ __('All Questions') }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('questions.create') }}" class="btn btn-primary mb-3">{{ __('Create New Question') }}</a>

    @if($questions->count())
        <ul class="list-group">
            @foreach($questions as $question)
                <li class="list-group-item">
                    {{ $question->text }}
                    @if($question->image)
                        <img src="{{ asset('storage/' . $question->image) }}" alt="{{ $question->text }}" class="img-thumbnail mt-2" width="100">
                    @endif
                    <ul class="mt-2">
                        @foreach($question->answers as $answer)
                            <li>{{ $answer->text }} @if($answer->is_correct) <strong>(Correct)</strong> @endif</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @else
        <p>{{ __('No questions available.') }}</p>
    @endif
</div>
@endsection
