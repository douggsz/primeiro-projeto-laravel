<html>
<head>
    <style>
        body{
            padding: 2em;
        }
        .navbar{
            margin-bottom: 2em;
        }
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Cadastro</title>
</head>
<body>
    <div class="container">
        <main role="main">

            @component('componentes.barraNavegacao',["current" => $current])
            @endcomponent

            @hasSection('body')

                @yield('body')

            @endif
        </main>
    </div>

<script src="{{asset('js/app.js')}}" type="text/javascript"></script>

    @hasSection('javascript')
        @yield('javascript')
    @endif

</body>
</html>
