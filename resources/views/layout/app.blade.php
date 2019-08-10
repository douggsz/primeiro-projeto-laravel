<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cadastro</title>
</head>
<body>
    <div class="container">
        <main role="main">

            @component('componentes.barraNavegacao')
            @endcomponent

            @hasSection('body')

                @yield('body')

            @endif
        </main>
    </div>
<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>
