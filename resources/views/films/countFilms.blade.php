@include("films.header")

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white font-sans">

    <h1 class="text-3xl text-center my-8">{{$title}}</h1>

    <div class="container mx-auto flex justify-center">
        @if(empty($films))
            <p class="text-red-500 font-bold">No se ha encontrado ninguna película</p>
        @elseif(!empty($films) && is_int($films))
            <p class="text-white font-bold">Hay un total de <span class="text-red-500">{{$films}}</span> películas</p>
        @endif
    </div>

@include("films.footer")
