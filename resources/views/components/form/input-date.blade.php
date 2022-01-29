@props(['name', 'id'])

<div class="mt-1 relative">
  <input type="date" name="$name" id="$id" value="{{ old('$name', date('Y-m-d')) }}" class="block w-full text-gray-500 text-sm rounded-md shadow-md border-2 border-cyan-500 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500">
  <x-form.error-icon :name="$name" />
</div>

<x-form.error-message :name="$name"/>
