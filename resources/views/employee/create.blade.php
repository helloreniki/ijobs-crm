<x-layout>
  <div class="uppercase font-semibold text-center mb-12">Add new contact</div>
  <form action="{{ route('employee.store') }}" method="post" class="flex flex-col space-y-4 max-w-md mx-auto">
    @csrf

      <x-form.select name="company_id" id="company_id" empty="Choose company" labelName="Company name">
        @foreach ($companies as $company)
          <option value="{{ $company->id }}">{{ $company->name }}</option>
        @endforeach
      </x-form.select>

      <x-form.input type="text" name="name" id="name" labelName="Contact name" />
      <x-form.input type="email" name="email" id="email" labelName="Contact email" />
      <x-form.textarea name="notes" id="notes" placeholder="Notes about this contact..." >{{ old('notes') }}</x-form.textarea>

      <x-button type="submit">Add new contact</x-button>
  </form>
</x-layout>
