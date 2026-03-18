<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Villages | Prarang</title>
    <link href="https://unpkg.com/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/villages-style.css') }}">
</head>
<body>
    <header class="bg-gray-800 text-white py-4">
        <div class="grid grid-cols-3 md:grid-cols-6 lg:grid-cols-3 gap-4">
            <div class="col-span-1 md:col-span-2 lg:col-span-1">
                <a href="/" class="text-2xl font-semibold">Prarang</a>
            </div>
            <div class="col-span-1 md:col-span-2 lg:col-span-1">
                <a href="/villages" class="text-lg font-semibold">Villages</a>
            </div>
            <div class="col-span-1 md:col-span-2 lg:col-span-1">
                <a href="/states" class="text-lg font-semibold">States</a>
            </div>
        </div>
    </header>
    <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{ $slot }}
    </main>

</body>

</html>
