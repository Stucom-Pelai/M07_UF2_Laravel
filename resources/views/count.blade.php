<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Número Total de Películas</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        header img {
            max-width: 200px;
            height: auto;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #e9ecef;
            overflow: hidden;
            text-align: center;
        }

        li {
            display: inline;
            margin-right: 20px;
        }

        li a {
            text-decoration: none;
            color: #212529;
            font-weight: bold;
        }

        footer {
            text-align: center;
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            position: absolute;
            bottom: 0;
            width: 100%;
            margin: -400px auto;
        }

        footer img {
            max-width: 100px;
            height: auto;
            margin-top: 10px;
        }

        .container {
            text-align: center;
            margin-top: 50px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: left;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        form input {
            margin-bottom: 10px;
        }

        form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
<header>
        <div>
            <h1 class="mt-4">Cabecera de la Web (Master)</h1>
            <img src="https://imgs.search.brave.com/jQSOBH3ec4hvrxfFzF55VUK4oXpjYz7PThBtOGbAXiI/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9jZG4u/cGl4YWJheS5jb20v/cGhvdG8vMjAxNi8w/OS8xNC8wOC8xOC9m/aWxtLTE2Njg5MThf/XzM0MC5qcGc" alt="Logo">
        </div>
    </header>
<body>
    <h1>{{ $title }}</h1>
    <p>El número total de películas es: {{ $filmCount }}</p>
</body>
</html>
<footer>
        <h2>© 2023 Movies List. Todos los derechos reservados.</h2>
        <img src="https://imgs.search.brave.com/QPV5KG0fMvhX3Fb9esOY3PeTQl7w-Mbse9aqwGiU4sc/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/Zm90by1ncmF0aXMv/Y2VycmFyLW5pbm8t/dmllbmRvLXBlbGlj/dWxhcy1wYWRyZXNf/MjMtMjE0OTI0MTA1/NS5qcGc_c2l6ZT02/MjYmZXh0PWpwZw" alt="Logo">
    </footer>

