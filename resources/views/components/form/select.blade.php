@props(['name', 'id', 'empty', 'newForm', 'labelName'])

<div>
  <label for="{{ $id }}" class="block text-sm font-medium text-gray-800">{{ $labelName }}</label>
  <div class="mt-2">
    <div class="flex justify-between items-center gap-4">
      <div class="relative w-full">
        <select name="{{ $name }}" id="{{ $id }}" class="rounded-md shadow-sm block w-full text-gray-500 pr-10 border-2 border-cyan-500 @error($name) border-red-300 text-red-900 placeholder-red-300 @enderror focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm">
          <option value="null">{{ $empty }}</option>
          {{ $slot }}
        </select>
        <x-form.error-icon :name="$name" />
      </div>
      @isset($newForm) {{ $newForm }} @endisset
    </div>
  </div>

  <x-form.error-message :name="$name" />
</div>
