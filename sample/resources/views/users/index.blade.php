@extends('layouts.app')

@section('content')
    <div class="container">
       　<h3>ユーザーリスト</h3>
        <div class="card mb-4">



            <!-- Following -->
            <div class="panel panel-default">

                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td clphpass="table-text"><div>{{ $user->name }}</div></td>
                                @if ($user->follow == 1)
                                    <td>
                                        <form action="/users/{{$user->id}}/unfollow" method="POST">

                                            @csrf
                                            @method('PUT')

                                            <button type="submit" id="delete-follow-{{ $user->id }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>フォローをはずす
                                            </button>
                                        </form>
                                    </td>
                                @else
                                    <td>
                                        <form action="/users/{{$user->id}}/follow" method="POST">

                                            @csrf
                                            @method('PUT')

                                            <button type="submit" id="follow-user-{{ $user->id }}" class="btn btn-success">
                                                <i class="fa fa-btn fa-user"></i>フォローする
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
