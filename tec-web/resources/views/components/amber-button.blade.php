<button {{ $attributes->merge(['type' => 'submit', 'class' => 'py-1.5 px-3 bg-amber-400 border border-amber-400 text-neutral-600 font-bold rounded hover:bg-amber-500 active:bg-amber-600 active:border-amber-500 disabled:opacity-50']) }}>
    {{ $slot }}
</button>
