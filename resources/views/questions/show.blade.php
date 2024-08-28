
@section('content')
<div class="container mt-5">
    <h1>{{ $question->text }}</h1>

    @if($question->image)
        <div class="mb-4">
            <img src="{{ $question->image_url }}" alt="Question Image" class="img-fluid">
        </div>
    @endif

    <ul class="list-group">
        @foreach($question->answers as $answer)
            <li class="list-group-item">{{ $answer->text }}</li>
        @endforeach
    </ul>
    <a href="{{ route('questions.index') }}" class="btn btn-secondary mt-3">{{ __('Back to Questions List') }}</a>
</div>
@endsection
