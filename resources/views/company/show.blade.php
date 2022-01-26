<x-layout>
  <div class="uppercase font-bold mb-1">{{ $company->name }}</div>
  <div class="text-sm text-gray-500 mb-4 ">{{ $company->address }}, <span class="text-cyan-700">{{ $company->country }}</span></div>
  <div class="text-sm">Company email: <span class="text-gray-500">{{ $company->email }}</span></div>
  <div class="text-sm mb-4">Company website: <span class="text-cyan-700">{{ $company->website }}</span></div>
  <div class="flex space-x-3 mb-10">
    @foreach ($company->skills as $skill)
      <div class="font-bold text-sm text-cyan-700 py-1">{{ $skill->name }}</div>
      @if($loop->last)<span><span>@else<span> | </span>@endif
    @endforeach
  </div>
  <div class="text-sm my-12 ">All Comms with this company (with all employee's of this company</div>

  <div class="space-y-6">
    @foreach ($company->employees as $employee)
      @foreach ($employee->comms as $comm)
        <div class="border rounded-md shadow-md">
          <div class="flex justify-between items-center bg-gray-100 px-3 py-1">
            <div class="flex items-center space-x-3">
              <div class="text-md font-semibold uppercase">{{ $employee->company->name }}</div>
              <div class="text-sm font-semibold"><a href="{{ route('employee.show', [$comm->employee]) }}">{{ $employee->name }}</a><span class="text-xs text-gray-700 ml-3">{{ $comm->date }}</span></div>
            </div>
            <div class="text-xs text-gray-500">Edit</div>
          </div>
          <div class="text-sm text-gray-800 px-3 py-3">{{ $comm->content }}</div>
        </div>
      @endforeach
    @endforeach
  </div>
</x-layout>
