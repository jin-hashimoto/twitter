@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <span class="container mb-4">
                  <span class="p-2">
                  <a class="btn btn-primary" href="{{ url('') }}">
                    Home
                  </a>
                </span>
                  <span class="p-2">
                    <a href="{{ route('users') }}" class="btn btn-primary">
                      User list
                    </a>
                  </spacing>
              </span>
            </div>
        </div>
    </div>
@endsection
