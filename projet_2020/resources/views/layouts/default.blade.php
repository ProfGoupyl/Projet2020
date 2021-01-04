<!doctype html>
<html>
<head>
    @include('includes.head')
    
</head>
<body>
    <div>
        <header>
            @include('includes.header')
        </header>

        <section id="app">
            @yield('content')
        </section>

        <footer>
            @include('includes.footer')
        </footer>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>