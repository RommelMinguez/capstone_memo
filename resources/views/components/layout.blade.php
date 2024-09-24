<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/css/custom.css'])

    <link rel="icon" type="image/png" href="{{ asset('images/new-memo-logo.png') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/custom-animation.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('fonts/custom-fonts.css') }}">
    <title>Memories Cake</title>

</head>
<body class="bg-[#F3D2C1]">

    {{ $slot }}

</body>
</html>
