<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <!-- Encabezado común a todas las páginas -->
    </header>

    <main>
      <div class="container">
        @yield('content')
      </div>
    </main>

    <footer>
        <!-- Pie de página común a todas las páginas -->
    </footer>
</body>
</html>
