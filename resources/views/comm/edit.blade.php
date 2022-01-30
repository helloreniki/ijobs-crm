<x-layout>
  <div class="uppercase font-semibold text-center mb-12">Edit comm</div>
  <form action="{{ route('comm.update', $comm) }}" method="post" class="flex flex-col space-y-6 max-w-md mx-auto">
  @csrf

    <x-form.select name="employee_id" id="employee_id" labelName="Contact name:" empty="Choose your contact">
      @foreach ($employees as $contact)
        <option value="{{ $contact->id }}" {{ old('employee_id') ? (old('employee_id') == $contact->id ? 'selected' : '') : ($comm->employee->id == $contact->id ? 'selected' : '') }}>{{ $contact->name }}</option>
      @endforeach
      <x-slot name="newForm">
        <div class="flex-shrink-0 text-sm text-white text-center bg-cyan-500 shadow-md shadow-cyan-500/50 rounded-md px-3 py-2">Add new contact</div>
      </x-slot>
    </x-form.select>

    <x-form.textarea name="content" id="content" placeholder="Content of communication...">{{ old('content', $comm->content) }}</x-form.textarea>

    <x-form.select name="type" id="type" empty="Choose type of communication" labelName="Type of communication:">
      <option value="phone" {{ old('type') ? (old('type') == 'phone' ? 'selected' : '') : ($comm->type == 'phone' ? 'selected' : '') }}>Phone</option>
      <option value="email" {{ old('type') ? (old('type') == 'email' ? 'selected' : '') : ($comm->type == 'email' ? 'selected' : '') }}>Email</option>
      <option value="video_call" {{ old('type') ? (old('type') == 'video_call' ? 'selected' : '') : ($comm->type == 'video_call' ? 'selected' : '') }}>Video Call</option>
    </x-form.select>

    <x-form.input-date name="date" id="date" :value="old('date', $comm->date)"/>

    <x-form.input-date name="date_of_next_contact" id="date_of_next_contact" :value="old('date_of_next_contact', $comm->date_of_next_contact)" />

    <x-button type="submit">Update comm</x-button>

  </form>
</x-layout>
