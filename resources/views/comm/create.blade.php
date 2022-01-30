<x-layout>
  <div class="uppercase font-semibold text-center mb-12">Add new comm</div>
  <form action="{{ route('comm.store') }}" method="post" class="flex flex-col space-y-6 max-w-md mx-auto">
  @csrf

    <x-form.select name="employee_id" id="employee_id" empty="Choose your contact" labelName="Contact name:">
      @foreach ($employees as $contact)
        <option value="{{ $contact->id }}" {{ old('employee_id') == $contact->id ? 'selected' : '' }}>{{ $contact->name }}</option>
      @endforeach
      <x-slot name="newForm">
        <div class="flex-shrink-0 text-sm text-white text-center bg-cyan-500 shadow-md shadow-cyan-500/50 rounded-md px-3 py-2">Add new contact</div>
      </x-slot>
    </x-form.select>

    <x-form.textarea name="content" id="content" placeholder="Content of communication...">{{ old('content') }}</x-form.textarea>

    <x-form.select name="type" id="type" empty="Choose type of comm" labelName="Type of communication:">
      <option value="phone" {{ old('type') == 'phone' ? 'selected' : '' }}>Phone</option>
      <option value="email" {{ old('type') == 'email' ? 'selected' : '' }}>Email</option>
      <option value="video_call" {{ old('type') == 'video_call' ? 'selected' : '' }}>Video Call</option>
    </x-form.select>

    <x-form.input-date name="date" id="date" />

    <x-form.input-date name="date_of_next_contact" id="date_of_next_contact" />

    <x-button type="submit">Add new comm</x-button>

  </form>
</x-layout>
