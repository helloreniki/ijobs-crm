<x-layout>
  <div class="uppercase font-semibold text-center mb-12">Edit comm</div>
  <form action="{{ route('comm.update', $comm) }}" method="post" class="flex flex-col space-y-6 max-w-md mx-auto">
  @csrf

    <div>
      <label for="employee_id" class="block text-sm font-medium text-gray-800">Contact name</label>
      <div class="mt-1">
        <div class="flex justify-between items-center gap-4">
          <div class="relative w-full">
            <select name="employee_id" id="employee_id" class="rounded-md shadow-sm block w-full text-gray-500 pr-10 border-2 border-cyan-500 @error('name') border-red-300 text-red-900 placeholder-red-300 @enderror focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm rounded-md" placeholder="Name">
              <option value="null">Choose your contact</option>
              <option value="add">Add new contact</option>
              @foreach ($employees as $contact)
                <option value="{{ $contact->id }}" {{ old('employee_id') ? (old('employee_id') == $contact->id ? 'selected' : '') : ($comm->employee->id == $contact->id ? 'selected' : '') }}>{{ $contact->name }}</option>
              @endforeach
            </select>
            @error('employee_id')
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
              <!-- Heroicon name: solid/exclamation-circle -->
              <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
              </svg>
            </div>
            @enderror
          </div>

          <div class="flex-shrink-0 text-sm text-white text-center bg-cyan-500 shadow-md shadow-cyan-500/50 rounded-md px-3 py-2">Add new contact</div>

        </div>
      </div>
      @error('employee_id')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
      @enderror
    </div>

    <div class="">
      <label for="content" class="block text-sm font-medium text-gray-800">Content:</label>
      <div class="mt-1 relative">
        <textarea
            name="content" id="content" cols="30" rows="10"
            class="block w-full pr-10 border-2 border-cyan-500 @error('name') border-red-300 text-red-900 placeholder-red-300 @enderror focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm rounded-md"
            placeholder="Content of communication"
        >{{ old('content') ?? $comm->content }}</textarea>
        @error('content')
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
          <!-- Heroicon name: solid/exclamation-circle -->
          <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
          </svg>
        </div>
        @enderror
      </div>
      @error('content')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="type" class="block text-sm font-medium text-gray-800">Type of communication:</label>
      <div class="mt-1">
        <select name="type" id="type" class="text-gray-500 block w-full rounded-md shadow-md sm:text-sm border-2 border-cyan-500 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500">
          <option value="" class="">Choose type of comm</option>
          {{-- if old('type') exists => old('type') = phone ? selected : ''  else $comm->type = phone ...--}}
          <option value="phone" {{ old('type') ? (old('type') == 'phone' ? 'selected' : '') : ($comm->type == 'phone' ? 'selected' : '') }}>Phone</option>
          <option value="email" {{ old('type') ? (old('type') == 'email' ? 'selected' : '') : ($comm->type == 'email' ? 'selected' : '') }}>Email</option>
          <option value="video_call" {{ old('type') ? (old('type') == 'video_call' ? 'selected' : '') : ($comm->type == 'video_call' ? 'selected' : '') }}>Video Call</option>
        </select>
      </div>
    </div>

    <div>
      <label for="date" class="block text-sm font-medium text-gray-800">Date of last contact:</label>
      <div class="mt-1 relative">
        <input type="date" name="date" id="date" value="{{ old('date', date('Y-m-d')) ?? $comm->date }}" class="block w-full text-gray-500 text-sm rounded-md shadow-md border-2 border-cyan-500 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500">
        @error('date')
        <div class="absolute inset-y-0 right-8 pr-3 flex items-center pointer-events-none">
          <!-- Heroicon name: solid/exclamation-circle -->
          <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
          </svg>
        </div>
        @enderror
      </div>
      @error('date')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="date_of_next_contact" class="block text-sm font-medium text-gray-800">Date of next contact:</label>
      <div class="mt-1 relative">
        <input type="date" name="date_of_next_contact" id="date_of_next_contact" value="{{ old('date_of_next_contact', date('Y-m-d')) ?? $comm->date_of_next_contact }}" class="block w-full text-gray-500 text-sm rounded-md shadow-md border-2 border-cyan-500 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500">
        @error('date')
        <div class="absolute inset-y-0 right-8 pr-3 flex items-center pointer-events-none">
          <!-- Heroicon name: solid/exclamation-circle -->
          <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
          </svg>
        </div>
        @enderror
      </div>
      @error('date_of_next_contact')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
      @enderror
    </div>
    <button type="submit" class="bg-cyan-500 shadow-md shadow-cyan-500/50 rounded-md px-3 py-2 text-white font-semibold">Update comm</button>
  </form>
</x-layout>
