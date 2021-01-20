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

    <script src="https://kit.fontawesome.com/3ccbb8d23f.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(document).ready(function() {
                $('.burger').click(function() {
                    $('.items').toggleClass("show");
                    $('ul li').toggleClass("hide");
                });
            });
        });
    </script>
</body>
</html>