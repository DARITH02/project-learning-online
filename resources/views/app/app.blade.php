<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
     <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>

<body class="">
    <section class="flex gap-15 relative">

        <article class="w-1/5 h-screen fixed">
            @include('layout.siteBar')
        </article>
        <article class="w-4/5 block absolute left-1/5">
            <article class="w-full">
                <nav class="w-full sticky top-0">
                    @include('layout.navigaton')
                </nav>  
                <main class="w-full">
                    @yield('contents')
                </main>
                <footer class="w-full px-7 mb-1.5 ">
                    @include('layout.footer')
                </footer>
            </article>
        </article>
    </section>


</body>

</html>