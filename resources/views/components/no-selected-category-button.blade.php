<a
    href="{{ route('homepage', ['section'=>'option-4', 'category' => $category]) }}"
    class="
        rounded-2xl
        bg-slate-800
        py-3
        text-center
        font-semibold
        text-slate-300
        ring-1 ring-white/5
        transition
        hover:bg-slate-700
    "
>
    {{$text}}
</a>