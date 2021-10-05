<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-8 py-2 bukatsu-bg-blue border border-transparent rounded-full font-semibold text-lg text-white uppercase tracking-widest hover:bukatsu-bg-darkblue active:bukatsu-bg-darkblue focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-md hover:shadow-none']) }}>
    {{ $slot }}
</button>
