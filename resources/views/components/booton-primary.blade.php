<button {{$attributes->merge(['class' => 'cursor-pointer bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors']) }}>
    {{$slot}}
</button>