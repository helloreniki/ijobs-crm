<x-layout>
  <div class="uppercase font-semibold mb-12">List of Companies</div>
  <div class="font-bold text-cyan-700 py-1 mb-6"><a href="{{ route('company.create') }}">Add new company</a></div>
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
          <div class="flex space-x-1">
          @foreach ($company->skills as $skill)
            <div class="mb-8">{{ $skill->name }}</div>
          @endforeach
          </div>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</x-layout>
