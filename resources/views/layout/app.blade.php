<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $title ?? 'GitFormed' }}</title>
</head>

<body class="bg-gray-200">
    @if (!$hide_header)
        @include('component.header')
    @endif
    @yield('content')
    @if (!$hide_footer)
        @include('component.footer')
    @endif
</body>

</html>
