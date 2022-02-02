<x-layout>
  <div class="uppercase font-semibold text-center mb-12">Update new company</div>
  <form action="{{ route('company.update', $company) }}" method="post" class="flex flex-col space-y-4 max-w-md mx-auto">
    @csrf

      <x-form.input type="text" name="name" id="name" labelName="Name of the company" :value="old('name', $company->name)" />
      <x-form.input type="text" name="address" id="address" labelName="Address of the company" :value="old('address', $company->address)"/>
      <x-form.input type="email" name="email" id="email" labelName="Email address" :value="old('email', $company->email)" />
      <x-form.input type="text" name="country" id="country" labelName="Country" :value="old('country', $company->country)" />
      <x-form.input type="text" name="website" id="website" labelName="Website" :value="old('website', $company->website)" />

      <div>
        <x-form.label for="contacted">Did you contact the company already?</x-form.label>
        <input type="checkbox" name="contacted" id="contacted"
            value="1"
            {{ old('contacted') ? (old('contacted') == 1 ? 'checked' : '' ) : ($company->contacted == 1 ? 'checked' : '') }} class="text-cyan-500 ml-2" />
      </div>

      <div>
        <x-form.label for="my-rating">My rating</x-form.label>
        <div class="flex space-x-3 items-center mt-2">
          @for ($i = 1; $i < 6; $i++)
            <input type="radio" class="text-cyan-500" name="my_rating"
              value="{{ $i }}"
              {{ old('my_rating') ? ( old('my_rating') == $i ? 'checked' : '') : ($company->my_rating == $i ? 'checked' : '') }}><span>{{ $i }}</span>
          @endfor
        </div>
      </div>

      <x-form.textarea name="notes" id="notes" placeholder="Write what feels important...">{{ old('notes', $company->notes) }}</x-form.textarea>

      {{-- CHECKBOXES --}}
      <div>
        <x-form.label for="skills">Choose skills required</x-form>
          <div class="grid grid-cols-4 gap-6 items-center mt-2">
            @foreach ($skills as $skill)
            <div class="text-sm">
              <input type="checkbox" name="skill_ids[]" id="skills" value={{ $skill->id }} {{ in_array($skill->id, $company_skills) ? 'checked' : '' }} class="mr-2 text-cyan-500">{{ $skill->name }}
            </div>
            @endforeach
          </div>
      </div>

      <x-button type="submit">Update new company</x-button>

  </form>
</x-layout>
