<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <!-- CSRF TOKEN -->
  <meta content="{{csrf_token()}}" name="csrf-token">
  <title>@yield('title','LaraBBS') - Laravel</title>
  <!-- style -->
  <link href="{{mix("css/app.css")}}" rel="stylesheet">
  @yield("styles")
</head>

<body>
  <div id="app" class="{{route_class()}}-page">
    @include("layouts._header")
    <div class="container">
      @include("shared._message")
      @yield("content")
    </div>
    @include("layouts._footer")
  </div>

  <!-- Scripts -->
  <script src="{{mix("js/app.js")}}"></script>
  @yield("scripts")
</body>
</html>
