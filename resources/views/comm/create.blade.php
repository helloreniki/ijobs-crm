<x-layout>
  <div class="uppercase font-semibold text-center mb-12">Add new comm</div>
  <form action="{{ route('comm.store') }}" method="post" class="flex flex-col space-y-6 max-w-md mx-auto">
  @csrf

    <div>
      <x-form.label for="employee_id" class="tracking-widest">Contact name</x-form.label>

      <x-form.select name="employee_id" id="employee_id" empty="Choose your contact">
        @foreach ($employees as $contact)
          <option value="{{ $contact->id }}" {{ old('employee_id') == $contact->id ? 'selected' : '' }}>{{ $contact->name }}</option>
        @endforeach
        <x-slot name="newForm">
          <div class="flex-shrink-0 text-sm text-white text-center bg-cyan-500 shadow-md shadow-cyan-500/50 rounded-md px-3 py-2">Add new contact</div>
        </x-slot>
      </x-form.select>

      <x-form.error-message name="employee_id" />
    </div>

    <div class="">
      <x-form.label for="content">Content:</x-form.label>
      <div class="mt-1 relative">
        <x-form.textarea name="content" id="content" placeholder="Content of communication...">{{ old('content') }}</x-form.textarea>
        <x-form.error-icon name="content"/>
      </div>
      <x-form.error-message name="content"/>
    </div>

    <div>
      <x-form.label for="type">Type of communication:</x-form.label>
      <x-form.select name="type" id="type" empty="Choose type of comm">
        <option value="phone" {{ old('type') == 'phone' ? 'selected' : '' }}>Phone</option>
        <option value="email" {{ old('type') == 'email' ? 'selected' : '' }}>Email</option>
        <option value="video_call" {{ old('type') == 'video_call' ? 'selected' : '' }}>Video Call</option>
      </x-form.select>
    </div>

    <div>
      <x-form.label for="date">Date of last contact:</x-form.label>
      <x-form.input-date name="date" id="date" />
    </div>

    <div>
      <x-form.label for="date_of_next_contact">Date of next contact:</x-form.label>
      <x-form.input-date name="date_of_next_contact" id="date_of_next_contact" />
    </div>

    <x-button type="submit">Add new comm</x-button>

  </form>
</x-layout>
