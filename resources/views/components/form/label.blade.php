@props(['for'])

<label for="{{ $for }}" {{ $attributes->merge(['class' => "text-sm font-medium text-gray-800"]) }}>{{ $slot }}</label>
