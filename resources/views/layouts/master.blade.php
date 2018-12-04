<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-grey-lightest font-sans font-normal antialiased">
        <div class="min-h-screen flex justify-center">
            <div class="flex flex-col justify-around h-full">
                <div class="mt-8" id="app">
                    <h1 class="text-grey-darker text-center font-thin tracking-wide text-5xl mb-6">
                        {{ config('app.name', 'Laravel') }}
                    </h1>

                    @yield('content')
                    
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</html>
