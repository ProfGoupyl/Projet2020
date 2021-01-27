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
        <section id="droit">
            @yield('droit')
        </section>
        <section id="cookies">
            @yield('cookies')
        </section>
        <section id="charte">
            @yield('charte')
        </section>

        <footer>
            @include('includes.footer')
        </footer>
    </div>

    <script src="https://kit.fontawesome.com/3ccbb8d23f.js" crossorigin="anonymous"></script>
    @if(!\Request::is('admin/*'))
    <script src="{{ asset('js/app.js') }}"></script>
    @endif
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
    @if(\Request::is('admin/cours') || \Request::is('admin/users'))
    <script src="{{ asset('js/admin/lineModify.js') }}"></script>
    <script src="{{ asset('js/admin/modal.js') }}"></script>
    @endif
    @if(\Request::is('admin/cours/*'))
    <script src="{{ asset('js/admin/dragAndDrop.js') }}"></script>
    <script src="{{ asset('js/admin/coursEdit.js') }}"></script>
    @endif

</body>

</html>