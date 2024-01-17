<html>
<head>
    <title>App Name - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/css/styles.css" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">

        <nav class="row navbar navbar-expand-lg navbar-light bg-light">
            <div class="d-flex">
                <a class="navbar-brand" href="/">Brand</a>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ml-auto d-flex align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Домой</a>
                        </li>
                        <li class="nav-item">
                            <b>{{$breadcrumbTitle}}</b>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="row">
            <div class="col-3 sidebar">
                @section('sidebar')
                    <ul class="tag-clouds">
                        @foreach($tagClouds as $tag)
                            <li class="tag badge bg-secondary"><a href="{{route('articles-by-tag',$tag->title)}}">{{$tag->title}}</a></li>
                        @endforeach
                    </ul>
                @show
            </div>
            <div class="col-9 content">
                @yield('content')
            </div>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
