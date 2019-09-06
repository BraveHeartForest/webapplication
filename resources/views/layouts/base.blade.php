<html>
<head>
    <title>@yield('title')</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>
    table { width: 100%;}
    th { background-color: #999; color: fff; padding: 5px 10px;}
    td { border: solid 1px #aaa; color: #999; padding: 5px 10px;}
    body { font-size:16pt; margin: 5px; color:#999; }
    h1{ font-size:50px; text-align:right; color:#f6f6f6;
        margin:-20px 0px -30px 0px; letter-spacing: -4pt; }
    ul { font-size: 18px;}
    hr { margin: 25px 100px; border-top: 1px dashed #ddd; }
    .header {font-size: 14pt; font-weight: bold; margin: 0px; }
    .content {margin: 10px;}
    .footer{ text-align: right; font-size: 10pt; margin: 10px;
            border-bottom: solid 1px #ccc; color:#ccc; }
    .itigyou { display: inline-block; }
    input.address { width: 80%; }
    .itigyou li { display: inline-block; }
    select{
    outline:none;
    text-indent: 0.01px;
    text-overflow: '';
    background: none transparent;
    vertical-align: middle;
    font-size: inherit;
    color: inherit;
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;
    }
    select option{
    background-color: #fff;
    color: #333;
    }
    </style>
    <!-- Styles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <h1>@yield('title')</h1>
        @yield('header')
    <hr size="1">
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        @yield('footer')
    </div>
</body>
</html>