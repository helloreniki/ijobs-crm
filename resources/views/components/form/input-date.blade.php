@props(['name', 'id'])

<x-form.label for="{{ $id }}">{{ ucfirst(str_replace('_', ' ', $name)) . ':' }}</x-form.label>

<div class="mt-1 relative">
  <input
    type="date"
    name="{{ $name }}"
    id="{{ $id }}"
    class="block w-full text-gray-500 text-sm rounded-md shadow-md border-2 border-cyan-500
      focus:outline-none focus:ring-cyan-500 focus:border-cyan-500"
      {{ $attributes(['value' => old($name, date('Y-m-d'))]) }}
    >
  <x-form.error-icon :name="$name" />
</div>

<x-form.error-message :name="$name"/>
