@extends('layouts.layout')
@section('content')

    <div class="container mt-4">
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {!! nl2br(e(str_limit($post->body, 200))) !!}
</p>

<a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
    詳細
</a>
                </div>
                <div class="card-footer">
                    <span class="float-right" style="color:gray;" >
                         {{ $post->created_at->format('Y.m.d.h:i') }}
                    </span>

                    @if ($post->comments->count())
                        <span class="badge badge-primary">
                            コメント {{ $post->comments->count() }}件
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center mb-5">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
