<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <title>Document</title>
  <style>
    [x-cloak] { display: none !important;}
  </style>
  <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
  <nav class="flex justify-between bg-gray-200 px-6 py-3">
    <div class="flex space-x-6">
      <a href="{{ route('home') }}"><div>Logo</div></a>
      <a href="{{ route('home') }}"><div>Jobs CRM</div></a>
      <div>Filters</div>
      <div>Search</div>
    </div>
    <div>
      My Profile
    </div>
  </nav>
  <div class="flex px-6 py-3 my-8">
    <nav class="w-1/5 flex flex-col space-y-2">
      <a href="{{ route('company.index') }}">Companies</a>
      <a href="{{ route('employee.index') }}">Contacts</a>
      <a href="{{ route('home') }}"><div>Comms</div></a>
    </nav>
    <div class="w-full">
      {{ $slot }}
    </div>

    {{-- success message --}}
    @if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 5000)"
         x-show="show"
         class="fixed flex shadow-md ring-1 shadow-cyan-500 text-cyan-700 py-2 px-4 rounded-lg top-16 right-3 text-sm"
    >
      <svg class="h-6 w-6 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <p class="ml-3 text-sm text-cyan-500 flex-1">{{ session('success') }}</p>
      <button class="ml-2">
        <svg class="h-4 w-4 text-cyan-500 hover:text-cyan-700 fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    @endif

  </div>
</body>
</html>
