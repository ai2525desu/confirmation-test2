<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/layouts/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/fonts.css') }}">
</head>

<body>
    <header class="header">
        <div class="header_inner">
            <a class="header_logo" href="/products">
                mogitate
            </a>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>
</body>

</html>