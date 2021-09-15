@props(['value'])

<label {{ $attributes->merge(['class' => 'block py-4 px-6 bukatsu-text-white bukatsu-bg-blue text-xl']) }}>
    {{ $value ?? $slot }}
</label>
