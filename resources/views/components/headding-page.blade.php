{{-- <nav {{$attributes->merge(['class' => "w-full px-5 py-3 shadow bg-blue-500"]) }}>
    <div class="w-full flex justify-between items-center gap-2 text-2xl">
        <h3 class="font-bold">
            {{$headding}}
        </h3>
        <ul class="flex items-center ">
            <li>
                {{$title1}}
            </li>
            <li>

            </li>
            <li>

            </li>
        </ul>
    </div>
</nav> --}}
<div {{$attributes->merge(['class' => 'bg-mode border-b border-gray-200 px-6 py-4']) }}>
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold ">{{$headding}}</h1>
        <nav class="text-sm ">
            <a href="#" class="text-blue-600 "> {{$title1}}</a>
            <span class="mx-2">/</span>
            <span class=""> {{$title2}}</span>
        </nav>
    </div>
</div>