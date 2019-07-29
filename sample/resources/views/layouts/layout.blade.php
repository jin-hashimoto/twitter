<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel BBS</title>
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"
    >
</head>
<body>
    <header class="navbar navbar-dark bg-dark">

        <div class="container-fluid">
          <a class="mr-auto p-2" href="{{ url('') }}">
              Twitter
          </a>
            <div class="p-2">
                <a href="{{ route('users') }}" class="navbar-brand">
                  User list
                </a>
            </div>
            <div class="p-2">
                <a href="{{ route('posts.create') }}" class="btn btn-primary">
                    Tweet
                </a>
            </div>
        </div>
    </header><div>@yield('content')</div></body>
</html>
