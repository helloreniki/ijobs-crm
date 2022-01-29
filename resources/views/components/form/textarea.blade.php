@props(['name', 'id', 'placeholder'])

<textarea name="$name" id="$id" cols="30" rows="10" class="block w-full pr-10 border-2 border-cyan-500 @error($name) border-red-300 text-red-900 placeholder-red-300 @enderror focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm rounded-md" {{ $attributes->merge(['placeholder'=>"$placeholder"]) }}>{{ $slot }}</textarea>
