<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/siimple.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  @yield('notapp')
  <header class="siimple-h1 text-center" style="margin: 0 auto 2px auto">Coletor de Posições</header>
  <section id="app">
    @yield('content')
  </section>
  
  @include('layout.notifications')
</body>
<script src="{{ asset('js/app.js') }}"></script>
@yield('js')
</html>