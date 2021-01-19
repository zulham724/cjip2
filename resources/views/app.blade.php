<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <style>
        #app {
            /* font-family: 'Roboto'; */
            font-family: 'Montserrat', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            font-style: normal;
            font-weight: normal;
            text-align: center;
            /*color: #2c3e50;*/
        }

        [v-cloak]>* {
            display: none
        }

        @keyframes spinner {
            to {
                transform: rotate(360deg);
            }
        }

        [v-cloak]:before {
            content: "";
            box-sizing: border-box;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin-top: -10px;
            margin-left: -10px;
            border-radius: 50%;
            border: 2px solid #ccc;
            border-top-color: #333;
            animation: spinner 0.6s linear infinite;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
        }

    </style>
</head>

<body>
<div id="app">
@inertia
</div>
<script src="{{mix('js/umkm.js')}}"></script>
</body>

</html>
