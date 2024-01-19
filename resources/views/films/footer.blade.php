<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Agregar Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        #amazonFooter{
            height: 50px;
        }
    </style>
</head>

<body class="bg-gray-900">

    <div class="mt-8">
        <center><a href="/"><img id="amazonFooter" src="{{ asset('img/pie.png') }}" alt=""></a></center>
    </div>
    <br><br>

    <!-- Footer -->
    <footer class="bg-gray-800 py-4">
        <nav class="flex justify-center mb-4">
            <ul class="flex">
                <li class="mr-6"><a href="/productos" class="text-gray-500 hover:text-gray-900">Productos</a></li>
                <li class="mr-6"><a href="/servicios" class="text-gray-500 hover:text-gray-900">Servicios</a></li>
                <li class="mr-6"><a href="/nosotros" class="text-gray-500 hover:text-gray-900">Nosotros</a></li>
                <!-- Agregar más elementos según las secciones de tu sitio web -->
            </ul>
        </nav>
        <div class="text-center">
            <p class="text-gray-400">Teléfono: 123-456-789</p>
            <p class="text-gray-400">Correo electrónico: info@example.com</p>
            <p class="text-gray-400">Dirección: Dirección de tu empresa</p>
        </div>
    </footer>
    <!-- Fin del Footer -->

</body>

</html>
