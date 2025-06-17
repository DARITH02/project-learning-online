<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-200">
    <section class="flex gap-15 relative">

        <article class="w-1/5 h-screen fixed">
            @include('layout.siteBar')
        </article>
        <article class="pl-10 w-4/5 block absolute left-1/5">
            <article class="w-full">
                <nav class="">
                    @include('layout.navigaton')
                </nav>
                <main class="w-full">
                    @yield('contents')
                </main>
            </article>
        </article>
    </section>


</body>

</html>