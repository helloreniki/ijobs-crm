<x-layout>
  <div x-data="{
    @foreach($employees as $employee)
      showConfirmModal{{ $employee->id }}: false,
    @endforeach
  }">
    <div class="uppercase font-semibold mb-12">List of Contacts</div>
    <div class="font-bold text-cyan-700 py-1 mb-6">Add new contact</div>
    <table class="table-fixed text-sm">
      <thead>
        <tr class="uppercase text-left">
          <th class="p-2">Name</th>
          <th class="p-2">Company</th>
          <th class="p-2">Country</th>
          <th class="p-2">Notes</th>
          <th class="p-2"></th>
        </tr>
      </thead>
      <tbody class="py-3 divide-y">
        @foreach ($employees as $employee)
        <tr class="text-xs">
          <td class="py-1 px-2">
            <a href="{{ route('employee.show', $employee) }}">
              <div class="text-sm font-semibold mb-1">{{ $employee->name }}</div>
              <div class="text-cyan-500">{{ $employee->email }}</div>
            </a>
          </td>
          <td class="font-semibold py-1 px-2">{{ $employee->company->name }}</td>
          <td class="py-1 px-2">{{ $employee->company->country }}</td>
          <td class="py-1 px-2">{{ $employee->notes }}</td>
          <td class="py-1 px-2">
            <button @click="showConfirmModal{{ $employee->id }} = true">Delete</button>
          </td>
        </tr>
        <div x-show="showConfirmModal{{ $employee->id }}" x-cloak>
          <x-confirm-modal
            modalTitle="Delete Contact"
            modalDescription="Are you sure you want to delete <span class='text-red-500'>{{ $employee->name }}</span>?"
            routeName="employee.destroy"
            :routeParam="$employee"
            routeParamId="{{ $employee->id }}"
          />
        </div>
        @endforeach
      </tbody>
    </table>
  </div>
</x-layout>
