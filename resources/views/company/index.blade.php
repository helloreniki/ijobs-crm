<x-layout>
  <div x-data="
    {
      @foreach($companies as $company)
      showConfirmModal{{ $company->id }}: false,
      @endforeach
    }">
    <div class="uppercase font-semibold mb-12">List of Companies</div>
    <div class="flex space-x-3 items-center">
      <x-form.label for="company_name">Search by company name:</x-form.label>
      <form action="{{ route('company.index') }}" method="get">
        <input type="text" name="company_name" value="{{ request('company_name')}}" placeholder="Search companies..."
              class="rounded-md shadow-sm border-2 border-cyan-600 placeholder-gray-400
                    focus:ring-cyan-500 focus:border-cyan-600 text-sm text-cyan-500 px-2 flex-1"
        >
      </form>
    </div>
    <div class="font-bold text-cyan-700 py-1 my-6"><a href="{{ route('company.create') }}">Add new company</a></div>
    <table class="text-sm relative">
      <thead class="">
        <tr class="uppercase text-left">
          <th class="p-2">Name</th>
          <th class="p-2">Email</th>
          <th class="p-2">Country</th>
          <th class="p-2">Contacted</th>
          <th class="p-2">Rating</th>
          <th class="p-2">Notes</th>
          <th class="p-2">Skills</th>
          <th class="p-2"></th>
        </tr>
      </thead>
      <tbody class="py-3 divide-y">
        @foreach ($companies as $company)
        <tr class="text-xs">
          <td class="py-1 px-2">
            <div class="font-semibold"><a href="{{ route('company.show', $company) }}">{{ $company->name }}</a></div>
            <div class="text-xxs text-gray-500">{{ $company->address }}</div>
            <div class="text-xxs text-cyan-500">{{ $company->website }}</div>
          </td>
          <td class="py-1 px-2">{{ $company->email }}</td>
          <td class="py-1 px-2">{{ $company->country }}</td>
          <td class="py-1 px-2 text-center">{{ $company->contacted ? 'YES' : 'NO' }}</td>
          <td class="py-1 px-2 text-center">{{ $company->my_rating }}</td>
          <td class="py-1 px-2">{{ $company->notes }}</td>
          <td class="py-1 px-2 text-cyan-700">
            <div class="flex gap-1 flex-wrap items-center">
              @foreach ($company->skills as $skill)
                <div class="">{{ $skill->name }}</div>
              @endforeach
            </div>
          </td>
          <td class="py-1 px-2">
            <a href="{{ route('company.edit', $company) }}">Edit</a>
            <button @click="showConfirmModal{{ $company->id }} = true">Delete</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @foreach ($companies as $company)
    <div x-show="showConfirmModal{{ $company->id }}" x-cloak>
      <x-confirm-modal
        modalTitle="Delete Company"
        modalDescription="Are you sure you want to delete company <span class='text-red-600'>{{ $company->name }}</span>?"
        routeName="company.destroy"
        :routeParam="$company"
        routeParamId="{{ $company->id }}"
      />
    </div>
    @endforeach
  </div>

</x-layout>
