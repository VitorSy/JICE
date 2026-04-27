<a
    href="{{ route('homepage', ['section'=>'option-4', 'category' => $category]) }}"
    class="
        rounded-2xl
        bg-indigo-500/20
        py-3
        text-center
        font-semibold
        text-indigo-200
        ring-1 ring-indigo-400/30
        transition
        hover:bg-indigo-500/30
    "
>
    {{$text}}
</a>