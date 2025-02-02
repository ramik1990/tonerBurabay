<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Laravel + VueJs + Router</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        body {
            width: 1024px;
            background-color: rgb(255, 255, 255);
        }
        html {
            width: 100%;
            background-color: rgb(248, 248, 248);
        }
        #app {
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="app"></div>
</body>
</html>