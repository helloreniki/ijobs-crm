@props(['type'])

<button type="submit" {{ $attributes->merge(['class' => 'bg-cyan-500 shadow-md shadow-cyan-500/50 rounded-md px-3 py-2 text-white font-semibold']) }}>{{ $slot }}</button>
