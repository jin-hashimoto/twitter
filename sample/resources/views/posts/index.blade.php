@extends('layouts.layout')
@section('content')
<div style="background-color: #202020;">
    <div class="container pt-5">
        @foreach ($posts as $post)
            <div class="countainer mb-4"style="background-color: #d7d7d7; ">
                <div class="card-header" >
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
                <div class="card-footer text-right">
                  @if ($post->comments->count())
                      <span class="badge badge-primary">
                          コメント {{ $post->comments->count() }}件
                      </span>
                  @endif
                    <font color="gray">
                         {{ $post->created_at->format('Y.m.d.h:i') }}
                  </font>


                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center mb-5">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
