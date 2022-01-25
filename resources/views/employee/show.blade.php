<x-layout>
  <div class="uppercase font-semibold mb-4">{{ $employee->name }}</div>
  <div class="font-bold text-sm text-cyan-700 py-1 mb-12 ">{{ $employee->company->name }}</div>
  <div class="text-sm mb-12 ">All Comms with this employee</div>
  @if ($employee->comms->count())
    <div class="space-y-6">
      @foreach ($employee->comms as $comm)
          <div class="border rounded-md shadow-md">
            <div class="flex justify-between items-center bg-gray-100 px-3 py-1">
              <div class="flex items-center space-x-3">
                <div class="text-md font-semibold uppercase">{{ $employee->company->name }}</div>
                <div class="text-sm font-semibold">{{ $employee->name }}<span class="text-xs text-gray-700 ml-3">{{ $comm->date }}</span></div>
              </div>
              <div class="text-xs text-gray-500">Edit</div>
            </div>
            <div class="text-sm text-gray-800 px-3 py-3">{{ $comm->content }}</div>
          </div>
      @endforeach
    </div>
  @else
      <div>No comms yet.</div>
  @endif
</x-layout>
