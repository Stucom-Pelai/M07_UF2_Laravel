@include("films.header")

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #202020;
            color: #ffffff;
        }

        .error-message {
            color: #ff0000;
        }
    </style>
</head>

<body class="bg-gray-900 text-white font-sans">

    @if(!empty($error))
    <p class="error-message">{{ $error }}</p>
    @endif

    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto ml-4">
            <a class="text-2xl font-bold text-white" href="#">Lista de Películas</a>
            <button class="block lg:hidden focus:outline-none">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <div class="hidden lg:flex lg:items-center lg:w-auto">
                <ul class="lg:flex">
                    <li class="mr-4"><a href="/filmout/oldFilms" class="hover:underline">Películas antiguas</a></li>
                    <li class="mr-4"><a href="/filmout/newFilms" class="hover:underline">Películas nuevas</a></li>
                    <li class="mr-4"><a href="/filmout/films" class="hover:underline">Películas</a></li>
                    <li><a href="/filmout/countFilms" class="hover:underline">Contador de películas</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        <center><h2 class="text-2xl font-bold mb-4">Añadir Película</h2></center>

        <form action="{{ route('createFilm') }}" method="post" class="mx-auto max-w-md">
            @csrf
            <div class="flex flex-col space-y-4">
                <div class="flex flex-col lg:flex-row lg:space-x-4 space-y-2 lg:space-y-0">
                    <div class="w-full lg:w-1/2">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="w-full bg-gray-800 rounded border border-gray-700 p-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="w-full lg:w-1/2">
                        <label for="ano">Año:</label>
                        <input type="number" name="ano" id="ano" class="w-full bg-gray-800 rounded border border-gray-700 p-2 focus:outline-none focus:border-blue-500">
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row lg:space-x-4 space-y-2 lg:space-y-0">
                    <div class="w-full lg:w-1/2">
                        <label for="genero">Género:</label>
                        <input type="text" name="genero" id="genero" class="w-full bg-gray-800 rounded border border-gray-700 p-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="w-full lg:w-1/2">
                        <label for="pais">País:</label>
                        <input type="text" name="pais" id="pais" class="w-full bg-gray-800 rounded border border-gray-700 p-2 focus:outline-none focus:border-blue-500">
                    </div>
                </div>
                <div class="w-full">
                    <label for="duracion">Duración:</label>
                    <input type="number" name="duracion" id="duracion" class="w-full bg-gray-800 rounded border border-gray-700 p-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="w-full">
                    <label for="imagen">Imagen:</label>
                    <input type="text" name="imagen" id="imagen" class="w-full bg-gray-800 rounded border border-gray-700 p-2 focus:outline-none focus:border-blue-500">
                </div>
                <div class="w-full">
                    <input type="submit" value="Enviar" name="button" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded cursor-pointer">
                </div>
            </div>
        </form>
    </div>

    <br>

    @include("films.footer")

</body>

</html>
