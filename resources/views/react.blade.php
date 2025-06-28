<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>React App</title>
    @viteReactRefresh
    @vite('resources/front-end/src/main.jsx')
</head>

<body>
    @php
        $props = [
            'page' => $page ?? 'home',
            'data' => $data ?? []
        ];
    @endphp
    <div id="app" data-page='@json($props)'></div>

    {{-- <div id="app" data-page='@json(["page" => $page, ' data'=> $data])'></div> --}}
</body>

</html>