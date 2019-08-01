@extends('layouts.app')
@section('content')
    <div class="container mt-5">
       <div class="row justify-content-center " >
         <div class="col-md-7">
        @foreach ($posts as $post)
            <div class="countainer mb-4"style="background-color: #f0f8ff; ">
                <!-- <div class="card-header" >
                   {{$post->name}}
                </div> -->
                <!-- Right Side Of Navbar -->
                <div class="card-header">
                  <ul class="navbar-nav ml-auto" style="padding-left:3px;">

                        <li class="nav-item ">
                            <a >
                                {{ Auth::user()->name }}  <a style="color:gray;">[{{ Auth::user()->email }}]</a>
                            </a>

                        </li>

                </ul>
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
</div>
</div>
@endsection
