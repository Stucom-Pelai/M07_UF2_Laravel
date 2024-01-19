@include("films.header");

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #202020;
            color: #ffffff;
        }
        th, td {
            border: 1px solid #d1d1d1;
            padding: 8px;
        }

        .bg-gray-800 {
            background-color: #1a1a1a;
        }

        .bg-gray-900 {
            background-color: #202020;
        }

        .text-gray-900 {
            color: #ffffff;
        }

        .border-gray-400 {
            border-color: #d1d1d1;
        }

        .border-gray-700 {
            border-color: #9c9c9c;
        }

        .hover\:underline:hover {
            text-decoration: underline;
        }

        .bg-blue-500 {
            background-color: #2563eb;
        }

        .bg-blue-600:hover {
            background-color: #1d4ed8;
        }

        .text-blue-500 {
            color: #2563eb;
        }

        .text-white {
            color: #ffffff;
        }

        .focus\:border-blue-500:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px #2563eb;
        }

        .hover\:bg-blue-600:hover {
            background-color: #1d4ed8;
        }

        .hover\:text-blue-500:hover {
            color: #2563eb;
        }

        .error-message {
            color: #ff0000;
        }
    </style>
</head>

<h1 class="text-4xl text-center my-8">{{$title}}</h1>

<div class="flex justify-center">
    <table class="border-collapse border border-gray-400">
        <tr class="bg-gray-900 text-white">
            @foreach($films[0] as $key => $value)
                <th class="border border-gray-400 py-2 px-4">{{$key}}</th>
            @endforeach
        </tr>
 
        @foreach($films as $film)
            <tr class="text-center">
                <td class="border border-gray-400 py-2 px-4">{{$film['name']}}</td>
                <td class="border border-gray-400 py-2 px-4">{{$film['year']}}</td>
                <td class="border border-gray-400 py-2 px-4">{{$film['genre']}}</td>
                <td class="border border-gray-400 py-2 px-4">{{$film['country']}}</td>
                <td class="border border-gray-400 py-2 px-4">{{$film['duration']}}</td>
                <td class="border border-gray-400 py-2 px-4"><img src="{{$film['img_url']}}" class="w-20 h-24" alt="Film Image"/></td>
            </tr>
        @endforeach
    </table>
</div>

@include("films.footer");
