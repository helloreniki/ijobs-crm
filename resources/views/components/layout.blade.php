<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Document</title>
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
  </div>
</body>
</html>
