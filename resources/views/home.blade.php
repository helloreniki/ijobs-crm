<x-layout>
  <div class="uppercase font-semibold mb-12">All latest comms</div>
  <div class="font-bold text-cyan-700 py-1 mb-6">Add new comm</div>
  <div class="space-y-6">
    @foreach ($comms as $comm)
        <div class="border rounded-md shadow-md">
          <div class="flex justify-between items-center bg-gray-100 px-3 py-1">
            <div class="flex items-center space-x-3">
              <div class="text-md font-semibold uppercase">{{ $comm->employee->company->name }}</div>
              <div class="text-sm font-semibold">{{ $comm->employee->name }}<span class="text-xs text-gray-700 ml-3">{{ $comm->date }}</span></div>
            </div>
            <div class="text-xs text-gray-500">Edit</div>
          </div>
          <div class="text-sm text-gray-800 px-3 py-3">{{ $comm->content }}</div>
        </div>
    @endforeach
    <div>{{ $comms->links() }}</div>
  </div>
</x-layout>
