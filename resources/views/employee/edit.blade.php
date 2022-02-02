<x-layout>
  <div class="uppercase font-semibold text-center mb-12">Edit Contact Profile</div>
  <form action="{{ route('employee.update', $employee)}}" method="post" class="flex flex-col space-y-4 max-w-md mx-auto">
    @csrf

      <x-form.select name="company_id" id="company_id" empty="Choose company" labelName="Company name">
        @foreach ($companies as $company)
          {{-- <option value="{{ $company->id }}" {{old('company_id') ? (old('company_id') == $company->id ? 'selected' : '') : ($employee->company_id == $company->id ? 'selected' : '') }}>{{ $company->name }}</option> --}}
          <option value="{{ $company->id }}" {{ old('company_id', $employee->company_id) == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
        @endforeach
      </x-form.select>

      <x-form.input type="text" name="name" id="name" labelName="Contact name" :value="old('name', $employee->name)" />
      <x-form.input type="email" name="email" id="email" labelName="Contact email" :value="old('email', $employee->email)"/>
      <x-form.textarea name="notes" id="notes" placeholder="Notes about this contact..." >{{ old('notes') ?? $employee->notes }}</x-form.textarea>

      <x-button type="submit">Update contact</x-button>
  </form>
</x-layout>
