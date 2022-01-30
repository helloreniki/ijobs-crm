<x-layout>
  <div class="uppercase font-semibold mb-12">All latest comms</div>
  <div class="font-bold text-cyan-700 py-1 mb-6">
    <a href="{{ route('comm.create') }}">
      Add new comm
    </a>
  </div>
  <div class="space-y-6">
    @foreach ($comms as $comm)
      <x-comm-card :comm="$comm" />
    @endforeach
    <div>{{ $comms->links() }}</div>
  </div>
</x-layout>
