@extends("layouts.app")

@section("content")
    <div class="container">

        @if(session("info"))
            <div class="alert alert-info">
                {{ session("info") }}
            </div>
        @endif

        {{ $articles->links() }}

        @foreach($articles as $article)
            <div class="card mb-3">
                <div class="card-body">
                    <h3>{{ $article->title }}</h3>
                    <small class="text-muted">
                        <b class="text-success">
                            {{ $article->user->name }}
                        </b>
                        {{ $article->created_at->diffForHumans() }},
                        Category: {{ $article->category->name }},
                        {{ count($article->comments) }} Comments
                    </small>
                    <div>{{ $article->body }}</div>
                </div>
                <div class="card-footer">
                    <a href="{{ url("/articles/detail/$article->id") }}" class="card-link">View Details...</a>
                    <a href="{{ url("/articles/edit/$article->id") }}" class="card-link">Edit</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
