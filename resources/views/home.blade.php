<x-layout>
  <div class="flex space-x-4 mb-8 uppercase">
    <a href="/" class="@if(request('topRatingCompany') == null) pb-2 border-b-4 border-cyan-500 @else pb-2 border-b-4 border-gray-300 @endif">All latest comms</a>
    <a href="/?topRatingCompany=top & {{ http_build_query(request()->except('topRatingCompany')) }}" class="@if(request('topRatingCompany')) pb-2 border-b-4 border-cyan-500 @else pb-2 border-b-4 border-gray-300 @endif">Comms with top rated companies</a>
  </div>

  <div class="font-bold text-cyan-700 py-1 mb-6">
    <a href="{{ route('comm.create') }}">
      Add new comm
    </a>
  </div>
  <div class="space-y-6">
    @forelse ($comms as $comm)
      <x-comm-card :comm="$comm" />
    @empty
      No comms found.
    @endforelse
    <div>{{ $comms->links() }}</div>
  </div>
</x-layout>
