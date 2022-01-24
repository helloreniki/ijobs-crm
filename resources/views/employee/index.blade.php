<x-layout>
  <div class="uppercase font-semibold mb-12">List of Contacts</div>
  <div class="font-bold text-cyan-700 py-1 mb-6">Add new contact</div>
  <table class="table-fixed text-sm">
    <thead>
      <tr class="uppercase text-left">
        <th class="p-2">Name</th>
        <th class="p-2">Company</th>
        <th class="p-2">Country</th>
        <th class="p-2">Notes</th>
      </tr>
    </thead>
    <tbody class="py-3 divide-y">
      @foreach ($employees as $employee)
      <tr class="text-xs">
        <td class="py-1 px-2">
          <div class="text-sm font-semibold mb-1">{{ $employee->name }}</div>
          <div class="text-cyan-500">{{ $employee->email }}</div>
        </td>
        <td class="font-semibold py-1 px-2">{{ $employee->company->name }}</td>
        <td class="py-1 px-2">{{ $employee->company->country }}</td>
        <td class="py-1 px-2">{{ $employee->notes }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</x-layout>
