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
      <div>Logo</div>
      <div>Jobs CRM</div>
      <div>Filters</div>
      <div>Search</div>
    </div>
    <div>
      My Profile
    </div>
  </nav>
  <div class="flex px-6 py-3 my-8">
    <nav class="w-1/5 space-y-2">
      <div>Companies</div>
      <div>Comms</div>
    </nav>
    <div class="w-full">
      {{ $slot }}
    </div>
  </div>
</body>
</html>
