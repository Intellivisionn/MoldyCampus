@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-black hover:text-gray-500 bg-white']) }}>
    {{ $value ?? $slot }}
</label>
