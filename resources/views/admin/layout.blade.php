<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'agence immobilier')</title>

    @vite('resources/css/app.css')

</head>

<body>
    @include('shared.admin.navebare')

    {{-- alert --}}
    @session('success')
        <div class="w-full p-4 text-white bg-green-500 text-bold">
            {{ session('success') }}
        @endsession
    </div>

    <div class="flex flex-col justify-between min-h-screen pt-4 dark:bg-gray-900 dark:text-white">
        <div class="w-full max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            @yield('content')
        </div>
        @include('shared.footer')
    </div>
</body>

</html>
