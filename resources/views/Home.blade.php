<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <meta name=”description” content="Write a letter to the future !">
    <meta name="keywords" content="Mrhaba, Zineddine, Haddad, Future, Message">
    <meta name="author" content="Haddad Zineddine">
    <meta name="robots" content="index,follow">

    <meta property="og:title" content="Mrhaba Me" />
    <meta property="og:locale" content="en_GB" />
    <meta property="og:description" content="Write a letter to the future" />
    <meta property="og:image" content="{{ asset('images/zineddine.jpg') }}" />
    <meta property="og:image:width" content="100" />
    <meta property="og:image:height" content="60" />
    <meta property="og:image:alt" content="Mrhaba Me" />
    <meta property="og:image:type" content="image/jpg" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:site_name" content="Mrhaba Me" />

    <meta name="twitter:site" content="{{ url('/') }}">
    <meta name="twitter:title" content="Mrhaba Me">
    <meta name="twitter:creator" content="Haddad Zineddine">
    <meta name="twitter:description" content="Write a letter to the future">
    <meta name="twitter:image" content="{{ asset('images/zineddine.jpg') }}">

    <title>Mrhaba Me</title>
    <link rel="canonical" href="{{ url('/') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="icon" href="{{ asset('/images/favicon.ico') }}">


</head>

<body class="font-poppins ">

    <div id="app" class="md:mx-16 mx-4 grid place-items-center h-screen">
        <App />
    </div>

    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/datepicker.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>

</body>

</html>
