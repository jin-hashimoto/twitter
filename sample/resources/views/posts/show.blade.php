@extends('layouts.layout')

@section('content')
    <div class="container pt-4"　>
      <form class="pb-1" method="POST" action="{{ route('comments.store') }}">
    @csrf

    <input
        name="post_id"
        type="hidden"
        value="{{ $post->id }}"
    >

    <div class="form-group">
        <label for="body">
            <font color="black">本文
        </label>

        <textarea
            id="body"
            name="body"
            class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
            rows="4"
        >{{ old('body') }}</textarea>
        @if ($errors->has('body'))
            <div class="invalid-feedback">
                {{ $errors->first('body') }}
            </div>
        @endif
    </div>

    <div class="mt-4 mb-4 text-right">
        <button type="submit" class="btn btn-primary">
         Reply
        </button>
    <a class="btn btn-primary" href="{{ route('posts.edit', ['post' => $post]) }}">
         Edit
    </a>
</div>
</form>
        <div class="border p-4" >
            <h1 class="h5 mb-4">
                {{ $post->title }}
            </h1>

            <p class="mb-5">
                {!! nl2br(e($post->body)) !!}
            </p>

            <section>
                <h2 class="h5 mb-4" >
                     コメント
                </h2>

                @forelse($post->comments as $comment)
                    <div class="border-top p-4">
                        <time class="text-secondary">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2">
                            {!! nl2br(e($comment->body)) !!}
                        </p>
                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </section>
        </div>
    </div>
  </div>
@endsection
