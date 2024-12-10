@props([
    'useDatatableCDN' => false,
])

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

    {{-- @if (request()->is('about'))
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @endif --}}

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">



    <title>Memories Cake</title>

    @if ($useDatatableCDN)
        <link rel="stylesheet" href="{{ asset('cdn/dataTables.dataTables.min.css') }}">
        <script src="{{ asset('cdn/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('cdn/dataTables.min.js') }}"></script>

        <script>
            $(document).ready(function () {
                $('#order_all').DataTable({
                    "order": [[0, "desc"]],
                    "columns": [
                        null,
                        null,
                        null,
                        null,
                        null,
                        { "orderDataType": "data" }, // This tells DataTables to sort based on the `data-sort` attribute
                        null,
                        null,
                        null
                    ]

                });
            });
        </script>
    @endif

</head>
<body class="bg-[#F3D2C1]">


    {{ $slot }}


</body>
</html>
