<html>

<head>
    <meta charset="utf-8">
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>

<body>
    <section class="navbar">
        <h1>Exams</h1>
    </section>

    <section class='content'>
        @yield('content')
    </section>
</body>

</html>
