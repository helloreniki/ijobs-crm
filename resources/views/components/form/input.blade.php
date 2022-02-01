@props(['type', 'name', 'id', 'labelName'])

<div>
  <x-form.label for="{{ $id }}">{{ $labelName }}</x-form.label>

  <div class="mt-2 relative">
    <input
      type="{{ $type }}"
      name="{{ $name }}"
      id="{{ $id }}"
      class="block w-full text-gray-500 text-sm rounded-md shadow-md border-2 border-cyan-500
        focus:outline-none focus:ring-cyan-500 focus:border-cyan-500"
        {{ $attributes(['value' => old($name)]) }}
      >
    <x-form.error-icon :name="$name" />
  </div>

  <x-form.error-message :name="$name"/>
</div>
