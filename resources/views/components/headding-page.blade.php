<nav {{$attributes->merge(['class' => "w-full px-5 py-3 shadow bg-blue-500"]) }}>
    <div class="w-full flex justify-between items-center gap-2 text-2xl">
        <h3 class="font-bold">
            {{$headding}}
        </h3>
        <ul class="flex items-center ">
            <li>
                {{$title1}}
            </li>
            <li>
                {{$title2}}
            </li>
            <li>
                {{$title3}}
            </li>
        </ul>
    </div>
</nav>